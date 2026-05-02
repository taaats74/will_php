<?php
/**
 * Template Name: Service - Instagram構築・運用支援
 * Template Post Type: page
 *
 * Instagram構築・運用支援サービスページ(11セクション構成)
 * 中心メッセージ:Instagramは、フォロワーを集めるツールではなく、比較検討で選ばれるためのツール
 *
 * - header-v4 + footer-v3 + template-parts/page-hero
 * - トップページ(page-topv3)+ page-service-web / ma のトンマナ準拠
 *
 * @package will-corp
 */
get_header('v4');
?>

<?php
// [1] HERO(下層共通テンプレート)
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'INSTAGRAM',
  'title' => 'Instagram構築・運用支援',
  'lead'  => 'フォロワーを集めるのではなく、比較検討で選ばれるアカウントへ。',
] );
?>

<!-- ===================================================== -->
<!-- [1] HERO 補足                                            -->
<!-- ===================================================== -->
<section class="service-sns-hero">
  <div class="container">
    <div class="service-sns-hero__inner">

      <h2 class="service-sns-hero__catch">
        Instagram単体ではなく、<br class="sp">
        <span class="keyword">Webと接続した「営業基盤の入口」</span>として設計します。
      </h2>

      <p class="service-sns-hero__lead">
        BtoB中小企業の Instagram を、商談前の信頼形成と Web への導線として機能させる。<br class="pc">
        ターゲット・コンセプト・運用の仕組みまで、初期構築から伴走支援まで一貫してご提供します。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [2] CONCEPT(セントラルメッセージ)                       -->
<!-- ===================================================== -->
<section class="service-sns-concept">
  <div class="container">
    <div class="service-sns-concept__inner">

      <div class="service-sns-concept__head concept-header">
        <p class="en">CONCEPT</p>
        <h2>コンセプト</h2>
        <p class="subtitle">Instagramの本当の役割を、私たちはこう考えています。</p>
      </div>

      <h3 class="service-sns-concept__headline">
        Instagramは、フォロワーを集めるツールではなく、<br>
        <span class="keyword">比較検討で選ばれるためのツール</span>です。
      </h3>

      <div class="service-sns-concept__body">
        <p>
          発信を「作業」で終わらせず、Webと接続し、商談前の信頼を積み上げる装置として設計します。
        </p>
        <p>
          ターゲットを定義し、構成を設計し、運用を仕組み化することで、
          Instagramは<span class="keyword">「投稿しているアカウント」から「比較検討時に選ばれるアカウント」</span>へと変わります。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [3] PROBLEM(3カテゴリ・チェックリスト)                  -->
<!-- ===================================================== -->
<section class="service-sns-problem">
  <div class="container">
    <div class="service-sns-problem__inner">

      <div class="service-sns-problem__head problem-header">
        <p class="en">PROBLEM</p>
        <h2>こんな企業様向けのサービスです</h2>
        <p class="subtitle">BtoB中小企業のInstagram運用で、よくいただくご相談を3つの観点で整理しました。</p>
      </div>

      <ul class="service-sns-problem__list">

        <li class="service-sns-problem__category">
          <h3 class="service-sns-problem__category-title">発信・運用の課題</h3>
          <ul class="service-sns-problem__check-list">
            <li>Instagramを始めたものの、営業や受注とどうつなげればいいか分からない</li>
            <li>投稿はしているが、問い合わせや商談に結びついていない</li>
            <li>発信の方向性が定まらず、ブランドの印象が統一されていない</li>
          </ul>
        </li>

        <li class="service-sns-problem__category">
          <h3 class="service-sns-problem__category-title">Web連動・導線の課題</h3>
          <ul class="service-sns-problem__check-list">
            <li>Webサイトとの連動がなく、Instagramが孤立している</li>
            <li>投稿からWebへの導線が設計されておらず、商談につながらない</li>
            <li>フォロワーは増えても、サイト訪問・資料請求にまで至らない</li>
          </ul>
        </li>

        <li class="service-sns-problem__category">
          <h3 class="service-sns-problem__category-title">体制・内製化の課題</h3>
          <ul class="service-sns-problem__check-list">
            <li>社内にInstagram担当はいるが、戦略設計ができていない</li>
            <li>将来的には内製化したいが、最初の「型」が作れていない</li>
            <li>外注に丸投げしてもノウハウが社内に残らず、依存が続いている</li>
          </ul>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [4] ROLE(Instagramの本当の役割・3層構造)                -->
