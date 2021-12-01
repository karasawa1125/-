<?php session_start(); ?>
<?php
if (isset($_SESSION["account"])) {
  $account = $_SESSION["account"];
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="none,noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sanctuary | 詳細</title>
    <link rel="shortcut icon" href="../images/favicon.png">
    <link rel="stylesheet" href="../css/reset.css?v=2">
    <link rel="stylesheet" href="../css/style.css?v=2" type="text/css">
    <link rel="stylesheet" href="../css/response.css?v=2">
    <!--HTMLテンプレート-->
    <script type="text/javascript" src="../js/template.js?v=2"></script>
    <!--jQueryプラグイン-->
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery-latest.min.js"></script>
    <!--ハンバーガーメニュー用CSS&jQueryプラグイン-->
    <link rel="stylesheet" href="../css/menu.css?v=2">
    <script src="../js/menu.js?v=2"></script>
  </head>
  <body>
    <header>
      <div class="header_top">
        <?php if (isset($account)) { ?>
          <p><?php print($account["name"]); ?> さんでログイン中</p>
        <?php } else { ?>
          <p>ゲスト</p>
        <?php } ?>
      </div>
      <div class="header_inner" style="background-color:#000;">
        <a href="../"><img src="../images/logo.png" alt=""></a>
        <nav>
          <ul>
            <li><a href="../#about">About</a></li>
            <li><a href="../#gallery_view">Gallery view</a></li>
            <script type="text/javascript">
            <?php if (isset($account)) { ?>
              login_nav();
            <?php } else { ?>
              nav();
            <?php } ?>
            </script>
          </ul>
        </nav>

        <!--ハンバーガーメニュー-->
        <!--三本線ボタン-->
        <div id="menu">
          <a href="#" class="btn">
            <span class="line_icon"></span>
          </a>
        </div>
        <!--フェードインする全画面メニュー-->
        <div class="screen">
          <ul id="screen_menu">
            <li><a href="../#about">About</a></li>
            <li><a href="../#gallery_view">Gallery view</a></li>
            <script type="text/javascript">
            <?php if (isset($account)) { ?>
              login_nav();
            <?php } else { ?>
              nav();
            <?php } ?>
            </script>
          </ul>
        </div>
      </div>
    </header>
    <section class="details">
      <img src="../images/img<?php print($image["image_id"]); ?>.jpg" alt="" class="details-img" oncontextmenu="return false;">
      <div class="details-box">
        <h2><?php print($image["title"]); ?></h2>
        <p>撮影地：<?php print($image["contents"]); ?></p>
        <p>撮影日：<?php print($image["shootingdate"]); ?></p>
        <div class="dl-box">
          <?php if (isset($account)) { ?>
          <p>写真をダウンロードする</p>
          <div class="dl-button">
            <a href="../images/dl/320×240/img<?php print($image["image_id"]); ?>.jpg" target="_blank">小 : 320 × 240（px）</a>
          </div>
          <div class="dl-button">
            <a href="../images/dl/640×480/img<?php print($image["image_id"]); ?>.jpg" target="_blank">中 : 640 × 480（px）</a>
          </div>
          <div class="dl-button">
            <a href="../images/img<?php print($image["image_id"]); ?>.jpg" target="_blank">大 : 1632 × 1224（px）</a>
          </div>
          <p style="font-size:14px;">※画像を開いた後、右クリックでダウンロードしてください。</p>
          <?php } else { ?>
          <p style="font-size:14px;">※ログインすることで画像が利用可能になります。</p>
          <div class="dl-button">
            <a href="../controller/InsertFormController.php">新規登録</a>
          </div>
          <div class="dl-button">
            <a href="../controller/LoginController.php">ログイン</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <div class="topbutton">
      <a href="../" style="text-align:center;">トップへ戻る</a>
    </div>
    <script type="text/javascript">
      footer();
    </script>
  </body>
</html>
