<?php
/*
  Template Name: BtoBマーケ無料相談 LP
  Template Post Type: page
*/

/* ============================================================
   BtoBマーケティング無料相談 LP

   制作パッケージ btob-consultation-lp の仕様に沿った静的LPを、
   自己完結型 LP（ウィルグロー v2 / ウィルサポ v2 と同じ扱い）として
   テーマに取り込んだもの。

   - テーマ汎用の style.css / JS は読み込まない
     （functions.php の $self_contained_lp_templates に登録済み）
   - CSS は tokens.css → style.css の順に読む。色・サイズはすべて
     tokens.css の CSS変数で、SCSS 側に値の直書きは無い
   - ビルド: btob-consultation-lp-assets/ で `npm run build`
   - フッターはコーポレートサイト共通（template-parts/footer-common.php）

   ▼ 切り替え時にやること（1箇所だけ変える）
   $bcl_noindex = false; にすると
     - noindex,nofollow が外れる
     - 構造化データ（FAQPage）が出力される
   ※ noindex 期間中は JSON-LD も評価されないため、意図的に出力を止めている
   ============================================================ */
$bcl_noindex = false;

/* robots は WordPress コアの wp_robots 経由で出す。
   Slim SEO も同じフィルターを使うため、meta タグが二重に出ない（後勝ちで noindex を確定させる） */
if ( $bcl_noindex ) {
    add_filter( 'wp_robots', function( $robots ) {
        unset( $robots['index'], $robots['follow'], $robots['max-image-preview'], $robots['max-snippet'], $robots['max-video-preview'] );
        $robots['noindex']  = true;
        $robots['nofollow'] = true;
        return $robots;
    }, 99 );
}

// 主CTA（無料診断）／従CTA（無料相談＝ページ内 HubSpot フォーム）
$bcl_diagnosis_url = home_url( '/diagnosis/' );
$bcl_consult_url   = '#consultation-form';
$bcl_privacy_url   = home_url( '/privacy-policy/' );

/* HubSpot フォーム（BtoBマーケ無料相談 専用フォーム） */
$bcl_hs_portal_id = '48153453';
$bcl_hs_form_id   = 'ee8412aa-1e84-49a0-a1ca-739a3ccd0e7b';
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- robots（noindex,nofollow）は上部の wp_robots フィルター経由で wp_head() が出力 -->
  <!-- title / description / OGP / Twitter Card は Slim SEO が wp_head() で出力 -->
  <!-- OGP画像を差し替える場合は btob-consultation-lp-assets/images/ogp.png（1200×630）を使う -->

  <!-- ========== preconnect ========== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://js-na2.hsforms.net" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
  <!-- 共通フッター（.footer-v5）は Zen Kaku Gothic New 指定。下層ページと同じ見た目にするため一緒に読む -->
  <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- デザイントークン → スタイル本体 の順で読み込む -->
  <link rel="stylesheet" href="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/tokens.css' ) ); ?>">
  <link rel="stylesheet" href="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/style.css' ) ); ?>">

