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
	$confPassword = mysqli_real_escape_string($con,$_POST["confPass"]);
	$password = mysqli_real_escape_string($con,$_POST["pass"]);
	if($password != $confPassword){
		$_SESSION["Error"] = "Passwords do not match";
		exit();
		header("Location: login.php");
	}

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
  header("Location: login.php");
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
		<meta charset="utf-8">
		<title>Registration for likeHome</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="images/hotel.png" alt="">
				</div>
				<form id = "login" action="login.php" method ="post" style= "padding-top: 30px;">
					<h3>Sign Up</h3>
					<div class="form-holder active">
						<input type="text" name="username" placeholder="name" class="form-control">
					</div>
					<div class="form-holder">
						<input type="text" name="email" placeholder="e-mail" class="form-control">
					</div>
					<div class="form-holder">
						<input type="password" name ="pass" placeholder="Password" class="form-control" style="font-size: 15px;">
					</div>
					<div class="form-holder">
						<input type="password" name ="confPass" placeholder="Confirm Password" class="form-control" style="font-size: 15px;">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" checked> I agree all statement in <a href="#">Terms & Conditions</a>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-login">
						<button type = "submit">Login</button>
						<?php
						if(isset($_SESSION["Error"]))
						echo '<p class = "statusMessage">' .$_SESSION["Error"].'</p>';
						?>
						<p>Don't have an account? <a href="index.php">Register</a></p>
					</div>
				</form>
			</div>
		</div>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>