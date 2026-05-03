<?php
// cssとjs読み込ませ
  function theme_file_scripts(){
    // 自己完結型 LP 判定: テーマ汎用 CSS/JS は読み込まない
    // (wp_head / wp_footer は呼ぶが、style.css の `* { color: black }` 等の
    //  汎用ルールが LP の独自スタイルを破壊するのを避ける。
    //  Slim SEO 等プラグイン経由の GA4 / HubSpot 注入は wp_head 経由で動作する)
    $self_contained_lp_templates = array(
      'page-willsupport.php',
      'page-willsupport-v2.php',
      'page-will-support-ec.php',
    );
    $is_self_contained_lp = is_page_template( $self_contained_lp_templates );

    wp_deregister_script('jquery');
    if ( ! $is_self_contained_lp ) {
      wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');
    }

    // 旧ローディング:page-topv2.php 限定 enqueue(Phase 7)
    if ( is_page_template( 'page-topv2.php' ) ) {
      wp_enqueue_script('loading', get_template_directory_uri() . '/js/loading.js', array(), '20240102', true);
      wp_enqueue_script('loading-child', get_template_directory_uri() . '/js/loading-child.js', array(), '20240102', true);
    }

    if ( ! $is_self_contained_lp ) {
      // 新ローディングアニメーション(全ページ enqueue・#splash-v2 不在時は早期 return)
      wp_enqueue_script(
        'loading-v2',
        get_template_directory_uri() . '/js/loading-v2.js',
        array(),
        filemtime( get_template_directory() . '/js/loading-v2.js' ),
        true
      );

      wp_enqueue_script('sp-menu', get_template_directory_uri() . '/js/sp-menu.js', array(), '20240102', true);
      wp_enqueue_script('accordion-js', get_template_directory_uri() . '/js/accordion.js', array(), '20240102', true);
      wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js');
      wp_enqueue_script('rellax-js', 'https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js');
      wp_enqueue_script('pagetop2-js', get_template_directory_uri() . '/js/pagetop2-script.js', array(), '20240717', true);
    }

    // SP ヘッダー / ドロワー JS(.sp-header-v5 / .sp-menu-v5 制御)
    // page-topv3.php(トップ)+ header.php を呼ぶ下層ページで使用。
    // LP 自己完結型・旧トップは除外。要素が無いページでは JS が早期 return するため
    // 残りはすべて全ページ enqueue で問題なし。
    $sp_menu_v5_excluded = array_merge(
      array( 'page-topv2.php' ),
      $self_contained_lp_templates
    );
    if ( ! is_page_template( $sp_menu_v5_excluded ) ) {
      wp_enqueue_script(
        'sp-menu-v5',
        get_template_directory_uri() . '/js/sp-menu-v5.js',
        array(),
        filemtime( get_template_directory() . '/js/sp-menu-v5.js' ),
        true
      );
    }

    // archive-ebooks.php 専用 タブ切替 JS
    if ( is_post_type_archive( 'ebooks' ) ) {
      wp_enqueue_script(
        'ebooks-archive',
        get_template_directory_uri() . '/js/ebooks-archive.js',
        array(),
        filemtime( get_template_directory() . '/js/ebooks-archive.js' ),
        true
      );
    }

    // wordpressで使えない命名ルールがある「accordion」は使えなかったので「accordion-js」で記載してる↑

    if ( ! $is_self_contained_lp ) {
      wp_enqueue_style('style_css', get_stylesheet_uri());
      wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
      wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css');
      wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
    }
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
    return home_url('/about/');
  }
  add_shortcode('about', 'about_link');

  // serviceリンクショートコード
  function service_link(){
    return home_url('/service/');
  }
  add_shortcode('service', 'service_link');

  // worksリンクショートコード
  function works_link(){
    return home_url('/works/');
  }
  add_shortcode('works', 'works_link');

  // conatctリンクショートコード
  function conatct_link(){
    return home_url('/contact/');
  }
  add_shortcode('conatct', 'conatct_link');

  // partnerリンクショートコード
  function partner_link(){
    return home_url('/partner/');
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

  // ebooks アーカイブの表示件数(全件)
  function will_ebooks_archive_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'ebooks' ) ) {
      $query->set( 'posts_per_page', -1 );
    }
  }
  add_action( 'pre_get_posts', 'will_ebooks_archive_query' );

  // ACF: フィールドグループ JSON を acf-json/ から読み込む
  add_filter( 'acf/settings/load_json', function( $paths ) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
  });

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

/**
 * Slim SEO Organization 構造化データ詳細版上書き
 * Phase 2 (2026-05-03 修正版):簡易版 Organization を logo / address / founder /
 * foundingDate / sameAs 入りに上書きする。Service の provider (@id 参照) と
 * 紐づくよう、@id は Slim SEO デフォルトのまま温存する。
 */
add_filter( 'slim_seo_schema_organization', function( $organization ) {
    $organization['url']         = 'https://will-corp.co.jp/';
    $organization['logo']        = 'https://will-corp.co.jp/wp-content/uploads/2025/08/logo_black.png';
    $organization['description'] = 'BtoB中小企業の営業基盤をWebから設計する、福岡のWebマーケティング支援会社。Webサイト制作・MA・コンテンツSEO・SNS運用・グラフィック制作を統合的に提供。';
    $organization['address']     = [
        '@type'           => 'PostalAddress',
        'streetAddress'   => '博多駅前1-23-2 ParkFront博多駅前1丁目5F-B',
        'addressLocality' => '福岡市博多区',
        'addressRegion'   => '福岡県',
        'postalCode'      => '812-0011',
        'addressCountry'  => 'JP',
    ];
    $organization['founder']     = [
        [
            '@type' => 'Person',
            'name'  => '高橋 竜也',
        ],
        [
            '@type' => 'Person',
            'name'  => '岩田 あゆみ',
        ],
    ];
    $organization['foundingDate'] = '2023-11';
    $organization['sameAs']       = [
        'https://www.instagram.com/will_marketing_branding',
        'https://www.youtube.com/@will-btob-marketing',
    ];
    return $organization;
} );
?>
