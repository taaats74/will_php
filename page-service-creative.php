<?php
/**
 * Template Name: Service - クリエイティブ制作
 * Template Post Type: page
 *
 * クリエイティブ制作サービスページ(7セクション構成)
 * 中心メッセージ:オンラインも、オフラインも。顧客接点のすべてに、一貫したブランドと営業導線を。
 *
 * - header + footer + template-parts/page-hero
 * - page-service-content-seo 構造踏襲(クラス名 seo → creative)
 * - 最終 CTA は page-service-web の .service-web-cta クラスを直接流用(SCSS 新規定義不要)
 *
 * @package will-corp
 */
get_header();
?>

<?php
// [1] HERO(下層共通テンプレート)
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'CREATIVE',
  'title' => 'クリエイティブ制作',
] );
?>

<!-- ===================================================== -->
<!-- [2] CONCEPT(オンライン × オフラインの一貫性)            -->
<!-- ===================================================== -->
<section class="service-creative-concept">
  <div class="container">
    <div class="service-creative-concept__inner">

      <h2 class="service-creative-concept__headline">
        オンラインも、<br class="sp">オフラインも。<br>
        顧客接点のすべてに、<br><span class="keyword">一貫したブランドと営業導線</span>を。
      </h2>

      <div class="service-creative-concept__body">
        <p>
          Webサイトだけが顧客接点ではありません。
          展示会のパンフレット、営業現場の資料、商談で渡す名刺。
          すべての接点でブランドと営業導線が揃ってこそ、比較検討で選ばれる確率が高まります。
        </p>
        <p>
          ウィルは、Web支援に加えてオフライン施策のクリエイティブも、
          営業導線とブランド軸を踏まえて制作します。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [3] PROBLEM(3カテゴリ・チェックリスト)                  -->
<!-- ===================================================== -->
<section class="service-creative-problem">
  <div class="container">
    <div class="service-creative-problem__inner">

      <div class="service-creative-problem__head problem-header">
        <p class="en">PROBLEM</p>
        <h2>クリエイティブ制作の<br class="sp">よくある課題</h2>
        <p class="subtitle">BtoB中小企業のクリエイティブ制作で、よくいただくご相談を3つの観点で整理しました。</p>
      </div>

      <ul class="service-creative-problem__list">

        <li class="service-creative-problem__category">
          <h3 class="service-creative-problem__category-title">営業現場での課題</h3>
          <ul class="service-creative-problem__check-list">
            <li>展示会で配布したチラシやパンフレットが、商談につながらない</li>
            <li>営業資料の品質にムラがあり、商談の質が安定しない</li>
            <li>印刷物のデザインが古く、企業の信頼感を損ねている</li>
          </ul>
        </li>

        <li class="service-creative-problem__category">
          <h3 class="service-creative-problem__category-title">ブランディングの課題</h3>
          <ul class="service-creative-problem__check-list">
            <li>Webサイトと印刷物のデザインがバラバラで、ブランドの印象が統一されていない</li>
            <li>名刺・封筒・配布物などが古いまま、Webだけリニューアルしている</li>
            <li>制作物ごとに担当のデザイナーが違うため、トンマナが揃わない</li>
          </ul>
        </li>

        <li class="service-creative-problem__category">
          <h3 class="service-creative-problem__category-title">制作プロセスの課題</h3>
          <ul class="service-creative-problem__check-list">
            <li>デザイナーに丸投げしていて、提案がほしい</li>
            <li>単に作るだけでなく、なぜこのデザインが良いのか説明してほしい</li>
            <li>Webサイトと連動したクリエイティブを作れる会社が少ない</li>
          </ul>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [4] FEATURE(4特徴・画像つき・2x2 grid)                  -->
