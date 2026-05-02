<?php
/**
 * Template Name: Service - MA構築・運用支援
 * Template Post Type: page
 *
 * MA構築・運用支援サービスの新ページ(11セクション構成)。
 * 中心メッセージ:「Webサイトは営業の土台。MAは、その土台の上で見込み客を育てる仕組み。」
 *
 * - header-v4 + footer-v3 + template-parts/page-hero
 * - ブランド・メッセージガイドライン v2.0 / カラーガイドライン v1.0 準拠
 * - トップページ(page-topv3)のトンマナ踏襲(.en + h2 + .subtitle ヘッダー)
 *
 * @package will-corp
 */
get_header('v4');
?>

<?php
// ヒーロー(下層共通テンプレート)
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'MARKETING AUTOMATION',
  'title' => 'MA構築・運用支援',
  'lead'  => '見込み客を育てる仕組みで、属人営業から、再現性のある仕組みへ。',
] );
?>

<!-- ===================================================== -->
<!-- [1] HERO 補足                                            -->
<!-- ===================================================== -->
<section class="service-ma-hero">
  <div class="container">
    <div class="service-ma-hero__inner">

      <h2 class="service-ma-hero__catch">
        Webサイトを「営業の土台」として整えた次のステップ。<br>
        属人化したフォローを<span class="keyword">仕組み</span>に変え、商談化率と営業生産性を高めます。
      </h2>

      <p class="service-ma-hero__lead">
        MAは万能ツールではありません。Web基盤が整って初めて、見込み客を育てる仕組みとして機能します。<br class="pc">
        貴社の事業フェーズに合わせて、ツールではなく仕組みから設計します。
      </p>

      <p class="service-ma-hero__alternative">
        ※ Web基盤がまだ整っていない場合は、まず<a href="<?php echo esc_url( home_url('/service/web-creative/') ); ?>">「Webサイト制作」</a>または<a href="<?php echo esc_url( home_url('/willsupport/') ); ?>">「ウィルサポ」</a>からご検討ください。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [2] CONCEPT                                              -->
<!-- ===================================================== -->
<section class="service-ma-concept">
  <div class="container">
    <div class="service-ma-concept__inner">

      <div class="service-ma-concept__head concept-header">
        <p class="en">CONCEPT</p>
        <h2>コンセプト</h2>
        <p class="subtitle">MAを単独で導入するのではなく、営業の土台の上で見込み客を育てる仕組みとして設計します。</p>
      </div>

      <h3 class="service-ma-concept__headline">
        Webサイトは営業の土台。<br>
        MAは、その土台の上で<span class="keyword">見込み客を育てる仕組み</span>。
      </h3>

      <div class="service-ma-concept__body">
        <p>
          多くの企業がMA導入で躓くのは、MAそのものに問題があるからではありません。
          <span class="keyword">「育てるべき見込み客の流れ」</span>が、まだ生まれていない状態で導入してしまうから。
        </p>
        <p>
          Webサイト・コンテンツ・問い合わせ動線・営業プロセス。
          これらの土台が整って初めて、MAは見込み客を育てる仕組みとして機能します。
        </p>
        <p>
          BtoBビジネスでは、見込み客がすぐに購入に至ることはほとんどありません。
          検討期間が長い分、こまめに接点を持ち続け、信頼を積み上げ、適切なタイミングで商談につなげる。
          この一連の流れを、属人的な営業ではなく仕組みで実現するのがMAです。
        </p>
        <p>
          私たちは、MAを単独で導入するのではなく、営業の土台の上で見込み客が確実に育っていく仕組みとして設計します。
          だからこそ、MAが本当に成果を生む使い方ができるのです。
        </p>
      </div>

      <div class="service-ma-concept__note-box">
        <p>
          本サービスは、すでに一定のWeb基盤を持つ企業様向けです。<br>
          土台からの整備が必要な場合は、まず<a href="<?php echo esc_url( home_url('/service/web-creative/') ); ?>">「Webサイト制作」</a>または月額制の<a href="<?php echo esc_url( home_url('/willsupport/') ); ?>">「ウィルサポ」</a>からご検討ください。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [3] FOR WHOM                                             -->
