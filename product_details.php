<?php include ('header.php') ?>

<body class="bg-lightgray">
    <main>
        <div>
            <?php
            $product_id = $_GET['product_id'];
            $sql = "SELECT * FROM `pet_products` where product_id = '$product_id'";
            // echo "Error: " . $sql . "<br>" . mysqli_error($con);
            $result = mysqli_query($con, $sql);
            $row_data = mysqli_fetch_assoc($result);

            $product_owner_id = $row_data['user_id'];
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $product_type = $row_data['product_type'];
            $product_quantity = $row_data['product_quantity'];
            $product_image = $row_data['product_image'];
            $product_description = $row_data['product_description'];
            $product_price = $row_data['product_price'];
            $product_date = $row_data['product_date'];
            $product_status = $row_data['product_status'];


            $user_id = $row_data['user_id'];
            $sql1 = "SELECT * FROM `user_registeration` where user_id = '$user_id'";
            $result1 = mysqli_query($con, $sql1);
            $row_data1 = mysqli_fetch_assoc($result1);
            $user_email = $row_data1['user_email'];
            $user_fname = $row_data1['user_fname'];
            $user_lname = $row_data1['user_lname'];
            $user_phoneno = $row_data1['user_phoneno'];
            $user_address = $row_data1['user_address'];

            // echo $user_id .'<br>' . $product_title;
            

            echo "
            <div class='product_detail container'>
                <div class='img'>
                    <img  class='p-0 m-0' src='images/$product_image' >  
                </div>
                <div>
                    <h2> $product_title</h2>
                    <h2>Rs $product_price </h2>
                    <p><b>Categaroy</b> :   $product_quantity </p>
                    <p><b>Type</b> : $product_type </p>
                    <p><b>Description</b> : $product_description </p>
    
                    <h3>Seller Information</h3>
                    <p><b> Name</b> : $user_fname  $user_lname </p>
                    <p><b> Phone  no</b> :  $user_phoneno </p>
                    <!-- <p> <b>Email</b> : $user_email </p> -->
                    <p><b> Address</b> : $user_address </p>
                    <a href='addtocart.php?product_id=$product_id & user_id=$product_owner_id' class=' btn mx-1 w-100  addtocart'>Add to cart</a>
                    </div>
                    
                    
                    
                    </div>
                    
                    ";
// The related products
echo '<hr>
<h3 class="text-center text-sec">Related Products</h3>
    <div class="container p-0">
    <div class="products d-flex" > <!-- Corrected class name -->
';

$sql2 = "SELECT * FROM `pet_products` WHERE product_title LIKE '%" . mysqli_real_escape_string($con, $product_title) . "%'";
$result2 = mysqli_query($con, $sql2);

if (!$result2) {
    echo '<p class="text-center">Error fetching related products: ' . mysqli_error($con) . '</p>';
} else if (mysqli_num_rows($result2) == 0) {
    echo '<p class="text-center">No related products found</p>';
} else {
    product_display($result2);
}

echo '
    </div>
</div>
';

// The owner Other Products
echo '<hr>
<h3 class="text-center text-sec"> This Saller (' . htmlspecialchars($user_fname) . ' ' . htmlspecialchars($user_lname) . ') other inserted Products</h3>
    <div class="container p-0">
    <div class="products d-flex"> <!-- Corrected class name -->
';

$sql1 = "SELECT * FROM `pet_products` WHERE user_id = '$product_owner_id'";
$result1 = mysqli_query($con, $sql1);

if (!$result1) {
    echo '<p class="text-center">Error fetching owner\'s products: ' . mysqli_error($con) . '</p>';
} else {
    product_display($result1);
}

echo '
    </div>
</div>
';
            ?>



        </div>
    </main>


    <?php include ('footer.php') ?>