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

		<title>Login</title>
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
				<br><br><p>LOGIN<br><hr></p>
			</div>

			<div class="card mb-6 border-0" style="max-width: 700px;" >
				<div class="row">
					<div class="col-md-12">
						<div class="card-body">
							<h5 class="card-title">LOGIN<hr></h5>
							<p class="card-text">
								Login using your username and password to view all photographs of your special day.
							</p>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Login starts here -->
			<div class="card mb-6 border-0" style="max-width: 700px;" >
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">Login<hr></h5>
							<form action="../php/validation.php" method="post">
								<div class="form-group">
									<label> Username </label>
									<input type="text" name="username" class="form-control" required>
								</div>
								<div class="form-group">
									<label> Password </label>
									<input type="password" name="password" class="form-control" required>
								</div>
								<button type="submit" name="submit" class="btn btn-light"> Login </button>
							</form>

                            <!-- Display Success Message -->
                            <?php
								if(isset($_GET["newpwd"])){
									if($_GET["newpwd"] == "passwordupdated"){
										echo '<p class="signupsuccess">Check your e-mail!</p>';
									}
								}
                            ?>
						</div>
					</div>
				</div>
			</div>		
			<!-- Login ends here -->
			
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