<!-- ===================================================== -->
<section class="service-sns-role">
  <div class="container">
    <div class="service-sns-role__inner">

      <div class="service-sns-role__head role-header">
        <p class="en">ROLE</p>
        <h2>Instagramの本当の役割</h2>
        <p class="subtitle">全体構造の中での「位置づけ」を明確にすることが、成果への第一歩です。</p>
      </div>

      <p class="service-sns-role__lead">
        Instagramだけで商談を生み出すことは、現実的ではありません。<br>
        見込み客との接点をつくり、信頼を積み上げ、最終的にWebサイト・問い合わせへとつなぐ。<br>
        全体構造の中での<span class="keyword">「位置づけ」を明確にすること</span>が、成果への第一歩です。
      </p>

      <ol class="service-sns-role__layers">

        <li class="service-sns-role__layer">
          <p class="service-sns-role__layer-num">01</p>
          <h3 class="service-sns-role__layer-title">認知(接点創出)</h3>
          <p class="service-sns-role__layer-text">
            コンテンツSEO・SNS・広告・展示会・営業活動などで、見込み客との<span class="keyword">「最初の接点」</span>を作る役割。Instagramもこの層に位置づけられます。
          </p>
        </li>

        <li class="service-sns-role__layer">
          <p class="service-sns-role__layer-num">02</p>
          <h3 class="service-sns-role__layer-title">比較検討の受け皿</h3>
          <p class="service-sns-role__layer-text">
            Webサイト・サービスページ・LP。接点を持った見込み客が<span class="keyword">「選ぶための材料」</span>を集める場所。
          </p>
        </li>

        <li class="service-sns-role__layer">
          <p class="service-sns-role__layer-num">03</p>
          <h3 class="service-sns-role__layer-title">意思決定の後押し</h3>
          <p class="service-sns-role__layer-text">
            無料相談・資料請求・問い合わせフォーム。<span class="keyword">検討フェーズの最後を後押し</span>する装置。
          </p>
        </li>

      </ol>

      <p class="service-sns-role__closing">
        InstagramからWebへ、Webから商談へ。<br>
        <span class="keyword">点ではなく線として設計する</span>から、発信が成果に結びつきます。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [5] FEATURE(4つの特徴・ベネフィット型訴求)              -->
