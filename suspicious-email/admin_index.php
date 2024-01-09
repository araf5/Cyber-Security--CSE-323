<?php
include_once('db_connection.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

// Check if the form for adding a keyword is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addKeyword'])) {
    $newKeyword = $_POST['newKeyword'];
    // Validate and sanitize the input if needed

    // Insert the new keyword into the phishing_keywords table
    $sql = "INSERT INTO phishing_keywords (keyword) VALUES ('$newKeyword')";
    mysqli_query($conn, $sql);
}

// Check if the form for removing a keyword is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['removeKeyword'])) {
    $keywordId = $_POST['removeKeyword'];
    // Validate and sanitize the input if needed

    // Remove the selected keyword from the phishing_keywords table
    $sql = "DELETE FROM phishing_keywords WHERE id = $keywordId";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>

<div class="admin-container">
    <div class="admin-header">
        <h1>Welcome to Admin Panel</h1>
    </div>

    <div class="admin-options">
        <a href="user_signup.php" class="admin-option">User Sign Up</a>
        <div class="admin-option" onclick="changePassword()">Change Admin Password</div>
        <div class="admin-option" onclick="setKeywords()">Set Keywords</div>
        <div class="admin-option" onclick="removeUser()">Remove User</div>
        <div class="admin-option" onclick="showSuspiciousWarning()">Show Suspicious Warning</div>
        <div class="admin-option" onclick="logout()">Log-out</div>
        <a href="user_dashboard.php" class="admin-option">User Dashboard</a>
    </div>

    <div id="admin-content" class="admin-content">
        <!-- Content will be loaded dynamically here based on user interaction -->
    </div>
</div>

<script src="admin_script.js"></script>
</body>
</html>
