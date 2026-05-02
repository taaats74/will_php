<?php
/**
 * Template Name: About v2
 * Template Post Type: page
 *
 * About ページ v2:7セクション構成
 *   1. Hero(template-parts/page-hero)
 *   2. MISSION(.mission・既存スタイル流用)
 *   3. CONCEPT(.about-concept・新規 BEM)
 *   4. WHAT WE SOLVE(.about-solve・新規 BEM)
 *   5. STRENGTH(.about-strength・新規 BEM・縦並び3カード)
 *   6. MESSAGE(.message・既存スタイル流用)
 *   7. COMPANY(.company・既存スタイル流用)
 *
 * 対応SCSS: scss/style-template/_page-about-v2.scss(新規セクションのみ)
 *           scss/style-template/_page-about.scss(.mission / .message / .company を流用)
 *
 * @package will-corp
 */
get_header('v4');
?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'ABOUT',
  'title' => 'ウィルについて',
  'lead'  => '福岡から、BtoB中小企業の営業基盤を、Webから設計する。',
] );
?>

<!-- ===================================================== -->
<!-- [2] MISSION                                             -->
<!-- ===================================================== -->
<section class="mission">
  <div class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">m</span>ission</h2>
      <p class="sub-title">ミッション</p>
      <div class="border"></div>
      <h3 class="mission-statement">あなたの価値をあなた以上に理解し、広める。</h3>
      <p class="content">
        ウィルのミッションは、事業の価値をクライアント以上に理解して広めることです。
        特に地方の中小企業のサポートを得意とし、企業とともに成長しながら、
        地域の活性化に貢献します。地方企業の独自性を最大限に引き出し、
        ウェブマーケティングを通じて、地域社会に新たな価値を生み出します。
      </p>
    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [3] CONCEPT(新規)                                       -->
<!-- ===================================================== -->
<section class="about-concept">
  <div class="container">
    <div class="about-concept__inner">

      <div class="about-concept__head">
        <h2 class="section-header"><span class="green">c</span>oncept</h2>
        <p class="sub-title">コンセプト</p>
        <div class="border"></div>
      </div>

      <h3 class="about-concept__title">
        BtoB中小企業の営業基盤を、<br>
        Webから設計する。
      </h3>

      <div class="about-concept__body">
        <p>
          紹介・展示会への依存、属人的な営業、価格競争。<br>
          BtoB中小企業の多くが抱えるこれらの課題は、<br>
          単発の施策では解決できません。
        </p>

        <p>
          私たちが向き合っているのは、Webサイトの問題ではなく、<br>
          「Webを使えていないことで起きている、経営上の損失」です。
        </p>

        <p>
          見込み客との接点をどう作り、<br>
          どう比較検討の俎上に乗せ、<br>
          どう意思決定を後押しするか。
        </p>

        <p>
          その全体設計を、Webを起点に組み立てるのが私たちの仕事です。<br>
          Webサイト・コンテンツSEO・MA・SNS・広告。<br>
          それぞれの施策を点で打つのではなく、<br>
          営業構造から逆算して、線でつなぎ、仕組みに変える。
        </p>

        <p class="about-concept__closing">
          私たちは、貴社の営業基盤そのものを、Webから設計します。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [4] WHAT WE SOLVE(新規)                                 -->
<!-- ===================================================== -->
<section class="about-solve">
  <div class="container">
    <div class="about-solve__inner">

      <div class="about-solve__head">
        <h2 class="section-header"><span class="green">w</span>hat we solve</h2>
        <p class="sub-title">解決する経営課題</p>
        <div class="border"></div>
      </div>

      <p class="about-solve__lead">
        私たちが解決するのは、Webサイトの問題ではありません。<br>
        Webを使えていないことで起きている、経営上の損失です。
      </p>

      <ul class="about-solve__list">

        <li class="about-solve__item">
          <p class="about-solve__item-num">01</p>
          <p class="about-solve__item-category">入口の課題</p>
          <p class="about-solve__item-text">
            展示会・紹介で接点を持った見込み客が、比較検討で他社に流れている。<br>
            SEO・広告で獲得したアクセスが、問い合わせにつながっていない。
          </p>
        </li>

        <li class="about-solve__item">
          <p class="about-solve__item-num">02</p>
          <p class="about-solve__item-category">構造の課題</p>
          <p class="about-solve__item-text">
            既存サイトが「会社案内」止まりで、比較検討の判断材料になっていない。<br>
            営業現場で聞かれる質問・不安が、サイト上で先回りして解消されていない。
          </p>
        </li>

        <li class="about-solve__item">
          <p class="about-solve__item-num">03</p>
          <p class="about-solve__item-category">運用の課題</p>
          <p class="about-solve__item-text">
            Web担当者が不在で、更新・改善にまで手が回らない。<br>
            施策が単発で打たれ、データとして蓄積・活用されていない。
          </p>
        </li>

      </ul>

      <p class="about-solve__closing">
        紹介依存・属人営業・価格競争。<br>
        これらの構造課題は、Webだけで解決するものではありません。<br>
        だからこそ私たちは、Webを「営業基盤の設計」として捉え直し、<br>
        認知施策・営業活動と連動した一気通貫の設計を支援します。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [5] STRENGTH(全面刷新・縦並び3カード)                  -->
