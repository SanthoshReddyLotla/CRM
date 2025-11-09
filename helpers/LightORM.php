<?php
/**
 * lightORM.php
 *
 * Simple lightweight ORM base class using PDO.
 *
 * Features:
 *  - static connection management (setConnection)
 *  - instance save() (insert or update depending on primary key)
 *  - delete()
 *  - static find($id)
 *  - static findBy($conditions, $params) -> array of instances
 *  - update($fields) -> update this instance
 *  - static updateBy($conditions, $params, $fields) -> affected rows
 *  - query($sql, $params) -> PDOStatement
 *  - schemaQuery($sql) -> boolean (for CREATE TABLE, ALTER, etc.)
 *
 * Usage:
 *  - Extend this class for your models, optionally override tableName() and primaryKey()
 *  - Call LightORM::setConnection($pdo) once (or configure via DSN helper below)
 */

class LightORM
{
    /** @var \PDO|null */
    protected static $pdo = null;

    /** @var string */
    protected static $dateFormat = 'Y-m-d H:i:s';

    /** Subclasses can override */
    protected static $table = null;
    protected static $primaryKey = 'id';

    /** Allow whitelist/blacklist fields to control save behavior */
    protected $guarded = ['id'];   // fields not mass-assignable / not auto-saved
    protected $fillable = [];      // if non-empty, only these fields will be saved

    /**
     * Set a PDO connection (one-time).
     * Example: LightORM::setConnection($pdo);
     *
     * @param \PDO $pdo
     */
    public static function setConnection(PDO $pdo)
    {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo = $pdo;
    }

    /**
     * Create a PDO connection from DSN details (helper).
     *
     * @param string $dsn
     * @param string $user
     * @param string $pass
     * @param array $options
     * @return void
     */
    public static function configureFromDsn(string $dsn, string $user = '', string $pass = '', array $options = [])
    {
        if (self::$pdo !== null) {
            return;
        }
        $defaultOpts = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $opts = $options + $defaultOpts;
        self::$pdo = new PDO($dsn, $user, $pass, $opts);
    }

