<?php 
include '../dbconnect.php';

$product_code = "";
$status = "Void/Cancelled";

if(isset($_GET['code'])){ $product_code = $_GET['code']; }
if(isset($_GET['status'])){
	if($_GET['status'] == "success"){
		$status = "Delivered/Picked up";
	}
}

$query = "UPDATE `orders` SET `Status`=? , `DateRecorded`=now() WHERE `DeliveryCode` = ?";
$statement = mysqli_prepare($GLOBALS['conn'], $query);

if($statement){
	mysqli_stmt_bind_param($statement, "ss", $status, $product_code);
	mysqli_stmt_execute($statement);
	
	echo "<script>alert('Order recorded successfully!'); window.location.href='../../reports.php';</script>";
}else{
	echo "<script>alert('Order failed to recorded'); window.location.href='../../delivery.php';</script>";
}

?>