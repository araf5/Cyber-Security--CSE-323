<?php
include_once('db_connection.php');
session_start();

// Check if the admin is already logged in
if (isset($_SESSION['admin'])) {
    header('Location: admin_index.php');
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate and sanitize input if needed

    // Check admin credentials
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;
        header('Location: admin_index.php');
        exit();
    } else {
        $loginError = "Invalid username or password";
    }
}
?>

<!-- Your original HTML code with correct references to CSS -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>

<div class="admin-container">
    <div class="admin-header">
        <h1>Admin Login</h1>
    </div>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <?php if (isset($loginError)) { ?>
            <p class="error"><?php echo $loginError; ?></p>
        <?php } ?>

        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>
