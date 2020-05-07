<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Reservation Page</title>

	<!-- Google font -->
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

	<!--for navbar-->
	<link rel="stylesheet" href="navbar/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="navbar/css/style1.css">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>
	
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class=" nav">
	      <a class="navbar-brand" href="index.php">likeHome</a>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				<li class="nav-item">
						<div class="searchbar">
							<input type="text" name="search" placeholder="Search.." style="width:150px;">
						</div>
					</li>
				<li class="nav-item" >
					<div class="mb-3 mr-4" style="margin-left:8%; width: 120px;" >
						<input type="text" class="form-control checkin_date" placeholder="date">
					</div>
				</li>
					<li class="nav-item active margin" ><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="chains.php" class="nav-link">chains</a></li>
					<li class="nav-item"><a href="map.php" class="nav-link">Map</a></li>
					<li class="nav-item"><a href="Login.php" class="nav-link">Log&nbsp;In</a></li>
					<li class="nav-item"><a href="register.php" class="nav-link" style = "font-size: larger;"><b>Sign&nbsp;Up</b></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	  
	<div id="booking" class="section" >
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg">
							<div class="form-header">
								<h2>Make your reservation</h2>
								<p>It's not only about where you're staying. It's about where you're going. likeHome, Travel Brilliantly</p>
							</div>
						</div>
						<form>

									<div class="form-group">
										<span class="form-label">Location i,j</span>
										<input class="form-control" type="text" required>
									</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Avaliable Luxury Rooms</span>
										<input class="form-control" type="text" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Price Luxury</span>
										<input class="form-control" type="text" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Avaliable Standard Rooms</span>
										<input class="form-control" type="text" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Price Standard</span>
										<input class="form-control" type="text" required>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Select Type of room you want</span>
										<select class="form-control" required>
											<option value="" selected hidden>Select room type</option>
											<option>Luxury Room</option>
											<option>Standard Room</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">How many Romms</span>
										<input class="form-control" type="number" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Check In</span>
										<input class="form-control" type="date" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Check Out</span>
										<input class="form-control" type="date" required>
									</div>
								</div>
							</div>

							<div class="form-btn">
								<button class="submit-btn">Check Out</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	  

	   <!--all the javascript for date, navbar-->
	   <script src="navbar/js/jquery.min.js"></script>
        <script src="navbar/js/jquery-migrate-3.0.1.min.js"></script>

        <script src="navbar/js/jquery.waypoints.min.js"></script>
        <script src="navbar/js/jquery.stellar.min.js"></script>
        <script src="navbar/js/owl.carousel.min.js"></script>
        
        <script src="navbar/js/jquery.magnific-popup.min.js"></script>
        <script src="navbar/js/aos.js"></script>
        
        <script src="navbar/js/bootstrap-datepicker.js"></script>
        <script src="navbar/js/scrollax.min.js"></script>
        <script src="navbar/js/main.js"></script>
</body>

</html>