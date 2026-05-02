<?php
  /*
  Template Name: Page Top Ver.3
  Template Post Type: page
  */
?>

  <?php get_header("v3"); ?>

  <div class="loading-container">
    <section class="page-topv3-fv pc">
      <div class="container">
        <div class="wrapper">
          <header class="page-topv3-header">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'header-menu-top',
                'container' => 'nav',
                'before' => '<span></span>'
              ));
            ?>
          </header>
          <div class="bg-img">
            <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-fv.png" alt=""> -->
            <video autoplay muted loop playsinline id="myVideo-sp" src="<?php echo get_template_directory_uri(); ?>/img/page-top-fv-movie.mp4" ></video>
          </div>
          <div class="logo-wrapper">
            <div class="logo-text">
              <p class="text1">BtoB Marketing & Web Strategy</p>
              <p class="text2">Sales Foundation Design</p>
            </div>
            <h1 class="logo-img">
              <a href="<?php echo home_url( '/' ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-header-logo.png" alt="合同会社ウィル 福岡 久留米 八女 北九州 サブスクホームページ 格安ホームページ ウェブ集客 ウェブ制作 ウェブマーケティング ホームページ制作">
              </a>
            </h1>
          </div>
          <div class="fv-message-wrapper">
            <p class="ja">ともに、未来を創る</p>
            <p class="sub1">BtoB中小企業の営業基盤を、Webから設計</p>
            <p class="sub2">事業のパートナーとして、ともに伴走します</p>
          </div>
          <div class="fv-cta-cards">
            <a href="/ebook/" class="fv-cta-card fv-cta-card--ebook">
              <span class="cta-label">DOWNLOAD</span>
              <span class="cta-text">BtoBマーケお役立ち<br>ダウンロード資料一覧はこちら</span>
            </a>
            <a href="/diagnosis/" class="fv-cta-card fv-cta-card--diagnosis">
              <span class="cta-label">DIAGNOSIS</span>
              <span class="cta-text">1分でできる<br>自社のWebマーケ診断はこちら</span>
            </a>
          </div>
          <div class="scroll"></div>
        </div>
      </div>
    </section>

    <section class="page-topv3-fv-sp sp">
      <div class="container">
        <div class="wrapper">
          <div class="fv-sp-video">
            <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-sp_top.jpg" alt=""> -->
            <video autoplay muted loop playsinline id="myVideo-sp" src="<?php echo get_template_directory_uri(); ?>/img/page-top-fv-movie-sp.mp4" ></video>
            <div class="logo-wrapper">
              <div class="logo-text">
                <p class="text1">BtoB Marketing & Web Strategy</p>
                <p class="text2">Sales Foundation Design</p>
              </div>
              <a href="<?php echo home_url( '/' ); ?>" class="logo-img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-header-logo.png" alt="合同会社ウィル 福岡 ウェブ制作 ウェブマーケティング ホームページ制作">
              </a>
            </div>
            <div class="fv-message-wrapper">
              <p class="ja">ともに、未来を創る</p>
              <p class="sub1">BtoB中小企業の営業基盤を、Webから設計</p>
              <p class="sub2">事業のパートナーとして、ともに伴走します</p>
            </div>
          </div>
          <div class="fv-cta-cards-sp">
            <a href="/ebook/" class="fv-cta-card fv-cta-card--ebook">
              <span class="cta-label">DOWNLOAD</span>
              <span class="cta-text">BtoBマーケお役立ち<br>ダウンロード資料一覧はこちら</span>
            </a>
            <a href="/diagnosis/" class="fv-cta-card fv-cta-card--diagnosis">
              <span class="cta-label">DIAGNOSIS</span>
              <span class="cta-text">1分でできる<br>自社のWebマーケ診断はこちら</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="page-topv3-issue">
      <div class="container">
        <div class="wrapper">
          <div class="issue-header">
            <h2>Webや営業の取り組みで、<br>次のようなことはございませんか？</h2>
          </div>

          <div class="issue-wrapper">

            <div class="issue">
              <span class="issue-number">01</span>
              <p>サイトはあるが、月間アクセス数を把握しておらず、検索しても出てこない</p>
            </div>

            <div class="issue">
              <span class="issue-number">02</span>
              <p>トップページや事業紹介を見ても、自社の強みや独自性が伝わらない</p>
            </div>

            <div class="issue">
              <span class="issue-number">03</span>
              <p>比較検討の段階で、競合他社にお客様が流れてしまっている</p>
            </div>

            <div class="issue">
              <span class="issue-number">04</span>
              <p>紹介や既存営業に依存しており、安定した新規問い合わせがない</p>
            </div>

            <div class="issue">
              <span class="issue-number">05</span>
              <p>営業活動が属人化しており、特定の担当者頼みで仕組みになっていない</p>
            </div>

            <div class="issue">
              <span class="issue-number">06</span>
              <p>展示会や名刺で集めた見込み客情報が、その後活用できていない</p>
            </div>

          </div>

          <div class="issue-bridge">
            <p>
              一見バラバラに見えるこれらの課題は、<br>
              実は<span class="bridge-keyword">「営業基盤」</span>という一つの構造に集約されます。
            </p>
          </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-Management Issue.png" alt="management issue" class="text-image rellax-up">
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-logo-bg.png" alt="合同会社ウィル" class="logo-image rellax-up">
      </div>
    </section>

    <section class="page-topv3-concept" id="concept">
      <div class="container">
        <div class="wrapper">

          <div class="concept-header">
            <p class="en">CONCEPT</p>
            <h2>私たちの考え方</h2>
            <p class="subtitle">BtoBマーケティングで成果を出すために、私たちが大切にしていること</p>
          </div>

          <div class="concept-blocks">

            <div class="concept-block animation-target to-up">
              <div class="concept-block-header">
                <span class="block-number">01</span>
                <h3>BtoBマーケの本質</h3>
              </div>
              <div class="concept-block-body">
                <p>
                  多くの中小企業が、SEO・広告・SNS・展示会など個別の施策に取り組みながらも、継続的な成果に結びつかない状態に悩まされています。
                </p>
                <p>
                  その理由は、施策が足りないからではありません。お客様が<span class="keyword">「認知」「興味・関心」「信頼・選択」</span>と段階を踏んで意思決定する流れに対して、それぞれの施策が線でつながっていないからです。
                </p>
              </div>
            </div>

            <div class="concept-block animation-target to-up">
              <div class="concept-block-header">
                <span class="block-number">02</span>
                <h3>ウィルの解決アプローチ</h3>
              </div>
              <div class="concept-block-body">
                <p>
                  ウィルは、Web・MA・SNS・コンテンツを個別のツールとしてではなく、お客様の意思決定の流れに沿って配置される、<span class="keyword">営業基盤を構成する要素</span>として捉えています。
                </p>
                <p>
                  <span class="keyword">施策の点を線でつなぎ、線を仕組みに変える。</span>これが、再現性のある事業成長の土台になります。
                </p>
              </div>
            </div>

          </div>

          <div class="concept-video">
            <p class="concept-video-lead">より具体的な内容は、こちらの動画で詳しく解説しています。</p>
            <div class="concept-video-frame">
              <div class="video-placeholder">
                <p>YouTube動画は今後追加予定</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="page-topv3-strength" id="strength">
      <div class="container">
        <div class="wrapper">

          <div class="strength-header">
            <p class="en">OUR STRENGTH</p>
            <h2>私たちの選ばれる<br class="sp">4つの強み</h2>
            <p class="subtitle">営業基盤の設計から実装、運用まで、<br class="sp">ワンストップで支援します</p>
          </div>

          <div class="strength-list">
            <div class="strength-item animation-target to-up">
              <div class="strength-item-header">
                <span class="strength-number">01</span>
                <h3>営業構造から逆算するBtoB Web戦略設計</h3>
              </div>
              <div class="strength-item-body">
                <p>
                  Webサイト単体の改善ではなく、お客様の意思決定プロセス全体から逆算して設計を行います。<span class="keyword">「誰に・どのタイミングで・何を伝えるか」</span>を営業構造から整理し、認知から信頼・選択までの流れに沿ってWebサイトを配置します。表面的なリニューアルではなく、営業基盤の中心として機能するWebをつくることで、比較検討フェーズで選ばれる構造を実装します。
                </p>
              </div>
            </div>

            <div class="strength-item animation-target to-up">
              <div class="strength-item-header">
                <span class="strength-number">02</span>
                <h3>Webを軸に、MA・SNS・コンテンツを統合する支援力</h3>
              </div>
              <div class="strength-item-body">
                <p>
                  サイト制作だけ・MA導入だけ・SNS運用だけといった個別支援ではなく、<span class="keyword">5つのサービスを統合して提供</span>します。Webを中心に据え、MAで見込み客との関係構築を仕組み化し、コンテンツSEOで継続的な認知を獲得し、SNSで信頼を積み上げる。施策の点をバラバラに動かすのではなく、お客様の意思決定の流れに沿って一つの線でつなぎ、営業基盤として機能させます。
                </p>
              </div>
            </div>

            <div class="strength-item animation-target to-up">
              <div class="strength-item-header">
                <span class="strength-number">03</span>
                <h3>事業のパートナーとして、ともに伴走するスタイル</h3>
              </div>
              <div class="strength-item-body">
                <p>
                  私たちは、制作会社や外注先ではなく、<span class="keyword">事業のパートナー</span>でありたいと考えています。サイトを作って終わり、ツールを入れて終わりではなく、お客様の事業成長と並走することを前提に関わります。理想論ではなく、今の体制や予算に合った現実的な提案を行い、小さく始めて改善を重ねながら強くしていく。長期的な関係性のなかで、ともに事業を強くしていくスタイルを大切にしています。
                </p>
              </div>
            </div>

            <div class="strength-item animation-target to-up">
              <div class="strength-item-header">
                <span class="strength-number">04</span>
                <h3>属人的な施策ではなく、再現性のある仕組みづくり</h3>
              </div>
              <div class="strength-item-body">
                <p>
                  担当者の経験や勘に依存する施策では、人が変わると成果も止まります。私たちは、誰が運用しても機能する<span class="keyword">「仕組み」として営業基盤を設計</span>することを大切にしています。お客様の意思決定の流れに沿って、Web・MA・SNS・コンテンツを配置し、それぞれの役割と連携を明確にする。一度きりの成果ではなく、継続的に成果が積み上がる再現性のある事業成長の土台をつくります。
                </p>
              </div>
            </div>

          </div>

          <div class="strength-cta">
            <a href="/about/" class="strength-cta-link">
              <span class="strength-cta-text">ウィルについて、もっと詳しく</span>
              <span class="strength-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section>

    <section class="page-topv3-mainproduct" id="mainproduct">
      <div class="container">
        <div class="wrapper">

          <div class="mainproduct-header">
            <p class="lead">
              ウィルが提供する5つの支援領域の中心にあるのが、<br>
              <span class="keyword">月額制ホームページ制作サービス</span>です。<br>
              事業フェーズに合った形で営業基盤の構築を支援します。
            </p>
          </div>

          <ul class="mainproduct-tab">
            <li data-mp-tab="mp-tab1" class="active">
              <a href="#willsupport">
                <span class="mp-tab-label">BtoB中小企業向け</span>
                <span class="mp-tab-name">ウィルサポ</span>
              </a>
            </li>
            <li data-mp-tab="mp-tab2">
              <a href="#willsupport-ec">
                <span class="mp-tab-label">EC事業者向け</span>
                <span class="mp-tab-name">ウィルサポEC</span>
              </a>
            </li>
          </ul>

          <div class="mainproduct-wrapper animation-target to-up">

            <div id="mp-tab1" class="mainproduct-item is-active">
              <div class="mp-target-label">[BtoB中小企業向け]</div>
              <p class="mp-catch">
                あなたのWebサイトは、<br>
                競合と比較されたときに勝てていますか？
              </p>
              <div class="mp-desc mp-desc--ws">
                <div class="mp-desc-grid">
                  <div class="mp-desc-content">
                    <p class="mp-type">サブスク型ホームページサービス</p>
                    <h3 class="mp-name">
                      <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/fv-logotext.png" alt="ウィルサポ">
                    </h3>
                    <ul class="mp-badges">
                      <li>初期費用<br>無料</li>
                      <li>契約期間の<br>縛りなし</li>
                      <li>BtoB特化の<br>構成設計</li>
                    </ul>
                  </div>
                  <div class="mp-desc-visual">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/fv-illust.png" alt="">
                  </div>
                </div>
                <p class="mp-description">
                  BtoB中小企業のための戦略設計から運用まで伴走する<br>
                  月額費用型のサブスクホームページ制作サービスです
                </p>
              </div>
              <div class="mp-btn">
                <a href="/willsupport/" class="mp-btn-link">
                  <span class="mp-btn-text"><span class="pc">ウィルサポの</span>サービス詳細を見る</span>
                  <span class="mp-btn-arrow">→</span>
                </a>
              </div>
            </div>

            <div id="mp-tab2" class="mainproduct-item">
              <div class="mp-target-label">[EC事業者向け]</div>
              <p class="mp-catch">スモールスタートで、本気のECを。</p>
              <div class="mp-desc mp-desc--ec">
                <div class="mp-desc-grid">
                  <div class="mp-desc-content">
                    <p class="mp-type">EC事業者向けサブスクサービス</p>
                    <h3 class="mp-name mp-name--ec">ウィルサポEC</h3>
                    <ul class="mp-badges">
                      <li>初期費用<br>無料</li>
                      <li>契約期間の<br>縛りなし</li>
                      <li>自由な<br>デザイン</li>
                    </ul>
                  </div>
                  <div class="mp-desc-visual">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-ec-assets/img/page-willsuppoec-hero1.png" alt="">
                  </div>
                </div>
                <p class="mp-description">
                  ECサイト制作会社をお探しの方や、構築を代行してほしい企業様へ。<br>
                  ウィルサポECは、構成設計から公開後の運用・保守まで一括対応する月額型サービスです。
                </p>
              </div>
              <div class="mp-btn">
                <a href="/will-support-ec/" class="mp-btn-link">
                  <span class="mp-btn-text"><span class="pc">ウィルサポECの</span>サービス詳細を見る</span>
                  <span class="mp-btn-arrow">→</span>
                </a>
              </div>
            </div>

          </div>

        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-Service.png" alt="Service" class="rellax-down">
      </div>
    </section>

    <section class="page-topv3-whatwedo" id="whatwedo">
      <div class="container">
        <div class="wrapper">

          <div class="whatwedo-header">
            <p class="en">SERVICES</p>
            <h2>私たちが提供する5つの<br class="sp">サービス領域</h2>
            <p class="lead">
              ウィルは、Webサイト制作を起点に、<br>MA・コンテンツSEO・Instagram・グラフィックまで、<br>
              BtoB中小企業の営業基盤を統合的に支援する5つのサービスを提供しています。
            </p>
          </div>

          <div class="whatwedo-list">
            <a href="/service/web-creative/" class="whatwedo-item animation-target to-up">
              <div class="whatwedo-item-header">
                <span class="whatwedo-number">01</span>
                <h3>Webサイト制作</h3>
              </div>
              <div class="whatwedo-icon">
                <i class="fas fa-laptop-code"></i>
              </div>
              <p class="whatwedo-catch">営業基盤の中核となる、戦略設計型のWebサイト制作</p>
              <p class="whatwedo-body">
                ウィルサポ・ウィルサポECに加え、フルオーダー型・大規模リニューアルなど、営業構造から逆算したWebサイト制作を、企業様の状況に合わせて提供します。
              </p>
              <div class="whatwedo-link">
                <span class="whatwedo-link-text">サービス詳細を見る</span>
                <span class="whatwedo-link-arrow">→</span>
              </div>
            </a>

            <a href="/service/web-marketing/" class="whatwedo-item animation-target to-up">
              <div class="whatwedo-item-header">
                <span class="whatwedo-number">02</span>
                <h3>MA構築・運用支援</h3>
              </div>
              <div class="whatwedo-icon">
                <i class="fas fa-gears"></i>
              </div>
              <p class="whatwedo-catch">見込み客との関係構築を、仕組み化する</p>
              <p class="whatwedo-body">
                展示会や問い合わせで集めた見込み客情報を、その後の関係構築につなげる仕組みづくり。MA導入から運用設計、シナリオ構築まで伴走し、属人化しない営業の流れを実装します。
              </p>
              <div class="whatwedo-link">
                <span class="whatwedo-link-text">サービス詳細を見る</span>
                <span class="whatwedo-link-arrow">→</span>
              </div>
            </a>

            <a href="/service/" class="whatwedo-item animation-target to-up">
              <div class="whatwedo-item-header">
                <span class="whatwedo-number">03</span>
                <h3>コンテンツSEO構築・運用支援</h3>
              </div>
              <div class="whatwedo-icon">
                <i class="fas fa-magnifying-glass-chart"></i>
              </div>
              <p class="whatwedo-catch">継続的な認知獲得を、仕組みでつくる</p>
              <p class="whatwedo-body">
                検索流入を起点とした見込み客の獲得を、コンテンツの設計と継続運用で支援します。記事戦略・キーワード設計・公開後の改善まで、認知層の課題解決を仕組み化します。
              </p>
              <div class="whatwedo-link">
                <span class="whatwedo-link-text">サービス詳細を見る</span>
                <span class="whatwedo-link-arrow">→</span>
              </div>
            </a>

            <a href="/service/sns-support/" class="whatwedo-item animation-target to-up">
              <div class="whatwedo-item-header">
                <span class="whatwedo-number">04</span>
                <h3>Instagram構築・運用支援</h3>
              </div>
              <div class="whatwedo-icon">
                <i class="fab fa-instagram"></i>
              </div>
              <p class="whatwedo-catch">BtoBでも届く、信頼形成型のSNS運用</p>
              <p class="whatwedo-body">
                BtoB中小企業向けに、認知拡大ではなく「信頼形成」を目的としたInstagram運用を支援。アカウント設計から投稿運用まで、営業基盤の補完チャネルとして機能させます。
              </p>
              <div class="whatwedo-link">
                <span class="whatwedo-link-text">サービス詳細を見る</span>
                <span class="whatwedo-link-arrow">→</span>
              </div>
            </a>

            <a href="/service/graphic/" class="whatwedo-item animation-target to-up">
              <div class="whatwedo-item-header">
                <span class="whatwedo-number">05</span>
                <h3>グラフィック制作</h3>
              </div>
              <div class="whatwedo-icon">
                <i class="fas fa-palette"></i>
              </div>
              <p class="whatwedo-catch">営業現場で使える、ビジュアルコミュニケーション</p>
              <p class="whatwedo-body">
                会社案内・サービス資料・展示会パネル・チラシなど、営業現場で使うグラフィック制作を支援します。Web・MA・SNSと連動した一貫性のあるブランド表現を実現します。
              </p>
              <div class="whatwedo-link">
                <span class="whatwedo-link-text">サービス詳細を見る</span>
                <span class="whatwedo-link-arrow">→</span>
              </div>
            </a>

          </div>

        </div>
      </div>
    </section>

    <section class="page-topv3-diagnosis" id="diagnosis-banner">
      <div class="container">

        <div class="diagnosis-section-head">
          <span class="diagnosis-eyebrow">DIAGNOSIS</span>
          <h2 class="diagnosis-title animation-target to-up">
            1分の入力で、<br class="pc">
            貴社のBtoBマーケで<span class="diagnosis-keyword">「最優先すべき一手」</span>が見えます。
          </h2>
          <p class="diagnosis-lead">
            運用体制・現在の施策・抱えている課題。<br class="pc">
            10問の質問からウィルが構造的に分析し、改善すべき優先順位をまとめたレポートをお送りします。
          </p>
        </div>

        <div class="diagnosis-panel animation-target to-up">
          <h3 class="diagnosis-panel-title">無料診断レポートをお送りします</h3>
          <p class="diagnosis-panel-text">所要時間は1分。面談は不要です。<br>回答内容に基づき、貴社の優先課題と取り組むべき一手をまとめた個別レポートを送付します。</p>
          <ul class="diagnosis-features">
            <li>所要1分</li>
            <li>面談不要</li>
            <li>個別レポート送付</li>
          </ul>
          <a href="/diagnosis/" class="diagnosis-btn">1分でできる無料診断を受ける</a>
        </div>

      </div>
    </section>

    <section class="page-topv3-ebook" id="ebook">
      <div class="container">
        <div class="wrapper">

          <div class="ebook-header">
            <p class="en">DOWNLOAD</p>
            <h2>
              BtoBマーケの実務ナレッジを、<br>
              資料にまとめて公開しています。
            </h2>
            <p class="lead">
              戦略全体の見取り図から、サイト改善・MA連携・コンテンツSEOまで。<br class="pc">
              BtoBマーケの実務で活用できる4つの資料を、無料でダウンロードいただけます。
            </p>
          </div>

          <div class="ebook-cards">

            <a href="#" class="ebook-card ebook-card--01 animation-target to-up">
              <!-- TODO: HubSpotフォームURL差し替え -->
              <div class="ebook-card-thumb">
                <!-- TODO: サムネイル画像が用意でき次第、以下と差し替え -->
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/ebook-01.png" alt="BtoB Webマーケティング戦略ロードマップ"> -->
                <div class="ebook-card-thumb-placeholder">
                  <span class="ebook-card-no">EBOOK 01</span>
                </div>
              </div>
              <div class="ebook-card-body">
                <h3 class="ebook-card-title">BtoB Webマーケティング<br>戦略ロードマップ</h3>
                <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">BtoBマーケの全体像を、1冊で。</span></p>
                <p class="ebook-card-desc">
                  Webサイト・SEO・MA・コンテンツまで、BtoBマーケに必要な打ち手の全体像と進め方を体系的に整理した総合ガイドです。何から始めるべきか迷っている方に。
                </p>
                <span class="ebook-card-cta">
                  <span class="ebook-card-cta-text">資料をダウンロード</span>
                  <span class="ebook-card-cta-arrow">→</span>
                </span>
              </div>
            </a>

            <a href="#" class="ebook-card ebook-card--02 animation-target to-up">
              <!-- TODO: HubSpotフォームURL差し替え -->
              <div class="ebook-card-thumb">
                <!-- TODO: サムネイル画像が用意でき次第、以下と差し替え -->
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/ebook-02.png" alt="商談化率を上げるBtoBサイトの設計原則"> -->
                <div class="ebook-card-thumb-placeholder">
                  <span class="ebook-card-no">EBOOK 02</span>
                </div>
              </div>
              <div class="ebook-card-body">
                <h3 class="ebook-card-title">商談化率を上げる<br>BtoBサイトの設計原則</h3>
                <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">サイトを、商談につながる構造に。</span></p>
                <p class="ebook-card-desc">
                  「制作したのに問い合わせが来ない」をなくす、BtoBサイトの設計原則を解説。営業構造から逆算したサイト設計の考え方をまとめました。
                </p>
                <span class="ebook-card-cta">
                  <span class="ebook-card-cta-text">資料をダウンロード</span>
                  <span class="ebook-card-cta-arrow">→</span>
                </span>
              </div>
            </a>

            <a href="#" class="ebook-card ebook-card--03 animation-target to-up">
              <!-- TODO: HubSpotフォームURL差し替え -->
              <div class="ebook-card-thumb">
                <!-- TODO: サムネイル画像が用意でき次第、以下と差し替え -->
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/ebook-03.png" alt="Web×MA連携設計図"> -->
                <div class="ebook-card-thumb-placeholder">
                  <span class="ebook-card-no">EBOOK 03</span>
                </div>
              </div>
              <div class="ebook-card-body">
                <h3 class="ebook-card-title">Web×MA連携設計図</h3>
                <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">WebとMAを<br>営業の仕組みに変える。</span></p>
                <p class="ebook-card-desc">
                  Webサイトで獲得したリードを、MAで育成し、商談につなげるまでの設計図。ツール導入だけで止まらないMA活用の本質を解説します。
                </p>
                <span class="ebook-card-cta">
                  <span class="ebook-card-cta-text">資料をダウンロード</span>
                  <span class="ebook-card-cta-arrow">→</span>
                </span>
              </div>
            </a>

            <a href="#" class="ebook-card ebook-card--04 animation-target to-up">
              <!-- TODO: HubSpotフォームURL差し替え -->
              <div class="ebook-card-thumb">
                <!-- TODO: サムネイル画像が用意でき次第、以下と差し替え -->
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/ebook-04.png" alt="BtoBコンテンツSEO実践ガイド"> -->
                <div class="ebook-card-thumb-placeholder">
                  <span class="ebook-card-no">EBOOK 04</span>
                </div>
              </div>
              <div class="ebook-card-body">
                <h3 class="ebook-card-title">BtoBコンテンツ<br>SEO実践ガイド</h3>
                <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">検索流入を、商談につなげる。</span></p>
                <p class="ebook-card-desc">
                  検索順位ではなく商談化率で見るBtoBコンテンツSEOの考え方と、キーワード戦略・記事構造・運用設計を実装手順としてまとめた実践ガイドです。
                </p>
                <span class="ebook-card-cta">
                  <span class="ebook-card-cta-text">資料をダウンロード</span>
                  <span class="ebook-card-cta-arrow">→</span>
                </span>
              </div>
            </a>

          </div>

          <div class="ebook-bottom-cta">
            <a href="/ebook/" class="ebook-bottom-cta-link">
              <span class="ebook-bottom-cta-text">ダウンロード資料一覧はこちら</span>
              <span class="ebook-bottom-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section>

    <section class="page-topv3-youtube" id="youtube">
      <div class="container">
        <div class="wrapper">

          <div class="youtube-header">
            <p class="en">YOUTUBE</p>
            <h2>
              BtoBマーケの実践知を、<br>
              動画でも発信しています。
            </h2>
            <p class="lead">
              営業構造から逆算するBtoBマーケの考え方、Webサイト設計の原則、MA活用の実務、コンテンツSEOの本質。<br class="pc">
              YouTube「ウィルのBtoBマーケ実践チャンネル」では、現場で使える実践知を継続的にお届けしています。
            </p>
          </div>

          <div class="youtube-grid">

            <div class="youtube-item animation-target to-up">
              <div class="youtube-thumb">
                <!-- TODO: 動画公開後、以下のいずれかに差し替え -->
                <!-- 案1: iframe埋め込み -->
                <!-- <iframe src="https://www.youtube.com/embed/VIDEO_ID_01" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <!-- 案2: サムネ画像+リンク -->
                <!-- <a href="https://www.youtube.com/watch?v=VIDEO_ID_01" target="_blank" rel="noopener noreferrer"><img src="..." alt="..."></a> -->
                <div class="youtube-thumb-placeholder">
                  <span class="youtube-thumb-no">VIDEO 01</span>
                  <span class="youtube-thumb-coming">Coming Soon</span>
                  <div class="youtube-thumb-play">
                    <span class="youtube-thumb-play-icon">▶</span>
                  </div>
                </div>
              </div>
              <div class="youtube-info">
                <h3 class="youtube-title">「やってるのに成果が出ない」BtoBマーケで、最も多い構造的な原因</h3>
                <a href="#ebook" class="youtube-related">
                  <span class="youtube-related-label">連動資料</span>
                  <span class="youtube-related-text">BtoB Webマーケティング戦略ロードマップ</span>
                  <span class="youtube-related-arrow">→</span>
                </a>
              </div>
            </div>

            <div class="youtube-item animation-target to-up">
              <div class="youtube-thumb">
                <!-- TODO: 動画公開後、以下のいずれかに差し替え -->
                <!-- 案1: iframe埋め込み -->
                <!-- <iframe src="https://www.youtube.com/embed/VIDEO_ID_02" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <!-- 案2: サムネ画像+リンク -->
                <!-- <a href="https://www.youtube.com/watch?v=VIDEO_ID_02" target="_blank" rel="noopener noreferrer"><img src="..." alt="..."></a> -->
                <div class="youtube-thumb-placeholder">
                  <span class="youtube-thumb-no">VIDEO 02</span>
                  <span class="youtube-thumb-coming">Coming Soon</span>
                  <div class="youtube-thumb-play">
                    <span class="youtube-thumb-play-icon">▶</span>
                  </div>
                </div>
              </div>
              <div class="youtube-info">
                <h3 class="youtube-title">なぜBtoBサイトは「問い合わせが来ない」のか - 営業構造から考える視点</h3>
                <a href="#ebook" class="youtube-related">
                  <span class="youtube-related-label">連動資料</span>
                  <span class="youtube-related-text">商談化率を上げるBtoBサイトの設計原則</span>
                  <span class="youtube-related-arrow">→</span>
                </a>
              </div>
            </div>

            <div class="youtube-item animation-target to-up">
              <div class="youtube-thumb">
                <!-- TODO: 動画公開後、以下のいずれかに差し替え -->
                <!-- 案1: iframe埋め込み -->
                <!-- <iframe src="https://www.youtube.com/embed/VIDEO_ID_03" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <!-- 案2: サムネ画像+リンク -->
                <!-- <a href="https://www.youtube.com/watch?v=VIDEO_ID_03" target="_blank" rel="noopener noreferrer"><img src="..." alt="..."></a> -->
                <div class="youtube-thumb-placeholder">
                  <span class="youtube-thumb-no">VIDEO 03</span>
                  <span class="youtube-thumb-coming">Coming Soon</span>
                  <div class="youtube-thumb-play">
                    <span class="youtube-thumb-play-icon">▶</span>
                  </div>
                </div>
              </div>
              <div class="youtube-info">
                <h3 class="youtube-title">MAを導入しても営業が変わらない、本当の理由</h3>
                <a href="#ebook" class="youtube-related">
                  <span class="youtube-related-label">連動資料</span>
                  <span class="youtube-related-text">Web×MA連携設計図</span>
                  <span class="youtube-related-arrow">→</span>
                </a>
              </div>
            </div>

            <div class="youtube-item animation-target to-up">
              <div class="youtube-thumb">
                <!-- TODO: 動画公開後、以下のいずれかに差し替え -->
                <!-- 案1: iframe埋め込み -->
                <!-- <iframe src="https://www.youtube.com/embed/VIDEO_ID_04" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <!-- 案2: サムネ画像+リンク -->
                <!-- <a href="https://www.youtube.com/watch?v=VIDEO_ID_04" target="_blank" rel="noopener noreferrer"><img src="..." alt="..."></a> -->
                <div class="youtube-thumb-placeholder">
                  <span class="youtube-thumb-no">VIDEO 04</span>
                  <span class="youtube-thumb-coming">Coming Soon</span>
                  <div class="youtube-thumb-play">
                    <span class="youtube-thumb-play-icon">▶</span>
                  </div>
                </div>
              </div>
              <div class="youtube-info">
                <h3 class="youtube-title">検索順位が上がっても問い合わせが増えない、本当の理由</h3>
                <a href="#ebook" class="youtube-related">
                  <span class="youtube-related-label">連動資料</span>
                  <span class="youtube-related-text">BtoBコンテンツSEO実践ガイド</span>
                  <span class="youtube-related-arrow">→</span>
                </a>
              </div>
            </div>

          </div>

          <div class="youtube-bottom-cta">
            <a href="#" class="youtube-bottom-cta-link" target="_blank" rel="noopener noreferrer">
              <!-- TODO: YouTubeチャンネルURL差し替え (BtoBマーケ実践チャンネル by ウィル) -->
              <span class="youtube-bottom-cta-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M21.582,6.186c-0.23-0.86-0.908-1.538-1.768-1.768C18.254,4,12,4,12,4S5.746,4,4.186,4.418c-0.86,0.23-1.538,0.908-1.768,1.768C2,7.746,2,12,2,12s0,4.254,0.418,5.814c0.23,0.86,0.908,1.538,1.768,1.768C5.746,20,12,20,12,20s6.254,0,7.814-0.418c0.861-0.23,1.538-0.908,1.768-1.768C22,16.254,22,12,22,12S22,7.746,21.582,6.186z M10,15.464V8.536L16,12L10,15.464z"/></svg>
              </span>
              <span class="youtube-bottom-cta-text">チャンネルを見る</span>
              <span class="youtube-bottom-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section>

    <section class="page-topv3-works" id="works">
      <div class="container">
        <div class="wrapper">

          <div class="works-header">
            <p class="en">WORKS</p>
            <h2>
              営業構造から逆算した、<br>
              BtoBサイトの制作実績。
            </h2>
            <p class="lead">
              「作って終わり」ではなく、営業構造とコンテンツ設計から逆算したWebサイトを、<br class="pc">
              業種の異なるBtoB企業向けに制作してきました。一部の事例をご紹介します。
            </p>
          </div>

          <div class="works-list">
            <?php
              // 制作実績(page-works.php と同じハードコード配列形式・トップは厳選6件)
              $topv3_works_items = [
                [
                  'name' => 'ジャパンマーベラス様',
                  'url'  => 'https://japanmarvelous.com/',
                  'img'  => 'marvelous.png',
                  'tag'  => 'BtoB',
                ],
                [
                  'name' => '株式会社システムライン様',
                  'url'  => 'https://systemline.jp/',
                  'img'  => 'systemline.png',
                  'tag'  => 'BtoB',
                ],
                [
                  'name' => '株式会社Mr財務屋様',
                  'url'  => 'https://mrzaimuya.com/',
                  'img'  => 'mrzaimuya.png',
                  'tag'  => '税務・財務',
                ],
                [
                  'name' => '村岡測量登記事務所様',
                  'url'  => 'https://muraoka-touki.com/',
                  'img'  => 'muraoka.png',
                  'tag'  => '士業',
                ],
                [
                  'name' => '株式会社GRIT様',
                  'url'  => 'https://gritcoco-realestate.com/',
                  'img'  => 'grit.png',
                  'tag'  => '不動産',
                ],
                [
                  'name' => '株式会社Lily様',
                  'url'  => 'https://lilyproductionjp.com/',
                  'img'  => 'lily.png',
                  'tag'  => 'BtoB',
                ],
              ];
            ?>

            <?php foreach ( $topv3_works_items as $item ) : ?>
              <a href="<?php echo esc_url( $item['url'] ); ?>"
                 class="works-card animation-target to-up"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="<?php echo esc_attr( $item['name'] ); ?>のWebサイトを新しいタブで開く">

                <div class="works-card-thumb">
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/will-support-v2-assets/img/' . $item['img'] ); ?>"
                       alt="<?php echo esc_attr( $item['name'] ); ?> Webサイト制作実績"
                       width="800" height="450" loading="lazy" decoding="async">
                </div>

                <div class="works-card-body">
                  <p class="works-card-name"><?php echo esc_html( $item['name'] ); ?></p>
                </div>

              </a>
            <?php endforeach; ?>
          </div>

          <div class="works-bottom-cta">
            <a href="<?php echo get_page_link(43); ?>" class="works-bottom-cta-link">
              <span class="works-bottom-cta-text">制作実績一覧はこちら</span>
              <span class="works-bottom-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section>

    <section class="page-topv3-blog">
      <div class="container">
        <div class="wrapper">
          <div class="sticky">
            <div class="sticky-container">
              <div class="sticky-wrapper">

                <div class="blog-v5-header">
                  <p class="en">BLOG</p>
                  <h2 class="blog-v5-headline">
                    個別施策ではなく、<br>
                    営業構造から考える
                  </h2>
                  <p class="blog-v5-lead">
                    営業仕組み化、リード獲得、価値訴求の整理。<br>
                    BtoB中小企業の経営者・担当者の意思決定に役立つ視点を、ブログで継続的に発信しています。中でも特にお読みいただきたい6本をご紹介します。
                  </p>
                </div>

                <div class="blog-v5-bottom-cta">
                  <a href="/blog/" class="blog-v5-bottom-cta-link">
                    <span class="blog-v5-bottom-cta-text">ブログ一覧はこちら</span>
                    <span class="blog-v5-bottom-cta-arrow">→</span>
                  </a>
                </div>

              </div>
            </div>
          </div>
          <div class="content-wrapper">

            <div class="blog-v5-grid">
              <?php
                // 別WordPress (https://will-corp.co.jp/blog/) の REST API から
                // 指定ID 6本を順序維持で取得し、6時間キャッシュする
                $featured_ids = array(710, 656, 705, 748, 762, 715);
                $cache_key    = 'top_blog_featured_v2';
                $featured_posts = get_transient($cache_key);

                if ($featured_posts === false) {
                  $endpoint = 'https://will-corp.co.jp/blog/wp-json/wp/v2/posts'
                            . '?include=' . implode(',', $featured_ids)
                            . '&orderby=include'
                            . '&_embed=1';
                  $response = wp_remote_get($endpoint, array('timeout' => 10));

                  if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                    $body = wp_remote_retrieve_body($response);
                    $featured_posts = json_decode($body, true);
                    if (is_array($featured_posts)) {
                      set_transient($cache_key, $featured_posts, 6 * HOUR_IN_SECONDS);
                    }
                  }
                }

                if (!empty($featured_posts) && is_array($featured_posts)):
                  foreach ($featured_posts as $post_data):
                    $title     = isset($post_data['title']['rendered']) ? html_entity_decode($post_data['title']['rendered'], ENT_QUOTES, 'UTF-8') : '';
                    $permalink = isset($post_data['link']) ? $post_data['link'] : '#';

                    // 更新日(リライト基準・ISO 8601 → Y.m.d)
                    $date_str = '';
                    if (!empty($post_data['modified'])) {
                      $date_str = mysql2date('Y.m.d', $post_data['modified']);
                    } elseif (!empty($post_data['date'])) {
                      $date_str = mysql2date('Y.m.d', $post_data['date']);
                    }

                    // アイキャッチ画像URL
                    $thumb_url = '';
                    if (!empty($post_data['_embedded']['wp:featuredmedia'][0])) {
                      $media = $post_data['_embedded']['wp:featuredmedia'][0];
                      if (!empty($media['media_details']['sizes']['medium_large']['source_url'])) {
                        $thumb_url = $media['media_details']['sizes']['medium_large']['source_url'];
                      } elseif (!empty($media['source_url'])) {
                        $thumb_url = $media['source_url'];
                      }
                    }

                    // カテゴリ名(最初の1つ)
                    $category_name = '';
                    if (!empty($post_data['_embedded']['wp:term'][0][0]['name'])) {
                      $category_name = $post_data['_embedded']['wp:term'][0][0]['name'];
                    }
              ?>

              <div class="blog-v5-card animation-target to-right">
                <a href="<?php echo esc_url($permalink); ?>" target="_blank" rel="noopener noreferrer">

                  <?php if (!empty($thumb_url)): ?>
                    <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($title); ?>">
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                  <?php endif; ?>

                  <div class="text-wrapper">
                    <div class="above">
                      <?php if (!empty($date_str)): ?>
                        <span class="date"><?php echo esc_html($date_str); ?></span><br class="sp">
                      <?php endif; ?>
                      <?php if (!empty($category_name)): ?>
                        <span class="category"><span><?php echo esc_html($category_name); ?></span></span>
                      <?php endif; ?>
                    </div>
                    <p class="title"><?php echo esc_html($title); ?></p>
                  </div>

                </a>
              </div>

              <?php
                  endforeach;
                else:
              ?>
                <p class="blog-v5-empty">記事を読み込めませんでした。</p>
              <?php endif; ?>
            </div>

          </div>

          <div class="blog-v5-bottom-cta blog-v5-bottom-cta--sp">
            <a href="/blog/" class="blog-v5-bottom-cta-link">
              <span class="blog-v5-bottom-cta-text">ブログ一覧はこちら</span>
              <span class="blog-v5-bottom-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section>

    <!-- <section class="page-topv3-insta">
      <div class="container">
        <div class="wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-instagram.png" alt="instagram">
          <h2 class="rellax-horizontal"><span></span>インスタグラム</h2>
          <?php
            if(have_posts()):
              while(have_posts()): the_post();
          ?>
          <div class="insta-wrapper">
            <?php the_content(); ?>
          </div>
          <?php
            endwhile;
          endif;
          ?>
          <div class="page-topv3-btn">
            <a href="<?php echo get_page_link(43) ?>">一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
          </div>
        </div>
      </div>
    </section> -->

    <section class="page-topv3-about">
      <div class="container">
        <div class="wrapper">
          <div class="content-wrapper animation-target to-up">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-about-pic.png" alt="">

            <div class="about-v5-text">

              <div class="about-v5-header">
                <p class="about-v5-en">ABOUT</p>
              </div>

              <h2 class="about-v5-headline">
                あなたの価値を、<br>
                あなた以上に理解し、広める。
              </h2>

              <p class="about-v5-lead">
                多くのBtoB中小企業の経営者と向き合う中で見てきた現実。<br class="pc">
                私たちウィルは、Webを「営業基盤」として設計し、<br class="pc">
                事業の価値を伝わる形に変えることを使命に、福岡から地方企業の成長を支えています。
              </p>

            </div>

          </div>

          <div class="about-v5-bottom-cta">
            <a href="<?php echo get_page_link(11); ?>" class="about-v5-bottom-cta-link">
              <span class="about-v5-bottom-cta-text">わたしたちの詳細はこちら</span>
              <span class="about-v5-bottom-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section>

    <?php /*
======================================================
旧 .page-topv3-contact(2箇所目・About 直後)
保存日: 2026-04-29
保存理由: 構成書 v5 で Section 13 v5(.page-topv3-contact-v5)
として刷新したため不要。ただし復旧可能性のため
PHPコメントアウトで温存する。
復旧方法: 本コメントを解除すれば旧表示に戻せる。
======================================================
    <section class="page-topv3-contact">
      <div class="container">
        <div class="wrapper">
          <h2>無料相談・お問い合わせ</h2>
          <div class="contact-btn">
            <a href="<?php echo get_page_link(15); ?>">
              <span>CONTACT</span>
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-contactarrow.png" alt="">
            </a>
          </div>
          <p>Web制作や集客などに関するお悩みがある個人・中小企業の経営者様、担当者様はお気軽にご相談ください。<br>具体的な内容が決まっていない場合でも、しっかりと相談に乗らせていただきます。</p>
        </div>
      </div>
    </section>
*/ ?>

    <section class="page-topv3-contact-v5" id="contact">
      <div class="container">
        <div class="wrapper">

          <div class="contact-v5-header">
            <p class="contact-v5-en">CONTACT</p>
            <h2 class="contact-v5-section-title">お問い合わせ</h2>
          </div>

          <h3 class="contact-v5-headline">
            <span class="contact-v5-headline-keyword">「次の一手」</span>を、<br>
            一緒に考えましょう。
          </h3>

          <p class="contact-v5-lead">
            BtoBマーケの戦略整理、Webサイト制作、MA・SEO・コンテンツ運用支援。<br class="pc">
            貴社の状況に合わせて、最適な一手を一緒に考えます。まずはお気軽にご相談ください。
          </p>

          <div class="contact-v5-cta-group">

            <a href="/diagnosis/" class="contact-v5-cta contact-v5-cta--outline">
              <span class="contact-v5-cta-label">DIAGNOSIS</span>
              <span class="contact-v5-cta-text">1分でできる無料診断</span>
              <span class="contact-v5-cta-arrow">→</span>
            </a>

            <a href="<?php echo get_page_link(15); ?>" class="contact-v5-cta contact-v5-cta--solid">
              <span class="contact-v5-cta-label">CONTACT</span>
              <span class="contact-v5-cta-text">お問い合わせはこちら</span>
              <span class="contact-v5-cta-arrow">→</span>
            </a>

          </div>

        </div>
      </div>
    </section>

    <?php get_footer("v3"); ?>
