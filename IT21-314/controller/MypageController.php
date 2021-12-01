<?php session_start(); ?>
<?php
if (isset($_SESSION["account"])) {
  $account = $_SESSION["account"];
} else {
  $_SESSION["message"] = "ログインしてください";
  header('Location: LoginController.php');
  exit();
}

include_once("../view/mypage.php");
?>
