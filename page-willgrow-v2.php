<?php
/*
  Template Name: ウィルグローv2 LP
  Template Post Type: page
*/

/* ============================================================
   v1（page-willgrow.php / will-grow-v1-assets）と並列運用する v2。
   CSSは wg2- プレフィックスで名前空間を分離し、v1のCSS/JSは読み込まない。

   ▼ 切り替え時にやること（1箇所だけ変える）
   $wg2_noindex = false; にすると
     - noindex,nofollow が外れる
     - 構造化データ（Service / Offer / FAQPage）が出力される
   ※ noindex 期間中は JSON-LD も評価されないため、意図的に出力を止めている
   ============================================================ */
$wg2_noindex = false;

/* robots は WordPress コアの wp_robots 経由で出す。
   Slim SEO も同じフィルターを使うため、meta タグが二重に出ない（後勝ちで noindex を確定させる） */
if ( $wg2_noindex ) {
    add_filter( 'wp_robots', function( $robots ) {
        unset( $robots['index'], $robots['follow'], $robots['max-image-preview'], $robots['max-snippet'], $robots['max-video-preview'] );
        $robots['noindex']  = true;
        $robots['nofollow'] = true;
        return $robots;
    }, 99 );
}

// 主CTA（無料診断）／従CTA（無料相談＝ページ内 HubSpot フォーム）
$wg2_diagnosis_url = home_url( '/diagnosis/' );
$wg2_consult_url   = '#wg2-contact';

/**
 * v2 LP 用アイコン（インライン SVG / stroke は currentColor）
 * 出典スタイル: Lucide 系の 24x24 ストロークアイコンを手書きで最小化したもの
 */
if ( ! function_exists( 'wg2_icon' ) ) {
    function wg2_icon( $name ) {
        $paths = array(
            'arrow-right'  => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
            'close'        => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
            'check'        => '<path d="M20 6 9 17l-5-5"/>',
            'check-circle' => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
            'minus-circle' => '<circle cx="12" cy="12" r="10"/><path d="M8 12h8"/>',
            'layers'       => '<path d="m12 2 9 5-9 5-9-5 9-5Z"/><path d="m3 12 9 5 9-5"/><path d="m3 17 9 5 9-5"/>',
            'users'        => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
            'target'       => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
            'building'     => '<rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M8 10h.01"/><path d="M16 10h.01"/><path d="M8 14h.01"/><path d="M16 14h.01"/>',
            'briefcase'    => '<rect width="20" height="14" x="2" y="7" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
            'search'       => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
            'wrench'       => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76Z"/>',
            'trending-up'  => '<path d="M22 7 13.5 15.5 8.5 10.5 2 17"/><path d="M16 7h6v6"/>',
            'award'        => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
            'list-checks'  => '<path d="m3 17 2 2 4-4"/><path d="m3 7 2 2 4-4"/><path d="M13 6h8"/><path d="M13 12h8"/><path d="M13 18h8"/>',
            'mail'         => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
            'message'      => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
            'monitor'      => '<rect width="20" height="14" x="2" y="3" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/>',
            'bar-chart'    => '<path d="M3 3v18h18"/><rect width="4" height="7" x="7" y="10" rx="1"/><rect width="4" height="12" x="15" y="5" rx="1"/>',
            'alert'        => '<path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/>',
            'clipboard'    => '<rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/>',
            'refresh'      => '<path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/>',
            'wallet'       => '<path d="M19 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0 0 4h14a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5"/><path d="M17 12h.01"/>',
            'zap'          => '<path d="M4 14h7l-3 8 12-12h-7l3-8z"/>',
            'send'         => '<path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>',
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

  <!-- robots（noindex,nofollow）は上部の wp_robots フィルター経由で wp_head() が出力 -->
  <!-- title / description / OGP / Twitter Card は Slim SEO が wp_head() で出力 -->

  <!-- ========== preconnect ========== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://js-na2.hsforms.net" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/style.css' ) ); ?>">

<?php if ( ! $wg2_noindex ) : ?>
  <!-- ========== 構造化データ JSON-LD（公開切り替え後のみ出力） ========== -->
  <!-- (1) Service + Offer -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "ウィルグロー",
    "serviceType": "BtoB特化・月額制のマーケティング支援",
    "areaServed": "JP",
    "description": "ウィルグローは、BtoB特化・月額制のマーケティング支援のサービスです。マーケティング担当がいなくても、問い合わせと商談が生まれる状態を、設計から運用までまるごとお任せいただけます。",
    "provider": {
      "@id": "https://will-corp.co.jp/#organization"
    },
    "offers": [
      { "@type": "Offer", "name": "設計プラン｜月額100,000円", "price": "100000", "priceCurrency": "JPY" },
      { "@type": "Offer", "name": "問い合わせプラン｜月額300,000円", "price": "300000", "priceCurrency": "JPY" },
      { "@type": "Offer", "name": "商談プラン｜月額500,000円", "price": "500000", "priceCurrency": "JPY" }
    ]
  }
  </script>

  <!-- (2) FAQPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      { "@type": "Question", "name": "記事は月に何本ですか？", "acceptedAnswer": { "@type": "Answer", "text": "本数は決めていません。ターゲットや狙うキーワードに合わせて必要な分だけ作成いたします。目安としては全体で30記事〜40記事程度のケースが多いです。私たちが大切にしているのは、書く量ではなく、公開したあとに何が起きたかを見て、記事の改善を続けることです。読まれている記事は書き足す。届いていない記事は書き直す。狙う言葉そのものを変えることもあります。この繰り返しが、いちばん成果につながります。本数を先に決めてしまうと、必要なときに手が打てないので、状況に応じて柔軟に対応します。" } },
      { "@type": "Question", "name": "どこまでがプラン内で、どこからが別料金ですか？", "acceptedAnswer": { "@type": "Answer", "text": "いまあるページに手を入れる作業はプラン内、新しくつくるものは別途お見積りのケースが多いです。プラン内は、記事の制作・書き直し／サイト内の文章修正／問い合わせ導線の改善／フォーム改善／内部リンクの調整／計測設定。別途お見積りとなるのは、新規ページ・LPの制作／撮影・動画／システム開発／サイトのリニューアルです。実際には、御社のサイトの状態によって変わります。別途お見積りとなる場合は、必ず事前に金額をお伝えし、ご了承いただいてから着手します。知らないうちに費用が増えることはありません。" } },
      { "@type": "Question", "name": "成果が出るまで、どのくらいかかりますか？", "acceptedAnswer": { "@type": "Answer", "text": "施策によって、表れる時期が違います。問い合わせ導線の改善は、比較的早く効果が出ます。いまサイトに来ている方からの問い合わせを、拾いやすくするためです。一方、記事は公開してすぐ検索の上位に出るわけではありません。評価が定まるまでに、数ヶ月かかります。ご契約から4〜6ヶ月目ごろに検索からの訪問が増えはじめ、そこから少し遅れて、問い合わせという形で表れてきます。業種や競合の状況によって前後します。「今月中に問い合わせがほしい」という場合は、広告のほうが確実です。その旨も正直にお伝えします。" } },
      { "@type": "Question", "name": "契約期間や解約の縛りはありますか？", "acceptedAnswer": { "@type": "Answer", "text": "ありません。初期費用は0円、最低契約期間もありません。月単位の自動更新なので、合わないと感じられた時点で終了できます。長期契約で縛らないのは、続けたいと思っていただける成果を出すことが、私たちの仕事だと考えているからです。なお、解約をご希望の場合は、1ヶ月前までにご連絡ください。" } },
      { "@type": "Question", "name": "社内にWebやマーケに詳しい人がいなくても大丈夫ですか？", "acceptedAnswer": { "@type": "Answer", "text": "はい、問題ございません。そのような会社のためにつくったサービスです。御社にお願いするのは、月に一度の打ち合わせと、事業のことを教えていただくことだけです。記事を書くのも、サイトを直すのも、数字を見るのも私たちが行います。ご報告に専門用語は使いません。決めていただくのは、方針だけです。なお、設計プラン（月10万円）のみ、実行は御社で行っていただきます。動ける方が社内にいない場合は、問い合わせプラン以上をお選びください。" } },
      { "@type": "Question", "name": "いまお願いしている会社で、成果が出ていません。何か変わりますか？", "acceptedAnswer": { "@type": "Answer", "text": "まず、うまくいっていない原因を確かめるところから始めます。成果が出ない理由は、いくつかに分かれます。狙う相手や言葉がずれている。実行が途中で止まっている。そもそも何が起きているかを測れていない。サイトの構造そのものに問題がある。原因が分からないまま依頼先だけを変えても、同じことが繰り返されます。まずは無料診断からお試しください。10の質問に答えるだけ、約1分です。いまの取り組みのどこに課題がありそうかを整理して、レポートをお送りします。費用はかかりません。そのまま切り替えを検討する必要もありません。もう少し詳しく見てほしいという場合は、無料相談で実際のサイトを拝見してお伝えします。その時点で私たちに向かないと判断した場合は、正直にそう申し上げます。ご依頼いただいた場合も、進め方は毎月見直します。方針を決めて終わりにはしません。毎月、何が起きたかをご報告し、効いていない施策は切り替えます。3ヶ月ごとには、方向そのものを見直します。契約の縛りもありませんので、合わないと感じられた時点で終了していただけます。" } },
      { "@type": "Question", "name": "もし成果が出なかったら、どうなりますか？", "acceptedAnswer": { "@type": "Answer", "text": "成果をお約束することはできません。私たちがお約束するのは、成果が出るまで打ち手を変え続けることです。毎月、何をして何が起きたかをご報告します。3ヶ月ごとに分析をまとめ、方向そのものを見直すこともあります。効いていない施策を、そのまま続けることはありません。そのうえで、投資に見合わないと私たちが判断した場合は、その旨も正直にお伝えします。契約の縛りはありませんので、いつでも終了していただけます。" } }
    ]
  }
  </script>
