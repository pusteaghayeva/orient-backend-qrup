<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'orient_ressamlar';
$conn = mysqli_connect($host,$user,$pass,$db);
include 'vars.php';
if(!$conn)
    echo "Disconnected";
?>

