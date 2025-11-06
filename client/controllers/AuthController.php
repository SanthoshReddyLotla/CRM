<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {

    public function showLogin() {
        include __DIR__ . '/../../views/auth/login.php';
    }

    public function showRegister() {
        include __DIR__ . '/../../views/auth/register.php';
    }

    public function showForgotPassword() {
        include __DIR__ . '/../../views/auth/forgot_password.php';
    }

    public function login($pdo) {
        session_start();

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        User::setConnection($pdo);
        $user = User::findOneBy(['email' => $email]);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user'] = $email;
            header("Location: /dashboard");
            exit;
        } else {
            $error = "Invalid email or password.";
            include __DIR__ . '/../../views/auth/login.php';
        }
    }

    public function showDashboard() {
        include __DIR__ . '/../../views/dashboard/index.php';
    }

    public function register($pdo) {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$name || !$email || !$password) {
            $error = "All fields are required.";
            include __DIR__ . '/../../views/auth/register.php';
            return;
        }

        $exists = User::findByEmail($pdo, $email);
        if ($exists) {
            $error = "Email already exists.";
            include __DIR__ . '/../../views/auth/register.php';
            return;
        }

        User::create($pdo, $name, $email, $password);
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
