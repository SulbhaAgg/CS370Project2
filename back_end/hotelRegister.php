<?php
include("permissions.php");
session_start();
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());


    
	$username = mysqli_real_escape_string($con,$_POST["username"]);

	$password = mysqli_real_escape_string($con,$_POST["password"]);
	//if($username =='' || $password = ''){
	//		echo "Please fill out all fields";

	//	}
	//check if name exists
	$namecheckquery = "SELECT `username` FROM `users`WHERE username = '" . $username . "'";
	$namecheck = mysqli_query($con, $namecheckquery)or die("2");// error code 2 - namecheckquery failed
	if(mysqli_num_rows($namecheck) >0){
		$message = "name already exists";
		echo " that didnt work"; // error code 3 name exists cannot register
		exit();
	}

	//add user to table
	$salt = "\$5\$rounds = 5000\$" . "SickTimes" . $username . "\$";
	$hash = crypt($password, $salt);
	$insertuserquery = "INSERT INTO `bast8620`.`users`
(`id`, `username`, `hash`, `salt`)
VALUES (NULL, '$username', '$hash', '$salt')";

mysqli_query($con, $insertuserquery) or die("4: Insert user query failed"); //error code 4  insertquery failed
			echo "Ya that worked";
	$message ="Registration succesful"; 
   // header("Location: landing.html");
    exit;
?>