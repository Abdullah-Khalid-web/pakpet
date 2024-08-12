<?php
include 'connection.php'; // Ensure this file contains your database connection

// Check if 'product_id' and 'user_id' are set in the GET request
if (isset($_GET['product_id']) && isset($_GET['user_id'])) {
    $product_id = $_GET['product_id'];
    $user_id = $_GET['user_id'];

    // Debugging: Print the received values
    echo "Received product_id: $product_id<br>";
    echo "Received user_id: $user_id<br>";

    if (!empty($product_id) && is_numeric($product_id)) {
        // Prepare and execute the SQL statement

        $delete_query = "DELETE FROM `cart` WHERE product_id = $product_id and user_id = $user_id";
        $result = mysqli_query($con, $delete_query);


        if ($result) {
            echo "Product added to cart";
            header("Location: cart.php?message=Product added to cart");
        } else {
            echo "Failed to add product to cart. Error: " . $result;
        }
        
    } else {
        echo "Invalid product ID.";
    }
} else {
    echo "Product ID or User ID not set.";
}
?>
