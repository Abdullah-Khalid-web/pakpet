<?php
include ('header.php');

if (isset($_POST['insert_product'])) {
    $username = $_SESSION['fname'];
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['email'];

    $product_title = $_POST['product_title'];
    $product_category = $_POST['product_category']; // Fixed the naming to match the field name
    $product_type = $_POST['product_type'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // Access images
    $product_image = $_FILES['product_image']['name'];
    $temp_product_image = $_FILES['product_image']['tmp_name'];

    // Checking empty condition
    if (empty($product_title) || empty($product_description) || empty($product_type) || empty($product_category) || empty($product_price) || empty($product_image)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        // Move uploaded files
        move_uploaded_file($temp_product_image, "./product_images/$product_image");

        // Insert query for products
        $insert_product = "INSERT INTO `pet_products` (user_id, product_title, product_type, product_quantity, product_image, product_description, product_price,  product_status) 
                            VALUES ('$user_email', '$product_title', '$product_type', '$product_category', '$product_image', '$product_description', '$product_price', '$product_status')";
        // Execute the query
        if (mysqli_query($con, $insert_product)) {
            echo "<script>alert('Product has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert product.')</script>";
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>

<main>
    <?php
    if (!isset($_SESSION['fname'])) {
        echo '<br><br><br><br>';
        echo '<h2 class="text-center text-sec">You Need to Login First Before Selling Anything</h2>';
        echo '<br><br><br><br>';
        echo '<br><br><br><br>';
    } else {
        $username = $_SESSION['fname'];
        $user_email = $_SESSION['email'];
        $user_id = $_SESSION['user_id'];
        include 'insert_product11.php';
    }
    ?>
</main>

<?php include ('footer.php'); ?>