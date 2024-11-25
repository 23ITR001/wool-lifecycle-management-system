<?php 
include 'db_connect.php';

// Check if product ID is passed in URL
if (!isset($_GET['product_id'])) {
    echo "<p class='error'>Product not found.</p>";
    exit;
}

$product_id = $_GET['product_id'];

// Fetch product details
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p class='error'>Product not found.</p>";
    exit;
}

// Handle purchase submission
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity_to_buy = $_POST['quantity_to_buy'];

    // Check if the quantity to buy is available
    if ($quantity_to_buy <= $product['quantity']) {
        $new_quantity = $product['quantity'] - $quantity_to_buy;
        $total_cost = $quantity_to_buy * $product['price'];

        // Update the product's quantity in the database
        $updateStmt = $pdo->prepare("UPDATE products SET quantity = ? WHERE id = ?");
        $updateStmt->execute([$new_quantity, $product_id]);

        // Store purchase details in session
        $_SESSION['purchase_details'] = [
            'wool_type' => $product['wool_type'],
            'quantity_purchased' => $quantity_to_buy,
            'price_per_unit' => $product['price'],
            'total_cost' => $total_cost
        ];

        // Redirect to thank you page
        header("Location: thank_you.php");
        exit;
    } else {
        echo "<p class='error'>Not enough stock available. Available quantity: " . $product['quantity'] . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Product - WoolLife Cycle Management</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style3.css">
    <style>
        /* Styling for the purchase form */
        #purchase_section .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        #purchase_section h2 {
            text-align: center;
            color: #333;
        }
        #purchase_section p {
            color: #555;
            font-size: 1em;
        }
        .form-group label {
            font-size: 1em;
            color: #333;
        }
        .buy-button, .cancel-button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .buy-button {
            background-color: #4CAF50;
            color: white;
        }
        .buy-button:hover {
            background-color: #45a049;
        }
        .cancel-button {
            background-color: #f44336;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .cancel-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
<header>
    <h1>WoolLife Cycle Management</h1>
    <p>Purchase Wool Product</p>
</header>

<section id="purchase_section">
    <div class="container">
        <h2>Purchase <?php echo htmlspecialchars($product['wool_type']); ?></h2>
        <p>Price per Unit: ₹<?php echo htmlspecialchars($product['price']); ?></p>
        <p>Available Quantity: <?php echo htmlspecialchars($product['quantity']); ?></p>

        <form method="POST" action="purchase.php?product_id=<?php echo $product_id; ?>">
            <label for="quantity_to_buy">Enter Quantity to Buy:</label>
            <input type="number" name="quantity_to_buy" min="1" max="<?php echo $product['quantity']; ?>" required>
            <button type="submit" name="buy_product1" class="buy-button">Confirm Purchase</button>
        </form>
        
        <!-- Cancel button to redirect back to user dashboard -->
        <a href="user_dashboard.php" class="cancel-button">Cancel</a>
    </div>
</section>
</body>
</html>
