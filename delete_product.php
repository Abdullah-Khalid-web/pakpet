<?php
include 'connection.php'; 

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Validate product_id
    if (!empty($product_id) && is_numeric($product_id)) {
        // Delete query
        $delete_query = "DELETE FROM `pet_products` WHERE product_id = ?";
        $stmt = $con->prepare($delete_query);
        $stmt->bind_param('i', $product_id);

        if ($stmt->execute()) {
            // Redirect back to the profile page or products list with a success message
            header("Location: user_profile.php?message=Product removed successfully");
        } else {
            // Handle error
            echo "Error deleting product: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid product ID.";
    }
} else {
    echo "Product ID not set.";
}

$con->close();
?>
