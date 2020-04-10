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

		<title>Logout</title>		
	</head>

	<body>
		<div class="container-fluid">
		
			<!-- Start of navigation bar -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<a class="navbar-brand" href="../index.html"><img src="https://i.imgur.com/T4CfOTi.jpg" width="40" height="40" alt=""> Photography Website</a>
				
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

						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" 
								aria-haspopup="true" aria-expanded="false">Information </a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="../websitePages/pricingInfo.html">Pricing</a>
								<a class="dropdown-item active" href="../websitePages/faq.html">FAQ</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">The Experience</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="../websitePages/reviews.html">Reviews</a>
							</div>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="../websitePages/aboutMe.html">About Me</a>
						</li>
					</ul>
				</div>
				
				<div class="collapse navbar-collapse" id="navbarNavDropdown" >
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../websitePages/contact.html">Contact</a>
						</li>				
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Photos</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">									
								<a class="dropdown-item" href="../websitePages/register.html">Register</a>
								<a class="dropdown-item" href="../websitePages/login.html">Login</a>
								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End of navigation bar -->
			
			<div class="titles">
				<br><br><p>ADMIN PAGE<br><hr><br></p>
			</div>

			<section class="gallery-links">
				<div class="wrapper">
					<h2>Gallery</h2>

					<?php
						echo '<div class="gallery-upload">
							<h2>Upload</h2>
							<form action="gallery-upload.php" method="POST" enctype="multipart/form-data">
								<input type="text" name="userID" placeholder="User ID...">
								<input type="file" name="file">
								<button type="submit" name="submit">Upload</button>
							</form>
						</div>';
					?>

				</div>
			</section>
			
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