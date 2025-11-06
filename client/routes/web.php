<?php
// client/routes/web.php

require_once __DIR__ . "/../controllers/AuthController.php";
require_once __DIR__ . "/../controllers/ProfileController.php";

// Normalize URI path (no query string), trimmed of leading/trailing slashes
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// If request is POST OR starts with "api", forward to the API router
if ($_SERVER['REQUEST_METHOD'] === 'POST' || str_starts_with($uri, 'api')) {
    // route to app API router
    require_once __DIR__ . '/../../app/routes/web.php';
    exit;
}

// From here on we only handle non-POST (GET/other) client routes
$route = $_GET['route'] ?? $uri;
$auth  = new AuthController();
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
