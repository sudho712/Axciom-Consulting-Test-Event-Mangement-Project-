<?php
// Database connection settings
$host = 'localhost';
$dbname = 'event_management';
$username = 'root';  // Change as per your database username
$password = '';      // Change as per your database password

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $productName = $_POST['product_name'];
        $productPrice = $_POST['product_price'];
        $productImage = $_FILES['product_image']['name'];

        // Move the uploaded image to a specific directory
        move_uploaded_file($_FILES['product_image']['tmp_name'], 'product_images/' . $productImage);

        // Insert product into the database
        $stmt = $conn->prepare("INSERT INTO products (product_name, product_price, product_image) VALUES (:product_name, :product_price, :product_image)");
        $stmt->bindParam(':product_name', $productName);
        $stmt->bindParam(':product_price', $productPrice);
        $stmt->bindParam(':product_image', $productImage);
        $stmt->execute();

        // Alert message for successful addition
        echo "<script>alert('Product added successfully!');</script>";
    }

    // Fetch products from the database
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item - Event Management System</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Event Management System</h1>
</div>

<style>
    .header {
        text-align: center;
        background-color: #3b5998;
        color: white;
        padding: 20px;
        margin-bottom: 20px;
    }
</style>


    <div class="container">
        <h2>Add New Item</h2>
        <form action="add_item.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="number" id="product_price" name="product_price" required>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" id="product_image" name="product_image" accept="image/*" required>
            </div>
            <button type="submit">Add Item</button>
        </form>
        <a href="show_item.php">View Products</a>
    </div>

</body>
</html>
