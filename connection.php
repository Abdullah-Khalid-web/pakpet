<?php 

$server="localhost";
$username="root";
$password="";
$database="pakpet";

$con = mysqli_connect($server,$username,$password,$database);

if(!$con){
    die(mysqli_error($con));
}

?>