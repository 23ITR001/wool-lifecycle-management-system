<?php include 'db_connect.php'; ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WoolLife Cycle Management</title>
    <link rel="stylesheet" href="style.css">
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

<!-- Login Section -->
<section id="login">
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <div class="button-group">
            <button type="submit" name="login">Login</button>
            <button type="reset">Reset</button>
            <h4>Don't have account?<a href="signup.php" class="signup-button">Register</a></h4>
        </div>
    </form>
</section>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        if ($user['role'] == 'admin') {
            header('Location: admin_dashboard.php');
            exit;
        } else {
            header('Location: user_dashboard.php');
            exit;
        }
    } else {
        echo "<p class='error'>Invalid credentials.</p>";
    }
}
?>
</body>
</html>