<?php if ( ! $bcl_noindex ) : ?>
  <!-- ========== 構造化データ JSON-LD（公開切り替え後のみ出力） ==========
       Organization / WebSite / WebPage は Slim SEO が出力するため、ここでは FAQPage のみ。
       内容は ⑧ FAQ の本文と一致させること（本文を変えたらこちらも直す）。 -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      { "@type": "Question", "name": "まだ依頼するかどうかは決まっていない段階ですが、相談してもいいですか？", "acceptedAnswer": { "@type": "Answer", "text": "はい、その段階でのご相談がほとんどです。無料相談は「何から手をつけるべきか」を整理する場として設けているため、判断材料を持ち帰っていただくことを前提にしています。相談の場で結論を出していただく必要はありません。" } },
      { "@type": "Question", "name": "社内にマーケティングの専任担当者がいなくても相談できますか？", "acceptedAnswer": { "@type": "Answer", "text": "問題ありません。中小企業のご相談が中心のため、経営者の方や、他の業務と兼任されている方から直接ご相談いただくケースが多くあります。専門用語の前提は置かず、事業の状況からお伺いします。" } },
      { "@type": "Question", "name": "無料相談の前に、無料診断は必ず受ける必要がありますか？", "acceptedAnswer": { "@type": "Answer", "text": "はい、先に無料診断へご回答いただいています。診断結果というたたき台があることで、状況の説明から始めるのではなく、原因の見立てと優先順位の話から入れるためです。診断はフォームに沿ってお答えいただくだけで、資料の準備は不要です。" } },
      { "@type": "Question", "name": "相談にあたって、事前に準備しておくものはありますか？", "acceptedAnswer": { "@type": "Answer", "text": "特にありません。事業内容、いま困っていること、今後どのように事業を伸ばしていきたいか、この3点をお伺いしながら進めます。サイトのアクセス状況や問い合わせ件数などが手元にあれば話は早くなりますが、なくてもご相談いただけます。" } },
      { "@type": "Question", "name": "相談したあとは、どのような流れになりますか？", "acceptedAnswer": { "@type": "Answer", "text": "整理した内容と改善の優先順位をお持ち帰りいただき、社内でご検討いただく形になります。進め方まで具体的に決めたい場合は、そのままご相談を続けていただくこともできます。どちらを選ぶかはご都合に合わせて構いません。" } },
      { "@type": "Question", "name": "福岡以外の企業でも相談できますか？", "acceptedAnswer": { "@type": "Answer", "text": "はい、全国どこからでもご相談いただけます。無料相談はオンラインで実施しています。" } }
    ]
  }
  </script>
<?php endif; ?>

  <?php wp_head(); ?>
</head>
<body>
<?php wp_body_open(); ?>

<!-- ========================================
     ヘッダー
======================================== -->
<header class="l-header">
  <div class="l-header__inner">
    <a class="l-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="合同会社ウィル トップへ">
      <img src="<?php echo esc_url( will_asset_url( 'img/logo_black.webp' ) ); ?>" alt="合同会社ウィル" width="100" height="79" decoding="async">
    </a>

    <!-- PCのみ表示（900px未満はドロワーに集約） -->
    <nav class="l-header__nav" aria-label="ヘッダーナビゲーション">
      <ul>
        <li><a href="#benefit">相談で得られること</a></li>
        <li><a href="#feature">ウィルの特徴</a></li>
        <li><a href="#flow">相談までの流れ</a></li>
        <li><a href="#faq">よくいただくご質問</a></li>
      </ul>
    </nav>

    <div class="l-header__ctas">
      <a class="btn btn--dark btn--sm" href="<?php echo esc_url( $bcl_diagnosis_url ); ?>">無料診断（1分）</a>
      <a class="btn btn--ghost btn--sm" href="<?php echo esc_url( $bcl_consult_url ); ?>">無料相談</a>
    </div>

    <!-- ハンバーガー（900px未満のみ表示） -->
    <button class="l-header__toggle" type="button"
            aria-controls="global-nav" aria-expanded="false" aria-label="メニューを開く">
      <span class="l-header__bars" aria-hidden="true"></span>
    </button>
  </div>

  <!-- ドロワー。JSが無効でも中身は読める状態にしておく -->
  <div class="l-nav" id="global-nav" data-nav hidden>
    <div class="l-nav__inner">
      <button class="l-nav__close" type="button" data-nav-close aria-label="メニューを閉じる">×</button>

      <nav aria-label="ページ内ナビゲーション">
        <ul class="l-nav__list">
          <li><a href="#empathy">こんな状態になっていませんか</a></li>
          <li><a href="#cause">問い合わせが増えない原因</a></li>
          <li><a href="#benefit">無料相談で得られること</a></li>
          <li><a href="#feature">わたしたちの無料相談の特徴</a></li>
          <li><a href="#flow">無料相談までの流れ</a></li>
          <li><a href="#message">代表からのメッセージ</a></li>
          <li><a href="#faq">よくいただくご質問</a></li>
        </ul>
      </nav>

      <div class="l-nav__cta">
        <a class="btn btn--dark btn--block" href="<?php echo esc_url( $bcl_diagnosis_url ); ?>">無料診断レポート（1分）</a>
        <a class="btn btn--ghost btn--block" href="<?php echo esc_url( $bcl_consult_url ); ?>">無料相談を申し込む</a>
      </div>
    </div>
  </div>

  <div class="l-nav__overlay" data-nav-overlay hidden></div>
