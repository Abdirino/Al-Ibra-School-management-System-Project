<?php 
$host ="localhost";
$user = "root";
$password ="";
$database="al_ibra_school_system"; 

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("connection Unsuccessful".mysqli_connect_error());
}
?>