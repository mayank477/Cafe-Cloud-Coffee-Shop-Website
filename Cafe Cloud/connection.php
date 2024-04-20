<?php

$conn= new mysqli("localhost","root","","cafecloud");
if ($conn->connect_error){
    echo"Connection failed";
    die;
}

?>