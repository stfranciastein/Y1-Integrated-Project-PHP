<?php
require_once "./etc/config.php";
require_once "./etc/locator.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!$_SESSION['site_admin'] === true){
	header("Location: index.php");

	$_SESSION["flash"] = [
		"type" => "error",
		"message" => "You do not have permission to access that page. If this is unexpected, contact your website's admin."
	];

    exit();
}

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
		<title>The Harper | Admin</title>
		<link rel="icon" type="image/x-icon" src="/images/assets/icon.ico">
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
				<a href="index.php"><img src="images/assets/logo-big-2.png"></a>
			</div>
			<div class="col_2_navbar_top width-2">

			<?php if (isset($_SESSION['user_id'])): ?>
				<div class="col_2_navbar_dropdown">
					<h5 class="col_2_navbar_dynamic"><?php echo $_SESSION['user_name'] ?></h5>
					<div class="col_2_navbar_dropdown_content">
							<h5><a href="story_index.php">Admin Panel</h5>
							<h5><a href="user_logout.php">Sign Out</h5>
					</div>
				</div>
			<?php else: ?>
    			<h5 class="col_2_navbar_dynamic"><a href="sign_in.php" target="_blank">Sign In</a></h5>
			<?php endif; ?>	

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
	<main>
		<section class="sec_parent sec_storyindex">
			<div class="container">
				<div class="col_12_flashMessage width-12">
					<?php if (array_key_exists("flash", $_SESSION)) {?>
						<p class="flash <?= $_SESSION["flash"]["type"] ?>"><?= $_SESSION["flash"]["message"] ?></p>
						<?php unset($_SESSION["flash"]); ?>
					<?php } ?>
				</div>
				<script src="js/timeout.js"></script>
				<div class="col_12_adminActions width-12">
					<h1>ADMIN</h1>
					<p>Deleting a story will permanently delete it from the database. This is an irreversable process. If you have deleted a story by accident, inform IT immediately.</p>
					<p>You cannot delete an author from the database without deleting all of their stories as well. If you wish to erase an author's entries, contact IT at it@theharper.ie</p>
					<p>*Note: Emails sent from external sources may take several days to be processed.</p>
					<a href="story_create.php">
						<button class="allbutton greenbutton">Add Story</button>
					</a>
				</div>
				<div class="separator width-12">
					<ul>
						<li><h3>All Stories</h3></li>
					</ul>
				</div>
				<div class="col_12_story_index width-12">

				<?php foreach ($allStories as $s) { ?>
					<div class="col_12_story_item">
						<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
						<div class="col_12_story_text">
							<h5><?= Category::findById($s->category_id)->name ?></h5>
							<h3><?= $s->headline ?></h3>
							<p><?= $s->subarticle ?></p>
							<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
							<h5>Location: <?= Location::findById($s->location_id)->name ?></h5>
							<h5>Created At: <?= date('d/m/Y', strtotime($s->created_at)) ?> /// Updated At: <?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>

							<a href="story_view.php?id=<?= $s->id ?>.php">
								<button class="allbutton yellowbutton">View</button>
							</a>
							<a href="story_edit.php?id=<?= $s->id ?>.php">
								<button class="allbutton greenbutton">Edit</button>
							</a>
							<a href="story_delete.php?id=<?= $s->id ?>.php">
								<button class="allbutton deletebutton">Delete</button>
							</a>
							
						</div>
					</div>
					<?php } ?>

				</div>

			</div>
		</section>
	</main>
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
						<li>Releases</li>
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
