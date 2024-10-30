<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];
$total_amount = 0;
$item_names = [];

// Calculate total amount and prepare concatenated item names
$cart_items = $conn->query("SELECT * FROM cart WHERE customer_id = $customer_id");
while ($cart_item = $cart_items->fetch_assoc()) {
    $item = $conn->query("SELECT * FROM menu_items WHERE id = " . $cart_item['item_id'])->fetch_assoc();
    $total_amount += $item['price'] * $cart_item['quantity'];
    $item_names[] = $item['item_name'] . ' (Qty: ' . $cart_item['quantity'] . ')';
}

// Concatenate all item names into a single string
$item_names_str = implode(', ', $item_names);

// Insert order with concatenated item names
$conn->query("INSERT INTO orders (customer_id, total_amount, status, payment_status, item_name) VALUES ($customer_id, $total_amount, 'Pending', 'Pending', '$item_names_str')");

// Clear cart
$conn->query("DELETE FROM cart WHERE customer_id = $customer_id");

echo "<script>alert('Order placed successfully!'); window.location.href = 'menu.php';</script>";
?>
