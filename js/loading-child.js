"use strict";
// {
//   $(window).on('load', function () {
//     $("#splash-child").delay(0).fadeOut('slow',function(){//ローディングエリア（splashエリア）を1.5秒でフェードアウトする記述

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
  // ローディングエリア（splash-child）をすぐにフェードアウト
  $("#splash-child").delay(0).fadeOut('slow', function () {
    // フェードアウト後にbodyにappearクラスを付与
    $('body').addClass('appear');
  });

  // splashbgのアニメーションが終わったら発火する処理（任意）
  $('.splashbg').on('animationend', function () {
    // この中に動かしたい処理を記述
  });
});
