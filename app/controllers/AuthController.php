<?php
require_once __DIR__ . '/../../models/User.php';

class AuthController {

    public function handleLogin($pdo) {
        session_start();

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        User::setConnection($pdo);
        $user = User::findOneBy(['email' => $email]);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user'] = $email;
            $_SESSION['role'] = $user->role;
            header("Location: /dashboard");
            exit;
        } else {
            $error = "Invalid email or password.";
            header("Location: /login");
            // include __DIR__ . '/../../views/auth/login.php';
        }
    }

    public function handleRegister($pdo) {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$name || !$email || !$password) {
            $error = "All fields are required.";
            header("Location: /register");
            // include __DIR__ . '/../../views/auth/register.php';
            return;
        }

        $user = User::findOneBy(['email' => $email]);
        if ($user) {
            $error = "Email already exists.";
            header("Location: /login");
            // include __DIR__ . '/../../views/auth/register.php';
            return;
        }

        // User::create($pdo, $name, $email, $password);
        header("Location: /login");
        exit;
    }

    public function pageNotFound() {
        http_response_code(404);
        include __DIR__ . '/../../views/errors/404.php';
        exit;
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /login");
        exit;
    }
}
?>