    /**
     * Return the table name for the calling class.
     * By default uses static::$table if set, otherwise infer from class name (snake_case + pluralize naive).
     *
     * @return string
     */
    public static function tableName(): string
    {
        if (static::$table) {
            return static::$table;
        }
        // naive conversion: ClassName -> class_name + 's'
        $class = (new ReflectionClass(get_called_class()))->getShortName();
        $snake = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $class));
        return $snake . 's';
    }

    /**
     * Primary key column name for this model.
     * @return string
     */
    public static function primaryKey(): string
    {
        return static::$primaryKey ?? 'id';
    }

    /**
     * Raw query. Returns PDOStatement (caller can fetch).
     * @param string $sql
     * @param array $params
     * @return \PDOStatement
     */
    public static function query(string $sql, array $params = []): PDOStatement
    {
        self::ensureConnection();
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Use for schema changes (CREATE/ALTER). Returns boolean.
     * @param string $sql
     * @return bool
     */
    public static function schemaQuery(string $sql): bool
    {
        self::ensureConnection();
        return self::$pdo->exec($sql) !== false;
    }

    /**
     * Find single record by primary key. Returns instance or null.
     * @param mixed $id
     * @return static|null
     */
    public static function find($id)
    {
        self::ensureConnection();
        $table = static::tableName();
        $pk = static::primaryKey();
        $sql = "SELECT * FROM {$table} WHERE {$pk} = :id LIMIT 1";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $obj = $stmt->fetch();
        return $obj === false ? null : $obj;
    }

    /**
     * Find records by conditions.
     * $conditions can be:
     *  - string with placeholders: "status = :status AND age > :age"
     *  - array associative: ['status' => 'active', 'type' => 'admin'] (will be ANDed)
     *
     * @param string|array $conditions
     * @param array $params (used when $conditions is string or for complex params)
     * @param string $order Optional ORDER BY
     * @param int|null $limit
     * @return array of static instances
     */
    public static function findBy($conditions = '', array $params = [], string $order = '', ?int $limit = null): array
    {
        self::ensureConnection();
        $table = static::tableName();
        if (is_array($conditions)) {
            $parts = [];
            foreach ($conditions as $k => $v) {
                $placeholder = ':' . preg_replace('/[^a-z0-9_]/i', '_', $k);
                $parts[] = "{$k} = {$placeholder}";
                $params[$placeholder] = $v;
            }
            $where = count($parts) ? 'WHERE ' . implode(' AND ', $parts) : '';
        } else {
            $where = trim($conditions) !== '' ? 'WHERE ' . $conditions : '';
        }

        $sql = "SELECT * FROM {$table} {$where}";
        if ($order) {
            $sql .= " ORDER BY {$order}";
        }
        if ($limit !== null) {
            $sql .= " LIMIT " . intval($limit);
        }

        $stmt = self::$pdo->prepare($sql);
        // normalize param keys for associative array form
        $bound = [];
        foreach ($params as $k => $v) {
            $bound[$k[0] === ':' ? $k : ':' . $k] = $v;
        }
        $stmt->execute($bound);
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
        return $results ?: [];
    }

    /**
     * Find a single record by conditions (like findBy but returns one object or null).
     * Example: User::findOneBy(['email' => 'test@example.com']);
     *
     * @param array|string $conditions
     * @param array $params
     * @return static|null
     */
    public static function findOneBy($conditions, array $params = [])
    {
        $results = static::findBy($conditions, $params, '', 1);
        return !empty($results) ? $results[0] : null;
    }

    /**
     * Save the current instance. Insert if new, otherwise update.
     * Returns true on success.
     *
     * Behavior:
     *  - Uses $fillable / $guarded to determine which properties to persist.
     *  - If primary key property exists and not null -> update, else insert.
     *
     * @return bool
     */
    public function save(): bool
    {
        self::ensureConnection();
        $pk = static::primaryKey();
        $props = $this->getPersistableProperties();

        // decide insert or update
        if (isset($this->$pk) && $this->$pk !== null && $this->$pk !== '') {
            // update
            $sets = [];
            $params = [];
            foreach ($props as $col => $val) {
                if ($col === $pk) continue;
                $sets[] = "{$col} = :{$col}";
                $params[":{$col}"] = $val;
            }
            if (empty($sets)) {
                return true; // nothing to do
            }
            $params[':pk'] = $this->$pk;
            $table = static::tableName();
            $sql = "UPDATE {$table} SET " . implode(', ', $sets) . " WHERE {$pk} = :pk";
            $stmt = self::$pdo->prepare($sql);
            return $stmt->execute($params);
        } else {
            // insert
            $cols = [];
            $placeholders = [];
            $params = [];
            foreach ($props as $col => $val) {
                // skip primary if present and null/empty
                if ($col === $pk) continue;
                $cols[] = $col;
                $placeholders[] = ':' . $col;
                $params[':' . $col] = $val;
            }
            $table = static::tableName();
            $sql = "INSERT INTO {$table} (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $placeholders) . ")";
            $stmt = self::$pdo->prepare($sql);
            $ok = $stmt->execute($params);
            if ($ok) {
                // set last insert id back on the instance if pk is numeric
                try {
                    $last = self::$pdo->lastInsertId();
                    if ($last !== '0' && $last !== '') {
                        // try to cast if numeric
                        $this->$pk = ctype_digit($last) ? (int)$last : $last;
                    }
                } catch (Exception $e) {
                    // some drivers may not support lastInsertId; ignore
                }
            }
            return $ok;
        }
    }

    /**
     * Delete this record (by primary key). Returns boolean.
     *
     * @return bool
     */
    public function delete(): bool
    {
        self::ensureConnection();
        $pk = static::primaryKey();
        if (!isset($this->$pk)) {
            throw new RuntimeException("Cannot delete without primary key ({$pk}) set.");
        }
        $table = static::tableName();
        $sql = "DELETE FROM {$table} WHERE {$pk} = :pk";
        $stmt = self::$pdo->prepare($sql);
        return $stmt->execute([':pk' => $this->$pk]);
    }

    /**
     * Update this instance with an associative array of fields, persist to DB.
     * Returns boolean update success.
     *
     * @param array $fields
     * @return bool
     */
    public function update(array $fields): bool
    {
        foreach ($fields as $k => $v) {
            $this->$k = $v;
        }
        return $this->save();
    }

    /**
     * Static updateBy: update rows matching conditions with given fields.
     * $conditions can be string or array (see findBy). Returns affected row count.
     *
     * @param string|array $conditions
     * @param array $params
     * @param array $fields
     * @return int affected rows
     */
    public static function updateBy($conditions, array $params, array $fields): int
    {
        self::ensureConnection();
        if (empty($fields)) {
            throw new InvalidArgumentException("No fields provided to update.");
        }

        $table = static::tableName();
        $setParts = [];
        $setParams = [];
        foreach ($fields as $col => $val) {
            $ph = ':set_' . preg_replace('/[^a-z0-9_]/i', '_', $col);
            $setParts[] = "{$col} = {$ph}";
            $setParams[$ph] = $val;
        }

        if (is_array($conditions)) {
            $parts = [];
            foreach ($conditions as $k => $v) {
                $placeholder = ':cond_' . preg_replace('/[^a-z0-9_]/i', '_', $k);
                $parts[] = "{$k} = {$placeholder}";
                $params[$placeholder] = $v;
            }
            $where = count($parts) ? 'WHERE ' . implode(' AND ', $parts) : '';
        } else {
            $where = trim($conditions) !== '' ? 'WHERE ' . $conditions : '';
            // normalize param keys
            $tmp = [];
            foreach ($params as $k => $v) {
                $tmp[$k[0] === ':' ? $k : ':' . $k] = $v;
            }
            $params = $tmp;
        }

        $sql = "UPDATE {$table} SET " . implode(', ', $setParts) . " {$where}";
        $stmt = self::$pdo->prepare($sql);
        $executeParams = $setParams + $params;
        $stmt->execute($executeParams);
        return $stmt->rowCount();
    }

    /**
     * Convenience: ensures static::$pdo is set.
     * @throws RuntimeException
     */
    protected static function ensureConnection()
    {
        if (!self::$pdo) {
            throw new RuntimeException("Database connection not configured. Call LightORM::setConnection(\$pdo) or configureFromDsn().");
        }
    }

    /**
     * Build list of properties to persist (column => value).
     * Filters using $fillable and $guarded.
     *
     * @return array
     */
    protected function getPersistableProperties(): array
    {
        // get all public/protected properties (object vars will include public only).
        // We'll use reflection to also access protected properties optionally if needed.
        $data = [];

        // take public properties first
        foreach (get_object_vars($this) as $k => $v) {
            $data[$k] = $v;
        }

        // Optionally include protected properties that are declared on the class (not prefixed with null)
        $ref = new ReflectionObject($this);
        foreach ($ref->getProperties() as $prop) {
            $name = $prop->getName();
            if (array_key_exists($name, $data)) continue; // already included from public
            if ($prop->isStatic()) continue;
            if ($prop->isProtected() || $prop->isPrivate()) {
                $prop->setAccessible(true);
                $data[$name] = $prop->getValue($this);
            }
        }

        // Filter by fillable/guarded
        if (!empty($this->fillable)) {
            $data = array_intersect_key($data, array_flip($this->fillable));
        } else {
            // remove guarded
            foreach ($this->guarded as $g) {
                if (array_key_exists($g, $data)) {
                    unset($data[$g]);
                }
            }
        }

        // remove null properties? We keep nulls (to allow setting NULL in DB).
        // Return as column => value
        return $data;
    }

    /**
     * Raw execute + fetchAll as associative arrays (helper).
     * @param string $sql
     * @param array $params
     * @return array
     */
    public static function fetchAll(string $sql, array $params = []): array
    {
        $stmt = self::query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