<!-- ===================================================== -->
<section class="service-ma-target">
  <div class="container">
    <div class="service-ma-target__inner">

      <div class="service-ma-target__head target-header">
        <p class="en">FOR WHOM</p>
        <h2>こんな会社のためのサービスです</h2>
        <p class="subtitle">本サービスは、特に以下のような会社向けにご提供しています。</p>
      </div>

      <ul class="service-ma-target__list">

        <li class="service-ma-target__item">
          <p class="service-ma-target__category-label">BtoBで検討期間が長い事業</p>
          <p class="service-ma-target__text">
            契約までに複数回の接点・複数の意思決定者の合意が必要なBtoBビジネス。
            1回の接点で受注に至らないため、見込み客を継続的に育てる仕組みが必要な事業。
          </p>
        </li>

        <li class="service-ma-target__item">
          <p class="service-ma-target__category-label">リストはあるがフォローが属人化している会社</p>
          <p class="service-ma-target__text">
            展示会・紹介・問い合わせで一定のリストは集まる。
            ただし、その後のフォローが営業担当ごとに属人化し、抜け漏れが発生している。
          </p>
        </li>

        <li class="service-ma-target__item">
          <p class="service-ma-target__category-label">営業生産性を仕組みで高めたい会社</p>
          <p class="service-ma-target__text">
            営業人員を増やすコストよりも、既存リソースの生産性を上げる方が現実的。
            将来的にマーケティング・営業ノウハウを社内に蓄積し、自走できる体制をつくりたい。
          </p>
        </li>

      </ul>

      <div class="service-ma-target__alt-block">
        <h3 class="service-ma-target__alt-title">
          ただし、以下の状況では、まずWeb基盤の整備をおすすめしています
        </h3>

        <ul class="service-ma-target__alt-list">
          <li>Webサイトがまだない、または会社案内程度の状態である</li>
          <li>自社サイトに商品・サービスの詳細情報がほとんど掲載されていない</li>
          <li>コンテンツ(ブログ・事例・資料等)が極めて少ない</li>
          <li>問い合わせ動線が機能しておらず、リードが集まらない</li>
        </ul>

        <p class="service-ma-target__alt-text">
          これらの場合、MAを導入しても「育てるべき見込み客の流れ」がまだ生まれていないため成果が出にくく、
          まずWebサイト制作またはウィルサポで土台を整えてから、MAをご導入いただくことを推奨しています。
        </p>

        <div class="service-ma-target__alt-links">
          <a class="service-ma-target__alt-link" href="<?php echo esc_url( home_url('/service/web-creative/') ); ?>">
            Webサイト制作の詳細 →
          </a>
          <a class="service-ma-target__alt-link" href="<?php echo esc_url( home_url('/willsupport/') ); ?>">
            ウィルサポの詳細 →
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [4] PROBLEM                                              -->
<!-- ===================================================== -->
<section class="service-ma-problem">
  <div class="container">
    <div class="service-ma-problem__inner">

      <div class="service-ma-problem__head problem-header">
        <p class="en">PROBLEM</p>
        <h2>こんなお悩みはありませんか?</h2>
        <p class="subtitle">BtoB中小企業のMA導入・運用で、よくいただくご相談を3つの観点で整理しました。</p>
      </div>

      <ul class="service-ma-problem__list">

        <li class="service-ma-problem__category">
          <h3 class="service-ma-problem__category-title">接点獲得後の課題</h3>
          <ul class="service-ma-problem__check-list">
            <li>展示会や紹介で集めたリストの大半が、フォローされず眠っている</li>
            <li>問い合わせはあるが商談化率が低く、見込み客が逃げている</li>
            <li>リードナーチャリング(育成)の仕組みがなく、検討期間中に他社に流れる</li>
          </ul>
        </li>

        <li class="service-ma-problem__category">
          <h3 class="service-ma-problem__category-title">営業組織の課題</h3>
          <ul class="service-ma-problem__check-list">
            <li>営業担当ごとに提案の質にばらつきがあり、属人化が進んでいる</li>
            <li>新人営業の立ち上がりに時間がかかる</li>
            <li>営業人員を増やしたいが、採用・教育コストが重い</li>
          </ul>
        </li>

        <li class="service-ma-problem__category">
          <h3 class="service-ma-problem__category-title">仕組み化・運用の課題</h3>
          <ul class="service-ma-problem__check-list">
            <li>MAを導入したが、運用が止まっている・成果が見えない</li>
            <li>MAの設定はできるが、「何を」「誰に」「どのタイミングで」配信すべきか分からない</li>
            <li>社内にノウハウが蓄積せず、ベンダー依存が続いている</li>
          </ul>
        </li>

      </ul>

      <p class="service-ma-problem__closing">
        これらの課題は、ツールを導入するだけでは解決しません。<br>
        <span class="keyword">見込み客を育てる流れを設計し、データを見ながら改善し続ける運用</span>が必要です。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [5] PRINCIPLE(★MA独自セクション)                       -->
