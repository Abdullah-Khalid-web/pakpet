<?php include 'header.php' ?>

<Style>

</Style>
<main>
    <!-- Main page pIc or serach input -->
    <div class="afterheaderimage">
        <div class="afterheaderimagesearch">
            <form action="" method="post">
                <input type="text" name="search_input" id="search_input" placeholder="Search..." value="">
                <button type="submit" name="search_button" class="btn">
                    <img src="Icons/search.png" alt="Search Icon">
                </button>
            </form>
        </div>
    </div>

    <!-- Search Box -->
    <div class=" mx-1 search_container">
        <?php include 'search.php'; ?>
    </div>

    <!-- Main Container -->
    <div class="container">
        <a href="insert_product.php" class="nav-link">
            <div class="container-box">
                <img src="images/product1.jpg" alt="">
                <h2 class="">Sell Pets and Pet items</h2>
                <p>You Can Sale Pet , pets products like food, cages, medicines, vitamins and etc and you can also
                    provide the Services as Doctor, Nutrition, trainer and etc </p>
                <a class="btn btn-primary bg-pri w-100">Add Product</a>
            </div>
        </a>

        <a href="products.php" class="nav-link">
            <div class="container-box">
                <img src="images/cat-8198720_640.webp" alt="">
                <h2 class="">Pets Store or Clinic</h2>
                <p>You Can Buy Pet , pets products like food, cages, medicines, vitamins and etc and you can also attain
                    the Services Like Doctor, Nutrition, trainer and etc </p>
                <a class="btn btn-primary bg-pri w-100">Buy Product</a>
            </div>
        </a>
        <a href="pet_blogs.php" class="nav-link">
            <div class="container-box">
                <img src="images/backgroundImage.webp" alt="">
                <h2 class="">Pets Blog</h2>
                <p>You Can watch tht vlogs of the pets in which you can view who to train dogs parrots and cats and
                    thier activities and the vlogs of the nutrition and Doctor</p>
                <a class="btn btn-primary bg-pri w-100">View vlogs</a>
            </div>
        </a>

        <!-- 
        <a href="view_pets_services.php" class="nav-link">
            <div class="container-box">
                <img src="images/cat-8198720_640.webp" alt="">
                <h2 class="">Pets Accessories</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nostrum laudantium qui aut quos
                    tempora </p>
            </div>
        </a> -->
        <!-- <a href="view_pets_services.php" class="nav-link">
            <div class="container-box">
                <img src="images/cat-8198720_640.webp" alt="">
                <h2 class="">Pets Clinic</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nostrum laudantium qui aut quos
                    tempora </p>
            </div>
        </a> -->

        <!-- <div class="container-box">
            <img src="images/cat-8198720_640.webp" alt="">
            <h2>Help From Chat Bot</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nostrum laudantium qui aut quos tempora
            </p>
        </div>
        <div class="container-box">
            <img src="images/cat-8198720_640.webp" alt="">
            <h2>Chats With others</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nostrum laudantium qui aut quos tempora
            </p>
        </div> -->
    </div>

    <hr class=" bg-sec text-sec">

    <!-- Products Item -->
    <div class="container p-0">
        <div class="porducts">
            <?php include 'view_product.php'; ?>
        </div>
    </div>

</main>





<?php include ('footer.php') ?>