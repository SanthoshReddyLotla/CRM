<?php 
require_once __DIR__. '/../config/database.php';

class User {
    public static function create($pdo, $name, $email, $password){
        $hashed = password_hash($password,PASSWORD_BCRYPT);
        $smtp = $pdo->prepare("INSERT INTO users (name, email, password) VALUES(?,?,?)");
        return $smtp->execute([$name, $email, $hashed]);
    }

    public static function findByEmail($pdo, $email){
        $smtp = $pdo->prepare('SELECT * FROM users Where email = ?');
        $smtp ->execute([$email]);
        return $smtp -> fetch(PDO::FETCH_ASSOC);
    }
}
?>