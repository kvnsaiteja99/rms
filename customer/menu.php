<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'restaurant_billing_system');

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

// Get selected category from GET request
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';

// SQL query for menu items based on selected category
$category_sql = $category_filter ? "WHERE category = '$category_filter'" : '';
$menu_items = $conn->query("SELECT * FROM menu_items $category_sql");

// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $customer_id = $_SESSION['customer_id'];
    $conn->query("INSERT INTO cart (customer_id, item_id, quantity) VALUES ($customer_id, $item_id, $quantity) ON DUPLICATE KEY UPDATE quantity = $quantity");
}

$cart_items = $conn->query("SELECT * FROM cart WHERE customer_id = " . $_SESSION['customer_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        .quantity-control {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity-control button {
            padding: 5px;
            font-size: 16px;
        }
        .quantity-control input {
            width: 40px;
            text-align: center;
        }
        .filter-container {
            margin-bottom: 20px;
        }
    </style>
    <script>
        function updateQuantity(input, isIncrement) {
            let currentQuantity = parseInt(input.value);
            if (isIncrement) {
                input.value = currentQuantity + 1;
            } else if (currentQuantity > 1) {
                input.value = currentQuantity - 1;
            }
        }

        function filterMenu() {
            const category = document.getElementById('categoryFilter').value;
            window.location.href = `?category=${category}`;
        }
    </script>
</head>
<body>
    <h1>Menu</h1>
    
    <!-- Filter Selection -->
    <div class="filter-container">
        <label for="categoryFilter">Filter by Category:</label>
        <select id="categoryFilter" onchange="filterMenu()">
            <option value="">All</option>
            <option value="Veg" <?php if ($category_filter == 'Veg') echo 'selected'; ?>>Veg</option>
            <option value="Non-Veg" <?php if ($category_filter == 'Non-Veg') echo 'selected'; ?>>Non-Veg</option>
            <option value="Main Course" <?php if ($category_filter == 'Main Course') echo 'selected'; ?>>Main Course</option>
            <option value="Starters" <?php if ($category_filter == 'Starters') echo 'selected'; ?>>Starters</option>
        </select>
    </div>

    <table>
        <tr>
            <th>Item Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Add to Cart</th>
        </tr>
        <?php while ($item = $menu_items->fetch_assoc()): ?>
            <tr>
                <form method="post">
                    <td><?php echo $item['item_name']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td class="quantity-control">
                        <button type="button" onclick="updateQuantity(this.nextElementSibling, false)">-</button>
                        <input type="number" name="quantity" value="1" min="1" required readonly>
                        <button type="button" onclick="updateQuantity(this.previousElementSibling, true)">+</button>
                        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                    </td>
                    <td><button type="submit">Add to Cart</button></td>
                </form>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Your Cart</h2>
    <table>
        <tr>
            <th>Item Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php $total_amount = 0; ?>
        <?php while ($cart_item = $cart_items->fetch_assoc()): 
            $item = $conn->query("SELECT * FROM menu_items WHERE id = " . $cart_item['item_id'])->fetch_assoc();
            $item_total = $item['price'] * $cart_item['quantity'];
            $total_amount += $item_total;
        ?>
            <tr>
                <td><?php echo $item['item_name']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $cart_item['quantity']; ?></td>
                <td><?php echo $item_total; ?></td>
            </tr>
        <?php endwhile; ?>
        <tr>
            <td colspan="3">Total Amount</td>
            <td><?php echo $total_amount; ?></td>
        </tr>
    </table>

    <form method="post" action="place_order.php">
        <button type="submit">Place Order</button>
    </form>

    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
