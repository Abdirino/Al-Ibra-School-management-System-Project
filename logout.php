<?php
session_start();

$_SESSION['authlevel']=0;
header("location: login.php");
?>