</header>

<main>

  <!-- ========================================
       ① ファーストビュー
       問いかけ帯 → 小見出し → 大見出し → タグ3つ
       → ボタン → テキストリンク → 説明2行
  ======================================== -->
  <section id="fv" class="s-fv">
    <div class="s-fv__inner">

      <div class="s-fv__layout">
        <div class="s-fv__text">
          <!-- 1. 小見出し ＋ 2. 大見出し。1つの h1 にまとめ、
               文字サイズは従来どおり .s-fv__label / .s-fv__title 側で決める -->
          <h1 class="s-fv__heading">
            <span class="s-fv__label">ホームページとBtoBマーケティングの<br>無料相談・無料診断</span>
            <span class="s-fv__title">何から手をつけるべきかを<br class="pc-only">一緒に整理します</span>
          </h1>

          <!-- 3. タグ3つ -->
          <ul class="tag-list s-fv__tags">
            <li class="tag-list__item">BtoB特化</li>
            <li class="tag-list__item">無料診断<br class="sp-br">レポート</li>
            <li class="tag-list__item">相談だけでもOK</li>
          </ul>

          <!-- 4. ボタン2つ -->
          <div class="s-fv__cta">
            <a class="btn btn--dark" href="<?php echo esc_url( $bcl_diagnosis_url ); ?>">無料診断レポート（1分）</a>
            <a class="btn btn--light" href="<?php echo esc_url( $bcl_consult_url ); ?>">無料相談を申し込む</a>
          </div>
        </div>

        <!-- イラスト（透過なので背景に直接置く／LCP対策で lazy は付けない） -->
        <div class="s-fv__figure">
          <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/sub-dashboard-review.webp' ) ); ?>" alt="" width="1000" height="1257" fetchpriority="high" decoding="async">
        </div>
      </div>

      <!-- 7. 説明2行（全幅中央） -->
      <div class="s-fv__desc">
        <p>貴社のBtoBマーケティングの診断レポートを、無料で作成します。</p>
        <p>今の状態と、何から手をつけるべきかが分かります。</p>
      </div>
    </div>
  </section>


  <!-- ========================================
       ② 共感
  ======================================== -->
  <section id="empathy" class="section section--tint s-empathy">
    <div class="section__inner section__inner--wide">
      <div class="section__head" data-fade>
        <span class="eyebrow">CHECK</span>
        <h2 class="heading heading--noBalance">貴社のホームページとマーケティング<br>こんな状態になっていませんか</h2>
      </div>

      <div class="s-empathy__layout">
        <!-- イラスト（装飾）：willgrow PROBLEM と同じく左に置く -->
        <div class="s-empathy__figure" data-fade>
          <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/problem-desk.webp' ) ); ?>" alt="" width="880" height="1081" loading="lazy" decoding="async">
        </div>

        <ul class="check-list check-list--2col" data-fade>
          <li class="check-list__item">
            <span class="check-list__mark" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" focusable="false"><path d="M3.5 10.5l4 4 9-9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <span>新規の受注が、<br class="pc-only"><span class="marker">紹介と既存顧客に偏っている</span></span>
          </li>
          <li class="check-list__item">
            <span class="check-list__mark" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" focusable="false"><path d="M3.5 10.5l4 4 9-9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <span>営業が動ける案件を、<br class="pc-only"><span class="marker">営業自身が探している</span>状態になっている</span>
          </li>
          <li class="check-list__item">
            <span class="check-list__mark" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" focusable="false"><path d="M3.5 10.5l4 4 9-9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <span>Webに投資してきたが、<br class="pc-only"><span class="marker">売上への効果を説明できない</span></span>
          </li>
          <li class="check-list__item">
            <span class="check-list__mark" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" focusable="false"><path d="M3.5 10.5l4 4 9-9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <span>社内に相談できる相手がおらず、<br class="pc-only"><span class="marker">判断の基準がない</span></span>
          </li>
          <li class="check-list__item">
            <span class="check-list__mark" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" focusable="false"><path d="M3.5 10.5l4 4 9-9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <span>何かやらなければとは思うが、<br class="pc-only"><span class="marker">優先順位が決められない</span></span>
          </li>
          <li class="check-list__item">
            <span class="check-list__mark" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" focusable="false"><path d="M3.5 10.5l4 4 9-9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            <span>ホームページはあるが、<br class="pc-only"><span class="marker">そこから問い合わせが生まれていない</span></span>
          </li>
        </ul>
      </div>
    </div>
  </section>


  <!-- ========================================
       ③ 原因
       図解1枚＋短文。図の中に文字は入れない。
  ======================================== -->
  <section id="cause" class="section s-cause">
    <!-- 背景の白透かし（装飾）。白地の上に multiply で置き、白い部分を飛ばしている -->
    <div class="s-cause__bg" aria-hidden="true">
      <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/hero-marketing-network.webp' ) ); ?>" alt="" width="1397" height="878" loading="lazy" decoding="async">
    </div>

    <div class="section__inner">
      <div class="section__head section__head--tight" data-fade>
        <span class="eyebrow">PROBLEM</span>
        <h2 class="heading">BtoBで問い合わせが増えない原因は<br>施策の量ではありません</h2>
      </div>

      <p class="s-cause__text" data-fade>ホームページはあるのに問い合わせが来ない。<br>リードは増えても商談につながらない。<br>BtoBでこうなる原因の多くは、<br><strong>集客・サイト・営業の受け渡しが設計されていない</strong>ことにあります。</p>
    </div>
  </section>


  <!-- ========================================
       ④ 得られること
  ======================================== -->
  <section id="benefit" class="section section--pale s-benefit">
    <div class="section__inner">
      <div class="section__head" data-fade>
        <span class="eyebrow">BENEFIT</span>
        <h2 class="heading">ホームページとBtoBマーケティングの<br>無料相談で得られること</h2>
      </div>

      <div class="cols-3" data-fade>
        <div class="benefit-card">
          <span class="benefit-card__figure" aria-hidden="true">
            <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/fv-web-report.webp' ) ); ?>" alt="" width="900" height="1122" loading="lazy" decoding="async">
          </span>
          <h3 class="benefit-card__title">現在地の把握</h3>
          <p class="benefit-card__text">自社の集客からリード獲得、商談化までが、いまどういう状態にあるかを確認します。</p>
        </div>

        <div class="benefit-card">
          <span class="benefit-card__figure" aria-hidden="true">
            <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/sub-growth-analysis.webp' ) ); ?>" alt="" width="1000" height="923" loading="lazy" decoding="async">
          </span>
          <h3 class="benefit-card__title">改善ポイントと優先順位</h3>
          <p class="benefit-card__text">ホームページのどこに課題があるかを見立て、人手と予算のなかで何から着手すべきかを整理します。</p>
        </div>

        <div class="benefit-card">
          <span class="benefit-card__figure" aria-hidden="true">
            <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/sub-data-analytics.webp' ) ); ?>" alt="" width="1000" height="1004" loading="lazy" decoding="async">
          </span>
          <h3 class="benefit-card__title">どこに投資すべきかの判断軸</h3>
          <p class="benefit-card__text">限られた予算をどこに使うと効くのか。判断の軸を持ち帰っていただきます。</p>
        </div>
      </div>
    </div>
  </section>


  <!-- ========================================
       ⑤ なぜウィルに相談するのか
  ======================================== -->
  <section id="feature" class="section s-feature">
    <div class="section__inner">
      <!-- 右端に断ち落としで置く装飾イラスト（willgrow SOLUTION 型）
           コンテナの右端を基準に置くので、本文には重ならない -->
      <div class="s-feature__bleed" aria-hidden="true">
        <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/sub-team-dashboard.webp' ) ); ?>" alt="" width="1000" height="857" loading="lazy" decoding="async">
      </div>

      <div class="section__head" data-fade>
        <span class="eyebrow">FEATURE</span>
        <h2 class="heading">わたしたちの無料相談の特徴</h2>
      </div>

      <div class="cols-3 s-feature__list" data-fade>
        <div class="feature-item">
          <p class="feature-item__num">01</p>
          <h3 class="feature-item__title">BtoBに特化</h3>
          <p class="feature-item__text">事業会社での10年以上の現場経験から、検討期間が長く決裁者も複数いる前提で見ていきます。</p>
        </div>

        <div class="feature-item">
          <p class="feature-item__num">02</p>
          <h3 class="feature-item__title">マーケティングと営業をつなげて設計</h3>
          <p class="feature-item__text">インサイドセールスの立ち上げ・マネジメント経験。営業プロセスを理解し逆算します。</p>
        </div>

        <div class="feature-item">
          <p class="feature-item__num">03</p>
          <h3 class="feature-item__title">戦略から実行、改善まで</h3>
          <p class="feature-item__text">サイト改善、リード獲得から商談化までの設計と、施策の実行、数値分析や改善提案まで一貫して担当します。</p>
        </div>
      </div>
    </div>
  </section>


  <!-- ========================================
       ⑥ 流れ
       図は文字なし。ステップ名・所要時間は図の外に置く。
  ======================================== -->
  <section id="flow" class="section section--tint s-flow">
    <div class="section__inner">
      <div class="section__head" data-fade>
        <span class="eyebrow">FLOW</span>
        <h2 class="heading">無料相談までの流れ</h2>
      </div>

      <!-- 流れ（1カラム／左に図・右に説明。図の中に文字は入れない） -->
      <div class="flow-steps">
        <div class="flow-step" data-fade>
          <div class="flow-step__figure" aria-hidden="true">
            <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/flow-01.webp' ) ); ?>" alt="" width="320" height="349" loading="lazy" decoding="async">
          </div>

          <div class="flow-step__body">
            <div class="flow-step__head">
              <span class="flow-step__num">1</span>
              <h3 class="flow-step__name">BtoBマーケ無料診断</h3>
            </div>
            <p class="flow-step__time-slot"><span class="flow-step__time">約1分</span></p>
            <p class="flow-step__text">10問に答えるだけです。費用はかかりません。</p>
          </div>
        </div>

        <div class="flow-step" data-fade>
          <div class="flow-step__figure" aria-hidden="true">
            <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/flow-02.webp' ) ); ?>" alt="" width="320" height="340" loading="lazy" decoding="async">
          </div>

          <div class="flow-step__body">
            <div class="flow-step__head">
              <span class="flow-step__num">2</span>
              <h3 class="flow-step__name">診断レポートをお送りします</h3>
            </div>
            <p class="flow-step__text">今の状態と、着手すべき順番をまとめてお返しします。ここまでで十分であれば、レポートだけをお持ち帰りいただいて構いません。</p>
          </div>
        </div>

        <div class="flow-step" data-fade>
          <div class="flow-step__figure" aria-hidden="true">
            <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/flow-03.webp' ) ); ?>" alt="" width="320" height="298" loading="lazy" decoding="async">
          </div>

          <div class="flow-step__body">
            <div class="flow-step__head">
              <span class="flow-step__num">3</span>
              <h3 class="flow-step__name">BtoBマーケ無料相談</h3>
            </div>
            <p class="flow-step__time-slot"><span class="flow-step__time">オンライン30〜60分</span></p>
            <p class="flow-step__text">レポートを土台に、事業の状況と、これからどう伸ばしていきたいかをうかがいます。資料の準備は不要です。オンライン会議ツールで行うため、<span class="marker">全国どこからでも</span>ご相談いただけます。</p>
          </div>
        </div>
      </div>

    </div>
  </section>


  <!-- ========================================
       ⑨ 診断CTA
  ======================================== -->
  <section id="diagnosis" class="section s-diagnosis">
    <div class="section__inner">
      <div class="section__head section__head--tight" data-fade>
        <span class="eyebrow eyebrow--onDark">DIAGNOSIS</span>
        <h2 class="heading heading--onDark">Webサイト・ホームページ<br>マーケティングの無料診断・無料相談</h2>
        <p class="section__lead section__lead--onDark">診断では、ホームページへの集客、サイト内の導線、問い合わせの受け皿という3点を見ていきます。いきなり相談するのは気が重い、という声もいただきます。まずは診断だけでもお試しください。</p>
      </div>

      <div class="s-diagnosis__cards">
        <div class="cta-card" data-fade>
          <h3 class="cta-card__title">まずは現状を把握したい方へ<br>（無料診断）</h3>
          <p class="cta-card__text">10問に答えるだけ・所要時間は約1分。ホームページとマーケティングの現状と、何から手をつけるべきかを整理して、レポートでお送りします。費用はかかりません。</p>
          <a class="btn btn--dark btn--block cta-card__btn" href="<?php echo esc_url( $bcl_diagnosis_url ); ?>">無料診断（約1分）を試す</a>
        </div>

        <div class="cta-card" data-fade>
          <h3 class="cta-card__title">相談内容が固まっている方へ<br>（無料相談）</h3>
          <p class="cta-card__text">オンラインで30〜60分、費用はかかりません。資料のご準備は不要です。お困りの内容と、今後の目指したい状態をうかがいます。</p>
          <a class="btn btn--dark btn--block cta-card__btn" href="<?php echo esc_url( $bcl_consult_url ); ?>">無料相談を申し込む</a>
        </div>
      </div>
    </div>
  </section>


  <!-- ========================================
       ⑦ メッセージ
  ======================================== -->
  <section id="message" class="section s-message">
    <!-- 背景のロゴ透かし（装飾） -->
    <div class="s-message__logo" aria-hidden="true">
      <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/logo-bg.webp' ) ); ?>" alt="" width="754" height="383" loading="lazy" decoding="async">
    </div>

    <div class="section__inner">
      <div class="section__head" data-fade>
        <span class="eyebrow">MESSAGE</span>
        <h2 class="heading">マーケティングと営業を、切り離さない</h2>
      </div>

      <div class="s-message__body" data-fade>
        <p>前職では、BtoB企業のマーケティングを10年以上担当してきました。見込み客を集める仕組みをつくり、インサイドセールスのチームを立ち上げ、そのマネジメントまで一通りやってきました。</p>
        <p>そこで痛感したのは、<span class="marker">「問い合わせを増やすこと」と「売上が上がること」は別の話</span>だということです。数だけ増やしても、営業が動けない相手ばかりでは意味がない。マーケティングと営業を切り離した瞬間に、この感覚は失われます。</p>
        <p>独立してからは、九州を中心にBtoB企業のご相談を受けてきました。多くの会社に共通していたのは、<span class="marker">マーケティング担当がいないこと</span>。そして、外に頼んでも「作って終わり」になってしまうことでした。</p>
        <p>事業をどう伸ばしたいかによって、必要なものは変わります。無料相談を通じて、<span class="marker">判断の軸と、手をつける順番の考え方</span>を持ち帰っていただけたら幸いです。</p>
      </div>

      <!-- 署名カード -->
      <div class="s-message__sign" data-fade>
        <div class="s-message__photo">
          <img src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/images/member-takahashi.webp' ) ); ?>" alt="合同会社ウィル 代表 高橋竜也" width="400" height="398" loading="lazy" decoding="async">
        </div>

        <div class="s-message__signBody">
          <h3 class="s-message__name"><span>合同会社ウィル 代表</span>高橋 竜也</h3>
          <p class="s-message__profile">BtoBマーケティング歴10年以上。<br>インサイドセールスチームの立ち上げとマネジメントを経験。<br>マーケティングと営業プロセスを繋いで、全体を設計します。</p>
        </div>
      </div>
    </div>
  </section>


  <!-- ========================================
       ⑧ FAQ
       details で組み、回答は最初からDOMに出力する。
  ======================================== -->
  <section id="faq" class="section section--pale s-faq">
    <div class="section__inner">
      <div class="section__head" data-fade>
        <span class="eyebrow">FAQ</span>
        <h2 class="heading">よくいただくご質問</h2>
      </div>

      <div class="faq-list" data-fade>
        <details class="faq-item">
          <summary>
            <span class="faq-q" aria-hidden="true">Q</span>
            <span class="faq-label">まだ依頼するかどうかは決まっていない段階ですが、相談してもいいですか？</span>
            <span class="faq-mark" aria-hidden="true"></span>
          </summary>
          <div class="faq-body"><p>はい、その段階でのご相談がほとんどです。無料相談は「何から手をつけるべきか」を整理する場として設けているため、判断材料を持ち帰っていただくことを前提にしています。相談の場で結論を出していただく必要はありません。</p></div>
        </details>

        <details class="faq-item">
          <summary>
            <span class="faq-q" aria-hidden="true">Q</span>
            <span class="faq-label">社内にマーケティングの専任担当者がいなくても相談できますか？</span>
            <span class="faq-mark" aria-hidden="true"></span>
          </summary>
          <div class="faq-body"><p>問題ありません。中小企業のご相談が中心のため、経営者の方や、他の業務と兼任されている方から直接ご相談いただくケースが多くあります。専門用語の前提は置かず、事業の状況からお伺いします。</p></div>
        </details>

        <details class="faq-item">
          <summary>
            <span class="faq-q" aria-hidden="true">Q</span>
            <span class="faq-label">無料相談の前に、無料診断は必ず受ける必要がありますか？</span>
            <span class="faq-mark" aria-hidden="true"></span>
          </summary>
          <div class="faq-body"><p>はい、先に無料診断へご回答いただいています。診断結果というたたき台があることで、状況の説明から始めるのではなく、原因の見立てと優先順位の話から入れるためです。診断はフォームに沿ってお答えいただくだけで、資料の準備は不要です。</p></div>
        </details>

        <details class="faq-item">
          <summary>
            <span class="faq-q" aria-hidden="true">Q</span>
            <span class="faq-label">相談にあたって、事前に準備しておくものはありますか？</span>
            <span class="faq-mark" aria-hidden="true"></span>
          </summary>
          <div class="faq-body"><p>特にありません。事業内容、いま困っていること、今後どのように事業を伸ばしていきたいか、この3点をお伺いしながら進めます。サイトのアクセス状況や問い合わせ件数などが手元にあれば話は早くなりますが、なくてもご相談いただけます。</p></div>
        </details>

        <details class="faq-item">
          <summary>
            <span class="faq-q" aria-hidden="true">Q</span>
            <span class="faq-label">相談したあとは、どのような流れになりますか？</span>
            <span class="faq-mark" aria-hidden="true"></span>
          </summary>
          <div class="faq-body"><p>整理した内容と改善の優先順位をお持ち帰りいただき、社内でご検討いただく形になります。進め方まで具体的に決めたい場合は、そのままご相談を続けていただくこともできます。どちらを選ぶかはご都合に合わせて構いません。</p></div>
        </details>

        <details class="faq-item">
          <summary>
            <span class="faq-q" aria-hidden="true">Q</span>
            <span class="faq-label">福岡以外の企業でも相談できますか？</span>
            <span class="faq-mark" aria-hidden="true"></span>
          </summary>
          <div class="faq-body"><p>はい、全国どこからでもご相談いただけます。無料相談はオンラインで実施しています。</p></div>
        </details>

        <details class="faq-item">
          <summary>
            <span class="faq-q" aria-hidden="true">Q</span>
            <span class="faq-label">ホームページについての相談もできますか？</span>
            <span class="faq-mark" aria-hidden="true"></span>
          </summary>
          <div class="faq-body"><p>はい、ご相談いただけます。ホームページから問い合わせが増えない原因は、集客・導線・受け皿のどこかにあるケースが多いです。無料診断で現状を整理したうえで、Webサイトのどこから手をつけるべきかをお伝えします。</p></div>
        </details>
      </div>
    </div>
  </section>


  <!-- ========================================
       ⑩ 相談フォーム
  ======================================== -->
  <section id="consultation-form" class="section section--tint s-form">
    <div class="section__inner">
      <div class="section__head section__head--tight" data-fade>
        <span class="eyebrow">CONTACT</span>
        <h2 class="heading">ホームページ・BtoBマーケティングの<br>無料相談お申し込み</h2>
      </div>

      <div class="form-card" data-fade>
        <!-- HubSpot 埋め込みフォーム -->
        <div class="hs-form-frame" data-region="na2" data-form-id="<?php echo esc_attr( $bcl_hs_form_id ); ?>" data-portal-id="<?php echo esc_attr( $bcl_hs_portal_id ); ?>"></div>

        <p class="form__privacy">ご入力いただいた個人情報は、ご相談への対応のみに使用します。詳しくは<a href="<?php echo esc_url( $bcl_privacy_url ); ?>">プライバシーポリシー</a>をご確認ください。</p>
      </div>
    </div>
  </section>

