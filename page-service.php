<?php
/**
 * Template Name: サービス一覧(service)
 *
 * BtoB中小企業の営業基盤を統合的に支援する2層構造のサービス一覧ページ。
 * - header-v4 + footer-v3 + template-parts/page-hero
 * - ブランド・メッセージガイドライン v2.0 / カラーガイドライン v1.0 準拠
 *
 * @package will-corp
 */
get_header('v4');
?>

<?php
get_template_part('template-parts/page-hero', null, [
  'en'    => 'SERVICES',
  'title' => 'サービス',
  'lead'  => 'BtoB中小企業の事業成長を、Webサイト・マーケティングの両輪で伴走支援します。',
]);
?>

<!-- ===================================================== -->
<!-- Section 2: 設計思想(PHILOSOPHY)                        -->
<!-- ===================================================== -->
<section class="page-service__philosophy" id="philosophy">
  <div class="container">
    <div class="wrapper">

      <div class="page-service__philosophy-head">
        <p class="page-service__eyebrow">PHILOSOPHY</p>
        <h2 class="page-service__philosophy-title">
          サービス単体ではなく、<br>
          営業基盤として設計しています
        </h2>
        <p class="page-service__philosophy-lead">
          BtoBマーケで成果を出すには、Webサイト・MA・SEO・コンテンツを単発の施策ではなく、
          営業基盤の一部として統合的に設計する必要があります。<br>
          ウィルでは、伴走型の主力サービスと、課題に応じた支援領域の2層構造で、
          貴社の事業フェーズに合わせたサービスを提供しています。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- Section 3: 主力サービス(2カード並列)                    -->
<!-- ===================================================== -->
<section class="page-service__main" id="main-services">
  <div class="container">
    <div class="wrapper">

      <div class="page-service__main-head">
        <p class="page-service__eyebrow">MAIN SERVICES</p>
        <h2 class="page-service__main-title">伴走型の主力サービス</h2>
        <p class="page-service__main-lead">
          Webサイトの構築から運用改善まで、月額制で伴走するサブスク型サービス。<br>
          事業フェーズに合った形で、営業基盤の構築を支援します。
        </p>
      </div>

      <ul class="page-service__main-list">

        <li class="page-service__main-card page-service__main-card--ws">
          <a href="<?php echo esc_url( home_url('/willsupport/') ); ?>" class="page-service__main-card-link">

            <div class="page-service__main-card-target">[BtoB中小企業向け]</div>

            <p class="page-service__main-card-catch">
              あなたのWebサイトは、<br>
              競合と比較されたときに勝てていますか？
            </p>

            <p class="page-service__main-card-type">サブスク型ホームページサービス</p>
            <h3 class="page-service__main-card-name">ウィルサポ</h3>

            <ul class="page-service__main-card-badges">
              <li>初期費用<br>無料</li>
              <li>契約期間の<br>縛りなし</li>
              <li>BtoB特化の<br>構成設計</li>
            </ul>

            <p class="page-service__main-card-desc">
              BtoB中小企業のための戦略設計から運用まで伴走する、月額費用型のサブスクホームページ制作サービスです。
              比較検討フェーズで選ばれるWebサイトを、月額制で構築・改善し続けます。
            </p>

            <div class="page-service__main-card-benefit">
              <p class="page-service__main-card-benefit-feature">
                <span class="page-service__main-card-benefit-label">機能・特長</span>
                営業構造から逆算した戦略設計と、月額制での継続運用
              </p>
              <p class="page-service__main-card-benefit-result">
                <span class="page-service__main-card-benefit-arrow">→</span>
                社内にWeb担当を置かずとも、サイトが見込み客を育てる仕組みになる
              </p>
            </div>

            <span class="page-service__main-card-cta">
              <span class="page-service__main-card-cta-text"><span class="pc">ウィルサポの</span>サービス詳細を見る</span>
              <span class="page-service__main-card-cta-arrow">→</span>
            </span>

          </a>
        </li>

        <li class="page-service__main-card page-service__main-card--ec">
          <a href="<?php echo esc_url( home_url('/will-support-ec/') ); ?>" class="page-service__main-card-link">

            <div class="page-service__main-card-target">[EC事業者向け]</div>

            <p class="page-service__main-card-catch">スモールスタートで、本気のECを。</p>

            <p class="page-service__main-card-type">EC事業者向けサブスクサービス</p>
            <h3 class="page-service__main-card-name">ウィルサポEC</h3>

            <ul class="page-service__main-card-badges">
              <li>初期費用<br>無料</li>
              <li>契約期間の<br>縛りなし</li>
              <li>自由な<br>デザイン</li>
            </ul>

            <p class="page-service__main-card-desc">
              ECサイト制作会社をお探しの方や、構築を代行してほしい企業様へ。
              ウィルサポECは、構成設計から公開後の運用・保守まで一括対応する、Shopifyベースの月額型サービスです。
            </p>

            <div class="page-service__main-card-benefit">
              <p class="page-service__main-card-benefit-feature">
                <span class="page-service__main-card-benefit-label">機能・特長</span>
                Shopifyベースのサブスク設計 + 構成設計から運用までの一括対応
              </p>
              <p class="page-service__main-card-benefit-result">
                <span class="page-service__main-card-benefit-arrow">→</span>
                大きな初期投資なくEC事業を立ち上げ、運用しながら改善し続けられる
              </p>
            </div>

            <span class="page-service__main-card-cta">
              <span class="page-service__main-card-cta-text"><span class="pc">ウィルサポECの</span>サービス詳細を見る</span>
              <span class="page-service__main-card-cta-arrow">→</span>
            </span>

          </a>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- Section 4: 支援領域(5カード)                            -->
