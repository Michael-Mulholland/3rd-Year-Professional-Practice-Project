<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'root', 'customers'); //, 'table name'

mysqli_select_db($con, 'login_details');

$username = $_POST['username'];
$password = $_POST['password'];

$s = " select * from login_details where username = '$username'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	echo "Username Already Taken";
}else{
	$reg = "INSERT INTO login_details(username, password) values ('$username', '$password')";
	mysqli_query($con, $reg);
	header('location:../index.html');
}

?>