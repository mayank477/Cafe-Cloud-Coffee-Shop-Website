<?php
session_start();
include_once "connection.php";
$cartid=$_GET['cartid'];


$status=mysqli_query($conn,"delete from cart where cartid=$cartid");
if($status){
    echo "product Removed from cart";
    header("location:viewcart.php");
}
else{
    echo "Failed to remove from cart";
    echo mysqli_error($conn);
}
?>