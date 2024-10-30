<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');

// Check for valid kitchen user session
if (!isset($_SESSION['kitchen_user'])) {
    header("Location: kitchen_login.php");
    exit();
}

// Check if order_id is set in the POST request
if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    
    // Accept or reject based on button pressed
    if (isset($_POST['accept'])) {
        // Update order status to Processing
        $stmt = $conn->prepare("UPDATE orders SET status = 'Processing' WHERE id = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();
        
        // Redirect back to kitchen dashboard with success message
        header("Location: kitchen_dashboard.php?message=Order Accepted");
    } elseif (isset($_POST['reject'])) {
        // Update order status to Rejected
        $stmt = $conn->prepare("UPDATE orders SET status = 'Rejected' WHERE id = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();
        
        // Redirect back to kitchen dashboard with success message
        header("Location: kitchen_dashboard.php?message=Order Rejected");
    }
} else {
    // Redirect to kitchen dashboard if order_id is not set
    header("Location: kitchen_dashboard.php");
}
exit();
?>
