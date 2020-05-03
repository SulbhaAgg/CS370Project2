<?php
session_start();
if(isset($_SESSION["loggedin"])){
	unset($_SESSION["loggedin"]);
	$_SESSION["loggedin"] =false;
	header("Location: landing.php");
}
?>