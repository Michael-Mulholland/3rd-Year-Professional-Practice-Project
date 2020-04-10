<?php

    // To display all PHP errors
    // https://www.tutorialspoint.com/how-to-display-errors-in-php-file
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // server name, username, password and database name
    $servername = "localhost";
    $user = "root"; 
    $password = "root";
    $dbname = "customers";

    // opens a new connection to the MySQL server
    $conn = mysqli_connect($servername, $user, $password, $dbname);
    
?>