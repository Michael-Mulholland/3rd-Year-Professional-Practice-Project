<!doctype html>
<html lang="en-US"></html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- css -->
		<link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/table.css">

        <!-- Table Icons -->
        <link rel="shortcut icon" href="http://d15dxvojnvxp1x.cloudfront.net/assets/favicon.ico">
        <link rel="icon" href="http://d15dxvojnvxp1x.cloudfront.net/assets/favicon.ico">

        <!-- JavaScript -->
        <script type="text/javascript" src="../javascripts/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../javascripts/jquery.tablesorter.min.js"></script>

        <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Admin Page</title>	
    </head>

    <body>
        <div class="container-fluid">

			<!-- Start of navigation bar -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
                <a class="navbar-brand" href="../index.html"><img src="https://i.imgur.com/6Qv72Lj.png" width="220" height="40" alt=""></a>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
					aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">

						<li class="nav-item">
							<a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="../websitePages/bestOfCollection.html">Portfolio</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" 
								aria-haspopup="true" aria-expanded="false">Information </a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="../websitePages/reviews.html">Kind Words</a>
								<a class="dropdown-item" href="../websitePages/pricingInfo.html">Pricing</a>
								<a class="dropdown-item" href="../websitePages/faq.html">FAQ</a>
							</div>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="../websitePages/aboutMe.html">About Me</a>
						</li>
					</ul>
				</div>
				
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown" >
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../websitePages/contact.html">Contact</a>
                        </li>		
                        
                        <li class="nav-item">
                            <a class="nav-link" href="../websitePages/register.html">Register</a>
                        </li>	
                        <li class="nav-item">
                            <a class="nav-link" href="../websitePages/login.html">My Photos</a>
                        </li>
                    </ul>
			    </div>
			</nav>
			<!-- End of navigation bar -->

			<div class="titles">
				<br><br><p>ADMIN PAGE<br><hr><br></p>
			</div>

            <div id="wrapper">

                <h1>Customer Details</h1>
                
 			    <!-- start of sortable table that contains users details -->               
                <table id="keywords" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th><span>ID</span></th>
                            <th><span>Full Name</span></th>
                            <th><span>Email Address</span></th>
                            <th><span>Username</span></th>
                        </tr>
                    </thead>

                    <?php

                        // start the session
                        //session_start();
                        
                        // To display all PHP errors
                        // https://www.tutorialspoint.com/how-to-display-errors-in-php-file
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);
                
                        // get database details (servername, username, password, dbname)
                        include_once 'dbh.php';

                        // query
                        $sql = "SELECT * FROM register_details;";
        
                        // prepared statement
                        $stmt = mysqli_stmt_init($conn);

                        // checks to see if the prepared statement works (the connection and above SELECT query)
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            // display error message
                            echo "SQL statement failed!";
                        } else {
                            // execute the sql statement
                            mysqli_stmt_execute($stmt);
        
                            // Gets a result set from a prepared statement
                            $result = mysqli_stmt_get_result($stmt);
        
                            // loop through the rows in the database
                            // Fetch a result row as an associative array
                            while ($row = mysqli_fetch_assoc($result)) {
                                // display the results
                                echo "<tr>";
                                echo "<td>" .$row['id'] . "</td>";
                                echo "<td>" .$row['fullname'] . "</td>";
                                echo "<td>" .$row['emailAddress'] . "</td>";
                                echo "<td>" .$row['username'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                    
                </table><br>
 			    <!-- end of table -->               
                
                <!-- start of upload images form --> 
				<?php
					echo '<div class="gallery-upload text-center">
						<form action="gallery-upload.php" method="POST" enctype="multipart/form-data">
							<input type="text" name="userID" placeholder="User ID...">
							<input type="file" name="file">
							<button type="submit" name="submit">Upload</button>
						</form>
					</div>';
                ?>
                <!-- end of upload images form --> 

            </div> 

            <!-- JavaScript to sort the table -->
            <script type="text/javascript">
                $(function(){
                    $('#keywords').tablesorter(); 
                });
            </script>

            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous"></script>

        </div>
    </body>
</html>