</main>


<!-- ============ フッター（コーポレートサイト共通） ============ -->
<?php get_template_part( 'template-parts/footer-common' ); ?>

<!-- 無料診断バナー（900px以上のみ表示）
     FVを通り過ぎたら出て、⑨診断CTA・⑩フォームが画面に入ると引っ込む -->
<aside class="diag-banner" data-diag-banner hidden>
  <button class="diag-banner__close" type="button" data-diag-close aria-label="閉じる">×</button>

  <p class="diag-banner__title">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect width="8" height="4" x="8" y="2" rx="1"></rect><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><path d="m9 14 2 2 4-4"></path></svg>
    無料診断（約1分）はこちら
  </p>

  <p class="diag-banner__text">10の質問に答えるだけ。いまの取り組みのどこに課題がありそうかを整理して、レポートをお送りします。</p>

  <a class="btn btn--primary btn--block diag-banner__btn" href="<?php echo esc_url( $bcl_diagnosis_url ); ?>">
    無料診断を試す
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
  </a>
</aside>

<!-- スマホの追従CTA（900px未満で表示）
     JSは表示/非表示の切り替えのみ。JSが動かない場合は常に表示される。 -->
<div class="sticky-cta" data-sticky-cta>
  <a class="btn btn--dark" href="<?php echo esc_url( $bcl_diagnosis_url ); ?>">無料診断（1分）はこちら</a>
</div>

<!-- HubSpot 埋め込みフォーム -->
<script src="https://js-na2.hsforms.net/forms/embed/<?php echo esc_attr( $bcl_hs_portal_id ); ?>.js" defer></script>
<script src="<?php echo esc_url( will_asset_url( 'btob-consultation-lp-assets/js/main.js' ) ); ?>" defer></script>
<?php wp_footer(); ?>
</body>
</html>
