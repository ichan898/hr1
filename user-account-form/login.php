<?php
// ...existing code...
if ($login_successful) {
    header("Location: dashboard.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid credentials";
    header("Location: index.php");
    exit();
}
// ...existing code...