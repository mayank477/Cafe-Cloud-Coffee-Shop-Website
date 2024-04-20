<?php
include_once "connection.php";
ob_start();
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
    $getposts = mysqli_query($conn, "SELECT * FROM product");
    if (mysqli_num_rows($getposts)) {
        echo '<ul id="recs">';
        while ($row = mysqli_fetch_assoc($getposts)) {
            $pName = $row['pname'];
            $price = $row['price'];
            $details = $row['details'];
            $picture = $row['imgpath'];
            $pid = $row['pid'];
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
                            <a href="addtocart.php?pid='.$pid.'">
                                <button class="btn btn-success">Add To Cart</button>
                            </a>
                        </div>
                    </li>
                </ul>
                </div>
            ';
        }
    }
    ?>
	</div>
</body>
</html>



<!-- 
    // include_once "connection.php";
    // $sql_obj=mysqli_query($conn,"select * from product");
    
    // // while($row=mysqli_fetch_assoc($sql_obj))

    // // Working
    // while($row=mysqli_fetch_assoc($sql_obj)){
    //     print_r($row);
    //     echo "<div class='pdt-card'>
    //         <div class='pname'>$row[pname]</div>
    //         <div class='price'>$row[price]</div>
    //         <div class='details'>$row[details]</div>
    //         <img src='$row[imgpath]'>

    //         </div>";
    // } -->


    

    
