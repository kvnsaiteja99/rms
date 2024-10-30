<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simple authentication logic (replace with actual authentication)
    $_SESSION['kitchen_user'] = true; // This could be replaced with actual authentication logic
    header("Location: kitchen_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitchen Login</title>
</head>
<body>
    <h1>Kitchen Login</h1>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
