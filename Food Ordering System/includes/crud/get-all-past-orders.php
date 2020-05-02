<?php

include 'includes/dbconnect.php';

$query = "SELECT * FROM orders WHERE Status<>'Pending'";
$result = mysqli_query($GLOBALS['conn'], $query);

$GLOBALS['orders'] = array();

while($row = mysqli_fetch_assoc($result)){
	$GLOBALS['orders'][] = $row;
}

?>