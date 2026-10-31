<?php
/**
 * Template Name: Service - Instagram構築・運用支援 v2
 * Template Post Type: page
 *
 * Instagram構築・運用支援サービスページ v2(15セクション構成)
 * 元ワイヤー: ~/Desktop/instagram-service-wireframe/index.html(修正版 2026-09-21)
 *
 * v1(page-service-sns.php)との違い:
 *   - 思想(POLICY)を冒頭ではなく支援内容の理解後に置く
 *   - 支援工程を STEP 01〜05 に分解し、実作業名で具体化する
 *   - CTA をファーストビュー直後 / 支援範囲理解後 / ページ末尾の3箇所に設置する
 *
 * - header + footer + template-parts/page-hero
 * - page-topv3 / page-service-web / page-service-sns のトンマナ準拠
 * - 対応SCSS: scss/style-template/_page-service-sns-v2.scss
 *
 * @package will-corp
 */
get_header();
?>

<?php
// [1] HERO(下層共通テンプレート)
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'INSTAGRAM',
  'title' => 'Instagram構築・運用支援',
  'lead'  => '企業のInstagramを、「なんとなく投稿」から変える。',
] );
?>

<!-- ===================================================== -->
<!-- [1] INTRO(ファーストビュー補足 + CTA①)                  -->
<!-- ===================================================== -->
<section class="sns-v2-intro">
  <div class="container">
    <div class="sns-v2-intro__inner">

      <h2 class="sns-v2-intro__catch" data-section="intro">
        投稿を作るだけでは、<br class="sp">
        <span class="keyword">Instagramは動きません。</span>
      </h2>

      <p class="sns-v2-intro__lead">
        誰に・何を・どう届けるかの設計から、企画・制作・運用・改善まで。<br class="pc">
        企業ごとの目的と体制に合わせて、Instagram運用を整えます。
      </p>

      <ul class="sns-v2-intro__chips">
        <li>調査・設計</li>
        <li>企画・制作</li>
        <li>分析・改善</li>
      </ul>

      <div class="sns-v2-intro__action">
        <a class="sns-v2-btn" href="<?php echo esc_url( home_url('/contact/') ); ?>">まずは相談してみる</a>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [2] PROBLEM(こんなお悩みありませんか?)                  -->
<!-- ===================================================== -->
<section class="sns-v2-problem">
  <div class="container">
    <div class="sns-v2-problem__inner">

      <div class="sns-v2-problem__head sns-v2-head">
        <p class="en">PROBLEM</p>
        <h2 data-section="problem">こんなお悩み<br class="sp">ありませんか？</h2>
        <p class="subtitle">Instagram運用でよくいただくご相談を整理しました。</p>
      </div>

      <ul class="sns-v2-problem__list">
        <li>投稿は続けているが、成果につながっているか分からない</li>
        <li>毎月「何を投稿するか」で悩んでいる</li>
        <li>フォロワーや再生数ばかり追ってしまう</li>
        <li>プロフィールやハイライトが整っていない</li>
        <li>リールをやりたいが、企画や撮影方法が分からない</li>
        <li>社内だけでは分析・改善まで手が回らない</li>
      </ul>

      <p class="sns-v2-band">
        必要なのは、投稿本数を増やすことではなく、<span class="keyword">運用全体を設計すること</span>です。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [3] OVERVIEW(支援の全体像・STEP 01〜05 への道しるべ)     -->
