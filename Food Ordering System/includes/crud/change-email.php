<?php

include '../dbconnect.php';
session_start();

if(isset($_POST['email'])){
	$email = $_POST['email'];
	
	$query = "UPDATE `admins` SET `email`=?";
	$statement = mysqli_prepare($GLOBALS['conn'], $query);

	if($statement){
		mysqli_stmt_bind_param($statement, "s", $email);
		mysqli_stmt_execute($statement);
		
		$_SESSION['email'] = $email;

		echo "<script>alert('Email changed successfully!');window.location.href='../../account-settings.php';</script>";
	}else{
		echo "<script>alert('Something's wrong. Try again!);window.location.href='../../dashboard.php';</script>";
	}
	
}else{
	echo "<script>alert('Something's wrong. Try again!);window.location.href='../../dashboard.php';</script>";
}

?>