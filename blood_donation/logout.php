<?php
// 1. Start the session to gain access to the current session data
session_start();

// 2. Unset all session variables
$_SESSION = array();

// 3. Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Destroy the session on the server
session_destroy();

// 5. Delete the "Remember Me" Cookie (set expiration time to the past)
setcookie("donor_email", "", time() - 3600, "/");

// 6. Redirect back to login page
header("Location: index.php");
exit();
?>
