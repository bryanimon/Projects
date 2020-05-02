<?php 
// Check login session. Redirect to login if not logged

session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] == 0){
	echo "<script>";
  echo "alert('You are not logged in!');";
  echo "document.location.href='login.php';";
  echo "</script>";
}

?>