<!DOCTYPE html>
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

				<form id = "login" action="" style= "padding-top: 30px;">
					<h3>Sign Up</h3>
					<div class="form-holder active">
						<input type="text" placeholder="name" class="form-control">
					</div>
					<div class="form-holder">
						<input type="text" placeholder="e-mail" class="form-control">
					</div>
					<div class="form-holder">
						<input type="password" placeholder="Password" class="form-control" style="font-size: 15px;">
					</div>
					<div class="form-holder">
						<input type="password" placeholder="Confirm Password" class="form-control" style="font-size: 15px;">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" checked> I agree all statement in <a href="#">Terms & Conditions</a>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-login">
						<button>Login</button>
						<p>Don't have an account? <a href="index.php">Register</a></p>
					</div>
				</form>

			</div>
		</div>

		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>