<!-- ===================================================== -->
<section class="service-ma-principle">
  <div class="container">
    <div class="service-ma-principle__inner">

      <div class="service-ma-principle__head principle-header">
        <p class="en">PRINCIPLE</p>
        <h2>ウィルがMA設計で<br class="sp">大切にしている3つの原則</h2>
        <p class="subtitle">MA構築には、ツール選定よりもはるかに大切な「設計の考え方」があります。</p>
      </div>

      <ul class="service-ma-principle__list">

        <li class="service-ma-principle__item">
          <p class="service-ma-principle__number">01</p>
          <h3 class="service-ma-principle__title">ツールから入らない、見込み客の育ち方から入る</h3>
          <div class="service-ma-principle__thinking">
            <p class="service-ma-principle__label">[考え方]</p>
            <p>
              MA(マーケティングオートメーション)は手段であり、目的ではありません。
              HubSpot・Marketo・SATORI など、どのツールを選ぶかより先に、
              「自社の見込み客はどう育っていくのか」を整理することから始めます。
            </p>
          </div>
          <div class="service-ma-principle__reasoning">
            <p class="service-ma-principle__label service-ma-principle__label--reason">[なぜか]</p>
            <p>
              ツール選定から入ると、ツールの機能に振り回され、本来やるべきことを見失います。
              <span class="keyword">見込み客の育ち方から逆算</span>することで、自社にとって最適なツールと最適な使い方が決まります。
            </p>
          </div>
        </li>

        <li class="service-ma-principle__item">
          <p class="service-ma-principle__number">02</p>
          <h3 class="service-ma-principle__title">配信本数より、配信設計の質を見る</h3>
          <div class="service-ma-principle__thinking">
            <p class="service-ma-principle__label">[考え方]</p>
            <p>
              「メール配信を月◯回」「ステップメールを◯通」といった量の指標ではなく、
              「誰が・どの段階で・何を求めているか」に応じて配信を設計します。
            </p>
          </div>
          <div class="service-ma-principle__reasoning">
            <p class="service-ma-principle__label service-ma-principle__label--reason">[なぜか]</p>
            <p>
              量を追うMA運用は、開封率の低下とリストの疲弊を招きます。
              <span class="keyword">質を追求した設計</span>は、長期的に開封率・クリック率・商談化率のすべてを向上させます。
            </p>
          </div>
        </li>

        <li class="service-ma-principle__item">
          <p class="service-ma-principle__number">03</p>
          <h3 class="service-ma-principle__title">自走できる体制を最初から想定する</h3>
          <div class="service-ma-principle__thinking">
            <p class="service-ma-principle__label">[考え方]</p>
            <p>
              ウィルは丸投げ型の運用代行ではなく、自社で運用できる体制づくりを最初から想定します。
              原稿添削・改善提案・定例MTGを通じて、運用の考え方そのものを共有していきます。
            </p>
          </div>
          <div class="service-ma-principle__reasoning">
            <p class="service-ma-principle__label service-ma-principle__label--reason">[なぜか]</p>
            <p>
              MAを長期的に成果につなげるには、現場の理解が不可欠です。
              ベンダー依存ではなく、自社の中にノウハウが蓄積されることで、
              <span class="keyword">事業の変化に応じた柔軟な運用</span>が可能になります。
            </p>
          </div>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [6] REASON(★最重要・ベネフィット型訴求)                -->
