<textarea?php
include 'connection.php';

if (isset($_POST['insert_pet'])) {
    // need to make the user id refrence
    // 
    $pet_title = $_POST['pet-title'];
    $pet_age = $_POST['pet_age'];
    $pet_type = $_POST['pet_type'];
    $pet_bread = $_POST['pet_bread'];
    $pet_description = $_POST['pet_description'];
    $pet_price = $_POST['product_price'];
    $product_status = 'true';


    // Access images
    $pet_image = $_FILES['pet_image']['name'];


    // Accessing temp names
    $pet_image = $_FILES['pet_image']['tmp_name'];

    // Checking empty condition
    if (empty($pet_title) || empty($pet_age) || empty($pet_type) || empty($pet_bread) || empty($product_price) || empty($pet_image) || empty($pet_price)) {
        echo "<script>alert ('Please fill all the fields') </script>";
    } else {
        // Move uploaded files
        move_uploaded_file($temp_Image1, "./product_images/$pet_image");


        // Insert query for products
        $insert_product = "INSERT INTO `insert_pet` (product_title, product_description, product_keywords, category_id, brand_id, product_image1,  product_price) VALUES ('$product_title', '$product_description', '$product_KeyWords', '$product_category_json', '$product_Image1', '$product_price',`NOW()`,'$product_status')";

        mysqli_query($con, $insert_product);
        $product_id = mysqli_insert_id($con);

        echo "<script>alert('Product has been inserted successfully')</script>";
    }
}
?>

    <div >
        <h1 class="text-center mt-3">Ad to sale The Pet</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet-title" class="form-label">Product-title<span class="red">*</span></label>
                <input type="text" name="pet-title" id="pet-title" class="form-control"
                    placeholder="Enter Pet Name" autocomplete="off" required="required">
            </div>

            <!-- Pet age -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet_age" class="form-label">Product-title<span class="red">*</span></label>
                <input type="text" name="pet_age" id="pet_age" class="form-control" placeholder="Enter Pet Age"
                    autocomplete="off" required="required">
            </div>

            <!-- Pet type -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet_type" class="form-label">Choose the Pet Type<span class="red">*</span></label>
                <select name="pet_type" class="form-select" id="pet_type" class="pet_type">
                    <?php
                    $select_pet_type = "Select * from `pet_type`";
                    $result_pet_type = mysqli_query($con, $select_pet_type);

                    while ($row_data = mysqli_fetch_assoc($result_pet_type)) {
                        $pet_type_title = $row_data['pet_type_title'];
                        $categories_id = $row_data['pet_type_id'];
                        echo "<option >$pet_type_title </option>";

                    }
                    ?>
                </select>
            </div>

            <!-- Pet Bread -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet_bread" class="form-label">Product-title<span class="red">*</span></label>
                <input type="text" name="pet_bread" id="pet_bread" class="form-control" placeholder="Enter Pet bread"
                    autocomplete="off" required="required">
            </div>

            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet_description" class="form-label">Discription<span class="red">*</span></label>
                <textarea type="text" name="pet_description" id="pet_description" class="form-control"
                    placeholder="Write the details here:....." autocomplete="off" required="required"></textarea>
            </div>



            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto my-2">
                <label for="pet_image" class="form-label">Pet Images <span class="red">*</span> </label>
                <input type="file" name="pet_image" id="pet_image" class="form-control" autocomplete="off"
                    required="required">
            </div>


            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pet_price" class="form-label">Pet Price<span class="red">*</span></label>
                <input type="text" name="pet_price" id="pet_price" class="form-control"
                    placeholder="Enter pet price" autocomplete="off" required="required">
                <br>
                <button  type="submit" name="insert_pet" style="background-color: #4A919E;" class="  btn btn-primary mb-4 w-100 m-auto">Add For Sell</button>
            </div>


        </form>
    </div>
