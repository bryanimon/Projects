<?php

include 'includes/dbconnect.php';

$query = "SELECT * FROM products WHERE `ProductHidden`='0'";
$result = mysqli_query($GLOBALS['conn'], $query);

$GLOBALS['products'] = array();

while($row = mysqli_fetch_assoc($result)){
	$GLOBALS['products'][] = $row;
}

?>