<!-- ===================================================== -->
<section class="service-sns-feature">
  <div class="container">
    <div class="service-sns-feature__inner">

      <div class="service-sns-feature__head feature-header">
        <p class="en">FEATURE</p>
        <h2>Instagram構築・運用支援の特徴</h2>
        <p class="subtitle">数あるInstagram支援サービスの中で、ウィルが選ばれる4つの特徴をお伝えします。</p>
      </div>

      <ul class="service-sns-feature__list">

        <li class="service-sns-feature__item">
          <p class="service-sns-feature__num">01</p>
          <h3 class="service-sns-feature__title">営業構造から逆算したInstagram設計</h3>
          <div class="service-sns-feature__approach">
            <p>
              Instagramを「集客ツール」としてではなく、「認知 → 興味関心 → 比較検討 → 商談」のどの役割を担うのかを明確にした上で設計します。
              発信内容・導線・KPIを営業プロセスと連動させることで、投稿が「作業」ではなく「商談前の信頼形成」として機能します。
            </p>
          </div>
          <div class="service-sns-feature__benefit">
            <p>
              <span class="service-sns-feature__benefit-arrow">→</span>
              <span class="keyword">「投稿のための投稿」から脱却し、商談前の信頼を積み上げる仕組み</span>に変わる
            </p>
          </div>
        </li>

        <li class="service-sns-feature__item">
          <p class="service-sns-feature__num">02</p>
          <h3 class="service-sns-feature__title">Web基盤と一体で設計</h3>
          <div class="service-sns-feature__approach">
            <p>
              Instagram単体で完結させません。
              ブログ、ホワイトペーパー、資料請求ページなどと接続し、InstagramからWebへ、Webから商談へとつながる導線を設計します。
              投稿が「入口」となり、全体の仕組みに組み込まれる状態をつくります。
            </p>
          </div>
          <div class="service-sns-feature__benefit">
            <p>
              <span class="service-sns-feature__benefit-arrow">→</span>
              Instagramが孤立した発信から脱却し、<span class="keyword">サイトと連動した「入口」として機能</span>する
            </p>
          </div>
        </li>

        <li class="service-sns-feature__item">
          <p class="service-sns-feature__num">03</p>
          <h3 class="service-sns-feature__title">ブランドと印象を設計するデザイン</h3>
          <div class="service-sns-feature__approach">
            <p>
              ターゲット業界や企業規模に合わせたトンマナ設計を行い、投稿テンプレートやプロフィールを最適化します。
              Instagramは視覚的印象が信頼に直結します。
              一貫した世界観を構築することで、ブランド価値を高めます。
            </p>
          </div>
          <div class="service-sns-feature__benefit">
            <p>
              <span class="service-sns-feature__benefit-arrow">→</span>
              投稿ごとの印象がブレなくなり、<span class="keyword">視覚的な信頼が積み上がる</span>
            </p>
          </div>
        </li>

        <li class="service-sns-feature__item">
          <p class="service-sns-feature__num">04</p>
          <h3 class="service-sns-feature__title">伴走型で社内にノウハウを蓄積</h3>
          <div class="service-sns-feature__approach">
            <p>
              完全丸投げ型ではなく、共同制作を前提とした伴走型支援を行います。
              戦略MTG・構成支援・改善提案を通じて、最終的には社内でInstagramを自走できる体制づくりを目指します。
            </p>
          </div>
          <div class="service-sns-feature__benefit">
            <p>
              <span class="service-sns-feature__benefit-arrow">→</span>
              外注依存から脱却し、<span class="keyword">社内でInstagramを自走できる状態</span>が手に入る
            </p>
          </div>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [6] PRICE(2プラン)                                     -->
<!-- ===================================================== -->
<section class="service-sns-price">
  <div class="container">
    <div class="service-sns-price__inner">

      <div class="service-sns-price__head price-header">
        <p class="en">PRICE</p>
        <h2>料金プラン</h2>
        <p class="subtitle">下記の料金は参考価格です。詳細なお見積もりはヒアリング後にご提示いたします。</p>
      </div>

      <p class="service-sns-price__lead">
        内容や体制に応じて最適な構成をご提案します。
      </p>

      <div class="service-sns-price__plans">
        <h3 class="service-sns-price__plans-heading">Instagram構築・運用支援</h3>

        <div class="service-sns-price__plans-grid">

          <div class="service-sns-price__plan-card">
            <p class="service-sns-price__plan-num">01</p>
            <p class="service-sns-price__plan-name">初期構築プラン</p>
            <p class="service-sns-price__plan-desc">
              SNSの役割定義、ターゲット設計、投稿コンセプト設計、コンテンツカテゴリ設計、トンマナ設計、投稿テンプレ制作、プロフィール最適化、Web接続導線設計、KPI設計、運用マニュアル作成までを実施し、SNS運用の「刺さる型」を構築します。
            </p>
            <p class="service-sns-price__plan-price">300,000円<span class="service-sns-price__plan-tax"> / 回</span></p>
          </div>

          <div class="service-sns-price__plan-card">
            <p class="service-sns-price__plan-num">02</p>
            <p class="service-sns-price__plan-name">月額運用伴走プラン</p>
            <p class="service-sns-price__plan-desc">
              月1回の戦略MTGを軸に、投稿企画設計、投稿作成支援10件(構成 / テキスト / 台本作成)、数値分析、Web接続導線改善、導線最適化提案までを実施します。
              運用を積み上げながら、共同制作へ段階的に移行します。
            </p>
            <p class="service-sns-price__plan-price">350,000円〜<span class="service-sns-price__plan-tax"> / 月</span></p>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [7] PRINCIPLE(私たちが大切にしている3つのこと)          -->
