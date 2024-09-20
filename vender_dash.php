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
    <title>Transaction - Event Management System</title>
    <link rel="stylesheet" href="styles.css">
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

        .header {
            text-align: center;
            background-color: #3b5998;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0;
        }

        .transaction-details {
            margin: 20px 0;
        }

        .back-button {
            margin-top: 20px;
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
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Event Management System</h1>
    </div>

    <h2>Transaction Details</h2>

    <div class="transaction-details">
        <!-- You can fetch and display transaction details here -->
        <p>No transaction details available.</p>
    </div>

    <div class="back-button">
        <button onclick="window.location.href='index.php'">Back to Home</button>
    </div>
</div>

</body>
</html>
