"use strict";
// {
//   $(window).on('load', function () {
//     $('#splash-logo').fadeIn(1000);
//     $("#splash-logo").delay(1800).fadeOut('slow');//ロゴを1.2秒でフェードアウトする記述
//     // $("#splash-logo").delay(1000).fadeOut('slow');//ロゴを1.2秒でフェードアウトする記述

//     //=====ここからローディングエリア（splashエリア）を1.5秒でフェードアウトした後に動かしたいJSをまとめる
//     $("#splash").delay(1800).fadeOut('slow',function(){//ローディングエリア（splashエリア）を1.5秒でフェードアウトする記述

//         $('body').addClass('appear');//フェードアウト後bodyにappearクラス付与

//     });
//     //=====ここまでローディングエリア（splashエリア）を1.5秒でフェードアウトした後に動かしたいJSをまとめる

//     //=====ここから背景が伸びた後に動かしたいJSをまとめたい場合は
//     $('.splashbg').on('animationend', function() {
//         //この中に動かしたいJSを記載
//     });
//     //=====ここまで背景が伸びた後に動かしたいJSをまとめる
//   });
// }

$(function () {
  // ロゴをすぐに表示
  $('#splash-logo').fadeIn(1000);

  // ロゴを1.8秒後にフェードアウト
  $("#splash-logo").delay(1800).fadeOut('slow');

  // ローディングエリア（splash）を1.8秒後にフェードアウトし、bodyにappearクラスを付与
  $("#splash").delay(1800).fadeOut('slow', function () {
    $('body').addClass('appear');
  });

  // splashbgアニメーションが終わったら動かすJS（必要があれば中に記述）
  $('.splashbg').on('animationend', function () {
    // この中に動かしたい処理を記述
  });
});
