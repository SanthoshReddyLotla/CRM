<?php
// app/routes/web.php

// Ensure we can access API controllers. Adjust path to where your Api/Auth controllers live.
require_once __DIR__ . '/../../client/controllers/AuthController.php';
// Optionally require other API controllers here, e.g. UserApiController, etc.

// Normalize URI and strip optional leading "api/" so this router works for both
// POST /login  and POST /api/login
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$route = preg_replace('#^api/#', '', $uri);

$method = $_SERVER['REQUEST_METHOD'];

// Re-use AuthController for API endpoints in this example.
// You can create a separate ApiAuthController if you prefer JSON-only responses.
$auth = new AuthController();

switch ($route) {
    case '':
    case 'login':
        if ($method === 'POST') {
            // handle login as API (expects $_POST or JSON body depending on your controller)
            // pass $pdo if your controller expects it
            $auth->login($pdo);
        } else {
            // If somehow a non-POST request reaches here, return a 405 or route to client
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            echo 'Method not allowed for API login';
        }
        break;

    case 'register':
        if ($method === 'POST') {
            $auth->register($pdo);
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            echo 'Method not allowed for API register';
        }
        break;

    case 'logout':
        if ($method === 'POST') {
            $auth->logout();
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            echo 'Method not allowed for API logout';
        }
        break;

    // Example API-only endpoints (adjust/expand as needed)
    case 'forgotPassword':
        if ($method === 'POST') {
            // e.g. send reset email
            // $auth->forgotPasswordHandler();
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            echo 'Method not allowed for API forgotPassword';
        }
        break;

    default:
        // Not found in API routes
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo 'API endpoint not found';
        break;
}
