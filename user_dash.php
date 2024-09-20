<?php
// Database connection settings
$host = 'localhost';
$dbname = 'event_management';
$username = 'root'; // Change as per your database username
$password = '';     // Change as per your database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Event Management System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        /* Top header styling */
        .header {
            text-align: center;
            background-color: #3b5998;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Top bar styling */
        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .top-bar .buttons {
            display: flex;
            gap: 10px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            color: #3498db;
            margin-bottom: 40px;
        }

        h3 {
            color: #333;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 40px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-size: 18px;
            transition: color 0.3s;
        }

        a:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Event Management System</h1>
</div>

<div class="container">
    <!-- Top Bar with Back and Logout Buttons -->
    <div class="top-bar">
        <div class="buttons">
            <button onclick="window.history.back();">Back</button>
            <button onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>

    <!-- Dashboard Heading -->
    <h2>User Dashboard</h2>

    <!-- Vendor Services Section -->
    <div class="section vendor-options">
        <h3>Vendor Services</h3>
        <ul>
            <li><a href="catering.php">Catering</a></li>
            <li><a href="florist.php">Florist</a></li>
            <li><a href="decoration.php">Decoration</a></li>
            <li><a href="lighting.php">Lighting</a></li>
        </ul>
    </div>

    <!-- Cart Section -->
    <div class="section cart-options">
        <h3>Cart</h3>
        <a href="cart.php">View Cart</a>
    </div>

    <!-- Guest List Section -->
    <div class="section guestlist-options">
        <h3>Guest List</h3>
        <a href="guest_list.php">Manage Guest List</a>
        <div class="add-guest-option">
            <a href="guest_list.php">Add Guest</a>
        </div>
    </div>

    <!-- Order Status Section -->
    <div class="section order-status-options">
        <h3>Order Status</h3>
        <a href="orderstatus.php">Check Order Status</a>
    </div>
</div>

</body>
</html>
