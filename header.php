<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pak Pet</title>
    <link rel="stylesheet" href="style.css">

    <meta property="og:title" content="Pakpet">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/logo.png.png">
    <meta property="og:url" content="https:">
    <meta property="og:description"
        content="This is a website for the Pet Lovers to buy and sell the pets, thier products and provide Different types od services to others ">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Pakpet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- BootStrap Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <style>
        :root {
            --primary-color: #4A919E;
            --secondary-color: #1a5f6b;
            padding: 0;
            margin: 0;
            font-family: 'Roboto', sans-serif;

        }

        .bg-lightgray {
            background-color: #f7f7f7;
        }

        .bg-pri {
            background-color: var(--primary-color);
        }

        .bg-sec {
            background-color: var(--secondary-color);
        }

        .bg-pri:hover {
            background-color: var(--secondary-color);
            transition: 0.3s;
        }

        .bg-sec:hover {
            transition: 0.3s;
            background-color: var(--primary-color);
        }

        .text-pri {
            color: var(--primary-color);
        }

        .text-sec {
            color: var(--secondary-color);
        }

        .red {
            color: red;
        }

        .icon {
            width: 10px;
        }

        .hoverA {
            color: #ffffff;
            text-decoration: none;
        }

        .hoverA:hover {
            transition: 0.3s;
            color: lightblue;
        }

        header {
            background-color: var(--primary-color);
            color: white;
        }

        .logopic {
            width: 50px;

        }

        header nav div {
            color: white;
        }

        .head-button {
            background-color: var(--primary-color);
        }

        .head-button:hover {
            background-color: var(--secondary-color);
        }

        .afterheaderimage {
            background-image: url('images/Background.avif');
            width: 100%;
            height: 300px;
            background-repeat: no-repeat;
            /* background-position: center; */
            background-size: 100%;
            display: flex;
            justify-content: center;

            align-items: center;
        }

        @media (max-width: 767px) {
            .afterheaderimage {
                height: 130px;
            }
        }


        .afterheaderimage img {
            width: 50px;
        }

        .afterheaderimage input::placeholder {
            color: rgba(255, 255, 255, 0.7);
            /* Light white color */
        }

        .afterheaderimagesearch {
            position: relative;
            width: 300px;
            opacity: 0.9;
        }

        .afterheaderimagesearch input[type="text"] {
            background-color: var(--primary-color);
            width: 100%;
            padding: 10px 40px 10px 20px;
            border-radius: 50px;
            border: 2px solid #ddd;
            outline: none;
            transition: all 0.3s ease;
            color: #ffffff;
        }

        .afterheaderimagesearch input[type="text"]:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);

        }

        .afterheaderimagesearch img {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            cursor: pointer;
        }

        .afterheaderimagesearch img:hover {
            opacity: 0.7;
        }









        .container {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            padding: 0;
            margin: 0 auto;
        }

        .container-box {
            max-width: 360px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            margin: 30px 10px;
            border: 1px solid lightgray;
            border-radius: 8px;
            flex-wrap: wrap;
        }

        .container-box h2 {
            width: 100%;
            text-align: center;
        }

        .container-box img {
            border-radius: 15px;
            width: 100%;
            height: 250px;
            margin-bottom: 10px;
            object-fit: cover;
        }





        /* Product page */
        .porducts {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            padding: 0;
            margin: 0 auto;
        }

        .porduct-box {
            max-width: 260px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            margin: 5px;
            border: 1px solid lightgray;
            border-radius: 8px;
            flex-wrap: wrap;

        }

        .porduct-box h3 {
            width: 100%;
            text-align: center;
        }

        .product-box p {
            height: 10px;
            overflow: hidden;
            /* Hide the overflow text */
            white-space: nowrap;
            /* Prevent text from wrapping to the next line */
            text-overflow: ellipsis;
            /* Add an ellipsis ("...") to indicate overflow */
        }

        .porduct-box img {
            border-radius: 15px;
            width: 100%;
            height: 180px;
            object-fit: cover;

            margin-bottom: 10px;
        }

        .button1 {
            display: flex;
            align-items: left;
        }

        .addtocart {
            background-color: orangered;
            color: white;

        }

        .addtocart:hover {
            transition: 0.5s;
            background-color: orange;
            color: white;

        }

        .butt {
            background-color: var(--primary-color);
            color: white;

        }

        .butt:hover {
            transition: 0.5s;
            background-color: var(--secondary-color);
            color: white;

        }






        /* PRoduct Detail Page */
        .product_detail {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    border: 2px #ddd solid;
    margin: 30px auto;
    padding: 20px;
    background-color: white;
}

