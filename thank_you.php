<?php
session_start();

// Check if purchase details are set
if (!isset($_SESSION['purchase_details'])) {
    header("Location: user_dashboard.php");
    exit;
}

// Retrieve purchase details
$purchaseDetails = $_SESSION['purchase_details'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - WoolLife Cycle Management</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .thank-you-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            text-align: center;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .thank-you-container h1 {
            color: #4CAF50;
        }
        .purchase-details {
            margin-top: 20px;
            text-align: left;
            font-size: 1em;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <h1>Thank You for Your Purchase!</h1>
        <p>We appreciate your purchase. Here are your purchase details:</p>

        <div class="purchase-details">
            <p><strong>Product:</strong> <?php echo htmlspecialchars($purchaseDetails['wool_type']); ?></p>
            <p><strong>Quantity Purchased:</strong> <?php echo htmlspecialchars($purchaseDetails['quantity_purchased']); ?> kg</p>
            <p><strong>Price per Unit:</strong> ₹<?php echo htmlspecialchars($purchaseDetails['price_per_unit']); ?></p>
            <p><strong>Total Cost:</strong> ₹<?php echo htmlspecialchars($purchaseDetails['total_cost']); ?></p>
        </div>

        <a href="user_dashboard.php" class="buy-button">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
// Clear purchase details after displaying them
unset($_SESSION['purchase_details']);
?>
