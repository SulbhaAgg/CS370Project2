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
      $id = mysqli_real_escape_string($con,$_POST["id"]);
     $username = $_SESSION['username'];
    $hotelChain = mysqli_real_escape_string($con,$_POST["hotelChain"]);
  $location = mysqli_real_escape_string($con,$_POST["location"]);
    $roomType= mysqli_real_escape_string($con,$_POST["roomType"]);
    $dateBooked= mysqli_real_escape_string($con,$_POST["dateBooked"]);
    $fromDate= mysqli_real_escape_string($con,$_POST["fromDate"]);
    $toDate= mysqli_real_escape_string($con,$_POST["toDate"]); 
    $amtRoom = mysqli_real_escape_string($con,$_POST["amtRoom"]);
      list($locationI) = explode(',', $location);
      $locationJ = substr($location, strpos($location, ",") + 1);
      $price;

     // echo "". $username . $roomType . $priceStan . $numStan . $priceLux . $numLux . $location . $amtRoom .  $currentDate . $fromDate  . $toDate .  "  .......     ";
      
//echo "" . $price ."  .....         ";
	   





  if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["loggedin"] == true && isset($username) ){
	$insertresquery = "DELETE FROM `bast8620`.`reservations`WHERE id = '$id'";

if($roomType =="Luxury"){//updates the inventory of luxury rooms
     $roomLuxCheckQuery =" SELECT numLuxury FROM `hotel` WHERE hotelLocationI = '$locationI'  AND  hotelLocationJ = '$locationJ'";
     $roomCheck =  mysqli_query($con, $roomLuxCheckQuery) or die("F Lux not updated");
     $existinginfo = mysqli_fetch_assoc($roomCheck);
     $numLuxury = $existinginfo["numLuxury"] + $amtRoom;
      $updatequery = "UPDATE `hotel` SET numLuxury = '$numLuxury' WHERE hotelLocationI = '$locationI'  AND  hotelLocationJ = '$locationJ'";
      mysqli_query($con, $updatequery) or die("Luxury rooms not updated");
     }else{//updates the inventory of standard rooms
          $roomStanCheckQuery =" SELECT numStandard FROM `hotel` WHERE hotelLocationI = '$locationI'  AND  hotelLocationJ = '$locationJ'";
          $roomCheck=  mysqli_query($con, $roomStanCheckQuery) or die("Eminem not updated");
           $existinginfo = mysqli_fetch_assoc($roomCheck);
     $numStandard = $existinginfo["numStandard"] + $amtRoom;
         
       $updatequery = "UPDATE `hotel` SET numStandard = '$numStandard' WHERE hotelLocationI = '$locationI'  AND  hotelLocationJ = '$locationJ'";
       mysqli_query($con, $updatequery) or die("SOOO Close");
     }

mysqli_query($con, $insertresquery) or die("4: Delete reservation query failed"); //error code 4  insertquery failed
        echo "success";
      // unset( $_SESSION["ErrorTConfirm"]);

      // $_SESSION["ErrorCOBook"] = "Success";
    header("Location: myReservations.php");
    exit;
    }
    else{
      $_SESSION["ErrorCOConfirm"] = " " . $numStan . " " . $numLux . " " . $locationI . " " . $locationJ;
      header("Location: myReservations.php");
    }
    
}
?>