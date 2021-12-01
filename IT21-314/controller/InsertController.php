<?php session_start(); ?>
<?php
// 入力値チェック
if(empty($_POST["name"])) {
  $_SESSION["message"] = "お名前を入力してください。";
  header("Location: InsertFormController.php");
  exit();
}

if(empty($_POST["login_id"])) {
  $_SESSION["message"] = "IDを入力してください。";
  header("Location: InsertFormController.php");
  exit();
}

if(empty($_POST["mail"])) {
  $_SESSION["message"] = "メールアドレスを入力してください。";
  header("Location: InsertFormController.php");
  exit();
}

if(empty($_POST["password"])) {
  $_SESSION["message"] = "パスワードを入力してください。";
  header("Location: InsertFormController.php");
  exit();
}

require_once("../model/db.php");

insert_account($_POST["login_id"], $_POST["password"], $_POST["name"], $_POST["mail"]);

$login_id = $_POST["login_id"];
$name = $_POST["name"];
$mail = $_POST["mail"];

include_once("../view/insert.php");
?>
