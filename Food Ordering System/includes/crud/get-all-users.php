<?php

include 'includes/dbconnect.php';

$query = "SELECT * FROM users";
$result = mysqli_query($GLOBALS['conn'], $query);

$GLOBALS['users'] = array();

while($row = mysqli_fetch_assoc($result)){
	$GLOBALS['users'][] = $row;
}

?>