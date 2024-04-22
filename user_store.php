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
    $validator = new UserFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $user = new User($_POST);
        $user->save();

        $_SESSION["flash"] = [
            "message" => "User added succesfully. You may now log-in.",
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
        redirect("sign_in.php");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>