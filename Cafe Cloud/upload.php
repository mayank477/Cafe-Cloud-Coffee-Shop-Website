<?php

print_r($_POST);
echo "<br>";    
print_r($_FILES);


echo "<br>";
$item = "";
//echo $_FILES['pdt_img']['name'];

// $name=$_POST['pname'];
// $price=$_POST['price'];
// $details=$_POST['details'];

include_once "connection.php";

// $name="D:\Mayank\X\htdocs\CafeCloud\images".$_FILES['pdt_img']['tmp_name'];
// move_uploaded_file($_FILES['pdt_img']['tmp_name'],$name);

//*********************WORKING_CODE***************************
// $targetDirectory = "D:/Mayank/X/htdocs/CafeCloud/product_image/";
// $targetFile = $targetDirectory . basename($_FILES['pdt_img']['name']);

// if (move_uploaded_file($_FILES['pdt_img']['tmp_name'], $targetFile)) {
//     echo "The file has been uploaded successfully.";
// } else {
//     echo "Sorry, there was an error uploading your file.";
// }
//***************************************************************

// $status=mysqli_query($conn,"insert into product(pname,price,details,code,category,imgpath,avialable) values($_POST[pname],$_POST['price'],$_POST['details'],$_POST['pcode'],$_POST['category'],$targetFile,$_POST['available'])");

// if($status)
// {
//     echo "Product Uploaded Successfully";
// }
// else{
//     echo "Error in Product Upload";
//     echo mysqli_error($conn);
// }
// Assuming you have already connected to the database ($conn)


//finding file extention
$profile_pic_name = @$_FILES['profilepic']['name'];
$file_basename = substr($profile_pic_name, 0, strripos($profile_pic_name, '.'));
$file_ext = substr($profile_pic_name, strripos($profile_pic_name, '.'));

if (((@$_FILES['profilepic']['type']=='image/jpeg') || (@$_FILES['profilepic']['type']=='image/png') || (@$_FILES['profilepic']['type']=='image/gif')) && (@$_FILES['profilepic']['size'] < 1000000)) {

	$item = $item;
	if (file_exists("product_image/$item")) {
		//nothing
	}else {
		mkdir("product_image/$item");
	}
	
	
	// $filename = strtotime(date('Y-m-d H:i:s')).$file_ext;
    $filename = $profile_pic_name;


	if (file_exists("product_image/$item/".$filename)) {
		echo @$_FILES["profilepic"]["name"]."Already exists";
	}else {
		if(move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "product_image/$item/".$filename)){
			$photos = $filename;

		}else {
			echo "Something Worng on upload!!!";
		}
		//echo "Uploaded and stored in: userdata/profile_pics/$item/".@$_FILES["profilepic"]["name"];
		
		
	}
	}
	else {
		$error_message = 'Add picture!';
	}



// Sanitize and escape the POST values
$pname = mysqli_real_escape_string($conn, $_POST['pname']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$details = mysqli_real_escape_string($conn, $_POST['details']);
$pcode = mysqli_real_escape_string($conn, $_POST['pcode']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$targetFile = mysqli_real_escape_string($conn, $filename); // Make sure $targetFile contains the correct value
$available = mysqli_real_escape_string($conn, $_POST['available']);

// Create a prepared statement
$stmt = mysqli_prepare($conn, "INSERT INTO product (pname, price, details, code, category, imgpath, available) VALUES (?, ?, ?, ?, ?, ?, ?)");


if ($stmt) {
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "sssssss", $pname, $price, $details, $pcode, $category, $targetFile, $available);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Product Uploaded Successfully";
    } else {
        echo "Error in Product Upload";
        echo mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error in preparing the statement";
}

// Don't forget to close your database connection when you're done.
mysqli_close($conn);

?>