<!-- ===================================================== -->
<section class="sns-v2-overview">
  <div class="container">
    <div class="sns-v2-overview__inner">

      <div class="sns-v2-overview__head sns-v2-head">
        <p class="en">SCOPE</p>
        <h2 data-section="overview">投稿制作だけでは<br class="sp">ありません。</h2>
        <p class="subtitle">Instagramを始める前の設計から、日々の企画・制作、投稿後の分析・改善まで。運用に必要な工程を一つずつ整えます。</p>
      </div>

      <ol class="sns-v2-overview__flow">
        <li class="sns-v2-overview__node">
          <a href="#sns-v2-step01">
            <span class="sns-v2-overview__node-no">STEP 01</span>
            <span class="sns-v2-overview__node-name">調べる</span>
          </a>
        </li>
        <li class="sns-v2-overview__node">
          <a href="#sns-v2-step02">
            <span class="sns-v2-overview__node-no">STEP 02</span>
            <span class="sns-v2-overview__node-name">設計する</span>
          </a>
        </li>
        <li class="sns-v2-overview__node">
          <a href="#sns-v2-step03">
            <span class="sns-v2-overview__node-no">STEP 03</span>
            <span class="sns-v2-overview__node-name">作る</span>
          </a>
        </li>
        <li class="sns-v2-overview__node">
          <a href="#sns-v2-step04">
            <span class="sns-v2-overview__node-no">STEP 04</span>
            <span class="sns-v2-overview__node-name">発信する</span>
          </a>
        </li>
        <li class="sns-v2-overview__node">
          <a href="#sns-v2-step05">
            <span class="sns-v2-overview__node-no">STEP 05</span>
            <span class="sns-v2-overview__node-name">改善する</span>
          </a>
        </li>
      </ol>

      <p class="sns-v2-band">
        毎回ゼロから投稿を考える状態から、<br class="pc">
        <span class="keyword">「何を・誰に・どう届けるか」が整理され、改善しながら続けられる運用</span>へ。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [4] STEP 01 調べる                                      -->
<!-- ===================================================== -->
<section class="sns-v2-step sns-v2-step--pale" id="sns-v2-step01">
  <div class="container">
    <div class="sns-v2-step__inner">

      <div class="sns-v2-step__head">
        <p class="sns-v2-step__no"><small>STEP</small>01</p>
        <div class="sns-v2-step__heading">
          <p class="sns-v2-step__name">調べる</p>
          <h2 data-section="step01">まずは、発信する前にリサーチ。</h2>
        </div>
      </div>

      <div class="sns-v2-step__body">
        <p class="sns-v2-step__label">支援内容</p>
        <ul class="sns-v2-step__cards sns-v2-step__cards--2">
          <li>競合・同業アカウント調査</li>
          <li>参考アカウント・伸びている投稿の分析</li>
          <li>ターゲットの悩み・ニーズ整理</li>
          <li>自社の強み・選ばれる理由の整理</li>
        </ul>
      </div>

      <div class="sns-v2-step__result">
        <p class="sns-v2-step__label">この工程で整うこと</p>
        <p class="sns-v2-step__text">
          「何を投稿するか」を決める前に、<span class="keyword">「誰に、何を伝えるか」</span>を整理します。競合や市場を見ながら、自社ならではの発信軸をつくります。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [5] STEP 02 設計する                                    -->
<!-- ===================================================== -->
<section class="sns-v2-step" id="sns-v2-step02">
  <div class="container">
    <div class="sns-v2-step__inner">

      <div class="sns-v2-step__head">
        <p class="sns-v2-step__no"><small>STEP</small>02</p>
        <div class="sns-v2-step__heading">
          <p class="sns-v2-step__name">設計する</p>
          <h2 data-section="step02">続けられるInstagramの「型」をつくる。</h2>
        </div>
      </div>

      <div class="sns-v2-step__body">
        <p class="sns-v2-step__label">支援内容</p>
        <ul class="sns-v2-step__cards sns-v2-step__cards--3">
          <li>ターゲット・コンセプト設計</li>
          <li>プロフィール設計</li>
          <li>コンテンツの柱・カテゴリ設計</li>
          <li>ハイライト構成</li>
          <li>トンマナ・デザインルール</li>
          <li>KPI・運用ルール設計</li>
        </ul>
      </div>

      <div class="sns-v2-step__result">
        <p class="sns-v2-step__label">この工程で整うこと</p>
        <p class="sns-v2-step__text">
          担当者が毎回ゼロから悩まなくても発信を続けられるよう、<span class="keyword">アカウント全体の型</span>を整えます。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [6] STEP 03 企画・制作する                              -->
