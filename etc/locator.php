<?php
require_once "config.php";

// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

//Navbar Array
$catNavbar = Category::findAll($options = array('limit' => 6, 'offset' => 0));

//Author Array (For Form)
$authorArray = Author::findAll($options = array());

//Location Array(For Form)
$locationArray = Location::findAll($options = array());

//Main Story section
$mainStory = Story::findByDate($options = array('limit' => 1, 'offset' => 0));

$mainSecStory = Story::findByDate($options = array('limit' => 2, 'offset' => 1));

$mainThirdStory = Story::findByDate($options = array('limit' => 4, 'offset' => 3));

$mainFourthStory = Story::findByDate($options = array('limit' => 4, 'offset' => 7));

//Features Section
$categoryId = 3;
$features = Story::findByCategory($categoryId, $options = array('limit' => 6, 'offset' => 0));

//Review Section
$categoryId = 2;
$reviewMain = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 0));
$reviewSecStory = Story::findByCategory($categoryId, $options = array('limit' => 4, 'offset' => 1));
$reviewThirdStory = Story::findByCategory($categoryId, $options = array('limit' => 4, 'offset' => 5));

//Releases Section
$categoryId = 4;
$releases1 = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 0));
$releases2 = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 1));
$releases3 = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 2));
$releases4 = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 3));

//Podcast Section
$categoryId = 6;
$podcastMain = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 0));
$podcastSecStory = Story::findByCategory($categoryId, $options = array('limit' => 4, 'offset' => 1));

//Read More Section
$readMore = Story::findAll($options = array('limit' => 12, 'offset' => 15));

//Index Section
$allStories = Story::findAll($options = array());

//Video
function getRandomVideo() {
    $videoFiles = array("videos/sign-in-1.mp4", "videos/sign-in-2.mp4", "videos/sign-in-3.mp4", "videos/sign-in-4.mp4");
    $randomVideo = array_rand($videoFiles);
    return $videoFiles[$randomVideo];
};
?>