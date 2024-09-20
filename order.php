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
    
    // Fetch orders for a specific user (assuming user ID is 1 for demonstration)
    $user_id = 1; // Replace with actual user ID logic
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    $orders = []; // Initialize $orders to an empty array in case of failure
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page - Event Management System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
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

        h1 {
            text-align: center;
            font-size: 36px;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 30px;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            color: #3498db;
            margin-bottom: 40px;
        }

        .order-status {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .order-item {
            margin-bottom: 15px;
        }

        .order-item h3 {
            color: #333;
            margin: 0;
        }

        .order-item p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Top Bar with Back and Logout Buttons -->
    <div class="top-bar">
        <div class="buttons">
            <button onclick="window.history.back();">Back</button>
            <button onclick="window.location.href='logout.php'">Logout</button>
        </div>
    </div>

    <!-- Main Heading -->
    <h1>Event Management System</h1>

    <!-- Order Status Heading -->
    <h2>Order Status</h2>

    <!-- Order Status Section -->
    <div class="order-status">
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <div class="order-item">
                    <h3>Order #<?php echo htmlspecialchars($order['order_number']); ?></h3>
                    <p>Status: <?php echo htmlspecialchars($order['status']); ?></p>
                    <p>Date: <?php echo htmlspecialchars($order['order_date']); ?></p>
                    <p>Total Amount: $<?php echo htmlspecialchars($order['total_amount']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No orders found for this user.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
