<?php

//$_POST['uname']
//print_r($_POST);

$uname=$_POST['uname'];
$upass1=$_POST['upass1'];
$upass2=$_POST['upass2'];
$uemail=$_POST['uemail'];
$unumber=$_POST['unumber'];
$address=$_POST['address'];

if ($upass1!=$upass2){
    echo"Password Mismatch";
    die;
}

// $conn= new mysqli("localhost","root","","cafecloud");
// if ($conn->connect_error){
//     echo"Connection failed";
//     die;
// }

include_once "connection.php";

//Password encyption (update table first, pasword 128)
//Replace upass1 with $cipher_text when db updated
//$cipher_text=md5($upass1);

$status=mysqli_query($conn,"insert into user(username,password,email,contact_number,address) values('$uname','$upass1','$uemail','$unumber','$address')");
if ($status){
    echo"Signup Successfully Done";
}
else{
    echo"Signup Failed";
    echo mysqli_error($conn);
}

?>