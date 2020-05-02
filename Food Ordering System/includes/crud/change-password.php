<?php

include '../dbconnect.php';
session_start();

if(isset($_POST['new-password'])){
	$password = $_POST['new-password'];
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
	
	$query = "UPDATE `admins` SET `password`=?";
	$statement = mysqli_prepare($GLOBALS['conn'], $query);

	if($statement){
		mysqli_stmt_bind_param($statement, "s", $hashPassword);
		mysqli_stmt_execute($statement);
		
		$_SESSION['password'] = $hashPassword;

		echo "<script>alert('Password changed successfully!');window.location.href='../../account-settings.php';</script>";
	}else{
		echo "<script>alert('Something's wrong. Try again!);window.location.href='../../dashboard.php';</script>";
	}
	
}else{
	echo "<script>alert('Something's wrong. Try again!);window.location.href='../../dashboard.php';</script>";
}

?>