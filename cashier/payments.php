<?php
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');

echo "<h2>Delivered Orders</h2>";
$result = $conn->query("SELECT * FROM orders WHERE status = 'Delivered'");
while ($row = $result->fetch_assoc()) {
    echo "Order ID: " . $row['id'] . " | Total: ₹" . $row['total_amount'] . "<br>";
    echo "<a href='generate_bill.php?order_id=".$row['id']."'>Generate Bill</a><br><br>";
}
?>
