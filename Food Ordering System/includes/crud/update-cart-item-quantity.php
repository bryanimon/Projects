<?php 
include '../dbconnect.php';

$data = "";

if(isset($_POST['id']) && isset($_POST['count'])){
	$userID = $_POST['id'];
	$count = $_POST['count'];
	
	$query = "UPDATE `cart_items` SET `Count`=? WHERE `CartItemID` = ?";
	$statement = mysqli_prepare($GLOBALS['conn'], $query);

	if($statement){
		mysqli_stmt_bind_param($statement, "ii", $count, $userID);
		mysqli_stmt_execute($statement);
	}else{
		$data = "NONE";
	}
	
	print json_encode($data);
}else{
	print "NONE";
}

?>