<!-- ===================================================== -->
<section class="service-sns-principle">
  <div class="container">
    <div class="service-sns-principle__inner">

      <div class="service-sns-principle__head principle-header">
        <p class="en">PRINCIPLE</p>
        <h2>私たちが大切にしている<br class="sp">3つのこと</h2>
        <p class="subtitle">「安いから簡易的」ではなく、「無駄をなくしたから、必要な部分に集中できる」サービス設計の根拠をお伝えします。</p>
      </div>

      <p class="service-sns-principle__lead">
        ウィルがこのサービス設計を貫く理由を3つご説明します。
      </p>

      <ul class="service-sns-principle__list">

        <li class="service-sns-principle__item">
          <p class="service-sns-principle__num">01</p>
          <h3 class="service-sns-principle__title">BtoB中小企業に特化した型化</h3>
          <p class="service-sns-principle__text">
            業種・規模にあわせた支援フローを標準化することで、<span class="keyword">「刺さる型」を最短で構築できる体制</span>をつくっています。
            50社以上のBtoB中小企業を支援してきた経験から、共通する成功パターンを型として持っているため、ゼロから設計するのではなく、貴社の状況にあわせて最適化する形で進められます。
          </p>
        </li>

        <li class="service-sns-principle__item">
          <p class="service-sns-principle__num">02</p>
          <h3 class="service-sns-principle__title">共同制作を前提とした設計</h3>
          <p class="service-sns-principle__text">
            完全代行ではなく、社内と一緒に積み上げる伴走型。だからこそ無駄な工数を削ぎ落とし、<span class="keyword">必要な部分に集中</span>できます。
            社内のノウハウを蓄積しながら進められるため、将来的な内製化も視野に入れた、長期的な投資効果が見込めます。
          </p>
        </li>

        <li class="service-sns-principle__item">
          <p class="service-sns-principle__num">03</p>
          <h3 class="service-sns-principle__title">段階移行型のプラン構造</h3>
          <p class="service-sns-principle__text">
            初期構築で「型」を整え、月額運用伴走で改善サイクルを回し、最終的には<span class="keyword">社内で自走できる状態</span>を目指す段階移行型の設計です。
            必要な期間だけ、必要な深さで活用できるため、「使い続けるから初期投資を抑える」という長期前提のプラン構造になっています。
          </p>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [8] FLOW(支援の流れ・3ステップ)                        -->
