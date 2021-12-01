<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="none,noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sanctuary | 削除完了</title>
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
    <div class="sub_page">
      <h1>削除しました。</h1>
    <a href="../">トップに戻る</a><br>
    </div>
    <script type="text/javascript">
      footer();
    </script>
  </body>
</html>
