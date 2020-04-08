<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

if(isset($_POST['submit'])){

    // filename
    $newFileName = $_POST['filename'];
    
    // check if the user entered a name for the file
    // if not, default name will be gallery
    if(empty($newFileName)){
    //if(empty($_POST[$newFileName])){
        $newFileName = "gallery";
    } else {
        // if the user entered spaces in the file name, replace them with a dash (-)
        // set file name to lowercase as well
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $usernameID = $_POST['userID'];
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    // prints out the array - it's like JSON
    //print_r($file);
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
                $imageFullName =  $newFileName . "."  . uniqid("", true) . "." . $fileActualExt;

                // upload images to this location
                $fileDestination = "../images/gallery/" . $imageFullName;

                // get database details (servername, username, password, dbname)
                include_once "dbh.php";

                // check to see if the image title or image description is empty
                if (empty($imageTitle) || empty($imageDesc) || empty($usernameID)) {
                    // direct the user to the gallery.php page and display an error message
                    header("Location: adminPage.php?upload=empty");
                    // exit script
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
                    } else {
                        // execute the prepared statement
                        // grab information form the database
                        mysqli_stmt_execute($stmt);

                        // get the number of rows in the database from the $result
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount =  mysqli_num_rows($result);

                        // set image order
                        // If I have time, I'll implement the ability to re-arrange the order in which the photos are displayed
                        $setImageOrder = $rowCount + 1;

                        // insert the image into the gallery database
                        // the ? are placeholders
                        $sql = "INSERT INTO customerPhotos (userID, titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?, ?);";

                        // checks to see if the prepared statement works (the connection and above INSERT query)
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            // error message
                            echo "SQL statement failed!";
                        } else {
                            // insert the values into the placeholders
                            mysqli_stmt_bind_param($stmt, "sssss", $usernameID,  $imageTitle, $imageDesc, $imageFullName, $setImageOrder);

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
                echo "Your file is too big!";
                // exit script
                exit();
            }
        } else {
            echo "There was an error uploading your file!";
            // exit script
            exit();
        }
    } else {
        echo "You cannot upload files of this type!";
        // exit script
        exit();
    }
} 