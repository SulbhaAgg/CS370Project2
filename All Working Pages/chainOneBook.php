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
//if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($fromDate)){
  // $namecheckquery = "SELECT `username` FROM `users`WHERE username = '" . $username . "'";
   // $namecheck = mysqli_query($con, $namecheckquery)or die("2");// error code 2 - namecheckquery failed
   // if(mysqli_num_rows($namecheck) >0){
       // echo "didnt work name already exists";
    //    $_SESSION["ErrorCBook"] = "name already exists"; // error code 3 name exists cannot register
       // header("Location: chainTwoBook.php");
    //    exit();
   // }
    }

	
//    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($fromDate)){
//	$insertresquery = "INSERT INTO `bast8620`.`reservations`
//(`id`, `username`, `hotelChain`,`hotelLocation`, `roomType`, `dateBooked`, `fromDate`, `price`)
//VALUES (NULL, '$username, '$hotelChain', '$hotelLocationI', '$numLux','$numStan', '$priceLux', '$price')";

//mysqli_query($con, $insertresquery) or die("4: Insert reservation query failed"); //error code 4  insertquery failed
    //    echo "success";
        
    //header("Location: chainTwoBook.php");
   // exit;
    //}
    
//}
?>
<html>
<head>
    <title>Chain 1 Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="booking.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
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
echo '<li><a href="dateOpener.php">' . $_SESSION['currentDate'] .'</a></li>';
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
    <div class ="container pull-left">
        <?php
    if($hotelChain == "Marriot"){
                            echo '<form action="chainOneConfirm.php" method="post" class="form">';
                        } else if($hotelChain == "Courtyard"){
                            echo '<form action="chainTwoConfirm.php" method="post" class="form">';
                        }else{
                        echo    '<form action="chainThreeConfirm.php" method="post" class="form">';
                        }
                        ?>
        <div class = "row">
         <div class="form-group col-lg-1">
        Location i,j:<br>
        <?php
       echo '<input type="text" id="locationI" name="location" class="form-control" placeholder=" '. $location .'" required minlength="1" maxlength="5" value = " '.$location .'" readonly>';
        ?>
       </div>
   </div>
        
     <div class="row">
            <div class="form-group col-lg-1 ">
         Number of Luxury Rooms:<br>
         <?php
        echo '<input type="text" id="numLux" name="numLux" class="form-control" placeholder=" '. $numLux .'" required minlength="1" maxlength="5" value = " '.$numLux.'" readonly>';
        ?>


           </div>
             </div>
        <div class="row">
            <div class="form-group col-lg-1 ">
        Price Luxury:<br>
         <?php
        echo '<input type="text" id="locationI" name="priceLux" class="form-control" placeholder=" '. $priceLux .'" required minlength="1" maxlength="5" value = " '.$priceLux.'" readonly>';
        ?>
        
           </div>
   </div>
        <div class="row">
            <div class="form-group col-lg-1 ">
        Number of Standard Rooms:<br>
         <?php
        echo '<input type="text" id="locationI" name="numStan" class="form-control" placeholder=" '. $numStan .'" required minlength="1" maxlength="5" value = " '.$numStan .'" readonly>';
        ?>
           </div>
   </div>
        <div class="row">
            <div class="form-group col-lg-1 pull-left">
        Price Standard:<br>
         <?php
        echo '<input type="text" id="priceStan" name="priceStan" class="form-control" placeholder=" '. $priceStan .'" required minlength="1" maxlength="5" value = " '.$priceStan .'" readonly>';
        ?>
           </div>
   </div>
        <div class="row">
            <div class="form-group  col-lg-2 pull-left">
        Select the type of room you want:<br>
        <select name ="roomType" class ="form-control" required>
            <option value = ""selected hidden>Room Types</option>
            <option value ="Luxury">Luxury</option>
            <option value ="Standard">Standard</option>
        </select>
    </div>
     <div class = "form-group col-lg-2">
        How many Rooms do you want to book?<br>
        <input type ="number" name ="amtRoom" class = "form-control" required>
    </div>
    
        
        <?php
        '<input type ="hidden" name ="currentDate" value ="' .$_SESSION['currentDate'] .'" class = "form-control">';
        ?>
    
    <div class = "form-group col-lg-2">
        Input Check In Date mm/dd/yy<br>
        <input type ="date" name ="fromDate" class = "form-control" required>
    </div>
    <div class = "form-group col-lg-2">
        Input Check Out Date   mm/dd/yy<br>
        <input type ="date" name ="toDate" class = "form-control" required>
    </div>
    
    
       </div>
       <br>
       <br>
   
            <div class="row">
            <div class="form-group  col-lg-2 pull-left">
        <input type="submit" class="form-control" name="register" class="button">
        </br>
        <br>
         
    </div>
     <?php
        if(isset($_SESSION["dumbError"])){ // checks if there is an error message set
        echo '<p class = "statusMessage">' .$_SESSION["dumbError"].'</p>'; // Outputs error message to user
        unset($_SESSION["dumbError"]);
    }
        ?>
</div>
    </div>
     </br>
       
    </form>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</script>

</html>