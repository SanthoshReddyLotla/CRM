<?php
require_once __DIR__. '/../models/User.php';

class AuthController {
    public function showLogin(){
        include __DIR__. '/../../views/auth/login.php';
    }

    public function showRegister(){
        include __DIR__. '/../../views/auth/register.php';
    }

    public function showForgotPassword(){
        include __DIR__. '/../../views/auth/forgot_password.php';
    }

    public function login($pdo){
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];

        User::setConnection($pdo);
        $user = User::findOneBy(['email' => $email]);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user'] = $email;
            header("Location: /../dashboard");
            exit;
        }
        else{
            $error = "Invalid email or password.";
            include __DIR__. '/../../views/auth/login.php';
        }
    }

    public function showDashboard(){
        include __DIR__. '/../../views/dashboard/index.php';
    }

    public function register($pdo){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $exists = User::findByEmail($pdo, $email);
        if($exists){
            $error = "Email already exists";
            include __DIR__. '/../../views/auth/register.php';
            return;
        }

        User::create($pdo, $name, $email, $password);
        header("Location : /login");
    }

    public function pageNotFound(){
        header("Location: /notFound");
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: /login");
    }
}

?>