<!-- ===================================================== -->
<section class="sns-v2-step sns-v2-step--pale" id="sns-v2-step03">
  <div class="container">
    <div class="sns-v2-step__inner">

      <div class="sns-v2-step__head">
        <p class="sns-v2-step__no"><small>STEP</small>03</p>
        <div class="sns-v2-step__heading">
          <p class="sns-v2-step__name">企画・制作する</p>
          <h2 data-section="step03">毎月の「何を投稿しよう？」も一緒に考えます。</h2>
        </div>
      </div>

      <div class="sns-v2-step__body">
        <p class="sns-v2-step__label">支援内容</p>
        <ul class="sns-v2-step__cards sns-v2-step__cards--4">
          <li>月間投稿企画</li>
          <li>フィード構成</li>
          <li>リール構成・台本</li>
          <li>キャプション</li>
          <li>撮影指示・カット案</li>
          <li>デザイン・動画編集</li>
          <li>公開前レビュー</li>
        </ul>
      </div>

      <div class="sns-v2-step__result">
        <p class="sns-v2-step__label">この工程で整うこと</p>
        <p class="sns-v2-step__text">
          企画だけ、制作だけで分断せず、<span class="keyword">投稿として公開できる状態まで</span>必要な範囲を支援します。
        </p>
      </div>

      <p class="sns-v2-band">
        BtoB企業では、Instagram単体ではなく、Webや問い合わせ・営業につながる導線まで含めて設計します。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [7] STEP 04 発信を整える                                -->
<!-- ===================================================== -->
<section class="sns-v2-step" id="sns-v2-step04">
  <div class="container">
    <div class="sns-v2-step__inner">

      <div class="sns-v2-step__head">
        <p class="sns-v2-step__no"><small>STEP</small>04</p>
        <div class="sns-v2-step__heading">
          <p class="sns-v2-step__name">発信を整える</p>
          <h2 data-section="step04">プロフィールを開いたあとも、迷わせない。</h2>
        </div>
      </div>

      <div class="sns-v2-step__body">
        <p class="sns-v2-step__label">支援内容</p>
        <ol class="sns-v2-step__route">
          <li>プロフィール文</li>
          <li>投稿・リール</li>
          <li>ストーリーズ</li>
          <li>ハイライト</li>
          <li>Web・予約・問い合わせへの導線</li>
        </ol>
      </div>

      <div class="sns-v2-step__result">
        <p class="sns-v2-step__label">この工程で整うこと</p>
        <p class="sns-v2-step__text">
          Instagramは、投稿単体ではなくアカウント全体で見られます。「見てもらう」だけで終わらず、<span class="keyword">次の行動につながる状態</span>を整えます。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [8] STEP 05 分析して、改善する                          -->
<!-- ===================================================== -->
<section class="sns-v2-step sns-v2-step--pale" id="sns-v2-step05">
  <div class="container">
    <div class="sns-v2-step__inner">

      <div class="sns-v2-step__head">
        <p class="sns-v2-step__no"><small>STEP</small>05</p>
        <div class="sns-v2-step__heading">
          <p class="sns-v2-step__name">分析して、改善する</p>
          <h2 data-section="step05">投稿したら、終わりではありません。</h2>
        </div>
      </div>

      <div class="sns-v2-step__body">
        <p class="sns-v2-step__label">確認する指標例</p>
        <ul class="sns-v2-step__tags">
          <li>リーチ</li>
          <li>再生</li>
          <li>保存</li>
          <li>プロフィールアクセス</li>
          <li>Web遷移</li>
          <li>フォロー</li>
          <li>DM・問い合わせ</li>
        </ul>
      </div>

      <div class="sns-v2-step__result">
        <p class="sns-v2-step__label">この工程で整うこと</p>
        <p class="sns-v2-step__text">
          「何が伸びたか」だけではなく、<span class="keyword">「次に何を変えるか」まで整理</span>します。月次で数値と投稿内容を振り返り、次の企画や運用方針に反映します。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [9] RANGE(支援範囲は、会社に合わせて設計)               -->
