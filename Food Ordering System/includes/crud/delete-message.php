<?php

include '../dbconnect.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "DELETE FROM messages WHERE MessageID='" . $id ."'";
	$result = mysqli_query($GLOBALS['conn'], $query);
	
	echo "<script>alert('Message deleted successfully!'); window.location.href='../../messages.php';</script>";
}else{
	echo "<script>alert('Failed to delete message!'); window.location.href='../../messages.php';</script>";
}

?>