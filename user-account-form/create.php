<?php
require_once 'config.php';

// Initialize database and table
initializeDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input
    $username = htmlspecialchars(trim($_POST["username"] ?? ''));
    $password = htmlspecialchars(trim($_POST["password"] ?? ''));

    // Simple validation
    if (empty($username) || empty($password)) {
        $error = "All fields are required.";
    } else {
        try {
            $pdo = getDBConnection();
            
            // Check if username already exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            
            if ($stmt->fetch()) {
                $error = "Username already exists. Please choose a different one.";
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new user
                $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->execute([$username, $hashedPassword]);
                
                $success = "Account created successfully for user: <strong>$username</strong>";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Create Account</h2>
        <?php if (!empty($error)): ?>
            <div style="color: red; text-align: center;"><?= $error ?></div>
        <?php elseif (!empty($success)): ?>
            <div style="color: green; text-align: center;"><?= $success ?></div>
        <?php endif; ?>
        <form method="post" action="create.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Create Account</button>
        </form>
    </div>
</body>
</html>