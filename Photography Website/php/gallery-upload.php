<?php

    // start session
    session_start();
    
    // To display all PHP errors
    // https://www.tutorialspoint.com/how-to-display-errors-in-php-file
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // checks whether a variable is set, which means that it has to be declared and is not NULL.
    if(isset($_POST['submit'])){

        // save the username and file entered in by the user
        $usernameID = $_POST['userID'];
        $file = $_FILES['file'];

        // print_r($file) - prints out the array - it's like JSON
        // the below information can be seen by uncommenting the above line
        // not needed but good for error handling
        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileTempName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileSize = $file["size"];

        // take apart the string - (name   .   jpg)
        $fileExt = explode(".", $fileName);

        // string to lowercase
        $fileActualExt = strtolower(end($fileExt));

        // array of file extensions that we can only upload
        $allowed = array("jpg", "jpeg", "png");

        // checks to see if any of the above file extensions is inside the variable fileActualExt
        // if it is, then it is ok to be uploaded
        if(in_array($fileActualExt, $allowed)){

            // see if there is any errors inside the file
            // if equals to 0, no errors
            if($fileError === 0){
                // check the file size
                if ($fileSize < 2000000) {
                    // adds a unique ID inbetween the filename and the file extension so no image will have the same name. Otherwise, an image with the 
                    // same name would overwrite the first 
                    // New file name will be - nameOfTheFile.uniqueID.fileExtension
                    $imageFullName =  uniqid("", true) . "." . $fileActualExt;

                    // upload images to this location
                    $fileDestination = "../images/gallery/" . $imageFullName;

                    // get database details (servername, username, password, dbname)
                    include_once "dbh.php";

                    // check to see if the image title or image description is empty
                    if (empty($usernameID)) {
                        // direct the user to the gallery.php page and display an error message
                        header("Location: adminPage.php?upload=empty");
                        // Terminates execution of the script.
                        exit();
                    } else {
                        // query
                        $sql = "SELECT * FROM customerPhotos;";
                    
                        // connect to the database
                        $stmt = mysqli_stmt_init($conn);

                        // checks to see if the prepared statement works (the connection and above SELECT query)
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            // error message
                            echo "SQL statement failed!";
                            // Terminates execution of the script.
                            exit();
                        } 
                        else {
                            // execute the prepared statement
                            // grab information form the database
                            mysqli_stmt_execute($stmt);

                            // insert the image into the gallery database
                            // the ? are placeholders
                            $sql = "INSERT INTO customerPhotos (userID, imgFullNameGallery) VALUES (?, ?);";

                            // checks to see if the prepared statement works (the connection and above INSERT query)
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                // error message
                                echo "SQL statement failed!";
                            } else {
                                // insert the values into the placeholders
                                mysqli_stmt_bind_param($stmt, "ss", $usernameID, $imageFullName);

                                // execute the statement
                                mysqli_stmt_execute($stmt);

                                // upload the image to the database
                                move_uploaded_file($fileTempName, $fileDestination);
                                
                                // directs the user to the gallery page
                                header("Location: adminPage.php?upload=success");
                            }
                        }
                    }
                } else {
                    // error messages for the if($fileSize < 2000000) statement
                    echo "Your file is too big!";
                    // Terminates execution of the script.
                    exit();
                }
            } else {
                // error messages for the if($fileError === 0) statement
                echo "There was an error uploading your file!";
                // Terminates execution of the script.
                exit();
            }
        } else {
            // error messages for the  if(in_array($fileActualExt, $allowed)) statement
            echo "You cannot upload files of this type!";
            // Terminates execution of the script.
            exit();
        }
    } 
?>