<?php endif; ?>

  <?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>

  <!-- ============ ローディング（ウィルサポ LP と同仕様） ============ -->
  <div class="wg2-loader" id="wg2Loader" aria-hidden="true">
    <div class="wg2-loader__inner">
      <img class="wg2-loader__logo" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/hero-logotype.webp' ) ); ?>" alt="" width="1130" height="240" decoding="async">
    </div>
  </div>

  <!-- ============ ヘッダー（主CTA=無料診断を常時配置） ============ -->
  <header class="wg2-header" id="wg2Header">
    <div class="wg2-container wg2-header__inner">
      <a href="#wg2-hero" class="wg2-header__logo">
        <img class="wg2-header__logo-img" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/header-logo.webp' ) ); ?>" alt="ウィルグロー" width="495" height="107" decoding="async">
      </a>
      <nav class="wg2-header__nav" aria-label="主要導線">
        <ul class="wg2-header__links">
          <li><a href="#wg2-service" class="wg2-header__link">ウィルグローとは</a></li>
          <li><a href="#wg2-price" class="wg2-header__link">料金プラン</a></li>
          <li><a href="#wg2-choose" class="wg2-header__link">活用例</a></li>
          <li><a href="#wg2-faq" class="wg2-header__link">よくあるご質問</a></li>
          <li><a href="#wg2-contact" class="wg2-header__link wg2-header__link--cta" data-cta-type="consult" data-cta-position="header">お問い合わせ</a></li>
          <li><a href="<?php echo esc_url( $wg2_diagnosis_url ); ?>" class="wg2-header__link wg2-header__link--cta" data-cta-type="diagnosis" data-cta-position="header">無料診断</a></li>
        </ul>
      </nav>
      <button class="wg2-burger" id="wg2Burger" type="button" aria-label="メニューを開く" aria-expanded="false" aria-controls="wg2Drawer">
        <span></span><span></span><span></span>
      </button>
    </div>
    <nav class="wg2-drawer" id="wg2Drawer" aria-label="モバイルメニュー">
      <ul class="wg2-drawer__links">
        <li><a href="#wg2-service">ウィルグローとは</a></li>
        <li><a href="#wg2-price">料金プラン</a></li>
        <li><a href="#wg2-choose">活用例</a></li>
        <li><a href="#wg2-faq">よくあるご質問</a></li>
      </ul>
      <div class="wg2-drawer__actions">
        <a href="#wg2-contact" class="wg2-btn wg2-btn--ghost wg2-btn--block" data-cta-type="consult" data-cta-position="drawer">お問い合わせ<?php echo wg2_icon( 'arrow-right' ); ?></a>
        <a href="<?php echo esc_url( $wg2_diagnosis_url ); ?>" class="wg2-btn wg2-btn--primary wg2-btn--block" data-cta-type="diagnosis" data-cta-position="drawer">無料診断<?php echo wg2_icon( 'arrow-right' ); ?></a>
      </div>
    </nav>
  </header>

  <main>

    <!-- ============ 01. ファーストビュー（v1を踏襲） ============ -->
    <section class="wg2-hero" id="wg2-hero">
      <div class="wg2-container">
        <div class="wg2-hero__grid">
          <div class="wg2-hero__content">
            <p class="wg2-hero__eyebrow">BtoBマーケティング伴走支援</p>

            <h1 class="wg2-hero__logotype">
              <img class="wg2-hero__logotype-img" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/hero-logotype.webp' ) ); ?>" alt="ウィルグロー" width="1130" height="240" fetchpriority="high" decoding="async">
              <span class="wg2-vh">｜BtoB企業の集客・問い合わせ獲得から育成・商談化までを仕組み化する伴走支援サービス</span>
            </h1>

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

    <!-- ============ 02. こんなお悩みはありませんか ============ -->
    <section class="wg2-section wg2-section--pale" id="wg2-problem">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">PROBLEM</span>
          <h2 class="wg2-title">こんなお悩みは<br class="wg2-br-sp">ありませんか</h2>
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
      </div>
    </section>

    <!-- ============ 03. ご安心ください ============ -->
    <section class="wg2-section wg2-section--watermark" id="wg2-solution">
      <img class="wg2-watermark" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/solution-bg.webp' ) ); ?>" alt="" width="1200" height="1028" loading="lazy" decoding="async" aria-hidden="true">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">SOLUTION</span>
          <h2 class="wg2-title">ご安心ください、<br class="wg2-br-sp">ウィルグローが<em>すべて解決</em>いたします</h2>
        </div>

        <ol class="wg2-solution">
          <li class="wg2-solution__item">
            <span class="wg2-icon wg2-icon--lg"><?php echo wg2_icon( 'layers' ); ?></span>
            <p class="wg2-solution__text">戦略から実行まで、<br>全てわたしたちが行います。</p>
          </li>
          <li class="wg2-solution__item">
            <span class="wg2-icon wg2-icon--lg"><?php echo wg2_icon( 'users' ); ?></span>
            <p class="wg2-solution__text">BtoBの営業プロセスを<br>理解した上で設計します。</p>
          </li>
          <li class="wg2-solution__item">
            <span class="wg2-icon wg2-icon--lg"><?php echo wg2_icon( 'target' ); ?></span>
            <p class="wg2-solution__text">問い合わせの先、商談になるか<br>どうかまで見て改善します。</p>
          </li>
        </ol>
      </div>
    </section>

    <!-- ============ 04. ウィルグローとは？ ============ -->
    <section class="wg2-section wg2-section--pale" id="wg2-service">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">SERVICE</span>
          <span class="wg2-kicker">そもそも</span>
          <h2 class="wg2-title">ウィルグローとは？</h2>
        </div>

        <p class="wg2-define">
          ウィルグローは、<em class="wg2-define__key">BtoB特化・月額制の<br class="wg2-br-sp">マーケティング支援</em>のサービスです。<br>
          マーケティング担当がいなくても、<br>
          <em class="wg2-define__key">問い合わせと商談が生まれる</em>状態を、<br>
          <em class="wg2-define__key">設計から運用までまるごと</em>お任せいただけます。
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
              <li><?php echo wg2_icon( 'check' ); ?><span>現状分析と、やることの計画づくり</span></li>
              <li><?php echo wg2_icon( 'check' ); ?><span>検索から見つけてもらう記事づくり</span></li>
              <li><?php echo wg2_icon( 'check' ); ?><span>問い合わせしやすいサイトへの改善</span></li>
              <li><?php echo wg2_icon( 'check' ); ?><span>見込み客を追いかけて、商談につなげる</span></li>
              <li><?php echo wg2_icon( 'check' ); ?><span>毎月の効果測定と改善</span></li>
            </ul>
          </div>
        </div>

        <div class="wg2-service__closing">
          <p><span class="wg2-service__punch">御社専属のマーケティングチームが、<br class="wg2-br-sp">問い合わせと商談を生み出します。</span></p>
        </div>
      </div>
    </section>

    <!-- ============ 05. ココが違う（このLPの核） ============ -->
    <section class="wg2-section" id="wg2-why">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">WHY WILLGROW</span>
          <h2 class="wg2-title">ウィルグローは<br class="wg2-br-sp">他のサービスとここが違う</h2>
        </div>

        <div class="wg2-why">
          <article class="wg2-why__card">
            <div class="wg2-why__visual">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/why-01.webp' ) ); ?>" alt="" width="1200" height="1496" loading="lazy" decoding="async">
            </div>
            <div class="wg2-why__content">
            <span class="wg2-why__num">1</span>
            <span class="wg2-icon wg2-icon--lg wg2-why__icon"><?php echo wg2_icon( 'target' ); ?></span>
            <p class="wg2-why__text">BtoBの営業とマーケティングを<span class="wg2-marker">実務でやってきたチーム</span>が設計するため、「問い合わせの数」だけでなく<span class="wg2-marker">「商談になる数」からも逆算</span>できる。</p>
            </div>
          </article>
          <article class="wg2-why__card">
            <div class="wg2-why__visual">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/why-02.webp' ) ); ?>" alt="" width="1200" height="1107" loading="lazy" decoding="async">
            </div>
            <div class="wg2-why__content">
            <span class="wg2-why__num">2</span>
            <span class="wg2-icon wg2-icon--lg wg2-why__icon"><?php echo wg2_icon( 'refresh' ); ?></span>
            <p class="wg2-why__text">お問い合わせの獲得だけでなく、<span class="wg2-marker">失注後の追客や掘り起こしまで仕組み</span>にするため、営業が<span class="wg2-marker">本当に追うべき会社に集中</span>できる。</p>
            </div>
          </article>
          <article class="wg2-why__card">
            <div class="wg2-why__visual">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/why-03.webp' ) ); ?>" alt="" width="1200" height="1205" loading="lazy" decoding="async">
            </div>
            <div class="wg2-why__content">
            <span class="wg2-why__num">3</span>
            <span class="wg2-icon wg2-icon--lg wg2-why__icon"><?php echo wg2_icon( 'wallet' ); ?></span>
            <p class="wg2-why__text">記事の本数や作業量で区切らない<span class="wg2-marker">月額固定</span>のため、その都度の見積もりや稟議を待たずに、記事の追加も、サイトの改善も、<span class="wg2-marker">必要なだけ進められる</span>。</p>
            </div>
          </article>
        </div>
      </div>
    </section>


    <!-- ============ 06. 料金プラン ============ -->
    <section class="wg2-section wg2-section--pale" id="wg2-price">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">PRICE</span>
          <h2 class="wg2-title">料金プラン</h2>
        </div>

        <!-- SPは縦積み（横スワイプにしない） -->
        <div class="wg2-plans">
          <article class="wg2-plan">
            <div class="wg2-plan__head">
              <h3 class="wg2-plan__name">設計プラン</h3>
              <p class="wg2-plan__price"><small>月額</small>10万円</p>
            </div>
            <div class="wg2-plan__body">
              <p class="wg2-plan__catch">何が問題で、何をすべきかを明らかにします</p>
              <ul class="wg2-checkitems wg2-plan__list">
                <li>現状分析（アクセス・検索順位・サイト診断）</li>
                <li>競合調査</li>
                <li>ターゲットと訴求の設計</li>
                <li>獲得すべきキーワードの選定</li>
                <li>施策の優先順位づけ</li>
                <li>改善提案書のご提出</li>
                <li>月1回の打ち合わせ</li>
              </ul>
              <p class="wg2-note">
                ※実行は御社で行っていただきます<br>
                　社内に動ける方がいる企業向けのプランです<br>
                　実行までお任せいただく場合は、問い合わせプラン以上をご検討ください
              </p>
            </div>
          </article>

          <article class="wg2-plan wg2-plan--recommend">
            <div class="wg2-plan__head">
              <span class="wg2-plan__ribbon">★おすすめ</span>
              <h3 class="wg2-plan__name">問い合わせプラン</h3>
              <p class="wg2-plan__price"><small>月額</small>30万円</p>
            </div>
            <div class="wg2-plan__body">
              <p class="wg2-plan__catch">問い合わせが届く状態を、私たちがつくります</p>
              <p class="wg2-plan__inherit">設計プランの内容すべて ＋</p>
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
              <p class="wg2-plan__punch"><?php echo wg2_icon( 'check-circle' ); ?><span>手を動かすのは、すべて私たちです</span></p>
            </div>
          </article>

          <article class="wg2-plan">
            <div class="wg2-plan__head">
              <h3 class="wg2-plan__name">商談プラン</h3>
              <p class="wg2-plan__price"><small>月額</small>50万円</p>
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
              <p class="wg2-plan__punch"><?php echo wg2_icon( 'check-circle' ); ?><span>追いかけるべき会社と、そのタイミングが分かります</span></p>
            </div>
          </article>
        </div>

        <!-- オプション -->
        <div class="wg2-option">
          <div class="wg2-card">
            <span class="wg2-option__tag">オプション</span>
            <h3 class="wg2-option__name"><?php echo wg2_icon( 'monitor' ); ?>ウィルサポ｜サブスク型 ホームページ制作・運用</h3>
            <p>サイトそのものを作り直したほうが早い場合は、弊社のウィルサポをご案内しています。制作から運用までを月額でお任せいただけます。</p>
            <a class="wg2-option__link" href="<?php echo esc_url( home_url( '/willsupport/' ) ); ?>" target="_blank" rel="noopener">ウィルサポの詳細ページへ<?php echo wg2_icon( 'arrow-right' ); ?></a>
          </div>
        </div>

      </div>
    </section>

    <!-- ============ 中間CTA（ウィルサポの CTA デザインを踏襲した全幅バンド） ============ -->
    <section class="wg2-ctaband">
      <div class="wg2-container wg2-ctaband__inner">

        <div class="wg2-ctaband__head">
          <span class="wg2-ctaband__eyebrow">CONTACT</span>
          <h2 class="wg2-ctaband__title">どのプランが合うか分からない、<br class="wg2-br-pc">という段階で構いません。</h2>
          <p class="wg2-ctaband__lead">初期費用0円・契約期間の縛りなし。<br>現状をお聞きしたうえで、必要なプランをお伝えします。</p>
        </div>

        <div class="wg2-ctaband__grid">

          <div class="wg2-ctaband__panel">
            <h3 class="wg2-ctaband__panel-title">まずはお気軽にご相談ください<br>（無料相談）</h3>
            <p class="wg2-ctaband__panel-text">オンラインで30〜60分。現状をお聞きしたうえで、必要なプランと進め方をお伝えします。ご予算に見合わないと判断した場合は、その旨も正直にお伝えします。</p>
            <a href="<?php echo esc_url( $wg2_consult_url ); ?>" class="wg2-ctaband__btn" data-cta-type="consult" data-cta-position="sec06">無料相談を申し込む</a>
          </div>

          <div class="wg2-ctaband__panel">
            <h3 class="wg2-ctaband__panel-title">まずは現状を把握したい方へ<br>（無料診断）</h3>
            <p class="wg2-ctaband__panel-text">10の質問に答えるだけ・約1分。いまの取り組みのどこに課題がありそうかを整理して、レポートをお送りします。費用はかかりません。</p>
            <a href="<?php echo esc_url( $wg2_diagnosis_url ); ?>" class="wg2-ctaband__btn" data-cta-type="diagnosis" data-cta-position="sec06" target="_blank" rel="noopener noreferrer" aria-label="無料診断（約1分）を試す（別ページで開きます）">無料診断（約1分）を試す</a>
          </div>

        </div>
      </div>
    </section>

    <!-- ============ 07. プランの選び方 ============ -->
    <section class="wg2-section wg2-section--imgright" id="wg2-choose">
      <img class="wg2-sideimage wg2-sideimage--br" src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/choose-bg.webp' ) ); ?>" alt="" width="1100" height="1382" loading="lazy" decoding="async" aria-hidden="true">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">HOW TO CHOOSE</span>
          <h2 class="wg2-title">ウィルグロー活用例</h2>
        </div>

        <div class="wg2-plancards">
          <button type="button" class="wg2-plancard" data-wg2-modal-open="wg2-modal-design">
            <span class="wg2-plancard__icon"><?php echo wg2_icon( 'clipboard' ); ?></span>
            <span class="wg2-plancard__name">設計プラン</span>
            <span class="wg2-plancard__price">月10万円</span>
            <span class="wg2-plancard__more">活用例を見る<?php echo wg2_icon( 'arrow-right' ); ?></span>
          </button>

          <button type="button" class="wg2-plancard wg2-plancard--recommend" data-wg2-modal-open="wg2-modal-inquiry">
            <span class="wg2-plancard__badge">★おすすめ</span>
            <span class="wg2-plancard__icon"><?php echo wg2_icon( 'mail' ); ?></span>
            <span class="wg2-plancard__name">問い合わせプラン</span>
            <span class="wg2-plancard__price">月30万円</span>
            <span class="wg2-plancard__more">活用例を見る<?php echo wg2_icon( 'arrow-right' ); ?></span>
          </button>

          <button type="button" class="wg2-plancard" data-wg2-modal-open="wg2-modal-meeting">
            <span class="wg2-plancard__icon"><?php echo wg2_icon( 'briefcase' ); ?></span>
            <span class="wg2-plancard__name">商談プラン</span>
            <span class="wg2-plancard__price">月50万円</span>
            <span class="wg2-plancard__more">活用例を見る<?php echo wg2_icon( 'arrow-right' ); ?></span>
          </button>
        </div>


        <!-- <div class="wg2-honest">
          <h3 class="wg2-honest__title"><?php echo wg2_icon( 'alert' ); ?>正直にお伝えします｜こんな場合は、他の方法をおすすめします</h3>
          <dl class="wg2-honest__list">
            <div>
              <dt>今月中に問い合わせが必要な場合</dt>
              <dd>検索から見つけてもらう方法は、効果が出るまで数ヶ月かかります。急ぐ場合は広告のほうが確実です。</dd>
            </div>
            <div>
              <dt>一般消費者向けの商品・サービスの場合</dt>
              <dd>私たちは企業間取引に特化しています。別の会社をご紹介できる場合もありますので、ご相談ください。</dd>
            </div>
            <div>
              <dt>一件あたりの取引額が小さい場合</dt>
              <dd>費用に見合わない可能性があります。その場合は、その旨を最初にお伝えします。</dd>
            </div>
          </dl>
        </div> -->
      </div>
    </section>

    <!-- ============ 08. 始まってからの6ヶ月 ============ -->
    <section class="wg2-section wg2-section--pale" id="wg2-flow">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">FLOW</span>
          <h2 class="wg2-title">ご利用の流れと<br class="wg2-br-sp">期待できる効果</h2>
        </div>

        <ol class="wg2-flow">
          <li class="wg2-flow__item">
            <span class="wg2-flow__period">1ヶ月目</span>
            <h3 class="wg2-flow__title">分析と戦略設計</h3>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wg2_icon( 'list-checks' ); ?>やること</span>
              <p>御社のサイトと同業他社を調べ、「どんな会社が、どんな言葉で探しているか」を洗い出します。数字を正しく見るための計測設定も、ここで整えます。</p>
            </div>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wg2_icon( 'trending-up' ); ?>見込める効果</span>
              <p>何が足りていなかったのかが、はっきりします。実行計画にご合意いただいてから、次に進みます。</p>
            </div>
          </li>

          <li class="wg2-flow__item">
            <span class="wg2-flow__period">2〜3ヶ月目</span>
            <h3 class="wg2-flow__title">導線の改修と、記事の制作開始</h3>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wg2_icon( 'list-checks' ); ?>やること</span>
              <p>問い合わせフォームまでの導線を作り直し、伝わりにくいページの文章を整えます。並行して、記事の制作と公開を始めます。</p>
            </div>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wg2_icon( 'trending-up' ); ?>見込める効果</span>
              <p>いま来ている訪問者からの問い合わせが、拾いやすくなります。導線の改善は、記事より早く効果が表れます。</p>
              <p>一方、記事のほうはまだ数字が動きません。公開してすぐ検索の上位に出るわけではなく、評価が定まるまでに数ヶ月かかるためです。</p>
              <p>ここで手を止めないことが、いちばん大事な期間です。</p>
            </div>
          </li>

          <li class="wg2-flow__item">
            <span class="wg2-flow__period">4〜6ヶ月目</span>
            <h3 class="wg2-flow__title">検索からの流入が動き始めます</h3>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wg2_icon( 'list-checks' ); ?>やること</span>
              <p>どの記事がどの言葉で読まれているかを毎月分析し、伸びている記事は書き足し、届いていない記事は書き直します。訪問者の動きを見ながら、導線の調整も続けます。</p>
            </div>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wg2_icon( 'trending-up' ); ?>見込める効果</span>
              <p>公開した記事が検索結果に表示されはじめ、これまで接点のなかった会社が、サイトを訪れるようになります。</p>
              <p>アクセス数の増加が、最初に表れる変化です。そこから少し遅れて、問い合わせという形になって表れます。</p>
            </div>
          </li>

          <li class="wg2-flow__item">
            <span class="wg2-flow__period">6ヶ月目以降</span>
            <h3 class="wg2-flow__title">問い合わせが入る状態へ</h3>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wg2_icon( 'list-checks' ); ?>やること</span>
              <p>成果の出ているテーマを広げ、伸び悩む記事を作り直します。問い合わせの中身を見ながら、狙う相手そのものも調整します。</p>
            </div>
            <div class="wg2-flow__block">
              <span class="wg2-flow__label"><?php echo wg2_icon( 'trending-up' ); ?>見込める効果</span>
              <p>記事は消えません。増えるほど、入口が増えていきます。広告のように、止めた月にゼロへ戻ることもありません。</p>
              <p>ここから先は、問い合わせの「数」だけでなく「質」を上げる段階に入ります。</p>
            </div>
          </li>
        </ol>

        <p class="wg2-note">
          ※上記は一般的な進み方です。業種・競合の状況・現在のサイトの状態によって前後します。<br>
          　成果をお約束するものではありませんが、うまくいかない場合は、その都度打ち手を変えていきます。
        </p>
      </div>
    </section>

    <!-- ============ 09. 私たちについて ============ -->
    <section class="wg2-section" id="wg2-about">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">ABOUT US</span>
          <h2 class="wg2-title">マーケティングと営業を、<br class="wg2-br-sp">切り離さない</h2>
        </div>

        <div class="wg2-message">
          <figure class="wg2-message__photo">
            <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/message-takahashi.webp' ) ); ?>" alt="合同会社ウィル 代表 高橋竜也" width="780" height="1040" loading="lazy" decoding="async">
          </figure>

          <div class="wg2-message__body">
          <p>前職では、BtoB企業のマーケティングを10年以上担当してきました。<br>見込み客を集める仕組みをつくり、インサイドセールスのチームを立ち上げ、そのマネジメントまで一通りやってきました。</p>
          <p>そこで痛感したのは、「問い合わせを増やすこと」と「売上が上がること」は別の話だということです。</p>
          <p>数だけ増やしても、営業が動けない相手ばかりでは意味がない。<br>逆に、いい会社から一件届けば、それだけで事業が変わることもある。<br>マーケティングと営業を切り離した瞬間に、この感覚は失われます。</p>
          <p>独立してからは、九州を中心にBtoB企業のご相談を受けてきました。<br>多くの会社に共通していたのは、マーケティング担当がいないこと。<br>そして、外に頼んでも「作って終わり」になってしまうことでした。</p>
          <p>ウィルグローは、その状態を変えるためにつくったサービスです。<br>戦略から実行まで、商談になるところまで、私たちが引き受けます。</p>
          <p class="wg2-message__sign">合同会社ウィル　代表　高橋 竜也</p>
          </div>
        </div>

        <div class="wg2-members">
          <div class="wg2-member">
            <div class="wg2-member__photo">
              <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/member-takahashi.webp' ) ); ?>" alt="高橋 竜也" width="1170" height="1165" loading="lazy" decoding="async">
            </div>
            <div>
              <h3 class="wg2-member__name">高橋 竜也<span>マーケティング戦略・実行</span></h3>
              <p class="wg2-member__text">BtoBマーケティング歴10年以上。<br>インサイドセールスチームの立ち上げとマネジメントを経験。<br>マーケティングと営業プロセスを繋いで、全体を設計します。</p>
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
          <h3 class="wg2-facts__title"><?php echo wg2_icon( 'bar-chart' ); ?>わたしたちで実践しています</h3>
          <ul class="wg2-facts__list">
            <li><?php echo wg2_icon( 'trending-up' ); ?><span>記事の公開を始めて半年で、アクセス数 約2.5倍</span></li>
            <li><?php echo wg2_icon( 'search' ); ?><span>現在、サイト訪問の約6割が検索経由</span></li>
            <li><?php echo wg2_icon( 'mail' ); ?><span>問い合わせ導線を直した翌月、Web経由の問い合わせが2倍</span></li>
          </ul>
          <p class="wg2-facts__source">（すべて自社サイトの実数です／GA4・MAツールによる計測）</p>
        </div>
      </div>
    </section>

    <!-- ============ 10. よくあるご質問 ============ -->
    <section class="wg2-section wg2-section--pale" id="wg2-faq">
      <div class="wg2-container wg2-container--narrow">
        <div class="wg2-head">
          <span class="wg2-eyebrow">FAQ</span>
          <h2 class="wg2-title">よくあるご質問</h2>
        </div>

        <div class="wg2-faq">
          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">記事は月に何本ですか？</summary>
            <div class="wg2-faq__a">
              <p>本数は決めていません。<br>ターゲットや狙うキーワードに合わせて必要な分だけ作成いたします。<br>目安としては全体で30記事〜40記事程度のケースが多いです。</p>
              <p>私たちが大切にしているのは、書く量ではなく、公開したあとに何が起きたかを見て、記事の改善を続けることです。</p>
              <p>読まれている記事は書き足す。届いていない記事は書き直す。<br>狙う言葉そのものを変えることもあります。<br>この繰り返しが、いちばん成果につながります。</p>
              <p>本数を先に決めてしまうと、必要なときに手が打てないので、状況に応じて柔軟に対応します。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">どこまでがプラン内で、どこからが別料金ですか？</summary>
            <div class="wg2-faq__a">
              <p>いまあるページに手を入れる作業はプラン内、新しくつくるものは別途お見積りのケースが多いです。</p>
              <table class="wg2-table">
                <tbody>
                  <tr><th scope="row">プラン内</th><td>記事の制作・書き直し／サイト内の文章修正／問い合わせ導線の改善／フォーム改善／内部リンクの調整／計測設定</td></tr>
                  <tr><th scope="row">別途お見積り</th><td>新規ページ・LPの制作／撮影・動画／システム開発／サイトのリニューアル</td></tr>
                </tbody>
              </table>
              <p>実際には、御社のサイトの状態によって変わります。<br>別途お見積りとなる場合は、必ず事前に金額をお伝えし、ご了承いただいてから着手します。<br>知らないうちに費用が増えることはありません。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">成果が出るまで、どのくらいかかりますか？</summary>
            <div class="wg2-faq__a">
              <p>施策によって、表れる時期が違います。</p>
              <p>問い合わせ導線の改善は、比較的早く効果が出ます。いまサイトに来ている方からの問い合わせを、拾いやすくするためです。</p>
              <p>一方、記事は公開してすぐ検索の上位に出るわけではありません。評価が定まるまでに、数ヶ月かかります。</p>
              <p>ご契約から4〜6ヶ月目ごろに検索からの訪問が増えはじめ、そこから少し遅れて、問い合わせという形で表れてきます。</p>
              <p>業種や競合の状況によって前後します。<br>「今月中に問い合わせがほしい」という場合は、広告のほうが確実です。その旨も正直にお伝えします。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">契約期間や解約の縛りはありますか？</summary>
            <div class="wg2-faq__a">
              <p>ありません。</p>
              <p>初期費用は0円、最低契約期間もありません。<br>月単位の自動更新なので、合わないと感じられた時点で終了できます。</p>
              <p>長期契約で縛らないのは、続けたいと思っていただける成果を出すことが、私たちの仕事だと考えているからです。</p>
              <p class="wg2-note">※解約をご希望の場合は、1ヶ月前までにご連絡ください</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">社内にWebやマーケに詳しい人がいなくても大丈夫ですか？</summary>
            <div class="wg2-faq__a">
              <p>はい、問題ございません。<br>そのような会社のためにつくったサービスです。</p>
              <p>御社にお願いするのは、月に一度の打ち合わせと、事業のことを教えていただくことだけです。<br>記事を書くのも、サイトを直すのも、数字を見るのも私たちが行います。</p>
              <p>ご報告に専門用語は使いません。<br>決めていただくのは、方針だけです。</p>
              <p class="wg2-note">
                ※設計プラン（月10万円）のみ、実行は御社で行っていただきます。<br>
                　動ける方が社内にいない場合は、問い合わせプラン以上をお選びください。
              </p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">いまお願いしている会社で、成果が出ていません。何か変わりますか？</summary>
            <div class="wg2-faq__a">
              <p>まず、うまくいっていない原因を確かめるところから始めます。</p>
              <p>成果が出ない理由は、いくつかに分かれます。<br>狙う相手や言葉がずれている。実行が途中で止まっている。<br>そもそも何が起きているかを測れていない。<br>サイトの構造そのものに問題がある。</p>
              <p>原因が分からないまま依頼先だけを変えても、同じことが繰り返されます。</p>
              <p class="wg2-faq__strong">まずは無料診断からお試しください</p>
              <p>10の質問に答えるだけ、約1分です。<br>いまの取り組みのどこに課題がありそうかを整理して、レポートをお送りします。</p>
              <p>費用はかかりません。<br>そのまま切り替えを検討する必要もありません。</p>
              <p>もう少し詳しく見てほしいという場合は、無料相談で実際のサイトを拝見してお伝えします。<br>その時点で私たちに向かないと判断した場合は、正直にそう申し上げます。</p>
              <p><a href="<?php echo esc_url( $wg2_diagnosis_url ); ?>" data-cta-type="diagnosis" data-cta-position="faq-q6">無料診断へ<?php echo wg2_icon( 'arrow-right' ); ?></a></p>
              <p class="wg2-faq__strong">ご依頼いただいた場合も、進め方は毎月見直します</p>
              <p>方針を決めて終わりにはしません。<br>毎月、何が起きたかをご報告し、効いていない施策は切り替えます。<br>3ヶ月ごとには、方向そのものを見直します。</p>
              <p>契約の縛りもありませんので、合わないと感じられた時点で終了していただけます。</p>
            </div>
          </details>

          <details class="wg2-faq__item">
            <summary class="wg2-faq__q">もし成果が出なかったら、どうなりますか？</summary>
            <div class="wg2-faq__a">
              <p>成果をお約束することはできません。</p>
              <p>私たちがお約束するのは、成果が出るまで打ち手を変え続けることです。</p>
              <p>毎月、何をして何が起きたかをご報告します。<br>3ヶ月ごとに分析をまとめ、方向そのものを見直すこともあります。<br>効いていない施策を、そのまま続けることはありません。</p>
              <p>そのうえで、投資に見合わないと私たちが判断した場合は、その旨も正直にお伝えします。<br>契約の縛りはありませんので、いつでも終了していただけます。</p>
            </div>
          </details>
        </div>
      </div>
    </section>

    <!-- ============ 11. お問い合わせ ============ -->
    <section class="wg2-section" id="wg2-contact">
      <div class="wg2-container">
        <div class="wg2-head">
          <span class="wg2-eyebrow">CONTACT</span>
          <h2 class="wg2-title">お問い合わせ</h2>
        </div>


        <div class="wg2-form">
          <!-- HubSpot 埋め込みフォーム -->
          <div class="hs-form-frame" data-region="na2" data-form-id="0c0451c8-6e90-4f30-a2ec-7e6f83ec71fc" data-portal-id="48153453"></div>
        </div>

        <!-- TODO(未確定): フッター直前の資料ダウンロード導線は設置可否が未判断のため保留 -->
      </div>
    </section>

    <!-- ============ 活用例モーダル ============ -->
      <dialog class="wg2-modal" id="wg2-modal-design" aria-labelledby="wg2-modal-design-title">
        <div class="wg2-modal__inner">
          <div class="wg2-modal__head">
            <h3 class="wg2-modal__title" id="wg2-modal-design-title"><?php echo wg2_icon( 'clipboard' ); ?>設計プラン｜月10万円</h3>
            <button type="button" class="wg2-modal__close" data-wg2-modal-close aria-label="閉じる"><?php echo wg2_icon( 'close' ); ?></button>
          </div>
          <div class="wg2-modal__body wg2-choose__body">
                  <h4 class="wg2-choose__subtitle">こんな会社に向いています</h4>
                  <ul class="wg2-checkitems">
                    <li>社内に、Webを触れる人・動ける人がいる</li>
                    <li>ホームページはあるが、成果が出ているのか分からない</li>
                    <li>何から手をつけるべきか、順番を知りたい</li>
                    <li>大きな予算を決める前に、まず現状を確かめたい</li>
                  </ul>

                  <h4 class="wg2-choose__subtitle">使い方のイメージ</h4>
                  <div class="wg2-choose__flow">
                    <p>まず、御社のホームページと同業他社のサイトを調べ、いま何が起きているのかを整理します。</p>
                    <p>そのうえで、「どんな会社が、どんな言葉で探しているか」を洗い出し、打つべき手を、効果の大きさと手間の両面から順番に並べます。</p>
                    <p>最後に「どのテーマを、どの順番で書くべきか」を一覧にしてお渡しします。</p>
                    <p>月に一度の打ち合わせで、進め方のご質問にもお答えします。</p>
                  </div>
                  <p class="wg2-note">
                    ※実際に手を動かすのは御社です。お渡しした一覧に沿って、社内で進めていただく形になります。<br>
                    　動かす方がいない場合は、次のプランをご覧ください。
                  </p>
          </div>
        </div>
      </dialog>

      <dialog class="wg2-modal" id="wg2-modal-inquiry" aria-labelledby="wg2-modal-inquiry-title">
        <div class="wg2-modal__inner">
          <div class="wg2-modal__head">
            <h3 class="wg2-modal__title" id="wg2-modal-inquiry-title"><?php echo wg2_icon( 'mail' ); ?>問い合わせプラン｜月30万円</h3>
            <button type="button" class="wg2-modal__close" data-wg2-modal-close aria-label="閉じる"><?php echo wg2_icon( 'close' ); ?></button>
          </div>
          <div class="wg2-modal__body wg2-choose__body">
                  <h4 class="wg2-choose__subtitle">こんな会社に向いています</h4>
                  <ul class="wg2-checkitems">
                    <li>新規のお客様を、紹介と展示会以外からも増やしたい</li>
                    <li>やるべきことは何となく分かるが、動ける人が社内にいない</li>
                    <li>営業は動けている。会える相手の数が足りない</li>
                    <li>ホームページから問い合わせが、ほとんど来ていない</li>
                  </ul>

                  <h4 class="wg2-choose__subtitle">使い方のイメージ</h4>
                  <div class="wg2-choose__flow">
                    <p>はじめの1ヶ月で、御社のサイトと同業他社を調べ、「どんな会社が、どんな困りごとで探しているか」を整理します。あわせて、数字を正しく見られるよう計測の設定を整えます。</p>
                    <p>2ヶ月目からは、実際に検索されている言葉に合わせた記事を毎月公開。問い合わせフォームまでの導線も、並行して直していきます。</p>
                    <p>毎月、数字を見て、翌月に何をするかを決めます。うまくいかなかった打ち手は、その時点で切り替えます。</p>
                  </div>
                  <p class="wg2-note">
                    ※御社にお願いするのは、月に一度の打ち合わせだけです。<br>
                    　記事を書くのも、サイトを直すのも、数字を見るのも私たちが行います。
                  </p>
          </div>
        </div>
      </dialog>

      <dialog class="wg2-modal" id="wg2-modal-meeting" aria-labelledby="wg2-modal-meeting-title">
        <div class="wg2-modal__inner">
          <div class="wg2-modal__head">
            <h3 class="wg2-modal__title" id="wg2-modal-meeting-title"><?php echo wg2_icon( 'briefcase' ); ?>商談プラン｜月50万円</h3>
            <button type="button" class="wg2-modal__close" data-wg2-modal-close aria-label="閉じる"><?php echo wg2_icon( 'close' ); ?></button>
          </div>
          <div class="wg2-modal__body wg2-choose__body">
                  <h4 class="wg2-choose__subtitle">こんな会社に向いています</h4>
                  <ul class="wg2-checkitems">
                    <li>問い合わせは来ている。でも受注につながっていない</li>
                    <li>過去に名刺交換した会社が、そのままになっている</li>
                    <li>検討期間が長く、一度断られたきり連絡が途切れてしまう</li>
                    <li>営業の人数は増やせない。会う相手の質を上げたい</li>
                  </ul>

                  <h4 class="wg2-choose__subtitle">使い方のイメージ</h4>
                  <div class="wg2-choose__flow">
                    <p>はじめの1ヶ月で、問い合わせプランと同じ準備を進めながら、お持ちの名刺や、過去にお問い合わせいただいた会社を整理します。そのうえで、こちらから連絡を届けられる仕組みを用意します。</p>
                    <p>2ヶ月目からは、一度接点を持った会社へ、定期的に役立つ情報をお届け。記事の公開とサイトの改善も、同時に進めます。</p>
                    <p>届いた情報への反応から「いま関心が高まっている会社」を見つけ、営業の方へお渡しするタイミングをお伝えします。</p>
                  </div>
                  <p class="wg2-note">※営業が、動くべき相手だけに時間を使える形をつくります。</p>
          </div>
        </div>
      </dialog>

  </main>

  <!-- ============ フッター（コーポレートサイト共通） ============ -->
  <?php get_template_part( 'template-parts/footer-common' ); ?>

  <!-- ============ 追従CTA（SP=下部固定／PC=右下） ============ -->
  <div class="wg2-sticky" id="wg2Sticky">
    <button class="wg2-sticky__close" id="wg2StickyClose" type="button" aria-label="閉じる">×</button>
    <p class="wg2-sticky__title"><?php echo wg2_icon( 'clipboard' ); ?>無料診断（約1分）はこちら</p>
    <p class="wg2-sticky__text">10の質問に答えるだけ。いまの取り組みのどこに課題がありそうかを整理して、レポートをお送りします。</p>
    <a href="<?php echo esc_url( $wg2_diagnosis_url ); ?>" class="wg2-btn wg2-btn--primary wg2-btn--block" data-cta-type="diagnosis" data-cta-position="sticky">無料診断を試す<?php echo wg2_icon( 'arrow-right' ); ?></a>
  </div>

  <!-- HubSpot 埋め込みフォーム -->
  <script src="https://js-na2.hsforms.net/forms/embed/48153453.js" defer></script>
  <script src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/js/main.js' ) ); ?>" defer></script>
  <?php wp_footer(); ?>
</body>
</html>
