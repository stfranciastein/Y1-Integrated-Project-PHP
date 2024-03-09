<?php
require_once "./etc/config.php";
require_once './etc/global.php';

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    $validator = new StoryFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $story = new Story($_POST);
        $story->save();

        $_SESSION["flash"] = [
            "message" => "Story added succesfully",
            "type" => "success"
        ];

        redirect("index.php");
    }
    else {
        $errors = $validator->errors();
        // redirect the browser back to the form
        $_SESSION["form-data"] =  $_POST;
        $_SESSION["form-errors"] = $errors;
        $_SESSION["flash"] = [
            "message" => "Error: Fix the fields below to continue",
            "type" => "warning"
        ];
        redirect("story_create.php");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>