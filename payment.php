<?php
// Database connection settings (if needed)
$host = 'localhost';
$dbname = 'event_management';
$username = 'root'; // Change as per your database username
$password = '';     // Change as per your database password

try {
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
    <title>Payment Page - Event Management System</title>
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
            font-size: 36px;
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .total-amount {
            text-align: center;
            font-size: 24px;
            margin: 20px 0;
            color: #333;
        }

        .payment-options {
            margin-top: 20px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: auto;
        }

        button:hover {
            background-color: #2980b9;
        }

        .pay-more {
            margin-top: 20px;
            text-align: center;
        }

        .pay-more input {
            width: 100px;
            padding: 10px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Payment Options</h1>

    <div class="total-amount">
        Total Amount: 125
    </div>

    <div class="payment-options">
        <div class="payment-option">
            <span>Google Pay</span>
            <button onclick="window.location.href='bill.php?method=google_pay&amount=125'">Pay Now</button>
        </div>
        <div class="payment-option">
            <span>PhonePe</span>
            <button onclick="window.location.href='bill.php?method=phone_pe&amount=125'">Pay Now</button>
        </div>
        <div class="payment-option">
            <span>Paytm</span>
            <button onclick="window.location.href='bill.php?method=paytm&amount=125'">Pay Now</button>
        </div>
        <div class="payment-option">
            <span>Visa</span>
            <button onclick="window.location.href='bill.php?method=visa&amount=125'">Pay Now</button>
        </div>
        <div class="payment-option">
            <span>ATM/Debit/Credit Card</span>
            <button onclick="window.location.href='bill.php?method=credit_card&amount=125'">Pay Now</button>
        </div>
        <div class="payment-option">
            <span>PayPal</span>
            <button onclick="window.location.href='bill.php?method=paypal&amount=125'">Pay Now</button>
        </div>
    </div>

    
</div>

</body>
</html>
