<?php
    // Attempt MySQL server connection.
    $link = mysqli_connect('localhost', 'root', 'root', 'customers');
    
    // Check connection to see if it is OK or NOT
    if($link == false){
        // display error message if the connection is false along with an error description
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    else if($link == true){

        // The following data is protected from MySQLi Injection using MySQLi
        // Escape user inputs for security - stop MySQLi Injection using mysqli_real_escape_string()
        // store all the users details in variables
        $full_name = mysqli_real_escape_string($link, $_REQUEST['full_name']);
        $email = mysqli_real_escape_string($link, $_REQUEST['email']);
        $phone_number = mysqli_real_escape_string($link, $_REQUEST['phone_number']);
        $venue = mysqli_real_escape_string($link, $_REQUEST['venue']);
        $number_guests = mysqli_real_escape_string($link, $_REQUEST['number_guests']);
        $event_date = mysqli_real_escape_string($link, $_REQUEST['event_date']);
        $comments = mysqli_real_escape_string($link, $_REQUEST['comments']);
        $consent = mysqli_real_escape_string($link, $_REQUEST['consent']);

        // Attempt insert query execution
        $sql = "INSERT INTO contactdetails(full_name, email, phone_number, venue, number_guests, event_date, comments, consent) 
            VALUES('$full_name', '$email', '$phone_number', '$venue', '$number_guests', '$event_date', '$comments', '$consent')";
       
        // performs the query against the database
        if(mysqli_query($link, $sql)){
            // if the query works, navigate the user to the index.html page
            header("Location: ../index.html");
            // Terminates execution of the script.
            exit();
        } else{
            // error message
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
        // Close connection
        mysqli_close($link);
    }
?>