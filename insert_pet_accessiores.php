<?php
include 'connection.php';




if (isset($_POST['insert_product'])) {


    $username = $_SESSION['fname'];
    $product_title = $_POST['product_title'];
    $product_type = $_POST['product_type'];
    $product_qunatity = $_POST['product_qunatity'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';


    // Access images
    $product_image = $_FILES['product_image']['name'];

    // Accessing temp names
    $temp_product_image = $_FILES['product_image']['tmp_name'];

    // Checking empty condition
    if (empty($product_title) || empty($product_description) || empty($product_type) || empty($product_qunatity) || empty($product_price) || empty($product_image)) {
        echo "<script>alert ('Please fill all the fields') </script>";
    } else {
        // Move uploaded files
        move_uploaded_file($temp_product_image, "./product_images/$product_image");


        // Insert query for products
        $insert_product = "INSERT INTO `insert_pet` (user_id, product_title, product_type, product_quantity, product_image,product_description,product_price) 
        VALUES ('$username', '$product_title', '$product_type', '$product_qunatity', '$product_image','$product_description', '$product_price',`NOW()`,'$product_status')";

        mysqli_query($con, $insert_product);
        $product_id = mysqli_insert_id($con);

        echo "<script>alert('Product has been inserted successfully')</script>";
        echo "Error: " . $insert_product . "<br>" . mysqli_error($con);
    }


}
?>

<div >
    <h1 class="text-center mt-3">Pet Poducts</h1>
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title<span class="red">*</span></label>
            <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter Product  Name" autocomplete="off" required="required">
        </div>
        
        <!-- Product type -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_type" class="form-label">Choose the Category<span class="red">*</span></label>
            <select name="product_type" class="form-select" id="product_type" class="product_type">
                <option >Food</option>
                <option >Medicine </option>
                <option >Vitamins </option>
                <option >Cages</option>
                <option >Stands</option>
                <option >others</option>
            </select>
        </div>
        
        <!-- Quantity -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_qunatity" class="form-label">Product Qunatity<span class="red">*</span></label>
            <input type="text" name="product_title" id="product_qunatity" class="form-control"
                placeholder="Enter Product qunatity" autocomplete="off" required="required">
        </div>

        <!-- Image 1 -->
        <div class="form-outline mb-4 w-50 m-auto my-2">
            <label for="product_image" class="form-label">Product Image <span class="red">*</span> </label>
            <input type="file" name="product_image" id="product_image" class="form-control" autocomplete="off"
                required="required">
        </div>

        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label"> Discription<span class="red">*</span></label>
            <textarea type="text" name="product_description" id="product_description" class="form-control"
                placeholder="Write the details here:....." autocomplete="off" required="required"></textarea>
        </div>


        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price<span class="red">*</span></label>
            <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Enter pet price" autocomplete="off" required="required">
            <br>
            <button type="submit" name="insert_product" style="background-color: #4A919E;"
                class="  btn btn-primary mb-4 w-100 m-auto">Add Product For Sell</button>
        </div>


    </form>
</div>