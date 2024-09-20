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

    // Check if vendor ID is provided
    if (isset($_GET['id'])) {
        $vendorId = $_GET['id'];

        // Fetch the existing vendor data
        $stmt = $conn->prepare("SELECT * FROM vendors WHERE id = :id");
        $stmt->bindParam(':id', $vendorId);
        $stmt->execute();
        $vendor = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$vendor) {
            echo "Vendor not found!";
            exit;
        }

        // Handle form submission for updating vendor details
        if (isset($_POST['update_vendor'])) {
            $vendorName = $_POST['vendor_name'];
            $vendorPassword = password_hash($_POST['vendor_password'], PASSWORD_DEFAULT); // Hashing the new password

            // Update the vendor data
            $stmt = $conn->prepare("UPDATE vendors SET username = :username, password = :password WHERE id = :id");
            $stmt->bindParam(':username', $vendorName);
            $stmt->bindParam(':password', $vendorPassword);
            $stmt->bindParam(':id', $vendorId);
            $stmt->execute();

            // Redirect to the admin dashboard after successful update
            header('Location: admin_dash.php');
            exit;
        }
    } else {
        echo "No vendor ID provided!";
        exit;
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vendor</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h2>Update Vendor</h2>
        <form action="update_vendor.php?id=<?php echo $vendor['id']; ?>" method="post">
            <div class="form-group">
                <label for="vendor_name">Vendor Username</label>
                <input type="text" id="vendor_name" name="vendor_name" value="<?php echo htmlspecialchars($vendor['username']); ?>" required>
            </div>
            <div class="form-group">
                <label for="vendor_password">New Vendor Password</label>
                <input type="password" id="vendor_password" name="vendor_password" required>
            </div>
            <button type="submit" name="update_vendor">Update Vendor</button>
        </form>
    </div>
</body>
</html>
