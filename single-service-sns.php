<?php
/*
Template Name: SNSサポート
Template Post Type: service
*/
?>

<?php get_header(); ?>

  <section class="hero-section single-service">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/SNS Adverti.png" alt="">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">s</span>ns advertising</h2>
          <p class="sub-title">SNS運用サポート</p>
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

  <!-- <section class="single-service-copy">
    <div class="container">
      <div class="wrapper">
        <h2>マーケティング戦略からブランディング、プロモーションまで<br class="pc">一気通貫して支援し、あなたの価値をあなた以上にお客様にお届けします。</h2>
      </div>
    </div>
  </section>

  <section class="single-service-problem">
    <div class="container">
      <div class="wrapper">
        <div class="problem-wrapper">
          <h2>SNS運用のよくある課題</h2>
          <ul>
            <li>・SNSの運用ノウハウが全くわからない。</li>
            <li>・フォロワー数やコメントの数がなかなか伸びない。</li>
            <li>・投稿するコンテンツのネタがない。企画に時間がかかる。</li>
            <li>・SNSに詳しい担当者がいない。</li>
            <li>・InstagramやYouTube、TikTokやXなど、どのSNSが自社のサービスに合っているかわからない。</li>
            <li>・運用する目的や目標数値の整理ができていない。</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="single-service-reason">
    <dov class="container">
      <div class="wrapper">
        <h2 class="section-header"><span class="green">ウ</span>ィルが成果を出せる理由</h2>
        <div class="border"></div>
        <div class="reason-wrapper">
          <div class="reason">
            <div class="img-wrapper">
              <img src="[img]single-servivec-sns-img1.png" alt="">
            </div>
            <div class="text-wrapper">
              <div class="title-wrapper">
                <div class="num">
                  <p>01</p>
                </div>
                <div class="title">
                  <h3 class="reason-title">顧客のビジネス理解</h3>
                </div>
              </div>
              <div class="desc">
                <p>SNSで発信するにあたって、お客様のビジネスを理解することは最重要です。企業がどのように収益を生み出し、商品やサービスを提供しているかを具体的に把握し、顧客の課題やニーズ、ブランドの価値観も考慮したうえで戦略的で効果的なSNS運用を展開し、ビジネスの成果を最大化します。</p>
              </div>
            </div>
          </div>
          <div class="reason">
            <div class="img-wrapper">
              <img src="[img]single-servivec-sns-img2.png" alt="">
            </div>
            <div class="text-wrapper">
              <div class="title-wrapper">
                <div class="num">
                  <p>02</p>
                </div>
                <div class="title">
                  <h3 class="reason-title">市場分析</h3>
                </div>
              </div>
              <div class="desc">
                <p>SNS運用における市場分析は、競合他社の運用戦略や投稿内容の分析から始まります。ターゲット層の属性や行動パターンを把握したうえで、貴社のビジネスの差別化ポイントを見つけ、戦略的で効果的な運用を展開し、競争力を高めます。</p>
              </div>
            </div>
          </div>
          <div class="reason">
            <div class="img-wrapper">
              <img src="[img]single-servivec-sns-img3.png" alt="">
            </div>
            <div class="text-wrapper">
              <div class="title-wrapper">
                <div class="num">
                  <p>03</p>
                </div>
                <div class="title">
                  <h3 class="reason-title">経験豊富な担当者</h3>
                </div>
              </div>
              <div class="desc">
                <p>SNS運用においては、単なる運用ノウハウだけ知っていてもなかなか成果を出すことはできません。300人以上のSNS運用相談を受けてきた担当者が率いるチーム体制で、メンバー各々の得意を活かした運用サポートを行います。</p>
              </div>
            </div>
          </div>
          <div class="reason">
            <div class="img-wrapper">
              <img src="[img]single-servivec-sns-img4.png" alt="">
            </div>
            <div class="text-wrapper">
              <div class="title-wrapper">
                <div class="num">
                  <p>04</p>
                </div>
                <div class="title">
                  <h3 class="reason-title">最新のトレンドやアルゴリズムの理解</h3>
                </div>
              </div>
              <div class="desc">
                <p>SNSの流行やアルゴリズムの移り変わりは早く、常に最新の情報にアンテナを張りながら運用体制を作り上げる必要があります。弊社ではこれまでの実績や運用経験から得たデータや知見を活かし、最新のトレンドやアルゴリズムを理解したうえでお客様のアカウント運用を全力でサポートさせていただきます。</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </dov>
  </section>

  <section class="single-service-contact">
    <div class="container">
      <div class="wrapper">
        <h2 class="section-header"><span class="green">c</span>ontact</h2>
        <p class="sub-title">お問い合わせ</p>
        <div class="border"></div>
        <p class="content">当社はウェブサイト制作に関するご質問やお見積もりのご依頼、ウェブ戦略に関する相談など、お客様のさまざまなニーズに対応いたします。専門スタッフがお客様のご要望を丁寧にお伺いし、最適なソリューションを提案いたします。お気軽にお問い合わせください。</p>
        <div class="btn">
          <a href="[contact]">view more</a>
        </div>
      </div>
    </div>
  </section>

  <section class="single-service-price">
    <div class="container">
      <div class="wrapper">
        <div class="header-text">
          <h2 class="section-header"><span class="green">p</span>rice</h2>
          <div class="border"></div>
        </div>
        <p class="sub-title">料金プラン</p>
        <p class="text-content">下記の料金は参考価格になりますので、詳細のお見積もりにつきましては、ヒアリング後に改めてご提示させていただきます。<br>料金についてご不明点等ございましたら、お気軽にお問い合わせください。</p>
        <h3 class="price-header">サポート費用</h3>
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
              <p><span>15</span>万円〜/月(税別)</p>
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
              <p><span>30</span>万円〜/月(税別)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="single-service-faq">
    <div class="container">
      <div class="wrapper">
        <h2 class="section-header"><span class="green">F</span>AQ</h2>
        <p class="sub-title">よくあるご質問</p>
        <div class="accordion">
          <ul>
            <li>
              <div class="list question">
                <div class="text-wrapper">
                  <div class="list-icon">Q</div>
                  <p class="text">実施や導入にかかる日数はどのくらいですか？</p>
                </div>
                <i class="fa-solid fa-chevron-up"></i>
              </div>
              <div class="list answer">
                <div class="text-wrapper">
                  <div class="list-icon">A</div>
                  <p class="text">ご依頼いただく業務によって変動しますが、初期構築・プランニングに約1.5ヶ月、運用代行で約1ヶ月ほどかかります。初回は上記とは別に契約書の締結までの日数がかかります。</p>
                </div>
              </div>
            </li>
            <li>
              <div class="list question">
                <div class="text-wrapper">
                  <div class="list-icon">Q</div>
                  <p class="text">SNS運用の効果が見えるまでにはどのくらいの時間がかかりますか？</p>
                </div>
                <i class="fa-solid fa-chevron-up"></i>
              </div>
              <div class="list answer">
                <div class="text-wrapper">
                  <div class="list-icon">A</div>
                  <p class="text">投稿頻度の多さや事業のジャンル、ターゲット層により異なりますが、半年から一年ほどはかかります。</p>
                </div>
              </div>
            </li>
            <li>
              <div class="list question">
                <div class="text-wrapper">
                  <div class="list-icon">Q</div>
                  <p class="text">初期のプランニングだけお願いできますか？</p>
                </div>
                <i class="fa-solid fa-chevron-up"></i>
              </div>
              <div class="list answer">
                <div class="text-wrapper">
                  <div class="list-icon">A</div>
                  <p class="text">可能です。貴社内でスムーズな運用ができるよう、運用体制や社内事情を考慮した運用プランをご提案します。</p>
                </div>
              </div>
            </li>
            <li>
              <div class="list question">
                <div class="text-wrapper">
                  <div class="list-icon">Q</div>
                  <p class="text">運用代行は何ヶ月から委託できますか？</p>
                </div>
                <i class="fa-solid fa-chevron-up"></i>
              </div>
              <div class="list answer">
                <div class="text-wrapper">
                  <div class="list-icon">A</div>
                  <p class="text">投稿コンテンツに対して分析・改善を行い長期的に効果を測るため、少なくとも6ヶ月のご契約をおすすめしていますが、イベント等で期間が決まっているなどの事業がある場合はこの限りではありません。</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="single-service-contact bg-none">
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

<?php get_footer(); ?>
