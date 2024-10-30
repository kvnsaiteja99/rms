<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Billing System</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Restaurant Billing System</h1>
    <div class="login">
        <h2>Customer Login</h2>
        <form action="customer/login.php" method="post">
            <input type="text" name="name" placeholder="Enter Name" required>
            <input type="number" name="table_number" placeholder="Enter Table Number" required>
            <button type="submit">Login</button>
        </form>
    </div>
    <div class="login">
        <h2>Kitchen Login</h2>
        <form action="kitchen/kitchen_login.php" method="post">
            <button type="submit">Login</button>
        </form>
    </div>
    <div class="login">
        <h2>Cashier Login</h2>
        <form action="cashier/cashier_login.php" method="post">
            <button type="submit">Login</button>
        </form>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
