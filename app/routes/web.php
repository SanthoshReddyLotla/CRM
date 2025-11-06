<?php
require_once __DIR__. "/../controllers/AuthController.php";

$route = $_GET['route'] ?? trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$auth = new AuthController();

switch($route){
    case '':
    case 'login';
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth -> login($pdo);
        }    
        else{
            $auth -> showLogin();
        }
        break;
    case 'register';
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $auth -> register($pdo);
        }
        else{
            $auth -> showRegister();
        }
        break;
    case 'forgotPassword';
        $auth -> showForgotPassword();
        break;
    case 'dashboard';
        $auth -> showDashboard();
        break;
    case 'logout';
        $auth -> logout();
        break;
    default:
        $auth -> pageNotFound();
        break;
}

?>