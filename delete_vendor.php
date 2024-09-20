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

        // Delete the vendor
        $stmt = $conn->prepare("DELETE FROM vendors WHERE id = :id");
        $stmt->bindParam(':id', $vendorId);
        $stmt->execute();

        // Redirect to the admin dashboard after deletion
        header('Location: admin_dash.php');
        exit;
    } else {
        echo "No vendor ID provided!";
        exit;
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
