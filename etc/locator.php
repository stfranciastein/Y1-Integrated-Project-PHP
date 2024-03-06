<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";


// $stories = Story::findAll($options = array('limit' => 2, 'offset' => 2));

// $authorId = 7;
// $stories = Story::findByAuthor($authorId, $options = array('limit' => 3, 'offset' => 2));

$catNavbar = Category::findAll($options = array('limit' => 6, 'offset' => 0));

$mainStory = Story::findByDate($options = array('limit' => 1, 'offset' => 0));

$mainSecStory = Story::findByDate($options = array('limit' => 2, 'offset' => 1));

$mainThirdStory = Story::findByDate($options = array('limit' => 4, 'offset' => 3));

$mainFourthStory = Story::findByDate($options = array('limit' => 4, 'offset' => 7));

$categoryID = null;

$categoryId = 3;

$features = Story::findByCategory($categoryId, $options = array('limit' => 6, 'offset' => 0));


$categoryId = 2;
$reviewMain = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 0));

$reviewSecStory = Story::findByCategory($categoryID, $options = array('limit' => 4, 'offset' => 1));

$reviewThirdStory = Story::findByCategory($categoryID, $options = array('limit' => 4, 'offset' => 5));

// $locationId = 8;
// $stories = Story::findByLocation($locationId, $options = array('limit' => 4, 'offset' => 0));

?>