<html>
<head>
    <title>Hotel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Map.css">
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
                    <li class = "active"><a href="Map.php">Map</a></li>
                    <li><a href="Reservations.php">View Reservations</a></li>
                    
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


    <table id = "Grid" class = "Grid"></table>
    <script type = "text/javascript">
        window.onload = function createGrid() { 
            var coordinates = 
      
        <?php
        include("permissions.php");
        $con = new mysqli($host, $user, $password, $dbname) or die ('Could not connect to the database server' . mysqli_connect_error());
            $coordinatesquery = "SELECT hotelLocation FROM hotels;";
            $coordinates = mysqli_query($con, $coordinatesquery) or die ("Could not access coordinates of hotels");
            $json_array = array();
            echo "'";
            if(mysqli_num_rows($coordinates) > 0){
                while($row = mysqli_fetch_assoc($coordinates)){
                    echo $row["hotelLocation"] . "\t";
                    $json_array[] = $row;
                }
            }
            echo "';";
            //echo json_encode($json_array);
            $con->close();
        ?>
        var coordinatesAry = coordinates.split("\t");
        //document.getElementById("demo").innerHTML = coordinatesAry[0];



            //console.log('The Script will load now.'); 
            var result = "";
            for (var i=1; i<=100; i++){
                result += "<tr> ";
                for (var j=1; j<=100; j++){
                    result += "<td id = '" + i + "," + j + "'" ;
                    for (var k=0; k<coordinatesAry.length; k++){
                        var temp = i + ", " + j;
                        if (temp == coordinatesAry[k]){
                           result += " class = 'hotel'> <button id = 'button1' > </button> "; 
                           break;
                        } 
                        else if (k == coordinatesAry.length-1) result += ">";
                    }
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
        .Grid{
            margin-left: auto;
            margin-right: auto;
            margin-top: 52px;
            border: .2px solid black;
        }
        .Grid tr td{
            text-align: center;
            color: black;
            border: .2px solid black;
            height: 14.06px;
            width: 14.06px;
            font-size: 4px;
        }
        .Grid tr td.hotel{
            background-color: red;
        }

        #demo{
            font-size: 100px;
            color: black;
        }
        #button1{
            background-color: orange;
            height: 14px;
            width: 14px;
        }
        


    </style>


</html>