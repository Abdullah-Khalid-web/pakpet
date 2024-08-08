<?php include 'header.php' ?>

<main>
    <div class="container">
        <div class="porducts">
            <?php
            $select_pet_type = "Select * from `pet_services`";
            $result_pet_type = mysqli_query($con, $select_pet_type);

            while ($row_data = mysqli_fetch_assoc($result_pet_type)) {

                $product_owner_id = $row_data['user_id'];
                $service_id = $row_data['service_id'];
                $service_title = $row_data['service_title'];
                $service_specailization = $row_data['service_specailization'];
                $service_description = $row_data['service_description'];
                $service_image = $row_data['service_image'];
                $service_price = $row_data['service_price'];
                $service_date = $row_data['service_date'];
                $service_status = $row_data['service_status'];

                echo " 
                <div class='porduct-box'>
                
                    <p class='p-0 m-0'>$product_owner_id</p>
                    <img src='images/cat-8198720_640.webp' >
                    <h3 class='p-0 m-0'>$service_title</h3>
                    <p> $service_description<b class='justify-content-left'>$service_date</b> </p>

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