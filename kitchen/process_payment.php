<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['kitchen_user'])) {
    header("Location: kitchen_login.php");
    exit();
}

// Process payment if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['process_payment'])) {
    $order_id = intval($_POST['order_id']);

    // Update the order status to 'Paid'
    $stmt = $conn->prepare("UPDATE orders SET payment_status = 'Paid' WHERE id = ?");
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        // Redirect back to the kitchen dashboard with a success message
        header("Location: kitchen_dashboard.php?message=Payment processed successfully.");
        exit();
    } else {
        // Handle error
        echo "Error processing payment: " . $conn->error;
    }

    $stmt->close();
} else {
    // If accessed directly without POST, redirect to the dashboard
    header("Location: kitchen_dashboard.php");
    exit();
}

$conn->close();
?>