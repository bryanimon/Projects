<?php 

include '../dbconnect.php';

$name = "";
$email = "";
$subject = "";
$message = "";

if(isset($_POST['name'])){ $name = $_POST['name']; }
if(isset($_POST['email'])){ $email = $_POST['email']; }
if(isset($_POST['subject'])){ $subject = $_POST['subject']; }
if(isset($_POST['message'])){ $message = $_POST['message']; }

$query = "INSERT INTO `messages` (`Name`, `Email`, `Subject`, `Message`) VALUES (?, ?, ?, ?)";

$statement = mysqli_prepare($GLOBALS['conn'], $query);

if($statement){
	mysqli_stmt_bind_param($statement, "ssss", $name, $email, $subject, $message);
	mysqli_stmt_execute($statement);
	
	echo "<script>alert('Message sent!');window.location.href='../../index.php';</script>";
}else{
	echo "<script>alert('Message failed to be sent');window.location.href='../../contact.php';</script>";
}

?>