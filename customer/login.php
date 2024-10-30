<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $table_number = $_POST['table_number'];

    // Insert customer into the database
    $conn->query("INSERT INTO customers (name, table_number) VALUES ('$name', $table_number)");
    $_SESSION['customer_id'] = $conn->insert_id; // Save customer ID in session

    header("Location: menu.php");
    exit();
}
?>
