<?php
	// start php session
	session_start();
	
	//  get the username form validation.php and store it
	$username = $_GET['username'];
?>

<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- css -->
		<link rel="stylesheet" href="../css/styles.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Personal Photos</title>		
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
				<br><br><p>PERSONAL PHOTOS<br><hr><br></p>
			</div>	
			
			<div>
				<div class="row no-gutters text-center">	
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<?php echo 'Hey ' . $username . ', hope you enjoyed your special day as much as I did. Below is every photography that I took on the day. All the best and I hope I get to work for you again some day.'; ?>	

					</div>
					<div class="col-md-3">
					</div>
				</div><br>

				<div  class="gallery-container text-center">
					<?php
					
						// To display all PHP errors
						// https://www.tutorialspoint.com/how-to-display-errors-in-php-file
						ini_set('display_errors', 1);
						ini_set('display_startup_errors', 1);
						error_reporting(E_ALL);
				
						// get database details (servername, username, password, dbname)
						include_once 'dbh.php';
		
						// query
						$sql = "SELECT cp.imgFullNameGallery 
							FROM register_details ld 
							JOIN customerPhotos cp 
							ON '$username' = ld.username 
							where ld.id = cp.userID;";
		
						// prepared statement
						$stmt = mysqli_stmt_init($conn);
		
						// checks to see if the prepared statement works (the connection and above SELECT query)
						if (!mysqli_stmt_prepare($stmt, $sql)) {
							// error message
							echo "SQL statement failed!";
						} else {
							// execute the sql statement
							mysqli_stmt_execute($stmt);
		
							// get the result from the above statement
							$result = mysqli_stmt_get_result($stmt);
		

							// loop through the rows in the database
							//mysqli_fetch_assoc
							while ($row = mysqli_fetch_assoc($result)) {
								// display the results
								// image, full name and user ID
								echo '
									<a>
									<div style="background-image: url(../images/gallery/'.$row["imgFullNameGallery"].');"></div>
								</a>';
							}
						}
					?>
				</div>
			</div>
		</div>
		
		<!-- jQuery first > -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
			integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
			crossorigin="anonymous"></script>
		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
			integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
			crossorigin="anonymous"></script>

	</body>
</html>