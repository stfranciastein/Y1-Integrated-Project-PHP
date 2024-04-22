<?php
require_once "config.php";

//Navbar Array
$catNavbar = Category::findAll($options = array('limit' => 6, 'offset' => 0));

//Author Array (For Form)
$authorArray = Author::findAll($options = array());

//Location Array(For Form)
$locationArray = Location::findAll($options = array());

//Main Story section
$mainStory = Story::findByDate($options = array('limit' => 12, 'offset' => 0));

//Features Section
$categoryId = 3;
$features = Story::findByCategory($categoryId, $options = array('limit' => 6, 'offset' => 0));

//Review Section
$categoryId = 2;
$reviewMain = Story::findByCategory($categoryId, $options = array('limit' => 9, 'offset' => 0));

//Releases Section
$categoryId = 4;
$releases = Story::findByCategory($categoryId, $options = array('limit' => 4, 'offset' => 0));

//Podcast Section
$categoryId = 6;
$podcastMain = Story::findByCategory($categoryId, $options = array('limit' => 1, 'offset' => 0));
$podcastSecStory = Story::findByCategory($categoryId, $options = array('limit' => 4, 'offset' => 1));

//Read More Section
$readMore = Story::findAll($options = array('limit' => 12, 'offset' => 15));

//Index Section
$allStories = Story::findAll($options = array());

function searchForPNG($folderPath) {
    $pngFiles = array();

    // Open the directory
    if ($handle = opendir($folderPath)) {
        // Loop through the directory
        while (false !== ($file = readdir($handle))) {
            // Check if the file is a PNG file
            if (is_file($folderPath . "/" . $file) && strtolower(pathinfo($file, PATHINFO_EXTENSION)) == "png") {
                // Add the file to the array
                $pngFiles[] = $folderPath . "/" . $file;
            }
        }
        closedir($handle);
    }

    return $pngFiles;
}

// Example usage:
$folderPath = "images/assets/fógre";
$pngFiles = searchForPNG($folderPath);

// Output the found PNG files
echo "Found PNG files:<br>";
foreach ($pngFiles as $file) {
    echo $file . "<br>";
}

//Video Randomizer for sign in
function getRandomVideo() {
    $videoFolder = "videos/";
    $videoFiles = glob($videoFolder . "*.mp4"); // Get all .mp4 files in the folder
    $randomVideo = array_rand($videoFiles);
    return $videoFiles[$randomVideo];
}

?>