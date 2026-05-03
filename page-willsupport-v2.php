<?php
/*
  Template Name: ウィルサポv2 LP
  Tempkate Post Type: page
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://js-na2.hsforms.net" crossorigin>

  <link rel="stylesheet" href="<?php echo esc_url( will_asset_url( 'will-support-v2-assets/style.css' ) ); ?>">

  <!-- 構造化データ：Service + Offer -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "ウィルサポ",
    "serviceType": "サブスク型ホームページ制作",
    "provider": {
      "@id": "https://will-corp.co.jp/#organization"
    },
    "areaServed": "JP",
    "description": "BtoB中小企業のための月額制ホームページ制作・運用サービス",
    "offers": [
      {"@type": "Offer", "name": "スタート", "price": "9800", "priceCurrency": "JPY"},
      {"@type": "Offer", "name": "シンプル", "price": "19800", "priceCurrency": "JPY"},
      {"@type": "Offer", "name": "スタンダード", "price": "29800", "priceCurrency": "JPY"},
      {"@type": "Offer", "name": "プレミアム", "price": "39800", "priceCurrency": "JPY"}
    ]
  }
  </script>

  <!-- 構造化データ：FAQPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "初期費用は本当に0円ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、本当に0円です。制作開始時にまとまった費用は発生しません。なお、独自機能の開発、写真撮影や原稿作成の代行、有料素材の購入などが必要な場合のみ、別途お見積もりをお出しします。追加費用が発生する場合は、必ず事前にご説明・ご承認のうえで進めますのでご安心ください。"
        }
      },
      {
        "@type": "Question",
        "name": "契約期間の縛りや違約金はありますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "ありません。途中解約も可能です。無理な引き止めや違約金はなく、ご事情に応じて誠実に対応いたします。"
        }
      },
      {
        "@type": "Question",
        "name": "テンプレート制作ではありませんか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "テンプレート販売ではありません。事業・強み・ターゲットに合わせて、構成から設計するフルオーダー型です。"
        }
      },
      {
        "@type": "Question",
        "name": "SEO対策は含まれますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、基本的な内部SEO対策は月額内で標準対応します。具体的には、タイトル・ディスクリプションの設計、表示速度の最適化、スマホ対応、XMLサイトマップの設置、内部リンクの整理などを行い、検索エンジンに評価されやすい土台をつくります。記事更新やキーワード戦略など、継続的なSEO施策についても別途ご提案可能です。"
        }
      },
      {
        "@type": "Question",
        "name": "更新はどこまで対応してもらえますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "月額内でテキスト修正・画像差し替えなどの軽微な更新を月2回まで対応します。それを超える追加更新や、新規ページ作成は別途お見積もりとなります。"
        }
      },
      {
        "@type": "Question",
        "name": "Webやマーケティングがわからなくても大丈夫ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "問題ありません。「何を載せればいいかわからない」という段階からご相談いただけます。"
        }
      },
      {
        "@type": "Question",
        "name": "成果（問い合わせ）が出るまでどのくらいかかりますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Webサイトの役割によってご期待いただく成果は異なります。私たちは、Webサイトは「比較検討時に選ばれる状態」を作るツールと考えています。見込み客がサイトに訪れるための認知施策（コンテンツSEO・SNS・広告・営業活動など）と、サイトでの意思決定を後押しする構造が揃ってはじめて、成果が生まれます。そのため「公開後◯ヶ月で問い合わせが◯件」という約束はいたしかねますが、サイト公開と並行して認知施策も整えていくことで、6ヶ月〜1年のスパンで成果が現れ始めるケースが多くあります。"
        }
      },
      {
        "@type": "Question",
        "name": "既存サイトのリニューアルにも対応できますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、対応しています。現状サイトのアクセス解析・課題整理から始め、リニューアルすべき構造・残すべき資産を見極めてご提案します。また、リニューアル時に検索順位や既存流入を落とさない移行設計（URL構造・リダイレクト・SEO資産の引き継ぎ）まで対応しますので、安心してご相談ください。"
        }
      },
      {
        "@type": "Question",
        "name": "契約終了後、サイトのデータはどうなりますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "契約終了後は、原則としてWebサイトは非公開となります。ウィルサポは月額制でサイトを継続的に運用・改善していくサービスのため、契約期間中のご利用を前提としているためです。ただし、一定期間以上ご契約を継続いただいたお客様には、所定の条件のもとでサイトデータ一式（WordPressのファイル・データベース）をお引き渡しすることが可能です。引き渡しの具体的な条件については、ご状況に応じてご案内しております。"
        }
      },
      {
        "@type": "Question",
        "name": "制作期間はどのくらいかかりますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "最初のヒアリングから公開まで、おおよそ2〜3ヶ月が目安です。ページ数が多い場合や、原稿・写真のご準備にお時間がかかる場合は、もう少し長くなることもあります。お急ぎの事情がある場合は、優先順位を整理しながら最短で進められる進行プランをご提案します。"
        }
      },
      {
        "@type": "Question",
        "name": "福岡以外の地域でも対応できますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、全国どちらの地域でも対応可能です。打ち合わせはZoomなどのオンラインで実施し、画面共有をしながらサイトの状況や改善案をその場で確認できるため、地域を問わず同じ品質・スピードでご支援させていただきます。"
        }
      },
      {
        "@type": "Question",
        "name": "自社ECサイトや自社ネットショップなども作成できますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、対応可能です。ECサイト（ネットショップ）の構築・運用については、「ウィルサポEC」という専用プランでご支援しています。Shopifyを使って、商品登録・決済・配送設定まで含めたネットショップを構築・運用いたします。「ウィルサポ」は会社の信頼づくりや問い合わせ獲得を目的としたコーポレートサイト・サービスサイト向け、「ウィルサポEC」は商品をネットで販売したい方向けのプランです。"
        }
      },
      {
        "@type": "Question",
        "name": "採用サイトは作成できますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、採用サイトの制作にも対応しています。会社の想いや働く人の雰囲気、仕事内容、募集要項、エントリーフォームまでを含めた採用サイトを、月額制で構築・運用できます。求職者が知りたい情報を整理し、求人媒体（Indeed、タウンワークなど）との併用も見据えた設計でご提案します。"
        }
      }
    ]
  }
  </script>

  <?php wp_head(); ?>
</head>
<body class="page-wsv2">
<?php wp_body_open(); ?>

  <!-- ============================================
       Loader (初回訪問時のみ表示)
       ============================================ -->
  <div class="wsv2-loader" id="wsv2-loader" aria-hidden="true">
    <div class="wsv2-loader__inner">
      <img
        src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/fv-logotext.png"
        alt=""
        class="wsv2-loader__logo"
        width="240"
        height="60"
        decoding="async"
      >
    </div>
  </div>

  <!-- ============================================
       1. HEADER
       ============================================ -->
  <header class="wsv2-header" role="banner">
    <div class="container">
      <div class="wrapper">
        <div class="wsv2-header__inner">
          <div class="wsv2-header__brand">
            <a href="#top" class="wsv2-header__logo" aria-label="ウィルサポ トップへ戻る">
              <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/header-logo.png" alt="ウィルサポ" width="169" height="42" loading="eager" decoding="async">
            </a>
          </div>
          <nav class="wsv2-header__nav" aria-label="グローバルナビゲーション">
            <ul class="wsv2-header__nav-list">
              <li class="wsv2-header__nav-item">
                <a href="#feature" class="wsv2-header__link">選ばれる理由</a>
              </li>
              <li class="wsv2-header__nav-item">
                <a href="#pricing" class="wsv2-header__link">料金プラン</a>
              </li>
              <li class="wsv2-header__nav-item">
                <a href="#works" class="wsv2-header__link">制作実績</a>
              </li>
              <li class="wsv2-header__nav-item">
                <a href="#faq" class="wsv2-header__link">よくあるご質問</a>
              </li>
              <li class="wsv2-header__nav-item">
                <a href="#contact-form" class="wsv2-header__link wsv2-header__link--cta">無料相談</a>
              </li>
              <li class="wsv2-header__nav-item">
                <a href="https://site.will-corp.co.jp/content-fq349tq4jio" class="wsv2-header__link wsv2-header__link--cta" target="_blank" rel="noopener noreferrer">資料請求</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <!-- ============================================
       FAB（モバイルメニュー）
       ============================================ -->
  <button class="wsv2-fab-menu" type="button" aria-label="メニューを開く" aria-expanded="false" aria-controls="wsv2-fab-nav">
    <span class="wsv2-fab-menu__line"></span>
    <span class="wsv2-fab-menu__line"></span>
    <span class="wsv2-fab-menu__line"></span>
  </button>

  <div class="wsv2-fab-overlay" aria-hidden="true"></div>

  <nav class="wsv2-fab-nav" id="wsv2-fab-nav" aria-label="モバイルナビゲーション">
    <div class="wsv2-fab-nav__logo">
      <a href="#top">
        <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/header-logo.png" alt="ウィルサポ" width="140" height="35" loading="lazy" decoding="async">
      </a>
    </div>
    <ul class="wsv2-fab-nav__list">
      <li class="wsv2-fab-nav__item">
        <a href="#concept" class="wsv2-fab-nav__link">コンセプト</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="#feature" class="wsv2-fab-nav__link">選ばれる理由</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="#compare" class="wsv2-fab-nav__link">他社との違い</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="#pricing" class="wsv2-fab-nav__link">料金プラン</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="#flow" class="wsv2-fab-nav__link">制作の流れ</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="#works" class="wsv2-fab-nav__link">制作実績</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="#faq" class="wsv2-fab-nav__link">よくあるご質問</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="https://will-corp.co.jp/" class="wsv2-fab-nav__link" target="_blank" rel="noopener noreferrer">運営会社</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="#contact-form" class="wsv2-fab-nav__link wsv2-fab-nav__link--cta">無料相談</a>
      </li>
      <li class="wsv2-fab-nav__item">
        <a href="https://site.will-corp.co.jp/content-fq349tq4jio" class="wsv2-fab-nav__link wsv2-fab-nav__link--cta" target="_blank" rel="noopener noreferrer">資料請求</a>
      </li>
    </ul>
  </nav>

  <main class="wsv2-main">

    <!-- ============================================
         2. ファーストビュー
         ============================================ -->
    <section class="wsv2-fv" id="top">
      <div class="container">
        <div class="wrapper">
          <p class="wsv2-fv__label"><span class="wsv2-fv__label-text">あなたの<span class="wsv2-fv__label-em">Webサイト</span>は<br class="wsv2-fv__label-br"><span class="wsv2-fv__label-em">競合</span>と<span class="wsv2-fv__label-em">比較</span>されたときに<br class="wsv2-fv__label-br-sp"><span class="wsv2-fv__label-em">勝てて</span>いますか?</span></p>
          <div class="wsv2-fv__grid">

            <!-- 左カラム：テキストコンテンツ -->
            <div class="wsv2-fv__content">
              <p class="wsv2-fv__sublabel">サブスク型ホームページサービス</p>
              <h1 class="wsv2-fv__title">
                <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/fv-logotext.png" alt="ウィルサポ" loading="eager" decoding="async">
              </h1>
              <ul class="wsv2-fv__points">
                <li class="wsv2-fv__point">初期費用<br>無料</li>
                <li class="wsv2-fv__point">契約期間の<br>縛りなし</li>
                <li class="wsv2-fv__point">BtoB特化の<br>構成設計</li>
              </ul>
              <div class="wsv2-fv__cta">
                <a href="https://site.will-corp.co.jp/content-fq349tq4jio" class="wsv2-fv__cta-btn" target="_blank" rel="noopener noreferrer">資料をダウンロードする</a>
              </div>
            </div>

            <!-- 右カラム：メインビジュアル -->
            <div class="wsv2-fv__visual">
              <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/fv-illust.png" alt="ウィルサポ サービスイメージ" loading="eager" fetchpriority="high" decoding="async">
            </div>

          </div>
          <p class="wsv2-fv__catchcopy">BtoB中小企業のための戦略設計から運用まで伴走する<br>月額費用型のサブスクホームページ制作サービスです</p>
        </div>
      </div>
    </section>

    <!-- ============================================
         3. サービスコンセプト
         ============================================ -->
    <section class="wsv2-concept" id="concept">

      <!-- Ticker Banner -->
      <div class="wsv2-concept__ticker" aria-hidden="true">
        <div class="wsv2-concept__ticker-track">
          <span class="wsv2-concept__ticker-item">A WEBSITE IS NOT A TOOL TO ATTRACT — IT'S A TOOL TO BE SELECTED.</span>
          <span class="wsv2-concept__ticker-item">A WEBSITE IS NOT A TOOL TO ATTRACT — IT'S A TOOL TO BE SELECTED.</span>
          <span class="wsv2-concept__ticker-item">A WEBSITE IS NOT A TOOL TO ATTRACT — IT'S A TOOL TO BE SELECTED.</span>
          <span class="wsv2-concept__ticker-item">A WEBSITE IS NOT A TOOL TO ATTRACT — IT'S A TOOL TO BE SELECTED.</span>
          <span class="wsv2-concept__ticker-item">A WEBSITE IS NOT A TOOL TO ATTRACT — IT'S A TOOL TO BE SELECTED.</span>
          <span class="wsv2-concept__ticker-item">A WEBSITE IS NOT A TOOL TO ATTRACT — IT'S A TOOL TO BE SELECTED.</span>
        </div>
      </div>

      <div class="container">
        <div class="wrapper">

          <div class="wsv2-concept__section-head">
            <p class="wsv2-concept__eyebrow">CONCEPT</p>
            <h2 class="wsv2-concept__title wsv2-fade">
              Webサイトは、<br class="wsv2-concept__title-br-sp">集めるツールではなく<br><span class="wsv2-concept__title-em">選ばれるためのツール</span>です
            </h2>
            <p class="wsv2-concept__lead">多くの企業様が「Webサイトを作ったら問い合わせが増える」という期待を持たれますが、Webサイト単体で新規接点を作ることは難しいというのが実情です。</p>
            <p class="wsv2-concept__lead">見込み客との接点は、コンテンツSEO・SNS・広告・展示会・営業活動など、認知フェーズの施策で作られます。その接点を持った見込み客が、自社と他社を比較検討する際に「ここに相談してみたい」と思ってもらえるかどうか — それがWebサイトの役割です。</p>
            <p class="wsv2-concept__lead">ウィルサポは、この比較検討フェーズで選ばれる状態を作ることに特化したサービスです。認知施策の受け皿として、Webサイトを機能させます。</p>
          </div>

        </div>
      </div>
    </section>

    <!-- ============================================
         4. 課題共感
         ============================================ -->
    <section class="wsv2-issue">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-issue__section-head">
            <p class="wsv2-issue__eyebrow">ISSUE</p>
            <h2 class="wsv2-issue__title wsv2-fade">ウィルサポが解決する<br>Webサイトの5つの課題</h2>
            <p class="wsv2-issue__lead">比較検討フェーズで選ばれないWebサイトには共通する特徴があり、<br>一つでも当てはまる場合は、ウィルサポがお役に立てる可能性があります。</p>
          </div>

          <ul class="wsv2-issue__list">

            <!-- カテゴリ1：入口の課題 -->
            <li class="wsv2-issue__category">
              <p class="wsv2-issue__category-label">入口の課題</p>
            </li>

            <li class="wsv2-issue__item">
              <span class="wsv2-issue__marker" aria-hidden="true">01</span>
              <p class="wsv2-issue__text">営業活動・展示会・紹介で接点を持った見込み客が、サイトを見て他社に流れてしまう</p>
            </li>
            <li class="wsv2-issue__item">
              <span class="wsv2-issue__marker" aria-hidden="true">02</span>
              <p class="wsv2-issue__text">SEO・広告・SNSで獲得したアクセスが、問い合わせにつながっていない</p>
            </li>

            <!-- カテゴリ2：構造の課題 -->
            <li class="wsv2-issue__category">
              <p class="wsv2-issue__category-label">構造の課題</p>
            </li>

            <li class="wsv2-issue__item">
              <span class="wsv2-issue__marker" aria-hidden="true">03</span>
              <p class="wsv2-issue__text">既存サイトが「会社案内」止まりで、比較検討の判断材料になっていない</p>
            </li>
            <li class="wsv2-issue__item">
              <span class="wsv2-issue__marker" aria-hidden="true">04</span>
              <p class="wsv2-issue__text">見た目は整っているが、問い合わせに繋がる設計になっていない</p>
            </li>

            <!-- カテゴリ3：運用の課題 -->
            <li class="wsv2-issue__category">
              <p class="wsv2-issue__category-label">運用の課題</p>
            </li>

            <li class="wsv2-issue__item">
              <span class="wsv2-issue__marker" aria-hidden="true">05</span>
              <p class="wsv2-issue__text">Web担当者が不在で、更新・改善にまで手が回らない</p>
            </li>
            <li class="wsv2-issue__item">
              <span class="wsv2-issue__marker" aria-hidden="true">06</span>
              <p class="wsv2-issue__text">公開後に何を見て改善すべきか分からず、更新が止まってしまう</p>
            </li>

          </ul>

        </div>
      </div>
    </section>

    <!-- ============================================
         5. ウィルサポが選ばれる、6つの理由
         ============================================ -->
    <section class="wsv2-feature" id="feature">
      <div class="container">
        <div class="wsv2-feature__layout">

          <!-- 左カラム：sticky -->
          <div class="wsv2-feature__sidebar">
            <div class="wsv2-feature__section-head">
              <p class="wsv2-feature__eyebrow">FEATURE</p>
              <h2 class="wsv2-feature__title wsv2-fade">ウィルサポが選ばれる<br>6つの理由</h2>
              <p class="wsv2-feature__lead">BtoB中小企業の比較検討フェーズで「選ばれるWebサイト」をつくるために、ウィルサポは戦略設計から運用まで、6つの要素を一貫したサービスとして提供しています。</p>
            </div>
          </div>

          <!-- 右カラム：カードリスト -->
          <div class="wsv2-feature__content">
          <ul class="wsv2-feature__list wsv2-fade">

            <!-- カード01：戦略 -->
            <li class="wsv2-feature__card">
              <p class="wsv2-feature__card-num">01</p>
              <h3 class="wsv2-feature__card-title">営業構造から逆算した<br>Web戦略設計</h3>
              <p class="wsv2-feature__card-text">「誰に・どのタイミングで・何を伝えるか」から逆算し、導線・構成・コンテンツを構築します。営業プロセスと連動させることで、比較検討されても選ばれる構造をWebサイトに実装します。</p>
              <p class="wsv2-feature__card-benefit">→ 営業現場の属人化から脱却し、サイトが見込み客を育てる仕組みに変わります</p>
            </li>

            <!-- カード02：設計 -->
            <li class="wsv2-feature__card">
              <p class="wsv2-feature__card-num">02</p>
              <h3 class="wsv2-feature__card-title">比較検討で「選ばれる」<br>構成・導線設計</h3>
              <p class="wsv2-feature__card-text">事業内容・強み・ターゲットを丁寧にヒアリングした上で、比較検討フェーズで選ばれるための構成・導線を一から設計します。見込み客に選ばれる理由を明確に伝えるWebサイトに仕上げます。</p>
              <p class="wsv2-feature__card-benefit">→ 商談前の事前理解が深まり、受注率と商談の質が両方向上します</p>
            </li>

            <!-- カード03：デザイン -->
            <li class="wsv2-feature__card">
              <p class="wsv2-feature__card-num">03</p>
              <h3 class="wsv2-feature__card-title">テンプレートに頼らない<br>フルオーダーデザイン</h3>
              <p class="wsv2-feature__card-text">事業の専門性・強み・ターゲットに合わせたフルオーダーデザインで、「相談してみたい」と感じてもらえる第一印象を設計します。構造とデザインを連動させることで、比較検討フェーズで他社と差がつきます。</p>
              <p class="wsv2-feature__card-benefit">→ 離脱率が下がり、伝えたい内容が届き、お問い合わせにつながるサイトになります</p>
            </li>

            <!-- カード04：運用 -->
            <li class="wsv2-feature__card">
              <p class="wsv2-feature__card-num">04</p>
              <h3 class="wsv2-feature__card-title">公開後も止まらない<br>月額型の継続サポート</h3>
              <p class="wsv2-feature__card-text">公開して終わりではなく、月額内でテキスト修正・画像変更・情報更新に継続対応します（目安：月2回）。サーバー・ドメイン管理や保守対応も込みのため、社内にWeb担当がいなくても安心して運用いただけます。</p>
              <p class="wsv2-feature__card-benefit">→ 社内にWeb担当を置かずとも、運用が止まらず成果が積み上がり続けます</p>
            </li>

            <!-- カード05：伴走 -->
            <li class="wsv2-feature__card">
              <p class="wsv2-feature__card-num">05</p>
              <h3 class="wsv2-feature__card-title">BtoB中小企業特化の<br>伴走支援</h3>
              <p class="wsv2-feature__card-text">営業の属人化・紹介依存・価格競争などの課題を整理し、Webサイトを集客施策全体の中でどう位置づけるかから設計します。サイト単体ではなく、SEO・広告・営業活動と連動した全体設計をご提案します。</p>
              <p class="wsv2-feature__card-benefit">→ Webサイト単体の悩みではなく、集客・営業の構造課題そのものが解きほぐされます</p>
            </li>

            <!-- カード06：料金 -->
            <li class="wsv2-feature__card">
              <p class="wsv2-feature__card-num">06</p>
              <h3 class="wsv2-feature__card-title">初期費用0円・縛りなしの<br>月額サブスク</h3>
              <p class="wsv2-feature__card-text">初期費用をまとめて回収するモデルではなく、長期継続を前提とした月額設計。契約期間の縛りもないため、比較検討の心理的ハードルを下げ、必要な期間だけご活用いただけます。</p>
              <p class="wsv2-feature__card-benefit">→ 大きな経営判断ではなく通常の月次経費として、Web投資のハードルが下がります</p>
            </li>

          </ul>
          </div><!-- /.wsv2-feature__content -->

        </div><!-- /.wsv2-feature__layout -->
      </div><!-- /.container -->
    </section>

    <!-- ============================================
         6. こんな企業様に向いています
         ============================================ -->
    <section class="wsv2-who-for">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-who-for__section-head">
            <p class="wsv2-who-for__eyebrow">WHO IT IS FOR</p>
            <h2 class="wsv2-who-for__title wsv2-fade">こんな企業様に向いています</h2>
          </div>

          <ul class="wsv2-who-for__list">

            <li class="wsv2-who-for__item">
              <h3 class="wsv2-who-for__item-title">Webサイトを、集客施策の受け皿として<br>機能させたい</h3>
              <p class="wsv2-who-for__item-text">SEO・広告・SNS・営業活動などで獲得したアクセスが、サイト上で成果に結びついていない企業様。流入の受け皿となる構成・導線を整備し、見込み客の意思決定を後押しする構造をつくります。</p>
            </li>

            <li class="wsv2-who-for__item">
              <h3 class="wsv2-who-for__item-title">展示会・紹介で接点を持った見込み客に<br>「選ばれる」状態を作りたい</h3>
              <p class="wsv2-who-for__item-text">展示会・紹介で接点を持った見込み客が、その後自社サイトを訪問したときに比較検討で選ばれる状態を作りたい企業様。初回訪問時の信頼形成と、継続訪問での理解促進を両立する設計を行います。</p>
            </li>

            <li class="wsv2-who-for__item">
              <h3 class="wsv2-who-for__item-title">既存サイトが「会社案内」止まりで<br>比較検討材料になっていない</h3>
              <p class="wsv2-who-for__item-text">サイトはあるものの、見込み客が比較検討する際に必要な情報（強み・実績・事例・プロセス）が不足している企業様。BtoB特有の購買プロセスを踏まえ、比較検討フェーズで差がつく構成に再設計します。</p>
            </li>

            <li class="wsv2-who-for__item">
              <h3 class="wsv2-who-for__item-title">リニューアルを検討している</h3>
              <p class="wsv2-who-for__item-text">既存サイトを刷新したいが、何から手をつけるべきか判断がつかない企業様。現状サイトの課題分析から始め、事業フェーズに合わせた最適なリニューアル計画をご提案します。</p>
            </li>

            <li class="wsv2-who-for__item">
              <h3 class="wsv2-who-for__item-title">営業活動と連動したWebサイトに<br>作り直したい</h3>
              <p class="wsv2-who-for__item-text">営業現場で聞かれる質問・不安が、サイト上で解消されていない企業様。営業プロセスと連動したコンテンツ設計により、商談前の事前理解を促進し、商談の質を向上させます。</p>
            </li>

            <li class="wsv2-who-for__item">
              <h3 class="wsv2-who-for__item-title">社内にWeb専任担当がおらず<br>運用まで任せたい</h3>
              <p class="wsv2-who-for__item-text">Web担当者が不在、または他業務と兼任で手が回らない企業様。戦略設計・制作・公開後の運用改善までを一貫して伴走し、社内リソースを圧迫せずにWeb活用を進めます。</p>
            </li>

          </ul>

        </div>
      </div>
    </section>

    <!-- ============================================
         7. 他社サービスとの違い
         ============================================ -->
    <section class="wsv2-compare" id="compare">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-compare__section-head">
            <p class="wsv2-compare__eyebrow">COMPARE</p>
            <h2 class="wsv2-compare__title wsv2-fade">サブスク型・スポット型<br class="wsv2-compare__title-br-sp">との違い</h2>
            <p class="wsv2-compare__lead">ホームページ制作には、大きく分けて「スポット型」と「サブスク型」があります。それぞれの特徴を整理した上で、比較表をご確認ください。</p>
          </div>

          <div class="wsv2-compare__types">
            <div class="wsv2-compare__type">
              <p class="wsv2-compare__type-label">スポット型</p>
              <p class="wsv2-compare__type-desc">初期費用をまとめて支払い、サイトを一括で制作・納品する従来型のモデル。公開後の更新や運用は別契約になる場合が多く、初期コストが高額になりがちです。</p>
            </div>
            <div class="wsv2-compare__type wsv2-compare__type--wsv2">
              <p class="wsv2-compare__type-label">
                サブスク型
                <span class="wsv2-compare__type-badge">当社</span>
              </p>
              <p class="wsv2-compare__type-desc">月額費用で制作から公開後の運用までを継続的にサポートするモデル。初期費用を抑えながら、長期的な改善・更新を前提とした運用ができます。</p>
            </div>
          </div>

          <div class="wsv2-compare__table-wrapper">
            <table class="wsv2-compare__table">
              <thead>
                <tr>
                  <th scope="col">比較項目</th>
                  <th scope="col">サブスク型｜他社</th>
                  <th scope="col">スポット型</th>
                  <th scope="col" class="wsv2-compare__th--wsv2">ウィルサポ</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">BtoB特化の戦略設計</th>
                  <td data-label="サブスク型"><span class="wsv2-compare__icon wsv2-compare__icon--ng" aria-hidden="true">×</span><span class="wsv2-compare__cell-text">非対応</span></td>
                  <td data-label="スポット型（従来）"><span class="wsv2-compare__icon wsv2-compare__icon--partial" aria-hidden="true">△</span><span class="wsv2-compare__cell-text">別料金</span></td>
                  <td data-label="ウィルサポ" class="wsv2-compare__td--wsv2"><span class="wsv2-compare__icon wsv2-compare__icon--ok" aria-hidden="true">◯</span><span class="wsv2-compare__cell-text">標準装備</span></td>
                </tr>
                <tr>
                  <th scope="row">比較検討を前提とした構成</th>
                  <td data-label="サブスク型"><span class="wsv2-compare__icon wsv2-compare__icon--ng" aria-hidden="true">×</span><span class="wsv2-compare__cell-text">非対応</span></td>
                  <td data-label="スポット型（従来）"><span class="wsv2-compare__icon wsv2-compare__icon--partial" aria-hidden="true">△</span><span class="wsv2-compare__cell-text">会社次第</span></td>
                  <td data-label="ウィルサポ" class="wsv2-compare__td--wsv2"><span class="wsv2-compare__icon wsv2-compare__icon--ok" aria-hidden="true">◯</span><span class="wsv2-compare__cell-text">標準装備</span></td>
                </tr>
                <tr>
                  <th scope="row">オリジナルデザイン</th>
                  <td data-label="サブスク型"><span class="wsv2-compare__icon wsv2-compare__icon--ng" aria-hidden="true">×</span><span class="wsv2-compare__cell-text">テンプレート</span></td>
                  <td data-label="スポット型（従来）"><span class="wsv2-compare__icon wsv2-compare__icon--ok" aria-hidden="true">◯</span><span class="wsv2-compare__cell-text">フルオーダー</span></td>
                  <td data-label="ウィルサポ" class="wsv2-compare__td--wsv2"><span class="wsv2-compare__icon wsv2-compare__icon--ok" aria-hidden="true">◯</span><span class="wsv2-compare__cell-text">フルオーダー</span></td>
                </tr>
                <tr>
                  <th scope="row">運用・保守</th>
                  <td data-label="サブスク型"><span class="wsv2-compare__icon wsv2-compare__icon--ok" aria-hidden="true">◯</span><span class="wsv2-compare__cell-text">あり</span></td>
                  <td data-label="スポット型（従来）"><span class="wsv2-compare__icon wsv2-compare__icon--partial" aria-hidden="true">△</span><span class="wsv2-compare__cell-text">別契約</span></td>
                  <td data-label="ウィルサポ" class="wsv2-compare__td--wsv2"><span class="wsv2-compare__icon wsv2-compare__icon--ok" aria-hidden="true">◯</span><span class="wsv2-compare__cell-text">月額内で対応</span></td>
                </tr>
                <tr class="wsv2-compare__row--highlight">
                  <th scope="row">初期費用</th>
                  <td data-label="サブスク型"><span class="wsv2-compare__icon wsv2-compare__icon--ok" aria-hidden="true">◯</span><span class="wsv2-compare__cell-text">0円〜少額</span></td>
                  <td data-label="スポット型（従来）"><span class="wsv2-compare__icon wsv2-compare__icon--ng" aria-hidden="true">×</span><strong class="wsv2-compare__price">50万〜300万円</strong></td>
                  <td data-label="ウィルサポ" class="wsv2-compare__td--wsv2"><span class="wsv2-compare__icon wsv2-compare__icon--ok" aria-hidden="true">◯</span><strong class="wsv2-compare__price">0円</strong></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </section>


    <!-- ============================================
         7-CTA. 無料相談CTA（中間）
         ============================================ -->
    <section class="wsv2-cta" id="cta-mid">
      <div class="container">

        <div class="wsv2-cta__section-head">
          <span class="wsv2-cta__eyebrow">CONTACT</span>
          <h2 class="wsv2-cta__title wsv2-fade">「比較検討で選ばれるWebサイト」を<br class="wsv2-cta__title-br-pc">月額制で伴走しながら、<br class="wsv2-cta__title-br-sp">一緒につくりませんか。</h2>
          <p class="wsv2-cta__lead">初期費用0円・契約期間の縛りなし。<br>まずは60分の無料オンライン相談から、貴社の状況に合わせた設計をご提案します。</p>
        </div>

        <div class="wsv2-cta__grid wsv2-fade is-visible">

          <!-- 左パネル：無料相談 -->
          <div class="wsv2-cta__panel">
            <h3 class="wsv2-cta__panel-title">まずはお気軽にご相談ください<br>（無料相談）</h3>
            <p class="wsv2-cta__panel-text">制作会社を比較中の方も歓迎です。他社との違いや最適なプランを、無料で分かりやすくご説明します。</p>
            <a href="#contact-form" class="wsv2-cta__btn">無料相談はこちら</a>
          </div>

          <!-- 右パネル：資料請求 -->
          <div class="wsv2-cta__panel">
            <h3 class="wsv2-cta__panel-title">まずは詳細を確認したい方へ<br>（資料請求）</h3>
            <p class="wsv2-cta__panel-text">料金プランや制作内容、サポート体制を分かりやすくまとめた資料をお送りします。他社との比較検討にもご活用いただけます。</p>
            <a
              href="https://site.will-corp.co.jp/content-fq349tq4jio"
              class="wsv2-cta__btn"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="資料請求はこちら（外部サイトに移動します）"
            >資料請求はこちら</a>
          </div>

        </div><!-- /.wsv2-cta__grid -->

      </div>
    </section>


    <!-- ============================================
         9. 制作実績
         ============================================ -->
    <section class="wsv2-works" id="works">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-works__section-head">
            <p class="wsv2-works__eyebrow">WORKS</p>
            <h2 class="wsv2-works__title wsv2-fade">制作実績</h2>
            <p class="wsv2-works__lead">BtoB中小企業に特化し、製造・IT・士業・不動産など幅広い業種のホームページ制作を伴走支援してきました。<br>業種は異なっても、「比較検討で選ばれる構造」という設計思想は共通しています。業種ごとの設計意図とあわせて実績をご覧ください。</p>
          </div>

          <ul class="wsv2-works__list">

              <li class="wsv2-works__card">
                <a href="https://japanmarvelous.com/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="ジャパンマーベラス様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/marvelous.png" alt="ジャパンマーベラス様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">ジャパンマーベラス様</p>
                    <span class="wsv2-works__card-tag">BtoB</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://systemline.jp/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="株式会社システムライン様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/systemline.png" alt="株式会社システムライン様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">株式会社システムライン様</p>
                    <span class="wsv2-works__card-tag">BtoB</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://otg-koushu.com/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="株式会社OTG講習センター様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/otg.png" alt="株式会社OTG講習センター様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">株式会社OTG講習センター様</p>
                    <span class="wsv2-works__card-tag">BtoB講習</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://mrzaimuya.com/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="株式会社Mr財務屋様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/mrzaimuya.png" alt="株式会社Mr財務屋様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">株式会社Mr財務屋様</p>
                    <span class="wsv2-works__card-tag">税務・財務</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://mitsuyaweb.jp/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="株式会社みつや様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/mitsuya.png" alt="株式会社みつや様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">株式会社みつや様</p>
                    <span class="wsv2-works__card-tag">BtoB</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://flags-guide.com/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="株式会社フラッグス様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/flags.png" alt="株式会社フラッグス様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">株式会社フラッグス様</p>
                    <span class="wsv2-works__card-tag">BtoB</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://muraoka-touki.com/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="村岡測量登記事務所様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/muraoka.png" alt="村岡測量登記事務所様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">村岡測量登記事務所様</p>
                    <span class="wsv2-works__card-tag">士業</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://maru-suru.com/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="株式会社maru-suru様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/maru-suru.png" alt="株式会社maru-suru様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">株式会社maru-suru様</p>
                    <span class="wsv2-works__card-tag">BtoB</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://gritcoco-realestate.com/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="株式会社GRIT様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/grit.png" alt="株式会社GRIT様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">株式会社GRIT様</p>
                    <span class="wsv2-works__card-tag">不動産</span>
                  </div>
                </a>
              </li>

              <li class="wsv2-works__card">
                <a href="https://lilyproductionjp.com/" class="wsv2-works__card-link" target="_blank" rel="noopener noreferrer" aria-label="株式会社Lily様のWebサイトを新しいタブで開く">
                  <div class="wsv2-works__card-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/lily.png" alt="株式会社Lily様 Webサイト制作実績" width="800" height="450" loading="lazy" decoding="async">
                  </div>
                  <div class="wsv2-works__card-body">
                    <p class="wsv2-works__card-name">株式会社Lily様</p>
                    <span class="wsv2-works__card-tag">BtoB</span>
                  </div>
                </a>
              </li>

            </ul>

        </div>
      </div>
    </section>

    <!-- ============================================
         10. 料金プラン
         ============================================ -->
    <section class="wsv2-pricing" id="pricing">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-pricing__section-head">
            <span class="wsv2-pricing__eyebrow">PRICING</span>
            <h2 class="wsv2-pricing__title wsv2-fade">料金プラン</h2>
            <p class="wsv2-pricing__lead">用途に合わせて4つのプランをご用意しています。必要な情報を整理し、比較しやすい形でご確認いただけます。</p>
          </div>

          <div class="wsv2-pricing__cards wsv2-fade">

            <!-- プラン1：スタート -->
            <div class="wsv2-pricing__card">
              <p class="wsv2-pricing__plan-name">スタート</p>
              <p class="wsv2-pricing__subcopy">名刺代わりのサイトを整えたい方に。シンプルな1ページ構成でまず始めたい</p>
              <div class="wsv2-pricing__price">
                <span class="wsv2-pricing__price-label">月額</span>
                <span class="wsv2-pricing__price-amount">9,800</span>
                <span class="wsv2-pricing__price-unit">円（税込）</span>
              </div>
              <ul class="wsv2-pricing__list">
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">ページ数</span>
                  <span class="wsv2-pricing__list-val">1ページ</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">CMS</span>
                  <span class="wsv2-pricing__list-val">ワードプレス</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">デザイン</span>
                  <span class="wsv2-pricing__list-val">フルオーダー</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">制作期間</span>
                  <span class="wsv2-pricing__list-val">2ヶ月程度</span>
                </li>
              </ul>
            </div>

            <!-- プラン2：シンプル -->
            <div class="wsv2-pricing__card">
              <p class="wsv2-pricing__plan-name">シンプル</p>
              <p class="wsv2-pricing__subcopy">基本情報をしっかり整えたい企業様に。複数ページで会社の魅力を伝えたい</p>
              <div class="wsv2-pricing__price">
                <span class="wsv2-pricing__price-label">月額</span>
                <span class="wsv2-pricing__price-amount">19,800</span>
                <span class="wsv2-pricing__price-unit">円（税込）</span>
              </div>
              <ul class="wsv2-pricing__list">
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">ページ数</span>
                  <span class="wsv2-pricing__list-val">〜6ページ</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">CMS</span>
                  <span class="wsv2-pricing__list-val">ワードプレス</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">デザイン</span>
                  <span class="wsv2-pricing__list-val">フルオーダー</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">制作期間</span>
                  <span class="wsv2-pricing__list-val">2.5ヶ月程度</span>
                </li>
              </ul>
            </div>

            <!-- プラン3：スタンダード（おすすめ） -->
            <div class="wsv2-pricing__card wsv2-pricing__card--featured">
              <span class="wsv2-pricing__featured-tag">おすすめ</span>
              <p class="wsv2-pricing__plan-name">スタンダード</p>
              <p class="wsv2-pricing__subcopy">BtoB企業に最も選ばれるプランです。集客・採用に必要な情報を網羅した構成</p>
              <div class="wsv2-pricing__price">
                <span class="wsv2-pricing__price-label">月額</span>
                <span class="wsv2-pricing__price-amount">29,800</span>
                <span class="wsv2-pricing__price-unit">円（税込）</span>
              </div>
              <ul class="wsv2-pricing__list">
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">ページ数</span>
                  <span class="wsv2-pricing__list-val">〜12ページ</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">CMS</span>
                  <span class="wsv2-pricing__list-val">ワードプレス</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">デザイン</span>
                  <span class="wsv2-pricing__list-val">フルオーダー</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">制作期間</span>
                  <span class="wsv2-pricing__list-val">3ヶ月程度</span>
                </li>
              </ul>
            </div>

            <!-- プラン4：プレミアム -->
            <div class="wsv2-pricing__card">
              <p class="wsv2-pricing__plan-name">プレミアム</p>
              <p class="wsv2-pricing__subcopy">本格的なWeb基盤を整えたい企業様に。ブログ連動で継続的な情報発信を実現</p>
              <div class="wsv2-pricing__price">
                <span class="wsv2-pricing__price-label">月額</span>
                <span class="wsv2-pricing__price-amount">39,800</span>
                <span class="wsv2-pricing__price-unit">円（税込）</span>
              </div>
              <ul class="wsv2-pricing__list">
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">ページ数</span>
                  <span class="wsv2-pricing__list-val">12ページ+ブログ</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">CMS</span>
                  <span class="wsv2-pricing__list-val">ワードプレス</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">デザイン</span>
                  <span class="wsv2-pricing__list-val">フルオーダー</span>
                </li>
                <li class="wsv2-pricing__list-item">
                  <span class="wsv2-pricing__list-key">制作期間</span>
                  <span class="wsv2-pricing__list-val">3ヶ月以上</span>
                </li>
              </ul>
            </div>

          </div><!-- /.wsv2-pricing__cards -->

          <!-- 月額費用に含まれるもの -->
          <div class="wsv2-pricing__includes">
            <p class="wsv2-pricing__includes-title">月額費用に含まれるもの</p>
            <ul class="wsv2-pricing__includes-list">
              <li>サイト動線設計・オリジナルデザイン設計・ページ制作</li>
              <li>ワードプレス構築・お問い合わせフォーム・スマートフォン対応</li>
              <li>サーバー／ドメイン管理・セキュリティ対応・バックアップ管理</li>
              <li>月2回までの軽微な更新作業・技術的なトラブル対応</li>
              <li>構成や導線に関する相談・改善提案・機能追加のご相談</li>
            </ul>
          </div>

        </div>
      </div>
    </section>

    <!-- ============================================
         11. この価格で運営できる3つの理由
         ============================================ -->
    <section class="wsv2-reason">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-reason__section-head">
            <span class="wsv2-reason__eyebrow">WHY IT IS POSSIBLE</span>
            <h2 class="wsv2-reason__title wsv2-fade">この価格で運営できる<br class="wsv2-reason__title-br-sp">3つの理由</h2>
            <p class="wsv2-reason__lead">「安くする」のではなく「無駄をなくす」設計です</p>
          </div>

          <ul class="wsv2-reason__list">

            <li class="wsv2-reason__item">
              <div class="wsv2-reason__num" aria-hidden="true">01</div>
              <div class="wsv2-reason__body">
                <h3 class="wsv2-reason__item-title">サブスクによる費用分散</h3>
                <p class="wsv2-reason__item-text">初期費用をまとめて回収するモデルではなく、長期継続を前提とした月額設計。だから初期費用ゼロが実現できます。</p>
              </div>
            </li>

            <li class="wsv2-reason__item">
              <div class="wsv2-reason__num" aria-hidden="true">02</div>
              <div class="wsv2-reason__body">
                <h3 class="wsv2-reason__item-title">制作フローの標準化</h3>
                <p class="wsv2-reason__item-text">成果につながる構成設計と工程最適化により、無駄な工数を削減。「安いから簡易的」ではなく「仕組みが合理的」だから可能な価格です。</p>
              </div>
            </li>

            <li class="wsv2-reason__item">
              <div class="wsv2-reason__num" aria-hidden="true">03</div>
              <div class="wsv2-reason__body">
                <h3 class="wsv2-reason__item-title">継続率95%以上の安定モデル</h3>
                <p class="wsv2-reason__item-text">公開後も伴走する前提のサービス設計。長期関係を前提としているため、初期費用で回収する必要がありません。</p>
              </div>
            </li>

          </ul>

        </div>
      </div>
    </section>

    <!-- ============================================
         12. 制作の流れ
         ============================================ -->
    <section class="wsv2-flow" id="flow">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-flow__section-head">
            <span class="wsv2-flow__eyebrow">FLOW</span>
            <h2 class="wsv2-flow__title wsv2-fade">制作の流れ</h2>
            <p class="wsv2-flow__lead">ウェブサイト構築は、複雑なプロジェクトではありません。必要な工程を整理し、段階的に進めていきます。</p>
          </div>

          <ul class="wsv2-flow__steps">

            <li class="wsv2-flow__step">
              <div class="wsv2-flow__num" aria-hidden="true">1</div>
              <div class="wsv2-flow__body">
                <h3 class="wsv2-flow__step-title">無料相談・ヒアリング</h3>
                <p class="wsv2-flow__text">まずはオンラインでお打ち合わせを行います。「事業内容・ターゲット層・現在の課題・理想のイメージ」などをお伺いし、サイトの方向性を整理します。「何から始めればいいかわからない」状態でも問題ありません。不安点も含めて一緒に整理します。</p>
                <p class="wsv2-flow__note">※ご相談・お見積もりは無料です。</p>
              </div>
            </li>

            <li class="wsv2-flow__step">
              <div class="wsv2-flow__num" aria-hidden="true">2</div>
              <div class="wsv2-flow__body">
                <h3 class="wsv2-flow__step-title">キックオフ・ご契約</h3>
                <p class="wsv2-flow__text">正式にご依頼いただいた後、キックオフミーティングを実施します。「制作スケジュールの共有・必要素材の確認・全体工程の説明」ここからプロジェクトがスタートします。</p>
                <p class="wsv2-flow__note">※キックオフ後に月額プランのご契約・お支払い手続きを行います。<br>※初期費用は発生しません。<br>※契約期間の縛りもありません。</p>
              </div>
            </li>

            <li class="wsv2-flow__step">
              <div class="wsv2-flow__num" aria-hidden="true">3</div>
              <div class="wsv2-flow__body">
                <h3 class="wsv2-flow__step-title">構成案のご提案</h3>
                <p class="wsv2-flow__text">ヒアリング内容をもとに、「サイト全体のページ構成・導線の設計・問い合わせまでの流れ」を設計します。強みが伝わる構成と、ユーザーが回遊しやすい導線を両立させます。内容確定後、デザイン工程へ進みます。</p>
                <p class="wsv2-flow__note">※このタイミングで、テキスト作成や、画像素材の準備などを行っていただきます。ご要望に応じて、別料金が発生しますが、弊社でテキスト作成などの代行も可能です。</p>
              </div>
            </li>

            <li class="wsv2-flow__step">
              <div class="wsv2-flow__num" aria-hidden="true">4</div>
              <div class="wsv2-flow__body">
                <h3 class="wsv2-flow__step-title">デザイン案のご提案</h3>
                <p class="wsv2-flow__text">事業内容に合わせたオリジナルデザインをご提案します。テンプレートに縛られず、世界観やターゲットに合った設計を行います。確認・修正を経て、デザイン確定後に構築へ進みます。</p>
              </div>
            </li>

            <li class="wsv2-flow__step">
              <div class="wsv2-flow__num" aria-hidden="true">5</div>
              <div class="wsv2-flow__body">
                <h3 class="wsv2-flow__step-title">ウェブサイト構築</h3>
                <p class="wsv2-flow__text">確定した構成・デザインをもとにサイトを構築します。「ワードプレスの構築・問い合わせフォーム設定・各種機能設定・スマートフォン最適化」専門的な設定はすべて対応します。</p>
              </div>
            </li>

            <li class="wsv2-flow__step">
              <div class="wsv2-flow__num" aria-hidden="true">6</div>
              <div class="wsv2-flow__body">
                <h3 class="wsv2-flow__step-title">最終確認・公開</h3>
                <p class="wsv2-flow__text">最終チェック後、問題がなければ公開します。ドメイン設定・サーバー管理・動作確認まで対応します。通常、約2ヶ月〜3ヶ月で公開可能です。ここがスタート地点です。</p>
              </div>
            </li>

            <li class="wsv2-flow__step">
              <div class="wsv2-flow__num" aria-hidden="true">7</div>
              <div class="wsv2-flow__body">
                <h3 class="wsv2-flow__step-title">公開後の運用サポート</h3>
                <p class="wsv2-flow__text">公開して終わりではありません。月額内で以下をサポートします。「サーバー・ドメイン管理・セキュリティ対応・月2回までの更新作業や軽微な修正対応」専任担当がいなくても、無理なく運用できる体制を整えています。</p>
              </div>
            </li>

          </ul>

        </div>
      </div>
    </section>

    <!-- ============================================
         13. よくあるご質問
         ============================================ -->
    <section class="wsv2-faq" id="faq">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-faq__section-head">
            <span class="wsv2-faq__eyebrow">FAQ</span>
            <h2 class="wsv2-faq__title wsv2-fade">よくあるご質問</h2>
          </div>

          <div class="wsv2-faq__list wsv2-fade">

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">初期費用は本当に0円ですか？</summary>
              <div class="wsv2-faq__answer">
                <p>はい、本当に0円です。制作開始時にまとまった費用は発生しません。なお、独自機能の開発、写真撮影や原稿作成の代行、有料素材の購入などが必要な場合のみ、別途お見積もりをお出しします。追加費用が発生する場合は、必ず事前にご説明・ご承認のうえで進めますのでご安心ください。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">契約期間の縛りや違約金はありますか？</summary>
              <div class="wsv2-faq__answer">
                <p>ありません。途中解約も可能です。無理な引き止めや違約金はなく、ご事情に応じて誠実に対応いたします。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">テンプレート制作ではありませんか？</summary>
              <div class="wsv2-faq__answer">
                <p>テンプレート販売ではありません。事業・強み・ターゲットに合わせて、構成から設計するフルオーダー型です。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">SEO対策は含まれますか？</summary>
              <div class="wsv2-faq__answer">
                <p>はい、基本的な内部SEO対策は月額内で標準対応します。具体的には、タイトル・ディスクリプション（検索結果に表示される文章）の設計、表示速度の最適化、スマホ対応、XMLサイトマップ（検索エンジンに構造を伝えるファイル）の設置、内部リンクの整理などを行い、検索エンジンに評価されやすい土台をつくります。</p>
                <p>記事更新やキーワード戦略など、継続的なSEO施策についても別途ご提案可能です。サイト公開後の運用フェーズに合わせて、段階的に取り組みを広げていけます。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">更新はどこまで対応してもらえますか？</summary>
              <div class="wsv2-faq__answer">
                <p>月額内でテキスト修正・画像差し替えなどの軽微な更新を月2回まで対応します。それを超える追加更新や、新規ページ作成は別途お見積もりとなります。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">Webやマーケティングがわからなくても大丈夫ですか？</summary>
              <div class="wsv2-faq__answer">
                <p>問題ありません。「何を載せればいいかわからない」という段階からご相談いただけます。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">成果（問い合わせ）が出るまでどのくらいかかりますか？</summary>
              <div class="wsv2-faq__answer">
                <p>Webサイトの役割によってご期待いただく成果は異なります。私たちは、Webサイトは「比較検討時に選ばれる状態」を作るツールと考えています。つまり、見込み客がサイトに訪れるための認知施策（コンテンツSEO・SNS・広告・営業活動など）と、サイトでの意思決定を後押しする構造が揃ってはじめて、成果が生まれます。</p>
                <p>そのため「公開後◯ヶ月で問い合わせが◯件」という約束はいたしかねますが、サイト公開と並行して認知施策も整えていくことで、6ヶ月〜1年のスパンで成果が現れ始めるケースが多くあります。現状の集客施策の状況もお伺いしたうえで、現実的な見通しをお伝えします。まずは<a href="#contact-form">無料相談</a>でご状況をお聞かせください。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">既存サイトのリニューアルにも対応できますか？</summary>
              <div class="wsv2-faq__answer">
                <p>はい、対応しています。現状サイトのアクセス解析・課題整理から始め、リニューアルすべき構造・残すべき資産を見極めてご提案します。また、リニューアル時に検索順位や既存流入を落とさない移行設計（URL構造・リダイレクト・SEO資産の引き継ぎ）まで対応しますので、安心してご相談ください。詳しくは<a href="https://will-corp.co.jp/homepage-renewal/" target="_blank" rel="noopener noreferrer">ホームページリニューアルの進め方</a>もご参考ください。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">契約終了後、サイトのデータはどうなりますか？</summary>
              <div class="wsv2-faq__answer">
                <p>契約終了後は、原則としてWebサイトは非公開となります。ウィルサポは月額制でサイトを継続的に運用・改善していくサービスのため、契約期間中のご利用を前提としているためです。</p>
                <p>ただし、一定期間以上ご契約を継続いただいたお客様には、所定の条件のもとでサイトデータ一式（WordPressのファイル・データベース）をお引き渡しすることが可能です。他社さまへの運用移管や自社運用への切り替えもご検討いただけます。</p>
                <p>引き渡しの具体的な条件については、ご状況に応じてご案内しておりますので、<a href="#contact-form">無料相談</a>の際にお気軽にお尋ねください。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">制作期間はどのくらいかかりますか？</summary>
              <div class="wsv2-faq__answer">
                <p>最初のヒアリングから公開まで、おおよそ2〜3ヶ月が目安です。ページ数が多い場合や、原稿・写真のご準備にお時間がかかる場合は、もう少し長くなることもあります。お急ぎの事情がある場合は、優先順位を整理しながら最短で進められる進行プランをご提案します。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">福岡以外の地域でも対応できますか？</summary>
              <div class="wsv2-faq__answer">
                <p>はい、全国どちらの地域でも対応可能です。打ち合わせはZoomなどのオンラインで実施し、画面共有をしながらサイトの状況や改善案をその場で確認できるため、地域を問わず同じ品質・スピードでご支援させていただきます。</p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">自社ECサイトや自社ネットショップなども作成できますか？</summary>
              <div class="wsv2-faq__answer">
                <p>はい、対応可能です。ECサイト（ネットショップ）の構築・運用については、「ウィルサポEC」という専用プランでご支援しています。Shopify（ショッピファイ／世界的に利用されているネットショップ作成サービス）を使って、商品登録・決済・配送設定まで含めたネットショップを構築・運用いたします。</p>
                <p>「ウィルサポ」は会社の信頼づくりや問い合わせ獲得を目的とした<strong>コーポレートサイト・サービスサイト</strong>向け、「ウィルサポEC」は<strong>商品をネットで販売したい方</strong>向けのプランです。どちらが合うかわからない場合も、無料相談でご状況をお聞きしてご提案しますので、お気軽にご相談ください。</p>
                <p class="wsv2-faq__link-wrap">
                  <a href="https://will-corp.co.jp/will-support-ec/" class="wsv2-faq__link-cta" target="_blank" rel="noopener noreferrer">「ウィルサポEC」のサービスページを見る →</a>
                </p>
              </div>
            </details>

            <details class="wsv2-faq__item">
              <summary class="wsv2-faq__question">採用サイトは作成できますか？</summary>
              <div class="wsv2-faq__answer">
                <p>はい、採用サイトの制作にも対応しています。採用サイトは「どんな会社で、どんな人と働けるのか」を伝えることで、求める人材から応募いただくための大切なツールです。</p>
                <p>ウィルサポでは、会社の想いや働く人の雰囲気、仕事内容、募集要項、エントリーフォームまでを含めた採用サイトを、月額制で構築・運用できます。求職者が知りたい情報を整理し、求人媒体（Indeed、タウンワークなど）との併用も見据えた設計でご提案します。</p>
                <p>採用活動の方針や現状の課題に合わせてご提案いたしますので、まずは<a href="#contact-form">無料相談</a>でお気軽にご相談ください。</p>
              </div>
            </details>

          </div><!-- /.wsv2-faq__list -->

        </div>
      </div>
    </section>

    <!-- ============================================
         14. 無料相談CTA
         ============================================ -->
    <section class="wsv2-cta" id="cta">
      <div class="container">

        <div class="wsv2-cta__section-head">
          <span class="wsv2-cta__eyebrow">CONTACT</span>
          <h2 class="wsv2-cta__title wsv2-fade">「比較検討で選ばれるWebサイト」を<br class="wsv2-cta__title-br-pc">月額制で伴走しながら、<br class="wsv2-cta__title-br-sp">一緒につくりませんか。</h2>
          <p class="wsv2-cta__lead">初期費用0円・契約期間の縛りなし。<br>まずは60分の無料オンライン相談から、貴社の状況に合わせた設計をご提案します。</p>
        </div>

        <div class="wsv2-cta__grid wsv2-fade is-visible">

          <!-- 左パネル：無料相談 -->
          <div class="wsv2-cta__panel">
            <h3 class="wsv2-cta__panel-title">まずはお気軽にご相談ください<br>（無料相談）</h3>
            <p class="wsv2-cta__panel-text">制作会社を比較中の方も歓迎です。他社との違いや最適なプランを、無料で分かりやすくご説明します。</p>
            <a href="#contact-form" class="wsv2-cta__btn">無料相談はこちら</a>
          </div>

          <!-- 右パネル：資料請求 -->
          <div class="wsv2-cta__panel">
            <h3 class="wsv2-cta__panel-title">まずは詳細を確認したい方へ<br>（資料請求）</h3>
            <p class="wsv2-cta__panel-text">料金プランや制作内容、サポート体制を分かりやすくまとめた資料をお送りします。他社との比較検討にもご活用いただけます。</p>
            <a
              href="https://site.will-corp.co.jp/content-fq349tq4jio"
              class="wsv2-cta__btn"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="資料請求はこちら（外部サイトに移動します）"
            >資料請求はこちら</a>
          </div>

        </div><!-- /.wsv2-cta__grid -->

      </div>
    </section>

    <!-- ============================================
         15. お問い合わせ（HubSpotフォーム）
         ============================================ -->
    <section class="wsv2-contact" id="contact-form">
      <div class="container">
        <div class="wrapper">

          <div class="wsv2-contact__section-head">
            <span class="wsv2-contact__eyebrow">CONTACT FORM</span>
            <h2 class="wsv2-contact__title">無料相談はこちらから</h2>
            <p class="wsv2-contact__lead">ご相談内容をご入力ください。通常1営業日以内に担当者よりご連絡いたします。</p>
          </div>

          <div class="wsv2-contact__form">
            <div id="wsv2-contact-form"></div>
            <script charset="utf-8" src="//js-na2.hsforms.net/forms/embed/v2.js"></script>
            <script>
              (function(){
                if (typeof hbspt === 'undefined') return;
                hbspt.forms.create({
                  region:   "na2",
                  portalId: "48153453",
                  formId:   "bf7c2589-af6c-47c8-a017-f6ae2303be47",
                  target:   "#wsv2-contact-form",
                  css: ''
                    + '.hs-form-field { margin-bottom: 12px; }'
                    + '.hs-form-field > label, .legal-consent-container { font-size: 13px; }'
                    + '.hs-input { font-size: 14px; padding: 10px 12px; }'
                    + '.hs-button { font-size: 14px; padding: 12px 26px; }'
                    + '.hs-error-msg { font-size: 11px; }'
                    + '@media (max-width: 768px) {'
                    +   '.hs-form-field { margin-bottom: 10px; }'
                    +   '.hs-form-field > label, .legal-consent-container { font-size: 12px; }'
                    +   '.hs-input { font-size: 13px; padding: 9px 10px; }'
                    +   '.hs-button { font-size: 13px; padding: 11px 22px; }'
                    +   '.hs-error-msg { font-size: 11px; }'
                    + '}'
                });
              })();
            </script>
          </div>

        </div>
      </div>
    </section>

  </main>

  <!-- ============================================
       16. FOOTER
       ============================================ -->
  <footer class="wsv2-footer" role="contentinfo">
    <div class="container">

      <div class="wsv2-footer__inner">

        <!-- ブランド -->
        <div class="wsv2-footer__brand">
          <a href="#top" class="wsv2-footer__logo" aria-label="ウィルサポ トップへ戻る">
            <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/header-logo.png" alt="ウィルサポ" width="140" height="35" loading="lazy" decoding="async">
          </a>
          <p class="wsv2-footer__site-link">
            <a
              href="https://will-corp.co.jp/"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="運営会社はこちら（外部サイトに移動します）"
            >運営会社はこちら</a>
          </p>
        </div>

        <!-- フッターナビ -->
        <nav class="wsv2-footer__nav" aria-label="フッターナビゲーション">
          <a href="#concept" class="wsv2-footer__link">コンセプト</a>
          <a href="#feature" class="wsv2-footer__link">選ばれる理由</a>
          <a href="#compare" class="wsv2-footer__link">他社との違い</a>
          <a href="#pricing" class="wsv2-footer__link">料金プラン</a>
          <a href="#flow" class="wsv2-footer__link">制作の流れ</a>
          <a href="#works" class="wsv2-footer__link">制作実績</a>
          <a href="#faq" class="wsv2-footer__link">よくあるご質問</a>
          <a href="#contact-form" class="wsv2-footer__link wsv2-footer__link--cta">無料相談</a>
          <a href="https://site.will-corp.co.jp/content-fq349tq4jio" class="wsv2-footer__link wsv2-footer__link--cta" target="_blank" rel="noopener noreferrer">資料請求</a>
        </nav>

      </div><!-- /.wsv2-footer__inner -->

      <div class="wsv2-footer__bottom">
        <p class="wsv2-footer__copy">© Will LLC. All rights reserved.</p>
      </div>

    </div>
  </footer>

  <script src="<?php echo esc_url( will_asset_url( 'will-support-v2-assets/js/script.js' ) ); ?>" defer></script>
  <?php wp_footer(); ?>
</body>
</html>
