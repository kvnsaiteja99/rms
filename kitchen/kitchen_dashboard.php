<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');

// Check if the user is logged in
if (!isset($_SESSION['kitchen_user'])) {
    header("Location: kitchen_login.php");
    exit();
}

// Fetch orders and their statuses
$pending_orders = $conn->query("SELECT * FROM orders WHERE status = 'Pending'");
$processing_orders = $conn->query("SELECT * FROM orders WHERE status = 'Processing'");
$delivered_orders = $conn->query("SELECT * FROM orders WHERE status = 'Delivered'");
$undelivered_orders = $conn->query("SELECT * FROM orders WHERE status = 'Undelivered'");
$rejected_orders = $conn->query("SELECT * FROM orders WHERE status = 'Rejected'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitchen Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .message { color: green; }
    </style>
</head>
<body>
    <h1>Kitchen Dashboard</h1>

    <?php if (isset($_GET['message'])): ?>
        <p class="message"><?php echo htmlspecialchars($_GET['message']); ?></p>
    <?php endif; ?>

    <h2>Pending Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($order = $pending_orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['item_name']; ?></td>
                <td><?php echo $order['table']; ?></td>
                <td><?php echo $order['status']; ?></td>
                <td>
                    <form action="process_order.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                        <button type="submit" name="accept">Accept</button>
                        <button type="submit" name="reject">Reject</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Processing Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($order = $processing_orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['item_name']; ?></td>
                <td><?php echo $order['table']; ?></td>
                <td><?php echo $order['status']; ?></td>
                <td>
                    <form action="deliver_order.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                        <button type="submit" name="delivered">Delivered</button>
                        <button type="submit" name="undelivered">Undelivered</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Delivered Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($order = $delivered_orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['item_name']; ?></td>
                <td><?php echo $order['table']; ?></td>
                <td><?php echo $order['status']; ?></td>
                <td>
                    <form action="process_payment.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                        <button type="submit" name="process_payment">Process Payment</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Undelivered Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
        <?php while ($order = $undelivered_orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['item_name']; ?></td>
                <td><?php echo $order['table']; ?></td>
                <td><?php echo $order['status']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Rejected Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
        <?php while ($order = $rejected_orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['item_name']; ?></td>
                <td><?php echo $order['table']; ?></td>
                <td><?php echo $order['status']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
