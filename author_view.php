<?php
require_once "./etc/config.php";
require_once "./etc/locator.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }

    if (array_key_exists("id", $_GET)) {
        $id = $_GET["id"];
        $author = Author::findById($id);
		$authorView = Story::findByAuthor($id, $options = array('offset' => 0)); //populates page with all stories from this author
		$dob = Author::findById($id)->dob;
		$dob_date = new DateTime($dob);
		$current_date = new DateTime();
		$age = $current_date->diff($dob_date)->y;
        if ($author === null) {
            throw new Exception("Author not found");
        }
    }
    else {
        throw new Exception("Missing parametre: category ID");
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
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
		<link rel="stylesheet" href="css/author.css" />
		<link rel="stylesheet" href="css/mediaqueries.css"> <!-- As of 03/03/24 This contains nothing so far-->
		<!-- Scripts -->
		<script src="js/carousel.js" defer></script>
		<title>Authors: <?= Author::findById($id)->first_name . " " . Author::findById($id)->last_name ?></title>
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
	<!--Author Bio Section-->
	<section class="sec_parent sec_colorbg">
		<div class="container">
			<div class="author_card width-12">
				<img src="<?= Author::findById($id)->biopic?>">
				<div class="author_card_text">
					<h2><?= Author::findById($id)->first_name . " " . Author::findById($id)->last_name ?></h2>
					<h5><?= Author::findById($id)->job_title ?></h5>
					<p><?= Author::findById($id)->bio ?></p>
					<ul>
						<li><strong>Favourite Aritst:</strong> <?= Author::findById($id)->favourite_artist ?></li>
						<li><strong>Age:</strong> <?= $age ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--Story Body Section-->
	<section class="sec_parent">
			<div class="container">
				<div class="separator width-12">
					<ul>
						<li><h3><?= Author::findById($id)->first_name?>'s published stories</h3></li>
					</ul>
				</div>
				<?php if (empty($authorView)) { ?>
				<div class="col_4_story width-12">
					<p><i>"There's nothing left... just dustin echoes"</i></p>
					<p>This author has no published stories.</p>
				<?php } else foreach ($authorView as $s) { if (!$s-> id !== 0) {
				?>
				<div class="col_4_story width-4">
					<a href="story_view.php?id=<?= $s->id ?>.php">
						<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
						<div class="col_4_story_text">
							<h5><?= Category::findById($s->category_id)->name ?></h5>
							<h3><?= $s->headline ?></h3>
							<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
							<h5><?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>
						</div>
					</a>
				</div>
				<?php };} ?>
	<!--Newsletter Section-->
				<div class="col_12_newsletter_content width-12">
					<div class="col_12_newsletter_content_child">
						<div class="col_12_newsletter_left">
							<span><i class="fa fa-newspaper" aria-hidden="true"></i>NEWSLETTER</span>
							<h1>Stay updated on your favourite artists and events</h1>
						</div>
						<div class="col_12_newsletter_right">
							<form>
								<input type="text" name="email" class="inputtxt" placeholder="Enter your email">
								<input type="button" value="Subscribe" class="submitbtn">
							</form>
							<p>By subscribing you agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy.</a></p>
						</div>
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