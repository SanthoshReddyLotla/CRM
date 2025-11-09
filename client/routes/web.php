<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/ProfileController.php';

// Use the $uri variable from index.php (no need to re-parse)
global $uri;

$route = $_GET['route'] ?? $uri;

$auth = new AuthController();
$profile = new ProfileController();

switch ($route) {
    case '':
    case 'login':
        $auth->showLogin();
        break;

    case 'register':
        $auth->showRegister();
        break;

    case 'forgotPassword':
        $auth->showForgotPassword();
        break;

    case 'dashboard':
        $auth->showDashboard();
        break;

    case 'profile':
        $profile->showProfile();
        break;

    case 'logout':
        $auth->logout();
        break;

    default:
        $auth->pageNotFound();
        break;
}
