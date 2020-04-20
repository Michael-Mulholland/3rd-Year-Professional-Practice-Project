<?php

	// start the session
	session_start();

	// checks whether a variable is set, which means that it has to be declared and is not NULL.
	if(isset($_POST['username'])){

		// To display all PHP errors
		// https://www.tutorialspoint.com/how-to-display-errors-in-php-file
		ini_set('display_errors', 'On');
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		set_error_handler("var_dump");

		// include the file once - to connect to the database
		include_once 'dbh.php';

		// save the username entered in by the user
		$username = $_POST['username'];

		// Session variable to save the username
		// It's used in the query in the personalPhotos.php page 
		$_SESSION['username'] = $username;

		// query - gets the username and password from the database
		$sql = " select * from login_details where username = '$username'";

		// save the password entered in my the user
		$password = $_POST['password'];

		// connect to the database
		$stmt = mysqli_stmt_init($conn);

		// checks to see if the prepared statement works (the connection and above SELECT query)
		if(!mysqli_stmt_prepare($stmt, $sql)){
			//  keeps the user on the login.php page
			header("Location: login.php");
            // Terminates execution of the script.
            exit();
		}
		else {
			
			// execute the prepared statement
            // grab information form the database
			mysqli_stmt_execute($stmt);

			// Gets a result set from a prepared statement
			$result = mysqli_stmt_get_result($stmt);

			// Fetch a result row as an associative array
			if($row = mysqli_fetch_assoc($result)){

				// get the users password from the database 
				// and compare it to the password that the user used to try and login with
				$passwordCheck = password_verify($password, $row['password']);

				// check if the password is true or false
				if($passwordCheck == false){

					// if False
					// dispaly error message and keep the user on the login.php page
					header("Location: login.php");
					// Terminates execution of the script.
					exit();						
				}
				else if ($passwordCheck == true){

					// if True
					// check to see if the owner of the website is trying to login
					if($username == "admin") {
						// direct the owner to the adminPage.php where they can upload photos
						echo "<script type='text/javascript'> window.location.href = 'adminPage.php';</script>";
					}
					else {
						// if it is not the owner signing in, it is a user
						// direct them to the personalPhotos.php page so that they can view their photos
						header('location: personalPhotos.php?username=' . $username);
					}
				}
				else {
					// dispaly error message and keep the user on the login.php page
					header("Location: login.php");
					// Terminates execution of the script.
					exit();							
				}
			}
		}
	}

?>