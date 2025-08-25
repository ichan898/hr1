<?php
// filepath: c:\xampp\htdocs\USER\user-account-form\RecruitManagement.php

// Include database connection
require_once 'db_connect.php';

$notification = "";
$screening_error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $resume = $_FILES["resume"] ?? null;

    // Basic screening
    if (empty($name) || empty($email) || !$resume || $resume['error'] !== 0) {
        $screening_error = "All fields are required and resume must be uploaded.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $screening_error = "Invalid email format.";
    } elseif (!in_array(strtolower(pathinfo($resume['name'], PATHINFO_EXTENSION)), ['pdf', 'doc', 'docx'])) {
        $screening_error = "Resume must be a PDF or Word document.";
    } else {
        // Duplicate checker
        $stmt = $conn->prepare("SELECT id FROM applications WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $notification = "You have already submitted an application.";
        } else {
            // Document management (upload)
            $upload_dir = __DIR__ . "/uploads/";
            if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
            $filename = uniqid() . "_" . basename($resume["name"]);
            $target_file = $upload_dir . $filename;
            if (move_uploaded_file($resume["tmp_name"], $target_file)) {
                // Insert into DB
                $stmt = $conn->prepare("INSERT INTO applications (name, email, resume) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $filename);
                if ($stmt->execute()) {
                    $notification = "Application submitted successfully!";
                } else {
                    $notification = "Database error. Please try again.";
                }
            } else {
                $notification = "Failed to upload resume.";
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recruitment Application Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Application Submission Portal</h2>
    <?php if ($screening_error): ?>
        <div style="color:red;"><?= $screening_error ?></div>
    <?php elseif ($notification): ?>
        <div style="color:<?= strpos($notification, 'success') !== false ? 'green' : 'red' ?>;"><?= $notification ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Resume (PDF/DOC/DOCX):</label>
        <input type="file" name="resume" accept=".pdf,.doc,.docx" required>
        <button type="submit">Submit Application</button>
    </form>
</div>
</body>
</html>