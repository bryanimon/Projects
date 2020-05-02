<?php 
include 'dbconnect.php';

if($_POST['email']){
	$data = "";
	$query = "SELECT COUNT(*) as count FROM users WHERE Email = '" . $_POST['email'] ."'";
  $result = mysqli_query($GLOBALS['conn'], $query);
	
	while($row = mysqli_fetch_assoc($result)){
    $data = $row['count'];
  }
	
	print json_encode($data);
}else{
	print "NONE";
}

?>