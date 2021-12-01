<?php session_start(); ?>
<?php
$message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";
unset($_SESSION["message"]);

require_once("../model/db.php");

$account = read_account_by_account_id($_GET["account_id"]);

include_once("../view/update_form.php");
?>
