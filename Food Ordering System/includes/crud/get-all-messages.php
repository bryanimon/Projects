<?php

include 'includes/dbconnect.php';

$query = "SELECT * FROM messages";
$result = mysqli_query($GLOBALS['conn'], $query);

$GLOBALS['messages'] = array();

while($row = mysqli_fetch_assoc($result)){
	$GLOBALS['messages'][] = $row;
}

?>