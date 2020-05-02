<!DOCTYPE html>
<?php 
	ob_start(); 
	include 'includes/dbconnect.php';
	$id = "1";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	$sql = "DELETE FROM properties WHERE id = '".$id."'";
	$result = mysqli_query($conn, $sql);

	header("Location: admin_table.php");
?>