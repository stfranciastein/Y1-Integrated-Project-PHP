<?php
require_once "./etc/config.php";
require_once "./etc/global.php";
require_once "./etc/locator.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
		<link rel="stylesheet" href="css/mediaqueries.css"> <!-- As of 03/03/24 This contains nothing so far-->
		<!-- Scripts -->
		<title>Add a Story</title>
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
			</ul>
		</div>
	</section>
	<!-- Main Section-->
	<main>
	<div class="container">
		<?php if (array_key_exists("flash", $_SESSION)) {?>
            <p class="flash <?= $_SESSION["flash"]["type"] ?>">
                <?= $_SESSION["flash"]["message"] ?>
            </p>
        <?php unset($_SESSION["flash"]); ?>
		<?php } ?>
		<div class="col_12_form width-12">
				<form action="story_store.php" method="POST">
                    <p>
                        <strong>Headline</strong> 
                        <input type="text" name="headline" value="<?= old("headline")?>">
                        <span class="error"><?= error("headline")?><span>
                    </p>
					<p>
                        <strong>Preview Text</strong> 
                        <input type="text" name="subarticle" value="<?= old("subarticle")?>">
                        <span class="error"><?= error("subarticle")?><span>
                    </p>
					<p>
                        <strong>Article Body</strong> 
                        <input type="text" name="article" value="<?= old("article")?>">
                        <span class="error"><?= error("article")?><span>
                    </p>
					<p>
                        <strong>Image Url</strong> 
                        <input type="text" name="img_url" value="<?= old("img_url")?>">
                        <span class="error"><?= error("img_url")?><span>
                    </p>
					<p>
						<strong>Video Url</strong> **for advanced users only
						<input type="text" name="video_url" value="<?= old("video_url")?>">
                        <span class="error"><?= error("video_url")?><span>
					</p>
                    <p>
                        <strong>Author</strong>
                        <select name="author_id">
                            <option value="">Please choose an author</option>
							<?php foreach ($authorArray as $s) { ?> 
								<option value="<?= $s->id ?>" <?= chosen("author_id", "<?= $s->id ?>") ? "selected" : "" ?>><?= $s->first_name ?> <?= $s->last_name ?></option>
							<?php } ?>
                        </select>
                        <span class="error"><?= error("author_id")?><span>
                    </p>
                    <p>
                        <strong>Category:</strong>
                        <select name="category_id">
                            <option value="">Please choose a category...</option>
							<?php foreach ($catNavbar as $s) { ?> 
								<option value="<?= $s->id ?>" <?= chosen("category_id", "<?= $s->id ?>") ? "selected" : "" ?>><?= $s->name ?></option>
							<?php } ?>
                        </select>
                        <span class="error"><?= error("category_id")?><span>
					</p>
					<p>
                        <strong>Location</strong>
                        <select name="location_id">
                            <option value="">Please choose a location...</option>
							<?php foreach ($locationArray as $s) { ?> 
								<option value="<?= $s->id ?>" <?= chosen("location_id", "<?= $s->id ?>") ? "selected" : "" ?>><?= $s->name ?></option>
							<?php } ?>
                        </select>
                        <span class="error"><?= error("location_id")?><span>
					</p>
					<p>
                        <strong>Written On:</strong> 
                        <input type="date" name="created_at" value="<?= old("created_at") ?>">
                        <span class="error"><?= error("created_at") ?></span>
                    </p>
					<p>
						<input type="hidden" name="updated_at" value="<?= date('Y-m-d H:i:s') ?>">
					</p>
                    <button class="edit" type="submit">Add Story</button> or 
                    <button class="delete" type="submit"><a href="index.php">Cancel</a></button>
                </form>
		</div>
	</div>
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
