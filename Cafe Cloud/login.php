<?php

session_start();
$_SESSION['login_status']=false;

$uname=$_POST['uname'];
$upass=$_POST['upass1'];

//$cipher_text=md5($upass)

include_once "connection.php";

$sql_obj=mysqli_query($conn,"select * from user where username='$uname' and password='$upass'");
// $sql_obj=mysqli_query($conn,"select * from user where username='$uname' and password='$cipher_text'");

$no_of_records=mysqli_num_rows($sql_obj);
if($no_of_records==0){
    echo 'Inavalid Credentials';
    die;
}

echo "Login Success";

$row=mysqli_fetch_assoc($sql_obj);
print_r($row);

$_SESSION['login_status']=true;
$_SESSION['username']=$row['username'];
$_SESSION['password']=$row['password'];
$_SESSION['userid']=$row['userid'];
header("location:main2.php")

?>