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
    
    // Update order status based on button pressed
    if (isset($_POST['delivered'])) {
        // Update order status to Delivered
        $stmt = $conn->prepare("UPDATE orders SET status = 'Delivered' WHERE id = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();
        
        // Redirect back to kitchen dashboard with success message
        header("Location: kitchen_dashboard.php?message=Order Delivered");
    } elseif (isset($_POST['undelivered'])) {
        // Update order status to Undelivered
        $stmt = $conn->prepare("UPDATE orders SET status = 'Undelivered' WHERE id = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();
        
        // Redirect back to kitchen dashboard with success message
        header("Location: kitchen_dashboard.php?message=Order Marked as Undelivered");
    }
} else {
    // Redirect to kitchen dashboard if order_id is not set
    header("Location: kitchen_dashboard.php");
}
exit();
?>
