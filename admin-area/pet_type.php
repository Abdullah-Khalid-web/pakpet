<?php
include '../connection.php';
if (isset($_POST['insert_pet_types'])) {
    $pet_type_title = mysqli_real_escape_string($con, $_POST['pet_type_title']);

    // select data from database
    $select_query = "Select * from `pet_type` where pet_type_title = '$pet_type_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('Error: Could not insert category Becsuse it is already')</script>";
    }
    else{
        $insert_query = "INSERT INTO `pet_type` (pet_type_title) VALUES ('$pet_type_title')";
        
        
        $result = mysqli_query($con, $insert_query);
        
        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert category')</script>";
        }
    }
}


?>
<h2 class="text-center my-3">Insert Pet Types</h2>
<form class="mb-2" action="" method="post">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="pet_type_title" placeholder="Insert Pet Types" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_pet_types" value="Insert Pet Types">

    </div>
</form>