<!-- ===================================================== -->
<section class="sns-v2-range">
  <div class="container">
    <div class="sns-v2-range__inner">

      <div class="sns-v2-range__head sns-v2-head">
        <p class="en">RANGE</p>
        <h2 data-section="range">全部任せる、<br class="sp">だけではありません。</h2>
        <p class="subtitle">社内の体制や得意なことに合わせて、必要な支援範囲を組み立てます。既存の制作会社や社内担当者との分担にも対応します。</p>
      </div>

      <ul class="sns-v2-range__list">
        <li class="sns-v2-range__item">
          <p class="sns-v2-range__case">企画から制作・投稿まで任せたい</p>
          <p class="sns-v2-range__plan">フルサポート</p>
        </li>
        <li class="sns-v2-range__item">
          <p class="sns-v2-range__case">撮影は社内でできる</p>
          <p class="sns-v2-range__plan">撮影を分担</p>
        </li>
        <li class="sns-v2-range__item">
          <p class="sns-v2-range__case">制作できる担当者がいる</p>
          <p class="sns-v2-range__plan">設計・企画・分析を中心に伴走</p>
        </li>
      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [10] CTA②(支援範囲理解の直後)                          -->
<!-- ===================================================== -->
<section class="sns-v2-ctamid">
  <div class="container">
    <div class="sns-v2-ctamid__inner">
      <h2 class="sns-v2-ctamid__title" data-section="cta-mid">今の運用を一度整理してみませんか？</h2>
      <p class="sns-v2-ctamid__lead">
        何から見直せばいいか分からない段階でも大丈夫です。<br class="pc">
        現在の運用状況と社内体制をお聞きし、必要な支援範囲を整理します。
      </p>
      <div class="sns-v2-ctamid__action">
        <a class="sns-v2-btn sns-v2-btn--light" href="<?php echo esc_url( home_url('/contact/') ); ?>">Instagram運用について相談する</a>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [11] BRIDGE(5工程 → 初期構築 / 月次運用 へのつなぎ)      -->
<!-- ===================================================== -->
<section class="sns-v2-bridge">
  <div class="container">
    <div class="sns-v2-bridge__inner">
      <p class="sns-v2-band">
        ここまでの5つの工程を、実際の支援では<span class="keyword">「初期構築」と「月次運用」</span>に分けて進めます。
      </p>
    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [12] BUILD(初期構築で整えること)                        -->
<!-- ===================================================== -->
<section class="sns-v2-build">
  <div class="container">
    <div class="sns-v2-build__inner">

      <div class="sns-v2-build__head sns-v2-head">
        <p class="en">INITIAL</p>
        <h2 data-section="build">まず、運用の土台を<br class="sp">つくります。</h2>
        <p class="subtitle">「とりあえず投稿開始」ではなく、最初に迷いにくい運用基盤を整えてから発信を始めます。</p>
      </div>

      <ul class="sns-v2-build__list">

        <li class="sns-v2-build__col">
          <h3>設計</h3>
          <ul>
            <li>事業・ブランド・目的のヒアリング</li>
            <li>競合・市場リサーチ</li>
            <li>ターゲット・コンセプト設計</li>
          </ul>
        </li>

        <li class="sns-v2-build__col">
          <h3>アカウント整備</h3>
          <ul>
            <li>プロフィール設計</li>
            <li>コンテンツ設計</li>
            <li>ハイライト設計</li>
          </ul>
        </li>

        <li class="sns-v2-build__col">
          <h3>制作ルール</h3>
          <ul>
            <li>トンマナ・デザインルール</li>
            <li>撮影・投稿ルール</li>
          </ul>
        </li>

        <li class="sns-v2-build__col">
          <h3>運用体制</h3>
          <ul>
            <li>KPI設計</li>
            <li>承認フロー・運用体制の整理</li>
          </ul>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [13] MONTHLY(月次運用で行うこと)                        -->
