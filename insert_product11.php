<div>
    <h1 class="text-center mt-3 text-sec">Pet Poducts</h1>
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title<span class="red">*</span></label>
            <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter Product  Name" autocomplete="off" required="required">
        </div>


        <!-- Product Category -->
        <?php
        echo '
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_category" class="form-label ">Choose the Category <span class="red">*</span></label>
                <select name="product_category" onclick="reload()" class="form-select" id="product_category" class="product_category">';

        $select_categories = "SELECT * from `category`";
        $result_categories = mysqli_query($con, $select_categories);

        while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $categories_title = $row_data['category_title'];
            $categories_id = $row_data['category_id'];
            echo "<option ><b>$categories_title</b> </option>";
        }

        echo '</select>
                </div>';
        ?>

        <!-- Product type -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_type" class="form-label">Choose the Category<span class="red">*</span></label>
            <select name="product_type" class="form-select" id="product_type" class="product_type">
                <option>Animal</option>
                <option>Bird</option>
                <option>Fish</option>
                <option>Food</option>
                <option>Medicine </option>
                <option>Vitamins </option>
                <option>Cages</option>
                <option>Stands</option>
                <option>Nutrition</option>
                <option>Doctor</option>
                <option>Trainer </option>
                <option>Guider</option>
                <option>others</option>
            </select>
        </div>

        <!-- Image -->
        <div class="form-outline mb-4 w-50 m-auto my-2">
            <label for="product_image" class="form-label">Product Image <span class="red">*</span> </label>
            <input type="file" name="product_image" id="product_image" class="form-control" autocomplete="off"
                required="required">
        </div>

        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label"> Discription<span class="red">*</span></label>
            <textarea type="text" name="product_description" id="product_description" class="form-control"
                placeholder="Write the details here:....." autocomplete="off" required="required"></textarea>
        </div>


        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price<span class="red">*</span></label>
            <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Enter pet price" autocomplete="off" required="required">
            <br>
            <button type="submit" name="insert_product" style="background-color: #4A919E;"
                class="  btn btn-primary mb-4 w-100 m-auto">Add Product For Sell</button>
        </div>

    </form>
</div>