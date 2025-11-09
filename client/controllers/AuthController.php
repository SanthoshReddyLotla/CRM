<?php
require_once __DIR__ . '/../../models/User.php';

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

    public function showDashboard() {
        include __DIR__ . '/../../views/dashboard/index.php';
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
