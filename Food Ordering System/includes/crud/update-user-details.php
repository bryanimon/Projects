<?php 
include '../dbconnect.php';
session_start();

$email = "";
$name = "";
$address = "Metro Manila";
$id = $_SESSION['user-id'];
$contact = "";

if(isset($_POST['email'])){ $email = $_POST['email']; }
if(isset($_POST['name'])){ $name = $_POST['name']; }
if(isset($_POST['address'])){ $address = $_POST['address']; }
if(isset($_POST['contact'])){ $contact = $_POST['contact']; }

//Check if user email already exists

$query = "SELECT COUNT(*) as count FROM users WHERE Email = '" . $email ."' AND UserID <> '". $id . "'";
$result = mysqli_query($GLOBALS['conn'], $query);

$row = mysqli_fetch_assoc($result);

// Does not exists
if($row['count'] <= 0){
	$query = "UPDATE `users` SET `Name`=?, `Address`=?, `Email`=?, `Contact`=? WHERE `UserID` = ?";
	$statement = mysqli_prepare($GLOBALS['conn'], $query);

	if($statement){
		mysqli_stmt_bind_param($statement, "ssssi", $name, $address, $email, $contact, $id);
		mysqli_stmt_execute($statement);

		$_SESSION['user-email'] = $email;
		$_SESSION['user-name'] = $name;
		$_SESSION['user-address'] = $address;
		$_SESSION['user-contact'] = $contact;

		echo "<script>alert('User details updated successfully!');window.location.href='../../edit-profile.php';</script>";
	}else{
		echo "<script>alert('User details failed to be updated!');window.location.href='../../edit-profile.php';</script>";
	}
}else{
	echo "<script>alert('Email already exists!');window.location.href='../../edit-profile.php';</script>";
}



?>