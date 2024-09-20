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

// Sample cart items (In a real application, you would fetch this from a session or database)
$cartItems = [
    [
        'image' => 'path/to/image1.jpg',
        'name' => 'Item 1',
        'price' => 50.00,
        'quantity' => 2,
    ],
    [
        'image' => 'path/to/image2.jpg',
        'name' => 'Item 2',
        'price' => 25.00,
        'quantity' => 1,
    ],
    // Add more items as needed
];

function calculateTotalPrice($price, $quantity) {
    return $price * $quantity;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Event Management System</title>
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

        h1 {
            text-align: center;
            color: #e74c3c;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        .action {
            text-align: center;
        }

        .remove-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .remove-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Shopping Cart</h1>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" style="width: 100px;"></td>
                    <td><?php echo $item['name']; ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo number_format(calculateTotalPrice($item['price'], $item['quantity']), 2); ?></td>
                    <td class="action">
                        <button class="remove-button">Remove</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total-price">
        <h3>Total: $<?php echo number_format(array_sum(array_map(function($item) {
            return calculateTotalPrice($item['price'], $item['quantity']);
        }, $cartItems)), 2); ?></h3>
    </div>

    <div class="checkout-button" style="text-align: center;">
        <button onclick="window.location.href='payment.php'">Proceed to Checkout</button>
    </div>
</div>

</body>
</html>
