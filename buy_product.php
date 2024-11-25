<?php
include 'db_connect.php';

if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
    $product_id = (int)$_GET['product_id'];
    $quantity_to_buy = (int)$_GET['quantity'];

    // Fetch product details
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    // Check if the product is available in the requested quantity
    if ($product && $product['quantity'] >= $quantity_to_buy) {
        // Calculate the new quantity
        $new_quantity = $product['quantity'] - $quantity_to_buy;

        // Update the product's quantity in the database
        $updateStmt = $pdo->prepare("UPDATE products SET quantity = ? WHERE id = ?");
        $updateStmt->execute([$new_quantity, $product_id]);

        // Display success message
        echo "<p>Purchase successful! Quantity remaining: " . $new_quantity . "</p>";
    } else {
        echo "<p>Sorry, insufficient stock available.</p>";
    }
} else {
    echo "<p>Error: Invalid request.</p>";
}
?>
