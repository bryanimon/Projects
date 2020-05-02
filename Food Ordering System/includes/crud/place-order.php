<?php
include '../dbconnect.php';
session_start();

$DeliveryCode = "";
$UserID = 0;
$CustomerName = "";
$OrderList = "";
$Total = 0;
$Address = "";
$shippingOption = "";
$paymentMethod = "Cash On Delivery";
$orderLocation = "";

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$code_length = 10;

$DeliveryCode = substr(str_shuffle($permitted_chars), 0, $code_length);
$DeliveryCode = strtoupper($DeliveryCode);

if(isset($_SESSION['user-id'])){ $UserID = $_SESSION['user-id']; }
if(isset($_SESSION['user-name'])){ $CustomerName = $_SESSION['user-name']; }
if(isset($_SESSION['user-address'])){ $Address = $_SESSION['user-address']; }
if(isset($_POST['order-list'])){ $OrderList = htmlspecialchars($_POST['order-list']); }
if(isset($_POST['order-total'])){ $Total = $_POST['order-total']; }
if(isset($_POST['shipping-option'])){ $shippingOption = $_POST['shipping-option']; }
if(isset($_POST['order-location'])){ $orderLocation = $_POST['order-location']; }

$query = "INSERT INTO `orders` (`DeliveryCode`, `UserID`, `CustomerName`, `OrderList`, `Total`, `Address`, `PaymentMethod`, `DeliveryMethod`, `OrderLocation`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$statement = mysqli_prepare($GLOBALS['conn'], $query);

if($statement){
	mysqli_stmt_bind_param($statement, "sississss", $DeliveryCode, $UserID, $CustomerName, $OrderList, $Total, $Address, $paymentMethod, $shippingOption, $orderLocation);
	mysqli_stmt_execute($statement);
	
	$query = "UPDATE `users` SET TotalOrders = TotalOrders + 1 WHERE `UserID` = ?";
	$statement = mysqli_prepare($GLOBALS['conn'], $query);

	if($statement){
		mysqli_stmt_bind_param($statement, "i", $UserID);
		mysqli_stmt_execute($statement);
	}else{
		$data = "NONE";
	}
	
	$query = "DELETE FROM cart_items WHERE UserID='" . $UserID ."'";
	$result = mysqli_query($GLOBALS['conn'], $query);
	
	if(isset($_SESSION['count-data'])){
		$countData = $_SESSION['count-data'];
		$userID = 0;
		$userCount = 0;
		
		for($i = 0; $i < count($countData); $i++){
			$userID = $countData[$i][0];
			$userCount = $countData[$i][1];
			
			$query = "UPDATE `products` SET TotalSales = TotalSales + ? WHERE `ProductID` = ?";
			$statement = mysqli_prepare($GLOBALS['conn'], $query);

			if($statement){
				mysqli_stmt_bind_param($statement, "ii", $userCount, $userID);
				mysqli_stmt_execute($statement);
			}else{
				$data = "NONE";
			}
		}
		
	}
	
	echo "<script>alert('Order Successful!');window.location.href='../../shop.php';</script>";
}else{
	echo "<script>alert('Something went wrong. Try again!');window.location.href='../../cart.php';</script>";
}

?>