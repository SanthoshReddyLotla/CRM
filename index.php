<?php
// Normalize URI path (no query string), trimmed of leading/trailing slashes
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// If POST or route starts with "api", route directly to the app (API) router
if ($_SERVER['REQUEST_METHOD'] === 'POST' || str_starts_with($uri, 'api')) {
    require_once __DIR__ . '/app/routes/web.php';
} else {
    require_once __DIR__ . '/client/routes/web.php';
}