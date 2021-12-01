<?php session_start(); ?>
<?php
$message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
unset($_SESSION["message"]);

$login_id = isset($_COOKIE["login_id"]) ? $_COOKIE["login_id"] : "";

include_once("../view/login.php");
?>
