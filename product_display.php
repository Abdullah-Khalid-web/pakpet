<?php
include 'connection.php';
function product_display($result)
{
    $output = '';
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = null;
    }

    while ($row_data = mysqli_fetch_assoc($result)) {

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

        $time_elapsed = time_elapsed_string($product_date);

        echo " 
                    <a class='nav-link text-center' href='product_details.php?product_id=$product_id'>
                        <div class='porduct-box'>
                            <img class='p-0 m-0' src='product_images/" . htmlspecialchars($product_image) . "' alt='Product Image'>
                            <h3 class='p-0 m-0'>$product_title</h3>
                            <h5 class='m-0 justify-content-right'> $product_price rs  </h5>
                            <p class='m-0'> Category : $product_type </p>
                            <p class='m-0'>City : $product_category   </p>
                            <p  >Date : $time_elapsed </p>
                            <div class='button1'>
                            <a href='addtocart.php?product_id=$product_id & user_id=$user_id' class='btn mx-1 addtocart'>Add to cart</a>
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
}











// Time Calculate
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = [
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>