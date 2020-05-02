<?php
include '../dbconnect.php';

$query = "SELECT * FROM users WHERE UserID='" . $_SESSION['user-id'] . "'";
$result = mysqli_query($GLOBALS['conn'], $query);

$GLOBALS['users'] = array();

while($row = mysqli_fetch_assoc($result)){
	$GLOBALS['users'][] = $row;
}

?>