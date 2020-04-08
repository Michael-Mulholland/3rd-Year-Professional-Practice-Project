<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$user = "root"; 
$password = "root";
$dbname = "customers";

$conn = mysqli_connect($servername, $user, $password, $dbname);

?>