<!-- ===================================================== -->
<section class="service-sns-flow">
  <div class="container">
    <div class="service-sns-flow__inner">

      <div class="service-sns-flow__head flow-header">
        <p class="en">FLOW</p>
        <h2>支援の流れ</h2>
        <p class="subtitle">完全代行ではなく、社内と共に積み上げていく伴走型のプロセスです。</p>
      </div>

      <p class="service-sns-flow__lead">
        初期構築から運用伴走、内製移行までを段階的に進めていきます。
      </p>

      <ol class="service-sns-flow__list">

        <li class="service-sns-flow__step">
          <p class="service-sns-flow__step-num">Step 1</p>
          <p class="service-sns-flow__step-period">1〜2ヶ月</p>
          <h3 class="service-sns-flow__step-title">初期構築</h3>
          <p class="service-sns-flow__step-sub">「刺さる型」を構築するフェーズ</p>
          <ul class="service-sns-flow__step-list">
            <li>SNSの役割定義(認知 / 興味関心 / 比較検討のどこを担うか)</li>
            <li>ターゲット設計(誰に届けたいかの言語化)</li>
            <li>投稿コンセプト・カテゴリ設計</li>
            <li>トンマナ・投稿テンプレート制作</li>
            <li>プロフィール最適化・Web接続導線設計</li>
            <li>KPI設計・運用マニュアル作成</li>
          </ul>
        </li>

        <li class="service-sns-flow__step">
          <p class="service-sns-flow__step-num">Step 2</p>
          <p class="service-sns-flow__step-period">月次</p>
          <h3 class="service-sns-flow__step-title">運用伴走</h3>
          <p class="service-sns-flow__step-sub">「型」を回しながら改善するフェーズ</p>
          <ul class="service-sns-flow__step-list">
            <li>月1回の戦略MTG</li>
            <li>投稿企画支援10件(構成 / テキスト / 台本)</li>
            <li>数値分析・改善提案</li>
            <li>Web接続導線の改善</li>
            <li>必要に応じてテンプレ・プロフィールの調整</li>
          </ul>
        </li>

        <li class="service-sns-flow__step">
          <p class="service-sns-flow__step-num">Step 3</p>
          <h3 class="service-sns-flow__step-title">内製移行</h3>
          <p class="service-sns-flow__step-sub">社内体制への段階的な引き継ぎ</p>
          <p class="service-sns-flow__step-text">
            伴走を続ける中で蓄積されたノウハウをもとに、<span class="keyword">社内でInstagram運用を自走できる状態</span>を目指します。
            必要に応じて部分的な伴走に移行することも可能です。
          </p>
        </li>

      </ol>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [9] FAQ(14問・既存 .accordion + js/accordion.js 流用)   -->