<!-- ===================================================== -->
<section class="service-ma-reason">
  <div class="container">
    <div class="service-ma-reason__inner">

      <div class="service-ma-reason__head reason-header">
        <p class="en">REASON</p>
        <h2>ウィルが選ばれる<br class="sp">4つの理由</h2>
        <p class="subtitle">MA構築・運用支援を提供する会社は数多くあります。そのなかで、ウィルが選ばれる理由をお伝えします。</p>
      </div>

      <ul class="service-ma-reason__list">

        <li class="service-ma-reason__item">
          <p class="service-ma-reason__number">01</p>
          <h3 class="service-ma-reason__title">営業構造から逆算した設計</h3>
          <div class="service-ma-reason__approach">
            <p>
              MAを単なる配信ツールとして扱うのではなく、
              「認知 → 興味関心 → 比較検討 → 商談 → 受注」という営業プロセス全体を整理した上で設計します。
              誰に・何を・どの順番で届けるかを明確にすることで、
              メールやコンテンツが商談化に向かって機能する状態をつくります。
            </p>
          </div>
          <div class="service-ma-reason__benefit">
            <p>
              <span class="service-ma-reason__benefit-arrow">→</span>
              単なるメール配信から脱却し、<span class="keyword">見込み客が確実に育っていく仕組み</span>に変わります。
            </p>
          </div>
        </li>

        <li class="service-ma-reason__item">
          <p class="service-ma-reason__number">02</p>
          <h3 class="service-ma-reason__title">Web基盤と一体で設計する一気通貫設計</h3>
          <div class="service-ma-reason__approach">
            <p>
              MAは単体では成果を最大化しづらい仕組みです。
              Webサイトを営業の土台と捉え、コンテンツ設計・導線設計・資料ページ・ホワイトペーパーなどと
              一体で設計します。
              集客から育成、商談化までを一本の流れとして構築します。
            </p>
          </div>
          <div class="service-ma-reason__benefit">
            <p>
              <span class="service-ma-reason__benefit-arrow">→</span>
              Webとメールが連動し、<span class="keyword">検討フェーズに沿った育成</span>が実現します。
            </p>
          </div>
        </li>

        <li class="service-ma-reason__item">
          <p class="service-ma-reason__number">03</p>
          <h3 class="service-ma-reason__title">数値分析を前提とした改善設計</h3>
          <div class="service-ma-reason__approach">
            <p>
              開封率やクリック率だけでなく、
              資料請求・問い合わせ・商談化率まで含めた数値を可視化。
              感覚ではなくデータを基に改善サイクルを回す前提で、最初から仕組みを設計します。
            </p>
          </div>
          <div class="service-ma-reason__benefit">
            <p>
              <span class="service-ma-reason__benefit-arrow">→</span>
              育成プロセスが見える化され、<span class="keyword">改善が継続的に自走する仕組み</span>になります。
            </p>
          </div>
        </li>

        <li class="service-ma-reason__item">
          <p class="service-ma-reason__number">04</p>
          <h3 class="service-ma-reason__title">社内にノウハウが残る伴走型支援</h3>
          <div class="service-ma-reason__approach">
            <p>
              丸投げ型の代行ではなく、社内に運用ノウハウが蓄積する伴走型支援を行います。
              原稿添削や改善提案、定例MTGを通じて運用の考え方を共有し、
              将来的には自社で回せる体制づくりを目指します。
            </p>
          </div>
          <div class="service-ma-reason__benefit">
            <p>
              <span class="service-ma-reason__benefit-arrow">→</span>
              ベンダー依存から脱却し、<span class="keyword">事業の変化に応じた柔軟なMA運用</span>が可能になります。
            </p>
          </div>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [7] FLOW                                                 -->
