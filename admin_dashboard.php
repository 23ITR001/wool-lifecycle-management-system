<?php  
include 'db_connect.php'; 

// Initialize a success flag
$success = false;

// Handle the form submission
if (isset($_POST['submit_product'])) {
    try {
        $wool_type = $_POST['wool_type'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $phone_number = $_POST['phone_number'];
        $bank_details = $_POST['bank_details'];

        // Optional Fields
        $ifsc_code = !empty($_POST['ifsc_code']) ? $_POST['ifsc_code'] : null;
        $bank_account_name = !empty($_POST['bank_account_name']) ? $_POST['bank_account_name'] : null;

        // Insert data into the database
        $stmt = $pdo->prepare("
            INSERT INTO products 
            (wool_type, price, quantity, phone_number, ifsc_code, bank_account_name, bank_details) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$wool_type, $price, $quantity, $phone_number, $ifsc_code, $bank_account_name, $bank_details]);

        // Set success flag to true if insertion is successful
        $success = true;

        // Redirect to prevent form resubmission
        header("Location: admin_dashboard.php?success=true");
        exit;
    } catch (PDOException $e) {
        echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - WoolLife Cycle Management</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="styles.css">
    <script>
        // Show success message if the page loads with a success flag
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                alert("Product added successfully!");
            }
        };

        // Function to validate the phone number and price before form submission
        function validateForm() {
            const phoneNumber = document.getElementById("phone_number").value;
            const price = parseFloat(document.getElementById("price").value);

            // Validate phone number format (India's 10-digit format)
            const phonePattern = /^[6-9]\d{9}$/;
            if (!phonePattern.test(phoneNumber)) {
                alert("Invalid phone number. Please enter a valid 10-digit number.");
                return false;
            }

            // Validate price range
            if (price > 10.1) {
                alert("Error: The entered price exceeds the market price of ₹4800.");
                return false;
            }
            if (price < 3.2) {
                alert("Error: The entered price is too low.");
                return false;
            }
            return true; // Allow form submission if all validations pass
        }
    </script>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-container">
            <h1>WoolLife Cycle Management</h1>
            <p>Your guide from sheep to fabric</p>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_dashboard.php">Buy Products</a></li>
            <li><a href="wool_price.php">Current Wool Price</a></li>
            <li><a href="admin_dashboard.php">Add Products</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>

    <!-- Admin Dashboard Section -->
    <section id="admin_dashboard">
        <div class="container">
            <h2 class="dashboard-title">Admin Dashboard</h2>

            <h3 class="form-title">Add New Wool Product</h3>
            <form method="POST" action="admin_dashboard.php" class="product-form" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="wool_type">Wool Type:</label>
                    <select name="wool_type" required>
                        <option value="" disabled selected>Select Wool Type</option>
                        <option value="Merino">Merino</option>
                        <option value="Cashmere">Cashmere</option>
                        <option value="Alpaca">Alpaca</option>
                        <option value="Mohair">Mohair</option>
                        <option value="Angora">Angora</option>
                        <option value="Cheviot">Jacob</option>
                        <option value="Rambouillet">Rambouillet</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price(₹4.10 - ₹6.5):</label>
                    <input type="number" id="price" name="price" required placeholder="Enter Price">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity(in kg):</label>
                    <input type="number" id="quantity" name="quantity" required placeholder="Enter Quantity">
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number (for transfers):</label>
                    <input type="text" id="phone_number" name="phone_number" required placeholder="Enter Phone Number">
                </div>

                <div class="form-group">
                    <label for="bank_account_name">Bank Account Number:</label>
                    <input type="text" name="bank_account_name" placeholder="Enter Bank Account Name">
                </div>
                <div class="form-group">
                    <label for="ifsc_code">IFSC Code:</label>
                    <input type="text" name="ifsc_code" placeholder="Enter IFSC Code">
                </div>

                <div class="form-group">
                    <label for="bank_details">Additional Bank Details:</label>
                    <textarea name="bank_details" placeholder="Any additional bank details"></textarea>
                </div>

                <button type="submit" name="submit_product" class="submit-button">Add Product</button>
            </form>
        </div>
    </section>
</body>
</html>
