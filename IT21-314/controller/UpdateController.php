<?php session_start(); ?>
<?php
// 入力値チェック
if(empty($_POST["name"])) {
  $_SESSION["message"] = "お名前を入力してください。";
  header("Location: UpdateFormController.php?account_id={$_POST["account_id"]}");
  exit();
}

if(empty($_POST["login_id"])) {
  $_SESSION["message"] = "IDを入力してください。";
  header("Location: UpdateFormController.php?account_id={$_POST["account_id"]}");
  exit();
}

if(empty($_POST["mail"])) {
  $_SESSION["message"] = "メールアドレスを入力してください。";
  header("Location: UpdateFormController.php?account_id={$_POST["account_id"]}");
  exit();
}

if(empty($_POST["password"])) {
  $_SESSION["message"] = "パスワードを入力してください。";
  header("Location: UpdateFormController.php?account_id={$_POST["account_id"]}");
  exit();
}


require_once("../model/db.php");

//$account_old = read_account_by_account_id($_POST["account_id"]);

update_account($_POST["account_id"], $_POST["password"], $_POST["login_id"], $_POST["name"], $_POST["mail"]);

$password = $_POST["password"];
$login_id = $_POST["login_id"];
$name = $_POST["name"];
$mail = $_POST["mail"];

include_once("../view/update.php");
?>
