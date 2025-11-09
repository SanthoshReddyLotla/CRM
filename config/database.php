<?php
$envPath = __DIR__ . '/../.env';
$env = parse_ini_file($envPath);

$host = $env['HOST'];
$dbname = $env['DBNAME'];
$user = $env['USER'];
$pass = $env['PASS'];

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Database connection failed: " . $e->getMessage());
}
