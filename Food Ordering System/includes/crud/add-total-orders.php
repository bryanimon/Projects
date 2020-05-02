<?php
include '../dbconnect.php';
session_start();

$query = "UPDATE `products` SET TotalSales = TotalSales + ? WHERE `ProductID` = ?";
			$statement = mysqli_prepare($GLOBALS['conn'], $query);

			if($statement){
				mysqli_stmt_bind_param($statement, "ii", $userCount, $userID);
				mysqli_stmt_execute($statement);
			}else{
				$data = "NONE";
			}

?>