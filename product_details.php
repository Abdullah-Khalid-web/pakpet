<?php include ('header.php')?>

<main>
    <?php 
        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM `pet_products` where product_id = '$product_id'";
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        $result = mysqli_query($con, $sql);
        $row_data = mysqli_fetch_assoc($result);
        $user_id = $row_data['user_id'];
        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_type = $row_data['product_type'];
        $product_quantity = $row_data['product_quantity'];
        $product_image = $row_data['product_image'];
        $product_description = $row_data['product_description'];
        $product_price = $row_data['product_price'];
        $product_date = $row_data['product_date'];
        $product_status = $row_data['product_status'];
        echo $user_id .'<br>' . $product_title;
    ?>
</main>

<?php include ('footer.php')?>