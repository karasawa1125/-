//ロゴ
function logo(){
  var html = "";
  html += '<a href="../"><img src="../images/logo.png" alt=""></a>';

  document.write(html);
}

//ナビ
function nav() {
  var html = "";
  html += '<li><a href="InsertFormController.php">Sign up</a></li>';
  html += '<li><a href="LoginController.php">Login</a></li>';

  document.write(html);
}

function login_nav() {
  var html = "";
  html += '<li><a href="MypageController.php">My page</a></li>';
  html += '<li><a href="../#logout_model">Logout</a></li>';

  document.write(html);
}

//フッター
function footer() {
  var html = "";
  html += '<footer>';
  html += '<small>Copyright by Karasawa All rights reserved.</small>';
  html += '</footer>';

  document.write(html);
}
