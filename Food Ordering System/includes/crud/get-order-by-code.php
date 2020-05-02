<?php

include 'includes/dbconnect.php';

if(isset($_GET['code'])){
	$query = "SELECT * FROM orders WHERE DeliveryCode = '" . $_GET['code'] . "'";
	$result = mysqli_query($GLOBALS['conn'], $query);
	
	$GLOBALS['order-details'] = mysqli_fetch_assoc($result);
}

?>