<!-- ===================================================== -->
<section class="service-ma-flow">
  <div class="container">
    <div class="service-ma-flow__inner">

      <div class="service-ma-flow__head flow-header">
        <p class="en">FLOW</p>
        <h2>構築・運用の流れ</h2>
        <p class="subtitle">ツール設定よりも前に「営業構造の整理」と「育成シナリオ設計」に十分な時間をかけます。</p>
      </div>

      <ol class="service-ma-flow__list">

        <li class="service-ma-flow__item">
          <p class="service-ma-flow__step-number">Step 01</p>
          <h3 class="service-ma-flow__title">お問い合わせ・初回ヒアリング(無料)</h3>
          <p class="service-ma-flow__text">
            事業内容・現状の営業プロセス・課題を伺います。
            MA導入が適切なタイミングか、Web基盤の整備が先かを率直にお伝えします。
          </p>
        </li>

        <li class="service-ma-flow__item">
          <p class="service-ma-flow__step-number">Step 02</p>
          <h3 class="service-ma-flow__title">営業構造の整理・育成シナリオ設計</h3>
          <p class="service-ma-flow__text">
            ターゲット定義・購買プロセス整理・接点マップ作成を実施。
            誰に・何を・どの順番で届けるかを明確にし、見込み客を育てるシナリオを設計します。
          </p>
        </li>

        <li class="service-ma-flow__item">
          <p class="service-ma-flow__step-number">Step 03</p>
          <h3 class="service-ma-flow__title">セグメント・スコアリング設計</h3>
          <p class="service-ma-flow__text">
            リストをどう分類するか、行動をどうスコアリングするかを設計。
            営業に渡すべきタイミングの判断基準を明確にします。
          </p>
        </li>

        <li class="service-ma-flow__item">
          <p class="service-ma-flow__step-number">Step 04</p>
          <h3 class="service-ma-flow__title">ステップメール・コンテンツ制作</h3>
          <p class="service-ma-flow__text">
            シナリオに沿ったメール・ホワイトペーパー・LP等を制作。
            原稿は貴社内製・ウィル代行のいずれにも対応します。
          </p>
        </li>

        <li class="service-ma-flow__item">
          <p class="service-ma-flow__step-number">Step 05</p>
          <h3 class="service-ma-flow__title">ツール初期設定・連携</h3>
          <p class="service-ma-flow__text">
            お使いのMAツール(HubSpot/Marketo/SATORI等)の初期設定を実施。
            Webサイト・CRMとの連携も含めて構築します。
          </p>
        </li>

        <li class="service-ma-flow__item">
          <p class="service-ma-flow__step-number">Step 06</p>
          <h3 class="service-ma-flow__title">運用開始・改善サイクル</h3>
          <p class="service-ma-flow__text">
            月1回の戦略MTG、数値分析、改善提案、ABテスト設計を継続的に実施。
            運用しながら、社内に運用ノウハウを蓄積していきます。
          </p>
        </li>

      </ol>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [8] PRICE                                                -->
