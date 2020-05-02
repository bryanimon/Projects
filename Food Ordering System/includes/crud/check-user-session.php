<?php

if(!isset($_SESSION['user-logged']) || $_SESSION['user-logged'] == 0){
	echo "<script>";
  echo "alert('You are not logged in!');";
  echo "document.location.href='user-login.php';";
  echo "</script>";
}
	
?>