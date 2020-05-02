<?php

include '../dbconnect.php';

if(isset($_GET['code'])){
	$code = $_GET['code'];
	
	$query = "DELETE FROM products WHERE ProductCode='" . $code ."'";
	$result = mysqli_query($GLOBALS['conn'], $query);
	
	echo "<script>alert('Product deleted successfully!'); window.location.href='../../tables.php';</script>";
}else{
	echo "<script>alert('Failed to delete product!'); window.location.href='../../tables.php';</script>";
}

?>