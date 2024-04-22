<?php
require_once "./etc/config.php";
require_once "./etc/global.php";
require_once "./etc/locator.php";
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); //Hey idiot, your login is HRP_Josh and your password is 123456!
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/reset.css" />
		<link rel="stylesheet" href="css/all.min.css" /> <!-- Imported from web design project -->
		<link rel="stylesheet" href="css/grid.css" /> <!-- I removed padding-bottom:40px from .container -->
		<link rel="stylesheet" href="css/root.css"/>  <!-- Variables are stored here + General Styles for cleanliness-->
		<link rel="stylesheet" href="css/style.css" /> <!-- Contains styles for actual content-->
		<link rel="stylesheet" href="css/crud.css" />
		<link rel="stylesheet" href="css/mediaqueries.css"> <!-- As of 03/03/24 This contains nothing so far-->
		<title>The Harper | Sign In</title>
	</head>
	<body>
		<main>
			<section class="sec_parent sec_login sec_login_tint">
				<video class="background-video" autoplay loop muted><source src="<?php echo getRandomVideo(); ?>" type="video/mp4">Your browser does not support the video tag.</video>
				<div class="container">
					<div class="col_6_login_left width-7">
						<ul>
							<li><a href="index.php"><img src="images/assets/logo-big-3.png"></a></li>
							<li><h3>Tune in, Turn up.</h3></li>
						</ul>
					</div>
					<div class="col_6_login_right width-5">
					<div class="col_12_flashMessage">
						<?php if (array_key_exists("flash", $_SESSION)) {?>
							<p class="flash <?= $_SESSION["flash"]["type"] ?>"><?= $_SESSION["flash"]["message"] ?></p>
						<?php unset($_SESSION["flash"]); ?>
						<?php unset($_SESSION["error"]); ?>
					<?php } ?>
					</div>
						<div id="sign_in" class="login_upper">		
							<h1>Sign In</h1>
							<form action="user_login.php" method="POST">
								<ul>
									<li><p>Email or Username</p></li>
									<li><input type="text" name="username" class="headline_field"></textinput></li>
									<li><p>Password</p></li>
									<li><input type="password" name="password" class="headline_field"></textinput></li>
								</ul>
								<div class="login_or_signup">
									<p><button class="allbutton yellowbutton" type="submit">Sign In</button></p> 
									<p>or</p>
									<p><button type="button" class="login_upper_tabs_links allbutton yellowbutton" onclick="openTab(event, 'sign_up')">Sign Up</button></p>
								</div>
							</form>
							<p><a href="#">Trouble signing in?</a></p>
							<div class="login_buttons">
								<p><i class="fa-brands fa-google"></i> Continue with Google</p>
								<p><i class="fa-brands fa-apple"></i> Continue with Apple</p>
								<p><i class="fa-brands fa-facebook"></i> Continue with Facebook</p>
							</div>
						</div>
						<div id="sign_up" class="login_upper">
							<h1>Create an Account</h1>
							<form action="user_store.php" method="POST">
								<ul>
									<li><p>Username</p></li>
									<li><input type="text" name="username" value="<?= old("username")?>" class="sign_field">
									<li><span class="error"><?= error("username")?><span></li>

									<li><p>Email</p>
									<li><input type="text" name="email" value="<?= old("email")?>" class="sign_field">
									<li><span class="error"><?= error("email")?><span></li>
									<input type="hidden" name="site_admin" value="0" class="sign_field"></li>

									<li><p>Profile Pic(url)</p>
									<li><input type="text" name="profilepic_url" value="<?= old("profilepic_url")?>" class="sign_field">
									<li><span class="error"><?= error("profilepic_url")?><span></li>

									<li><p>Password</p>
									<li><input type="password" name="pass_word" value="<?= old("pass_word")?>" class="sign_field">
									<li><span class="error"><?= error("pass_word")?><span></li>
									
									<li><p>Confirm Password</p>
									<li><input type="password" name="pass_word_confirm" value="<?= old("pass_word_confirm")?>" class="sign_field">
									<li><span class="error"><?= error("pass_word_confirm")?><span></li>

									<li><input type="checkbox" id="terms_and_conditions" name="terms_and_conditions" value="terms_and_conditions" required><label for="terms_and_conditions">I agree to the <a href="#">terms and conditions</a></label></li>
									<li><input type="checkbox" id="privacy_policy" name="privacy_policy" value="privacy_policy" required><label for="privacy_policy">I accept the <a href="#">privacy policy</a></label></li>
								</ul>
								<div class="login_or_signup">
									<p><button class="allbutton yellowbutton">Sign Up</button></p>
									<p>or</p>
									<p><button type="button" class="login_upper_tabs_links allbutton yellowbutton" onclick="openTab(event, 'sign_in')"  id="defaultOpen">Return</button></p>
								</div>
							</form>
						</div>
						<script src="js/tabs.js"></script>
						<script src="js/navbar.js"></script>
						<?php unset($_SESSION['form-errors']); ?>
						<p><a href="index.php">Return to Homepage</a></p>
					</div>
				</div>
			</section>
		</main>
	</body>
</html>