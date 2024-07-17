<?php
  /*
  Template Name: Price
  Template Post Type: page
  */
?>

<?php get_header(); ?>

  <section class="hero-section price">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/price.png" alt="">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">p</span>rice</h2>
          <p class="sub-title">料金プラン</p>
        </div>
      </div>
    </div>
  </section>

  <?php
    if(have_posts()):
    while(have_posts()): the_post();
  ?>
  <?php the_content(); ?>
  <?php
    endwhile;
  endif;
  ?>

  <!-- <section class="page-price-contact">
    <div class="container">
      <div class="wrapper">
        <p class="content">お客様のニーズに合わせ、柔軟に対応するために様々なプランをご用意しております。ウェブサイト制作に関するご質問やお見積もりのご依頼、ウェブ戦略に関する相談など、お客様のさまざまなニーズに対応いたします。専門スタッフがお客様のご要望を丁寧にお伺いし、最適なソリューションを提案いたします。お気軽にお問い合わせください。</p>
        <div class="btn">
          <a href="[contact]">お問い合わせはこちら</a>
        </div>
      </div>
    </div>
  </section>

  <section class="service-price">
    <div class="container">
      <div class="wrapper">
        <div class="service-wrapper">
          <div class="service">
            <h2 class="price-header"><span>ウ</span>ィルサポ サブスクHP</h2>
            <div class="border"></div>
            <p class="ex">費用例</p>
            <div class="box-wrapper web">
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>01</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">スタートプラン</h3>
                  </div>
                </div>
                <div class="desc">
                  <ul>
                    <li>
                      <p class="li-header">ページ数 :</p>
                      <p class="li-desc">1ページ</p>
                    </li>
                    <li>
                      <p class="li-header">デザイン :</p>
                      <p class="li-desc">フルオーダー</p>
                    </li>
                    <li>
                      <p class="li-header">CMS :</p>
                      <p class="li-desc">WordPress</p>
                    </li>
                    <li>
                      <p class="li-header">工期 :</p>
                      <p class="li-desc">1ヶ月程度</p>
                    </li>
                    <li>
                      <p class="li-header">ブログ :</p>
                      <p class="li-desc">なし</p>
                    </li>
                  </ul>
                </div>
                <div class="price">
                  <p><span>9,800</span>円/月</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>02</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">シンプルプラン</h3>
                  </div>
                </div>
                <div class="desc">
                  <ul>
                    <li>
                      <p class="li-header">ページ数 :</p>
                      <p class="li-desc">〜6ページ</p>
                    </li>
                    <li>
                      <p class="li-header">デザイン :</p>
                      <p class="li-desc">フルオーダー</p>
                    </li>
                    <li>
                      <p class="li-header">CMS :</p>
                      <p class="li-desc">WordPress</p>
                    </li>
                    <li>
                      <p class="li-header">工期 :</p>
                      <p class="li-desc">2ヶ月程度</p>
                    </li>
                    <li>
                      <p class="li-header">ブログ :</p>
                      <p class="li-desc">なし</p>
                    </li>
                  </ul>
                </div>
                <div class="price">
                  <p><span>19,800</span>円/月</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>03</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">スタンダードプラン</h3>
                  </div>
                </div>
                <div class="desc">
                  <ul>
                    <li>
                      <p class="li-header">ページ数 :</p>
                      <p class="li-desc">〜12ページ</p>
                    </li>
                    <li>
                      <p class="li-header">デザイン :</p>
                      <p class="li-desc">フルオーダー</p>
                    </li>
                    <li>
                      <p class="li-header">CMS :</p>
                      <p class="li-desc">WordPress</p>
                    </li>
                    <li>
                      <p class="li-header">工期 :</p>
                      <p class="li-desc">2.5ヶ月程度</p>
                    </li>
                    <li>
                      <p class="li-header">ブログ :</p>
                      <p class="li-desc">あり</p>
                    </li>
                  </ul>
                </div>
                <div class="price">
                  <p><span>29,800</span>円/月</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>04</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">プレミアムプラン</h3>
                  </div>
                </div>
                <div class="desc">
                  <ul>
                    <li>
                      <p class="li-header">ページ数 :</p>
                      <p class="li-desc">13ページ〜</p>
                    </li>
                    <li>
                      <p class="li-header">デザイン :</p>
                      <p class="li-desc">フルオーダー</p>
                    </li>
                    <li>
                      <p class="li-header">CMS :</p>
                      <p class="li-desc">WordPress</p>
                    </li>
                    <li>
                      <p class="li-header">工期 :</p>
                      <p class="li-desc">3ヶ月以上</p>
                    </li>
                    <li>
                      <p class="li-header">ブログ :</p>
                      <p class="li-desc">あり</p>
                    </li>
                  </ul>
                </div>
                <div class="price">
                  <p><span>39,800</span>円/月</p>
                </div>
              </div>
            </div>
          </div>
          <div class="service double">
            <h2 class="price-header"><span>W</span>ebマーケティング支援</h2>
            <div class="border"></div>
            <p class="ex">費用例</p>
            <div class="box-wrapper">
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>01</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">集客サポートプラン</h3>
                  </div>
                </div>
                <div class="desc">
                  <p class="intro">zoomで月1回/1時間でサービスや商品の集客に関するご相談から、SNS、MEO、ブログ運用などのご相談をお受けいたします。</p>
                </div>
                <div class="price">
                  <p><span>9,800</span>円〜 / 月</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>02</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">集客設計プラン</h3>
                  </div>
                </div>
                <div class="desc">
                  <p class="intro">zoomで1回/2時間でマーケティングの差別化戦略や集客の動線設計を一緒に構築します。マーケティングの考え方なども合わせてお伝えするプランです。</p>
                </div>
                <div class="price">
                  <p><span>30,000</span>円〜 / 回</p>
                </div>
              </div>
            </div>
          </div>
          <div class="service sns-support">
            <h2 class="price-header"><span>S</span>NS運用サポート</h2>
            <div class="border"></div>
            <p class="ex">費用例</p>
            <div class="box-wrapper">
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>01</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">シンプルプラン</h3>
                  </div>
                </div>
                <p class="recommendation">社内での内製化を目指す企業様向け</p>
                <div class="desc">
                  <ul>
                    <li>
                      <p class="li-desc">・コンセプト設計</p>
                    </li>
                    <li>
                      <p class="li-desc">・競合リサーチ</p>
                    </li>
                    <li>
                      <p class="li-desc">・投稿ネタだし</p>
                    </li>
                    <li>
                      <p class="li-desc">・ノウハウ講習</p>
                    </li>
                    <div class="li-desc etc">etc.</div>
                  </ul>
                </div>
                <div class="price">
                  <p><span>15</span>万円〜(税別)</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>02</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">スタンダードプラン</h3>
                  </div>
                </div>
                <p class="recommendation">一番大事な土台作りをサポート</p>
                <div class="desc">
                  <ul>
                    <li>
                      <p class="li-desc">・シンプルプランの内容</p>
                    </li>
                    <li>
                      <p class="li-desc">・デザインテンプレ作成</p>
                    </li>
                    <li>
                      <p class="li-desc">・ハイライトテンプレ作成</p>
                    </li>
                    <li>
                      <p class="li-desc">・1投稿作成</p>
                    </li>
                  </ul>
                </div>
                <div class="price">
                  <p><span>20</span>万円〜(税別)</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>03</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">プレミアムプラン</h3>
                  </div>
                </div>
                <p class="recommendation">運用に早くのせたい企業様向け</p>
                <div class="desc">
                  <ul>
                    <li>
                      <p class="li-desc">・スタンダードプランの内容</p>
                    </li>
                    <li>
                      <p class="li-desc">・12投稿作成</p>
                    </li>
                  </ul>
                </div>
                <div class="price">
                  <p><span>30</span>万円〜(税別)</p>
                </div>
              </div>
            </div>
          </div>
          <div class="service graphic">
            <h2 class="price-header"><span>ロ</span>ゴ・チラシ作成</h2>
            <div class="border"></div>
            <p class="ex">費用例</p>
            <div class="box-wrapper">
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>01</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">バナー作成</h3>
                  </div>
                </div>
                <p class="recommendation">WebサイトやSNSに掲載するバナーを作成します。</p>
                <div class="price">
                  <p><span>1</span>万円〜(税別)</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>02</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">チラシ作成</h3>
                  </div>
                </div>
                <p class="recommendation">ポスティング広告や展示会などで配る両面印刷のカラーチラシを作成します。</p>
                <div class="price">
                  <p><span>8</span>万円〜(税別)</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>03</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">名刺作成</h3>
                  </div>
                </div>
                <p class="recommendation">オリジナルデザインの名刺を作成します。</p>
                <div class="price">
                  <p><span>8</span>万円〜(税別)</p>
                </div>
              </div>
              <div class="box">
                <div class="title-wrapper">
                  <div class="num">
                    <p>04</p>
                  </div>
                  <div class="title">
                    <h3 class="plan">ロゴ作成</h3>
                  </div>
                </div>
                <p class="recommendation">オリジナルデザインのロゴを作成します。</p>
                <div class="price">
                  <p><span>10</span>万円〜(税別)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-top-contact price-contact">
    <div class="container">
      <div class="wrapper">
        <h2 class="section-header"><span class="green">c</span>ontact</h2>
        <p class="sub-title">お問い合わせ</p>
        <div class="border"></div>
        <p class="content">当社はウェブサイト制作に関するご質問やお見積もりのご依頼、ウェブ戦略に関する相談など、お客様のさまざまなニーズに対応いたします。専門スタッフがお客様のご要望を丁寧にお伺いし、最適なソリューションを提案いたします。お気軽にお問い合わせください。</p>
        <div class="btn">
          <a href="[contact]">お問い合わせはこちら</a>
        </div>
      </div>
    </div>
  </section> -->

<?php get_footer("v2"); ?>
