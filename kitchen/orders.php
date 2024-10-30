<?php
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kitchen Orders</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .tab { padding: 10px; display: inline-block; cursor: pointer; }
        .active { background-color: #ccc; }
        table { margin: 20px auto; border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
    </style>
    <script>
        function showTab(tab) {
            var tabs = document.getElementsByClassName('order-tab');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = 'none';
            }
            document.getElementById(tab).style.display = 'block';
            var tabLinks = document.getElementsByClassName('tab');
            for (var i = 0; i < tabLinks.length; i++) {
                tabLinks[i].classList.remove('active');
            }
            document.getElementById(tab + '-link').classList.add('active');
        }
    </script>
</head>
<body>

<h2>Kitchen Orders</h2>

<div>
    <span class="tab active" id="pending-link" onclick="showTab('pending')">Pending Orders</span>
    <span class="tab" id="processing-link" onclick="showTab('processing')">Processing Orders</span>
    <span class="tab" id="delivered-link" onclick="showTab('delivered')">Delivered Orders</span>
    <span class="tab" id="undelivered-link" onclick="showTab('undelivered')">Undelivered Orders</span>
    <span class="tab" id="rejected-link" onclick="showTab('rejected')">Rejected Orders</span>
</div>

<div id="pending" class="order-tab">
    <h3>Pending Orders</h3>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Total Amount</th>
            <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM orders WHERE status = 'Pending'");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>₹" . $row['total_amount'] . "</td>
                    <td><a href='accept_order.php?order_id=" . $row['id'] . "'>Accept</a> | <a href='reject_order.php?order_id=" . $row['id'] . "'>Reject</a></td>
                  </tr>";
        }
        ?>
    </table>
</div>

<div id="processing" class="order-tab" style="display:none;">
    <h3>Processing Orders</h3>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Total Amount</th>
            <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM orders WHERE status = 'Processing'");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>₹" . $row['total_amount'] . "</td>
                    <td><a href='deliver_order.php?order_id=" . $row['id'] . "'>Delivered</a> | <a href='undeliver_order.php?order_id=" . $row['id'] . "'>Undelivered</a></td>
                  </tr>";
        }
        ?>
    </table>
</div>

<div id="delivered" class="order-tab" style="display:none;">
    <h3>Delivered Orders</h3>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Total Amount</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM orders WHERE status = 'Delivered'");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>₹" . $row['total_amount'] . "</td>
                  </tr>";
        }
        ?>
    </table>
</div>

<div id="undelivered" class="order-tab" style="display:none;">
    <h3>Undelivered Orders</h3>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Total Amount</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM orders WHERE status = 'Undelivered'");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>₹" . $row['total_amount'] . "</td>
                  </tr>";
        }
        ?>
    </table>
</div>

<div id="rejected" class="order-tab" style="display:none;">
    <h3>Rejected Orders</h3>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Total Amount</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM orders WHERE status = 'Rejected'");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>₹" . $row['total_amount'] . "</td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
