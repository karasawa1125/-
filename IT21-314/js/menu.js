$(function(){
  $("a.btn").on("click",function(){
    $("span.line_icon").toggleClass("closebtn");

    //ボタンクリックでdivタグのclassを切り替え
    $("div.screen").toggleClass("screen_on");

    //divタグのclassが切り替わった時の処理
    if($("div").hasClass("screen_on")){
      $("div.screen_on").fadeIn(500);
    } else {
      $("div.screen").fadeOut(500);
    }

    return false;
  })
})
