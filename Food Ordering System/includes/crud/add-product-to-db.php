<?php 

include '../dbconnect.php';

$product_name = "s";
$product_code = "";
$product_price = 0;
$product_desc = "";
$product_visibility = "";

if(isset($_POST['product-name'])){ $product_name = $_POST['product-name']; }
if(isset($_POST['product-code'])){ $product_code = $_POST['product-code']; }
if(isset($_POST['product-price'])){ $product_price = $_POST['product-price']; }
if(isset($_POST['product-desc'])){ $product_desc = $_POST['product-desc']; }
if(isset($_POST['visibility'])){ $product_visibility = $_POST['visibility']; }

$query = "INSERT INTO `products` (`ProductName`, `ProductCode`, `ProductPrice`, `ProductDescription`, `ProductHidden`) VALUES (?, ?, ?, ?, ?)";

$statement = mysqli_prepare($GLOBALS['conn'], $query);

if($statement){
	mysqli_stmt_bind_param($statement, "ssisi", $product_name, $product_code, $product_price, $product_desc, $product_visibility);
	mysqli_stmt_execute($statement);
	
	echo "<script>alert('Product added successfully!');window.location.href='../../tables.php';</script>";
}else{
	echo "<script>alert('Product failed to be added!');window.location.href='../../tables.php';</script>";
}

?>