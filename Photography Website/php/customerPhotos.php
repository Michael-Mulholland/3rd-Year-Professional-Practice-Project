<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect('localhost', 'root', 'root', 'customers');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$image = mysqli_real_escape_string($link, $_REQUEST['image']);

// Attempt insert query execution
$sql = "INSERT INTO customerPhotos(username, image) VALUES('$username', '$image')";
if(mysqli_query($link, $sql)){
    //echo "Records added successfully.";
	header("Location: ../index.html");
    exit;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>

