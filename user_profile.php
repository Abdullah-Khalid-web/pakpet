<?php include 'header.php' ?>

<?php
if (isset($_POST['save_changes'])) {
    $user_email = $_SESSION['email'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_phoneno = $_POST['user_phoneno'];
    $user_address = $_POST['user_address'];

    // Update user profile
    $sql = "UPDATE user_registeration 
            SET user_fname = '$user_fname', user_lname = '$user_lname', user_address = '$user_address', user_phoneno = '$user_phoneno'
            WHERE user_email = '$user_email'";

    if (mysqli_query($con, $sql)) {
        echo json_encode(['success' => true]);
        echo "Error: " . mysqli_error($con);
    } else {
        echo json_encode(['success' => false]);
    }
}

?>
<main>
    <?php
    $username = $_SESSION['fname'];
    $user_email = $_SESSION['email'];
    $user_id = $_SESSION['user_id'];
    // echo $user_id;
    
    $sql = "SELECT * FROM `user_registeration` where user_email ='$user_email' ";
    $result = mysqli_query($con, $sql);
    $row_data = mysqli_fetch_assoc($result);

    $user_id = $row_data['user_id'];
    $user_fname = $row_data['user_fname'];
    $user_lname = $row_data['user_lname'];
    $user_pic = $row_data['user_pic'];
    $user_email = $row_data['user_email'];
    $user_phoneno = $row_data['user_phoneno'];
    $user_address = $row_data['user_address'];
    $user_password = $row_data['user_password'];






    echo '
    <div>
        <h1 class="text-center mt-3 text-sec">User Profile</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_name" class="form-label"> '
                    . $user_fname . '`s ' . $user_lname . '<br>'
                    . $user_fname . '`s ' . '  ID : ' . $user_id . '<br>'
                    . $user_fname . '`s email : ' . $user_email . '<br>'
                    . $user_fname . '`s Phone no : ' . $user_phoneno . '<br>'
                    . $user_fname . '`s Address : ' . $user_address .
                '</label>
            </div>
            <h3 class="text-center text-sec"  >Edit Your Profile</h3>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_fname" class="form-label">First Name : <span class="red">*</span></label>
                <input type="text" name="user_fname" id="user_fname" class="form-control" placeholder="First Name" value="' . $user_fname . '"
                    autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_lname" class="form-label">Last Name : <span class="red">*</span></label>
                <input type="text" name="user_lname" id="user_lname" class="form-control" placeholder="Last Name" value="' . $user_lname . '"
                    autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_phoneno" class="form-label">Phone no : <span class="red">*</span></label>
                <input type="text" name="user_phoneno" id="user_phoneno" class="form-control" placeholder="User Phone no" value="' . $user_phoneno . '"
                    autocomplete="off" required="required">
            </div>
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_address" class="form-label">Address : <span class="red">*</span></label>
                <input type="text" name="user_address" id="user_address" class="form-control" placeholder="User Address" value="' . $user_address . '"
                    autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <button type="submit" name="save_changes" class="btn w-10 mx-1 bg-pri ">Save Changes</button>
            </div>

        </form>
    </div>
    
    ';


    echo
        '<hr class= "p-1 bg-sec text-sec">
        <h2 class= " text-sec text-center"> ' . $user_fname . ' our Products for sale</h2>
        <div class="container">
            <div class="porducts">';

    // Access Products
    $product_sql = "SELECT * FROM `pet_products` where user_id ='$user_id' ";
    $product_result = mysqli_query($con, $product_sql);
    if(mysqli_fetch_assoc($product_result) == 0 ){
        echo '<p class="text-center text-sec">No products inserted yet</p>';
    }

    while ($row_data = mysqli_fetch_assoc($product_result)) {

        $product_owner_id = $row_data['user_id'];

        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_type = $row_data['product_type'];
        $product_category = $row_data['product_quantity'];
        $product_description = $row_data['product_description'];
        $product_image = $row_data['product_image'];
        $product_price = $row_data['product_price'];
        $product_date = $row_data['product_date'];
        $product_status = $row_data['product_status'];

        echo " 
                    <a class='nav-link text-center' href='product_details.php?product_id=$product_id'>
                        <div class='porduct-box'>
                        
                            <img class='p-0 m-0' src='product_images/" . htmlspecialchars($product_image) . "' alt='Product Image'>
                            <h3 class='p-0 m-0'>$product_title</h3>
                            <p class='m-0'> Type : $product_type </p>
                            <p class='m-0'>City : $product_category   </p>
                            <p class='m-0'><b>Price : $product_price   </b></p>
                            <p  class='m-0'>Date : $product_date </p>
                            <div class='button1'>
                            <form action='delete_product.php' method='post' style='display:inline;'>
                                <input type='hidden' name='product_id' value='$product_id'>
                                <button type='submit' class='btn mx-1 addtocart' onclick='confirmDelete(this)'>Remove</button>
                            </form>
                            <a href='product_details.php?$product_id' class='btn   butt'>More info 
                                <svg height='24' width='24' viewBox='0 0 24 24'xmlns='http://www.w3.org/2000/svg'>
                                <path d='M0 0h24v24H0z' fill='none'></path>
                                <path d='M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z' fill='currentColor'></path></svg>
                            </a>
                        </div>
                        </div>
                    </a>
                    ";
    }


    echo '
        </div>
    </div>
    ';

    ?>


    <script>
        function confirmDelete(button) {
            if (confirm("Are you sure you want to remove this product?")) {
                // Submit the form if the user confirms
                button.form.submit();
            }
        }
    </script>


</main>

<?php include 'footer.php' ?>