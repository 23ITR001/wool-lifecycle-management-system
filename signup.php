<?php include 'db_connect.php'; ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - WoolLife Cycle Management</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <h1>WoolLife Cycle Management</h1>
        <p>Your guide from sheep to fabric</p>
    </header>
<nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_dashboard.php">Buy Products</a></li>
            <li><a href="wool_price.php">Current Wool Price</a></li>
            <li><a href="login.php">Admin Login</a></li>
            <li><a href="signup.php">User Login</a></li>
        </ul>
    </nav>
    <!-- Sign Up Section -->
    <section id="signup">
        <h2>Register</h2>
        <form method="POST" action="signup.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="role">Role:</label>
            <select name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit" name="signup">Sign Up</button>
        </form>
    </section>

    <?php
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        // Insert user with role into the database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $email, $password, $role])) {
            echo "<p class='success'>Registration successful!</p>";
        } else {
            echo "<p class='error'>Error registering user.</p>";
        }
    }
    ?>
</body>
</html>