<!-- ===================================================== -->
<section class="service-sns-faq">
  <div class="container">
    <div class="service-sns-faq__inner">

      <div class="service-sns-faq__head faq-header">
        <p class="en">FAQ</p>
        <h2>よくあるご質問</h2>
        <p class="subtitle">お問い合わせ前によくいただく質問をまとめました。</p>
      </div>

      <div class="accordion service-sns-faq__list">
        <ul>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">何ヶ月で何件の商談につながりますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">Instagramは「比較検討時に選ばれる状態」を作るためのツールです。見込み客がアカウントに訪れるための認知施策(SEO・展示会・広告・営業活動など)と、発信での信頼形成が揃ってはじめて、成果が生まれます。そのため「公開後◯ヶ月で商談◯件」という約束はいたしかねますが、6ヶ月〜1年のスパンで成果が現れ始めるケースが多くあります。現状の集客施策の状況もお伺いしたうえで、現実的な見通しをお伝えします。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">なぜInstagramに特化しているのですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">本サービスはInstagram運用に特化しています。BtoB企業においても、視覚的な印象設計やブランド構築、経営者の思想発信との相性が良く、商談前の信頼形成に有効だからです。フォロワー数を追うのではなく、Webや資料請求導線と接続しながら「商談につながる接点」として設計します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">成果が出るまでどのくらいかかりますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">業種や体制により異なりますが、設計→検証→改善のサイクルを回すため、最低でも6ヶ月程度を目安とする企業様が多いです。SNSは短期施策ではなく、信頼を積み上げる仕組みです。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">投稿内容はすべて代行してもらえますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">初期段階では構成・原稿作成支援を行いますが、最終的には社内で制作できる体制づくりを目指します。完全丸投げ型ではなく、伴走型で支援します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">フォロワー数は増えますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">フォロワー数のみを目的にはしていません。商談につながるターゲットとの接点づくりを重視しています。結果としてフォロワーが増えるケースはありますが、数よりも質を優先します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">Webサイトが整っていなくても依頼できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。ただし、SNSはWebと接続して初めて効果を発揮します。必要に応じてWeb導線の改善提案も行います。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">契約期間の縛りはありますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">改善サイクルを回すため、6ヶ月以上のご契約を推奨しています。ただし、プロジェクト型や期間限定施策などは個別にご相談可能です。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">BtoBでもInstagramは効果がありますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">検討期間が長いBtoBほど、商談前の信頼形成が重要です。Instagramはその「接点強化」として非常に有効です。営業構造に組み込むことで効果を発揮します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">自社でどの程度の工数が必要ですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">月1回のMTG参加と情報共有のご協力をお願いしています。共同制作を前提とするため、社内理解が深まり、長期的に自走できる体制が構築されます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">投稿作成支援10件には何が含まれますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">投稿の企画案、構成、テキスト(キャプション)案、台本(リール想定)などを支援します。最終的な投稿作業(アプリでの投稿)や撮影素材の準備は、社内体制に合わせて役割分担します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">投稿テンプレ制作とは具体的に何を作りますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">フィード投稿やストーリーズ、リールの表紙などを想定し、トンマナに合わせたデザインテンプレートを制作します。誰が作ってもブランドの印象が崩れないように「型」を整えます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">広告運用(Instagram広告)も対応していますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">広告運用の有無は目的と体制によりご提案します。まずはオーガニック運用で「刺さる型」と導線を整えた上で、必要に応じて広告活用を検討する進め方が一般的です。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">アカウントのログイン情報を共有する必要はありますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">運用の進め方によります。共同制作を基本としているため、投稿自体は社内で行っていただくケースも多いです。必要な場合のみ、権限の範囲を決めて安全な方法で運用します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">写真や動画などの素材がほとんどないのですが、進められますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。業種や商材に合わせて、必要な素材の種類と優先順位を整理します。まずは「最低限の素材で回る型」を作り、必要に応じて撮影・素材整備を段階的に進めます。</p>
              </div>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [10] CTA(page-service-web 準拠の 2 並列カード)            -->
<!-- ===================================================== -->
<section class="service-sns-cta">
  <div class="container">
    <div class="service-sns-cta__inner">

      <div class="service-sns-cta__head cta-header">
        <p class="en">CONTACT</p>
        <h2>お問い合わせ</h2>
        <p class="subtitle">Instagram運用について、まずは現状を整理するところから始めませんか。</p>
      </div>

      <p class="service-sns-cta__lead">
        ヒアリングを通じて、貴社にとっての<span class="keyword">「最優先すべき一手」</span>を一緒に考えます。
      </p>

      <ul class="service-sns-cta__grid">

        <li class="service-sns-cta__card">
          <a class="service-sns-cta__card-link" href="<?php echo esc_url( home_url('/ebook/') ); ?>">
            <p class="service-sns-cta__label">まずは資料で確認したい方へ</p>
            <p class="service-sns-cta__desc">Instagram運用の全体像とサービス詳細をまとめた資料をお送りします</p>
            <p class="service-sns-cta__action">
              <span class="service-sns-cta__action-text"><span class="keyword">資料を請求する</span></span>
              <span class="service-sns-cta__action-arrow">→</span>
            </p>
          </a>
        </li>

        <li class="service-sns-cta__card">
          <a class="service-sns-cta__card-link" href="<?php echo esc_url( home_url('/contact/') ); ?>">
            <p class="service-sns-cta__label">具体的に相談したい方へ</p>
            <p class="service-sns-cta__desc">個別相談で、貴社の課題と次の一手を整理します(60分・無料)</p>
            <p class="service-sns-cta__action">
              <span class="service-sns-cta__action-text"><span class="keyword">無料相談を申し込む</span></span>
              <span class="service-sns-cta__action-arrow">→</span>
            </p>
          </a>
        </li>

      </ul>

    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
