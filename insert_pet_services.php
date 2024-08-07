<?php
include 'connection.php';

if (isset($_POST['insert_product'])) {
    // need to make the user id refrence
    // 
    $service_name = $_POST['service_name'];
    $service_description = $_POST['service_description'];
    $service_type = $_POST['service_type'];
    $service_price = $_POST['service_price'];
    $product_status = 'true';


    // Access images
    $service_image = $_FILES['service_image']['name'];


    // Accessing temp names
    $temp_service_image = $_FILES['service_image']['tmp_name'];

    // Checking empty condition
    if (empty($service_name) || empty($service_description) || empty($service_type) || empty($service_price) ) {
        echo "<script>alert ('Please fill all the fields') </script>";
    } else {
        // Move uploaded files
        move_uploaded_file($temp_service_image, "./product_images/$service_image");


        // Insert query for products
        $insert_product = "INSERT INTO `insert_pet` (product_title, product_description, product_keywords, category_id, brand_id, product_image1,  product_price) VALUES ('$product_title', '$product_description', '$product_KeyWords', '$product_category_json', '$product_Image1', '$product_price',`NOW()`,'$product_status')";

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
            <label for="service_name" class="form-label">Name<span class="red">*</span></label>
            <input type="text" name="service_name" id="service_name" class="form-control"
                placeholder="Enter service Name" autocomplete="off" required="required">
        </div>

        <!-- Service type -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="service_type" class="form-label">Specialization<span class="red">*</span></label>
            <select name="service_type" class="form-select" id="service_type" class="service_type">
                    <option >Nutrition</option>
                    <option >Doctor </option>
                    <option >Guider/helper</option>
                    <option >others</option>
            </select>
        </div>

        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="service_description" class="form-label">Discription<span class="red">*</span></label>
            <input type="text" name="service_description" id="service_description" class="form-control"
                placeholder="Write the details here:....." autocomplete="off" required="required">
        </div>


        <!-- Image 1 -->
        <div class="form-outline mb-4 w-50 m-auto my-2">
            <label for="service_image" class="form-label">Service Image </label>
            <input type="file" name="service_image" id="service_image" class="form-control" autocomplete="off">
        </div>


        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="service_price" class="form-label">Product Price<span class="red">*</span></label>
            <input type="text" name="service_price" id="service_price" class="form-control"
                placeholder="Enter pet price" autocomplete="off" required="required">
            <br>
            <button type="submit" name="insert_service" style="background-color: #4A919E;"
                class="  btn btn-primary mb-4 w-100 m-auto">Add Product For Sell</button>
        </div>


    </form>
</div>