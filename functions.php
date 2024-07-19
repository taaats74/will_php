<?php
// cssとjs読み込ませ
  function theme_file_scripts(){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');
    wp_enqueue_script('loading', get_template_directory_uri() . '/js/loading.js', array(), '20240102', true);
    wp_enqueue_script('loading-child', get_template_directory_uri() . '/js/loading-child.js', array(), '20240102', true);
    wp_enqueue_script('sp-menu', get_template_directory_uri() . '/js/sp-menu.js', array(), '20240102', true);
    wp_enqueue_script('accordion-js', get_template_directory_uri() . '/js/accordion.js', array(), '20240102', true);
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js');
    wp_enqueue_script('rellax-js', 'https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js');
    wp_enqueue_script('pagetop2-js', get_template_directory_uri() . '/js/pagetop2-script.js', array(), '20240717', true);

    // wordpressで使えない命名ルールがある「accordion」は使えなかったので「accordion-js」で記載してる↑

    wp_enqueue_style('style_css', get_stylesheet_uri());
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css');
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
  }
  add_action( 'wp_enqueue_scripts', 'theme_file_scripts' );

  // メニュー登録
  register_nav_menus(array(
    'header-menu-top' => 'Header Menu Top',
    'header-menu-child' => 'Header Menu Child',
    'footer-menu' => 'Footer Menu',
    'sp-menu' => 'SP Menu',
  ));

  // アイキャッチ
  add_theme_support('post-thumbnails');

  // imgショートコード
  function img_directory(){
    return get_template_directory_uri().'/img/';
  }
  add_shortcode('img', 'img_directory');

  // aboutリンクショートコード
  function about_link(){
    return get_page_link(11);
  }
  add_shortcode('about', 'about_link');

  // serviceリンクショートコード
  function service_link(){
    return get_page_link(39);
  }
  add_shortcode('service', 'service_link');

  // worksリンクショートコード
  function works_link(){
    return get_page_link(43);
  }
  add_shortcode('works', 'works_link');

  // conatctリンクショートコード
  function conatct_link(){
    return get_page_link(15);
  }
  add_shortcode('conatct', 'conatct_link');

  // partnerリンクショートコード
  function partner_link(){
    return get_page_link(18);
  }
  add_shortcode('partner', 'partner_link');

  // Webサービスリンクショートコード
  function single_web_link(){
    return get_permalink(92);
  }
  add_shortcode('single_web', 'single_web_link');
  // Webマーケティングリンクショートコード
  function single_mk_link(){
    return get_permalink(95);
  }
  add_shortcode('single_mk', 'single_mk_link');

  // snsサービスリンクショートコード
  function single_sns_link(){
    return get_permalink(89);
  }
  add_shortcode('single_sns', 'single_sns_link');

  // 広告運用代行リンクショートコード
  function single_ad_link(){
    return get_permalink(84);
  }
  add_shortcode('single_ad', 'single_ad_link');

  // graphicリンクショートコード
  function single_graphic_link(){
    return get_permalink(87);
  }
  add_shortcode('single_graphic', 'single_graphic_link');


  // エディタ自動入力の打ち消し
  add_action('init', function() {
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_content', 'wpautop');
  });
  add_filter('tiny_mce_before_init', function($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = ture;
    return $init;
  });

  // すべてのページでビジュアルエディタ無効
