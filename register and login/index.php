<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration for likeHome</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		<script>
			function show(shown, hidden) {
			  document.getElementById(shown).style.display='block';
			  document.getElementById(hidden).style.display='none';
			  return false;
			}
		</script>
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="images/hotel.png" alt="">
				</div>
				<form action="" id = "registration" >
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
					<div class="checkbox">
						<label>
							<input type="checkbox" checked> I agree all statement in <a href="#">Terms & Conditions</a>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-login">
						<button>Sign up</button>
						<p>Already Have account? <a href="#" onclick="return show('login','registration');">Login</a></p>
					</div>
				</form>

				<form id = "login" action="" style="display:none; padding-top: 35px;">
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
						<p>Don't have an account? <a href="#" onclick="return show('registration','login');">Register</a></p>
					</div>
				</form>

			</div>
		</div>

		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>