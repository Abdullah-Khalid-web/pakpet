<?php include ('header.php'); ?>

<main>

    <div class="container p-0">
        <div class="porducts">

            <?php
            $username = $_SESSION['fname'];
            $user_email = $_SESSION['email'];
            $user_id = $_SESSION['user_id'];

            $sql = "SELECT * FROM `user_registeration` where user_email ='$user_email' ";
            $result = mysqli_query($con, $sql);
            $row_data = mysqli_fetch_assoc($result);
            $user_id1 = $row_data['user_id'];

            $select_Cart_items = "SELECT product_id FROM `cart` WHERE user_id = '$user_id1'";
            $result_Cart_items = mysqli_query($con, $select_Cart_items);
            $product_ids = [];
            while ($row = mysqli_fetch_assoc($result_Cart_items)) {
                $product_ids[] = $row['product_id'];
            }
            if (!empty($product_ids)) {
                $product_ids_string = implode(',', array_map('intval', $product_ids));

                $select_Products = "SELECT * FROM `pet_products` WHERE product_id IN ($product_ids_string)";
                $result_Products = mysqli_query($con, $select_Products);

                while ($row_data = mysqli_fetch_assoc($result_Products)) {
                    $product_owner_id = $row_data['user_id'];
                    $product_id = $row_data['product_id'];
                    $product_title = $row_data['product_title'];
                    $product_type = $row_data['product_type'];
                    $product_category = $row_data['product_quantity']; // corrected field name
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
                    <p class='m-0'>Price : $product_price   </p>
                    <p  >Date : $product_date </p>
                    <div class='button1'>
                    
                    <a href='removefromcart.php?product_id=$product_id&user_id=$product_owner_id' class='btn mx-1 addtocart'>Remove</a>
                    <a href='product_details.php?product_id=$product_id' class='btn   butt'>More info 
                        <svg height='24' width='24' viewBox='0 0 24 24'xmlns='http://www.w3.org/2000/svg'>
                        <path d='M0 0h24v24H0z' fill='none'></path>
                        <path d='M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z' fill='currentColor'></path></svg>
                    </a>
                </div>
                </div>
            </a>
            ";
                }


            } else {
                echo "<h3>No items in cart.</h3>
        <br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br>
        ";
            }

            // Close the database connection
            mysqli_close($con);

            ?>
        </div>
    </div>
</main>

<?php include ('footer.php'); ?>