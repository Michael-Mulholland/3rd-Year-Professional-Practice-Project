<?php
	
	// start the session
	session_start();

	// To display all PHP errors
    // https://www.tutorialspoint.com/how-to-display-errors-in-php-file
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// include the file once - to connect to the database
	include_once 'dbh.php';
	
	// checks whether a variable is set, which means that it has to be declared and is not NULL.
	if(isset($_POST['submit'])){

		// check to see if any of the fields are empty
		if(empty($_POST['fullname']) || empty($_POST['emailAddress']) || empty($_POST['username']) || empty($_POST['password'])){
			// error message if any of the fields are empty and keep the user on the same page
			echo "<script type='text/javascript'>alert('All fields must be filled in.'); window.location.href = '../websitePages/register.html';</script>";

		} else {

			// gets conn(servername, user, password, dbname) and table name(register_details)
			mysqli_select_db($conn, 'register_details');

        	// The following data is protected from MySQLi Injection using MySQLi
        	// Escape user inputs for security - stop MySQLi Injection using mysqli_real_escape_string()
        	// store all the users details in variables
			$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
			$emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

			// password_hash() creates a new password hash using a strong one-way hashing algorithm. 
			// password_hash() is compatible with crypt(). 
			// Therefore, password hashes created by crypt() can be used with password_hash().
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
			// store the users full name in a session variable
			$_SESSION['fullname'] = $fullname;
		
			// SQL query
			$query = " select * from register_details where username = '$username'";
		
			// executes the query in the database
			// If the user enters a username that's already in the database, TRUE will be returned
			// The user will then have to enter a different username
			$result = mysqli_query($conn, $query);
		
			// returns the number of rows present in the result set
			$num = mysqli_num_rows($result);
		
			// if the num is equal to one then the username has already been taken
			if($num == 1){
				// display error message and keep the user on the same page
				echo "<script type='text/javascript'>alert('Username Already Taken'); window.location.href = '../websitePages/register.html';</script>";
				// Terminates execution of the script.
				exit();
			}else{

				// if the username is unique, enter all details into the database
				$reg = "INSERT INTO register_details(fullname, emailAddress, username, password) 
					values ('$fullname', '$emailAddress', '$username', '$hashedPassword')";

				// performs the query against the database
				mysqli_query($conn, $reg);

				// message to inform the user that registration is complete and keep them on the same page
				echo "<script type='text/javascript'>alert('Thank you for registering. Please login to view your photos. '); window.location.href = '../websitePages/register.html';</script>";
			}
		}
	} 
?>