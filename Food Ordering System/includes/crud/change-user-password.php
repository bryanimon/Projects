<?php 
include '../dbconnect.php';
session_start();

if(isset($_POST['password'])){
	$newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
	$query = "UPDATE `users` SET `Password`=? WHERE `UserID` = ?";
	$statement = mysqli_prepare($GLOBALS['conn'], $query);

	if($statement){
		mysqli_stmt_bind_param($statement, "si", $newPassword, $_SESSION['user-id']);
		mysqli_stmt_execute($statement);
		
		$_SESSION['user-password'] = $newPassword;
		
		echo "<script>alert('Password changed successfully!');window.location.href='../../edit-profile.php';</script>";
	}else{
		echo "<script>alert('Password failed to be changed');window.location.href='../../edit-profile.php';</script>";
	}
}else{
	echo "<script>alert('Something went wrong. Try again!');window.location.href='../../edit-profile.php';</script>";
}

?>