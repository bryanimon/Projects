<?php

include 'includes/dbconnect.php';

$


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