<!-- ===================================================== -->
<section class="service-creative-feature">
  <div class="container">
    <div class="service-creative-feature__inner">

      <div class="service-creative-feature__head feature-header">
        <p class="en">FEATURE</p>
        <h2>ウィルのクリエイティブ制作の特徴</h2>
        <p class="subtitle">数あるクリエイティブ制作会社の中で、ウィルが選ばれる4つの特徴をお伝えします。</p>
      </div>

      <ul class="service-creative-feature__list">

        <li class="service-creative-feature__item">
          <p class="service-creative-feature__num">01</p>
          <h3 class="service-creative-feature__title">営業導線を踏まえたデザイン提案</h3>
          <div class="service-creative-feature__approach">
            <p>
              顧客がどこで・どう手に取るか、どんな反応を引き出したいかを
              踏まえた制作を行います。
              "見栄えの良いデザイン"ではなく、営業現場で機能するクリエイティブを設計します。
              配布される場所、読まれるタイミング、次のアクションへの導線まで考慮することで、
              制作物が"使われて成果が出る"営業ツールに変わります。
            </p>
          </div>
          <div class="service-creative-feature__benefit">
            <p>
              <span class="service-creative-feature__benefit-arrow">→</span>
              単発の制作物が、<span class="keyword">"使われて成果が出る営業ツール"</span>に変わる
            </p>
          </div>
        </li>

        <li class="service-creative-feature__item">
          <p class="service-creative-feature__num">02</p>
          <h3 class="service-creative-feature__title">ブランド軸との整合性を考慮した制作</h3>
          <div class="service-creative-feature__approach">
            <p>
              既存のWebサイト・既存ロゴ・既存トンマナを踏まえ、
              すべての顧客接点で一貫したブランド表現を実現します。
              制作物が単独で完結せず、ブランド全体の世界観として
              積み上がっていく状態をつくります。
            </p>
          </div>
          <div class="service-creative-feature__benefit">
            <p>
              <span class="service-creative-feature__benefit-arrow">→</span>
              制作物が"バラバラの単発物"から<span class="keyword">"積み上がるブランド資産"</span>に変わる
            </p>
          </div>
        </li>

        <li class="service-creative-feature__item">
          <p class="service-creative-feature__num">03</p>
          <h3 class="service-creative-feature__title">オンラインとオフラインを横断した制作</h3>
          <div class="service-creative-feature__approach">
            <p>
              Webデザイン・SNS素材・印刷物まで、媒体を横断して
              一貫した世界観で制作可能です。
              ウィルがWeb全体支援を担っているからこそ、
              オンライン施策とオフライン施策の整合性を担保できます。
            </p>
          </div>
          <div class="service-creative-feature__benefit">
            <p>
              <span class="service-creative-feature__benefit-arrow">→</span>
              <span class="keyword">媒体ごとの制作会社をバラバラに頼む手間</span>から解放される
            </p>
          </div>
        </li>

        <li class="service-creative-feature__item">
          <p class="service-creative-feature__num">04</p>
          <h3 class="service-creative-feature__title">伴走型の制作プロセス</h3>
          <div class="service-creative-feature__approach">
            <p>
              言われた通りに作るだけではなく、
              "なぜこのデザインが営業に効くのか""なぜこの色なのか"を
              提案しながら進めます。
              制作の意図を共有することで、
              社内にもデザイン判断の軸が残ります。
            </p>
          </div>
          <div class="service-creative-feature__benefit">
            <p>
              <span class="service-creative-feature__benefit-arrow">→</span>
              「丸投げで作って終わり」から、<span class="keyword">「制作を通じて社内にノウハウが蓄積される」</span>体験へ
            </p>
          </div>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [5] PRICE(4プラン・2x2 grid)                            -->
<!-- ===================================================== -->
<section class="service-creative-price">
  <div class="container">
    <div class="service-creative-price__inner">

      <div class="service-creative-price__head price-header">
        <p class="en">PRICE</p>
        <h2>料金プラン</h2>
        <p class="subtitle">下記の料金は参考価格です。詳細なお見積もりはヒアリング後にご提示いたします。</p>
      </div>

      <p class="service-creative-price__lead">
        下記の料金は参考価格になりますので、詳細のお見積もりにつきましては、
        ヒアリング後に改めてご提示させていただきます。<br>
        料金についてご不明点等ございましたら、お気軽にお問い合わせください。
      </p>

      <div class="service-creative-price__plans">
        <h3 class="service-creative-price__plans-heading">クリエイティブ制作</h3>

        <div class="service-creative-price__plans-grid">

          <div class="service-creative-price__plan-card">
            <p class="service-creative-price__plan-num">01</p>
            <p class="service-creative-price__plan-name">バナー作成</p>
            <p class="service-creative-price__plan-desc">
              WebサイトやSNSに掲載するバナーを制作します。
              営業導線や訴求軸を踏まえ、媒体ごとの最適なサイズ・表現で設計します。
            </p>
            <p class="service-creative-price__plan-price">1万円〜</p>
          </div>

          <div class="service-creative-price__plan-card">
            <p class="service-creative-price__plan-num">02</p>
            <p class="service-creative-price__plan-name">チラシ作成</p>
            <p class="service-creative-price__plan-desc">
              展示会・ポスティング・営業現場で配布する、
              両面印刷のカラーチラシを制作します。
              配布シーンと訴求対象を踏まえた構成設計から行います。
            </p>
            <p class="service-creative-price__plan-price">8万円〜</p>
          </div>

          <div class="service-creative-price__plan-card">
            <p class="service-creative-price__plan-num">03</p>
            <p class="service-creative-price__plan-name">名刺作成</p>
            <p class="service-creative-price__plan-desc">
              ブランドの世界観を反映したオリジナル名刺を制作します。
              コーポレートカラー・ロゴとの整合性を踏まえ、
              営業現場で印象に残る名刺を設計します。
            </p>
            <p class="service-creative-price__plan-price">8万円〜</p>
          </div>

          <div class="service-creative-price__plan-card">
            <p class="service-creative-price__plan-num">04</p>
            <p class="service-creative-price__plan-name">ロゴ作成</p>
            <p class="service-creative-price__plan-desc">
              事業の理念や価値観を反映したオリジナルロゴを制作します。
              今後のブランド展開を見据えた、長く使えるロゴを設計します。
            </p>
            <p class="service-creative-price__plan-price">8万円〜</p>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [6] FAQ(10問・既存 .accordion + js/accordion.js 流用)   -->
