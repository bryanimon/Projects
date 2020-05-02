<?php

include '../dbconnect.php';
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$data = "";
	
	$query = "SELECT * FROM users WHERE email='" . $email . "'";
	$result = mysqli_query($GLOBALS['conn'], $query);
	
	while($row = mysqli_fetch_assoc($result)){ $data = $row; }
	
	if(password_verify($password, $data['Password'])){
		$_SESSION['user-logged'] = 1;
		
		$_SESSION['user-id'] = $data['UserID'];
		$_SESSION['user-email'] = $data['Email'];
		$_SESSION['user-password'] = $data['Password'];
		$_SESSION['user-name'] = $data['Name'];
		$_SESSION['user-address'] = $data['Address'];
		$_SESSION['user-contact'] = $data['Contact'];
		
		echo "<script>window.location.href='../../index.php';</script>";
	}else{
		echo "<script>alert('Invalid Username/Password!');window.location.href='../../user-login.php';</script>";
	}
	
}else{
	echo "<script>alert('Something's wrong. Try again!);window.location.href='../../index.php';</script>";
}

?>