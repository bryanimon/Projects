<?php

include '../dbconnect.php';

// Variables
$allowed = array('jpg', 'jpeg', 'png');

$product_id = "";
$product_name = "s";
$product_price = 0;
$product_desc = "";
$product_visibility = "";
$product_images = "";

if(isset($_POST['product-id'])){ $product_id = $_POST['product-id']; }
if(isset($_POST['product-name'])){ $product_name = $_POST['product-name']; }
if(isset($_POST['product-price'])){ $product_price = $_POST['product-price']; }
if(isset($_POST['product-desc'])){ $product_desc = $_POST['product-desc']; }
if(isset($_POST['visibility'])){ $product_visibility = $_POST['visibility']; }

for($i = 0; $i < count($_FILES['program_images']['name']); $i++){
	$file = $_FILES['program_images'];
	$fileName = $_FILES['program_images']['name'][$i];
	$fileTmpName = $_FILES['program_images']['tmp_name'][$i];
	$fileSize = $_FILES['program_images']['size'][$i];
	$fileError = $_FILES['program_images']['error'][$i];
	$fileType = $_FILES['program_images']['type'][$i];
	
	$fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
	
	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 200097152){
				$fileNameNew = uniqid('', true) . "." . $fileActualExt;
				$fileTarget = '../../img/' . $fileNameNew;
				move_uploaded_file($fileTmpName, $fileTarget);
				
				$product_images = $product_images . $fileNameNew . "/";
			}
		}
	}
}

$query = "SELECT * FROM products WHERE ProductID = '" . $_POST['product-id'] . "'";
$result = mysqli_query($GLOBALS['conn'], $query);

while($row = mysqli_fetch_assoc($result)){
	$product_images = $product_images . $row['ProductImages'];
}

$query = "UPDATE `products` SET `ProductName`=?, `ProductPrice`=?, `ProductDescription`=?, `ProductHidden`=?, `ProductImages` = ? WHERE `ProductID` = ?";
$statement = mysqli_prepare($GLOBALS['conn'], $query);

if($statement){
	mysqli_stmt_bind_param($statement, "sisisi", $product_name, $product_price, $product_desc, $product_visibility, $product_images, $product_id);
	mysqli_stmt_execute($statement);
	
	echo "<script>alert('Product updated successfully!');window.location.href='../../tables.php';</script>";
}else{
	echo "<script>alert('Product failed to be updated!');window.location.href='../../tables.php';</script>";
}


?>
