<?php 
include '../dbconnect.php';
session_start();

$data = "NONE";

if(isset($_POST['password'])){
	$newPassword = $_POST['password'];
	
	if(password_verify($newPassword, $_SESSION['user-password'])){
		$data = "";
	}
}

print json_encode($data);

?>