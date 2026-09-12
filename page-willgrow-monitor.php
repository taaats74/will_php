<?php
/*
  Template Name: ウィルグロー 先行導入企業募集ページ
  Template Post Type: page
*/

/* ============================================================
   ウィルグロー 先行導入企業募集ページ（スラッグ想定：/willgrow-monitor/）

   フォーム営業・商談フォロー・営業メール専用の受け皿。検索流入は狙わない。
   デザインは既存の ウィルグローLP v2（page-willgrow-v2.php / will-grow-v2-assets）に揃える。
   v2 の style.css をそのまま読み込み、同じセクションは同じコンポーネント（wg2-）と
   同じ画像を使う。本ページ固有のパーツだけを will-grow-monitor-assets（wgm-）で足す。

   ▼ 運用で変えるのはここだけ
     $wgm_noindex … 検索エンジンへの露出（既定：noindex,nofollow）

   先行導入企業募集は常設。期間限定の表現は使わず「事例掲載にご協力いただける企業様に限り」で条件を示す。
   ============================================================ */

$wgm_noindex = true;

/* title / description / OGP は固定ページの編集画面「SEO設定」で入力する。
   本テンプレートでは出力しない。設定する値：
     title       : ウィルグロー 先行導入企業募集｜BtoBマーケティング支援を事例掲載企業限定・6ヶ月
     description : 事例掲載にご協力いただける企業様限定で、BtoBマーケティング支援「ウィルグロー」の先行導入企業を募集。問い合わせプランを月額10万円（通常30万円）、商談プランを月額30万円（通常50万円）で、6ヶ月間ご提供します。まずは無料診断から。
     OGP         : title・description は上記と同じ。og:image はテーマ既定（既定画像がなければ twitter:card を summary に） */

// --- リンク先 ---
// 主CTA：無料診断（内部リンクのため UTM は付けない）
$wgm_diagnosis_url = home_url( '/diagnosis/' );
// 通常LP：08「先行導入期間にやること」の末尾1箇所のみ
$wgm_willgrow_url  = home_url( '/willgrow/' );
// ウィルサポ：07 条件の「別途お見積り」からサイトリニューアルの受け皿として案内する
$wgm_willsupport_url = home_url( '/willsupport/' );
// 無料相談：ページ下部の HubSpot フォームへ（通常LPと同じく同一ページ内アンカー）
$wgm_consult_url   = '#wgm-contact';

/* robots は WordPress コアの wp_robots 経由で出す。
   テーマの SEO 機能（inc/seo/meta.php）も同じフィルターを使うため、meta タグが二重に出ない */
if ( $wgm_noindex ) {
    add_filter( 'wp_robots', function( $robots ) {
        unset( $robots['index'], $robots['follow'], $robots['max-image-preview'], $robots['max-snippet'], $robots['max-video-preview'] );
        $robots['noindex']  = true;
        $robots['nofollow'] = true;
        return $robots;
    }, 99 );
}

/**
 * アイコン（v2 の wg2_icon と同じ Lucide 系ストロークアイコン）
 * v2 テンプレートと同じ関数名は使わず、必要なものだけを持つ
 */
