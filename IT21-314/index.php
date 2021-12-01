<?php session_start(); ?>
<?php
require_once("model/db.php");

$list = read_images();
?>
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
    <title>Sanctuary</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/reset.css?v=2">
    <link rel="stylesheet" href="css/style.css?v=2" type="text/css">
    <link rel="stylesheet" href="css/response.css?v=2">
    <!--HTMLテンプレート-->
    <script type="text/javascript" src="js/template.js?v=2"></script>
    <!--jQueryプラグイン-->
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <!--ハンバーガーメニュー用CSS&jQueryプラグイン-->
    <link rel="stylesheet" href="css/menu.css?v=2">
    <script src="js/menu.js?v=2"></script>
    <!--モーダルウィンドウ用プラグイン-->
    <link rel="stylesheet" type="text/css" href="css/remodal.css?v=2">
    <link rel="stylesheet" type="text/css" href="css/remodal-default-theme.css?v=2">
    <script type="text/javascript" src="js/remodal.min.js"></script>
    <script type="text/javascript">
    /*スクロール時ヘッダーを不透明化*/
    $(function() {
      var px_change = 150;

      window.addEventListener('scroll', function (e) {
        if ($(window).scrollTop() > px_change ) {
          $(".header_inner").addClass("smaller");
        } else if ($(".header_inner").hasClass("smaller")) {
          $(".header_inner").removeClass("smaller");
        }
      });
    })

    /*スクロール途中で表示されるページトップへのボタン*/
    $(function() {
      var topBtn = $('#page-top');
      topBtn.hide();
      //スクロールが100pxに達したらボタン表示
      $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
          topBtn.fadeIn();
        } else {
          topBtn.fadeOut();
        }
      });
      //スクロールしてトップ
      topBtn.click(function () {
        $('body,html').animate({
          scrollTop: 0
        }, 500);
        return false;
      });
    });

    /*ふわっと表示*/
    $(function(){
      var fade_in = 150;

      $(window).scroll(function(){
         // 変化するポイントまでスクロールしたらクラスを追加
        if ( $(window).scrollTop() > fade_in ) {
          $(".about, .gallery_view").addClass("fadein");
        }
        // 変化するポイント以前であればクラスを削除
        else if ( $(".about, .gallery_view").hasClass("fadein")) {
          $(".about, .gallery_view").removeClass("fadein");
      }
      })

      $('a[href^=#]').click(function() {
        var speed = 0;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
      });
    })
    </script>
  </head>
  <body>
    <a id="jump"></a>
    <header>
      <div class="header_top">
        <?php if (isset($account)) { ?>
          <p><?php print($account["name"]); ?> さんでログイン中</p>
        <?php } else { ?>
          <p>ゲスト</p>
        <?php } ?>
      </div>
      <div class="header_inner">
        <a href="index.php"><img src="images/logo.png" alt=""></a>
        <nav>
          <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#gallery_view">Gallery view</a></li>
            <?php if (isset($account)) { ?>
              <li><a href="controller/MypageController.php">My page</a></li>
              <li><a href="#logout_model">Logout</a></li>
            <?php } else { ?>
              <li><a href="controller/InsertFormController.php">Sign up</a></li>
              <li><a href="controller/LoginController.php">Login</a></li>
            <?php } ?>
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
            <li><a href="#about">About</a></li>
            <li><a href="#gallery_view">Gallery view</a></li>
            <?php if (isset($account)) { ?>
            <li><a href="controller/MypageController.php">My page</a></li>
            <li><a href="#logout_model">Logout</a></li>
            <?php } else { ?>
            <li><a href="controller/InsertFormController.php">Sign up</a></li>
            <li><a href="controller/LoginController.php">Login</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </header>
    <main>
      <div class="page_title">
        <p>Welcome to the my gallery.</p>
      </div>
    </main>
    <a id="about"></a>
    <div class="about">
      <h1 class="title">About</h1>
      <p>東京23区内で撮影した写真をまとめたギャラリーサイトです。<br>
        都心のさまざまな風景を心ゆくまでお楽しみください。<br>
        サイト内の写真は全て無料でご利用いただけます。<br>
      </p>
    </div>
    <a id="gallery_view"></a>
    <div class="gallery_view">
      <h1 class="title">Gallery View</h1>
      <ul class="wrapper grid">
        <?php foreach($list as $row) { ?>
        <li class="item">
          <a href="controller/ContentsController.php?image_id=<?php print($row["image_id"]) ?>">
          <img src="images/img<?php print($row["image_id"]) ?>.jpg">
          <div class="mask"><!--マウスホバー時に文字列を表示-->
            <div class="caption"><!--キャプションテキスト-->
              <?php print($row["title"]) ?>
              <div class="border"></div><!--白線-->
              <span><?php print($row["contents"]) ?></span>
            </div>
          </div>
          </a>
        </li>
        <?php } ?>
      </ul>
    </div>
    <p id="page-top"><a href="jump"><img src="images/top.png" alt="ページトップへのボタン" style="width:60px; height:auto;"></a></p>
    <script type="text/javascript">
      footer();
    </script>

    <!-- ログアウトモーダル -->
    <div class="remodal" id="logout" data-remodal-id="logout_model">
    <button data-remodal-action="close" class="remodal-close"></button>
    <h1></h1>
      <p>本当にログアウトしますか？</p>
      <a href="controller/LogoutController.php">ログアウト</a>
      <a href="" data-remodal-action="close">キャンセル</a>
    <br>
    </div>
  </body>
</html>
