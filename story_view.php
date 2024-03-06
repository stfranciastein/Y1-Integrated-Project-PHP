<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";
require_once "./etc/locator.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalid request method");
    }

    if (array_key_exists("id", $_GET)) {
        $id = $_GET["id"];
        $story = Story::findById($id);
        if ($story === null) {
            throw new Exception("Story not found");
        }
    }
    else {
        throw new Exception("Missing parametre: story ID");
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
		<link rel="stylesheet" href="css/story.css" /> <!-- Story Page specific styles-->
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
				<li><a href="#"><?= $s->name ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</section>
	<!--Story Body Section-->
	<main>
		<section class="sec_parent sec_storybody">
			<div class="container">
				<div class="col_12_storypage width-12">
					<img src="<?= $story->img_url ?>" alt="<?= $story->headline ?>">
					<div class="col_12_storypage_text">
						<h4><?= Category::findById($story->category_id)->name ?></h4>
						<h1><?= $story->headline ?></h1>
						<?= $story->subarticle ?>
						<div class="col_12_storypage_text_sub">
							<h5>By <?= Author::findById($story->author_id)->first_name . " " . Author::findById($story->author_id)->last_name ?></h5>
							<h5><?= date('d/m/Y', strtotime($story->updated_at)) ?></h5>
						</div>
					</div>
				</div>
				<div class="col_8_storybody_body width-8">
					<?= $story->article ?>
				</div>
	<!--Right-Side Panel with related stories. Will only scroll down with the page  if there is enough text to scroll with.-->
	<!--Note for PHP, like the review section this should only show stories from the same category-->
				<div class="col_4_story_rev_column sticky2 width-4">
					<h4>RELATED STORIES</h4>
					<br>
					<div class="col_4_story_rev">
					<img src="images/17.png" alt="Oh Wonder - 22 Break">
						<div class="col_4_story_rev_text">
							<h4>Oh Wonder - 22 Break</h4>
							<h5>By Valerie Sanchez</h5>
							<h5>07/06/24</h5>
						</div>
					</div>
					<div class="col_4_story_rev">
					<img src="images/21.png" alt="Oh Wonder - 22 Break">
						<div class="col_4_story_rev_text">
							<h4>Bon Iver - I,I </h4>
							<h5>By Valerie Sanchez</h5>
							<h5>07/06/24</h5>
						</div>
					</div>
					<div class="col_4_story_rev">
					<img src="images/27.png" alt="Oh Wonder - 22 Break">
						<div class="col_4_story_rev_text">
							<h4>Lana Del Rey - Did You Know That There’s a Tunnel Under Ocean Blvd</h4>
							<h5>By Valerie Sanchez</h5>
							<h5>07/06/24</h5>
						</div>
					</div>
					<div class="col_4_story_rev">
					<img src="images/29.png" alt="Oh Wonder - 22 Break">
						<div class="col_4_story_rev_text">
							<h4>Yeat - 2093</h4>
							<h5>By Eduards Oss</h5>
							<h5>07/06/24</h5>
						</div>
					</div>
				</div>
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
	<!--Read More Section-->
		<section class="sec_parent sec_parent_dark sec_readmore">
			<div class="container">
				<div class="separator width-12">
					<ul>
						<li><h3>More From Us</h3></li>
					</ul>
				</div>
				<div class="col_12_read_carousel width-12">
					<div class="col_12_read_carousel_container ">
					<?php
					$storyCount = count($readMore);
					$itemsPerPage = 4;
					$numPages = ceil($storyCount / $itemsPerPage);
					for ($pageNum = 0; $pageNum < $numPages; $pageNum++) {
					$start = $pageNum * $itemsPerPage;
					$end = min(($pageNum + 1) * $itemsPerPage, $storyCount);
					?>
						<div class="col_12_read_carousel_item">
							<div class="container">
								<?php
								// Loop through the stories for the current page
								for ($i = $start; $i < $end; $i++) {
									$s = $readMore[$i];
									?>
									<div class="col_3_story width-3">
										<a href="story_view.php?id=<?= $s->id ?>.php">
											<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
											<div class="col_3_story_text">
												<h5><?= Category::findById($s->category_id)->name ?></h5>
												<h3><?= $s->headline ?></h3>
												<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
												<h5><?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>
											</div>
										</a>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>

					</div>
					<div class="col_12_read_carousel_controls">
						<button id="prevBtn">&lt;</button>
						<div class="carousel-dots"></div>
						<button id="nextBtn">&gt;</button>
					</div>
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