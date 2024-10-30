<?php
session_start();
// Assuming cashier has no login form, just automatically login
$_SESSION['cashier_user'] = true; // This could be replaced with actual authentication logic
header("Location: cashier_dashboard.php");
exit();
?>
