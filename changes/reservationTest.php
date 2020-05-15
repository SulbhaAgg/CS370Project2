<?php

include("permissions.php");
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error());
session_start();


//$con->close();

//$con->close();

//$con->close();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $hotelChain = mysqli_real_escape_string($con,$_POST["hotelChain"]);
    $id = mysqli_real_escape_string($con,$_POST["id"]);
    $location = mysqli_real_escape_string($con,$_POST["locI"]);
     $numLux = mysqli_real_escape_string($con,$_POST["numLux"]);
      $priceLux = mysqli_real_escape_string($con,$_POST["priceLux"]);
        $numStan = mysqli_real_escape_string($con,$_POST["numStan"]);
      $priceStan = mysqli_real_escape_string($con,$_POST["priceStan"]);
	$username = $_SESSION['username'];

    }

	

?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Reservation Page</title>

	<!-- Google font -->
	<!--<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />-->

	<!--for navbar-->
	<link rel="stylesheet" href="navbar/css/style1.css"> 

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/styleres.css" />


</head>

<body style = "background: #fb929e73 ;">
	  
	<div id="booking" class="section" >

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" >
		<div class = "container">
	    <div class=" nav">
	      <a class="navbar-brand" href="index.php">likeHome</a>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="nav navbar-nav ml-auto">
				
				
					<li class="nav-item active margin" ><a href="index.php" class="nav-link" style="font-size: larger;"><b>Home</b></a></li>
					<li class="nav-item"><a href="chains.php" class="nav-link" style="font-size: larger;" ><b>chains</b></a></li>
					<li class="nav-item"><a href="map.php" class="nav-link" style="font-size: larger;"><b>Map</b></a></li>
					<?php 
if($_SESSION['loggedin'] == true ){
  echo '<li class=" nav-item active" ><a href="myReservations.php" class="nav-link" style="font-size: larger;">Your Reservations</a></li>';
if($_SESSION['admin1'] == 'yes'){
  echo '<li class=" nav-item"><a href="hotelCreatorOne.php" class="nav-link" style="font-size: larger;">Hotel Creation</a></li>';
  echo '<li class=" nav-item"><a href="allReservationsOne.php" class="nav-link" style="font-size: larger;">View All Reservations</a></li>';
} else if($_SESSION['admin2'] == 'yes'){
  echo '<li class=" nav-item"><a href="hotelCreatorTwo.php" class="nav-link" style="font-siz	e: larger;">Hotel Creation</a></li>';
  echo '<li class=" nav-item"><a href="allReservationsTwo.php" class="nav-link" style="font-size: larger;">View All Reservations</a></li>';
} else if($_SESSION['admin3'] == 'yes'){
  echo '<li class=" nav-item"><a href="hotelCreatorThree.php" class="nav-link" style="font-size: larger;">Hotel Creation</a></li>';
  echo '<li class=" nav-item"><a href="allReservationsThree.php" class="nav-link" style="font-size: larger;">View All Reservations</a></li>';
}
}
?>
<li class="nav-item" ><a href="Search.php" class="nav-link" style="font-size: larger;"><b>Search</b></a></li>
<?php
echo '<li class=" nav-item"><a href="dateOpener.php" class="nav-link" style="font-size: larger;">' . $_SESSION['currentDate'] .'</a></li>';
?>
					<?php 
					if($_SESSION['loggedin' == false]){
					echo'<li class="nav-item"><a href="register and login/index.php" class="nav-link" style="font-size: larger;"><b>Log&nbsp;In</b></a></li>';
					echo '<li class="nav-item"><a href="register and login/register.php" class="nav-link" style = "font-size: larger;" style="font-size: larger;">
					  <b>Sign&nbsp;Up</b></a></li>';
					}else{
						echo '<li class="nav-item"><a href="hotelLogOut.php" class="nav-link" style="font-size: larger;"><b>Log&nbsp;Out</b></a></li>';
					}
					?>
	        </ul>
		  </div>
				</div>
	    </div>
	  </nav>

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
						<?php
						if($hotelChain == "Marriot"){
							echo '<form action="chainOneConfirm.php" method="post" class="form">';
						} else if($hotelChain == "Courtyard"){
							echo '<form action="chainTwoConfirm.php" method="post" class="form">';
						}else{
						echo 	'<form action="chainThreeConfirm.php" method="post" class="form">';
						}
						?>
						
									<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Hotel Chain</span>
										<?php
										echo '<input class="form-control" type="text" name ="hotelChain" required readonly="" value = " ' .$hotelChain .'" placeholder = "' .$hotelChain .'"> ';
										echo '<input type = "hidden" name = "currentDate" '. 'value ="' . $_SESSION["currentDate"] .'">';
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Location i,j</span>
										<?php
										echo '<input class="form-control" type="text" name="location" required readonly="" value = " ' .$location .'" placeholder = "' .$location .'"> ';
										?>
									</div>

							</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Avaliable Luxury Rooms</span>
										<?php
										echo '<input class="form-control" type="text" name = "numLux" required readonly="" value = " ' .$numLux .'" placeholder = "' .$numLux .'"> ';
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Price Luxury</span>
										<?php
										echo '<input class="form-control" type="text" name ="priceLux" required readonly="" value = " ' .$priceLux .'" placeholder = "' .$priceLux .'"> ';
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Avaliable Standard Rooms</span>
										<?php
										echo '<input class="form-control" type="text" name = "numStan" required readonly="" value = " ' .$numStan .'" placeholder = "' .$numStan .'"> ';
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Price Standard</span>
										<?php
										echo '<input class="form-control" type="text" name ="priceStan"required readonly="" value = " ' .$priceStan .'" placeholder = "' .$priceStan .'"> ';
										?>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Select Type of room you want</span>
										<select name = "roomType" class="form-control" required>
											<option  value="" selected hidden>Select room type</option>
											<option  value ="Luxury">Luxury Room</option>
											<option  value ="Standard">Standard Room</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">How many Rooms</span>
										<input class="form-control" name ="amtRoom" type="number" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Check In</span>
										<input class="form-control" name ="fromDate" type="date" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Check Out</span>
										<input class="form-control" name ="toDate" type="date" required>
									</div>
								</div>
							</div>

							<div class="form-btn">
								<button class="submit-btn" type = "submit">Check Out</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	  


</body>

</html>