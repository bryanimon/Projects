<?php

include '../dbconnect.php';
session_start();

$_SESSION['user-logged'] = 0;
$_SESSION['cart-count'] = 0;

echo "<script>window.location.href='../../user-login.php';</script>";

?>