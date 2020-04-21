<?php

	// Enables or disables internal report functions
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	// connect to the database
	$var = mysqli_connect("localhost", "root", "root");
	
	// this function is used to change the default database for the connection.
	mysqli_select_db($var, "customers") or die(mysqli_error());
	
	// get the id
	$id = $_GET['id'];

	// query
    $sql = "Select image from customerPhotos where id=$id";
	
	// performs the query against the database or an error message with a description
	$resultset = mysqli_query($var, "$sql") or die("Invalid query: " . mysqli_error());

    // loop through the rows in the database
    // Fetch a result row as an associative array
	$row = mysqli_fetch_array($resultset);
	
	// informs the browser that the content type is an image
	header('Content-type: image/jpg');

	// echo the first column in your database (that matches the query)
	echo $row[0];

?>