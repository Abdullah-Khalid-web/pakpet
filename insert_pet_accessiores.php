<?php
include 'connection.php';




if (isset($_POST['insert_product'])) {

    echo "Error: " . $sql . "<br>" . mysqli_error($con);

    $username = $_SESSION['fname'];
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_type = $_POST['product_type'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';


    // Access images
    $product_image = $_FILES['product_image']['name'];


    // Accessing temp names
    $temp_product_image = $_FILES['product_image']['tmp_name'];

    // Checking empty condition
    if (empty($product_title) || empty($product_description) || empty($product_type) || empty($product_price) || empty($product_price) || empty($product_image)) {
        echo "<script>alert ('Please fill all the fields') </script>";
    } else {
        // Move uploaded files
        move_uploaded_file($temp_product_image, "./product_images/$product_image");


        // Insert query for products
        $insert_product = "INSERT INTO `insert_pet` (product_title, product_description, product_keywords, category_id, brand_id, product_image1,  product_price) VALUES ('$username', '$product_description', '$product_KeyWords', '$product_category_json', '$product_Image1', '$product_price',`NOW()`,'$product_status')";

        mysqli_query($con, $insert_product);
        $product_id = mysqli_insert_id($con);

        echo "<script>alert('Product has been inserted successfully')</script>";
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


        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label"> Discription<span class="red">*</span></label>
            <textarea type="text" name="product_description" id="product_description" class="form-control"
                placeholder="Write the details here:....." autocomplete="off" required="required"></textarea>
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

        <!-- Image 1 -->
        <div class="form-outline mb-4 w-50 m-auto my-2">
            <label for="product_image" class="form-label">Product Image <span class="red">*</span> </label>
            <input type="file" name="product_image" id="product_image" class="form-control" autocomplete="off"
                required="required">
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