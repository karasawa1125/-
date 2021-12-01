<?php session_start(); ?>
<?php unset($_SESSION["account"]); ?>
<?php
require_once("../model/db.php");

delete_account($_POST["account_id"]);

include_once("../view/delete.php");
?>
