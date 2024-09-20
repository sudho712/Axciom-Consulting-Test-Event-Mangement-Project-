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

    // Handle vendor management form submission
    if (isset($_POST['add_vendor'])) {
        $vendorName = $_POST['vendor_name'];
        $vendorPassword = password_hash($_POST['vendor_password'], PASSWORD_DEFAULT); // Hashing the password

        // Insert vendor into the database
        $stmt = $conn->prepare("INSERT INTO venders (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $vendorName);
        $stmt->bindParam(':password', $vendorPassword);
        $stmt->execute();
    }

    // Fetch vendors from the database
    $stmt = $conn->prepare("SELECT * FROM venders");
    $stmt->execute();
    $venders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Handle user management (similar to vendor management)
    if (isset($_POST['add_user'])) {
        $userName = $_POST['user_name'];
        $userPassword = password_hash($_POST['user_password'], PASSWORD_DEFAULT); // Hashing the password

        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $userName);
        $stmt->bindParam(':password', $userPassword);
        $stmt->execute();
    }

    // Fetch users from the database
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Event Management System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->

    <style>
        /* Basic styling for the dashboard */
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

        h3 {
            margin-top: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: 2px solid #3498db; /* Outline color */
        }

        button {
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9; /* Darker shade on hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            margin-right: 10px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Admin Dashboard</h2>

        <!-- Vendor Management Section -->
        <h3>Vendor Management</h3>
        <form action="admin_dash.php" method="post">
            <input type="text" name="vendor_name" placeholder="Vendor Username" required>
            <input type="password" name="vendor_password" placeholder="Vendor Password" required>
            <button type="submit" name="add_vendor">Add Vendor</button>
        </form>

        <h4>Venders List</h4>
        <table>
            <tr>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($venders as $vender): ?>
                <tr>
                    <td><?php echo htmlspecialchars($vender['username']); ?></td>
                    <td>
                        <a href="update_vender.php?id=<?php echo $vendor['id']; ?>" style="color: #f39c12;">Update</a>
                        <a href="delete_vender.php?id=<?php echo $vendor['id']; ?>" style="color: #e74c3c;">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- User Management Section -->
        <h3>User Management</h3>
        <form action="admin_dash.php" method="post">
            <input type="text" name="user_name" placeholder="User Username" required>
            <input type="password" name="user_password" placeholder="User Password" required>
            <button type="submit" name="add_user">Add User</button>
        </form>

        <h4>Users List</h4>
        <table>
            <tr>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td>
                        <a href="update_user.php?id=<?php echo $user['id']; ?>" style="color: #f39c12;">Update</a>
                        <a href="delete_user.php?id=<?php echo $user['id']; ?>" style="color: #e74c3c;">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>
</html>
