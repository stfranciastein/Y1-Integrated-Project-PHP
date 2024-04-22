<?php
require_once './etc/config.php';
require_once './etc/global.php';
require_once './etc/locator.php';

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
        throw new Exception("Missing parametre: Story ID");
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if(!$_SESSION['site_admin'] === 1){
        header("Location: sign_in.php");
        exit();
    }

    $story->delete();
    $_SESSION["flash"] = [
        "message" => "Story deleted succesfully",
        "type" => "success"
    ];
    redirect("story_index.php");
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>