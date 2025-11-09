<?php
// client/views/layout/session_check.php
// Safe session validator for protected views.

// ---------------------------------------------------------------------
// PREVENT REDECLARATION (works even if included multiple times)
// ---------------------------------------------------------------------
if (!defined('SESSION_HELPERS_DEFINED')) {
    define('SESSION_HELPERS_DEFINED', true);

    // -----------------------------------------------------------------
    // SESSION SETUP
    // -----------------------------------------------------------------
    if (session_status() === PHP_SESSION_NONE) {
        // $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
        // session_set_cookie_params([
        //     'lifetime' => 0,
        //     'path'     => '/',
        //     'domain'   => $_SERVER['HTTP_HOST'] ?? '',
        //     'secure'   => $secure,
        //     'httponly' => true,
        //     'samesite' => 'Lax'
        // ]);
        session_start();
    }

    define('SESSION_INACTIVITY_TIMEOUT', 1800); // 30 minutes
    define('SESSION_ABSOLUTE_TIMEOUT', 86400);  // 24 hours

    // -----------------------------------------------------------------
    // SESSION UTILS
    // -----------------------------------------------------------------
    function destroy_session_and_redirect($redirect = '/login') {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        session_destroy();
        header('Location: ' . $redirect);
        exit;
    }

    function session_fingerprint(): string {
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $parts = explode('.', $ip);
            $ip_frag = ($parts[0] ?? '') . '.' . ($parts[1] ?? '');
        } else {
            $parts = explode(':', $ip);
            $ip_frag = $parts[0] ?? '';
        }
        return hash('sha256', $ua . '|' . $ip_frag);
    }

    function bootstrap_session_after_login() {
        $_SESSION['__fingerprint'] = session_fingerprint();
        $_SESSION['__created_at'] = time();
        $_SESSION['__last_activity'] = time();
        session_regenerate_id(true);
    }

    function is_session_valid(): bool {
        if (empty($_SESSION['user'])) {
            return false;
        }
        if (empty($_SESSION['__fingerprint']) || $_SESSION['__fingerprint'] !== session_fingerprint()) {
            return false;
        }

        $now = time();
        if (!empty($_SESSION['__last_activity']) && ($now - $_SESSION['__last_activity']) > SESSION_INACTIVITY_TIMEOUT) {
            return false;
        }
        if (!empty($_SESSION['__created_at']) && ($now - $_SESSION['__created_at']) > SESSION_ABSOLUTE_TIMEOUT) {
            return false;
        }

        $_SESSION['__last_activity'] = $now;
        return true;
    }

    function require_login() {
        if (!is_session_valid()) {
            destroy_session_and_redirect('/login');
        }
    }

    // Renamed to avoid conflict with PHP’s built-in get_current_user()
    function session_current_user() {
        global $pdo;

        if (!empty($_SESSION['__user_row'])) {
            return $_SESSION['__user_row'];
        }

        if (empty($_SESSION['user'])) {
            return null;
        }

        // Load PDO from root config
        // $dbConfigPath = __DIR__ . '/../../../config/database.php';
        // if (!file_exists($dbConfigPath)) {
        //     destroy_session_and_redirect('/login');
        // }

        // require_once $dbConfigPath; // should define $pdo

        try {

            User::setConnection($pdo);
            $user = User::findOneBy(['email' => $_SESSION['user']]);


            // $stmt = $pdo->prepare('SELECT id, email, role, name, is_active, created_at FROM users WHERE email = :email LIMIT 1');
            // $stmt->execute([':email' => $_SESSION['user']]);
            // $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // if (!$user || (isset($user['is_active']) && !$user['is_active'])) {
            //     destroy_session_and_redirect('/login');
            // }

            // if (!empty($user['role'])) {
            //     $_SESSION['role'] = $user['role'];
            // }

            $_SESSION['__user_row'] = $user;
            return $user;
        } catch (Exception $e) {
            error_log('Session user fetch error: ' . $e->getMessage());
            destroy_session_and_redirect('/login');
        }

        return null;
    }
} // end SESSION_HELPERS_DEFINED guard

// Auto-bootstrap right after login
if (!empty($_SESSION['just_logged_in'])) {
    bootstrap_session_after_login();
    unset($_SESSION['just_logged_in']);
}
