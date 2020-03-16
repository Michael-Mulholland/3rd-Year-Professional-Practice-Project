<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect('localhost', 'root', 'root', 'customers');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$full_name = mysqli_real_escape_string($link, $_REQUEST['full_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone_number = mysqli_real_escape_string($link, $_REQUEST['phone_number']);
$venue = mysqli_real_escape_string($link, $_REQUEST['venue']);
$number_guests = mysqli_real_escape_string($link, $_REQUEST['number_guests']);
$event_date = mysqli_real_escape_string($link, $_REQUEST['event_date']);
$comments = mysqli_real_escape_string($link, $_REQUEST['comments']);
$consent = mysqli_real_escape_string($link, $_REQUEST['consent']);


// Attempt insert query execution
$sql = "INSERT INTO contactdetails(full_name, email, phone_number, venue, number_guests, event_date, comments, consent) VALUES('$full_name', '$email', '$phone_number', '$venue', '$number_guests', '$event_date', '$comments', '$consent')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>

