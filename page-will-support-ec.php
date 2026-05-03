<?php
/*
  Template Name: ウィルサポEC LP
  Tempkate Post Type: page
*/
?>

<!doctype html>
<html lang="ja">
  <head prefix="og: https://ogp.me/ns#">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/will-support-ec-assets/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- 構造化データ：Service + Offer -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "name": "ウィルサポEC",
      "serviceType": "サブスク型ECサイト制作",
      "provider": {
        "@id": "https://will-corp.co.jp/#organization"
      },
      "areaServed": "JP",
      "description": "中小企業向けの月額制ECサイト構築・運用サービス。Shopifyを活用し、初期費用0円・契約期間の縛りなしで本格的なECサイトを月額型で構築・運用できます。",
      "offers": [
        {"@type": "Offer", "name": "シンプル", "price": "35000", "priceCurrency": "JPY"},
        {"@type": "Offer", "name": "スタンダード", "price": "45000", "priceCurrency": "JPY"},
        {"@type": "Offer", "name": "プレミアム", "price": "55000", "priceCurrency": "JPY"}
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
          "name": "本当に初期費用はかかりませんか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "35,000円プラン（シンプル）および45,000円プラン（スタンダード）は初期費用はかかりません。月額のみでECサイトを構築・公開いただけます。55,000円プラン（プレミアム）は、ページ数や構成規模に応じて初期費用が発生する場合があります。詳細は事前にお見積りいたします。"
          }
        },
        {
          "@type": "Question",
          "name": "契約期間の縛りはありますか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "契約期間の縛りはありません。解約をご希望の場合は、1ヶ月前までにご連絡いただければお手続き可能です。"
          }
        },
        {
          "@type": "Question",
          "name": "支払いはいつから発生しますか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "無料相談後、正式にご依頼いただきキックオフを実施した段階で月額契約が開始となります。初期費用が発生しないプランの場合は、月額のみのお支払いとなります。"
          }
        },
        {
          "@type": "Question",
          "name": "Shopifyの月額費用は別途かかりますか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "はい、Shopifyの月額利用料は別途発生します。Shopifyとは直接ご契約いただく形となります。料金の詳細はShopify公式ページをご確認ください。"
          }
        },
        {
          "@type": "Question",
          "name": "決済手数料はいくらですか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "決済手数料はShopifyの規定に基づきます。ご利用の決済方法により異なりますので、詳細はShopify公式ページをご確認ください。"
          }
        },
        {
          "@type": "Question",
          "name": "商品登録は何点まで含まれますか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "商品登録は10点まで無料で対応いたします。11点目以降は、1点あたり2,000円で登録対応いたします。"
          }
        },
        {
          "@type": "Question",
          "name": "デザインはどこまで自由ですか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "ブランドイメージに合わせたオリジナルデザインで制作いたします。テンプレートに固定されることなく、構成・デザインともに柔軟に対応可能です。"
          }
        },
        {
          "@type": "Question",
          "name": "将来的な機能追加や拡張は可能ですか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "はい、可能です。将来の拡張を前提とした設計を行っていますので、機能追加やカスタマイズにも対応できます。"
          }
        },
        {
          "@type": "Question",
          "name": "更新や保守はどこまで含まれますか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "サーバー・ドメインの管理を含め、保守対応は月額内で実施します。さらに、月2回までのテキスト修正や画像差し替えなどの更新作業も無料で対応いたします。"
          }
        },
        {
          "@type": "Question",
          "name": "追加費用が発生するケースはありますか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "大幅なカスタマイズ、ページ追加、商品登録数の超過、有料アプリ導入などが必要な場合は追加費用が発生することがあります。その際は必ず事前にご説明いたします。"
          }
        },
        {
          "@type": "Question",
          "name": "なぜ初期費用なしで提供できるのですか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "制作内容の標準化に加え、AIツールなどを活用することで設計・制作の効率化を図っています。さらに月額モデルで継続運用する仕組みにより、初期費用を抑えた合理的な価格を実現しています。"
          }
        }
      ]
    }
    </script>

    <?php wp_head(); ?>
  </head>
  <body class="page-top">
    <?php wp_body_open(); ?>
    <!-- ============================================
         Loader (毎回表示)
         ============================================ -->
    <div class="ws-ec-loader" id="ws-ec-loader" aria-hidden="true">
      <div class="ws-ec-loader__inner">
        <img
          src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/fv-logotext.png"
          alt=""
          class="ws-ec-loader__logo"
          width="240"
          height="60"
          decoding="async"
        >
      </div>
    </div>

    <header class="ws-ec-header">
      <div class="ws-ec-header__inner">
        <a class="ws-ec-header__brand" href="#top">ウィルサポEC</a>
        <nav class="ws-ec-header__nav" aria-label="ページ内ナビゲーション">
          <a class="ws-ec-header__link" href="#concept">コンセプト</a>
          <a class="ws-ec-header__link" href="#feature">特徴</a>
          <a class="ws-ec-header__link" href="#case">制作事例</a>
          <a class="ws-ec-header__link" href="#pricing">料金</a>
          <a class="ws-ec-header__link" href="#flow">制作の流れ</a>
          <a class="ws-ec-header__link" href="#faq">FAQ</a>
          <a class="ws-ec-header__link ws-ec-header__link--cta" href="#ws-ec-docs-form">無料相談</a>
          <a class="ws-ec-header__link ws-ec-header__link--cta" href="https://site.will-corp.co.jp/will-support-ec-dl-contents" target="_blank" rel="noopener noreferrer">資料請求</a>
        </nav>
      </div>
    </header>
    <button class="ws-ec-fab-menu" type="button" aria-label="メニューを開く" aria-controls="ws-ec-fab-nav" aria-expanded="false">
      <span class="ws-ec-fab-menu__line"></span>
      <span class="ws-ec-fab-menu__line"></span>
      <span class="ws-ec-fab-menu__line"></span>
    </button>
    <div class="ws-ec-fab-overlay" aria-hidden="true"></div>
    <nav id="ws-ec-fab-nav" class="ws-ec-fab-nav" aria-label="ハンバーガーメニュー">
      <a class="ws-ec-fab-nav__link" href="#concept">コンセプト</a>
      <a class="ws-ec-fab-nav__link" href="#feature">特徴</a>
      <a class="ws-ec-fab-nav__link" href="#case">制作事例</a>
      <a class="ws-ec-fab-nav__link" href="#pricing">料金</a>
      <a class="ws-ec-fab-nav__link" href="#flow">制作の流れ</a>
      <a class="ws-ec-fab-nav__link" href="#faq">FAQ</a>
      <a class="ws-ec-fab-nav__link ws-ec-fab-nav__link--cta" href="#ws-ec-docs-form">無料相談</a>
      <a class="ws-ec-fab-nav__link ws-ec-fab-nav__link--cta" href="https://site.will-corp.co.jp/will-support-ec-dl-contents" target="_blank" rel="noopener noreferrer">資料請求</a>
    </nav>
    <main class="container">
      <section id="top" class="ws-ec-fv ws-ec-fade" aria-labelledby="ws-ec-fv-title">
        <div class="ws-ec-fv__content">
          <p class="ws-ec-fv__label">定額サブスクECサイト</p>
          <h1 id="ws-ec-fv-title" class="ws-ec-fv__title">ウィルサポEC</h1>
          <ul class="ws-ec-fv__points" aria-label="サービスの特長">
            <li class="ws-ec-fv__point">初期費用<br>無料</li>
            <li class="ws-ec-fv__point">契約期間の<br>縛りなし</li>
            <li class="ws-ec-fv__point">自由な<br>デザイン</li>
          </ul>
          <div class="ws-ec-fv__visual-sp">
            <img class="ws-ec-fv__mock ws-ec-fv__mock--main" src="<?php echo get_template_directory_uri(); ?>/will-support-ec-assets/img/page-willsuppoec-hero1.png" alt="ウィルサポEC サービスイメージ" />
          </div>
          <a class="ws-ec-fv__cta" href="https://site.will-corp.co.jp/will-support-ec-dl-contents" target="_blank" rel="noopener noreferrer">
            資料ダウンロード
          </a>
        </div>
        <div class="ws-ec-fv__visual" aria-label="ECサイトUIモック">
          <img class="ws-ec-fv__mock ws-ec-fv__mock--main" src="<?php echo get_template_directory_uri(); ?>/will-support-ec-assets/img/page-willsuppoec-hero1.png" alt="ウィルサポEC サービスイメージ" />
        </div>
        <p class="ws-ec-fv__subcopy">ECサイト制作会社をお探しの方や、構築を代行してほしい企業様へ。<br>ウィルサポECは、構成設計から公開後の運用・保守まで一括対応する月額型サービスです。</p>
      </section>

      <section id="concept" class="ws-ec-concept ws-ec-fade" aria-labelledby="ws-ec-concept-title">
        <div class="ws-ec-concept__inner">
          <p class="ws-ec-concept__eyebrow">Concept</p>
          <h2 id="ws-ec-concept-title" class="ws-ec-concept__title">スモールスタートで、<br class="ws-ec-sp-break">本気のECを。</h2>
          <p class="ws-ec-concept__text">
            本気でECを始めたい。<br />
            でも、大きな初期投資や失敗のリスクは避けたい。
            <br /><br />
            ウィルサポECは、そんな中小企業のためのEC基盤です。
            <br /><br />
            初期費用ゼロでスモールスタート。<br />
            しかし設計は本格的に。
            <br /><br />
            ターゲットに刺さる導線設計とデザイン設計を行い、<br />
            将来の拡張も見据えた構造で構築します。
            <br /><br />
            保守や運用サポートも含めて伴走することで、<br />
            ECの運営負担を減らし、事業成長に集中できる体制を整えます。
            <br /><br />
            <span class="ws-ec-concept__closing">始めやすく、育てやすい。</span><br />
            それがウィルサポECです。
          </p>
        </div>
      </section>

      <section id="target" class="ws-ec-target ws-ec-fade" aria-labelledby="ws-ec-target-title">
        <div class="ws-ec-target__inner">
          <p class="ws-ec-target__eyebrow">Who It Is For</p>
          <h2 id="ws-ec-target-title" class="ws-ec-target__title">こんな方向けのサービスです</h2>
          <ul class="ws-ec-target__list">
            <li class="ws-ec-target__item">高額な制作費は避けつつ、本格的なECサイトを安心して立ち上げたい企業様。</li>
            <li class="ws-ec-target__item">自社ブランドの世界観を大切にしながら、自由なデザインでECを構築したい企業様。</li>
            <li class="ws-ec-target__item">今だけでなく将来の拡張も見据えて、柔軟に成長できるECサイトをつくりたい企業様。</li>
            <li class="ws-ec-target__item">ECサイト制作会社や構築代行サービスを比較する中で、シンプルで分かりやすい料金体系を選びたい企業様。</li>
            <li class="ws-ec-target__item">無駄なカスタマイズ費用をかけず、必要な機能だけで賢く始めたい企業様。</li>
            <li class="ws-ec-target__item">契約の縛りに不安を感じず、リスクを抑えてECサイト制作を始めたい企業様。</li>
          </ul>
        </div>
      </section>

      <section id="feature" class="ws-ec-feature ws-ec-fade" aria-labelledby="ws-ec-feature-title">
        <div class="ws-ec-feature__inner">
          <p class="ws-ec-feature__eyebrow">Key Features</p>
          <h2 id="ws-ec-feature-title" class="ws-ec-feature__title">ウィルサポECの特徴</h2>
          <p class="ws-ec-feature__lead">スモールスタートでも、公開後の運用まで見据えて設計する。<br>ウィルサポECはそのための実務的な基盤を整えます。</p>
          <ul class="ws-ec-feature__list">
            <li class="ws-ec-feature__item">
              <div class="ws-ec-feature__item-head">
                <span class="ws-ec-feature__icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" role="img">
                    <rect x="3.5" y="5.5" width="17" height="13" rx="2" />
                    <path d="M8 20.5h8" />
                    <path d="M9 10.5h6M9 14h4" />
                  </svg>
                </span>
                <h3 class="ws-ec-feature__item-title">初期費用0円・契約縛りなしの月額モデル</h3>
              </div>
              <p class="ws-ec-feature__item-text">初期費用は不要。契約期間の縛りもありません。 一括制作ではなく月額型で始められるため、初期のキャッシュ負担を大きく抑えながら本格的なECサイトを構築できます。サーバー・ドメイン費用も含まれているため、追加の固定費を気にせずスタートできます。</p>
            </li>
            <li class="ws-ec-feature__item">
              <div class="ws-ec-feature__item-head">
                <span class="ws-ec-feature__icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" role="img">
                    <path d="M5 6.5h14v11H5z" />
                    <path d="M8 9.5h8M8 13h5" />
                    <path d="M4 18.5h16" />
                  </svg>
                </span>
                <h3 class="ws-ec-feature__item-title">制作＋保守＋更新まで含む安心サポート</h3>
              </div>
              <p class="ws-ec-feature__item-text">ECサイトの構築だけでなく、公開後の保守管理や更新作業まで月額内で対応します。 サーバー・ドメインの保守費用も含まれており、追加の固定費は不要です。さらに、月2回までのテキスト修正や画像差し替えなどの更新作業も無料でサポート。制作して終わりではなく、安心して運用を続けられる体制を整えています。</p>
            </li>
            <li class="ws-ec-feature__item">
              <div class="ws-ec-feature__item-head">
                <span class="ws-ec-feature__icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" role="img">
                    <path d="M12 3.5v17" />
                    <path d="M3.5 12h17" />
                    <circle cx="12" cy="12" r="7.5" />
                  </svg>
                </span>
                <h3 class="ws-ec-feature__item-title">自由なデザインと高い拡張性</h3>
              </div>
              <p class="ws-ec-feature__item-text">ブランドに合わせたオリジナルデザインで構築します。 テンプレートに縛られない設計により、将来的な機能拡張やカスタマイズにも柔軟に対応可能です。ワードプレスとShopifyを組み合わせることで、情報発信とEC機能の両立を実現し、成長に合わせて進化できる構造をつくります。</p>
            </li>
            <li class="ws-ec-feature__item">
              <div class="ws-ec-feature__item-head">
                <span class="ws-ec-feature__icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" role="img">
                    <path d="M12 3.5l7 3v6c0 4.4-2.9 6.8-7 8-4.1-1.2-7-3.6-7-8v-6z" />
                    <path d="M9 12.5l2 2 4-4" />
                  </svg>
                </span>
                <h3 class="ws-ec-feature__item-title">高いセキュリティと安定運用</h3>
              </div>
              <p class="ws-ec-feature__item-text">カート機能にはShopifyを活用するため、決済や個人情報管理において高いセキュリティ基準を確保しています。 中小企業でも安心して運営できる安定したEC環境を構築し、専任担当がいなくても無理なく運用できる設計にしています。</p>
            </li>
          </ul>
        </div>
      </section>

      <section class="ws-ec-cta ws-ec-fade" aria-labelledby="ws-ec-cta-title">
        <div class="ws-ec-cta__inner">
          <p class="ws-ec-cta__eyebrow">CONTACT</p>
          <h2 id="ws-ec-faq-title" class="ws-ec-faq__title">お問い合わせ</h2>
          <div class="ws-ec-cta__grid">
            <article id="contact" class="ws-ec-cta__panel">
              <h3 id="ws-ec-cta-title" class="ws-ec-cta__title">まずはお気軽にご相談ください<br>（無料相談）</h3>
              <p class="ws-ec-cta__text">制作会社を比較中の方も歓迎です。他社との違いや最適なプランを、無料で分かりやすくご説明します。</p>
              <a class="ws-ec-cta__btn ws-ec-btn" href="#ws-ec-docs-form">無料相談はこちら</a>
            </article>
            <article id="download" class="ws-ec-cta__panel">
              <h3 class="ws-ec-cta__sub-title">まずは詳細を確認したい方へ<br>（資料請求）</h3>
              <p class="ws-ec-cta__text">料金プランや制作内容、サポート体制を分かりやすくまとめた資料をお送りします。他社との比較検討にもご活用いただけます。</p>
              <a class="ws-ec-cta__btn ws-ec-btn" href="https://site.will-corp.co.jp/will-support-ec-dl-contents" target="_blank" rel="noopener noreferrer">資料請求はこちら</a>
            </article>
          </div>
        </div>
      </section>

      <section id="case" class="ws-ec-case ws-ec-fade" aria-labelledby="ws-ec-case-title">
        <div class="ws-ec-case__inner">
          <p class="ws-ec-case__eyebrow">Case Study</p>
          <h2 id="ws-ec-case-title" class="ws-ec-case__title">制作事例</h2>
          <div class="ws-ec-case__content">
            <figure class="ws-ec-case__image-wrap">
              <a href="https://frenchiecrew.jp/" target="_blank" rel="noopener">
                <img class="ws-ec-case__image" src="<?php echo get_template_directory_uri(); ?>/will-support-ec-assets/img/page-willsuppoec-hero2.png" alt="制作事例サイトのトップページサムネイル" />
              </a>
            </figure>
            <div class="ws-ec-case__info">
              <ul class="ws-ec-case__meta">
                <li class="ws-ec-case__meta-item">
                  <span class="ws-ec-case__meta-label">サイトURL</span>
                  <a class="ws-ec-case__link" href="https://frenchiecrew.jp/" target="_blank" rel="noopener">https://frenchiecrew.jp/</a>
                </li>
                <li class="ws-ec-case__meta-item">
                  <span class="ws-ec-case__meta-label">業種</span>
                  <span class="ws-ec-case__meta-value">ペット向けアパレルの企画・販売</span>
                </li>
                <li class="ws-ec-case__meta-item">
                  <span class="ws-ec-case__meta-label">制作内容</span>
                  <span class="ws-ec-case__meta-value">ECサイト新規構築 / ブランドページ設計 / 運用導線整備</span>
                </li>
                <li class="ws-ec-case__meta-item">
                  <span class="ws-ec-case__meta-label">構築期間</span>
                  <span class="ws-ec-case__meta-value">約3ヶ月</span>
                </li>
                <li class="ws-ec-case__meta-item">
                  <span class="ws-ec-case__meta-label">モバイル対応</span>
                  <span class="ws-ec-case__meta-value">あり</span>
                </li>
                <li class="ws-ec-case__meta-item">
                  <span class="ws-ec-case__meta-label">デザインの方向性</span>
                  <span class="ws-ec-case__meta-value">ブランドの世界観を保ちつつ、商品選定しやすいミニマル設計</span>
                </li>
              </ul>
              <div class="ws-ec-case__feature-block">
                <h3 class="ws-ec-case__feature-title">実装機能一覧</h3>
                <ul class="ws-ec-case__feature-list">
                  <li class="ws-ec-case__feature-item">商品ページ制作（画像・説明文・バリエーション設定）</li>
                  <li class="ws-ec-case__feature-item">カート機能</li>
                  <li class="ws-ec-case__feature-item">オンライン決済（クレジットカード等）</li>
                  <li class="ws-ec-case__feature-item">送料・配送設定</li>
                  <li class="ws-ec-case__feature-item">注文管理・通知設定</li>
                  <li class="ws-ec-case__feature-item">キャンペーン告知（バナー／お知らせ表示）</li>
                  <li class="ws-ec-case__feature-item">クーポンコード導線の設置</li>
                  <li class="ws-ec-case__feature-item">LINE問い合わせ導線設計</li>
                  <li class="ws-ec-case__feature-item">内部SEO基本設定（タイトル・ディスクリプション最適化）</li>
                  <li class="ws-ec-case__feature-item">アクセス解析・CV計測設定（GA4等）</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="pricing" class="ws-ec-pricing ws-ec-fade" aria-labelledby="ws-ec-pricing-title">
        <div class="ws-ec-pricing__inner">
          <p class="ws-ec-pricing__eyebrow">Pricing</p>
          <h2 id="ws-ec-pricing-title" class="ws-ec-pricing__title">料金プラン</h2>
          <p class="ws-ec-pricing__lead">用途に合わせて3つのプランをご用意しています。<br>必要な情報を整理し、比較しやすい形でご確認いただけます。</p>
          <ul class="ws-ec-pricing__cards">
            <li class="ws-ec-pricing__card">
              <h3 class="ws-ec-pricing__plan">シンプル</h3>
              <p class="ws-ec-pricing__price"><span class="ws-ec-pricing__yen">月額</span>35,000円</p>
              <p class="ws-ec-pricing__badge">初期費用 0円</p>
              <dl class="ws-ec-pricing__meta">
                <div class="ws-ec-pricing__meta-row">
                  <dt>契約期間の縛り</dt>
                  <dd>なし</dd>
                </div>
                <div class="ws-ec-pricing__meta-row">
                  <dt>ページ数</dt>
                  <dd>6ページ</dd>
                </div>
                <div class="ws-ec-pricing__meta-row">
                  <dt>制作期間</dt>
                  <dd>2.5ヶ月程度</dd>
                </div>
              </dl>
              <ul class="ws-ec-pricing__list">
                <li>オリジナルデザイン</li>
                <li>Shopifyのカート設定</li>
                <li>商品登録（10点まで無料）</li>
                <li>サーバー・ドメイン管理</li>
                <li>月2回までのサイト更新作業</li>
              </ul>
              <small class="ws-ec-pricing__note">※Shopify月額費用は別途発生いたします</small>
            </li>
            <li class="ws-ec-pricing__card ws-ec-pricing__card--featured">
              <p class="ws-ec-pricing__featured-tag">おすすめ</p>
              <h3 class="ws-ec-pricing__plan">スタンダード</h3>
              <p class="ws-ec-pricing__price"><span class="ws-ec-pricing__yen">月額</span>45,000円</p>
              <p class="ws-ec-pricing__badge">初期費用 0円</p>
              <dl class="ws-ec-pricing__meta">
                <div class="ws-ec-pricing__meta-row">
                  <dt>契約期間の縛り</dt>
                  <dd>なし</dd>
                </div>
                <div class="ws-ec-pricing__meta-row">
                  <dt>ページ数</dt>
                  <dd>12ページ</dd>
                </div>
                <div class="ws-ec-pricing__meta-row">
                  <dt>制作期間</dt>
                  <dd>3ヶ月程度</dd>
                </div>
              </dl>
              <ul class="ws-ec-pricing__list">
                <li>オリジナルデザイン</li>
                <li>Shopifyのカート設定</li>
                <li>商品登録（10点まで無料）</li>
                <li>サーバー・ドメイン管理</li>
                <li>月2回までのサイト更新作業</li>
              </ul>
              <small class="ws-ec-pricing__note">※Shopify月額費用は別途発生いたします</small>
            </li>
            <li class="ws-ec-pricing__card">
              <h3 class="ws-ec-pricing__plan">プレミアム</h3>
              <p class="ws-ec-pricing__price"><span class="ws-ec-pricing__yen">月額</span>55,000円</p>
              <p class="ws-ec-pricing__badge">初期費用 要相談</p>
              <dl class="ws-ec-pricing__meta">
                <div class="ws-ec-pricing__meta-row">
                  <dt>契約期間の縛り</dt>
                  <dd>なし</dd>
                </div>
                <div class="ws-ec-pricing__meta-row">
                  <dt>ページ数</dt>
                  <dd>13ページ以上</dd>
                </div>
                <div class="ws-ec-pricing__meta-row">
                  <dt>制作期間</dt>
                  <dd>3ヶ月以上</dd>
                </div>
              </dl>
              <ul class="ws-ec-pricing__list">
                <li>オリジナルデザイン</li>
                <li>Shopifyのカート設定</li>
                <li>商品登録（10点まで無料）</li>
                <li>サーバー・ドメイン管理</li>
                <li>月2回までのサイト更新作業</li>
              </ul>
              <small class="ws-ec-pricing__note">※Shopify月額費用は別途発生いたします</small>
            </li>
          </ul>
        </div>
      </section>

      <section id="flow" class="ws-ec-flow ws-ec-fade" aria-labelledby="ws-ec-flow-title">
        <div class="ws-ec-flow__inner">
          <p class="ws-ec-flow__eyebrow">Flow</p>
          <h2 id="ws-ec-flow-title" class="ws-ec-flow__title">制作の流れ</h2>
          <p class="ws-ec-flow__lead">ECサイト制作を依頼したい企業様向けに、構成設計から公開・運用まで一貫して対応します。</p>
          <ol class="ws-ec-flow__steps">
            <li class="ws-ec-flow__step">
              <div class="ws-ec-flow__head">
                <span class="ws-ec-flow__num">①</span>
                <h3 class="ws-ec-flow__step-title">無料相談・ヒアリング</h3>
              </div>
              <p class="ws-ec-flow__text">オンラインにて商材内容やターゲット、ご希望のイメージなどをお伺いします。ECサイトの方向性や不安点も含めて整理し、最適な進め方をご提案します。</p>
              <small class="ws-ec-flow__note">※ご相談・お見積もりは無料です。</small>
            </li>
            <li class="ws-ec-flow__step">
              <div class="ws-ec-flow__head">
                <span class="ws-ec-flow__num">②</span>
                <h3 class="ws-ec-flow__step-title">キックオフ・ご契約</h3>
              </div>
              <p class="ws-ec-flow__text">正式にご依頼いただいた後、キックオフミーティングを実施します。制作スケジュールや必要素材を整理し、プロジェクトをスタートします。</p>
              <small class="ws-ec-flow__note">※キックオフ後に、月額プランのお支払い手続きを行います。<br />※初期費用は発生しません。契約期間の縛りもありません。</small>
            </li>
            <li class="ws-ec-flow__step">
              <div class="ws-ec-flow__head">
                <span class="ws-ec-flow__num">③</span>
                <h3 class="ws-ec-flow__step-title">構成案のご提案</h3>
              </div>
              <p class="ws-ec-flow__text">ヒアリング内容をもとに、サイト全体の構成案をご提案します。ブランドの魅力が伝わるページ設計と、ECとして使いやすい導線を設計します。内容確定後、デザイン工程へ進みます。</p>
            </li>
            <li class="ws-ec-flow__step">
              <div class="ws-ec-flow__head">
                <span class="ws-ec-flow__num">④</span>
                <h3 class="ws-ec-flow__step-title">デザイン案のご提案</h3>
              </div>
              <p class="ws-ec-flow__text">ブランドイメージに合わせたオリジナルデザインをご提案します。テンプレートに縛られない自由なデザインで、世界観を表現します。デザイン確定後、構築工程へ進みます。</p>
            </li>
            <li class="ws-ec-flow__step">
              <div class="ws-ec-flow__head">
                <span class="ws-ec-flow__num">⑤</span>
                <h3 class="ws-ec-flow__step-title">ECサイト構築</h3>
              </div>
              <p class="ws-ec-flow__text">確定した構成・デザインをもとにサイトを構築します。商品登録、決済設定、各種機能設定を行い、スマートフォン最適化まで対応します。</p>
            </li>
            <li class="ws-ec-flow__step">
              <div class="ws-ec-flow__head">
                <span class="ws-ec-flow__num">⑥</span>
                <h3 class="ws-ec-flow__step-title">最終確認・公開</h3>
              </div>
              <p class="ws-ec-flow__text">最終チェック後、問題がなければ公開します。ドメイン・サーバー設定まで対応いたします。通常、約1.5〜2ヶ月で公開可能です。</p>
            </li>
            <li class="ws-ec-flow__step">
              <div class="ws-ec-flow__head">
                <span class="ws-ec-flow__num">⑦</span>
                <h3 class="ws-ec-flow__step-title">公開後の運用サポート</h3>
              </div>
              <p class="ws-ec-flow__text">公開後は月額内で保守管理を実施します。サーバー・ドメイン管理に加え、月2回までの更新作業も無料対応。専任担当がいなくても無理なく運用できる体制を整えています。</p>
            </li>
          </ol>
        </div>
      </section>

      <section class="ws-ec-cta ws-ec-fade" aria-labelledby="ws-ec-cta-title">
        <div class="ws-ec-cta__inner">
          <p class="ws-ec-cta__eyebrow">CONTACT</p>
          <h2 id="ws-ec-faq-title" class="ws-ec-faq__title">お問い合わせ</h2>
          <div class="ws-ec-cta__grid">
            <article id="contact" class="ws-ec-cta__panel">
              <h3 id="ws-ec-cta-title" class="ws-ec-cta__title">まずはお気軽にご相談ください<br>（無料相談）</h3>
              <p class="ws-ec-cta__text">制作会社を比較中の方も歓迎です。他社との違いや最適なプランを、無料で分かりやすくご説明します。</p>
              <a class="ws-ec-cta__btn ws-ec-btn" href="#ws-ec-docs-form">無料相談はこちら</a>
            </article>
            <article id="download" class="ws-ec-cta__panel">
              <h3 class="ws-ec-cta__sub-title">まずは詳細を確認したい方へ<br>（資料請求）</h3>
              <p class="ws-ec-cta__text">料金プランや制作内容、サポート体制を分かりやすくまとめた資料をお送りします。他社との比較検討にもご活用いただけます。</p>
              <a class="ws-ec-cta__btn ws-ec-btn" href="https://site.will-corp.co.jp/will-support-ec-dl-contents" target="_blank" rel="noopener noreferrer">資料請求はこちら</a>
            </article>
          </div>
        </div>
      </section>

      <section id="faq" class="ws-ec-faq ws-ec-fade" aria-labelledby="ws-ec-faq-title">
        <div class="ws-ec-faq__inner">
          <p class="ws-ec-faq__eyebrow">FAQ</p>
          <h2 id="ws-ec-faq-title" class="ws-ec-faq__title">よくあるご質問</h2>
          <div class="ws-ec-faq__list">
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q1. 本当に初期費用はかかりませんか？</summary>
              <div class="ws-ec-faq__answer">
                <p>35,000円プラン（シンプル）および45,000円プラン（スタンダード）は初期費用はかかりません。月額のみでECサイトを構築・公開いただけます。55,000円プラン（プレミアム）は、ページ数や構成規模に応じて初期費用が発生する場合があります。詳細は事前にお見積りいたします。</p>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q2. 契約期間の縛りはありますか？</summary>
              <div class="ws-ec-faq__answer">
                <p>契約期間の縛りはありません。解約をご希望の場合は、1ヶ月前までにご連絡いただければお手続き可能です。</p>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q3. 支払いはいつから発生しますか？</summary>
              <div class="ws-ec-faq__answer">
                <p>無料相談後、正式にご依頼いただきキックオフを実施した段階で月額契約が開始となります。初期費用が発生しないプランの場合は、月額のみのお支払いとなります。</p>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q4. Shopifyの月額費用は別途かかりますか？</summary>
              <div class="ws-ec-faq__answer">
                <p>はい、Shopifyの月額利用料は別途発生します。Shopifyとは直接ご契約いただく形となります。料金の詳細はShopify公式ページをご確認ください。</p>
                <small><a href="#">（Shopify料金ページURLをここに記載）</a></small>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q5. 決済手数料はいくらですか？</summary>
              <div class="ws-ec-faq__answer">
                <p>決済手数料はShopifyの規定に基づきます。ご利用の決済方法により異なりますので、詳細は以下の公式ページをご確認ください。</p>
                <small><a href="#">（決済手数料ページURLをここに記載）</a></small>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q6. 商品登録は何点まで含まれますか？</summary>
              <div class="ws-ec-faq__answer">
                <p>商品登録は10点まで無料で対応いたします。11点目以降は、1点あたり2,000円で登録対応いたします。</p>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q7. デザインはどこまで自由ですか？</summary>
              <div class="ws-ec-faq__answer">
                <p>ブランドイメージに合わせたオリジナルデザインで制作いたします。テンプレートに固定されることなく、構成・デザインともに柔軟に対応可能です。</p>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q8. 将来的な機能追加や拡張は可能ですか？</summary>
              <div class="ws-ec-faq__answer">
                <p>はい、可能です。将来の拡張を前提とした設計を行っていますので、機能追加やカスタマイズにも対応できます。</p>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q9. 更新や保守はどこまで含まれますか？</summary>
              <div class="ws-ec-faq__answer">
                <p>サーバー・ドメインの管理を含め、保守対応は月額内で実施します。さらに、月2回までのテキスト修正や画像差し替えなどの更新作業も無料で対応いたします。</p>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q10. 追加費用が発生するケースはありますか？</summary>
              <div class="ws-ec-faq__answer">
                <p>大幅なカスタマイズ、ページ追加、商品登録数の超過、有料アプリ導入などが必要な場合は追加費用が発生することがあります。その際は必ず事前にご説明いたします。</p>
              </div>
            </details>
            <details class="ws-ec-faq__item">
              <summary class="ws-ec-faq__question">Q11. なぜ初期費用なしで提供できるのですか？</summary>
              <div class="ws-ec-faq__answer">
                <p>制作内容の標準化に加え、AIツールなどを活用することで設計・制作の効率化を図っています。さらに月額モデルで継続運用する仕組みにより、初期費用を抑えた合理的な価格を実現しています。</p>
              </div>
            </details>
          </div>
        </div>
      </section>

      <section id="ws-ec-docs-form" class="ws-ec-contact ws-ec-fade" aria-labelledby="ws-ec-contact-title">
        <div class="ws-ec-contact__inner">
          <p class="ws-ec-contact__eyebrow">CONTACT FORM</p>
          <h2 id="ws-ec-contact-title" class="ws-ec-contact__title">無料相談はこちらから</h2>
          <p class="ws-ec-contact__lead">ご相談内容をご入力ください。通常1営業日以内に担当者よりご連絡いたします。</p>
          <div class="form-wrapper">
            <script src="https://js-na2.hsforms.net/forms/embed/48153453.js" defer></script>
            <div class="hs-form-frame" data-region="na2" data-form-id="bf7c2589-af6c-47c8-a017-f6ae2303be47" data-portal-id="48153453"></div>
          </div>
        </div>
      </section>
    </main>
    <footer class="ws-ec-footer">
      <div class="ws-ec-footer__inner">
        <div class="ws-ec-footer__top">
          <a class="ws-ec-footer__brand" href="#top">ウィルサポEC</a>
          <nav class="ws-ec-footer__nav" aria-label="フッターナビゲーション">
            <a class="ws-ec-footer__link" href="#concept">コンセプト</a>
            <a class="ws-ec-footer__link" href="#feature">特徴</a>
            <a class="ws-ec-footer__link" href="#case">制作事例</a>
            <a class="ws-ec-footer__link" href="#pricing">料金</a>
            <a class="ws-ec-footer__link" href="#flow">制作の流れ</a>
            <a class="ws-ec-footer__link" href="#faq">FAQ</a>
            <a class="ws-ec-footer__link ws-ec-footer__link--cta" href="#ws-ec-docs-form">無料相談</a>
            <a class="ws-ec-footer__link ws-ec-footer__link--cta" href="https://site.will-corp.co.jp/will-support-ec-dl-contents" target="_blank" rel="noopener noreferrer">資料請求</a>
          </nav>
        </div>
        <p class="ws-ec-footer__site-link">
          <a class="ws-ec-footer__link" href="https://will-corp.co.jp/" target="_blank" rel="noopener">ウィルの公式サイトはこちら</a>
        </p>
        <p class="ws-ec-footer__copy">© Will Support EC. All rights reserved.</p>
      </div>
    </footer>
    <script src="<?php echo get_template_directory_uri(); ?>/will-support-ec-assets/js/script.js" defer></script>
    <?php wp_footer(); ?>
  </body>
</html>