<!-- ===================================================== -->
<section class="page-service__support" id="support">
  <div class="container">
    <div class="wrapper">

      <div class="page-service__support-head">
        <p class="page-service__eyebrow">SUPPORT AREAS</p>
        <h2 class="page-service__support-title">課題に応じた、5つの支援領域</h2>
        <p class="page-service__support-lead">
          Webサイト制作を起点に、MA・コンテンツSEO・Instagram・グラフィックまで。<br>
          BtoB中小企業の営業基盤を統合的に支援する5つの領域で、貴社の課題に合わせた支援を提供します。
        </p>
      </div>

      <ul class="page-service__support-list">

        <li class="page-service__support-card">
          <a href="<?php echo esc_url( home_url('/service/web-creative/') ); ?>" class="page-service__support-card-link">
            <div class="page-service__support-card-header">
              <span class="page-service__support-card-num">01</span>
              <h3 class="page-service__support-card-title">Webサイト制作</h3>
            </div>
            <p class="page-service__support-card-catch">営業基盤の中核となる、戦略設計型のWebサイト制作</p>
            <p class="page-service__support-card-body">
              ウィルサポ・ウィルサポECに加え、フルオーダー型・大規模リニューアルなど、
              営業構造から逆算したWebサイト制作を、企業様の状況に合わせて提供します。
            </p>
            <span class="page-service__support-card-cta">
              <span class="page-service__support-card-cta-text">サービス詳細を見る</span>
              <span class="page-service__support-card-cta-arrow">→</span>
            </span>
          </a>
        </li>

        <li class="page-service__support-card">
          <a href="<?php echo esc_url( home_url('/service/web-marketing/') ); ?>" class="page-service__support-card-link">
            <div class="page-service__support-card-header">
              <span class="page-service__support-card-num">02</span>
              <h3 class="page-service__support-card-title">MA構築・運用支援</h3>
            </div>
            <p class="page-service__support-card-catch">見込み客との関係構築を、仕組み化する</p>
            <p class="page-service__support-card-body">
              展示会や問い合わせで集めた見込み客情報を、その後の関係構築につなげる仕組みづくり。
              MA導入から運用設計、シナリオ構築まで伴走し、属人化しない営業の流れを実装します。
            </p>
            <span class="page-service__support-card-cta">
              <span class="page-service__support-card-cta-text">サービス詳細を見る</span>
              <span class="page-service__support-card-cta-arrow">→</span>
            </span>
          </a>
        </li>

        <li class="page-service__support-card">
          <?php // TODO: 専用LP新設後にURL差替 ?>
          <a href="<?php echo esc_url( home_url('/service/') ); ?>" class="page-service__support-card-link">
            <div class="page-service__support-card-header">
              <span class="page-service__support-card-num">03</span>
              <h3 class="page-service__support-card-title">コンテンツSEO構築・運用支援</h3>
            </div>
            <p class="page-service__support-card-catch">継続的な認知獲得を、仕組みでつくる</p>
            <p class="page-service__support-card-body">
              検索流入を起点とした見込み客の獲得を、コンテンツの設計と継続運用で支援します。
              記事戦略・キーワード設計・公開後の改善まで、認知層の課題解決を仕組み化します。
            </p>
            <span class="page-service__support-card-cta">
              <span class="page-service__support-card-cta-text">サービス詳細を見る</span>
              <span class="page-service__support-card-cta-arrow">→</span>
            </span>
          </a>
        </li>

        <li class="page-service__support-card">
          <a href="<?php echo esc_url( home_url('/service/sns-support/') ); ?>" class="page-service__support-card-link">
            <div class="page-service__support-card-header">
              <span class="page-service__support-card-num">04</span>
              <h3 class="page-service__support-card-title">Instagram構築・運用支援</h3>
            </div>
            <p class="page-service__support-card-catch">BtoBでも届く、信頼形成型のSNS運用</p>
            <p class="page-service__support-card-body">
              BtoB中小企業向けに、認知拡大ではなく「信頼形成」を目的としたInstagram運用を支援。
              アカウント設計から投稿運用まで、営業基盤の補完チャネルとして機能させます。
            </p>
            <span class="page-service__support-card-cta">
              <span class="page-service__support-card-cta-text">サービス詳細を見る</span>
              <span class="page-service__support-card-cta-arrow">→</span>
            </span>
          </a>
        </li>

        <li class="page-service__support-card">
          <a href="<?php echo esc_url( home_url('/service/graphic/') ); ?>" class="page-service__support-card-link">
            <div class="page-service__support-card-header">
              <span class="page-service__support-card-num">05</span>
              <h3 class="page-service__support-card-title">グラフィック制作</h3>
            </div>
            <p class="page-service__support-card-catch">営業現場で使える、ビジュアルコミュニケーション</p>
            <p class="page-service__support-card-body">
              会社案内・サービス資料・展示会パネル・チラシなど、営業現場で使うグラフィック制作を支援します。
              Web・MA・SNSと連動した一貫性のあるブランド表現を実現します。
            </p>
            <span class="page-service__support-card-cta">
              <span class="page-service__support-card-cta-text">サービス詳細を見る</span>
              <span class="page-service__support-card-cta-arrow">→</span>
            </span>
          </a>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- Section 5: 無料診断 CTA(page-works から完全流用)         -->
