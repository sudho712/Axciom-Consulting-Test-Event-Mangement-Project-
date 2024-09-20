<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Event Management System</title>
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
            margin-bottom: 20px;
        }

        .details {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }

        .details p {
            margin: 5px 0;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
        }

        .back-button a {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .back-button a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Payment Successful!</h1>
    <div class="details">
        <p><strong>Total Payment:</strong> $125</p>
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Phone Number:</strong> 123-456-7890</p>
        <p><strong>Email Address:</strong> johndoe@example.com</p>
        <p><strong>State:</strong> California</p>
        <p><strong>City:</strong> Los Angeles</p>
        <p><strong>Pin Code:</strong> 90001</p>
    </div>

    <div class="back-button">
        <a href="index.php">Back to Home</a>
    </div>
</div>

</body>
</html>