if ( ! function_exists( 'wgm_icon' ) ) {
    function wgm_icon( $name ) {
        $paths = array(
            'arrow-right' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
            'check'       => '<path d="M20 6 9 17l-5-5"/>',
            'list-checks' => '<path d="m3 17 2 2 4-4"/><path d="m3 7 2 2 4-4"/><path d="M13 6h8"/><path d="M13 12h8"/><path d="M13 18h8"/>',
            'trending-up' => '<path d="M22 7 13.5 15.5 8.5 10.5 2 17"/><path d="M16 7h6v6"/>',
            'target'      => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
            'refresh'     => '<path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/>',
            'wallet'      => '<path d="M19 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0 0 4h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5"/><path d="M17 12h.01"/>',
            'bar-chart'   => '<path d="M3 3v18h18"/><rect width="4" height="7" x="7" y="10" rx="1"/><rect width="4" height="12" x="15" y="5" rx="1"/>',
            'mail'        => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
            'search'      => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
            'clipboard'   => '<rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/>',
        );

        if ( ! isset( $paths[ $name ] ) ) {
            return '';
        }

        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- robots（noindex,nofollow）／title／description／OGP は wp_head() から出力
       ＝ テーマの SEO 機能（inc/seo/）に任せている。canonical・robots も自動出力するため、
       このファイルで meta を書くと二重出力になる。
       固定ページ側では「ヘッダー・フッターあり、サイドバーなし」の想定
       （本テンプレートはヘッダー・フッターを自前で出力し、サイドバーは持たない）。 -->

  <link rel="preconnect" href="https://js-na2.hsforms.net" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- ウィルグローLP v2 のスタイルをそのまま使う（同じセクションは同じ見た目にする） -->
  <link rel="stylesheet" href="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/style.css' ) ); ?>">
  <!-- 本ページ固有のパーツ（FVの条件カード・体制図・条件表・募集終了帯 など） -->
  <link rel="stylesheet" href="<?php echo esc_url( will_asset_url( 'will-grow-monitor-assets/style.css' ) ); ?>">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- ============ ヘッダー（v2 と同じ。ナビ4項目＋無料診断ボタン。1024px 未満はハンバーガー） ============ -->
  <header class="wg2-header wgm-header">
    <div class="wg2-container wg2-header__inner">
      <span class="wg2-header__logo">
        <img class="wg2-header__logo-img" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/header-logo.webp' ) ); ?>" alt="ウィルグロー" width="495" height="107" decoding="async">
      </span>

      <nav class="wg2-header__nav" aria-label="主要導線">
        <ul class="wg2-header__links">
          <li><a href="#wgm-service" class="wg2-header__link">ウィルグローとは</a></li>
          <li><a href="#wgm-price" class="wg2-header__link">先行導入料金</a></li>
          <li><a href="#wgm-terms" class="wg2-header__link">先行導入条件</a></li>
          <li><a href="#wgm-faq" class="wg2-header__link">よくあるご質問</a></li>
          <li><a href="<?php echo esc_url( $wgm_consult_url ); ?>" class="wg2-header__link wg2-header__link--cta" data-cta-type="consult" data-cta-position="header">無料相談</a></li>
          <li><a href="<?php echo esc_url( $wgm_diagnosis_url ); ?>" target="_blank" rel="noopener noreferrer" class="wg2-header__link wg2-header__link--cta" data-cta-type="diagnosis" data-cta-position="header">無料診断</a></li>
        </ul>
      </nav>

      <button class="wg2-burger" id="wgmBurger" type="button" aria-label="メニューを開く" aria-expanded="false" aria-controls="wgmDrawer">
        <span></span><span></span><span></span>
      </button>
    </div>

    <nav class="wg2-drawer" id="wgmDrawer" aria-label="モバイルメニュー">
      <ul class="wg2-drawer__links">
        <li><a href="#wgm-service">ウィルグローとは</a></li>
        <li><a href="#wgm-price">先行導入料金</a></li>
        <li><a href="#wgm-terms">先行導入条件</a></li>
        <li><a href="#wgm-faq">よくあるご質問</a></li>
      </ul>
      <div class="wg2-drawer__actions">
        <a href="<?php echo esc_url( $wgm_consult_url ); ?>" class="wg2-btn wg2-btn--ghost wg2-btn--block" data-cta-type="consult" data-cta-position="drawer">無料相談<?php echo wgm_icon( 'arrow-right' ); ?></a>
        <a href="<?php echo esc_url( $wgm_diagnosis_url ); ?>" target="_blank" rel="noopener noreferrer" class="wg2-btn wg2-btn--primary wg2-btn--block" data-cta-type="diagnosis" data-cta-position="drawer">無料診断<?php echo wgm_icon( 'arrow-right' ); ?></a>
      </div>
    </nav>
  </header>

  <main>

    <!-- ============ 01 ファーストビュー（ウィルグローLP v2 の FV に、先行導入企業募集の見出しを上に足したもの） ============ -->
    <section class="wg2-hero wgm-hero" id="wgm-fv">

      <!-- 先行導入企業募集バナー（見出し＋主CTA）
           横幅いっぱいに敷くため、あえて .wg2-container の外に出している。
           中身の折り返し位置だけ .wgm-banner__inner でコンテナ幅に合わせる -->
      <div class="wgm-banner">
        <div class="wgm-banner__inner">
          <div class="wgm-banner__body">
            <h1 class="wgm-banner__title" data-section="wgm-fv">先行導入企業募集</h1>
            <p class="wgm-banner__sub">新サービス立ち上げ、事例構築期間につき、<br class="wg2-br-pc">3社限定でサービスを特別料金にてご提供いたします。</p>
          </div>

          <div class="wgm-banner__actions">
            <div class="wgm-banner__btns">
              <a class="wg2-btn wg2-btn--primary" id="wgmFvCta" href="<?php echo esc_url( $wgm_diagnosis_url ); ?>" target="_blank" rel="noopener noreferrer" data-cta-type="diagnosis" data-cta-position="fv">まずは無料診断を受ける<span class="wgm-btn__sub">（約1分）</span><?php echo wgm_icon( 'arrow-right' ); ?></a>
              <a class="wg2-btn wg2-btn--ghost" href="<?php echo esc_url( $wgm_consult_url ); ?>" data-cta-type="consult" data-cta-position="fv">無料相談を申し込む<?php echo wgm_icon( 'arrow-right' ); ?></a>
            </div>
            <p class="wg2-btn-note">先行導入への参加は、診断結果をご覧いただいたうえでご検討ください。</p>
          </div>
        </div>
      </div>

      <div class="wg2-container">

        <!-- 以下は v2 の FV と同じ -->
        <div class="wg2-hero__grid">
          <div class="wg2-hero__content">
            <p class="wg2-hero__eyebrow">BtoBマーケティング伴走支援</p>

            <p class="wg2-hero__logotype">
              <img class="wg2-hero__logotype-img" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/hero-logotype.webp' ) ); ?>" alt="ウィルグロー" width="1130" height="240" fetchpriority="high" decoding="async">
              <span class="wg2-vh">｜BtoB企業の集客・問い合わせ獲得から育成・商談化までを仕組み化する伴走支援サービス</span>
            </p>

            <ul class="wg2-hero__badges">
              <li class="wg2-hero__badge">お問い合わせ<br>獲得</li>
              <li class="wg2-hero__badge">見込み顧客の<br>育成</li>
              <li class="wg2-hero__badge">商談を増やす</li>
            </ul>
          </div>

          <div class="wg2-hero__visual">
            <img class="wg2-hero__illust" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/hero-illust.webp' ) ); ?>" alt="BtoBマーケティングの数値を見ながら打ち合わせをするチームのイラスト" width="775" height="543" fetchpriority="high" decoding="async">
          </div>
        </div>

        <p class="wg2-hero__lead">
          御社のマーケティング部門として問い合わせの獲得から育成・商談化までを仕組み化。<br class="wg2-br-pc">安定した見込み顧客の創出を実現します。
        </p>

      </div>
    </section>

    <!-- ============ 02 募集の背景 ============ -->
    <section class="wg2-section wg2-section--pale" id="wgm-why">
      <div class="wg2-container">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-why">先行導入企業様<br>募集の背景</h2>
        </div>

        <!-- 要点（.wgm-em）だけ本文より大きく・太字・アクセント色にして、拾い読みでも趣旨が伝わるようにする -->
        <div class="wg2-prose">
          <p>ウィルグローは、BtoB企業向けに、<span class="wgm-em">Webからの問い合わせと商談を生み出す月額制のマーケティング支援サービス</span>です。</p>
          <p>現在弊社では、Webサイトの分析や動線改善、集客施策などのマーケティングの仕組み化に取り組み、その経過と結果を事例として公開させていただける、<span class="wgm-em">先行導入企業を募集しています</span>。</p>
          <p>そのため、事例掲載にご協力いただくことを条件に、<span class="wgm-em">特別料金でサービスをご提供しております</span>。</p>
        </div>
      </div>
    </section>

    <!-- ============ 03 ウィルグローとは（ウィルグローLP v2 の同セクションをそのまま使用） ============ -->
    <section class="wg2-section" id="wgm-service">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">SERVICE</span>
          <span class="wg2-kicker">そもそも</span>
          <h2 class="wg2-title" data-section="wgm-service">ウィルグローとは？</h2>
        </div>

        <p class="wg2-define">
          ウィルグローは、<br class="wg2-br-sp"><em class="wg2-define__key">BtoB特化・月額制の<br class="wg2-br-sp">マーケティング支援</em>の<br class="wg2-br-sp">サービスです。<br>
          マーケティング担当が<br class="wg2-br-sp">いなくても、<br>
          <em class="wg2-define__key">問い合わせと<br class="wg2-br-sp">商談が生まれる</em>状態を、<br>
          <em class="wg2-define__key">設計から運用まで<br class="wg2-br-sp">まるごと</em>お任せいただけます。
        </p>

        <!-- 図解（画像ではなく HTML＋CSS）
             左に御社、右にウィルグロー。往復の矢印で「依頼」と「成果」を表す -->
        <div class="wg2-diagram">
          <div class="wg2-diagram__node wg2-diagram__node--you">
            <div class="wg2-diagram__head">
              <img class="wg2-diagram__illust" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/diagram-you.webp' ) ); ?>" alt="" width="600" height="787" loading="lazy" decoding="async">
              <span>
                <span class="wg2-diagram__label">御社</span>
                <span class="wg2-diagram__name">マーケ担当のいないBtoB企業</span>
              </span>
            </div>
          </div>

          <div class="wg2-diagram__flow">
            <p class="wg2-diagram__arrow wg2-diagram__arrow--to">
              <span class="wg2-diagram__arrow-label">まるごとお任せ</span>
              <span class="wg2-diagram__arrow-line" aria-hidden="true"></span>
            </p>
            <p class="wg2-diagram__arrow wg2-diagram__arrow--back">
              <span class="wg2-diagram__arrow-label">問い合わせ・商談</span>
              <span class="wg2-diagram__arrow-line" aria-hidden="true"></span>
            </p>
          </div>

          <div class="wg2-diagram__node wg2-diagram__node--wg">
            <div class="wg2-diagram__head">
              <span>
                <img class="wg2-diagram__logo" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/hero-logotype.webp' ) ); ?>" alt="ウィルグロー" width="1130" height="240" loading="lazy" decoding="async">
                <span class="wg2-diagram__name">御社のマーケティング部門</span>
              </span>
            </div>
            <ul class="wg2-diagram__items">
              <li><?php echo wgm_icon( 'check' ); ?><span>現状分析と、やることの計画づくり</span></li>
              <li><?php echo wgm_icon( 'check' ); ?><span>検索から見つけてもらう記事づくり</span></li>
              <li><?php echo wgm_icon( 'check' ); ?><span>問い合わせしやすいサイトへの改善</span></li>
              <li><?php echo wgm_icon( 'check' ); ?><span>見込み客を追いかけて、商談につなげる</span></li>
              <li><?php echo wgm_icon( 'check' ); ?><span>毎月の効果測定と改善</span></li>
            </ul>
          </div>
        </div>

        <div class="wg2-service__closing">
          <p><span class="wg2-service__punch">御社専属のマーケティングチームが、<br class="wg2-br-sp">問い合わせと商談を生み出します。</span></p>
        </div>

        <div class="wgm-cta-center">
          <a class="wg2-btn wg2-btn--ghost wg2-btn--lg" href="<?php echo esc_url( $wgm_willgrow_url ); ?>" target="_blank" rel="noopener noreferrer">ウィルグローサービス詳細<?php echo wgm_icon( 'arrow-right' ); ?></a>
        </div>
      </div>
    </section>

    <!-- ============ 04 対象となる企業様 ============ -->
    <section class="wg2-section wg2-section--pale" id="wgm-target">
      <div class="wg2-container">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-target">こんな企業様が対象です</h2>
        </div>

        <div class="wg2-problem">
          <div class="wg2-problem__visual">
            <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/problem.webp' ) ); ?>" alt="" width="900" height="1185" loading="lazy" decoding="async">
          </div>
          <div class="wg2-problem__list">
            <ul class="wg2-checklist">
              <li>売上を伸ばしたいが、打ち手が見つからない</li>
              <li>新規開拓の入口が、紹介と展示会しかない</li>
              <li>主要な取引先への依存度が高く、先細りに不安がある</li>
              <li>売上が、営業担当の人数と頑張りに比例している</li>
              <li>相見積になると価格で比べられ、技術や品質が伝わらない</li>
              <li>新規開拓をやらなければと思うが、動ける人が社内にいない</li>
            </ul>
          </div>
        </div>

        <div class="wg2-card wgm-terms-card">
          <h3 class="wg2-h3">こんな想いをお持ちの企業様へ</h3>
          <p class="wgm-offer__lead">新サービス立ち上げ、事例構築期間につき、<br class="wg2-br-pc">3社限定でサービスを特別料金にてご提供いたします。</p>
          <!-- 上の「お悩み6つ」を受けて、条件ではなく前向きな想いとして並べる。
               事例掲載への協力は 02・06 のリードと 07 の条件表に明記している -->
          <ul class="wg2-checkitems">
            <li>特定の取引先に頼らない、売上の柱をもう1本つくりたい</li>
            <li>価格ではなく、技術や品質で選ばれるようになりたい</li>
            <li>社内に動ける人がいなくても、まず走り出したい</li>
            <li>今期こそ、Webからの新規開拓に本気で取り組みたい</li>
          </ul>
        </div>

        <div class="wgm-midcta">
          <a class="wg2-btn wg2-btn--primary wg2-btn--lg" href="<?php echo esc_url( $wgm_diagnosis_url ); ?>" target="_blank" rel="noopener noreferrer" data-cta-type="diagnosis" data-cta-position="sec03">まずは現状を確認する → 無料診断</a>
        </div>
      </div>
    </section>

    <!-- ============ 05 他のサービスとここが違う ============ -->
    <section class="wg2-section" id="wgm-diff">
      <div class="wg2-container">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-diff">ウィルグローは<br class="wg2-br-sp">他のサービスとここが違う</h2>
        </div>

        <div class="wg2-why">
          <article class="wg2-why__card">
            <div class="wg2-why__visual">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/why-01.webp' ) ); ?>" alt="" width="1200" height="1496" loading="lazy" decoding="async">
            </div>
            <div class="wg2-why__content">
              <span class="wg2-why__num">1</span>
              <span class="wg2-icon wg2-icon--lg wg2-why__icon"><?php echo wgm_icon( 'target' ); ?></span>
              <p class="wg2-why__text">BtoBの営業とマーケティングを<span class="wg2-marker">実務でやってきたチーム</span>が設計するため、「問い合わせの数」だけでなく<span class="wg2-marker">「商談になる数」からも逆算</span>できる。</p>
            </div>
          </article>
          <article class="wg2-why__card">
            <div class="wg2-why__visual">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/why-02.webp' ) ); ?>" alt="" width="1200" height="1107" loading="lazy" decoding="async">
            </div>
            <div class="wg2-why__content">
              <span class="wg2-why__num">2</span>
              <span class="wg2-icon wg2-icon--lg wg2-why__icon"><?php echo wgm_icon( 'refresh' ); ?></span>
              <p class="wg2-why__text">お問い合わせの獲得だけでなく、<span class="wg2-marker">失注後の追客や掘り起こしまで仕組み</span>にするため、営業が<span class="wg2-marker">本当に追うべき会社に集中</span>できる。</p>
            </div>
          </article>
          <article class="wg2-why__card">
            <div class="wg2-why__visual">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/why-03.webp' ) ); ?>" alt="" width="1200" height="1205" loading="lazy" decoding="async">
            </div>
            <div class="wg2-why__content">
              <span class="wg2-why__num">3</span>
              <span class="wg2-icon wg2-icon--lg wg2-why__icon"><?php echo wgm_icon( 'wallet' ); ?></span>
              <p class="wg2-why__text">記事の本数や作業量で区切らない<span class="wg2-marker">月額固定</span>のため、その都度の見積もりや稟議を待たずに、記事の追加も、サイトの改善も、<span class="wg2-marker">必要なだけ進められる</span>。</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ============ 中間CTA（11 の CTA バンドと同内容。計測は sec04） ============ -->
    <section class="wg2-ctaband wgm-midband">
      <div class="wg2-container wg2-ctaband__inner">
        <div class="wg2-ctaband__head">
          <span class="wg2-ctaband__eyebrow">CONTACT</span>
          <h2 class="wg2-ctaband__title" data-section="wgm-cta-mid">お気軽にお問い合わせください。</h2>
          <p class="wg2-ctaband__lead">初期費用0円・契約期間の縛りなし。<br>現状をお聞かせいただくか、まず無料診断でいまの位置を確かめてください。</p>
        </div>

        <div class="wg2-ctaband__grid">

          <div class="wg2-ctaband__panel">
            <h3 class="wg2-ctaband__panel-title">まずは話を聞いてみたい方へ<br>（無料相談）</h3>
            <p class="wg2-ctaband__panel-text">オンラインで30〜60分。現状をお聞きしたうえで、先行導入が御社に合うかどうかも含めてお伝えします。見合わないと判断した場合は、その旨も正直にお伝えします。</p>
            <a href="<?php echo esc_url( $wgm_consult_url ); ?>" class="wg2-ctaband__btn" data-cta-type="consult" data-cta-position="sec04">無料相談を申し込む</a>
          </div>

          <div class="wg2-ctaband__panel">
            <h3 class="wg2-ctaband__panel-title">まずは現状を把握したい方へ<br>（無料診断）</h3>
            <p class="wg2-ctaband__panel-text">10問に答えるだけ・約1分。御社サイトの現在地と改善の方向性をレポートにしてお送りします。先行導入へのご参加は、レポートをご覧になってからご検討ください。</p>
            <a href="<?php echo esc_url( $wgm_diagnosis_url ); ?>" class="wg2-ctaband__btn" data-cta-type="diagnosis" data-cta-position="sec04" target="_blank" rel="noopener noreferrer">無料診断（約1分）を試す</a>
          </div>

        </div>
      </div>
    </section>

    <!-- ============ 06 先行導入料金 ============ -->
    <section class="wg2-section wg2-section--pale" id="wgm-price">
      <div class="wg2-container">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-price">先行導入料金</h2>
        </div>

        <p class="wg2-lead">事例掲載にご協力いただける企業様に限り、以下の月額でご提供します。<br class="wg2-br-pc">どちらのプランも初期費用は0円です。</p>

        <div class="wg2-plans wgm-plans">
          <article class="wg2-plan wg2-plan--recommend">
            <div class="wg2-plan__head">
              <span class="wg2-plan__ribbon">おすすめ</span>
              <h3 class="wg2-plan__name">問い合わせプラン</h3>
              <p class="wgm-plan__regular">通常 月額30万円</p>
              <p class="wg2-plan__price"><small>月額</small>10万円</p>
            </div>
            <div class="wg2-plan__body">
              <p class="wg2-plan__catch">問い合わせが届く状態を、私たちがつくります</p>
              <p class="wg2-plan__inherit">下記の共通内容 ＋</p>
              <ul class="wg2-checkitems wg2-plan__list">
                <li>記事の企画・執筆・公開（本数の上限なし）</li>
                <li>既存記事のリライト（本数の上限なし）</li>
                <li>問い合わせ導線の改善</li>
                <li>フォームの改善</li>
                <li>サイト内テキストの修正</li>
                <li>内部リンクの調整</li>
                <li>計測環境の構築と運用</li>
                <li>月次レポートと改善提案</li>
              </ul>
              <p class="wg2-plan__punch"><?php echo wgm_icon( 'check' ); ?><span>手を動かすのは、すべて私たちです</span></p>
            </div>
          </article>

          <article class="wg2-plan">
            <div class="wg2-plan__head">
              <h3 class="wg2-plan__name">商談プラン</h3>
              <p class="wgm-plan__regular">通常 月額50万円</p>
              <p class="wg2-plan__price"><small>月額</small>30万円</p>
            </div>
            <div class="wg2-plan__body">
              <p class="wg2-plan__catch">届いた問い合わせを、商談まで育てます</p>
              <p class="wg2-plan__inherit">問い合わせプランの内容すべて ＋</p>
              <ul class="wg2-checkitems wg2-plan__list">
                <li>MAツールの構築（構築費込み）</li>
                <li>見込み客リストの管理・整理</li>
                <li>メール配信によるナーチャリング</li>
                <li>関心度の高い見込み客の抽出</li>
                <li>営業へお渡しするタイミングの設計</li>
                <li>商談化状況の分析と改善</li>
              </ul>
              <p class="wg2-plan__punch"><?php echo wgm_icon( 'check' ); ?><span>追いかけるべき会社と、そのタイミングが分かります</span></p>
            </div>
          </article>
        </div>

        <!-- どちらのプランにも共通して含まれる内容（通常LPの「設計プラン」相当） -->
        <div class="wg2-card wgm-common">
          <h3 class="wg2-h3">どちらのプランにも共通して含まれる内容</h3>
          <ul class="wg2-checkitems wgm-common__list">
            <li>現状分析（アクセス・検索順位・サイト診断）</li>
            <li>競合調査</li>
            <li>ターゲットと訴求の設計</li>
            <li>獲得すべきキーワードの選定</li>
            <li>施策の優先順位づけ</li>
            <li>改善提案書のご提出</li>
            <li>月1回の打ち合わせ</li>
          </ul>
        </div>

        <!-- 先行導入期間の経過後の扱い。注記ではなく、目立たせたい約束として大きめ・太字で見せる -->
        <div class="wgm-note-after">
          <p>先行導入期間の経過後は、状況やご要望に応じて貴社にあったご提案をさせていただきます。</p>
          <p>期間が経過しても貴社の状況に応じて、中長期的にご支援させていただきます。</p>
        </div>

        <div class="wgm-cta-center">
          <a class="wg2-btn wg2-btn--primary wg2-btn--lg" href="<?php echo esc_url( $wgm_diagnosis_url ); ?>" target="_blank" rel="noopener noreferrer" data-cta-type="diagnosis" data-cta-position="sec05">まずは無料診断を受ける<?php echo wgm_icon( 'arrow-right' ); ?></a>
          <p class="wg2-btn-note">どちらのプランが合うかは、診断結果をもとにご提案します。</p>
        </div>
      </div>
    </section>

    <!-- ============ 07 先行導入企業様の条件 ============ -->
    <section class="wg2-section" id="wgm-terms">
      <div class="wg2-container">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-terms">先行導入企業様の条件</h2>
        </div>

        <table class="wg2-table wgm-table">
          <tbody>
            <tr>
              <th scope="row">同時受入</th>
              <td>3社まで（2名体制で1社ずつ深く関わるため、同時にお受けできる社数を限らせていただきます）</td>
            </tr>
            <tr>
              <th scope="row">期間</th>
              <td>6ヶ月。導線の改善は早ければ翌月から、検索からの流入は4〜6ヶ月目に動き始めるため、成果が見えるまでの期間として設定しています</td>
            </tr>
            <tr>
              <th scope="row">契約</th>
              <td>契約期間の縛りはありません。月単位の自動更新で、解約は1ヶ月前のご連絡で可能です</td>
            </tr>
            <tr>
              <th scope="row">参加条件</th>
              <td>事例としての掲載協力（社名・取り組み内容・数値の公開。公開範囲は事前にご相談のうえ決定します）</td>
            </tr>
            <tr>
              <th scope="row">6ヶ月終了後</th>
              <td>状況やご要望に応じて貴社にあったご提案をさせていただきます。6ヶ月が経過しても中長期的にご支援させていただきます。</td>
            </tr>
          </tbody>
        </table>

        <div class="wgm-scope wgm-scope--terms">
          <div class="wg2-card">
            <h3 class="wg2-h3">プラン内</h3>
            <ul class="wg2-checkitems">
              <li>記事の制作・リライト（本数の上限なし）</li>
              <li>テキスト修正、CTA・フォームの改善</li>
              <li>内部リンクの調整</li>
              <li>計測設定（GA4 など）</li>
            </ul>
          </div>
          <div class="wg2-card">
            <h3 class="wg2-h3">別途お見積り</h3>
            <ul class="wg2-dotlist">
              <li>サイトリニューアル</li>
              <li>新規ページ・LPの制作</li>
              <li>新しくデザインを起こす必要があるセクション追加・改修</li>
              <li>撮影・動画・開発</li>
            </ul>
            <p class="wgm-scope__note">サイトリニューアルは、サブスク型Webサイトの制作・運用支援サービス「ウィルサポ」で承ります。</p>
            <p class="wgm-scope__link"><a class="wg2-btn wg2-btn--ghost wg2-btn--sm" href="<?php echo esc_url( $wgm_willsupport_url ); ?>" target="_blank" rel="noopener noreferrer">ウィルサポはこちら<?php echo wgm_icon( 'arrow-right' ); ?></a></p>
          </div>
        </div>
      </div>
    </section>

    <!-- ============ 08 先行導入期間にやること ============ -->
    <section class="wg2-section wg2-section--pale" id="wgm-plan">
      <div class="wg2-container">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-plan">先行導入期間にやること</h2>
        </div>

        <p class="wg2-lead">通常の「問い合わせプラン」と同じ内容をご提供します。</p>

        <ol class="wg2-flow">
          <li class="wg2-flow__item">
            <span class="wg2-flow__period">1ヶ月目</span>
            <h3 class="wg2-flow__title">分析と戦略設計</h3>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wgm_icon( 'list-checks' ); ?>やること</span>
              <p>御社のサイトと同業他社を調べ、「どんな会社が、どんな言葉で探しているか」を洗い出します。数字を正しく見るための計測設定も、ここで整えます。</p>
            </div>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wgm_icon( 'trending-up' ); ?>見込める効果</span>
              <p>何が足りていなかったのかが、はっきりします。実行計画にご合意いただいてから、次に進みます。</p>
            </div>
          </li>

          <li class="wg2-flow__item">
            <span class="wg2-flow__period">2〜3ヶ月目</span>
            <h3 class="wg2-flow__title">導線の改修と、記事の制作開始</h3>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wgm_icon( 'list-checks' ); ?>やること</span>
              <p>問い合わせフォームまでの導線を作り直し、伝わりにくいページの文章を整えます。並行して、記事の制作と公開を始めます。</p>
            </div>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wgm_icon( 'trending-up' ); ?>見込める効果</span>
              <p>いま来ている訪問者からの問い合わせが、拾いやすくなります。導線の改善は、記事より早く効果が表れます。</p>
              <p>一方、記事のほうはまだ数字が動きません。公開してすぐ検索の上位に出るわけではなく、評価が定まるまでに数ヶ月かかるためです。</p>
              <p>ここで手を止めないことが、いちばん大事な期間です。</p>
            </div>
          </li>

          <li class="wg2-flow__item">
            <span class="wg2-flow__period">4〜6ヶ月目</span>
            <h3 class="wg2-flow__title">検索からの流入が動き始めます</h3>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wgm_icon( 'list-checks' ); ?>やること</span>
              <p>どの記事がどの言葉で読まれているかを毎月分析し、伸びている記事は書き足し、届いていない記事は書き直します。訪問者の動きを見ながら、導線の調整も続けます。</p>
            </div>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wgm_icon( 'trending-up' ); ?>見込める効果</span>
              <p>公開した記事が検索結果に表示されはじめ、これまで接点のなかった会社が、サイトを訪れるようになります。</p>
              <p>アクセス数の増加が、最初に表れる変化です。そこから少し遅れて、問い合わせという形になって表れます。</p>
            </div>
          </li>

          <li class="wg2-flow__item">
            <span class="wg2-flow__period">6ヶ月目以降</span>
            <h3 class="wg2-flow__title">問い合わせが入る状態へ</h3>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wgm_icon( 'list-checks' ); ?>やること</span>
              <p>成果の出ているテーマを広げ、伸び悩む記事を作り直します。問い合わせの中身を見ながら、狙う相手そのものも調整します。</p>
            </div>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wgm_icon( 'trending-up' ); ?>見込める効果</span>
              <p>記事は消えません。増えるほど、入口が増えていきます。広告のように、止めた月にゼロへ戻ることもありません。</p>
              <p>ここから先は、問い合わせの「数」だけでなく「質」を上げる段階に入ります。</p>
            </div>
          </li>
        </ol>

        <p class="wg2-note">
          ※上記は一般的な進み方です。業種・競合の状況・現在のサイトの状態によって前後します。<br>
          　成果をお約束するものではありませんが、うまくいかない場合は、その都度打ち手を変えていきます。
        </p>

        <div class="wgm-cta-center">
          <a class="wg2-btn wg2-btn--ghost wg2-btn--lg" href="<?php echo esc_url( $wgm_willgrow_url ); ?>" target="_blank" rel="noopener noreferrer">ウィルグローサービス詳細<?php echo wgm_icon( 'arrow-right' ); ?></a>
        </div>
      </div>
    </section>

    <!-- ============ 09 担当者 ============ -->
    <section class="wg2-section" id="wgm-member">
      <div class="wg2-container">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-member">担当するのは、この2名です</h2>
        </div>

        <p class="wg2-lead">打ち合わせから施策の実行まで、代表の2名が直接担当します。</p>

        <div class="wg2-members">
          <div class="wg2-member">
            <div class="wg2-member__photo">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/member-takahashi.webp' ) ); ?>" alt="高橋 竜也" width="1170" height="1165" loading="lazy" decoding="async">
            </div>
            <div>
              <h3 class="wg2-member__name">高橋 竜也<span>マーケティング戦略・実行</span></h3>
              <p class="wg2-member__text">BtoBマーケティング10年以上。前職のSaaS企業で、リード獲得施策・MA運用・営業プロセス改善・CRM/SFAを使った分析と施策立案を一貫して担当。インサイドセールスチームの立ち上げからマネジメントまでを経験し、マーケティングと営業をつなげた形で全体設計を行います。</p>
            </div>
          </div>
          <div class="wg2-member">
            <div class="wg2-member__photo">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/member-iwata.webp' ) ); ?>" alt="岩田 あゆみ" width="1170" height="1065" loading="lazy" decoding="async">
            </div>
            <div>
              <h3 class="wg2-member__name">岩田 あゆみ<span>デザイン・ブランディング</span></h3>
              <p class="wg2-member__text">技術や品質が、初めて訪れた人に伝わるか。<br>読んでいる途中で迷わないか。<br>専門的な内容を、直感的に伝わる形に落とします。</p>
            </div>
          </div>
        </div>

        <div class="wg2-facts">
          <h3 class="wg2-facts__title"><?php echo wgm_icon( 'bar-chart' ); ?>わたしたちで実践しています</h3>
          <ul class="wg2-facts__list">
            <li><?php echo wgm_icon( 'trending-up' ); ?><span>記事の公開を始めて半年で、アクセス数 約2.5倍</span></li>
            <li><?php echo wgm_icon( 'search' ); ?><span>現在、サイト訪問の約6割が検索経由</span></li>
            <li><?php echo wgm_icon( 'mail' ); ?><span>問い合わせ導線を直した翌月、Web経由の問い合わせが2倍</span></li>
          </ul>
          <p class="wg2-facts__source">（すべて自社サイトの実数です／GA4・MAツールによる計測）</p>
        </div>

        <p class="wgm-company">合同会社ウィル｜福岡市博多区｜BtoB企業のWeb支援50社以上・ご相談200回以上</p>
      </div>
    </section>

    <!-- ============ 10 よくあるご質問 ============ -->
    <section class="wg2-section wg2-section--pale" id="wgm-faq">
      <div class="wg2-container wg2-container--narrow">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-faq">よくあるご質問</h2>
        </div>

        <div class="wg2-faq">
          <details class="wg2-faq__item" open>
            <summary class="wg2-faq__q">なぜ通常の3分の1の価格なのですか？</summary>
            <div class="wg2-faq__a">
              <p>ウィルグローの支援事例を公開させていただくため、事例掲載にご協力いただける企業様に限り、特別料金でご提供しています。支援の内容は、通常のプランと同じです。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">事例掲載とは、具体的に何をするのですか？</summary>
            <div class="wg2-faq__a">
              <p>取り組みの内容と結果を、ウィルのWebサイトや提案資料に掲載させていただきます。社名を公開するかどうか、どの数値を公開するかは、事前にご相談のうえ決めます。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">6ヶ月で成果は出ますか？</summary>
            <div class="wg2-faq__a">
              <p>導線の改善は早ければ翌月から、検索からの流入はご契約から4〜6ヶ月目に動き始めるのが目安です。成果をお約束することはできませんが、成果が出るまで施策を変え続けることはお約束します。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">途中でやめられますか？</summary>
            <div class="wg2-faq__a">
              <p>はい。月単位のご契約で、1ヶ月前のご連絡で解約いただけます。事例としての掲載は、実際に取り組んだ期間の内容のみとなります。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">先行導入に応募すると、必ず契約することになりますか？</summary>
            <div class="wg2-faq__a">
              <p>いいえ。まずは無料診断を受けていただき、診断結果と改善の方向性をご説明したうえで、ご参加いただくかどうかをご判断ください。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">どちらのプランを選べばいいですか？</summary>
            <div class="wg2-faq__a">
              <p>まずは無料診断をお受けください。診断結果と御社の営業体制をもとに、どちらが合うかをご提案します。多くの場合、問い合わせプランからのスタートをおすすめしています。</p>
            </div>
          </details>
        </div>
      </div>
    </section>

    <!-- ============ 11 CTA（無料相談・無料診断。通常LPの CTA バンドと同構成） ============ -->
    <section class="wg2-ctaband wgm-final" id="wgm-cta">
      <div class="wg2-container wg2-ctaband__inner">
        <div class="wg2-ctaband__head">
          <span class="wg2-ctaband__eyebrow">CONTACT</span>
          <h2 class="wg2-ctaband__title" data-section="wgm-cta">お気軽にお問い合わせください。</h2>
          <p class="wg2-ctaband__lead">初期費用0円・契約期間の縛りなし。<br>現状をお聞かせいただくか、まず無料診断でいまの位置を確かめてください。</p>
        </div>

        <div class="wg2-ctaband__grid">

          <div class="wg2-ctaband__panel">
            <h3 class="wg2-ctaband__panel-title">まずは話を聞いてみたい方へ<br>（無料相談）</h3>
            <p class="wg2-ctaband__panel-text">オンラインで30〜60分。現状をお聞きしたうえで、先行導入が御社に合うかどうかも含めてお伝えします。見合わないと判断した場合は、その旨も正直にお伝えします。</p>
            <a href="<?php echo esc_url( $wgm_consult_url ); ?>" class="wg2-ctaband__btn" data-cta-type="consult" data-cta-position="sec08">無料相談を申し込む</a>
          </div>

          <div class="wg2-ctaband__panel">
            <h3 class="wg2-ctaband__panel-title">まずは現状を把握したい方へ<br>（無料診断）</h3>
            <p class="wg2-ctaband__panel-text">10問に答えるだけ・約1分。御社サイトの現在地と改善の方向性をレポートにしてお送りします。先行導入へのご参加は、レポートをご覧になってからご検討ください。</p>
            <a href="<?php echo esc_url( $wgm_diagnosis_url ); ?>" class="wg2-ctaband__btn" data-cta-type="diagnosis" data-cta-position="sec08" target="_blank" rel="noopener noreferrer">無料診断（約1分）を試す</a>
          </div>

        </div>
      </div>
    </section>

    <!-- ============ 12 無料相談フォーム（通常LPと同じ HubSpot フォーム） ============ -->
    <section class="wg2-section" id="wgm-contact">
      <div class="wg2-container">
        <div class="wg2-head">
          <h2 class="wg2-title" data-section="wgm-contact">無料相談のお申し込み</h2>
        </div>

        <p class="wg2-lead">先行導入についてのご質問だけでも構いません。<br class="wg2-br-pc">ご記入いただいた内容をもとに、担当者より折り返しご連絡します。</p>

        <div class="wg2-form">
          <!-- HubSpot 埋め込みフォーム（通常LP page-willgrow-v2.php と同じフォーム） -->
          <div class="hs-form-frame" data-region="na2" data-form-id="0c0451c8-6e90-4f30-a2ec-7e6f83ec71fc" data-portal-id="48153453"></div>
        </div>
      </div>
    </section>

  </main>

  <!-- ============ フッター（コーポレートサイト共通） ============ -->
  <?php get_template_part( 'template-parts/footer-common' ); ?>

  <!-- ============ 追従CTA（SP=下部固定／PC=右下。v2 と同仕様） ============ -->
  <div class="wg2-sticky wgm-sticky" id="wgmSticky">
    <!-- 閉じるボタン。v2 と同じく PC（右下カード）のみ表示する -->
    <button class="wg2-sticky__close" id="wgmStickyClose" type="button" aria-label="閉じる">×</button>
    <p class="wg2-sticky__title"><?php echo wgm_icon( 'clipboard' ); ?><span>先行導入企業募集</span></p>
    <p class="wg2-sticky__text">新サービス立ち上げ、事例構築期間につき、3社限定でサービスを特別料金にてご提供いたします。</p>
    <a class="wg2-btn wg2-btn--primary wg2-btn--block" href="<?php echo esc_url( $wgm_diagnosis_url ); ?>" target="_blank" rel="noopener noreferrer" data-cta-type="diagnosis" data-cta-position="sticky">まずは無料診断を受ける<span class="wgm-btn__sub">（約1分）</span><?php echo wgm_icon( 'arrow-right' ); ?></a>
    <p class="wgm-sticky__note">先行導入への参加は、診断結果をご覧いただいたうえでご検討ください。</p>
  </div>

  <!-- HubSpot 埋め込みフォーム -->
  <script src="https://js-na2.hsforms.net/forms/embed/48153453.js" defer></script>
  <script src="<?php echo esc_url( will_asset_url( 'will-grow-monitor-assets/js/main.js' ) ); ?>" defer></script>
  <?php wp_footer(); ?>
</body>
</html>
