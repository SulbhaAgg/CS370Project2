<?php
include("permissions.php");

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
	session_start();

//$con->close();

//$con->close();

//$con->close();

//$con->close();
	
	 if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$_SESSION["$loggedin"] = false;
	$username = mysqli_real_escape_string($con,$_POST["username"]);

	$password = mysqli_real_escape_string($con,$_POST["password"]);

	//check if name exists
	$namecheckquery = "SELECT username,hash,salt,adminChain1,adminChain2,adminChain3 FROM users WHERE username='$username'";
 $namecheck=mysqli_query($con,$namecheckquery)or die("2: Name check query failed");//error code #2 name check query failed

 if(mysqli_num_rows($namecheck)==0)
 {
 	$_SESSION["Error"] = "Either no user with name or more than 1";
 	header("Location: hotelLog.php");
  exit();
 }
 //get login info from query
 $existinginfo = mysqli_fetch_assoc($namecheck);
 $salt=$existinginfo["salt"];
 $hash=$existinginfo["hash"];
 $adminChain1 = $existinginfo["adminChain1"];
 $adminChain2 = $existinginfo["adminChain2"];
 $adminChain3 = $existinginfo["adminChain3"];

 $loginhash = crypt($password, $salt);
 if($hash!=$loginhash)
 {
  $_SESSION["Error"] =" Incorrect Password";
  header("Location: hotelLog.php");
  exit();
 }
 echo "0" ;
 $_SESSION["loggedin"] = true;
 $_SESSION["username"] = $username;
 $_SESSION["admin1"] = $adminChain1;
 $_SESSION["admin2"] = $adminChain2;
 $_SESSION["admin3"] = $adminChain3;
 unset($_SESSION["Error"]);
 header("Location: landing.php");
}
?>
<html>
<head>
    <title>Hotel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
                <a class="navbar-brand" href="landing.php"><i class="fa fa-building-o" aria-hidden="true"></i>Hotels</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="landing.php">Home</a></li>
                    <li><a href="chainOneHotels.php">Hotels</a></li>
                    <li><a href="Chains.php">Chains</a></li>
                   <li ><a href="Map.php">Map</a></li>
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
echo '<li><a href="dateOpener.php">' . $_SESSION['currentDate'] .'</a></li>';
?>
                </ul>
               
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="hotelSignUp.php">Sign Up</a></li>
                    <li class="active"><a href="hotelLog.php">Login</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <form action="/~bast8620/hotelLog.php" method="post" class="form">
        Username:<br>
        <input type="text" id="username" name="username" class="input" placeholder="Username" required minlength="4" maxlength="20">
        </br>
        Password:<br>
        <input type="password" id="password" name="password" class="input" placeholder="Password" required minlength="8" maxlength="20">
        </br>
        <br>
        <input type="submit" name="login" class="button ">
        </br>
        <br>
         <?php
        if(isset($_SESSION["Error"])){
        echo '<p class = "statusMessage">' .$_SESSION["Error"].'</p>';
    }
        ?>
    </form>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
