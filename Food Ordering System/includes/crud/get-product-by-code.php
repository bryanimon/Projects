<?php
include 'includes/dbconnect.php';

if(isset($_GET['code'])){
	$code = $_GET['code'];
	
	$query = "SELECT * FROM products WHERE ProductCode = '" . $code . "'";
	$result = mysqli_query($GLOBALS['conn'], $query);

	$GLOBALS['product'] = "";
	$row = "";
	
	while($row = mysqli_fetch_assoc($result)){
		$GLOBALS['product'] = $row;
	}
	
	if(empty($GLOBALS['product'])){
		echo "<script>alert('No product found!'); window.location.href='tables.php';</script>";
	}
}else{
	echo "<script>window.location.href='tables.php';</script>";
}

?>