<!-- ===================================================== -->
<section class="service-ma-price">
  <div class="container">
    <div class="service-ma-price__inner">

      <div class="service-ma-price__head price-header">
        <p class="en">PRICE</p>
        <h2>料金プラン</h2>
        <p class="subtitle">下記は参考価格です。詳細なお見積もりはヒアリング後にご提示いたします。</p>
      </div>

      <!-- ① 料金プラン -->
      <div class="service-ma-price__plans">
        <h3 class="service-ma-price__plans-heading">MA構築・運用支援</h3>
        <div class="service-ma-price__plans-grid">

          <div class="service-ma-price__plan-card">
            <p class="service-ma-price__plan-num">01</p>
            <p class="service-ma-price__plan-name">初期構築プラン</p>
            <p class="service-ma-price__plan-desc">
              営業構造整理・育成シナリオ設計・セグメント設計・スコアリング設計・ステップメール制作・初期設定までを実施し、運用可能な状態を構築します。
            </p>
            <p class="service-ma-price__plan-price">400,000円〜<span class="service-ma-price__plan-tax">/ 回</span></p>
          </div>

          <div class="service-ma-price__plan-card">
            <p class="service-ma-price__plan-num">02</p>
            <p class="service-ma-price__plan-name">月額運用伴走プラン</p>
            <p class="service-ma-price__plan-desc">
              月1回の戦略MTG・数値分析・改善提案・原稿添削・ABテスト設計などを実施。運用を積み上げながら自走体制を構築します。
            </p>
            <p class="service-ma-price__plan-price">150,000円〜<span class="service-ma-price__plan-tax">/ 月</span></p>
          </div>

          <div class="service-ma-price__plan-card">
            <p class="service-ma-price__plan-num">03</p>
            <p class="service-ma-price__plan-name">メルマガ制作代行</p>
            <p class="service-ma-price__plan-desc">
              運用初期の立ち上げ支援として、構成設計・原稿作成・件名設計を実施。テンプレート化し、将来的な社内制作へ移行可能な形で支援します。
            </p>
            <p class="service-ma-price__plan-price">30,000円〜<span class="service-ma-price__plan-tax">/ 1通</span></p>
          </div>

        </div>
      </div>

      <!-- ② 推奨導入順序 -->
      <div class="service-ma-price__order-block">
        <h3 class="service-ma-price__order-heading">推奨される導入順序</h3>
        <p class="service-ma-price__order-lead">
          ウィルでは、以下の順序でのご導入を推奨しています。
        </p>
        <ol class="service-ma-price__order-list">
          <li>
            <span class="service-ma-price__order-num">1</span>
            <p><strong>初期構築プラン(2〜3ヶ月)</strong>で運用可能な状態を構築</p>
          </li>
          <li>
            <span class="service-ma-price__order-num">2</span>
            <p><strong>月額運用伴走プラン</strong>で継続的に改善・最適化</p>
          </li>
          <li>
            <span class="service-ma-price__order-num">3</span>
            <p>必要に応じて<strong>メルマガ制作代行</strong>を併用</p>
          </li>
        </ol>
        <p class="service-ma-price__order-note">
          初期構築のみのご依頼、月額運用伴走のみのご依頼など、ご状況に応じて柔軟に対応します。
        </p>
      </div>

      <!-- ③ 価格哲学 -->
      <div class="service-ma-price__philosophy">
        <h3 class="service-ma-price__philosophy-heading">適正価格で、本気の設計を</h3>

        <ul class="service-ma-price__philosophy-list">

          <li class="service-ma-price__philosophy-card">
            <h4 class="service-ma-price__philosophy-title">設計に時間をかけるから価格に反映されている</h4>
            <p class="service-ma-price__philosophy-text">
              表面的なテンプレート設定ではなく、貴社の営業構造を深く整理する時間にコストを投じています。
            </p>
          </li>

          <li class="service-ma-price__philosophy-card">
            <h4 class="service-ma-price__philosophy-title">自走支援前提だから過剰投資が不要</h4>
            <p class="service-ma-price__philosophy-text">
              ベンダー依存型の長期固定契約ではなく、貴社の自走を前提とした設計のため、将来的に費用を抑えていける構造になっています。
            </p>
          </li>

          <li class="service-ma-price__philosophy-card">
            <h4 class="service-ma-price__philosophy-title">2名体制による直接運営</h4>
            <p class="service-ma-price__philosophy-text">
              代表が直接プロジェクトに関わり、多重下請け構造を排除。コミュニケーションコストと中間マージンを抑えています。
            </p>
          </li>

        </ul>
      </div>

    </div>
  </div>
</section>

<?php
// works CPT のクエリ(0件なら WORKS セクションは非表示)
$ma_works_query = new WP_Query([
  'post_type'      => 'works',
  'posts_per_page' => 6,
  'post_status'    => 'publish',
  'orderby'        => 'date',
  'order'          => 'DESC',
]);
?>

