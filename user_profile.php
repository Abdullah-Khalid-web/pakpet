<?php include 'header.php' ?>
<main>
    <?php

    $username = $_SESSION['fname'];
    $user_email = $_SESSION['email'];
    $user_id = $_SESSION['user_id'];
    // echo $user_id;
    
    $sql = "SELECT * FROM `user_registeration` where user_email ='$user_email' ";
    $result = mysqli_query($con, $sql);
    $row_data = mysqli_fetch_assoc($result);


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
                <label for="user_name" class="form-label"> ' . $user_fname . '`s id : ' . $user_id . ': </label>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_name" class="form-label"> ' . $user_fname . '`s email : ' . $user_email . ': </label>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_name" class="form-label"> ' . $user_fname . '`s Phone no : ' . $user_phoneno . ': </label>
            </div>
        
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_name" class="form-label">First Name : <span class="red">*</span></label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" value="' . $user_fname . '"
                    autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_name" class="form-label">Last Name : <span class="red">*</span></label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" value="' . $user_lname . '"
                    autocomplete="off" required="required">
            </div>
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_name" class="form-label">Address : <span class="red">*</span></label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" value="' . $user_address . '"
                    autocomplete="off" required="required">
            </div>

        </form>
    </div>
    
    ';


    echo '<div class="container">
<div class="porducts"> ';



    // Access Products
    $product_sql = "SELECT * FROM `pet_products` where user_id ='$user_email' ";
    $product_result = mysqli_query($con, $product_sql);


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
                    <img  class='p-0 m-0' src='images/cat-8198720_640.webp' >
                    <h3 class='p-0 m-0'>$product_title</h3>
                    <p class='m-0'> Type : $product_type </p>
                    <p class='m-0'><b>Price : $product_price   </b></p>
                    <p  class='m-0'>Date : $product_date </p>
                    <div class='button1'>
                    <a class='btn mx-1  addtocart'>Add to cart</a>
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



</main>

<?php include 'footer.php' ?>