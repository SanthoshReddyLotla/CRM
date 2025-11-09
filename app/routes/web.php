<?php
// app/routes/web.php

// Load shared configuration / database from project root
require_once __DIR__ . '/../../config/database.php';

// Load the app-specific AuthController (app's controllers live in app/controllers)
require_once __DIR__ . '/../controllers/AuthController.php';

// Expect $uri to be provided by index.php (no re-parsing here)
global $uri;

// Normalize route and allow both /api/xyz and /xyz to work
$route = preg_replace('#^api/#', '', trim((string)$uri, '/'));
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// API responses should be JSON
header('Content-Type: application/json; charset=utf-8');

// Initialize app AuthController (which exposes handle* methods)
$auth = new AuthController();

switch ($route) {
    // ---------------------------
    // AUTH (API) ROUTES - app-only handlers (handle*)
    // ---------------------------
    case '':
    case 'login':
        if ($method === 'POST') {
            // Expect AuthController::handleLogin(PDO $pdo)
            $auth->handleLogin($pdo);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed for /login']);
        }
        break;

    case 'register':
        if ($method === 'POST') {
            // Expect AuthController::handleRegister(PDO $pdo)
            $auth->handleRegister($pdo);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed for /register']);
        }
        break;

    case 'logout':
        if ($method === 'POST') {
            // Expect AuthController::handleLogout()
            // $auth->handleLogout();
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed for /logout']);
        }
        break;

    case 'forgotPassword':
        if ($method === 'POST') {
            // Expect AuthController::handleForgotPassword(PDO $pdo)
            // $auth->handleForgotPassword($pdo);
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed for /forgotPassword']);
        }
        break;

    // ---------------------------
    // Default / Not found
    // ---------------------------
    default:
        http_response_code(404);
        echo json_encode(['error' => 'API endpoint not found', 'route' => $route]);
        break;
}