<?php if ( $ma_works_query->have_posts() ) : ?>
<!-- ===================================================== -->
<!-- [9] WORKS(works CPT 最新6件・0件時非表示)              -->
<!-- ===================================================== -->
<section class="service-ma-works">
  <div class="container">
    <div class="service-ma-works__inner">

      <div class="service-ma-works__head works-header">
        <p class="en">WORKS</p>
        <h2>支援実績</h2>
        <p class="subtitle">業種・規模を問わず、BtoB中小企業を中心にMA構築・運用をご支援しています。</p>
      </div>

      <ul class="service-ma-works__grid">
        <?php while ( $ma_works_query->have_posts() ) : $ma_works_query->the_post(); ?>
          <li class="service-ma-works__card">
            <a href="<?php the_permalink(); ?>" class="service-ma-works__card-link">
              <div class="service-ma-works__card-thumb">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'large' ); ?>
                <?php else : ?>
                  <img src="<?php echo esc_url( get_template_directory_uri() . '/img/about-strength01.jpg' ); ?>" alt="">
                <?php endif; ?>
              </div>
              <div class="service-ma-works__card-body">
                <p class="service-ma-works__card-title"><?php the_title(); ?></p>
                <?php
                $terms = get_the_terms( get_the_ID(), 'works' );
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                  $first_term = reset( $terms );
                ?>
                  <span class="service-ma-works__card-tag"><?php echo esc_html( $first_term->name ); ?></span>
                <?php endif; ?>
                <span class="service-ma-works__card-cta">詳しく見る →</span>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>

      <p class="service-ma-works__more">
        <a class="service-ma-works__more-link" href="<?php echo esc_url( home_url('/works/') ); ?>">
          すべての制作実績を見る →
        </a>
      </p>

    </div>
  </div>
</section>
<?php
  wp_reset_postdata();
endif;
?>

<!-- ===================================================== -->
<!-- [10] FAQ                                                 -->
<!-- ===================================================== -->
<section class="service-ma-faq">
  <div class="container">
    <div class="service-ma-faq__inner">

      <div class="service-ma-faq__head faq-header">
        <p class="en">FAQ</p>
        <h2>よくあるご質問</h2>
        <p class="subtitle">お問い合わせ前によくいただく質問をまとめました。</p>
      </div>

      <div class="accordion service-ma-faq__list">
        <ul>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">MAツールは何を使いますか? 既に導入済みのツールでも大丈夫ですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">特定ツールへの依存なく、HubSpot・Marketo・SATORI・Pardot・Account Engagement など、お使いのツール、または貴社の状況に合わせて最適なツールでご支援可能です。すでに導入済みのツールがあれば、そのまま活用します。ツール未導入の場合は、貴社の規模・予算・運用体制に応じてご提案します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">自社にWebサイトがほとんどないのですが、MAを導入できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">正直に申し上げると、Web基盤がほとんどない状態でのMA導入は推奨していません。MAは「育てるべき見込み客の流れ」がまだ生まれていない状態では機能しないためです。まずWebサイト制作またはウィルサポでWeb基盤を整え、コンテンツや問い合わせ動線が動き始めた段階でMAをご検討いただくのが、費用対効果の面でも合理的です。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">メルマガ配信はもう何度か実施しているのですが、効果が出ていません。何が問題ですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">よくあるのは「配信タイミング・配信内容・対象セグメントが噛み合っていない」ケースです。誰に・何を・どのタイミングで届けるかを設計し直すことで、同じリストでも開封率・クリック率・商談化率が改善することが多いです。まずは現在の配信状況をお伺いし、改善ポイントを整理する初回ヒアリング(無料)からご利用ください。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">構築から運用開始までどれくらいかかりますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">初期構築プランで2〜3ヶ月が目安です。営業構造整理・育成シナリオ設計・コンテンツ制作・ツール設定までを順に進めるため、このくらいの期間が必要になります。コンテンツ素材が一部すでにある場合は短縮可能です。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">公開・配信後どれくらいで成果が出ますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <div class="text">
                  <p>MAの成果は、配信を開始してすぐに現れるものではありません。シナリオに乗せた見込み客が検討フェーズを進む期間が必要なため、3〜6ヶ月のスパンで開封率・クリック率・商談化率の改善が現れ始めるケースが多くあります。</p>
                  <p>「公開後◯ヶ月で◯件商談化」という約束はいたしかねますが、現状のリスト数・接点数を踏まえて現実的な見通しをお伝えします。</p>
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">MA運用を社内で内製化したいのですが、その支援もできますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、ウィルの伴走型支援は「自走できる体制づくり」を最初から想定しています。原稿添削・改善提案・定例MTGを通じて、運用の考え方そのものを共有します。段階的に内製化を進めるロードマップもご提案可能です。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">既存のCRM(Salesforce等)との連携はできますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。Salesforce・HubSpot CRM・kintoneなど、主要なCRMとの連携を含めて設計します。連携要件によっては別途お見積もりが発生する場合があります。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">コンテンツ(ホワイトペーパー・メール文)は社内で書く必要がありますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">両方対応可能です。社内で原稿を書く場合は、構成案の作成・原稿添削・件名設計をウィルが担当します。ウィル代行で原稿制作まで含める場合は、メルマガ制作代行プランをご利用ください。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">月額運用伴走プランは契約期間の縛りがありますか?</div>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">原則として最低3ヶ月のお取り組みをお願いしています。MAの成果は短期間では出にくいため、3ヶ月で初期設計の効果検証、6ヶ月以降で本格的な改善サイクルに入る流れが一般的です。ただしビジネス状況の変化に応じて、ご相談ください。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">Webサイト制作とMA構築を同時に依頼することは可能ですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。むしろ、同時設計のほうが効果的なケースもあります。Webサイト構成・コンテンツ・MAシナリオを一体で設計することで、点ではなく線でつながる仕組みが構築できます。ご希望の場合は、初回ヒアリングの際にお伝えください。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">月額制サービス「ウィルサポ」とMA支援は併用できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、併用可能です。ウィルサポでWeb基盤を整え、その上でMA構築・運用支援を併用することで、集客から育成・商談化までの一気通貫な仕組みを構築できます。両サービスの組み合わせをご希望の場合は、ヒアリングの際にご相談ください。</p>
              </div>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [11] CTA                                                 -->
