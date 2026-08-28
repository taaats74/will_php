<?php
  /*
  Template Name: Page Top Ver.3
  Template Post Type: page
  */
?>

  <?php get_header('top'); ?>

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
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-topv3-fv.webp" alt="" width="2880" height="1334" fetchpriority="high" decoding="async">
          </div>
          <div class="logo-wrapper">
            <div class="logo-text">
              <p class="text1">BtoB marketing &amp; Web strategy</p>
              <p class="text2">Sales foundation design</p>
            </div>
            <div class="logo-img">
              <a href="<?php echo home_url( '/' ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-header-logo.webp" alt="合同会社ウィル">
              </a>
            </div>
          </div>
          <div class="fv-message-wrapper">
            <h1 class="fv-title">成果につながるマーケティングを<br>一緒につくります。<span class="visually-hidden">BtoB企業の営業基盤をWebから設計する福岡のマーケティング支援会社</span></h1>
            <p class="fv-lead">御社のマーケティング担当として、何をやれば成果につながるのかを一緒に考えます。<br>展示会やWebサイト、SEO、コンテンツ、顧客情報など、<br>バラバラになりがちな施策をつなぎ、実行から改善まで伴走します。</p>
          </div>
          <div class="fv-cta-cards">
            <a href="<?php echo esc_url( home_url('/btob-marketing-consultation/') ); ?>" class="fv-cta-card fv-cta-card--diagnosis">
              <span class="cta-text"><span class="cta-accent">「何から取り組めばいいか」</span><br>1分でできる<br>貴社のBtoBマーケ診断</span>
            </a>
          </div>
          <div class="scroll"></div>
        </div>
      </div>
    </section>

    <section class="page-topv3-fv-sp sp">
      <div class="container">
        <div class="wrapper">
          <div class="fv-sp-visual">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-topv3-fv.webp" alt="" width="2880" height="1334" fetchpriority="high" decoding="async">
            <div class="logo-wrapper">
              <div class="logo-text">
                <p class="text1">BtoB marketing &amp; Web strategy</p>
                <p class="text2">Sales foundation design</p>
              </div>
              <a href="<?php echo home_url( '/' ); ?>" class="logo-img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-header-logo.webp" alt="合同会社ウィル">
              </a>
            </div>
            <div class="fv-message-wrapper">
              <p class="fv-title">成果につながる<br>マーケティングを<br>一緒につくります。</p>
              <p class="fv-lead">御社のマーケティング担当として、<br>何をやれば成果につながるのかを<br>一緒に考えます。</p>
            </div>
          </div>
          <div class="fv-cta-cards-sp">
            <a href="<?php echo esc_url( home_url('/btob-marketing-consultation/') ); ?>" class="fv-cta-card fv-cta-card--diagnosis">
              <span class="cta-text"><span class="cta-accent">「何から取り組めばいいか」</span><br>1分でできる 貴社のBtoBマーケ診断</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="page-topv3-issue">
      <div class="container">
        <div class="wrapper">
          <div class="issue-header">
            <h2>Webや営業の取り組みで、<br>このようなお悩みはありませんか？</h2>
          </div>

          <div class="issue-wrapper">

            <div class="issue">
              <span class="issue-number">01</span>
              <p>営業活動は頑張っているのに、<br>新規の問い合わせは思うように増えない</p>
            </div>

            <div class="issue">
              <span class="issue-number">02</span>
              <p>紹介や既存顧客からの依頼はあるものの、<br>新しい接点を増やしたい</p>
            </div>

            <div class="issue">
              <span class="issue-number">03</span>
              <p>展示会や広告、Webサイト、SEOなどに取り組んでいるが、お問い合わせや商談につながらない</p>
            </div>

            <div class="issue">
              <span class="issue-number">04</span>
              <p>改善点ややるべきことは何となく分かるが、優先順位が決められない</p>
            </div>

            <div class="issue">
              <span class="issue-number">05</span>
              <p>施策ごとに進めているものの、<br>全体を見てくれる人がいない</p>
            </div>

            <div class="issue">
              <span class="issue-number">06</span>
              <p>マーケティング担当を採用するほどではないが、これから力を入れていきたい</p>
            </div>

          </div>

          <div class="issue-bridge">
            <p>
              必要なのは、新しい施策を増やすことではありません。<br>
              <span class="bridge-keyword">営業やマーケティングをつなぎ、</span><br>
              問い合わせや商談につながる流れをつくることです。
            </p>
          </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-management-issue.webp" alt="management issue" class="text-image rellax-up">
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-logo-bg.webp" alt="合同会社ウィル" class="logo-image rellax-up">
      </div>
    </section>

    <section class="page-topv3-concept" id="concept">
      <div class="container">
        <div class="wrapper">

          <div class="concept-header">
            <p class="en">CONCEPT</p>
            <h2>私たちの考え方</h2>
            <p class="subtitle">成果につながるマーケティングに必要なのは、<br class="sp">「施策を増やすこと」ではありません。</p>
          </div>

          <div class="concept-blocks">

            <div class="concept-block animation-target to-up">
              <div class="concept-block-header">
                <span class="block-number">01</span>
                <h3>施策を増やす前に、<br>つなげる</h3>
              </div>
              <div class="concept-block-body">
                <p>
                  展示会、Webサイト、SEO、広告、顧客情報。<span class="keyword">成果が出ない原因は、施策の数ではなく、それぞれがつながっていないこと</span>にあります。
                </p>
              </div>
            </div>

            <div class="concept-block animation-target to-up">
              <div class="concept-block-header">
                <span class="block-number">02</span>
                <h3>正解を決めつけず、<br>一緒に考える</h3>
              </div>
              <div class="concept-block-body">
                <p>
                  会社によって課題も強みも違います。だから私たちは、テンプレートではなく、<span class="keyword">お客様と一緒に優先順位を決めながら進めます。</span>
                </p>
              </div>
            </div>

            <div class="concept-block animation-target to-up">
              <div class="concept-block-header">
                <span class="block-number">03</span>
                <h3>提案だけで終わらせない</h3>
              </div>
              <div class="concept-block-body">
                <p>
                  戦略を考えるだけでも、制作だけでもありません。<span class="keyword">成果につながるまで改善を重ね、お客様と一緒に育てていきます。</span>
                </p>
              </div>
            </div>

            <div class="concept-block animation-target to-up">
              <div class="concept-block-header">
                <span class="block-number">04</span>
                <h3>戦略から実行まで一気通貫</h3>
              </div>
              <div class="concept-block-body">
                <p>
                  マーケティング戦略だけでは成果は出ません。<span class="keyword">Webサイトの改善や、リード獲得施策や商談化施策まで一貫して支援します。</span>
                </p>
              </div>
            </div>

          </div>

          <!-- <div class="concept-video">
            <p class="concept-video-lead">より具体的な内容は、こちらの動画で詳しく解説しています。</p>
            <div class="concept-video-frame">
              <div class="yt-facade" data-video-id="pZqpWtp93YY" data-title="YouTube video player">
                <button type="button" class="yt-facade__play" aria-label="動画を再生">
                  <img class="yt-facade__thumb"
                       src="https://i.ytimg.com/vi/pZqpWtp93YY/maxresdefault.jpg"
                       alt=""
                       width="560" height="315"
                       loading="lazy">
                  <svg class="yt-facade__icon" aria-hidden="true" viewBox="0 0 68 48">
                    <path d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#f00"/>
                    <path d="M 45,24 27,14 27,34" fill="#fff"/>
                  </svg>
                </button>
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </section>

    <!-- <section class="page-topv3-strength" id="strength">
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
            <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="strength-cta-link">
              <span class="strength-cta-text">ウィルについて、もっと詳しく</span>
              <span class="strength-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section> -->

    <section class="page-topv3-mainproduct" id="mainproduct">
      <div class="container">
        <div class="wrapper">

          <div class="mainproduct-header">
            <p class="lead">
              社外マーケティング担当として、<span class="keyword">何をやれば成果につながるのか</span>を一緒に考え、<span class="keyword">実行から改善まで伴走します</span>
            </p>
          </div>

          <ul class="mainproduct-tab">
            <li data-mp-tab="mp-tab-wg" class="active">
              <a href="#willgrow">
                <span class="mp-tab-label">BtoB向けリード獲得・商談化支援</span>
                <span class="mp-tab-name">ウィルグロー</span>
              </a>
            </li>
            <li data-mp-tab="mp-tab1">
              <a href="#willsupport">
                <span class="mp-tab-label">BtoB向けサブスクHP</span>
                <span class="mp-tab-name">ウィルサポ</span>
              </a>
            </li>
            <?php /* ウィルサポECは非表示（必要時に復活）
            <li data-mp-tab="mp-tab2">
              <a href="#willsupport-ec">
                <span class="mp-tab-label">EC事業者向け</span>
                <span class="mp-tab-name">ウィルサポEC</span>
              </a>
            </li>
            */ ?>
          </ul>

          <div class="mainproduct-wrapper animation-target to-up">

            <!-- ウィルグローLP（page-willgrow-v2.php）の .wg2-hero と文言・デザインを揃える -->
            <div id="mp-tab-wg" class="mainproduct-item is-active">
              <div class="mp-fv mp-fv--wg">
                <div class="mp-fv-grid">
                  <div class="mp-fv-content">
                    <p class="mp-fv-eyebrow">BtoBマーケティング伴走支援</p>
                    <h3 class="mp-fv-logotype">
                      <img src="<?php echo get_template_directory_uri(); ?>/will-grow-v2-assets/images/hero-logotype.webp" alt="ウィルグロー" width="1130" height="240" loading="lazy" decoding="async">
                    </h3>
                    <ul class="mp-fv-badges">
                      <li class="mp-fv-badge">お問い合わせ<br>獲得</li>
                      <li class="mp-fv-badge">見込み顧客の<br>育成</li>
                      <li class="mp-fv-badge">商談を増やす</li>
                    </ul>
                  </div>
                  <div class="mp-fv-visual">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-grow-v2-assets/images/hero-illust.webp" alt="" width="775" height="543" loading="lazy" decoding="async">
                  </div>
                </div>
                <p class="mp-fv-lead">
                  御社のマーケティング部門として問い合わせの獲得から育成・商談化までを仕組み化。<br class="pc">安定した見込み顧客の創出を実現します。
                </p>
              </div>
              <div class="mp-btn">
                <a href="<?php echo esc_url( home_url('/willgrow/') ); ?>" class="mp-btn-link" target="_blank" rel="noopener noreferrer">
                  <span class="mp-btn-text"><span class="pc">ウィルグローの</span>サービス詳細を見る</span>
                  <span class="mp-btn-arrow">→</span>
                </a>
              </div>
            </div>

            <!-- ウィルサポLP（page-willsupport-v2.php）の .wsv2-fv と文言・デザインを揃える -->
            <div id="mp-tab1" class="mainproduct-item">
              <div class="mp-fv mp-fv--ws">
                <div class="mp-fv-grid">
                  <div class="mp-fv-content">
                    <p class="mp-fv-sublabel">サブスク型ホームページサービス</p>
                    <h3 class="mp-fv-title">
                      <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/fv-logotext.webp" alt="ウィルサポ" loading="lazy" decoding="async">
                    </h3>
                    <ul class="mp-fv-points">
                      <li class="mp-fv-point">BtoB特化の<br>構成設計</li>
                      <li class="mp-fv-point">問い合わせに<br>つながる</li>
                      <li class="mp-fv-point">比較検討で<br>選ばれる</li>
                    </ul>
                  </div>
                  <div class="mp-fv-visual">
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-v2-assets/img/fv-illust.webp" alt="ウィルサポ サービスイメージ" loading="lazy" decoding="async">
                  </div>
                </div>
                <p class="mp-fv-catchcopy">BtoB企業のための戦略設計から運用まで伴走する<br>月額費用型のサブスクホームページ制作サービスです</p>
              </div>
              <div class="mp-btn">
                <a href="<?php echo esc_url( home_url('/willsupport/') ); ?>" class="mp-btn-link" target="_blank" rel="noopener noreferrer">
                  <span class="mp-btn-text"><span class="pc">ウィルサポの</span>サービス詳細を見る</span>
                  <span class="mp-btn-arrow">→</span>
                </a>
              </div>
            </div>

            <!-- ウィルサポECは非表示（必要時に復活）
            <div id="mp-tab2" class="mainproduct-item">
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
                    <img src="<?php echo get_template_directory_uri(); ?>/will-support-ec-assets/img/page-willsuppoec-hero1.webp" alt="">
                  </div>
                </div>
                <p class="mp-description">
                  ECサイト制作会社をお探しの方や、構築を代行してほしい企業様へ。<br>
                  ウィルサポECは、構成設計から公開後の運用・保守まで一括対応する月額型サービスです。
                </p>
              </div>
              <div class="mp-btn">
                <a href="<?php echo esc_url( home_url('/will-support-ec/') ); ?>" class="mp-btn-link" target="_blank" rel="noopener noreferrer">
                  <span class="mp-btn-text"><span class="pc">ウィルサポECの</span>サービス詳細を見る</span>
                  <span class="mp-btn-arrow">→</span>
                </a>
              </div>
            </div>
            -->

          </div>

        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-Service.webp" alt="Service" class="rellax-down">
      </div>
    </section>

    <!-- <section class="page-topv3-whatwedo" id="whatwedo">
      <div class="container">
        <div class="wrapper">

          <div class="whatwedo-header">
            <p class="en">SERVICES</p>
            <h2>私たちが提供する5つの<br class="sp">サービス領域</h2>
            <p class="lead">
              ウィルは、Webサイト制作を起点に、<br>MA・コンテンツSEO・Instagram・グラフィックまで、<br>
              BtoB企業の営業基盤を統合的に支援する5つのサービスを提供しています。
            </p>
          </div>

          <div class="whatwedo-list">
            <a href="<?php echo esc_url( home_url('/service/web-creative/') ); ?>" class="whatwedo-item animation-target to-up">
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

            <a href="<?php echo esc_url( home_url('/service/marketing-automation/') ); ?>" class="whatwedo-item animation-target to-up">
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

            <a href="<?php echo esc_url( home_url('/service/seo/') ); ?>" class="whatwedo-item animation-target to-up">
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

            <a href="<?php echo esc_url( home_url('/service/instagram-support/') ); ?>" class="whatwedo-item animation-target to-up">
              <div class="whatwedo-item-header">
                <span class="whatwedo-number">04</span>
                <h3>Instagram構築・運用支援</h3>
              </div>
              <div class="whatwedo-icon">
                <i class="fab fa-instagram"></i>
              </div>
              <p class="whatwedo-catch">BtoBでも届く、信頼形成型のSNS運用</p>
              <p class="whatwedo-body">
                BtoB企業向けに、認知拡大ではなく「信頼形成」を目的としたInstagram運用を支援。アカウント設計から投稿運用まで、営業基盤の補完チャネルとして機能させます。
              </p>
              <div class="whatwedo-link">
                <span class="whatwedo-link-text">サービス詳細を見る</span>
                <span class="whatwedo-link-arrow">→</span>
              </div>
            </a>

            <a href="<?php echo esc_url( home_url('/service/creative/') ); ?>" class="whatwedo-item animation-target to-up">
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
    </section> -->

    <section class="page-topv3-diagnosis" id="diagnosis-banner">
      <div class="container">

        <div class="diagnosis-section-head">
          <span class="diagnosis-eyebrow">DIAGNOSIS</span>
          <h2 class="diagnosis-title animation-target to-up">
            1分の入力で、<br class="pc">
            貴社のBtoBマーケで<span class="diagnosis-keyword">「何から取り組めばいいのか」</span>を診断します。
          </h2>
        </div>

        <div class="diagnosis-panel animation-target to-up">
          <h3 class="diagnosis-panel-title">無料診断レポートをお送りします</h3>
          <p class="diagnosis-panel-text">所要時間は1分。回答内容に基づき、<br>貴社の優先課題と取り組むべき一手をまとめた個別レポートを送付します。</p>
          <a href="<?php echo esc_url( home_url('/btob-marketing-consultation/') ); ?>" class="diagnosis-btn">無料診断を受ける</a>
        </div>

      </div>
    </section>

    <section class="page-topv3-ebook" id="ebook">
      <div class="container">
        <div class="wrapper">

          <div class="ebook-header">
            <p class="en">DOWNLOAD</p>
            <h2>
              BtoBマーケの実務で活用できる4つの資料を、<br>
              無料でダウンロードいただけます
            </h2>
          </div>

          <div class="ebooks-cards-grid ebooks-cards-grid--top-featured">
            <?php
              // ebook_pickup タクソノミー = top_featured(トップページ掲載)に紐づく資料を最大4件
              $top_ebooks = new WP_Query([
                'post_type'      => 'ebooks',
                'posts_per_page' => 4,
                'tax_query'      => [
                  [
                    'taxonomy' => 'ebook_pickup',
                    'field'    => 'slug',
                    'terms'    => 'top_featured',
                  ],
                ],
                'orderby'        => 'date',
                'order'          => 'DESC',
              ]);

              if ( $top_ebooks->have_posts() ) :
                while ( $top_ebooks->have_posts() ) : $top_ebooks->the_post();
                  // archive-ebooks / single-ebooks 関連グリッドと同じ共通パーツを使用
                  get_template_part( 'template-parts/ebooks-card', null, [ 'post_id' => get_the_ID() ] );
                endwhile;
                wp_reset_postdata();
              endif;
            ?>
          </div>

          <div class="ebook-bottom-cta">
            <a href="<?php echo esc_url( home_url('/ebooks/') ); ?>" class="ebook-bottom-cta-link">
              <span class="ebook-bottom-cta-text">ダウンロード資料一覧はこちら</span>
              <span class="ebook-bottom-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section>

    <?php // TODO: YouTube動画作成後に「if ( false )」を「if ( true )」または条件削除で再有効化 ?>
    <?php if ( false ) : ?>
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
            <a href="https://www.youtube.com/@will-btob-marketing" class="youtube-bottom-cta-link" target="_blank" rel="noopener noreferrer">
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
    <?php endif; ?>

    <section class="page-topv3-works" id="works">
      <div class="container">
        <div class="wrapper">

          <div class="works-header">
            <p class="en">WORKS</p>
            <h2>
              BtoBサイトの制作実績
            </h2>
            <!-- <p class="lead">
              「作って終わり」ではなく、営業構造とコンテンツ設計から逆算したWebサイトを、<br class="pc">
              業種の異なるBtoB企業向けに制作してきました。一部の事例をご紹介します。
            </p> -->
          </div>

          <div class="works-list">
            <?php
              // 制作実績(page-works.php と同じハードコード配列形式・トップは厳選6件)
              $topv3_works_items = [
                [
                  'name' => 'ジャパンマーベラス様',
                  'url'  => 'https://japanmarvelous.com/',
                  'img'  => 'marvelous.webp',
                  'tag'  => 'BtoB',
                ],
                [
                  'name' => '株式会社システムライン様',
                  'url'  => 'https://systemline.jp/',
                  'img'  => 'systemline.webp',
                  'tag'  => 'BtoB',
                ],
                [
                  'name' => '株式会社Mr財務屋様',
                  'url'  => 'https://mrzaimuya.com/',
                  'img'  => 'mrzaimuya.webp',
                  'tag'  => '税務・財務',
                ],
                [
                  'name' => '村岡測量登記事務所様',
                  'url'  => 'https://muraoka-touki.com/',
                  'img'  => 'muraoka.webp',
                  'tag'  => '士業',
                ],
                [
                  'name' => '株式会社GRIT様',
                  'url'  => 'https://gritcoco-realestate.com/',
                  'img'  => 'grit.webp',
                  'tag'  => '不動産',
                ],
                [
                  'name' => '株式会社Lily様',
                  'url'  => 'https://lilyproductionjp.com/',
                  'img'  => 'lily.webp',
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
            <a href="<?php echo esc_url( home_url('/works/') ); ?>" class="works-bottom-cta-link">
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
                    BtoBマーケティングの現場で、<br>本当に役立つ情報を
                  </h2>
                  <p class="blog-v5-lead">
                    Webサイト、SEO、展示会、コンテンツ、営業活動など、BtoB中小企業のマーケティングに役立つノウハウや考え方を発信しています。「次に何をやるべきか」を考えるヒントとして、ぜひご活用ください。
                  </p>
                </div>

                <div class="blog-v5-bottom-cta">
                  <a href="https://will-corp.co.jp/blog/" class="blog-v5-bottom-cta-link" target="_blank" rel="noopener noreferrer">
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
                // 指定ID 5本を順序維持で取得し、6時間キャッシュする
                $featured_ids = array(810, 818, 813, 1155, 660);
                $cache_key    = 'top_blog_featured_v4';
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
                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.webp" alt="">
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
            <a href="https://will-corp.co.jp/blog/" class="blog-v5-bottom-cta-link" target="_blank" rel="noopener noreferrer">
              <span class="blog-v5-bottom-cta-text">ブログ一覧はこちら</span>
              <span class="blog-v5-bottom-cta-arrow">→</span>
            </a>
          </div>

        </div>
      </div>
    </section>

    <section class="page-topv3-about">
      <div class="container">
        <div class="wrapper">
          <div class="content-wrapper animation-target to-up">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-about-pic.webp" alt="">

            <div class="about-v5-text">

              <div class="about-v5-header">
                <p class="about-v5-en">ABOUT</p>
              </div>

              <h2 class="about-v5-headline">
                あなたの価値を、<br>
                あなた以上に理解し、広める。
              </h2>

              <p class="about-v5-lead">
                ウィルのミッションは、事業の価値をクライアント以上に理解して広めることです。BtoB企業の独自性を最大限に引き出し、ウェブマーケティングを通じて、社会に新たな価値を生み出します。
              </p>

              <p class="about-v5-lead">
                私たちは、戦略を考えるだけでも、制作を行うだけでもありません。<br class="pc">
                「何をやれば成果につながるのか」を一緒に考え、実行し、改善を重ねる。<br class="pc">
                そんな社外マーケティング担当として、お客様の事業成長に伴走しています。
              </p>

            </div>

          </div>

          <div class="about-v5-bottom-cta">
            <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="about-v5-bottom-cta-link">
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
            <a href="<?php echo esc_url( home_url('/contact/') ); ?>">
              <span>CONTACT</span>
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-contactarrow.webp" alt="">
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
            貴社マーケティングの<span class="contact-v5-headline-keyword">「次の一手」</span>を、<br>
            一緒に考えましょう
          </h3>

          <p class="contact-v5-lead">
            BtoBマーケの戦略整理、Webサイト制作、MA・SEO・コンテンツ運用支援。<br class="pc">
            貴社の状況に合わせて、最適な一手を一緒に考えます。まずはお気軽にご相談ください。
          </p>

          <div class="contact-v5-cta-group">

            <a href="<?php echo esc_url( home_url('/btob-marketing-consultation/') ); ?>" class="contact-v5-cta contact-v5-cta--outline">
              <span class="contact-v5-cta-label">DIAGNOSIS</span>
              <span class="contact-v5-cta-text">1分でできる無料診断</span>
              <span class="contact-v5-cta-arrow">→</span>
            </a>

            <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="contact-v5-cta contact-v5-cta--solid">
              <span class="contact-v5-cta-label">CONTACT</span>
              <span class="contact-v5-cta-text">お問い合わせはこちら</span>
              <span class="contact-v5-cta-arrow">→</span>
            </a>

          </div>

        </div>
      </div>
    </section>

    <?php get_footer(); ?>
