<?php
$host = 'localhost';
$user = 'puste';
$pass = 'puste123';
$db   = 'orient_ressamlar';
$conn = mysqli_connect($host,$user,$pass,$db, 3304);
include 'vars.php';
if(!$conn)
    echo "Disconnected";
?>