<!-- ===================================================== -->
<section class="about-strength">
  <div class="container">
    <div class="about-strength__inner">

      <div class="about-strength__head">
        <h2 class="section-header"><span class="green">s</span>trength</h2>
        <p class="sub-title">ウィルの強み</p>
        <div class="border"></div>
      </div>

      <p class="about-strength__lead">私たちが大切にしている、3つの思想。</p>

      <ul class="about-strength__list">

        <li class="about-strength__item">
          <p class="about-strength__number">01</p>
          <h3 class="about-strength__title">顧客の価値を、顧客以上に理解する</h3>
          <div class="about-strength__body">
            <p>
              良い商品・良いサービスを持ちながら、その価値が伝わっていない。
              私たちが日々向き合っているBtoB中小企業の多くは、そんな状況にあります。
            </p>
            <p>
              だから私たちは、施策設計の前に、対話に時間をかけます。
              お客様自身が言語化できていない強みや独自性、
              お客様自身が気づいていない事業の本質的な価値を、
              丁寧なヒアリングを通じて掘り起こすところから始めます。
            </p>
            <p>
              何を伝えるかが見えなければ、どう伝えるかは決まりません。
              私たちの仕事は、デザインやコーディングよりも前に、
              お客様の価値を、お客様以上に深く理解することから始まります。
            </p>
          </div>
        </li>

        <li class="about-strength__item">
          <p class="about-strength__number">02</p>
          <h3 class="about-strength__title">施策を点で打たず、線で設計する</h3>
          <div class="about-strength__body">
            <p>
              Webサイト・MA・SEO・SNS・広告。
              ひとつひとつの施策は、それ単体では大きな成果を生みません。
            </p>
            <p>
              本当に必要なのは、認知・比較検討・意思決定という
              見込み客の購買プロセスに沿って、施策を線で設計すること。
              そして、施策同士を連動させ、再現性のある仕組みに変えることです。
            </p>
            <p>
              私たちは、Webを起点に営業基盤の全体像を組み立てます。
              営業構造から逆算し、点で打たれた施策を、線でつなぎ、仕組みに変える。
              それが、紹介や属人営業に頼らない、
              継続的に成果が積み上がる事業の土台になります。
            </p>
          </div>
        </li>

        <li class="about-strength__item">
          <p class="about-strength__number">03</p>
          <h3 class="about-strength__title">制作会社ではなく、事業のパートナーになる</h3>
          <div class="about-strength__body">
            <p>納品して終わり、ツールを入れて終わりにはしません。</p>
            <p>
              お客様の事業フェーズ・社内体制・予算は、会社ごとに違います。
              だから私たちは、理想論を押し付けるのではなく、
              今の状況に合った現実的な提案を行うことを大切にしています。
              小さく始めて、改善を重ねながら、少しずつ強くしていく。
            </p>
            <p>
              制作会社や外注先ではなく、事業のパートナーとして、
              長期的な関係性のなかでお客様の事業成長と並走する。
              それが、私たちが選ぶ関わり方です。
            </p>
          </div>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [6] MESSAGE                                             -->
<!-- ===================================================== -->
<section class="message">
  <div class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">a</span>bout</h2>
      <p class="sub-title">メッセージ</p>
      <div class="border"></div>
      <div class="message-container">

        <div class="message-wrapper">
          <div class="img-wrapper">
            <img decoding="async" src="<?php echo get_template_directory_uri(); ?>/img/tatsuya.jpg" alt="">
          </div>
          <div class="text-wrapper">
            <div class="name-wrapper">
              <p class="corp">合同会社ウィル</p>
              <p class="name">代表 高橋竜也</p>
            </div>
            <p class="text">アメリカの大学でマネジメントとマーケティングを学び、その後、IT企業でマーケティング部門に7年間携わりました。マーケティングから内勤営業チームのマネジメントなど、集客から販売までの実践的なビジネススキルを磨いてきました。マーケティングを通じて地方の個人や中小企業様の事業の発展をサポートし、地域経済の活性化に貢献していきたいと思います。私たちは、お客様一人ひとりのご要望に合わせた最適な集客戦略を提供することで、皆様のビジネスの成長をサポートしてまいります。</p>
          </div>
        </div>

        <div class="message-wrapper">
          <div class="img-wrapper">
            <img decoding="async" src="<?php echo get_template_directory_uri(); ?>/img/ami.jpg" alt="">
          </div>
          <div class="text-wrapper">
            <div class="name-wrapper">
              <p class="corp">合同会社ウィル</p>
              <p class="name">代表 岩田あゆみ</p>
            </div>
            <p class="text">九州大学大学院卒業後、研究職をしておりましたが、Webデザインやマーケティングに可能性を感じ、制作会社へ転職しました。その後独立し、個人事業で制作全般業務・インスタなどの集客サポートや講師業の経験を経て、集客で悩んでいる多くの方々のサポートしたいという想いから会社を設立。お客様とのスムーズなコミュニケーションを意識しながら、お客様の価値をお客様以上に理解し、広めるというミッションで貢献していきます。弊社では主にデザイン全般・SNS集客・ディレクションを担当しております。</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [7] COMPANY                                             -->
<!-- ===================================================== -->
<section class="company">
  <div class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">c</span>ompany</h2>
      <p class="sub-title">会社概要</p>
      <div class="border"></div>
      <ul>
        <li>
          <p class="table-header">会社名</p>
          <p class="table-content">合同会社ウィル</p>
        </li>
        <li>
          <p class="table-header">代表者</p>
          <p class="table-content">高橋竜也・岩田あゆみ</p>
        </li>
        <li>
          <p class="table-header">所在地</p>
          <p class="table-content">〒812-0011<br>福岡県福岡市博多区博多駅前1丁目23番2号<br>ParkFront博多駅前1丁目5F-B</p>
        </li>
        <li>
          <p class="table-header">設立</p>
          <p class="table-content">2023年11月</p>
        </li>
        <li>
          <p class="table-header">業務内容</p>
          <p class="table-content">WEBサイト制作・WEBマーケティング支援・SNS運用サポート・広告運用代行</p>
        </li>
      </ul>
    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
