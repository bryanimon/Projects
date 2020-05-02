<?php

include '../dbconnect.php';

if(isset($_GET['image']) && isset($_GET['id']) && isset($_GET['code'])){
	$image_name = $_GET['image'];
	$id = $_GET['id'];
	
	$index = 0;
	$data = "";
	$newData = "";
	
	// Retrieve Row
	$query = "SELECT * FROM products WHERE ProductID = '" . $_GET['id'] ."'";
	$result = mysqli_query($GLOBALS['conn'], $query);

	while($row = mysqli_fetch_assoc($result)){ $data = $row; }	
	
	$newData = str_replace($image_name . "/", "", $data['ProductImages']);
	
	$query = "UPDATE `products` SET `ProductImages` = ? WHERE `ProductID` = ?";
	$statement = mysqli_prepare($GLOBALS['conn'], $query);
	
	if($statement){
		mysqli_stmt_bind_param($statement, "si", $newData, $id);
		mysqli_stmt_execute($statement);
	}
	
	$link = '../../img/' . $image_name;
	unlink($link);

	echo "<script>window.location.href='../../edit-product-details.php?code=" . $_GET['code']. "';</script>";
	
}else{
	echo "<script>window.location.href='../../tables.php';</script>";
}

?>