.product_detail div {
    flex: 1 1 45%; /* Ensures each div takes up nearly equal space */
    margin: 10px;
    box-sizing: border-box; /* Prevents padding from affecting width */
}

@media screen and (max-width: 768px) {
    .product_detail {
        flex-direction: column; /* Stacks divs vertically */
    }

    .product_detail div {
        flex: 1 1 100%; /* Each div takes up full width */
        margin: 5px 0;  /* Adjust margin to avoid merging */
    }
}

        .product_detail img {
            width: 100%;
            height: auto;
            max-width: 500px;
            /* Optional: limits the maximum size */
            object-fit: cover;
            /* max-width: 500px;
            max-height: 370px;
            object-fit: cover; */
        }

        /* @media screen and (max-width: 550px) {
            .product_detail img {
                max-width: 250px;
                max-height: 180px;
                object-fit: cover;
            }
        } */

        .product-detail h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .product-detail h3 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .product-detail p {
            font-size: 1.1rem;
        }

        .seller-info h4 {
            font-size: 1.5rem;
        }













        footer {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 3px;
            margin-top: 10px;
            background-color: var(--secondary-color);
            color: #ffffff;
            text-align: center;
            width: 100%;
            flex-wrap: wrap;
            /* position: relative;
            bottom: 0; */
            /* margin-top: auto; */
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            align-items: center;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: bold;
            flex: 1;
        }

        .footer-links {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            text-align: center;
        }

        .footer-links a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: black;
        }

        .footer-info {
            flex: 1;
        }

        .footer-info p {
            margin: 5px 0;
        }

        /* Responsiveness for smaller screens */
        @media (max-width: 768px) {
            footer {
                padding: 15px 10px;
            }

            .footer-logo {
                font-size: 18px;
            }

            .footer-links a {
                font-size: 14px;
            }

            .footer-info p {
                margin: 3px 0;
            }
        }

        /* Responsiveness for even smaller screens */
        @media (max-width: 480px) {
            footer {
                flex-direction: column;
                align-items: center;
            }

            .footer-content {
                flex-direction: column;
            }

            .footer-info {
                margin-top: 15px;
            }

        }
























        /* LOGIN SIGN Up */
    </style>
</head>

<body>
    <header class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand active head-button" href="index.php"><img class="logopic " src="images/logo.png"
                        alt=""> PAKPET</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active head-button" href="products.php">Buy Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link head-button active" aria-current="page" href="insert_product.php">Sell
                                Products</a>
                        </li>
                        <!-- <li class="nav-item dropdown active head-button">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="view_pets.php">Pets</a></li>
                                <li><a class="dropdown-item" href="view_pets_products.php">Pets Accessories</a></li>
                                <li><a class="dropdown-item" href="view_pets_services.php">Pets Clinic</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="sell_things.php">Sell Product</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active head-button" href="contactus.php#Contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active head-button" href="contactus.php#About">About</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <?php
                        if (!isset($_SESSION['fname'])) {
                            // User is not logged in
                            echo '<a class="btn btn-outline-dark me-2"  href="login.php">Login in</a>
                            <a class="btn btn-dark text-white me-2" href="signup.php">Register</a>';
                        } else {
                            // User is logged in
                            $username = $_SESSION['fname'];
                            $user_id = $_SESSION['user_id'];
                            echo '<a href="cart.php" class="btn btn-outline-dark me-2" type="button">Go to Cart</a>
                                <div class="dropdown">
                                <a class="btn btn-dark text-white btn-outline-secondary dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">' . htmlspecialchars($username) . '</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Go to Cart</a></li>
                                    <li><a class="dropdown-item" href="user_profile.php"> ' . htmlspecialchars($username) . ' userId : ' . htmlspecialchars($user_id) . '`s Profile </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>