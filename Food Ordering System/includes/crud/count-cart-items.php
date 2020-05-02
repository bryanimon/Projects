<?php

include 'includes/dbconnect.php';

$query = "SELECT Count(*) As count FROM cart_items WHERE `UserID` = '" . $_SESSION['user-id'] ."'";
$result = mysqli_query($GLOBALS['conn'], $query);

$row = mysqli_fetch_assoc($result);
$_SESSION['cart-item-count'] = $row['count'];

?>