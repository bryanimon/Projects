<?php 
include '../dbconnect.php';

$data = "";

if($_POST['index']){
	$query = "DELETE FROM cart_items WHERE CartItemID='" . $_POST['index'] ."'";
	$result = mysqli_query($GLOBALS['conn'], $query);
	
	print json_encode($data);
}else{
	print "NONE";
}

?>