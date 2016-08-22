<?php
session_start();

$_SESSION['id']="";
$_SESSION['username']="";
$_SESSION['password']="";
$_SESSION['user_type']="";

session_destroy();
header("Location:index.php");
?>