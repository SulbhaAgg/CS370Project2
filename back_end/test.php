<?php
?>
<html>
<head>
	<title>Hotel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="app.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div id="content">
                      <h1>Hotels</h1>
                      <h2 class="main">Select A Chain To View Hotels</h2>
                    <hr>
                    <button class="btn btn-secondary btn-lg"><a href="Chains.php">Chains</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-md">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
        data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span>
</button> <a class="navbar-brand"
        href="#"><i class="fa fa-building-o" aria-hidden="true"></i>Hotels</a>
        <!--
        Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active nav-item"><a href="landing.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item"><a href="Chains.php" class="nav-link">Chain Select</a>
                </li>
                <li class="nav-item"><a href="landing.php" class="nav-link">Map</a>
                </li>
            </ul>
            <form class="form-inline ">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
            <ul class="nav navbar-nav ml-auto"></ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- /.container-fluid -->
    </nav>
</body>