"use strict";
{
  $(window).on('load', function () {
    $('#splash-logo').fadeIn(1000);
    $("#splash-logo").delay(1800).fadeOut('slow');//ロゴを1.2秒でフェードアウトする記述
    // $("#splash-logo").delay(1000).fadeOut('slow');//ロゴを1.2秒でフェードアウトする記述

    //=====ここからローディングエリア（splashエリア）を1.5秒でフェードアウトした後に動かしたいJSをまとめる
    $("#splash").delay(1800).fadeOut('slow',function(){//ローディングエリア（splashエリア）を1.5秒でフェードアウトする記述

        $('body').addClass('appear');//フェードアウト後bodyにappearクラス付与

    });
    //=====ここまでローディングエリア（splashエリア）を1.5秒でフェードアウトした後に動かしたいJSをまとめる

    //=====ここから背景が伸びた後に動かしたいJSをまとめたい場合は
    $('.splashbg').on('animationend', function() {
        //この中に動かしたいJSを記載
    });
    //=====ここまで背景が伸びた後に動かしたいJSをまとめる
  });

  $(function(){
  var flg = null;
  var check_access = function () {
    // ★sessionStorageの値を判定
    if (sessionStorage.getItem('access_flg')) {
      // 2回目以降
      flg = 1;
    } else {
      // 1回目
      sessionStorage.setItem('access_flg', true);
      flg = 0
    }
    return flg;
  }

  var $i = check_access();
  if($i == 0){
    // 1回目アクセスの処理
  }else{
    // 2回目アクセスの処理
  }
 })
}
