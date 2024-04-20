<?php
session_start();
include_once "connection.php";

$uname=$_SESSION['username'];
$upass=$_SESSION['password'];
$uid=$_SESSION['userid'];
$pid=$_GET['pid'];
$sql_obj=mysqli_query($conn,"select * from user where username='$uname' and password='$upass'");
// $sql_obj=mysqli_query($conn,"select * from user where username='$uname' and password='$cipher_text'");

// $no_of_records=mysqli_num_rows($sql_obj);
// if($no_of_records==0){
//     echo 'Inavalid Credentials';
//     die;
// }

$row=mysqli_fetch_assoc($sql_obj);
print_r($uid);

echo '<br>';

$sql_obj1=mysqli_query($conn,"select * from product");
while($row1=mysqli_fetch_assoc($sql_obj1)){
    print_r($row1);
    echo '<br>';
}

// $row1=mysqli_fetch_assoc($sql_obj1);
// print_r($row1['pid']);

echo '<br>';

echo "Received pid=$pid";

echo '<br>';

$status=mysqli_query($conn,"insert into cart(userid,pid) values($uid,$pid)");
if($status){
    echo "Added to cart successfully";
}
else{
    echo "Failed to add to cart";
    echo mysqli_error($conn);
}

?>