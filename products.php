<?php include ('header.php') ?>
<style>

</style>

<main>

    <!-- Search Box -->
 
        <div class="container afterheaderimagesearch my-2">
            <form action="" method="post">
                <input type="text" name="search_input" id="search_input" placeholder="Search..." value="">
                <button type="submit" name="search_button" class="btn">
                    <img src="Icons/search.png" alt="Search Icon">
                </button>
            </form>
        </div>

    <div class=" mx-1 search_container">
        <?php include 'search.php'; ?>
    </div>

    <div class="container p-0">
        <div class="porducts">
            <?php
            $select_pet_type = "Select * from `pet_products` order by rand()";
            $result = mysqli_query($con, $select_pet_type);
            product_display($result);
            ?>
        </div>
    </div>
</main>

<?php include ('footer.php') ?>