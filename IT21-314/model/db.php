<?php
const HOST = "localhost";
const DBNAME = "hew2020_00851";
const USER = "hew2020_00851";
const PASS = "";

// DB接続
function db_connect() {
  try {
    // MySQLを使ってDBに接続する
    $pdo = new PDO(
      'mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8',
      USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    die("接続エラー：".$e->getMessage());
  }

  return $pdo;
}

// 画像読み込み
function read_images() {
  $pdo = db_connect();  // DB接続

  $sql = "SELECT image_id, title, contents, shootingdate FROM image";
  $records = $pdo->query($sql); // SQL発行

  $pdo = null;  // DB切断

  $list = array();
  while($row = $records->fetch()) {
    $list[] = $row;
  }

  return $list;
}

// 画像IDを指定して読み込み
function read_image_by_image_id($image_id) {
  $pdo = db_connect();  // DB接続

  $sql = "SELECT image_id, title, contents, shootingdate FROM image WHERE image_id = :image_id";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue("image_id", $image_id);
  $stmh->execute();

  $pdo = null;  // DB切断

  $row = $stmh->fetch(PDO::FETCH_ASSOC);

  return $row;
}

// ログイン操作
function read_account($login_id, $password) {
  $pdo = db_connect();

  // DB操作を行う
  $sql = "SELECT account_id, login_id, name, mail FROM accounts"
    ." WHERE login_id = '{$login_id}' AND"
    ." password = '{$password}'";
  $records = $pdo->query($sql);

  // DBを切断する
  $pdo = null;

  $row = $records->fetch();
  return $row;
}

// アカウントIDを指定してアカウント読み込み
function read_account_by_account_id($account_id) {
  $pdo = db_connect();  // DB接続

  $sql = "SELECT account_id, login_id, password, name, mail FROM accounts WHERE account_id = {$account_id}";
  $records = $pdo->query($sql); // SQL発行

  $pdo = null;  // DB切断

  $account = $records->fetch();

  return $account;
}

// アカウント追加
function insert_account($login_id, $password, $name, $mail) {
  $pdo = db_connect();

  $sql = "INSERT INTO accounts (login_id, password, name, mail)"
    ." VALUES ('{$login_id}', '{$password}', '{$name}', '{$mail}')";
  $count = $pdo->exec($sql);

  $pdo = null;

  return $count;
}

// アカウント読み込み
function read_accounts() {
  $pdo = db_connect();  // DB接続

  $sql = "SELECT account_id, login_id, password, name, mail FROM accounts";
  $records = $pdo->query($sql); // SQL発行

  $pdo = null;  // DB切断

  $list = array();
  while($row = $records->fetch()) {
    $list[] = $row;
  }

  return $list;
}

// アカウント変更
function update_account($account_id, $password, $login_id, $name, $mail) {
  $pdo = db_connect();

  $sql = "UPDATE accounts SET"
    ." password = '{$password}',"
    ." login_id = '{$login_id}',"
    ." name = '{$name}',"
    ." mail = '{$mail}'"
    ." WHERE account_id = {$account_id}";
  $count = $pdo->exec($sql);

  $pdo = null;

  return $count;
}

// アカウント削除
function delete_account($account_id) {
  $pdo = db_connect();

  $sql = "DELETE FROM accounts WHERE account_id = :account_id";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue("account_id", $account_id);
  $stmh->execute();
  $count = $stmh->rowCount();

  $pdo = null;

  return $count;
}
?>
