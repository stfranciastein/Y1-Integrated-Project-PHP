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
    
    $authenticator = new UserAuthenticator($_POST);
    $authenticated = $authenticator->authenticate();

    if ($authenticated) {
        $_SESSION["flash"] = [
            "message" => "Login successful",
            "type" => "success"
        ];
        redirect("index.php");
    } else {
        $_SESSION["flash"] = [
            "message" => "Invalid email/username or password.",
            "type" => "error"
        ];
        redirect("sign_in.php");
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>
