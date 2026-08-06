<?php
/*
  Template Name: ウィルグロー LP
  Template Post Type: page
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- title / description / OGP / Twitter Card は Slim SEO が wp_head() で出力 -->

  <!-- ========== preconnect ========== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://js-na2.hsforms.net" crossorigin>
  <!-- Zen Maru Gothic = カンプの Corporate Logo ver2（Web配信なし）の代替書体。FVのロゴタイプ/アイブロー/バッジで使用 -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&family=Zen+Maru+Gothic:wght@500;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo esc_url( will_asset_url( 'will-grow-assets/style.css' ) ); ?>">

  <!-- ========== 構造化データ JSON-LD ========== -->
  <!-- (1) Service + Offer -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "ウィルグロー",
    "serviceType": "BtoB集客・問い合わせ獲得・商談創出支援",
    "areaServed": "JP",
    "description": "ウィルグローは、コンテンツSEO・導線改善・マーケティングオートメーションを組み合わせ、BtoB企業の集客から問い合わせ獲得・育成・商談創出までを一本の仕組みとして設計・運用するサービスです。",
    "provider": {
      "@type": "Organization",
      "name": "合同会社ウィル",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "JP",
        "addressRegion": "福岡県",
        "addressLocality": "福岡市博多区"
      }
    },
    "offers": [
      { "@type": "Offer", "name": "ライト｜課題診断・改善提案（月額100,000円／初期費用0円）", "price": "100000", "priceCurrency": "JPY" },
      { "@type": "Offer", "name": "スタンダード｜問い合わせ獲得支援（初期費用200,000円／月額200,000円）", "price": "200000", "priceCurrency": "JPY" },
      { "@type": "Offer", "name": "プレミアム｜商談創出支援（初期費用600,000円／月額300,000円）", "price": "300000", "priceCurrency": "JPY" }
    ]
  }
  </script>

  <!-- (2) FAQPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      { "@type": "Question", "name": "「無料診断」と「無料相談」は何が違いますか？", "acceptedAnswer": { "@type": "Answer", "text": "「無料診断」は、10問に答えるだけ・約1分のセルフ診断です。御社の現状を構造的に分析し、強み・改善点・優先順位をレポートにまとめてお送りします。まず現状を手早く把握したい方に最適です。一方「無料相談」は、担当者とオンライン（30〜60分）で直接お話しいただき、課題や目標をヒアリングしたうえで改善の方向性・進め方を具体的にご提案します。「無料診断」の結果をお持ちいただくと、相談がよりスムーズです。" } },
      { "@type": "Question", "name": "費用に見合う成果は、本当に出ますか？", "acceptedAnswer": { "@type": "Answer", "text": "成果をお約束することはできませんが、私たちは「投資が回収できるか」を常に意識して設計します。だからこそ、最初に無料相談で課題分析を行い、現実的に見込める成果と優先順位を正直にお伝えします。いきなり高額なプランではなく、低リスクなライトプランから始めていただくこともできます。" } },
      { "@type": "Question", "name": "どのくらいの支援実績がありますか？", "acceptedAnswer": { "@type": "Answer", "text": "運営する合同会社ウィルは、BtoB企業のWeb支援を50社以上、ご相談を200回以上手がけてきました。あわせて、私たち自身がこの仕組みで自社集客を実践・検証しています。実績だけでなく、まずは無料診断でその精度をご確認ください。" } },
      { "@type": "Question", "name": "社内にWebやマーケティングに詳しい人がいなくても大丈夫ですか？", "acceptedAnswer": { "@type": "Answer", "text": "問題ありません。むしろ「専任担当がいない」企業こそ、私たちの支援が活きます。専門用語をかみ砕いてご説明し、判断に必要な材料を整理してお渡しします。担当者が一人でも回せる体制づくりまで含めて支援します。" } },
      { "@type": "Question", "name": "何から始めればいいか分からない段階でも相談できますか？", "acceptedAnswer": { "@type": "Answer", "text": "もちろんです。「課題が漠然としている」「やることが多すぎて手が回らない」という状態が、ちょうど出発点です。無料診断で現状を整理し、まず何から手をつけるべきかを一緒に明確にします。" } },
      { "@type": "Question", "name": "どこまで自社で対応が必要ですか？丸投げでも進みますか？", "acceptedAnswer": { "@type": "Answer", "text": "プランによります。実行部分（戦略設計・コンテンツ制作・導線改善・運用など）は私たちが手を動かすため、丸投げに近い形でも進められます。一方で、自社の情報や現場の声は成果に直結するため、ヒアリングや確認などで一定のご協力をお願いします。" } },
      { "@type": "Question", "name": "すでに制作会社やSEO会社に依頼していますが、併用できますか？", "acceptedAnswer": { "@type": "Answer", "text": "併用可能です。既存のパートナーの役割を尊重しつつ、全体の設計・運用を横断して整理する立場として伴走できます。何をどこに任せるべきか、役割分担の交通整理からお手伝いします。" } },
      { "@type": "Question", "name": "もし成果が出なかったら、どうなりますか？", "acceptedAnswer": { "@type": "Answer", "text": "成果が出ない場合も、原因をデータで分析し、次の打ち手を一緒に考えます。成果が出るまで施策を見直し続けるのが伴走型の役割です。なお、ライト・スタンダードは月単位での見直し・解約が可能なため、合わないと感じた場合のリスクも抑えられます。" } },
      { "@type": "Question", "name": "契約期間や解約の縛りはありますか？", "acceptedAnswer": { "@type": "Answer", "text": "ライト・スタンダードは月単位の自動更新です（解約は1ヶ月前のお申し出）。プレミアムのみ、初期集中支援として目安6ヶ月をお願いしています。" } },
      { "@type": "Question", "name": "マーケティングオートメーション（MA）ツールは必須ですか？既存のツールは活かせますか？", "acceptedAnswer": { "@type": "Answer", "text": "必須ではありません。プレミアムプランでは商談化の仕組み化にMAツールを活用しますが、ライト・スタンダードでは不要です。導入するツールは特定の製品に限定せず、御社の状況や既存環境に合わせて最適なものをご提案します。すでにお使いのツールがある場合は、それを活かす形で設計します。" } },
      { "@type": "Question", "name": "成果が出るまで、どのくらいかかりますか？", "acceptedAnswer": { "@type": "Answer", "text": "施策やサイトの状況によります。問い合わせ導線の改善は数ヶ月、コンテンツSEOによる集客は半年〜が目安です。初回の課題分析で、現実的な見込みをお伝えします。" } },
      { "@type": "Question", "name": "無料相談をすると、契約を迫られませんか？", "acceptedAnswer": { "@type": "Answer", "text": "売り込みは一切しません。無料相談は、御社の現状を把握し、改善の方向性をお伝えするためのものです。その場で契約を決めていただく必要はなく、方向性のご提案だけお持ち帰りいただいても構いません。" } },
      { "@type": "Question", "name": "地方の企業でも対応できますか？", "acceptedAnswer": { "@type": "Answer", "text": "対応可能です。打ち合わせはオンライン中心で、全国の企業様を支援しています。" } },
      { "@type": "Question", "name": "記事制作だけ依頼できますか？", "acceptedAnswer": { "@type": "Answer", "text": "単発の記事制作も承ります。ただしウィルグローは、記事を含めた集客〜商談化の仕組み全体を設計するサービスです。記事単体をご希望の場合は、一度ご相談ください。" } }
    ]
  }
  </script>

  <?php wp_head(); ?>
</head>
<body>

  <!-- ============ ヘッダー（FVから常時表示・スクロールで背景） ============ -->
  <header class="wg-header" id="wgHeader">
    <div class="wg-container wg-header__inner">
      <a href="#wg-hero" class="wg-header__logo">
        <img class="wg-header__logo-img" src="<?php echo esc_url( will_asset_url( 'will-grow-assets/images/header-logo.webp' ) ); ?>" alt="ウィルグロー" width="495" height="107" decoding="async">
      </a>
      <nav class="wg-header__nav" aria-label="主要導線">
        <ul class="wg-header__links">
          <li><a href="#wg-about" class="wg-header__link">ウィルグローとは</a></li>
          <li><a href="#wg-compare" class="wg-header__link">他社との違い</a></li>
          <li><a href="#wg-service" class="wg-header__link">支援内容</a></li>
          <li><a href="#wg-pricing" class="wg-header__link">プラン</a></li>
          <li><a href="#wg-flow" class="wg-header__link">導入の流れ</a></li>
          <li><a href="#wg-faq" class="wg-header__link">よくある質問</a></li>
        </ul>
        <a href="#wg-form" class="wg-btn wg-btn--accent wg-btn--sm" data-cta="header-soudan">無料相談はこちら</a>
      </nav>
      <button class="wg-burger" id="wgBurger" type="button" aria-label="メニューを開く" aria-expanded="false" aria-controls="wgDrawer">
        <span></span><span></span><span></span>
      </button>
    </div>
    <nav class="wg-drawer" id="wgDrawer" aria-label="モバイルメニュー">
      <ul class="wg-drawer__links">
        <li><a href="#wg-about">ウィルグローとは</a></li>
        <li><a href="#wg-compare">他社との違い</a></li>
        <li><a href="#wg-service">支援内容</a></li>
        <li><a href="#wg-pricing">プラン</a></li>
        <li><a href="#wg-flow">導入の流れ</a></li>
        <li><a href="#wg-faq">よくある質問</a></li>
      </ul>
      <div class="wg-drawer__actions">
        <a href="#wg-form" class="wg-btn wg-btn--accent wg-btn--block" data-cta="drawer-soudan">無料相談はこちら</a>
        <a href="https://will-corp.co.jp/diagnosis/" class="wg-btn wg-btn--ghost wg-btn--block" target="_blank" rel="noopener" data-cta="drawer-shindan">無料診断レポート</a>
      </div>
    </nav>
  </header>

  <main>

    <!-- ============ 1. ファーストビュー ============ -->
    <section class="wg-hero" id="wg-hero">
      <div class="wg-container">
        <div class="wg-hero__grid">
          <div class="wg-hero__content">
            <p class="wg-hero__eyebrow">BtoBマーケティング伴走支援</p>

            <h1 class="wg-hero__logotype">
              <img class="wg-hero__logotype-img" src="<?php echo esc_url( will_asset_url( 'will-grow-assets/images/hero-logotype.webp' ) ); ?>" alt="ウィルグロー" width="1130" height="240" fetchpriority="high" decoding="async">
              <span class="wg-visually-hidden">｜BtoB企業の集客・問い合わせ獲得から育成・商談化までを仕組み化する伴走支援サービス</span>
            </h1>

            <ul class="wg-hero__badges">
              <li class="wg-hero__badge">お問い合わせ<br>獲得</li>
              <li class="wg-hero__badge">見込み顧客の<br>育成</li>
              <li class="wg-hero__badge">商談を増やす</li>
            </ul>
          </div>

          <div class="wg-hero__visual">
            <img class="wg-hero__illust" src="<?php echo esc_url( will_asset_url( 'will-grow-assets/images/hero-illust.webp' ) ); ?>" alt="BtoBマーケティングの数値を見ながら打ち合わせをするチームのイラスト" width="775" height="543" fetchpriority="high" decoding="async">
          </div>
        </div>

        <p class="wg-hero__lead">
          御社のマーケティング部門として問い合わせの獲得から育成・商談化までを仕組み化。<br class="wg-hero__lead-br">安定した見込み顧客の創出を実現します。
        </p>
      </div>
    </section>

    <!-- ============ 2. こんなお悩みはありませんか？ ============ -->
    <section class="wg-section wg-section--pale" id="wg-issue">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="ISSUE">こんなお悩みは<br class="wg-br-sp">ありませんか？</h2>

        <div class="wg-issue-groups">
          <div class="wg-issue-card">
            <h3 class="wg-issue-card__label">集客の課題</h3>
            <ul class="wg-dotlist">
              <li>展示会や紹介に加えて、Webからも安定して集客できる柱がほしい</li>
              <li>Web・マーケティングの専任担当がおらず、何から手をつければいいか分からない</li>
            </ul>
          </div>
          <div class="wg-issue-card">
            <h3 class="wg-issue-card__label">お問合せ獲得の課題</h3>
            <ul class="wg-dotlist">
              <li>Webサイトはあるが、問い合わせにつながっていない</li>
              <li>アクセスはあるのに、問い合わせや商談に結びつかない</li>
            </ul>
          </div>
          <div class="wg-issue-card">
            <h3 class="wg-issue-card__label">商談化・仕組み化の課題</h3>
            <ul class="wg-dotlist">
              <li>獲得した名刺やリードを、商談に活かしきれていない</li>
              <li>担当者によって成果にばらつきがあり、集客が仕組みになっていない</li>
            </ul>
          </div>
        </div>

        <p class="wg-lead-emphasis">これらの背景には、<br class="wg-br-sp"><span class="wg-marker">ある共通した原因</span>があります。</p>
      </div>
    </section>

    <!-- ============ 3. 問い合わせや商談が増えない本当の理由 ============ -->
    <section class="wg-section" id="wg-why">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="WHY">問い合わせや商談が<br class="wg-br-sp">増えない本当の理由</h2>
        <ol class="wg-cause">
          <li class="wg-cause__item">
            <span class="wg-cardnum">01</span>
            <h3 class="wg-cause__title">集客の仕組みがなく、<br>サイトに見込み顧客が来ていない</h3>
            <hr class="wg-card-rule">
            <p class="wg-cause__text">検索で見つけてもらうためのコンテンツがなく、広告やSNSなどの集客の入口も整っていない。サイトは「あるだけ」で、人を呼ぶ仕組みになっていません。</p>
          </li>
          <li class="wg-cause__item">
            <span class="wg-cardnum">02</span>
            <h3 class="wg-cause__title">来てくれても、<br>“自分に合うか”の判断材料が足りない</h3>
            <hr class="wg-card-rule">
            <p class="wg-cause__text">サービスの内容や他社との違いが伝わらず、訪れた人が「自分に合うか」を判断できない。次の行動を促す導線もなく、問い合わせまで運ぶ設計が抜けています。</p>
          </li>
          <li class="wg-cause__item">
            <span class="wg-cardnum">03</span>
            <h3 class="wg-cause__title">温度感に合った入口がなく、<br>問い合わせのハードルが高い</h3>
            <hr class="wg-card-rule">
            <p class="wg-cause__text">「お問い合わせ」フォームしか受け皿がないため、「まだ問い合わせるほどではない」と感じた有望な見込み顧客が、一歩手前で離脱してしまう。資料請求や無料相談など、検討の初期段階で受け止める入口がありません。</p>
          </li>
          <li class="wg-cause__item">
            <span class="wg-cardnum">04</span>
            <h3 class="wg-cause__title">育てる仕組みがなく、<br>集めた名刺や見込み顧客が眠ったまま</h3>
            <hr class="wg-card-rule">
            <p class="wg-cause__text">名刺交換や過去の問い合わせで得た見込み顧客の情報が、ほとんど活用されていない。興味度や潜在ニーズを引き出して商談へと育てる、ナーチャリングの仕組みがありません。</p>
          </li>
        </ol>

        <p class="wg-bridge">成果を出す方法はたったひとつです。</p>

        <!-- 署名モチーフ：分断（点） -->
        <figure class="wg-broken" aria-label="集客・問い合わせ獲得・商談化が分断されている状態">
          <div class="wg-broken__track">
            <div class="wg-broken__node">集客</div>
            <span class="wg-broken__cut" aria-hidden="true"></span>
            <div class="wg-broken__node">問い合わせ獲得</div>
            <span class="wg-broken__cut" aria-hidden="true"></span>
            <div class="wg-broken__node">商談化</div>
          </div>
          <figcaption class="wg-broken__caption">
            集客・問い合わせ獲得・商談化の各フェーズを、<br>適切な打ち手でつなげて初めて、案件・受注は伸びていく。
          </figcaption>
        </figure>

        <div class="wg-prose">
          <p>成果が出ないのは、施策が間違っているわけではありません。フェーズごとの施策が<span class="wg-marker">つながらず、連動していない</span>ために、成果に結びつきずらいだけです。だからこそ必要なのは、施策を増やすことではなく、集客から商談化までを一本につなぐ<span class="wg-marker">「設計」と「仕組み化」</span>です。</p>
        </div>
      </div>
    </section>

    <!-- ============ 4. ウィルグローとは ============ -->
    <section class="wg-section wg-section--primary" id="wg-about">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="ABOUT">ウィルグローとは</h2>
        <p class="wg-about__catch">問い合わせと商談を獲得する仕組みを<br>まるごと設計・運用・伴走するサービスです。</p>

        <!-- 署名モチーフ：接続（一本のファネル）＋説明文 -->
        <figure class="wg-funnel-fig">
          <ol class="wg-funnel" aria-label="集客から受注までを一本につなぐ仕組み">
            <li class="wg-funnel__step"><span class="wg-funnel__label">集客</span></li>
            <li class="wg-funnel__step"><span class="wg-funnel__label">リード獲得</span></li>
            <li class="wg-funnel__step"><span class="wg-funnel__label">見込み顧客の育成</span></li>
            <li class="wg-funnel__step"><span class="wg-funnel__label">商談創出</span></li>
            <li class="wg-funnel__step wg-funnel__step--goal"><span class="wg-funnel__label">受注</span></li>
          </ol>
          <figcaption class="wg-funnel-fig__desc">BtoBの購買は、<br><span class="wg-stage">知ってもらう（認知）</span>→ <span class="wg-stage">興味を持ってもらう（興味関心）</span>→ <span class="wg-stage">検討を深めてもらう（比較検討）</span>→ <span class="wg-stage">購入<br></span>につなげる、という段階を踏みます。<br>ウィルグローは、この流れ全体を<span class="wg-marker">ひとつの仕組みとして設計します</span>。</figcaption>
        </figure>

        <div class="wg-prose wg-prose--on-primary">
          <p class="wg-about__lead">具体的には、以下のような施策を組み合わせながら、<br><span class="wg-about__lead-em">見込み顧客の獲得から商談化まで</span>を支援します。</p>
          <ul class="wg-about__list">
            <li>コンテンツSEOによる見込み顧客の獲得</li>
            <li>問い合わせにつながるWebサイト導線・コンバージョン改善</li>
            <li>メールやMA（マーケティングオートメーション）を活用した見込み顧客の育成</li>
            <li>既存顧客情報や名刺情報の活用</li>
            <li>商談化に向けたフォロー設計と改善</li>
          </ul>
          <p>私たちは、施策の<span class="wg-marker">一部分だけを請け負うのではありません</span>。</p>
          <p>見込み顧客の獲得から育成、商談化までを<span class="wg-marker">一つの流れとして捉え</span>、現状分析から戦略設計、施策実行、改善までを伴走支援します。</p>
          <p><span class="wg-marker">継続的に問い合わせや商談が生まれる仕組み</span>を構築し、営業成果につながるマーケティングを実現します。</p>
        </div>
      </div>
    </section>

    <!-- ============ 5. ウィルグローが選ばれる3つの理由 ============ -->
    <section class="wg-section wg-section--pale" id="wg-reasons">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="REASON">ウィルグローが<br class="wg-br-sp">選ばれる3つの理由</h2>

        <div class="wg-reasons">
          <article class="wg-reason">
            <span class="wg-cardnum">01</span>
            <h3 class="wg-reason__title">お問合せ獲得から商談化までをご支援</h3>
            <hr class="wg-card-rule">
            <p class="wg-reason__text">多くの集客支援は、アクセスや問い合わせを増やすところで役割が終わります。しかし、企業が本当に求めているのは「商談」と「受注」です。ウィルグローは、問い合わせのその先——商談につながるかどうかまでを見据えて設計します。</p>
            <p class="wg-result">→ 問い合わせ獲得で終わらせず、<span class="wg-marker">商談・受注につながる仕組み</span>まで設計します。</p>
          </article>
          <article class="wg-reason">
            <span class="wg-cardnum">02</span>
            <h3 class="wg-reason__title">中小企業が、実際に運用できる仕組みを設計</h3>
            <hr class="wg-card-rule">
            <p class="wg-reason__text">大企業向けの理想的なマーケティングを持ち込んでも、人手も予算も限られる中小企業では回りません。担当者が一人でも続けられること、特定の人に依存しないことを前提に、現実的な体制から仕組みを設計します。</p>
            <p class="wg-result">→ 立派さより<span class="wg-marker">回り続けること</span>を優先するから、現場で定着します。</p>
          </article>
          <article class="wg-reason">
            <span class="wg-cardnum">03</span>
            <h3 class="wg-reason__title">戦略だけでなく、実行と運用まで伴走</h3>
            <hr class="wg-card-rule">
            <p class="wg-reason__text">分析して提案して終わり、では成果は生まれません。戦略の設計だけでなく、コンテンツ制作や導線改善といった実行、そして公開後の運用・改善まで一緒に手を動かします。</p>
            <p class="wg-result">→ 提案で終わらせず、<span class="wg-marker">成果が出るまで一緒に手を動かし続けます</span>。</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ============ 前半CTA（REASON直後・トーン軽め） ============ -->
    <section class="wg-monitor wg-monitor--soft" id="wg-cta-mid">
      <div class="wg-container">
        <div class="wg-monitor__inner">
          <h2 class="wg-monitor__title">まずは<span class="wg-monitor__hl">無料診断</span>で、<br class="wg-monitor__br">御社の課題を<span class="wg-monitor__hl">見える化</span>しませんか。</h2>
          <p class="wg-monitor__text">
            10問に答えるだけ・約1分。運用体制・施策・課題を構造的に分析し、強み・改善点・優先順位をレポートにまとめてお送りします。「何から始めればいいか分からない」段階でも問題ありません。
          </p>
          <div class="wg-monitor__cta wg-cta-group wg-cta-group--center">
            <a href="https://will-corp.co.jp/diagnosis/" class="wg-btn wg-btn--lg wg-btn--on-monitor" target="_blank" rel="noopener" data-cta="mid-shindan">無料診断（1分）を試す</a>
            <a href="#wg-form" class="wg-btn wg-btn--lg wg-btn--ghost-on-dark" data-cta="mid-soudan">無料相談を申し込む</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ============ 6. ウィルグローが生まれた理由 ============ -->
    <section class="wg-section" id="wg-origin">
      <div class="wg-container wg-container--narrow">
        <h2 class="wg-section__title" data-label="WHY WILLGROW">サイトもSEOもやっている<br>それでも問い合わせが増えない理由</h2>
        <div class="wg-prose">
          <p>自社にマーケティング部門を持たないBtoB企業では、全体を設計する担当が社内にいないため、SEO・SNS・MA・サイト制作の施策が個別で動くことが多いです。その時々で必要だと感じた施策を進めていくぶん、一つひとつは正しくても、施策同士がつながらない<span class="wg-marker">「個別最適」</span>に陥ってしまい、思うような効果が出ないケースを多く見てきました。</p>
          <p>ウィルグローは、この「個別最適」を解消し、<strong>集客から商談創出までを一本でつなぐ</strong>——BtoBに特化したワンストップ支援で、<span class="wg-marker">貴社のマーケティング部門として伴走します。</span></p>
          <p>弊社では、BtoBマーケティングとWebサイト構築の両方を、実務として積み重ねてきました。「作る」視点と「成果を生む」視点の両方を持っているからこそ、施策を分断させず、一本の仕組みとして設計できます。また、BtoBマーケティング歴10年以上・Web制作歴7年以上の経験を活かし、<span class="wg-marker">私たち自身が自社の集客でこの方法を実践しています。</span></p>
          <p>実際の数値としては、コンテンツ施策を始めてから半年ほどで、検索を中心にサイトへのアクセスは<span class="wg-num">約2.5倍</span>に増えました。今では流入の<span class="wg-num">約6割</span>がオーガニック検索です。さらにサイトの動線を見直し、無料診断や無料相談といった入口を整えたところ、翌月にはWeb経由の問い合わせ（無料診断・無料相談の申し込みを含む）が<span class="wg-num">2倍</span>に増えました。いずれもGA4やMAで計測しながら運用しています。</p>
          <p><span class="wg-marker">まず自分たちで成果を確かめる。</span>そうして得た知見を再現性のある形に整理し、お客様のご支援に活かしております。</p>
        </div>
      </div>
    </section>

    <!-- ============ 7. 他社との違い（比較表） ============ -->
    <section class="wg-section wg-section--pale" id="wg-compare">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="COMPARISON">他社との違い</h2>
        <div class="wg-table-wrap">
          <table class="wg-compare">
            <thead>
              <tr>
                <th scope="col">項目</th>
                <th scope="col">制作会社</th>
                <th scope="col">SEO会社</th>
                <th scope="col">MA導入会社</th>
                <th scope="col">マーケコンサル</th>
                <th scope="col" class="wg-compare__own">ウィルグロー</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Webサイト制作・デザイン</th>
                <td><span class="wg-mark wg-mark--ok">○</span></td>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--mid">△</span><small class="wg-compare__sub">外部委託</small></td>
                <td class="wg-compare__own"><span class="wg-mark wg-mark--ok">○</span></td>
              </tr>
              <tr>
                <th scope="row">SEO・検索集客</th>
                <td><span class="wg-mark wg-mark--mid">△</span></td>
                <td><span class="wg-mark wg-mark--ok">○</span></td>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--mid">△</span><small class="wg-compare__sub">外部委託</small></td>
                <td class="wg-compare__own"><span class="wg-mark wg-mark--ok">○</span></td>
              </tr>
              <tr>
                <th scope="row">リード獲得</th>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--ok">○</span></td>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--mid">△</span><small class="wg-compare__sub">外部委託</small></td>
                <td class="wg-compare__own"><span class="wg-mark wg-mark--ok">○</span></td>
              </tr>
              <tr>
                <th scope="row">リード育成（ナーチャリング）</th>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--ok">○</span></td>
                <td><span class="wg-mark wg-mark--mid">△</span><small class="wg-compare__sub">外部委託</small></td>
                <td class="wg-compare__own"><span class="wg-mark wg-mark--ok">○</span></td>
              </tr>
              <tr>
                <th scope="row">商談化支援</th>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--ok">○</span></td>
                <td><span class="wg-mark wg-mark--mid">△</span><small class="wg-compare__sub">外部委託</small></td>
                <td class="wg-compare__own"><span class="wg-mark wg-mark--ok">○</span></td>
              </tr>
              <tr>
                <th scope="row">ファネル全体の横断設計・運用改善</th>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--no">×</span></td>
                <td><span class="wg-mark wg-mark--mid">△</span></td>
                <td><span class="wg-mark wg-mark--ok">○</span></td>
                <td class="wg-compare__own"><span class="wg-mark wg-mark--ok">○</span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="wg-prose wg-compare__note-prose">
          <p>どの会社にも、それぞれの強みがあります。制作会社は「作る」ことに、SEO会社は「集める」ことに、MA導入会社は「育てる」ことに、マーケコンサルは「戦略を描く」ことに長けています。</p>
          <p>ただしマーケコンサルの場合、戦略設計は担っても、制作・SEO・MAといった実際の施策は外部の専門会社へ委託するのが一般的です。そのため、<strong>コンサル費用に加えて各実行会社への費用が重なり、トータルの費用が膨らみやすくなります。</strong></p>
          <p>ウィルグローは、戦略の設計から実行・運用までを自社で一気通貫に担います。分断されがちな各領域を一本の仕組みとしてつなぐことで、窓口も費用も一本化できる——そこに私たちの価値があります。</p>
        </div>
      </div>
    </section>

    <!-- ============ 8. 支援内容（5ステップ） ============ -->
    <section class="wg-section" id="wg-service">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="SERVICE">支援内容</h2>

        <ol class="wg-steps">
          <li class="wg-steps__item">
            <span class="wg-steps__pill">STEP 01</span>
            <div class="wg-steps__body">
              <h3 class="wg-steps__title">課題分析</h3>
              <p class="wg-steps__text">GA4・Search Console・導線・コンバージョンを分析し、「どこで成果が止まっているのか」を数字で特定します。感覚や思い込みではなく、データに基づいて現状を可視化することが、すべての出発点です。ここで打ち手の優先順位が決まります。</p>
            </div>
          </li>
          <li class="wg-steps__item">
            <span class="wg-steps__pill">STEP 02</span>
            <div class="wg-steps__body">
              <h3 class="wg-steps__title">戦略設計</h3>
              <p class="wg-steps__text">特定した課題に対して、SEO戦略・コンテンツ戦略・KPI・ナーチャリング設計を組み立てます。「何を・どの順番で・どこまでやれば成果につながるか」を設計図にし、ゴールと道筋を明確にします。</p>
            </div>
          </li>
          <li class="wg-steps__item">
            <span class="wg-steps__pill">STEP 03</span>
            <div class="wg-steps__body">
              <h3 class="wg-steps__title">問い合わせ獲得</h3>
              <p class="wg-steps__text">コンテンツSEOで検索からの集客を増やし、サイトの導線とコンバージョンを改善して、アクセスを問い合わせに変えます。来訪者の検討段階に合わせた受け皿を用意し、問い合わせのハードルを下げます。</p>
            </div>
          </li>
          <li class="wg-steps__item">
            <span class="wg-steps__pill">STEP 04</span>
            <div class="wg-steps__body">
              <h3 class="wg-steps__title">商談創出</h3>
              <p class="wg-steps__text">マーケティングオートメーション（MA）の構築、メールマーケティング、リード育成、スコアリングによって、獲得したリードを商談につながるまで育てます。属人的な追客から脱し、商談が生まれる流れを仕組みにします。</p>
            </div>
          </li>
          <li class="wg-steps__item">
            <span class="wg-steps__pill">STEP 05</span>
            <div class="wg-steps__body">
              <h3 class="wg-steps__title">改善運用</h3>
              <p class="wg-steps__text">公開して終わりではありません。成果を計測し、改善提案とPDCAを回し続けることで、仕組みを継続的に磨きます。市場や自社の状況の変化に合わせて、成果を伸ばし続けます。</p>
            </div>
          </li>
        </ol>
      </div>
    </section>

    <!-- ============ 9. こんな企業におすすめ ============ -->
    <section class="wg-section wg-section--pale" id="wg-whofor">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="FOR YOU">こんな企業におすすめ</h2>

        <div class="wg-whofor-cards">
          <article class="wg-whofor-card">
            <span class="wg-whofor-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </span>
            <span class="wg-whofor-card__tag">専任担当のいないBtoB企業</span>
            <p class="wg-whofor-card__text">Web・マーケが経営者直轄や兼任で進んでいて、どうしても属人的・場当たり的になりがち。担当者ひとりでも回り続ける、仕組み化された集客の入口をつくりたい。</p>
          </article>
          <article class="wg-whofor-card">
            <span class="wg-whofor-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M17 18h1"/><path d="M12 18h1"/><path d="M7 18h1"/></svg>
            </span>
            <span class="wg-whofor-card__tag">製造業・メーカー</span>
            <p class="wg-whofor-card__text">技術力や品質には自信があるのに、Webでは伝わらず価格競争に巻き込まれている。展示会や紹介に頼らない、安定した引き合いの入口を持ちたい。</p>
          </article>
          <article class="wg-whofor-card">
            <span class="wg-whofor-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
            </span>
            <span class="wg-whofor-card__tag">印刷・加工業</span>
            <p class="wg-whofor-card__text">既存取引の先細りに危機感はあるが、新規開拓を何から始めればいいか分からない。小ロットや特殊加工といった強みを、それを探している相手に届く形で仕組み化したい。</p>
          </article>
          <article class="wg-whofor-card">
            <span class="wg-whofor-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
            </span>
            <span class="wg-whofor-card__tag">繊維・アパレルOEM／専門商社</span>
            <p class="wg-whofor-card__text">紹介や既存ルート中心の集客に限界を感じている。これまで出会えなかった取引先と、自社から能動的につながれる流れをつくりたい。</p>
          </article>
          <article class="wg-whofor-card">
            <span class="wg-whofor-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </span>
            <span class="wg-whofor-card__tag">BtoB向けサービス業（士業・IT・コンサル等）</span>
            <p class="wg-whofor-card__text">問い合わせはあっても「とりあえず相談」止まりで、受注単価が伸びない。検討初期のリードを育て、商談化の確度と単価を上げたい。</p>
          </article>
          <article class="wg-whofor-card">
            <span class="wg-whofor-card__icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/></svg>
            </span>
            <span class="wg-whofor-card__tag">建設・設備・住宅関連のBtoB</span>
            <p class="wg-whofor-card__text">地場の紹介や指名検索に依存していて、Web経由の安定した引き合いがない。エリアを越えて見つけてもらえる状態をつくり、受注を増やしたい。</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ============ 10. プラン一覧 ============ -->
    <section class="wg-section" id="wg-pricing">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="PRICING">プラン一覧</h2>

        <div class="wg-plans">
          <article class="wg-plan">
            <h3 class="wg-plan__name">ライト</h3>
            <p class="wg-plan__purpose">課題診断・改善提案</p>
            <p class="wg-plan__price">
              <span class="wg-plan__monthly">月額 100,000円</span>
              <span class="wg-plan__init">初期費用 0円</span>
            </p>
            <p class="wg-plan__heading">受けられる主な支援：</p>
            <ul class="wg-plan__list">
              <li>現状分析（GA4・Search Console・導線・コンバージョン）</li>
              <li>課題の特定と見える化</li>
              <li>改善の優先順位をまとめた提案</li>
            </ul>
          </article>

          <article class="wg-plan">
            <h3 class="wg-plan__name">スタンダード</h3>
            <p class="wg-plan__purpose">問い合わせ獲得支援</p>
            <p class="wg-plan__price">
              <span class="wg-plan__monthly">月額 200,000円</span>
              <span class="wg-plan__init">初期費用 200,000円</span>
            </p>
            <p class="wg-plan__heading">ライトの内容に加えて：</p>
            <ul class="wg-plan__list">
              <li>SEO・コンテンツ戦略の設計とKPI設定</li>
              <li>コンテンツSEO（記事の制作・改善）</li>
              <li>問い合わせ導線・コンバージョンの改善</li>
              <li>月次での運用・改善</li>
            </ul>
          </article>

          <article class="wg-plan">
            <h3 class="wg-plan__name">プレミアム</h3>
            <p class="wg-plan__purpose">商談創出支援</p>
            <p class="wg-plan__price">
              <span class="wg-plan__monthly">月額 300,000円</span>
              <span class="wg-plan__init">初期費用 600,000円</span>
            </p>
            <p class="wg-plan__heading">スタンダードの内容に加えて：</p>
            <ul class="wg-plan__list">
              <li>マーケティングオートメーション（MA）ツールの構築・設定</li>
              <li>メールマーケティング／リード育成（ナーチャリング）</li>
              <li>スコアリングによる商談化の仕組みづくり</li>
            </ul>
          </article>
        </div>

        <div class="wg-option">
          <div class="wg-option__head">
            <span class="wg-option__tag">オプション</span>
            <h3 class="wg-option__name">ウィルサポ</h3>
            <p class="wg-option__lead">BtoB特化・サブスク型のホームページ制作／運用</p>
          </div>
          <ul class="wg-option__features">
            <li>BtoBに特化したお問い合わせ、リード獲得に強いサイト設計</li>
            <li>営業構造から逆算したWeb戦略設計・導線設計</li>
            <li>テンプレートに頼らないフルオーダーデザイン</li>
            <li>戦略設計から公開後の運用・改善まで、月額制で一貫して伴走</li>
            <li>Web専任担当が不在でも、更新・改善が止まらない</li>
          </ul>
        </div>

        <div class="wg-cta-group wg-cta-group--center wg-pricing__cta">
          <a href="<?php echo esc_url( home_url('/willsupport/') ); ?>" class="wg-btn wg-btn--accent wg-btn--lg" target="_blank" rel="noopener" data-cta="pricing-willsupport">ウィルサポの詳細はこちら</a>
        </div>
      </div>
    </section>

    <!-- ============ モニター企業募集（バナー・プラン一覧直下） ============ -->
    <section class="wg-monitor" id="wg-monitor">
      <div class="wg-container">
        <div class="wg-monitor__inner">
          <p class="wg-monitor__badge">特別募集</p>
          <h2 class="wg-monitor__title">社数限定で先行導入企業様には<br class="wg-monitor__br"><span class="wg-monitor__hl">特別価格</span>でサービスを提供いたします</h2>
          <p class="wg-monitor__text">
            導入事例として掲載させていただくことを条件に、通常よりも抑えた価格でご支援します。<br>社数を絞ることで、一社一社に深く伴走できる体制を整えています。
          </p>
          <div class="wg-monitor__cta wg-cta-group wg-cta-group--center">
            <a href="#wg-form" class="wg-btn wg-btn--lg wg-btn--on-monitor" data-cta="monitor-soudan">無料相談はこちら</a>
            <a href="https://will-corp.co.jp/diagnosis/" class="wg-btn wg-btn--lg wg-btn--ghost-on-dark" target="_blank" rel="noopener" data-cta="monitor-shindan">無料診断（1分）を試す</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ============ 11. プラン別おすすめ企業の特徴 ============ -->
    <section class="wg-section wg-section--pale" id="wg-planfit">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="WHICH PLAN">プラン別<br class="wg-br-sp">おすすめ企業の特徴</h2>

        <div class="wg-planfit">
          <article class="wg-planfit__card">
            <h3 class="wg-planfit__name">ライトがおすすめの企業</h3>
            <dl class="wg-planfit__dl">
              <div class="wg-planfit__row"><dt>おすすめの企業の特徴</dt><dd>自社で施策を実行・運用できる、ある程度自走できる体制がある</dd></div>
              <div class="wg-planfit__row"><dt>達成したいこと</dt><dd>自社の課題を客観的に見える化し、何を優先して取り組むべきかを把握したい</dd></div>
              <div class="wg-planfit__row"><dt>求めていること</dt><dd>いきなり大きな投資はせず、低リスクで現状把握から始めたい</dd></div>
            </dl>
          </article>
          <article class="wg-planfit__card">
            <h3 class="wg-planfit__name">スタンダードがおすすめの企業</h3>
            <dl class="wg-planfit__dl">
              <div class="wg-planfit__row"><dt>おすすめの企業の特徴</dt><dd>Web集客に本腰を入れたいが、社内に実行できる人手やノウハウが足りない</dd></div>
              <div class="wg-planfit__row"><dt>達成したいこと</dt><dd>Web経由の問い合わせを、継続的に増やしたい</dd></div>
              <div class="wg-planfit__row"><dt>求めていること</dt><dd>問い合わせが入ってくる仕組みづくりから運用までを、まとめて任せたい</dd></div>
            </dl>
          </article>
          <article class="wg-planfit__card">
            <h3 class="wg-planfit__name">プレミアムがおすすめの企業</h3>
            <dl class="wg-planfit__dl">
              <div class="wg-planfit__row"><dt>おすすめの企業の特徴</dt><dd>Web経由の問い合わせがまだ少なく、集めた名刺やリードも活用しきれず眠っている</dd></div>
              <div class="wg-planfit__row"><dt>達成したいこと</dt><dd>リードの獲得から見込み客の育成、商談まで繋げる仕組みを作りたい</dd></div>
              <div class="wg-planfit__row"><dt>求めていること</dt><dd>集客から商談化までを、一気通貫で構築してほしい</dd></div>
            </dl>
          </article>
        </div>

        <p class="wg-lead-emphasis">
          どのプランが合うかは、御社の状況によって変わります。<br><span class="wg-marker">現在のWebサイトの状態や達成したい目標、ご要望や方向性をお聞きした上で、<br>御社に最適なプランをご提案します。</span><br>まずはお気軽にご相談ください。
        </p>
      </div>
    </section>

    <!-- ============ 13. 導入の流れ ============ -->
    <section class="wg-section" id="wg-flow">
      <div class="wg-container">
        <h2 class="wg-section__title" data-label="FLOW">導入の流れ</h2>
        <p class="wg-section__lead">初めての方でも迷わないよう、お申し込みから運用開始まで、5つのステップで進めます。</p>

        <ol class="wg-process">
          <li class="wg-process__step">
            <span class="wg-process__num">01</span>
            <div class="wg-process__body">
              <div class="wg-process__head">
                <h3 class="wg-process__title">無料相談</h3>
                <span class="wg-process__est">目安：当日〜数日</span>
              </div>
              <p class="wg-process__text">まずはフォームからお気軽にお申し込みください。オンライン（30〜60分）で、御社の現状や課題感、目指したい方向性をお聞きします。事前に無料診断（1分）で現状を可視化しておくと、相談がよりスムーズです。「何から始めればいいか分からない」段階でも問題ありません。費用は一切かからず、その場で契約を決めていただく必要もありません。</p>
            </div>
          </li>
          <li class="wg-process__step">
            <span class="wg-process__num">02</span>
            <div class="wg-process__body">
              <div class="wg-process__head">
                <h3 class="wg-process__title">現状ヒアリング・分析</h3>
                <span class="wg-process__est">目安：1〜2週間</span>
              </div>
              <p class="wg-process__text">サイトのアクセス状況や導線、これまでの集客・営業の取り組みをお聞きし、GA4などのデータも見ながら「どこで成果が止まっているのか」を整理します。感覚ではなくデータをもとに、課題と目標を明確にしていきます。</p>
            </div>
          </li>
          <li class="wg-process__step">
            <span class="wg-process__num">03</span>
            <div class="wg-process__body">
              <div class="wg-process__head">
                <h3 class="wg-process__title">ご提案</h3>
                <span class="wg-process__est">目安：1週間</span>
              </div>
              <p class="wg-process__text">分析結果をもとに、御社に最適なプランと、何を・どの順番で進めるかをご提案します。現実的に見込める成果と優先順位を正直にお伝えするので、社内でご検討いただいたうえで、進めるかどうかを判断いただけます。</p>
            </div>
          </li>
          <li class="wg-process__step">
            <span class="wg-process__num">04</span>
            <div class="wg-process__body">
              <div class="wg-process__head">
                <h3 class="wg-process__title">初期構築</h3>
                <span class="wg-process__est">目安：1〜2ヶ月</span>
              </div>
              <p class="wg-process__text">戦略設計をもとに、問い合わせを生み出す仕組みの土台をつくります。サイトの導線・コンバージョン改善、コンテンツの設計、計測環境（GA4・MA等）の整備などを、私たちが手を動かして進めます。御社には情報のご提供や内容のご確認をお願いします。</p>
            </div>
          </li>
          <li class="wg-process__step">
            <span class="wg-process__num">05</span>
            <div class="wg-process__body">
              <div class="wg-process__head">
                <h3 class="wg-process__title">運用開始</h3>
                <span class="wg-process__est">目安：継続</span>
              </div>
              <p class="wg-process__text">公開して終わりではありません。成果を計測しながら、月次で改善提案とPDCAを回し続けます。問い合わせ・商談の数を見ながら施策を磨き込み、継続的に成果が伸びる仕組みへと育てていきます。</p>
            </div>
          </li>
        </ol>
      </div>
    </section>

    <!-- ============ 14. よくあるご質問 ============ -->
    <section class="wg-section wg-section--pale" id="wg-faq">
      <div class="wg-container wg-container--narrow">
        <h2 class="wg-section__title" data-label="FAQ">よくあるご質問</h2>
        <div class="wg-faq">
          <details class="wg-faq__item">
            <summary class="wg-faq__q">「無料診断」と「無料相談」は何が違いますか？</summary>
            <div class="wg-faq__a"><p>「無料診断」は、10問に答えるだけ・約1分のセルフ診断です。御社の現状を構造的に分析し、強み・改善点・優先順位をレポートにまとめてお送りします。まず現状を手早く把握したい方に最適です。一方「無料相談」は、担当者とオンライン（30〜60分）で直接お話しいただき、課題や目標をヒアリングしたうえで改善の方向性・進め方を具体的にご提案します。「無料診断」の結果をお持ちいただくと、相談がよりスムーズです。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">費用に見合う成果は、本当に出ますか？</summary>
            <div class="wg-faq__a"><p>成果をお約束することはできませんが、私たちは「投資が回収できるか」を常に意識して設計します。だからこそ、最初に無料相談で課題分析を行い、現実的に見込める成果と優先順位を正直にお伝えします。いきなり高額なプランではなく、低リスクなライトプランから始めていただくこともできます。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">どのくらいの支援実績がありますか？</summary>
            <div class="wg-faq__a"><p>運営する合同会社ウィルは、BtoB企業のWeb支援を50社以上、ご相談を200回以上手がけてきました。あわせて、私たち自身がこの仕組みで自社集客を実践・検証しています。実績だけでなく、まずは無料診断でその精度をご確認ください。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">社内にWebやマーケティングに詳しい人がいなくても大丈夫ですか？</summary>
            <div class="wg-faq__a"><p>問題ありません。むしろ「専任担当がいない」企業こそ、私たちの支援が活きます。専門用語をかみ砕いてご説明し、判断に必要な材料を整理してお渡しします。担当者が一人でも回せる体制づくりまで含めて支援します。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">何から始めればいいか分からない段階でも相談できますか？</summary>
            <div class="wg-faq__a"><p>もちろんです。「課題が漠然としている」「やることが多すぎて手が回らない」という状態が、ちょうど出発点です。無料診断で現状を整理し、まず何から手をつけるべきかを一緒に明確にします。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">どこまで自社で対応が必要ですか？丸投げでも進みますか？</summary>
            <div class="wg-faq__a"><p>プランによります。実行部分（戦略設計・コンテンツ制作・導線改善・運用など）は私たちが手を動かすため、丸投げに近い形でも進められます。一方で、自社の情報や現場の声は成果に直結するため、ヒアリングや確認などで一定のご協力をお願いします。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">すでに制作会社やSEO会社に依頼していますが、併用できますか？</summary>
            <div class="wg-faq__a"><p>併用可能です。既存のパートナーの役割を尊重しつつ、全体の設計・運用を横断して整理する立場として伴走できます。何をどこに任せるべきか、役割分担の交通整理からお手伝いします。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">もし成果が出なかったら、どうなりますか？</summary>
            <div class="wg-faq__a"><p>成果が出ない場合も、原因をデータで分析し、次の打ち手を一緒に考えます。成果が出るまで施策を見直し続けるのが伴走型の役割です。なお、ライト・スタンダードは月単位での見直し・解約が可能なため、合わないと感じた場合のリスクも抑えられます。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">契約期間や解約の縛りはありますか？</summary>
            <div class="wg-faq__a"><p>ライト・スタンダードは月単位の自動更新です（解約は1ヶ月前のお申し出）。プレミアムのみ、初期集中支援として目安6ヶ月をお願いしています。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">マーケティングオートメーション（MA）ツールは必須ですか？既存のツールは活かせますか？</summary>
            <div class="wg-faq__a"><p>必須ではありません。プレミアムプランでは商談化の仕組み化にMAツールを活用しますが、ライト・スタンダードでは不要です。導入するツールは特定の製品に限定せず、御社の状況や既存環境に合わせて最適なものをご提案します。すでにお使いのツールがある場合は、それを活かす形で設計します。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">成果が出るまで、どのくらいかかりますか？</summary>
            <div class="wg-faq__a"><p>施策やサイトの状況によります。問い合わせ導線の改善は数ヶ月、コンテンツSEOによる集客は半年〜が目安です。初回の課題分析で、現実的な見込みをお伝えします。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">無料相談をすると、契約を迫られませんか？</summary>
            <div class="wg-faq__a"><p>売り込みは一切しません。無料相談は、御社の現状を把握し、改善の方向性をお伝えするためのものです。その場で契約を決めていただく必要はなく、方向性のご提案だけお持ち帰りいただいても構いません。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">地方の企業でも対応できますか？</summary>
            <div class="wg-faq__a"><p>対応可能です。打ち合わせはオンライン中心で、全国の企業様を支援しています。</p></div>
          </details>
          <details class="wg-faq__item">
            <summary class="wg-faq__q">記事制作だけ依頼できますか？</summary>
            <div class="wg-faq__a"><p>単発の記事制作も承ります。ただしウィルグローは、記事を含めた集客〜商談化の仕組み全体を設計するサービスです。記事単体をご希望の場合は、一度ご相談ください。</p></div>
          </details>
        </div>
      </div>
    </section>

    <!-- ============ フォーム（無料相談／無料診断） ============ -->
    <section class="wg-section" id="wg-form">
      <div class="wg-container wg-container--narrow">
        <h2 class="wg-section__title" data-label="CONTACT">無料相談はこちら</h2>
        <p class="wg-section__lead">オンライン（30〜60分）で、御社の課題整理と改善の方向性をご提案します。下記フォームよりお申し込みください（1〜2営業日以内にご連絡）。</p>
        <p class="wg-form-note">ご入力いただいた個人情報の取り扱いについては<a href="https://will-corp.co.jp/privacy-policy/" target="_blank" rel="noopener">プライバシーポリシー</a>をご確認ください。<br>フォームの送信をもって、内容に同意いただいたものとみなします。</p>
        <!-- HubSpot 埋め込みフォーム -->
        <div class="wg-form-embed">
          <div class="hs-form-frame" data-region="na2" data-form-id="0c0451c8-6e90-4f30-a2ec-7e6f83ec71fc" data-portal-id="48153453"></div>
        </div>
      </div>
    </section>

  </main>

  <!-- ============ フッター ============ -->
  <footer class="wg-footer">
    <div class="wg-container wg-footer__inner">
      <p class="wg-footer__logo">ウィルグロー<span class="wg-footer__logo-sub">WILL&nbsp;GROW</span></p>
      <p class="wg-footer__company">運営：合同会社ウィル（福岡・博多）</p>
      <ul class="wg-footer__links">
        <li><a href="#wg-form">無料相談</a></li>
        <li><a href="https://will-corp.co.jp/diagnosis/" target="_blank" rel="noopener">無料診断（1分）</a></li>
        <li><a href="https://will-corp.co.jp/privacy-policy/" target="_blank" rel="noopener">プライバシーポリシー</a></li>
      </ul>
      <p class="wg-footer__copy">&copy; 2026 WILL, LLC. All rights reserved.</p>
    </div>
  </footer>

  <!-- ============ 追従CTA（モバイル） ============ -->
  <div class="wg-sticky-cta" id="wgStickyCta" aria-hidden="false">
    <a href="#wg-form" class="wg-btn wg-btn--accent wg-btn--block" data-cta="sticky-soudan">無料相談はこちら</a>
    <a href="https://will-corp.co.jp/diagnosis/" class="wg-btn wg-btn--ghost wg-btn--block" target="_blank" rel="noopener" data-cta="sticky-shindan">無料診断レポート</a>
  </div>

  <!-- ============ 無料診断 追従バナー（右下・PC） ============ -->
  <div class="wg-float-cta" id="wgFloatCta">
    <button class="wg-float-cta__close" id="wgFloatCtaClose" type="button" aria-label="閉じる">×</button>
    <p class="wg-float-cta__title">無料診断（約1分）はこちら</p>
    <p class="wg-float-cta__note">運用体制・施策・課題を構造的に分析し、強み・改善点・優先順位をレポートにまとめてお送りします。まず現状を把握したい方へ。</p>
    <a href="https://will-corp.co.jp/diagnosis/" class="wg-btn wg-btn--accent wg-btn--block" target="_blank" rel="noopener" data-cta="float-shindan">無料診断を試す</a>
  </div>

  <!-- HubSpot 埋め込みフォーム -->
  <script src="https://js-na2.hsforms.net/forms/embed/48153453.js" defer></script>
  <script src="<?php echo esc_url( will_asset_url( 'will-grow-assets/js/main.js' ) ); ?>" defer></script>
  <?php wp_footer(); ?>
</body>
</html>