<!-- ===================================================== -->
<section class="page-topv3-diagnosis" id="diagnosis-banner">
  <div class="container">

    <div class="diagnosis-section-head">
      <span class="diagnosis-eyebrow">DIAGNOSIS</span>
      <h2 class="diagnosis-title">
        1分の入力で、<br class="pc">
        貴社のBtoBマーケで<span class="diagnosis-keyword">「最優先すべき一手」</span>が見えます。
      </h2>
      <p class="diagnosis-lead">
        運用体制・現在の施策・抱えている課題。<br class="pc">
        10問の質問からウィルが構造的に分析し、改善すべき優先順位をまとめたレポートをお送りします。
      </p>
    </div>

    <div class="diagnosis-panel">
      <h3 class="diagnosis-panel-title">無料診断レポートをお送りします</h3>
      <p class="diagnosis-panel-text">所要時間は1分。面談は不要です。<br>回答内容に基づき、貴社の優先課題と取り組むべき一手をまとめた個別レポートを送付します。</p>
      <ul class="diagnosis-features">
        <li>所要1分</li>
        <li>面談不要</li>
        <li>個別レポート送付</li>
      </ul>
      <a href="<?php echo esc_url( home_url('/diagnosis/') ); ?>" class="diagnosis-btn">1分でできる無料診断を受ける</a>
    </div>

  </div>
</section>

<!-- ===================================================== -->
<!-- Section 6: 資料DL(page-works から完全流用)               -->
<!-- ===================================================== -->
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

        <a href="#" class="ebook-card ebook-card--01">
          <div class="ebook-card-thumb">
            <div class="ebook-card-thumb-placeholder">
              <span class="ebook-card-no">EBOOK 01</span>
            </div>
          </div>
          <div class="ebook-card-body">
            <h3 class="ebook-card-title">BtoB Webマーケティング<br>戦略ロードマップ</h3>
            <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">BtoBマーケの全体像を、1冊で。</span></p>
            <p class="ebook-card-desc">
              Webサイト・SEO・MA・コンテンツまで、BtoBマーケに必要な打ち手の全体像と進め方を体系的に整理した総合ガイドです。
            </p>
            <span class="ebook-card-cta">
              <span class="ebook-card-cta-text">資料をダウンロード</span>
              <span class="ebook-card-cta-arrow">→</span>
            </span>
          </div>
        </a>

        <a href="#" class="ebook-card ebook-card--02">
          <div class="ebook-card-thumb">
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

        <a href="#" class="ebook-card ebook-card--03">
          <div class="ebook-card-thumb">
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

        <a href="#" class="ebook-card ebook-card--04">
          <div class="ebook-card-thumb">
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
        <a href="<?php echo esc_url( home_url('/ebooks/') ); ?>" class="ebook-bottom-cta-link">
          <span class="ebook-bottom-cta-text">ダウンロード資料一覧はこちら</span>
          <span class="ebook-bottom-cta-arrow">→</span>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- Section 7: 問い合わせ(page-works から完全流用)           -->
<!-- ===================================================== -->
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

        <a href="<?php echo esc_url( home_url('/diagnosis/') ); ?>" class="contact-v5-cta contact-v5-cta--outline">
          <span class="contact-v5-cta-label">DIAGNOSIS</span>
          <span class="contact-v5-cta-text">1分でできる無料診断</span>
          <span class="contact-v5-cta-arrow">→</span>
        </a>

        <a href="<?php echo esc_url( get_page_link(15) ); ?>" class="contact-v5-cta contact-v5-cta--solid">
          <span class="contact-v5-cta-label">CONTACT</span>
          <span class="contact-v5-cta-text">お問い合わせはこちら</span>
          <span class="contact-v5-cta-arrow">→</span>
        </a>

      </div>

    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
