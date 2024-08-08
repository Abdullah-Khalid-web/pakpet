<?php
include 'connection.php';
if (isset($_POST['insert_service'])) {

    $username = $_SESSION['fname'];
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
        move_uploaded_file($temp_service_image, "../product_images/$service_image");


        // Insert query for products
        $insert_service = "INSERT INTO `pet_services` (user_id,  service_title, service_specailization, service_description, service_image, service_price) 
        VALUES ('$username', '$service_name' , '$service_type' , '$service_description', '$service_image', '$service_price',`NOW()`,'$product_status')";

        mysqli_query($con, $insert_service);
        $service_id = mysqli_insert_id($con);

        echo "<script>alert('Product has been inserted successfully')</script>";
        echo $insert_service . "<br>" . mysqli_error($con);
    }
}
?>

<div >
    <h1 class="text-center mt-3">Providing Pet Services</h1>
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
            <textarea type="text" name="service_description" id="service_description" class="form-control"
                placeholder="Write the details here:....." autocomplete="off" required="required"></textarea>
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