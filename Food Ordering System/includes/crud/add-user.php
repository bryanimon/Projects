<?php

include '../dbconnect.php';

$user_name = "";
$user_email = "";
$user_password = "";
$user_address = "";

if(isset($_POST['user-name'])){ $user_name = $_POST['user-name']; }
if(isset($_POST['user-email'])){ $user_email = $_POST['user-email']; }
if(isset($_POST['user-password'])){ $user_password = $_POST['user-password']; }
if(isset($_POST['user-address'])){ $user_address = $_POST['user-address']; }

$user_password = password_hash($user_password, PASSWORD_DEFAULT);

$query = "INSERT INTO `users` (`Name`, `Password`, `Email`, `Address`) VALUES (?, ?, ?, ?)";

$statement = mysqli_prepare($GLOBALS['conn'], $query);

if($statement){
	mysqli_stmt_bind_param($statement, "ssss", $user_name, $user_password, $user_email, $user_address);
	mysqli_stmt_execute($statement);
	
	echo "<script>alert('Sign up successful!');window.location.href='../../user-login.php';</script>";
}else{
	echo "<script>alert('Something went wrong. Try again!');window.location.href='../../user-login.php';</script>";
}


?>