<?php
session_start();

unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);
unset($_SESSION["site_admin"]);

$_SESSION["flash"] = [
    "type" => "success",
    "message" => "You have been successfully logged out."
];

header("Location: index.php");
exit();
?>