<!-- ===================================================== -->
<section class="sns-v2-monthly">
  <div class="container">
    <div class="sns-v2-monthly__inner">

      <div class="sns-v2-monthly__head sns-v2-head">
        <p class="en">MONTHLY</p>
        <h2 data-section="monthly">運用開始後も、企画から<br class="sp">改善まで伴走します。</h2>
        <p class="subtitle">毎月の企画会議から投稿制作、数値の振り返りまでを一連の流れとして進めます。</p>
      </div>

      <ul class="sns-v2-monthly__list">

        <li class="sns-v2-monthly__col">
          <h3>企画・制作</h3>
          <ul>
            <li>月間企画のご提案</li>
            <li>コンテンツ会議</li>
            <li>構成・台本・撮影指示</li>
            <li>投稿制作</li>
            <li>投稿文作成</li>
            <li>公開前レビュー</li>
          </ul>
        </li>

        <li class="sns-v2-monthly__col">
          <h3>運用</h3>
          <ul>
            <li>入稿・予約投稿・公開</li>
            <li>コメント・DMのモニタリング</li>
            <li>必要に応じたストーリーズ・ハイライト運用</li>
          </ul>
        </li>

        <li class="sns-v2-monthly__col">
          <h3>分析・改善</h3>
          <ul>
            <li>月次レポート</li>
            <li>改善提案</li>
            <li>KPI見直し</li>
            <li>今後の企画方針の調整</li>
          </ul>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [14] PRICE(2プラン)                                    -->
<!-- ===================================================== -->
<section class="sns-v2-price">
  <div class="container">
    <div class="sns-v2-price__inner">

      <div class="sns-v2-price__head sns-v2-head">
        <p class="en">PRICE</p>
        <h2 data-section="price">料金プラン</h2>
        <p class="subtitle">下記は参考価格です。詳細なお見積もりはヒアリング後にご提示します。</p>
      </div>

      <p class="sns-v2-price__lead">内容や体制に応じて最適な構成をご提案します。</p>

      <div class="sns-v2-price__grid">

        <div class="sns-v2-price__card">
          <p class="sns-v2-price__num">01</p>
          <p class="sns-v2-price__name">初期構築プラン</p>
          <p class="sns-v2-price__desc">
            SNSの役割定義、ターゲット設計、投稿コンセプト設計、コンテンツカテゴリ設計、トンマナ設計、プロフィール最適化、Web接続導線設計、KPI設計、運用マニュアル作成まで。SNS運用の「型」を構築します。
          </p>
          <p class="sns-v2-price__amount">300,000円<span>／回</span></p>
        </div>

        <div class="sns-v2-price__card">
          <p class="sns-v2-price__num">02</p>
          <p class="sns-v2-price__name">月額運用伴走プラン</p>
          <p class="sns-v2-price__desc">
            月1回の戦略MTGを軸に、投稿企画設計、投稿作成支援、数値分析、Web接続導線改善、導線最適化提案まで実施。支援範囲はご要望や社内体制に合わせて柔軟に調整します。
          </p>
          <p class="sns-v2-price__amount">350,000円〜<span>／月</span></p>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [15] POLICY(ウィルが大切にしていること・濃色背景)        -->
<!-- ===================================================== -->
<section class="sns-v2-policy">
  <div class="container">
    <div class="sns-v2-policy__inner">

      <div class="sns-v2-policy__head sns-v2-head">
        <p class="en">POLICY</p>
        <h2 data-section="policy">再生数だけを追う<br class="sp">運用にはしません。</h2>
      </div>

      <div class="sns-v2-policy__body">
        <p>再生数やリーチは大切です。ただし、それ自体を目的にはしません。</p>
        <p>誰に届いたのか、興味を持ってもらえたのか、プロフィールやWebを見てもらえたのか、相談や問い合わせにつながったのか。</p>
        <p><span class="keyword">企業の目的につながる流れまで見ながら</span>、運用を改善します。</p>
      </div>

      <p class="sns-v2-policy__note">
        BtoB企業の場合は、Instagram単体ではなく、Web・営業・問い合わせ導線とのつながりも含めて設計します。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [16] FIT(こんな企業に向いています)                      -->
