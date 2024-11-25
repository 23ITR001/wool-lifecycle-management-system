<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wool Daily Price - WoolLife Cycle Management</title>
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header class="header">
    <h1>WoolLife Cycle Management</h1>
    <p>Your guide from sheep to fabric</p>
</header>

<!-- Navigation Bar -->
<nav class="navbar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="user_dashboard.php">Buy Products</a></li>
        <li><a href="wool_price.php">Current Wool Price</a></li>
        <li><a href="login.php">Admin Login</a></li>
        <li><a href="signup.php">User Login</a></li>
    </ul>
</nav>

<main>
    <section id="wool-price" class="price-section">
        <div class="summary-card">
            <h3 class="text-center">Wool Rate Today in India</h3>
            <table class="price-table">
                <tbody>
                    <tr><td>KG Price</td><td><strong> ₹ 5.2  </strong></td></tr>
                    <tr><td>10 KG Price</td><td><strong> ₹ 52.0   </strong></td></tr>
                    <tr><td>Quintal (100 KG) Price</td><td><strong> ₹ 520.0  </strong></td></tr>
                    <tr><td>Ton (1000 KG) Price</td><td><strong> ₹ 5200.0   </strong></td></tr>
                    <tr><td>Average Market Price</td><td><strong> ₹ 515  / Quintal </strong></td></tr>
                    <tr><td>Best Market Price</td><td><strong> ₹650 / Quintal </strong></td></tr>
                    <tr><td>Lowest Market Price</td><td><strong> ₹410  / Quintal </strong></td></tr>
                    <tr><td>Best Price Market</td><td><strong>Hargaon (laharpur)</strong></td></tr>
                    <tr><td>Lowest Price Market</td><td><strong>Shahpur </strong></td></tr>
                </tbody>
            </table>
        </div>

        <div class="container mt-4">
            <h3 class="text-center">Recent Wool Prices</h3>
            <table class="price-table recent-prices">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Quintal Price (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM wool_prices ORDER BY price_date DESC");
                    while ($row = $stmt->fetch()) {
                        echo "<tr><td>{$row['price_date']}</td><td>₹ {$row['Quintal_price']}</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

</body>
</html>
