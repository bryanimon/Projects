<?php

include '../dbconnect.php';
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$data = "";
	
	$query = "SELECT * FROM admins WHERE username='" . $username . "'";
	$result = mysqli_query($GLOBALS['conn'], $query);
	
	while($row = mysqli_fetch_assoc($result)){ $data = $row; }
	
	//echo $data['password'];
		//exit();
	
	if(password_verify($password, $data['password'])){
		$_SESSION['logged'] = 1;
		
		
		
		$_SESSION['email'] = $data['email'];
		$_SESSION['password'] = $data['password'];
		
		echo "<script>window.location.href='../../dashboard.php';</script>";
	}else{
		echo "<script>alert('Invalid Username/Password!');window.location.href='../../login.php';</script>";
	}
	
}else{
	echo "<script>alert('Something's wrong. Try again!);window.location.href='../../login.php';</script>";
}

?>