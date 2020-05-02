<?php

include 'includes/dbconnect.php';

$GLOBALS['orders'] = array();

$query = "SELECT * FROM orders WHERE UserID = '" . $_SESSION['user-id'] . "'";
$result = mysqli_query($GLOBALS['conn'], $query);

while($row = mysqli_fetch_assoc($result)){
	$GLOBALS['orders'][] = $row;
}

?>