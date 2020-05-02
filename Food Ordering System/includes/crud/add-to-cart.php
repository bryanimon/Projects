<?php

include '../dbconnect.php';
session_start();

$data = "";

if(!isset($_SESSION['user-logged']) || $_SESSION['user-logged'] == 0){
	$data = "NONE";
}else{
	if(isset($_POST['id'])){
		if(isset($_SESSION['user-id'])){
			$productID = $_POST['id'];
			$userID = $_SESSION['user-id'];
			
			//Check if product already exists in the cart
			$query = "SELECT * FROM cart_items WHERE `UserID`='" . $userID . "' AND `ProductID`='" . $productID . "'";
			$result = mysqli_query($GLOBALS['conn'], $query);
			
    	$count = mysqli_num_rows($result);
			
			// DOES NOT EXISTS
			if($count <= 0){
				$query = "INSERT INTO cart_items (`UserID`, `ProductID`, `Count`) VALUES ('" . $userID . "', '" . $productID . "', '1')";
				$result = mysqli_query($GLOBALS['conn'], $query);
			}else{
				$query = "UPDATE cart_items SET `Count` = `Count` + 1 WHERE `UserID` = '" . $userID . "' AND `ProductID` = '" . $productID . "'";
				$result = mysqli_query($GLOBALS['conn'], $query);
			}
		}
	}
}
	
print json_encode($data);

?>