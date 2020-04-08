<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $var = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($var, "customers") or die(mysqli_error());
	$id = $_GET['id'];
    $sql = "Select image from customerPhotos where id=$id";
    $resultset = mysqli_query($var, "$sql") or die("Invalid query: " . mysqli_error());
	$row = mysqli_fetch_array($resultset);
	header('Content-type: image/jpg');
	echo $row[0];
   	mysqli_close($var);
?>

