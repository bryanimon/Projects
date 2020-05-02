<?php

include 'includes/dbconnect.php';

$query = "SELECT * FROM cart_items WHERE UserID = '" . $_SESSION['user-id'] . "'";
$result = mysqli_query($GLOBALS['conn'], $query);

$GLOBALS['cart-items'] = array();

while($row = mysqli_fetch_assoc($result)){
	// Fetch Item Data
	$query = "SELECT * FROM products WHERE `ProductID` = '" . $row['ProductID'] . "'";
	$productResult = mysqli_query($GLOBALS['conn'], $query);
	
	$product = mysqli_fetch_assoc($productResult);
	
	$product['count'] = $row['Count'];
	$product['CartItemID'] = $row['CartItemID'];
	$GLOBALS['cart-items'][] = $product;
}

?>