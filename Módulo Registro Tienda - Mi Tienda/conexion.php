<?php
$hostname='localhost';
$username ='root';
$password='';
$database ='dbprove';
//
$conexion = mysqli_connect(
    $hostname,
    $username,
    $password,
    $database
) or die(mysqli_error($mysqli));
?>