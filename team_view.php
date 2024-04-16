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
		<link rel="stylesheet" href="css/story.css" />
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
			<div class="navigation">
    			<input type="checkbox" id="toggle-menu" class="toggle-menu" />
			  	<label for="toggle-menu" class="toggle-menu-label"><i class="fa fa-bars"></i></label>
  				<div class="hamburger"></div>
					<div class="menu">
						<div class="container">
							<div class="menu_items width-12">
									<?php foreach ($catNavbar as $s) { ?>
									<p><a href="category_view.php?id=<?= $s->id ?>"><?= $s->name ?></a></p>
									<?php } ?>
									<p><a href="team_view.php">Our Team</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col_8_navbar_top width-8">
				<h1><a href="index.php">The Harper</a></h1>
			</div>
			<div class="col_2_navbar_top width-2">
				<h5><a href="sign_in.php" target="_blank">Sign In</a></h5>
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
					<li><a href="team_view.php">Our Team</a></li>
			</ul>
		</div>
	</section>
	<!-- Main Section-->
	<section class="sec_authorsAll">
			<div class="col_12_teamCont">
				<div class="container">
					<div class="col_12_category_header width-12">
						<div class="col_12_category_text">
							<h1>Our Story</h1>
							<p>The Harper was born in 2020 out of a passion project by our founders, Joshua Santiago-Francia and Andrew Gallagher. With a shared love and appreciation for the vibrant music scene in Ireland (combined with a little lockdown blues), they embarked on a mission to create a platform that celebrates the richness of musical talent in Ireland and beyond.</p>
						</div>
					</div>
					<?php foreach ($authorArray as $s) { ?>
						<div class="col_12_teamCont_card width-3">
							<a href="author_view.php?id=<?= $s->id ?>.php">
								<div class="col_12_teamCont_image">
									<img src="<?= $s->biopic ?>" alt="<?= $s->first_name . " " . $s->last_name ?>">
								</div>
								<h3><?= $s->first_name . " " . $s->last_name ?></h3>
								<h5><?= $s->job_title ?></h5>
							</a>
						</div>
					<?php }  ?>
				</div>
			</div>
	</section>
	<section class="sec_goldbg">
		<div class="container">
			<div class="col_12_teamCont width-12">
				<div class="col_12_atuhorCont_map">
					<iframe class="google_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4771.006674447924!2d-6.1548954230157475!3d53.28051807964659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486708838c909fc1%3A0xa0c1fdf74beffaf3!2sDun%20Laoghaire%20Institute%20Of%20Art%20Design%20%2B%20Technology!5e0!3m2!1sen!2sie!4v1713227569169!5m2!1sen!2sie" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="col_12_teamCont_text">
					<p>At The Harper, we are dedicated to providing a dynamic and inclusive space where music enthusiasts of all backgrounds can come together to discover, engage with, and be inspired by the latest news, reviews, interviews, and features from the world of music. Whether you're a die-hard fan of traditional Irish folk music, a devotee of indie rock, or an aficionado of electronic beats, there's something here for everyone.</p>
					<p>Our team of passionate writers and contributors from all around Ireland are committed to delivering insightful, thought-provoking content that shines a spotlight on both established and emerging artists, delves into the stories behind the music, and explores the ever-evolving landscape of the industry. We believe in the power of music to unite, inspire, and provoke change, and it is our privilege to share that passion with you.</p>
					<p>Join us on this journey as we continue to champion the diverse voices and sounds that make the world of music so endlessly captivating. Tune in, turn up.</p>
				</div>
			</div>
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
