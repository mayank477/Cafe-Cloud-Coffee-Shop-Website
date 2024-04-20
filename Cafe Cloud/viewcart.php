<?php
session_start();
include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .pdt-card{
            width:300px;
            display:inline-block;
            border: 2px solid grey;
        }
        .pdt_img{
            width:100%;
            height: 200px;
            margin:2px;
            /* border: 2px solid grey; */
            padding:10px;
        }
    </style>
</head>
<body>
    <div>

        <?php
        // $sql_result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where userid=$_SESSION['userid']");
        $sql_result = mysqli_query($conn, "select * from cart join product on cart.pid=product.pid where userid=" . $_SESSION['userid']);
        $total=0;
        while ($row = mysqli_fetch_assoc($sql_result)) {
            $pName = $row['pname'];
            $price = $row['price'];
            $details = $row['details'];
            $picture = $row['imgpath'];
            $pid = $row['pid'];
            $cartid = $row['cartid']; 
            echo '
                <div class="pdt-card">
                <ul style="float: left;">
                    <li style="float: left; padding: 0px 25px 25px 25px;">
                        <div class="home-prodlist-img"><a href="">
                            <img src="product_image/'.$picture.'" class="pdt_img">
                            </a>
                            <div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">' . $pName . '</span><br> Price: ' . $price . ' <br><span style="font-size: 15px;">' . $details . '</span><br> </div>
                        </div>
                        <div class="text-center">
                            <a href="deletecart.php?cartid='.$cartid.'">
                                <button class="btn btn-danger">Remove from Cart</button>
                            </a>
                        </div>
                    </li>
                </ul>
                </div>
            ';
            $total=$total+$price;   
        }    
         
        echo "<div class='bg-primary p-3 d-flex justify-content-around'>
            <h1 class='text-white'>Total Payable=$total</h1>
            <a href='createorder.php'>
                <button class='btn btn-warning'>Place Order</button>
            </a>
        </div>"; 
        ?>
        </div>
</body>
</html>