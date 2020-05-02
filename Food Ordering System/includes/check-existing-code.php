<?php 
include 'dbconnect.php';

if($_POST['code']){
	$data = "";
	$query = "SELECT COUNT(*) as count FROM products WHERE ProductCode = '" . $_POST['code'] ."'";
  $result = mysqli_query($GLOBALS['conn'], $query);
	
	while($row = mysqli_fetch_assoc($result)){
    $data = $row['count'];
  }
	
	print json_encode($data);
}else{
	print "NONE";
}

?>