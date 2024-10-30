<?php
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    foreach ($_POST['quantity'] as $item_id => $quantity) {
        if ($quantity > 0) {
            $conn->query("INSERT INTO cart (customer_id, item_id, quantity) VALUES ('$customer_id', '$item_id', '$quantity')");
        }
    }
    echo "Items added to cart. <a href='place_order.php?customer_id=$customer_id'>Place Order</a>";
}
?>
