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
		<link rel="stylesheet" href="css/author.css" />
		<link rel="stylesheet" href="css/mediaqueries.css"> <!-- As of 03/03/24 This contains nothing so far-->

		<!-- Scripts -->
		<script src="js/carousel.js" defer></script>
		<title>The Harper</title>
	</head>
	<body>
	<!-- Navbar -->
	<div class="sec_navbar sticky">
		<div class="container sticky">
			<div class="col_2_navbar_top width-2">
				<h4><i class="fa fa-bars" aria-hidden="true"></i></h4>
			</div>
			<div class="col_8_navbar_top width-8">
				<h1><a href="index.php">The Harper</a></h1>
			</div>
			<div class="col_2_navbar_top width-2">
				<h5>Sign In</h5>
				<h5><a href="#"><strong>Newsletter</strong></a></h5>
			</div>
		</div>
	</div>
	<section class="sec_navbar shadow underline">
		<div class="centered_navbar_bottom">
			<ul class="centered_navbar_unorderlist">
				<?php foreach ($catNavbar as $s) { ?> 
					<li><a href="category_view.php?id=<?= $s->id ?>"><?= $s->name ?></a></li>
				<?php } ?>
					<li><a href="story_index.php">Story Index</a></li>
					<li><a href="team_view.php">Our Team</a></li>
			</ul>
		</div>
	</section>
	<!-- Main Section-->
	<section class="sec_authorsAll">

			<!-- Founders -->
			<div class="centered_authorCont">
			<?php	 $count = 0;
			 		foreach ($authorArray as $s) {
					if ($count < 2) { ?>

					<div class="centered_authorCont_card">
						<a href="author_view.php?id=<?= $s->id ?>.php">
						<div class="centered_authorCont_image">
							<img src="<?= $s->biopic ?>" alt="<?= $s->first_name . " " . $s->last_name ?>">
						</div>
						<h3><?= $s->first_name . " " . $s->last_name ?></h3>
						<h5><?= $s->job_title ?></h5>
						</a>
					</div>
			<?php $count++; } } ?>
			</div>

			<div class="centered_authorCont">
			<?php	$count = 0;
					foreach (array_slice($authorArray, 2) as $s) {
						if ($count < 3) { ?>

					<div class="centered_authorCont_card">
						<a href="author_view.php?id=<?= $s->id ?>.php">
						<div class="centered_authorCont_image">
							<img src="<?= $s->biopic ?>" alt="<?= $s->first_name . " " . $s->last_name ?>">
						</div>
						<h3><?= $s->first_name . " " . $s->last_name ?></h3>
						<h5><?= $s->job_title ?></h5>
						</a>
					</div>
			<?php $count++; } } ?>
			</div>

			<div class="centered_authorCont">
			<?php	$count = 0;
					foreach (array_slice($authorArray, 5) as $s) {
						if ($count < 2) { ?>

					<div class="centered_authorCont_card">
						<a href="author_view.php?id=<?= $s->id ?>.php">
						<div class="centered_authorCont_image">
							<img src="<?= $s->biopic ?>" alt="<?= $s->first_name . " " . $s->last_name ?>">
						</div>
						<h3><?= $s->first_name . " " . $s->last_name ?></h3>
						<h5><?= $s->job_title ?></h5>
						</a>
					</div>
			<?php $count++; } } ?>
			</div>

			<div class="centered_authorCont">
			<?php	$count = 0;
					foreach (array_slice($authorArray, 7) as $s) {
						if ($count < 4) { ?>

					<div class="centered_authorCont_card">
						<a href="author_view.php?id=<?= $s->id ?>.php">
						<div class="centered_authorCont_image">
							<img src="<?= $s->biopic ?>" alt="<?= $s->first_name . " " . $s->last_name ?>">
						</div>
						<h3><?= $s->first_name . " " . $s->last_name ?></h3>
						<h5><?= $s->job_title ?></h5>
						</a>
					</div>
			<?php $count++; } } ?>
			</div>

			<div class="centered_authorCont">
			<?php	$count = 0;
					foreach (array_slice($authorArray, 11) as $s) {
						if ($count < 2) { ?>

					<div class="centered_authorCont_card">
						<a href="author_view.php?id=<?= $s->id ?>.php">
						<div class="centered_authorCont_image">
							<img src="<?= $s->biopic ?>" alt="<?= $s->first_name . " " . $s->last_name ?>">
						</div>
						<h3><?= $s->first_name . " " . $s->last_name ?></h3>
						<h5><?= $s->job_title ?></h5>
						</a>
					</div>
			<?php $count++; } } ?>
			</div>
	</section>
	<!--Footer Section-->
		<footer class="sec_parent sec_footer">
			<div class="container">
				<div class="col_6_footer_upper sec_parent_dark width-6">
					<h2>The Harper</h2>
					<ul>
						<li>Legal</li>
						<li>Careers</li>
						<li>Terms of Use</li>
						<li>Privacy Policy</li>
					</ul>
				</div>
				<div class="col_6_footer_upper_right sec_parent_dark width-6">
					<h2>Tune In, Turn Up</h2>
					<ul>
						<li>For general enquiries, email us at info@theharper.ie</li>
						<li>or call us on +353 838 3838</li>                  
							<div class="iconGroup">
								<a href="#"><div class="iconSocials"><i class="fa-brands fa-facebook-f"></i></div></a>
								<a href="#"><div class="iconSocials"><i class="fa-brands fa-twitter"></i></div></a>
								<a href="#"><div class="iconSocials"><i class="fa-brands fa-instagram"></i></div></a>
								<a href="#"><div class="iconSocials"><i class="fa-brands fa-youtube"></i></div></a>
								<a href="#"><div class="iconSocials"><i class="fa-brands fa-tiktok"></i></div></a>
                        	</div>
					</ul>
				</div>
				<div class="col_12_footer_lower sec_parent_dark width-12">
					<ul>
						<li><h5>The Harper is Proudly Sponsored By Guinness</h5></li>
						<li>|</li>
						<li>READ MORE:</li>
						<li>News</li>
						<li>Features</li>
						<li>Reviews</li>
						<li>Release</li>
						<li>Interviews</li>
						<li>Podcast</li>
					</ul>
				</div>
				<div class="col_12_footer_bottom width-12">
					<ul>
						<li>© 1997-2024 The Harper, Inc., a Guinness company. All rights reserved. </li>
						<li>Website designed by Joshua Santiago-Francia</li>
					</ul>
				</div>
			</div>
		</footer>
	</body>
</html>
