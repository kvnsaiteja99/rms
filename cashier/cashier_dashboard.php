<?php
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');

// Fetch all paid orders for the cashier dashboard
$paid_orders = $conn->query("SELECT * FROM orders WHERE payment_status = 'Paid'");

// Logout functionality
if (isset($_POST['logout'])) {
    // Destroy the session or perform logout actions
    session_start();
    session_destroy(); // This will clear all session data
    header("Location: http://localhost/rms/index.php"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cashier Dashboard - Paid Orders</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; font-weight: bold; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        h2 { text-align: center; }

        /* Print styling */
        @media print {
            body * { visibility: hidden; }
            .print-section, .print-section * { visibility: visible; }
            .print-section { position: absolute; top: 0; left: 0; width: 100%; }
            .print-section h2, .print-section p { margin: 0; }
            .print-section hr { margin: 10px 0; }
        }

        /* Print section styling */
        .print-section {
            padding: 20px;
            text-align: center;
            border: 1px solid #000;
            width: 300px;
            margin: 0 auto;
            display: none;
        }

        .print-section h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .print-section p {
            font-size: 18px;
            margin: 5px 0;
        }

        .print-section ul {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
        }

        .print-section ul li {
            font-size: 16px;
            padding: 5px 0;
        }

        /* Logout button styling */
        .logout-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #f44336; /* Red color for logout */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }
    </style>
</head>
<body>

<h2>Paid Orders</h2>
<table>
    <tr>
        <th>Order ID</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Total Amount (₹)</th>
        <th>Action</th>
    </tr>
    <?php while ($order = $paid_orders->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($order['id']); ?></td>
            <td><?php echo htmlspecialchars($order['item_name']); ?></td>
            <td><?php echo htmlspecialchars($order['table']); ?></td>
            <td><?php echo htmlspecialchars($order['total_amount']); ?></td>
            <td>
                <button onclick="printOrder(<?php echo htmlspecialchars(json_encode($order)); ?>)">Print Bill</button>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<!-- Hidden print section -->
<div id="print-section" class="print-section">
    <h2>Budgetbox Restaurant</h2>
    <p>Vignan University, Guntur</p>
    <hr>
    <p>Order ID: <span id="print-order-id"></span></p>
    <ul id="print-item-list"></ul>
    <p>Total Amount (₹): <span id="print-total-amount"></span></p>
    <hr>
    <p>Thank you for dining with us!</p>
</div>

<!-- Logout Button -->
<form method="POST">
    <button type="submit" name="logout" class="logout-button">Logout</button>
</form>

<script>
function printOrder(order) {
    // Fill print section with order data
    document.getElementById('print-order-id').textContent = order.id;

    // Clear the previous item list
    const itemList = document.getElementById('print-item-list');
    itemList.innerHTML = '';

    // Assuming item names are separated by commas in 'item_name'
    const items = order.item_name.split(',');
    items.forEach(item => {
        const li = document.createElement('li');
        li.textContent = item.trim();
        itemList.appendChild(li);
    });

    // Fill total amount
    document.getElementById('print-total-amount').textContent = order.total_amount;

    // Show print section and trigger print
    document.getElementById('print-section').style.display = 'block';
    window.print();

    // Hide print section after print dialog
    document.getElementById('print-section').style.display = 'none';
}
</script>

</body>
</html>
