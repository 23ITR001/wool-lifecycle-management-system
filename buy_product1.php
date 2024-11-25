<?php  
include 'db_connect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmation</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .details p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin: 10px 0;
        }

        .price {
            color: #e67e22;
            font-size: 20px;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #e67e22;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST['buy_product'])) {
            $product_id = $_POST['product_id'];

            // Fetch the product details from the database
            $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$product_id]);
            $product = $stmt->fetch();

            if ($product) {
                // Display product details
                echo "<h2>Thank you for purchasing " . htmlspecialchars($product['wool_type']) . " wool!</h2>";
                echo "<div class='details'>";
                echo "<p class='price'>Price: ₹" . htmlspecialchars($product['price']) . "</p>";
                echo "<p>Phone Number: " . htmlspecialchars($product['phone_number']) . "</p>";
                echo "<p>Bank Details: " . nl2br(htmlspecialchars($product['bank_details'])) . "</p>";
                echo "</div>";
                echo "<a href='index.php' class='button'>Back to Home</a>";
            } else {
                echo "<h2>Product not found.</h2>";
            }
        }
        ?>
    </div>
</body>
</html>
