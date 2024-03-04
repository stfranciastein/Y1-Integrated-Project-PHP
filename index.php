<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";

// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

$categoryId = 3;
$podcasts = Story::findByCategory($categoryId, $options = array('limit' => 4, 'offset' => 0));

// $locationId = 8;
// $stories = Story::findByLocation($locationId, $options = array('limit' => 4, 'offset' => 0));

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
				<li><a href="#">News</a></li>
				<li><a href="#">Features</a></li>
				<li><a href="#">Reviews</a></li>
				<li><a href="#">Releases</a></li>
				<li><a href="#">Podcast</a></li>
				<li><a href="#">Interviews</a></li>
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
						<div class="col_2_story_img">
							<img src="images/2.png" alt="Governors Ball 2024 Lineup Announced: SZA, Post Malone, the Killers, and More">
							<h5>News</h5>
							<h4>Governors Ball 2024 Lineup Announced: SZA, Post Malone, the Killers, and More</h4>
							<h5>By Thomas McCarthy</h5>
							<h5>13/01/24</h5>
						</div>
						<div class="col_2_story_img">
							<img src="images/3.png" alt="Father John Misty - Chloë and the Next 20th Century">
							<h5>Review</h5>
							<h4>Father John Misty - Chloë and the Next 20th Century</h4>
							<h5>Joshua Santiago-Francia</h5>
							<h5>03/12/24</h5>
						</div>
					</div>
					<!--Middle-->
					<div class="col_8_story_main width-8">
						<a href="story.html">
						<img src="images/1.png" alt="Taylor Swift Unveils Tracklist for The Tortured Poets Department">
						<div class="col_8_story_main_text">
						<h5>News</h5>
							<h1>Taylor Swift Unveils Tracklist for The Tortured Poets Department</h1>
							<p>Guest on the Midnights follow-up include Post Malone and Florence and the Machine.</p>
							<h5>By Joshua Santiago-Francia</h5>
							<h5>17/01/24</h5>
						</div>
						</a>
					</div>
					<!--Right (Max of 4)-->
					<div class="col_2_story_column width-2">
						<div class="col_2_story">
							<h5>Features</h5>
							<h4>Mitski: How the US songwriter scored the year's quietest global chart smash</h4>
							<h5>By Andrew Gallagher</h5>
						</div>
						<div class="col_2_story">
							<h5>News</h5>
							<h4>Yeat Teases Donald Glover and Drake Collabs for New Album '2093'</h4>
							<h5>By Eduards Oss</h5>
						</div>
						<div class="col_2_story">
							<h5>News</h5>
							<h4>Why Have We Forsaken Kings of Leon?</h4>
							<h5>By Braedon Turner</h5>
						</div>
						<div class="col_2_story">
							<h5>News</h5>
							<h4>Seafret are coming to Dublin's Academy in 2024</h4>
							<h5>By Joshua Santiago-Francia</h5>
						</div>
					</div>
			<!-- Main Lower-->
				<?php foreach ($podcasts as $s) { ?>
				<div class="col_3_story width-3">
					<img src="<?= $s->img_url ?>" />
					<div class="col_3_story_text">
						<h5><?= Category::findById($s->category_id)->name ?></h5>
						<h3><?= $s->headline ?></h3>
						<h5><?= Author::findById($s->author_id)->first_name . " " . Author::findById($s->author_id)->last_name ?></h5>
						<h5><?= $s->updated_at ?></h5>
					</div>
				</div>
				<?php } ?>
			</div>
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
				<div class="col_4_story width-4">
					<img src="images/4.png" alt="Mitski: how the US songwriter scored the year’s quietest global chart smash">
					<div class="col_4_story_text">
						<h3>Mitski: how the US songwriter scored the year’s quietest global chart smash</h3>
						<h5>By Andrew Gallagher</h5>
						<h5>28/06/24</h5>
					</div>
				</div>
				<div class="col_4_story width-4">
					<img src="images/18.png" alt="The Origins and Influence of Brian Eno’s Pioneering Album Ambient 1">
					<div class="col_4_story_text">
						<h3>The Origins and Influence of Brian Eno’s Pioneering Album Ambient 1</h3>
						<h5>By Braedon Turner</h5>
						<h5>02/11/2024</h5>
					</div>
				</div>
				<div class="col_4_story width-4">
					<img src="images/19.png" alt="The Musical Age of Shitpost Modernism">
					<div class="col_4_story_text">
						<h3>The Musical Age of Shitpost Modernism</h3>
						<h5>By Christine Montcheu</h5>
						<h5>15/04/2024</h5>
					</div>
				</div>
				<div class="col_4_story width-4">
					<img src="images/22.png" alt="The 44 Most Anticipated Tours of 2024: Taylor Swift, Bad Bunny, Olivia Rodrigo, and More">
					<div class="col_4_story_text">
						<h3>The 44 Most Anticipated Tours of 2024: Taylor Swift, Bad Bunny, Olivia Rodrigo, and More</h3>
						<h5>By Kate Temple</h5>
						<h5>18/08/24</h5>
					</div>
				</div>
				<div class="col_4_story width-4">
					<img src="images/26.png" alt="Why we can’t afford to lose holiday camp festival weekenders like Mighty Hoopla">
					<div class="col_4_story_text">
						<h3>Why we can’t afford to lose holiday camp festival weekenders like Mighty Hoopla</h3>
						<h5>By Joshua Santiago-Francia</h5>
						<h5>24/01/24</h5>
					</div>
				</div>
				<div class="col_4_story width-4">
					<img src="images/28.png" alt="The B-52s: “If someone’s ruining ‘Love Shack’ on karaoke, I’ll get up there and save it!”">
					<div class="col_4_story_text">
						<h3>The B-52s: “If someone’s ruining ‘Love Shack’ on karaoke, I’ll get up there and save it!”</h3>
						<h5>By Matthew Seymour</h5>
						<h5>29/10/24</h5>
					</div>
				</div>
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
					<img src="images/3.png" alt="Father John Misty - Chloe & The Next 20th Century">
					<div class="col_8_story_rev_text">
						<h1>Father John Misty - Chloe & The Next 20th Century</h1>
						<p>Josh Tillman is back with a new album. The slippery singer-songwriter remains bewitching, as sprightly brass-tinged arrangements deepen his songs’ darkness and brighten their romance. The ‘God’s Favourite Customer’ follow-up gives a different side to Tillman’s music.</p>
						<h5>By Joshua Santiago-Francia</h5>
						<h5>01/01/24</h5>
					</div>
				</div>
				<div class="col_4_story_rev_column width-4">
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
				<!-- The col_3_stories here use a specific style for the review section. They have no category and instead have a margin at the top of the h3.-->
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
			<!--Lower Reviews-->
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
