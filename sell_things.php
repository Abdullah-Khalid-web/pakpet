<?php include ('header.php') ?>

<main>
    <br>
    <div class="container">

        <!-- category -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product-category" class=" b form-label"><b> Choose the Category<span class="red">*</span></b></label>
            <select name="product-category" onclick="reload()" class="form-select" id="product-category"
                class="product-category">
                <?php
                $select_categories = "SELECT * from `category`";
                $result_categories = mysqli_query($con, $select_categories);

                while ($row_data = mysqli_fetch_assoc($result_categories)) {
                    $categories_title = $row_data['category_title'];
                    $categories_id = $row_data['category_id'];
                    echo "<option ><b>$categories_title</b> </option>";

                }



                ?>
            </select>

        </div>


        <div>
        </div>
    </div>

    <?php

    // include 'insert_pet.php';
    // include 'insert_pet_accessiores.php';
    // include 'insert_pet_services.php';
    ?>
</main>

<script>
    function reload() {
        reload.sell_tings.php;
    }
</script>

<?php include 'footer.php' ?>