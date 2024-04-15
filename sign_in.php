<?php
require_once "./etc/config.php";
require_once "./etc/locator.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Google Font: Jost-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
		<!-- John's Style Sheets-->
		<link rel="stylesheet" href="css/reset.css" />
		<link rel="stylesheet" href="css/all.min.css" /> <!-- Imported from web design project -->
		<link rel="stylesheet" href="css/grid.css" /> <!-- I removed padding-bottom:40px from .container -->
		<!-- My Style Sheets-->
		<link rel="stylesheet" href="css/root.css"/>  <!-- Variables are stored here + General Styles for cleanliness-->
		<link rel="stylesheet" href="css/style.css" /> <!-- Contains styles for actual content-->
		<link rel="stylesheet" href="css/crud.css" />
		<link rel="stylesheet" href="css/mediaqueries.css"> <!-- As of 03/03/24 This contains nothing so far-->

		<!-- Scripts -->
		<script src="js/carousel.js" defer></script>
		<title>The Harper | Sign In</title>
	</head>
	<body>
	<main>
		<section class="sec_parent sec_login">
			<div class="container">
				<div class="col_6_login_left width-7">
					<h1><a href="index.php">THE HARPER</a></h1>
				</div>
				<div class="col_6_login_right width-6">
					<div class="login_upper">
						<h1>Log In</h1>
						<form>
							<ul>
								<li><h5>Email or Username</h5></li>
								<li><input type="text" name="headline" class="headline_field"></textinput></li>
								<li><h5>Password</h5></li>
								<li><input type="password" name="headline" class="headline_field"></textinput></li>
							</ul>
						</form>
							<div class="login_or_signup">
								<p><button class="allbutton yellowbutton">Log In</button></p> 
								<p>or</p>
								<p><button class="allbutton yellowbutton">Sign Up</button></p>

							</div>
							<p><a href="story_index.php">Trouble signing in?</a></p>
					</div>
					<div class="login_buttons">
						<p><i class="fa-brands fa-google"></i> Continue with Google</p>
						<p><i class="fa-brands fa-apple"></i> Continue with Apple</p>
						<p><i class="fa-brands fa-facebook"></i> Continue with Facebook</p>
					</div>
				</div>
			</div>
		</section>
	</main>
	</body>
</html>
