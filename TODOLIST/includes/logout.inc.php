<?php
session_start();
session_unset();  // Unset session variables
session_destroy();  // Destroy session data on server

// 🧹 Delete the session cookie from browser
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect to login page
header("Location: ../index.php");
exit();
