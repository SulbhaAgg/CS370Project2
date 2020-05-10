<html>
<head>
    <title>Hotel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="reservation.css">
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
                    <li><a href="About.html">About</a></li>
                    <li><a href="Chains.php">Chains</a></li>
                    <li><a href="Map.php">Map</a></li>
                    <li id = "active"><a href="Reservations.php">View Reservations</a></li>
                    
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="hotelSignUp.php">Sign Up</a></li>
                    <li><a href="hotelLog.php">Login</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    
    <div class = "container-fluid inner"><table id = "Grid" class = "Grid"></table></div>
    <script type = "text/javascript">
        window.onload = function createTable() { 
      
        var reservations  = 

        
    <?php
        include("permissions.php");
        
        $con = new mysqli($host, $user, $password, $dbname) or die ('Could not connect to the database server' . mysqli_connect_error());

            $currentDate = "2020-12-07";
            $chain = "Marriot";
            $reservationsquery = "SELECT userId, hotelChain, hotelLocation, roomType, price, dateArrival, dateDeparture FROM reservations WHERE hotelChain = '" . $chain . "' AND DATE(dateArrival) <= '" . $currentDate ."' AND DATE(dateDeparture) >= '" . $currentDate . "';";
            $reservations = mysqli_query($con, $reservationsquery) or die ("Could not access coordinates of hotels");
            $json_array = array();
            echo "'";
            if(mysqli_num_rows($reservations) > 0){
                while($row = mysqli_fetch_assoc($reservations)){
                    echo $row["userId"] . "\t" . $row["hotelChain"] . "\t" . $row["hotelLocation"] . "\t" . $row["roomType"] . "\t" . $row["price"] . "\t" . $row["dateArrival"] . "\t" . $row["dateDeparture"] . "\t";
                    $json_array[] = $row;
                }
            }
            echo "';";
            //echo json_encode($json_array);
            $con->close();
        ?>
        var reservationsAry = reservations.split("\t");
        



            //console.log('The Script will load now.'); 
            var result = "<thead> <tr class='tableizer-firstrow'> <th> Name </th> <th> Hotel Chain </th> <th> Hotel Location </th> <th> Room Type </th> <th> Price </th> <th> Date of arrival </th> <th> Date of Departure </th></tr></thead>";
           // var result = "";
            var numRows = reservationsAry.length/7;
            var counter = 0;
            var counter2 = 1
            for (var i=1; i<=numRows; i++){
                result += "<tr> ";
                for (var j=1; j<=7; j++){
                    result += "<td id = '" + i + "," + j + "'>";
                    if (counter2 % 7 == 6 || counter2 % 7 == 0){
                        reservationsAry[counter] = reservationsAry[counter].split(" ")[0];
                    }
                    else if (counter2%7 == 5) reservationsAry[counter] = "$" + reservationsAry[counter];
                    result += reservationsAry[counter];
                    counter2++;
                    counter++;
                    result += "</td>";
                }
                result += "</tr>";
            }
            document.getElementById("Grid").innerHTML = result;
        }

            
</script>

    

</body>
<script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">


</script>
<style type = "text/css">
         
        /* .Grid tr td{
            background-color: white;
            height: 60px;
        } 

        .Grid tr{
            border: 2px solid black;
        }

        .Grid{
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1.9em;
            color: black;
            min-width: 1400px;
            
        }
        .Grid th,
        .Grid td{
            padding: 12px, 15px;
        }
        .Grid thead tr{

            font-size: 1em;
            background-color: pink;
            font-weight: bold;
            height: 60px;
        } */

    </style>


</html>

