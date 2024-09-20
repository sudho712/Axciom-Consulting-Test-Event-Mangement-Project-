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

    // Handle guest addition
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_guest'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $event = $_POST['event'];

        // Insert guest into the database
        $stmt = $conn->prepare("INSERT INTO guests (name, email, phone, event) VALUES (:name, :email, :phone, :event)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':event', $event);
        $stmt->execute();

        header('Location: guest_list.php'); // Refresh the page after insertion
        exit;
    }

    // Handle guest deletion
    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];

        // Delete the guest from the database
        $stmt = $conn->prepare("DELETE FROM guests WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: guest_list.php'); // Refresh the page after deletion
        exit;
    }

    // Fetch guest data from the database
    $stmt = $conn->prepare("SELECT * FROM guests");
    $stmt->execute();
    $guests = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest List</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
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

        .header {
            text-align: center;
            background-color: #3b5998;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
        }

        h2 {
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td {
            text-align: center;
        }

        button, a {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete {
            background-color: #e74c3c;
            color: white;
        }

        .update {
            background-color: #f39c12;
            color: white;
        }

        .add {
            background-color: #2ecc71;
            color: white;
            display: inline-block;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        form input {
            margin-right: 5px;
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            flex: 0;
        }
    </style>
</head>
<body>

<div class="header">
            <h1>Event Management System</h1>
        </div>
    <div class="container">
        <!-- Header -->
        

        <h2>Guest List</h2>

        <!-- Add Guest Form -->
        <form action="guest_list.php" method="post">
            <input type="text" name="name" placeholder="Guest Name" required>
            <input type="email" name="email" placeholder="Guest Email" required>
            <input type="text" name="phone" placeholder="Phone Number">
            <input type="text" name="event" placeholder="Event" required>
            <button type="submit" name="add_guest" class="add">Add Guest</button>
        </form>

        <!-- Guest List Table -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Event</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($guests as $guest): ?>
                <tr>
                    <td><?php echo htmlspecialchars($guest['id']); ?></td>
                    <td><?php echo htmlspecialchars($guest['name']); ?></td>
                    <td><?php echo htmlspecialchars($guest['email']); ?></td>
                    <td><?php echo htmlspecialchars($guest['phone']); ?></td>
                    <td><?php echo htmlspecialchars($guest['event']); ?></td>
                    <td>
                        <a href="update_guest.php?id=<?php echo $guest['id']; ?>" class="update">Update</a>
                        <a href="guest_list.php?delete_id=<?php echo $guest['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this guest?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>
</html>
