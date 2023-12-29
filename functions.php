<?php
// cssとjs読み込ませ
  // function theme_file_scripts(){
  //   wp_deregister_script('jquery');
  //   wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js');
  //   wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '202211108', true);

  //   wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
  //   wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css');
  // }
  // add_action( 'wp_enqueue_scripts', 'theme_file_scripts' );

  // メニュー登録
  register_nav_menus(array(
    'header-menu' => 'Header Menu',
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

  // eventの表示件数
//   function change_posts_per_page($query) {
//   if ( is_admin() || ! $query->is_main_query() )
//   return;
//   if ( $query->is_post_type_archive('event') ) {
//     $query->set( 'posts_per_page', '30' );
//   }
// }
// add_action( 'pre_get_posts', 'change_posts_per_page' );

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

/*********************
OGPタグ/Twitterカード設定を出力
*********************/
function my_meta_ogp() {
  if( is_front_page() || is_home() || is_singular() ){
    global $post;
    $ogp_title = '';
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    if( is_singular() ) { //記事＆固定ページ
       setup_postdata($post);
       $ogp_title = $post->post_title;
       $ogp_descr = mb_substr(get_the_excerpt(), 0, 100);
       $ogp_url = get_permalink();
       wp_reset_postdata();
    } elseif ( is_front_page() || is_home() ) { //トップページ
       $ogp_title = get_bloginfo('name');
       $ogp_descr = get_bloginfo('description');
       $ogp_url = home_url();
    }

    //og:type
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    //og:image
    if ( is_singular() && has_post_thumbnail() ) {
       $ps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
       $ogp_img = $ps_thumb[0];
    } else {
     $ogp_img = 'https://louiscasteljapan.com/wp-content/themes/LouisCastel/img/no-img.png';
    }

    //出力するOGPタグをまとめる
    $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
    $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
    $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
    $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
    $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
    $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    $insert .= '<meta name="twitter:site" content="@TaaatsWebDesign" />' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";

    echo $insert;
  }
} //END my_meta_ogp

add_action('wp_head','my_meta_ogp');//headにOGPを出力
?>