<!-- ===================================================== -->
<section class="sns-v2-fit">
  <div class="container">
    <div class="sns-v2-fit__inner">

      <div class="sns-v2-fit__head sns-v2-head">
        <p class="en">FIT</p>
        <h2 data-section="fit">こんな企業に向いています</h2>
        <p class="subtitle">ひとつでも当てはまる場合は、一度ご相談ください。</p>
      </div>

      <ul class="sns-v2-fit__list">
        <li>Instagramを始めたいが、何から決めればいいか分からない</li>
        <li>投稿はしているが、成果や改善方法が分からない</li>
        <li>担当者の負担が大きく、企画が続かない</li>
        <li>企業らしさを出しながら、堅すぎない発信にしたい</li>
        <li>SNSとWebや問い合わせ導線をつなげたい</li>
        <li>社内制作と外部支援をうまく分担したい</li>
      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [17] TEAM(支援体制)                                    -->
<!-- ===================================================== -->
<section class="sns-v2-team">
  <div class="container">
    <div class="sns-v2-team__inner">

      <div class="sns-v2-team__head sns-v2-head">
        <p class="en">TEAM</p>
        <h2 data-section="team">戦略と制作、<br class="sp">両方の視点で支援します。</h2>
      </div>

      <ul class="sns-v2-team__list">

        <li class="sns-v2-team__member">
          <div class="sns-v2-team__photo">
            <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/member-takahashi.webp' ) ); ?>" alt="高橋 竜也" width="1170" height="1165" loading="lazy" decoding="async">
          </div>
          <div class="sns-v2-team__body">
            <p class="sns-v2-team__name">高橋 竜也<span>戦略・設計</span></p>
            <p class="sns-v2-team__text">BtoBマーケティング・営業の経験をもとに、目的・ターゲット・訴求・導線・KPIなど、運用全体を設計します。</p>
          </div>
        </li>

        <li class="sns-v2-team__member">
          <div class="sns-v2-team__photo">
            <img src="<?php echo esc_url( will_asset_url( 'will-grow-v2-assets/images/member-iwata.webp' ) ); ?>" alt="岩田 あゆみ" width="1170" height="1065" loading="lazy" decoding="async">
          </div>
          <div class="sns-v2-team__body">
            <p class="sns-v2-team__name">岩田 あゆみ<span>企画・クリエイティブ</span></p>
            <p class="sns-v2-team__text">ブランドマーケティング・ディレクション・制作・編集の視点から、企画・クリエイティブ・伝わりやすさ・品質を確認します。</p>
          </div>
        </li>

      </ul>

      <p class="sns-v2-band">
        「伸ばすための施策」と「その会社らしく伝えること」の両方を見ながら進めます。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [18] CTA③(相談ボタン単体)                                -->
<!-- ===================================================== -->
<section class="sns-v2-cta">
  <div class="container">
    <div class="sns-v2-cta__inner">

      <div class="sns-v2-cta__head sns-v2-head">
        <p class="en">CONTACT</p>
        <h2 data-section="cta">Instagram、何から<br class="sp">見直せばいいか<br class="sp">分からなくても大丈夫です。</h2>
      </div>

      <ul class="sns-v2-cta__quotes">
        <li>「今の運用を一度見てほしい」</li>
        <li>「これから始めたいけど、何を準備すればいい？」</li>
        <li>「全部任せるのではなく、一部だけ相談したい」</li>
      </ul>

      <p class="sns-v2-cta__lead">
        そんな段階からご相談いただけます。<br>
        まずは現在の状況をお聞きし、必要な支援範囲を一緒に整理します。
      </p>

      <div class="sns-v2-cta__action">
        <a class="sns-v2-btn sns-v2-btn--light" href="<?php echo esc_url( home_url('/contact/') ); ?>">Instagram運用について相談する</a>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
