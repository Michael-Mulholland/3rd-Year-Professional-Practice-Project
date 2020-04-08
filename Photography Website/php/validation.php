<?php

session_start();

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$_SESSION['username'] = $username;

	$con = mysqli_connect('localhost', 'root', 'root', 'customers'); //, 'table name'

	mysqli_select_db($con, 'login_details');
	
	
	$password = $_POST['password'];
	
	$s = " select * from login_details where username = '$username' && password = '$password'";
	
	$result = mysqli_query($con, $s);
	
	$num = mysqli_num_rows($result);
	
	if($username == "gmit") {
		echo "<script type='text/javascript'> window.location.href = 'adminPage.php';</script>";
	}
	else if($num == 1){
		header('location: personalPhotos.php?username=' . $username);
	}
	else{
		header('Refresh:3; url=../websitePages/login.html');
		echo nl2br("You have entered the wrong username or password. \n Please try again.");
	}
}

?>