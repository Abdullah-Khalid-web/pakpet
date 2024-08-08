<?php include 'header.php' ?>

<main>
    <div class="container">
        <div class="porducts">
            <?php
            $select_pet_type = "Select * from `pet_insert`";
            $result_pet_type = mysqli_query($con, $select_pet_type);

            while ($row_data = mysqli_fetch_assoc($result_pet_type)) {

                $product_owner_id = $row_data['user_id'];
                $pet_id = $row_data['pet_id'];
                $pet_title = $row_data['pet_title'];
                $pet_type = $row_data['pet_type'];
                $pet_bread = $row_data['pet_bread'];
                $pet_age = $row_data['pet_age'];
                $pet_description = $row_data['pet_discription'];
                $pet_image = $row_data['pet_image'];
                $pet_price = $row_data['pet_price'];
                $pet_date = $row_data['pet_date'];
                $pet_status = $row_data['pet_status'];



                echo " 
                
                 <div class='porduct-box'>
                <p class='p-0 m-0'>$product_owner_id</p>
                <img src='images/cat-8198720_640.webp' >
                <h3 class='p-0 m-0'>$pet_title</h3>
                <p> $pet_description<b class='justify-content-left'> $pet_date </b> </p>
                <div class='button1'>
                    <a class='btn  m-1 addtocart'>Add to cart</a>
                    <a class='btn  m-1 butt'>More info <svg height='24' width='24' viewBox='0 0 24 24'
                            xmlns='http://www.w3.org/2000/svg'>
                            <path d='M0 0h24v24H0z' fill='none'></path>
                            <path d='M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z'
                                fill='currentColor'></path>
                        </svg></a>
                </div>
            </div>
            ";
            }
            ?>


        </div>
    </div>


</main>

<?php include 'footer.php' ?>