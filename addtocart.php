<?php
session_start(); // Start the session

include 'connection.php'; // Ensure this file contains your database connection

if (!isset($_SESSION['fname'])) {
    // Show alert and redirect to login page
    echo "<script>
            alert('You need to login first for adding in the cart');
            window.location.href = 'index.php'; // Redirect after showing the alert
        </script>";
    exit();
} else {
    // Check if 'product_id' and 'user_id' are set in the GET request
    if (isset($_GET['product_id']) && isset($_GET['user_id'])) {
        $product_id = $_GET['product_id'];
        $user_id = $_GET['user_id'];
        
        if (!empty($product_id) && is_numeric($product_id)) {
            // Prepare and execute the SQL statement
            $stmt = $con->prepare("INSERT INTO `cart` (user_id, product_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $user_id, $product_id);

            if ($stmt->execute()) {
                // Redirect to index.php with a success message
                header("Location: index.php?message=Product added to cart");
                exit(); // Ensure no further code is executed
            } else {
                echo "Failed to add product to cart. Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Invalid product ID.";
        }
    } else {
        echo "Product ID or User ID not set.";
    }

    $con->close();
}
?>
