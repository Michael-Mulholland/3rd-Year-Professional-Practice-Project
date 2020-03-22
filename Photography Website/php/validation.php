<?php

session_start();

$con = mysqli_connect('localhost', 'root', 'root', 'customers'); //, 'table name'

mysqli_select_db($con, 'login_details');

$username = $_POST['username'];
$password = $_POST['password'];

$s = " select * from login_details where username = '$username' && password = '$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	echo "<script type='text/javascript'>alert('Login Successful'); window.location.href = '../index.html';</script>";

	//header('location:../index.html');
}else{
	header('location:../websitePages/contact.html');
}

?>