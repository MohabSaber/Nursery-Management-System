<?php
class SessionManager {
    public function destroySession() {
        session_start();
        session_destroy();
        header("location:index.php");
        exit(); // Always good practice to exit after a header redirect
    }
}

$sessionManager = new SessionManager();
$sessionManager->destroySession();
?>
