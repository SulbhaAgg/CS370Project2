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
	$username = mysqli_real_escape_string($con,$_POST["username"]);

	$password = mysqli_real_escape_string($con,$_POST["password"]);

	//check if name exists
	$namecheckquery = "SELECT `username` FROM `users`WHERE username = '" . $username . "'";
	$namecheck = mysqli_query($con, $namecheckquery)or die("2");// error code 2 - namecheckquery failed
	if(mysqli_num_rows($namecheck) >0){
       // echo "didnt work name already exists";
		$_SESSION["ErrorReg"] = "name already exists"; // error code 3 name exists cannot register
        header("Location: index.php");
		exit();
	}

	//add user to table
	$salt = "\$5\$rounds = 5000\$" . "SickTimes" . $username . "\$";
	$hash = crypt($password, $salt);
	$insertuserquery = "INSERT INTO `bast8620`.`users`
(`id`, `username`, `hash`, `salt`)
VALUES (NULL, '$username', '$hash', '$salt')";

mysqli_query($con, $insertuserquery) or die("4: Insert user query failed"); //error code 4  insertquery failed
    //    echo "success";
	$_SESSION["ErrorReg"] ="Registration succesful";
    $_SESSION["username"] = $username; 
    $_SESSION["$loggedin"] = true;
    unset($_SESSION["ErrorReg"]);
    header("Location: landing.php");
    exit;
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
				<form action="index.php" method = "POST" id = "registration" >
					<h3>Sign Up</h3>
					<div class="form-holder active">
						<input type="text" name ="username" placeholder="name" class="form-control">
					</div>
					<div class="form-holder">
						<input type="text" placeholder="e-mail" class="form-control">
					</div>
					<div class="form-holder">
						<input type="password" name ="password" placeholder="Password" class="form-control" style="font-size: 15px;">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" checked> I agree all statement in <a href="#">Terms & Conditions</a>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-login">
						<button type ="submit">Sign up</button>
						<p>Already Have account? <a href="login.php">Login</a></p>
					</div>
				</form>
			</div>
		</div>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>