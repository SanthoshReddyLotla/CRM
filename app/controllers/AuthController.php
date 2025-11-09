<?php
require_once __DIR__ . '/../../models/User.php';

class AuthController {

    public function handleLogin($pdo) {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        User::setConnection($pdo);
        $user = User::findOneBy(['email' => $email]);

        if ($user && password_verify($password, $user->password)) {

            if (session_status() === PHP_SESSION_NONE) session_start();
            // regenerate id and set session values
            session_regenerate_id(true);
            $_SESSION['user']      = $user->email;
            $_SESSION['user_id']   = $user->id ?? null;
            $_SESSION['role']      = $user->role ?? 'user';
            $_SESSION['__fingerprint']   = $this->session_fingerprint(); // or compute inline if function not available
            $_SESSION['__created_at']    = time();
            $_SESSION['__last_activity'] = time();
            // optional: flag used by session_check bootstrap (not required)
            $_SESSION['just_logged_in'] = true;

            // ensure session data is written before redirect
            session_write_close();

            // Use 303 to enforce a GET on the redirect target (prevents POST resubmit on refresh)
            header('Location: /dashboard', true, 303);
            exit;

        } else {
            $error = "Invalid email or password.";
            header("Location: /login");
            // include __DIR__ . '/../../views/auth/login.php';
        }
    }

    public function handleRegister($pdo) {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$name || !$email || !$password) {
            $error = "All fields are required.";
            header("Location: /register");
            // include __DIR__ . '/../../views/auth/register.php';
            return;
        }

        $user = User::findOneBy(['email' => $email]);
        if ($user) {
            $error = "Email already exists.";
            header("Location: /login");
            // include __DIR__ . '/../../views/auth/register.php';
            return;
        }

        // User::create($pdo, $name, $email, $password);
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

    function session_fingerprint(): string {
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $parts = explode('.', $ip);
            $ip_frag = ($parts[0] ?? '') . '.' . ($parts[1] ?? '');
        } else {
            $parts = explode(':', $ip);
            $ip_frag = $parts[0] ?? '';
        }
        return hash('sha256', $ua . '|' . $ip_frag);
    }
}
?>
