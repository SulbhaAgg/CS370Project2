<?php
include("permissions.php");
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die ('Could not connect to the database server' . mysqli_connect_error());
session_start();
?>
<html>
<head>
	<title>Chain 1</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="app.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<div id="content">
			<h1>Marriot</h1>
			
			
			<hr>
			<button class="btn btn-default btn-lg"><a href="chainOneHotels.php">View Hotels</button>
		  </div>	
		</div>	
	</div>	
</div>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-building-o" aria-hidden="true"></i>Hotels</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<li><a href="landing.php">Home</a></li>
<li><a href="chainOneHotels.php">Hotels</a></li>
<li class="active"><a href="Chains.php">Chains</a></li>
<li><a href="Map.php">Map</a></li>

<?php 
if($_SESSION['loggedin'] == true ){
  echo '<li ><a href="myReservations.php">Your Reservations</a></li>';
if($_SESSION['admin1'] == 'yes'){
  echo '<li><a href="hotelCreatorOne.php">Hotel Creation</a></li>';
  echo '<li><a href="allReservationsOne.php">View All Reservations</a></li>';
} else if($_SESSION['admin2'] == 'yes'){
  echo '<li><a href="hotelCreatorTwo.php">Hotel Creation</a></li>';
  echo '<li><a href="allReservationsTwo.php">View All Reservations</a></li>';
} else if($_SESSION['admin3'] == 'yes'){
  echo '<li><a href="hotelCreatorThree.php">Hotel Creation</a></li>';
  echo '<li><a href="allReservationsThree.php">View All Reservations</a></li>';
}
}
?>
<li><a href="Search.php">Search</a></li>
<?php
echo '<li><a href="#">' . $_SESSION['currentDate'] .'</a></li>';
?>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
         <?php
                		if($_SESSION['loggedin'] == false){
                   echo '<li ><a href="hotelSignUp.php">Sign Up</a></li>';
                   echo '<li ><a href="hotelLog.php">Login</a></li>';
                }
                else{echo'<li> <a href="hotelLogOut.php">Log Out</a></li>';

                }?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>