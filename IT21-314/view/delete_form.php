<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="none,noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sanctuary | アカウント削除</title>
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
      <h1>アカウント削除</h1>
      <p>以下のアカウントを削除します。よろしいですか？</p>
      <ul>
        <li>ログインID：<?php print($account["login_id"]); ?></li>
        <li>お名前：<?php print($account["name"]); ?><br></li>
        <li>メールアドレス：<?php print($account["mail"]); ?></li>
        <li>パスワード：表示できません。</li>
      </ul>
      <form action="../controller/DeleteController.php" method="post">
        <input type="submit" value="削除">
        <input type="hidden" name="account_id" value="<?php print($account["account_id"]); ?>">
        <input type="hidden" name="login_id" value="<?php print($account["login_id"]); ?>">
        <input type="hidden" name="name" value="<?php print($account["name"]); ?>">
        <input type="hidden" name="mail" value="<?php print($account["mail"]); ?>">
        <input type="hidden" name="password" value="<?php print($account["password"]); ?>">
      </form>
      <a href="MypageController.php">戻る</a>
    </div>
    <script type="text/javascript">
      footer();
    </script>
  </body>
</html>
