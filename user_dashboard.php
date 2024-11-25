<?php 
include 'db_connect.php'; 

// Fetch all products from the database
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
if (isset($_GET['purchase_success'])) {
    echo "<script>alert('Purchase successful!');</script>";
} elseif (isset($_GET['error'])) {
    echo "<script>alert('Error: Not enough stock available.');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - WoolLife Cycle Management</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>WoolLife Cycle Management</h1>
    <p>Your guide from sheep to fabric</p>
</header>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="user_dashboard.php">Buy Products</a></li>
        <li><a href="wool_price.php">Current Wool Price</a></li>
        <li><a href="login.php">Admin Login</a></li>
        <li><a href="signup.php">User Login</a></li>
    </ul>
</nav>

<!-- User Dashboard -->
<section id="user_dashboard">
    <div class="container">
        <h2 class="dashboard-title">User Dashboard</h2>
        <h3 class="section-title">Available Wool Products</h3>

        <table class="product-table">
            <thead>
                <tr>
                    <th>Wool Type</th>
                    <th>Price(per kg)</th>
                    <th>Quantity(in kg)</th>
                    <th>Total Price</th>
                    <th>Phone Number</th>
                    <th>Bank Details</th>
                    <th>Buy</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): 
                    $total_price = $product['price'] * $product['quantity'];
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['wool_type']); ?></td>
                        <td><?php echo htmlspecialchars($product['price']); ?></td>
                        <td><?php echo $product['quantity'] > 0 ? htmlspecialchars($product['quantity']) : "Not Available"; ?></td>
                        <td><?php echo htmlspecialchars($total_price); ?></td>
                        <td><?php echo htmlspecialchars($product['phone_number']); ?></td>
                        <td>
                            <p><strong>Account Name:</strong> <?php echo htmlspecialchars($product['bank_account_name']); ?></p>
                            <p><strong>IFSC Code:</strong> <?php echo htmlspecialchars($product['ifsc_code']); ?></p>
                            <p><strong>Details:</strong> <?php echo htmlspecialchars($product['bank_details']); ?></p>
                        </td>
                        <td>
                            <?php if ($product['quantity'] > 0): ?>
                                <!-- Redirect to purchase page with product ID -->
                                <form method="GET" action="purchase.php">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button type="submit" class="buy-button">Buy</button>
                                </form>
                            <?php else: ?>
                                <p>Not Available</p>
                            <?php endif; ?>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
</body>
</html>
