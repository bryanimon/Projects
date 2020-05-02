<?php

include '../dbconnect.php';
session_start();

$_SESSION['logged'] = 0;

echo "<script>window.location.href='../../login.php';</script>";

?>