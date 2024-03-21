<?php
require_once "./etc/config.php";
require_once "./etc/global.php";
require_once "./etc/locator.php";

try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception ("Invalid Request Method"); //if you try to access it without using get
    }

    if (array_key_exists("id", $_GET)) {
        $id = $_GET["id"];
        $story = Story::findById($id);
        if ($story === null) {
            throw new Exception("Story not found"); //looks for the story
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
		<link rel="stylesheet" href="css/crud.css"/>
		<link rel="stylesheet" href="css/mediaqueries.css"> <!-- As of 03/03/24 This contains nothing so far-->
		<!-- Scripts -->
		<title>Editing: <?= $story->headline ?></title>
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
	<section class="sec_parent">
		<div class="container">
			<div class="col_12_flashMessage width-12">
				<?php if (array_key_exists("flash", $_SESSION)) {?>
					<p class="flash <?= $_SESSION["flash"]["type"] ?>"><?= $_SESSION["flash"]["message"] ?></p>
					<?php unset($_SESSION["flash"]); ?>
				<?php } ?>
			</div>
			<div class="col_12_form width-8">
				<h2>Editing: <?= $story->headline ?></h2>
					<form action="story_store.php" method="POST">
						<input type="hidden" name="id" value="<?= $story->id ?>">
						<ul>
							<li><p><strong>Headline:</strong></p></li>
							<li><textarea type="text" name="headline" class="headline_field"><?php echo "$story->headline" ?></textarea></li>
							<li><span class="error"><?= error("headline")?><span></li>
							
							<li><p><strong>Preview Text:</strong></p></li> 
							<li><textarea type="text" name="subarticle" class="preview_field"><?php echo "$story->subarticle" ?></textarea></li>
							<li><span class="error"><?php echo error("subarticle") ?></span></li>


							<li><p><strong>Article Body:</strong></p></li> 
							<textarea type="text" name="article" class="article_field"><?php echo "$story->article" ?></textarea>
							<li><span class="error"><?= error("article")?><span></li>

							<li><p><strong>Image Url:</strong></p></li> 
							<li><input type="text" name="img_url" class="etc_field" value="<?= old("img_url", $story->img_url)?>">
							<li><span class="error"><?= error("img_url")?><span></li>

							<li><p><strong>Video Url:</strong></p></li>
							<li><input type="text" name="video_url" value="<?= old("video_url", $story->video_url)?>" class="etc_field">
							<li><span class="error"><?= error("video_url")?><span></li>

							<li><p><strong>Author:</strong></p></li>
							<li><select name="author_id" class="etc_field">
								<option value="">Please choose an author</option>
								<?php foreach ($authorArray as $s) { ?> 
									<option value="<?= $s->id ?>" <?= chosen("author_id", $s->id) ? "selected" : "" ?>><?= $s->first_name ?> <?= $s->last_name ?></option>
								<?php } ?>
							</select></li>
							<li><span class="error"><?= error("author_id")?><span></li>

							<li><p><strong>Category:</strong></li>
							<li><select name="category_id" class="etc_field">
								<option value="">Please choose a category...</option>
								<?php foreach ($catNavbar as $s) { ?> 
									<option value="<?= $s->id ?>" <?= chosen("category_id", $s->id) ? "selected" : "" ?>><?= $s->name ?></option>
								<?php } ?>
							</select></li>
							<li><span class="error"><?= error("category_id")?><span></li>

							<li><strong>Location:</strong></li>
							<li><select name="location_id" class="etc_field">
								<option value="">Please choose a location...</option>
								<?php foreach ($locationArray as $s) { ?> 
									<option value="<?= $s->id ?>" <?= chosen("location_id", $s->id) ? "selected" : "" ?>><?= $s->name ?></option>
								<?php } ?>
							</select></li>
							<li><span class="error"><?= error("location_id")?><span></li>
							
							<input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s') ?>">
							
							<li><strong>Updated On:</strong></li> 
							<li><input type="date" name="updated_at" value="<?= old("updated_at") ?>" class="etc_field"></li>
							<li><span class="error"><?= error("updated_at") ?></span></li>

						</ul>
						<button class="allbutton greenbutton" type="submit">Submit</button> or 
						<button class="allbutton deletebutton"><a href="story_index.php">Cancel</a></button>
					</form>
			</div>
			<div class="col_12_form_guidelines sticky2 width-4">
				<h5>Guidelines</h5>
				<ol>
					<li>Headline must be between 10-70 characters</li>
					<li>Preview text must be between 10-255 characters</li>
					<li>Article must contain at least 255 characters</li>
					<li>Images must either specify an outside link or point to specific file within the database.</li>
					<li>Videos (if applicable) must use the embed link, not a direct link. Otherwise, leave blank.</li>
					<li>Date must be no greater than the current time</li>
				</ol>
				<h5>Terms and Conditions</h5>
				<p>By submitting a story, you agree to adhere to The Harper's editorial guidelines and standards.</p>
				<p>Your submission should be original and not previously published elsewhere. Plagiarism is strictly prohibited.</p>
				<p>Additionally, you grant The Harper the right to edit and publish your submission on our website and any other platforms affiliated with The Harper. This includes but is not limited to social media channels, newsletters, and promotional materials.</p>
				<p>You also acknowledge that you are the rightful owner of the content submitted and that it does not infringe upon any copyright or intellectual property rights of third parties. You agree to indemnify and hold harmless The Harper and its affiliates from any claims arising out of the publication of your submission.</p>
				<p>Furthermore, you understand that submitting a story does not guarantee its publication. The Harper reserves the right to accept or reject submissions at our discretion, without providing justification.</p>
				<p>When you press submit, you affirm that you have read and understood these terms and conditions, and you consent to abide by them.</p>
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
