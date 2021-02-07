<?php 
$hostname = "localhost";
$user = "root";
$pass = "";
$db_name = "your_db";
$link = mysqli_connect($hostname, $user, $pass, $db_name);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>