<?php session_start(); ?>
<?php
$message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
unset($_SESSION["message"]);

include_once("../view/insert_form.php");
?>