<!-- ===================================================== -->
<section class="service-ma-cta">
  <div class="container">
    <div class="service-ma-cta__inner">

      <div class="service-ma-cta__head cta-header">
        <p class="en">CONTACT</p>
        <h2>3つの相談入口をご用意しています</h2>
        <p class="subtitle">ご検討の段階に合わせて、お気軽にお問い合わせください。</p>
      </div>

      <ul class="service-ma-cta__grid">

        <li class="service-ma-cta__card">
          <p class="service-ma-cta__label">[初期検討の方へ]</p>
          <h3 class="service-ma-cta__title">1分でできる無料診断</h3>
          <p class="service-ma-cta__desc">現在のWeb・営業基盤の課題を整理します</p>
          <a class="service-ma-cta__btn" href="<?php echo esc_url( home_url('/diagnosis/') ); ?>">診断する →</a>
        </li>

        <li class="service-ma-cta__card">
          <p class="service-ma-cta__label">[情報収集の方へ]</p>
          <h3 class="service-ma-cta__title">無料ダウンロード資料</h3>
          <p class="service-ma-cta__desc">BtoB Web集客・MA活用のお役立ち資料を配布中</p>
          <a class="service-ma-cta__btn" href="<?php echo esc_url( home_url('/ebooks/') ); ?>">資料を見る →</a>
        </li>

        <li class="service-ma-cta__card">
          <p class="service-ma-cta__label">[具体的な相談の方へ]</p>
          <h3 class="service-ma-cta__title">お問い合わせ・お見積もり</h3>
          <p class="service-ma-cta__desc">具体的なご相談・お見積もりはこちら</p>
          <a class="service-ma-cta__btn" href="<?php echo esc_url( get_page_link(15) ); ?>">問い合わせる →</a>
        </li>

      </ul>

    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
