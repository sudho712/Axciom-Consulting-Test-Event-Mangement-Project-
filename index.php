<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event Management System</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navigation */
        nav {
            background-color: #34495e;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            width: 100%;
        }

        nav a {
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        nav a:hover {
            background-color: #2c3e50;
        }

        .nav-title {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Main Container */
        .container {
            flex: 1;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        /* Image Gallery */
        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .image-gallery img {
            width: 48%; /* Adjusted for two images per row */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 10px; /* Space between images */
            border-radius: 8px;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #3b5998;
            color: white;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- Navigation Section -->
    <nav>
        <div class="nav-title">Event Management System</div>
        <div class="nav-right">
            <a href="#home">Home</a>
            <a href="user_login.php">User Login</a>
            <a href="vender_login.php">Vendor Login</a>
            <a href="admin_login.php">Admin Login</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h2>Welcome to the Event Management System</h2>
        <p>Please use the navigation above to login as a user or admin.</p>

        <!-- Image Gallery -->
        <div class="image-gallery">
            <img src="https://th.bing.com/th?id=OIP.kBwvBKH-J2LZh0HImKaTAAHaE8&w=305&h=204&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2" alt="Event Image 1">
            <img src="https://th.bing.com/th?id=OIP.BkHRRnULi6_ptNgBOFEoEwHaE8&w=305&h=204&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2" alt="Event Image 2">
            <img src="https://th.bing.com/th?id=OIP.HdETgqkYpSTZhRHQcDetIgHaFS&w=295&h=211&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2" alt="Event Image 3">
            <img src="https://th.bing.com/th?id=OIP.GnDAMqcCtRruUYrweW6qaQHaFC&w=303&h=206&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2" alt="Event Image 4">
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Event Management System</p>
    </footer>

</body>
</html>
