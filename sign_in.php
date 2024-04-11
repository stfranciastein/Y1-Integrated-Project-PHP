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
				<div class="col_6_login_left width-6">
					<h1><a href="index.php">THE HARPER</a></h1>
				</div>
				<div class="col_6_login_right width-6">
					<h2>Log In</h2>
					<form>
						<ul>
							<li><p><strong>E-Mail or Username</strong></p></li>
							<li><input type="text" name="headline" class="headline_field"></textinput></li>
							<li><p><strong>Password</strong></p></li>
							<li><input type="text" name="headline" class="headline_field"></textinput></li>
						</ul>
					</form>
						<p><button class="allbutton yellowbutton">Log In</button> or <button class="allbutton yellowbutton">Sign Up</button></p>
						<p><a href="#">Trouble signing in?</a></p>
				</div>
			</div>
		</section>
	</main>
	</body>
</html>
