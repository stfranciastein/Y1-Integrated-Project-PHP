<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";
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
	<!-- Main Section-->
	<main>
		<section class="sec_parent sec_main">
			<!-- Main Upper-->
			<div class="container">
					<!--Left (Max of 2)-->
					<div class="col_2_story_img_column width-2">
					<?php foreach ($mainSecStory as $s) { ?>
						<a href="story_view.php?id=<?= $s->id ?>.php">
						<div class="col_2_story_img">
							<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
							<h5><?= Category::findById($s->category_id)->name ?></h5>
							<h4><?= $s->headline ?></h4>
							<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
							<h5><?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>
						</div>
						</a>
					<?php } ?>
					</div>
					<!--Middle-->
					<?php foreach ($mainStory as $s) { ?>
					<div class="col_8_story_main width-8">
						<a href="story_view.php?id=<?= $s->id ?>.php">
						<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
						<div class="col_8_story_main_text">
						<h5><?= Category::findById($s->category_id)->name ?></h5>
							<h1><?= $s->headline ?></h1>
							<?= $s->subarticle ?>
							<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
							<h5><?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>
						</div>
						</a>
					</div>
					<?php } ?>
					<!--Right (Max of 4)-->
					<div class="col_2_story_column width-2">
						<?php foreach ($mainThirdStory as $s) { ?>
						<a href="story_view.php?id=<?= $s->id ?>.php">
						<div class="col_2_story">
							<h5><?= Category::findById($s->category_id)->name ?></h5>
							<h4><?= $s->headline ?></h4>
							<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
						</div>
						</a>
						<?php } ?>
					</div>
			<!-- Main Lower (Max of 4)-->
				<?php foreach ($mainFourthStory as $s) { ?>
				<a href="story_view.php?id=<?= $s->id ?>.php">
				<div class="col_3_story width-3">
				<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
					<div class="col_3_story_text">
						<h5><?= Category::findById($s->category_id)->name ?></h5>
						<h3><?= $s->headline ?></h3>
						<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
						<h5><?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>
					</div>
				</div>
				</a>
				<?php } ?>
				
			</div> <!--Closes the container. DO NOT REMOVE -->
		</section>
	<!-- Features Section-->
		<section class="sec_parent sec_greybg">
			<div class="container">
				<div class="separator width-12">
					<ul>
						<li><h3>Features</h3></li>
						<li><h3>View More</h3></li>
					</ul>
				</div>
				<?php foreach ($features as $s) { ?>
				<div class="col_4_story width-4">
					<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
					<div class="col_4_story_text">
						<h3><?= $s->headline ?></h3>
						<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
						<h5><?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>
					</div>
				</div>
				<?php } ?>
			</div>	
		</section>
	<!-- Reviews Section-->
		<section class="sec_parent sec_reviews">
			<!--Upper Reviews-->
			<div class="container">
				<div class="separator width-12">
					<ul>
						<li><h3>Reviews</h3></li>
						<li><h3>View More</h3></li>
					</ul>
				</div>
				<div class="col_8_story_rev width-8">
					<?php foreach ($reviewMain as $s) { ?>
					<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
					<div class="col_8_story_rev_text">
						<h1><?= $s->headline ?></h1>
						<?= $s->subarticle ?>
						<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
						<h5><?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>
					</div>
					<?php } ?>
				</div>
				<!-- Right Panel (Max of 4)-->
				<div class="col_4_story_rev_column width-4">
					<?php foreach ($reviewSecStory as $s) { ?>
					<div class="col_4_story_rev">
					<img src="<?= $s->img_url ?>" alt="<?= $s->headline ?>">
						<div class="col_4_story_rev_text">
							<h4><?= $s->headline ?></h4>
							<h5>By <?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
							<h5><?= date('d/m/Y', strtotime($s->updated_at)) ?></h5>
						</div>
					</div>
					<?php } ?>
				</div>
				<!-- The col_3_stories here use a specific style for the review section. They have no category and instead have a margin at the top of the h3.-->
				<!--Lower Reviews (Max of 4)-->
				<div class="col_3_story width-3">
					<img src="images/30.png" alt="Father John Misty's Quest to Explain Himself">
					<div class="col_3_story_text_rev">
						<h3>Andrew Bird - My Finest Work Yet</h3>
						<h5>By Connor Moloney</h5>
						<h5>08/02/24</h5>
					</div>
				</div>
				<div class="col_3_story width-3">
					<img src="images/31.png" alt="Episode 171 - Glen Hansard">
					<div class="col_3_story_text_rev">
						<h3>Mitski - The Land is Inhospitable and So Are We</h3>
						<h5>By Matthew Seymour</h5>
						<h5>14/10/24</h5>
					</div>
				</div>
				<div class="col_3_story width-3">
					<img src="images/33.png" alt="The Lemon Twigs announce new album, ‘A Dream Is All We Know’">
					<div class="col_3_story_text_rev">
						<h3>Holy Hive - Float Back to You</h3>
						<h5>By Benjamin Macdowall</h5>
						<h5>14/07/24</h5>
					</div>
				</div>
				<div class="col_3_story width-3">
					<img src="images/11.png" alt="Phil Collen names the band that could equal Led Zeppelin">
					<div class="col_3_story_text_rev">
						<h3>Phil Collen names the band that could equal Led Zeppelin</h3>
						<h5>By Andrew Gallagher</h5>
						<h5>08/02/24</h5>
					</div>
				</div>
			</div>
		</section>
	<!-- Releases Section-->
		<section class="sec_parent sec_greybg">
			<div class="container">
				<div class="separator width-12">
					<ul>
						<li><h3>Releases</h3></li>
						<li><h3>View More</h3></li>
					</ul>
				</div>
				<div class="col_4_story width-8">
					<img src="images/10.png" alt="Mitski: how the US songwriter scored the year’s quietest global chart smash">
					<div class="col_4_story_text">
						<h3>The Lemon Twigs announce new album, ‘A Dream Is All We Know’</h3>
						<h5>By Benjamin MacDowall</h5>
						<h5>14/07/2024</h5>
					</div>
				</div>
				<div class="col_4_story width-4">
					<img src="images/14.png" alt="The Origins and Influence of Brian Eno’s Pioneering Album Ambient 1">
					<div class="col_4_story_text">
						<h3>Florence and the Machine Are Back With a Beautiful New Song and Video</h3>
						<h5>By Jing Gao</h5>
						<h5>25/01/2024</h5>
					</div>
				</div>
				<div class="col_4_story width-4">
					<img src="images/23.png" alt="The Musical Age of Shitpost Modernism">
					<div class="col_4_story_text">
						<h3>Andrew Bird Announces New Album: Outside Problems, Shares Video: Watch</h3>
						<h5>By Christine Montcheu</h5>
						<h5>15/04/2024</h5>
					</div>
				</div>
				<div class="col_4_story width-8">
					<img src="images/22.png" alt="The 44 Most Anticipated Tours of 2024: Taylor Swift, Bad Bunny, Olivia Rodrigo, and More">
					<div class="col_4_story_text">
						<h3>The 44 Most Anticipated Tours of 2024: Taylor Swift, Bad Bunny, Olivia Rodrigo, and More</h3>
						<h5>By Kate Temple</h5>
						<h5>18/08/24</h5>
					</div>
				</div>
			</div>
		</section>
	<!--Podcast Section-->
		<section class="sec_parent sec_podcast">
			<div class="container">
				<div class="separator width-12">
					<ul>
						<li><h3>Podcast</h3></li>
						<li><h3>View More</h3></li>
					</ul>
				</div>
				<div class="col_8_story_pod width-8">
					<img src="images/9.png" alt="Episode 173 - Glen Hansard">
					<div class="col_8_story_pod_text">
						<h1>Episode 171 - Glen Hansard</h1>
						<p>Josh Tillman is back with a new album. The slippery singer-songwriter remains bewitching, as sprightly brass-tinged arrangements deepen his songs’ darkness and brighten their romance. The ‘God’s Favourite Customer’ follow-up gives a different side to Tillman’s music.</p>
						<h5>By Joshua Santiago-Francia</h5>
						<h5>01/01/24</h5>
					</div>
				</div>
				<div class="col_4_story_rev_column width-4">
					<div class="col_4_story_rev">
					<img src="images/20.png" alt="Episode 170 - Mitski">
						<div class="col_4_story_rev_text">
							<h4>Episode 170 - Mitski </h4>
							<h5>By Valerie Sanchez</h5>
							<h5>07/06/24</h5>
						</div>
					</div>
					<div class="col_4_story_rev">
					<img src="images/32.png" alt="Episode 169 - Hozier">
						<div class="col_4_story_rev_text">
							<h4>Episode 169 - Hozier</h4>
							<h5>By Valerie Sanchez</h5>
							<h5>07/06/24</h5>
						</div>
					</div>
					<div class="col_4_story_rev">
					<img src="images/36.png" alt="Episode 168 - Korn">
						<div class="col_4_story_rev_text">
							<h4>Episode 168 - Korn</h4>
							<h5>By Valerie Sanchez</h5>
							<h5>07/06/24</h5>
						</div>
					</div>
					<div class="col_4_story_rev">
					<img src="images/37.png" alt="Episode 167 - Lisa Hannigan">
						<div class="col_4_story_rev_text">
							<h4>Episode 167 - Lisa Hannigan</h4>
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
							<h1>Get the latest in music and entertainment</h1>
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
						<div class="col_12_read_carousel_item">
							<div class="container">
								<div class="col_3_story width-3">
									<img src="images/8.png" alt="Father John Misty's Quest to Explain Himself">
									<div class="col_3_story_text">
										<h5>Interview</h5>
										<h3>Father John Misty’s Quest to Explain Himself</h3>
										<h5>By Connor Moloney</h5>
										<h5>08/02/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/9.png" alt="Episode 171 - Glen Hansard">
									<div class="col_3_story_text">
										<h5>Podcast</h5>
										<h3>Episode 171 - Glen Hansard</h3>
										<h5>By Matthew Seymour</h5>
										<h5>14/10/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/10.png" alt="The Lemon Twigs announce new album, ‘A Dream Is All We Know’">
									<div class="col_3_story_text">
										<h5>Releases</h5>
										<h3>The Lemon Twigs announce new album, ‘A Dream Is All We Know’</h3>
										<h5>By Benjamin Macdowall</h5>
										<h5>14/07/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/11.png" alt="Phil Collen names the band that could equal Led Zeppelin">
									<div class="col_3_story_text">
										<h5>News</h5>
										<h3>Phil Collen names the band that could equal Led Zeppelin</h3>
										<h5>By Andrew Gallagher</h5>
										<h5>08/02/24</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="col_12_read_carousel_item">
							<div class="container">
								<div class="col_3_story width-3">
									<img src="images/11.png" alt="Father John Misty's Quest to Explain Himself">
									<div class="col_3_story_text">
										<h5>Interview</h5>
										<h3>Father John Misty’s Quest to Explain Himself</h3>
										<h5>By Connor Moloney</h5>
										<h5>08/02/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/12.png" alt="Episode 171 - Glen Hansard">
									<div class="col_3_story_text">
										<h5>Podcast</h5>
										<h3>Episode 171 - Glen Hansard</h3>
										<h5>By Matthew Seymour</h5>
										<h5>14/10/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/13.png" alt="The Lemon Twigs announce new album, ‘A Dream Is All We Know’">
									<div class="col_3_story_text">
										<h5>Releases</h5>
										<h3>The Lemon Twigs announce new album, ‘A Dream Is All We Know’</h3>
										<h5>By Benjamin Macdowall</h5>
										<h5>14/07/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/14.png" alt="Phil Collen names the band that could equal Led Zeppelin">
									<div class="col_3_story_text">
										<h5>News</h5>
										<h3>Phil Collen names the band that could equal Led Zeppelin</h3>
										<h5>By Andrew Gallagher</h5>
										<h5>08/02/24</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="col_12_read_carousel_item">
							<div class="container">
								<div class="col_3_story width-3">
									<img src="images/15.png" alt="Father John Misty's Quest to Explain Himself">
									<div class="col_3_story_text">
										<h5>Interview</h5>
										<h3>Father John Misty’s Quest to Explain Himself</h3>
										<h5>By Connor Moloney</h5>
										<h5>08/02/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/16.png" alt="Episode 171 - Glen Hansard">
									<div class="col_3_story_text">
										<h5>Podcast</h5>
										<h3>Episode 171 - Glen Hansard</h3>
										<h5>By Matthew Seymour</h5>
										<h5>14/10/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/17.png" alt="The Lemon Twigs announce new album, ‘A Dream Is All We Know’">
									<div class="col_3_story_text">
										<h5>Releases</h5>
										<h3>The Lemon Twigs announce new album, ‘A Dream Is All We Know’</h3>
										<h5>By Benjamin Macdowall</h5>
										<h5>14/07/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/18.png" alt="Phil Collen names the band that could equal Led Zeppelin">
									<div class="col_3_story_text">
										<h5>News</h5>
										<h3>Phil Collen names the band that could equal Led Zeppelin</h3>
										<h5>By Andrew Gallagher</h5>
										<h5>08/02/24</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="col_12_read_carousel_item">
							<div class="container">
								<div class="col_3_story width-3">
									<img src="images/19.png" alt="Father John Misty's Quest to Explain Himself">
									<div class="col_3_story_text">
										<h5>Interview</h5>
										<h3>Father John Misty’s Quest to Explain Himself</h3>
										<h5>By Connor Moloney</h5>
										<h5>08/02/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/20.png" alt="Episode 171 - Glen Hansard">
									<div class="col_3_story_text">
										<h5>Podcast</h5>
										<h3>Episode 171 - Glen Hansard</h3>
										<h5>By Matthew Seymour</h5>
										<h5>14/10/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/21.png" alt="The Lemon Twigs announce new album, ‘A Dream Is All We Know’">
									<div class="col_3_story_text">
										<h5>Releases</h5>
										<h3>The Lemon Twigs announce new album, ‘A Dream Is All We Know’</h3>
										<h5>By Benjamin Macdowall</h5>
										<h5>14/07/24</h5>
									</div>
								</div>
								<div class="col_3_story width-3">
									<img src="images/22.png" alt="Phil Collen names the band that could equal Led Zeppelin">
									<div class="col_3_story_text">
										<h5>News</h5>
										<h3>Phil Collen names the band that could equal Led Zeppelin</h3>
										<h5>By Andrew Gallagher</h5>
										<h5>08/02/24</h5>
									</div>
								</div>
							</div>
						</div>
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
