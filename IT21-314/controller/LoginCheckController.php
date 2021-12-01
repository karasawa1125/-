<?php session_start(); ?>
<?php
require_once("../model/db.php");

unset($_SESSION["name"]);
setcookie("login_id", $_POST["login_id"], time()+180);

$account = read_account($_POST["login_id"], $_POST["password"]);
if($account) {
  $_SESSION["account"] = $account;
  header('Location: ../');
  exit();
} else {
  $_SESSION["message"] = "IDまたはパスワードが違います。";
  header('Location: LoginController.php');
  exit();
}
?>
