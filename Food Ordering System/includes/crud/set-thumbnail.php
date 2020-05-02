<?php

include '../dbconnect.php';

if(isset($_GET['image']) && isset($_GET['id']) && isset($_GET['code'])){
	$query = "UPDATE `products` SET `ProductThumbnail`=? WHERE `ProductID` = ?";
	$statement = mysqli_prepare($GLOBALS['conn'], $query);

	if($statement){
		mysqli_stmt_bind_param($statement, "si", $_GET['image'], $_GET['id']);
		mysqli_stmt_execute($statement);
		
		echo "<script>window.location.href='../../edit-product-details.php?code=" . $_GET['code']. "';</script>";
	}else{
		echo "<script>window.location.href='../../tables.php';</script>";
	}
}

?>