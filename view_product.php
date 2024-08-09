
        <?php
        $select_pet_type = "Select * from `pet_products`";
        $result_pet_type = mysqli_query($con, $select_pet_type);

        while ($row_data = mysqli_fetch_assoc($result_pet_type)) {

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
                        <p class='m-0'>Price : $product_price   </p>
                        <p  >Date : $product_date </p>
                        <div class='button1'>
                        <a href='delete_product.php?product_id=$product_id' class='btn mx-1 addtocart'>Remove</a>
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
        ?>