function visual_editor_all_disable_script(){
  add_filter('user_can_richedit', 'disable_visual_editor_filter');
}
function disable_visual_editor_filter(){
  return false;
}
add_action( 'load-post.php', 'visual_editor_all_disable_script' );
add_action( 'load-post-new.php', 'visual_editor_all_disable_script' );

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

  // worksの表示件数
  function change_posts_per_page($query) {
  if ( is_admin() || ! $query->is_main_query() )
  return;
  if ( $query->is_post_type_archive('works') ) {
    $query->set( 'posts_per_page', '100' );
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

// 不要な管理画面項目の削除
// add_action( 'admin_menu', 'remove_menus' );
// function remove_menus(){
//   remove_menu_page( 'edit.php' ); //投稿メニュー
//   remove_menu_page( 'tools.php' ); //ツールメニュー
//   remove_menu_page( 'options-general.php' ); //設定メニュー
//   remove_menu_page( 'edit-comments.php' ); //コメントメニュー
// }

// メタ情報を各コンテンツから取得
function get_meta_description() {
  global $post;
  $description = "";
  if ( is_home() ) {
    // ホームでは、ブログの説明文を取得
    $description = get_bloginfo( 'description' );
  }
  elseif ( is_category() ) {
    // カテゴリーページでは、カテゴリーの説明文を取得
    $description = category_description();
  }
  elseif ( is_single() ) {
    if ($post->post_excerpt) {
      // 記事ページでは、記事本文から抜粋を取得
      $description = $post->post_excerpt;
    } else {
      // post_excerpt で取れない時は、自力で記事の冒頭100文字を抜粋して取得
      $description = strip_tags($post->post_content);
      $description = str_replace("\n", "", $description);
      $description = str_replace("\r", "", $description);
      $description = mb_substr($description, 0, 100) . "...";
    }
  } else {
    ;
  }

  return $description;
}

// echo meta description tag
function echo_meta_description_tag() {
  if ( is_home() || is_category() || is_single() ) {
    echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
  }
}

// 溜まったカスタムフィールドの変数を削除する
//オブジェクトを生成
new Paka3CustomFieldDeleteKey;

//クラス定義
class Paka3CustomFieldDeleteKey{
  //コンストラクタ
  function __construct() {
    //###################
    global $wpdb;
    $this->paka3_sql="SELECT meta_key FROM {$wpdb->postmeta}
       GROUP BY meta_key
       HAVING meta_key NOT LIKE %s";
   //###################
    add_action('admin_menu', array($this, 'adminAddMenu'));
   }

  //管理メニューの設定
  function adminAddMenu() {
    add_submenu_page("options-general.php", 'カスタムフィールド削除', 'カスタムフィールドの変数を削除する',  'add_users', 'customField_delete', array($this,'paka3_sql_page'));
  }

  //表示する内容と処理
  function paka3_sql_page() {
    if(isset($_POST['meta_key']) && $_POST['meta_key'] && check_admin_referer('paka3sql')){
       $meta_keys = $_POST['meta_key'];
       foreach($_POST['meta_key'] as $key){
            //カスタムフィールド変数：paka3cssをすべて削除
            //echo $key;
            $a = delete_post_meta_by_key($key);
       }
       //更新メッセージ
      if($a){
       echo '<div class="updated fade"><p><strong>';
       _e('Custom field deleted.');
       echo "</strong></p></div>";
      }else{
        //失敗or値がない
      }
    }
     global $wpdb;
     $paka3_sql=$this->paka3_sql;

    //**管理画面SQL文を実行する（select文のみ）の処理
    $r = $wpdb->get_col(
    $wpdb->prepare($paka3_sql,'\_%')
        );
    $paka3_sql_result =$r;
    $wp_n = wp_nonce_field('paka3sql');

  //表示する内容(HTML)
    echo <<<EOS
       <style type="text/css"><!--
         .paka3form b,

       --></style>

       <div class="wrap">
         <h2>カスタムフィールドのキー（変数）を削除する</h2>
       <form method="post" action="" class="paka3form">
   {$wp_n}
         削除するカスタムフィールドの変数にチェックを入れてください。<br />
         <b>注意：その変数と値が削除されます、一度削除するともとに戻すことはできません</b>
EOS;

       foreach($paka3_sql_result as $key){
         echo <<<EOS
           <ul>
            <li><label>
            <input type="checkbox" name="meta_key[]" value="{$key}" {$checked}/>
            {$key}
            </label></li>
           </ul>
EOS;
}
        echo <<<EOS
         <p class="submit"><input type="submit" name="Submit" class="button-primary" value="削除を実行する" /></p>
        </form>
EOS;

  }
}
?>