<!-- ===================================================== -->
<section class="service-creative-faq">
  <div class="container">
    <div class="service-creative-faq__inner">

      <div class="service-creative-faq__head faq-header">
        <p class="en">FAQ</p>
        <h2>よくあるご質問</h2>
        <p class="subtitle">お問い合わせ前によくいただく質問をまとめました。</p>
      </div>

      <div class="accordion service-creative-faq__list">
        <ul>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">制作にかかる期間はどれくらいですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">制作物の種類や要件により異なります。バナー制作で1〜2週間、チラシや名刺で2〜3週間、ロゴ制作で3〜4週間が目安です。ヒアリング → 構成設計 → デザイン提案 → 修正 → 入稿の流れで進めます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">制作費用にはどこまでが含まれますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">ヒアリング、構成設計、デザイン提案、修正対応(規定回数内)、入稿データ納品までが基本料金に含まれます。印刷費・写真撮影費・特殊加工費などは別途のお見積もりとなります。詳細は事前にお伝えしますので、安心してご依頼いただけます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">制作にあたって、こちらで用意する情報はありますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">ターゲット・目的・配布シーン・使用する文言・参考デザインなどを事前にお伺いします。情報が整理しきれていない場合は、ヒアリングの中で一緒に整理しますので、ご安心ください。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">既存のロゴやブランドカラーがない場合でも依頼できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。ブランドの世界観整理から始めて、ロゴやコーポレートカラーの設計も併せてご提案できます。まずはヒアリングで現状をお伺いし、必要なステップをご案内します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">修正対応の範囲はどこまでですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">各プランごとに修正回数の目安(2〜3回)を設けています。大幅な方向転換や追加要素の発生などは、別途お見積もりとさせていただく場合があります。修正範囲は事前に明確にお伝えします。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">WebサイトやSNSのデザインも合わせて依頼できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、可能です。ウィルではWebサイト制作・コンテンツSEO・Instagram運用支援なども提供しています。オフライン施策とオンライン施策を一貫して支援することで、すべての顧客接点でブランドと営業導線を揃えることができます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">急ぎの依頼に対応できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能な限り対応いたしますが、品質を担保するため、最低限の制作期間はいただきたいと考えています。具体的なご希望日と内容をお伺いした上で、現実的なスケジュールをご提案します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">印刷会社への入稿まで対応してもらえますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">入稿用データの作成までは対応いたします。ご希望があれば、提携先の印刷会社をご紹介することも可能です。印刷費は別途、印刷会社へ直接お支払いいただく形になります。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">ロゴ制作の場合、ブランドガイドラインも作成してもらえますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、ご希望に応じて作成可能です。ロゴの使用ルール・カラーコード・余白規定・禁止事項などをまとめた簡易版のガイドラインから、本格的なブランドガイドラインまで、規模に応じてご提案します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">修正だけでも依頼できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">既存の制作物の修正・リファインも対応可能です。ただし、内容によっては新規制作の方が効率的なケースもあるため、現状のデータを拝見した上で、最適な進め方をご提案します。</p>
              </div>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [7] CTA(page-service-web の .service-web-cta を流用)    -->
<!-- ===================================================== -->
<section class="service-web-cta">
  <div class="container">
    <div class="service-web-cta__inner">

      <div class="service-web-cta__head cta-header">
        <p class="en">CONTACT</p>
        <h2>3つの相談入口をご用意しています</h2>
        <p class="subtitle">ご検討の段階に合わせて、お気軽にお問い合わせください。</p>
      </div>

      <ul class="service-web-cta__grid">

        <li class="service-web-cta__card">
          <a class="service-web-cta__card-link" href="<?php echo esc_url( home_url('/diagnosis/') ); ?>">
            <p class="service-web-cta__label">[初期検討の方へ]</p>
            <h3 class="service-web-cta__title">1分でできる無料診断</h3>
            <p class="service-web-cta__desc">現在のWebサイトの課題を整理します</p>
            <span class="service-web-cta__btn">診断する →</span>
          </a>
        </li>

        <li class="service-web-cta__card">
          <a class="service-web-cta__card-link" href="<?php echo esc_url( home_url('/ebooks/') ); ?>">
            <p class="service-web-cta__label">[情報収集の方へ]</p>
            <h3 class="service-web-cta__title">無料ダウンロード資料</h3>
            <p class="service-web-cta__desc">BtoB Web制作のお役立ち資料を配布中</p>
            <span class="service-web-cta__btn">資料を見る →</span>
          </a>
        </li>

        <li class="service-web-cta__card">
          <a class="service-web-cta__card-link" href="<?php echo esc_url( home_url('/contact/') ); ?>">
            <p class="service-web-cta__label">[具体的な相談の方へ]</p>
            <h3 class="service-web-cta__title">お問い合わせ・お見積もり</h3>
            <p class="service-web-cta__desc">具体的なご相談・お見積もりはこちら</p>
            <span class="service-web-cta__btn">問い合わせる →</span>
          </a>
        </li>

      </ul>

    </div>
  </div>
</section>

<?php get_footer(); ?>
