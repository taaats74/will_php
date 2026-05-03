<?php
/**
 * Template Name: Service - コンテンツSEO構築・運用支援
 * Template Post Type: page
 *
 * コンテンツSEO構築・運用支援サービスページ(11セクション構成)
 * 中心メッセージ:コンテンツSEOは、Webサイトを"育てる"ための最も重要な施策
 *
 * - header + footer + template-parts/page-hero
 * - page-service-sns 構造踏襲(クラス名 sns → seo)
 * - 最終 CTA は page-service-web パターン(3 カード)を採用
 *
 * @package will-corp
 */
get_header();
?>

<?php
// [1] HERO(下層共通テンプレート)
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'CONTENTS SEO',
  'title' => 'コンテンツSEO構築・<br class="sp">運用支援',
  'lead'  => '検索とAIから選ばれるコンテンツを積み上げ、Webを"育てる資産"へ。',
] );
?>

<!-- ===================================================== -->
<!-- [1] HERO 補足                                            -->
<!-- ===================================================== -->
<section class="service-seo-hero">
  <div class="container">
    <div class="service-seo-hero__inner">

      <h2 class="service-seo-hero__catch">
        記事を増やすのではなく、<br>
        <span class="keyword">検索と商談につながるコンテンツ</span>を積み上げます。
      </h2>

      <p class="service-seo-hero__lead">
        BtoB中小企業のコンテンツSEOを、検索 → 理解 → 比較 → 行動の導線として設計。<br class="pc">
        記事を「資産」として育て、Webサイト全体の集客力と商談化率を底上げします。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [2] CONCEPT(セントラルメッセージ)                       -->
<!-- ===================================================== -->
<section class="service-seo-concept">
  <div class="container">
    <div class="service-seo-concept__inner">

      <h2 class="service-seo-concept__headline">
        コンテンツSEOは、<br class="sp"><span class="keyword">Webサイトを"育てる"</span><br class="sp">ための<br class="pc">
        最も重要な施策です。
      </h2>

      <div class="service-seo-concept__body">
        <p>
          リード獲得も、温度感の高い商談獲得も、Webサイトの集客力も。<br>検索とAIから選ばれるコンテンツを積み上げることで、
          Webは<span class="keyword">"営業を支える資産"</span>へと変わります。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [3] PROBLEM(3カテゴリ・チェックリスト)                  -->
<!-- ===================================================== -->
<section class="service-seo-problem">
  <div class="container">
    <div class="service-seo-problem__inner">

      <div class="service-seo-problem__head problem-header">
        <p class="en">PROBLEM</p>
        <h2>コンテンツSEOの<br class="sp">よくある課題</h2>
        <p class="subtitle">BtoB中小企業のコンテンツSEOで、よくいただくご相談を3つの観点で整理しました。</p>
      </div>

      <ul class="service-seo-problem__list">

        <li class="service-seo-problem__category">
          <h3 class="service-seo-problem__category-title">設計・戦略の課題</h3>
          <ul class="service-seo-problem__check-list">
            <li>記事は増えているのに、リードや商談につながらない</li>
            <li>キーワード選定が感覚的で、狙うべき検索意図が整理できていない</li>
            <li>検索順位やアクセス数ばかり追ってしまい、成果の評価軸が定まらない</li>
          </ul>
        </li>

        <li class="service-seo-problem__category">
          <h3 class="service-seo-problem__category-title">導線・連動の課題</h3>
          <ul class="service-seo-problem__check-list">
            <li>サービスページや資料請求ページにつながる導線がなく、記事が孤立している</li>
            <li>記事から商談へつながる動線が設計されていない</li>
            <li>内部リンクや回遊設計が後回しになっている</li>
          </ul>
        </li>

        <li class="service-seo-problem__category">
          <h3 class="service-seo-problem__category-title">運用・体制の課題</h3>
          <ul class="service-seo-problem__check-list">
            <li>書く人によって品質がばらつき、社内に運用ノウハウが蓄積しない</li>
            <li>リライトや内部リンクなど、改善の優先順位が分からず止まっている</li>
            <li>外注に丸投げしてもノウハウが社内に残らず、依存が続いている</li>
          </ul>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [4] ROLE(コンテンツSEOの本当の役割・3層構造)            -->
<!-- ===================================================== -->
<section class="service-seo-role">
  <div class="container">
    <div class="service-seo-role__inner">

      <div class="service-seo-role__head role-header">
        <p class="en">ROLE</p>
        <h2>コンテンツSEOの<br class="sp">本当の役割</h2>
        <p class="subtitle">検索やAIから選ばれるコンテンツを積み上げ、Webサイトを資産として育てる起点です。</p>
      </div>

      <p class="service-seo-role__lead">
        コンテンツSEOは、Webサイトを<span class="keyword">"育てる"起点</span>となる施策です。<br>
        検索やAIから選ばれるコンテンツを積み上げることで、Webサイトはアクセスを集める力を持ち、<br>
        リード獲得・商談獲得を支える基盤へと変わります。
      </p>

      <ol class="service-seo-role__layers">

        <li class="service-seo-role__layer">
          <p class="service-seo-role__layer-num">01</p>
          <h3 class="service-seo-role__layer-title">検索とAIからの接点をつくる</h3>
          <p class="service-seo-role__layer-text">
            コンテンツSEOは、検索エンジンとAI検索の両方から<span class="keyword">"見つけられる"接点</span>をつくる役割を担います。
            最近はAI検索を使う人が増え、AIはWeb上の情報を拾って回答を生成するため、発信を積み上げることが、これまで以上に重要になっています。
          </p>
        </li>

        <li class="service-seo-role__layer">
          <p class="service-seo-role__layer-num">02</p>
          <h3 class="service-seo-role__layer-title">Webサイトを資産として育てる</h3>
          <p class="service-seo-role__layer-text">
            書いた記事は消えずに残り、検索順位を獲得するほど安定して流入を生み続けます。
            広告のように費用をかけ続ける必要がなく、時間とともに<span class="keyword">"積み上がる資産"</span>としてWebサイトを強くしていきます。
          </p>
        </li>

        <li class="service-seo-role__layer">
          <p class="service-seo-role__layer-num">03</p>
          <h3 class="service-seo-role__layer-title">リード獲得と商談化を支える</h3>
          <p class="service-seo-role__layer-text">
            検索からたどり着いた見込み客は、すでに自社の課題を言語化している層です。
            記事 → サービスページ → 資料請求・問い合わせへの導線を設計することで、<span class="keyword">温度感の高い商談</span>につながりやすくなります。
          </p>
        </li>

      </ol>

      <p class="service-seo-role__closing">
        検索からWebへ、Webから商談へ。<br>
        記事が<span class="keyword">"資産"として積み上がる</span>から、書くほどWebサイトが強くなります。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [5] FEATURE(4特徴・ベネフィット型訴求・2x2 grid)         -->
<!-- ===================================================== -->
<section class="service-seo-feature">
  <div class="container">
    <div class="service-seo-feature__inner">

      <div class="service-seo-feature__head feature-header">
        <p class="en">FEATURE</p>
        <h2>コンテンツSEO構築・<br class="sp">運用支援の特徴</h2>
        <p class="subtitle">数あるコンテンツSEO支援サービスの中で、ウィルが選ばれる4つの特徴をお伝えします。</p>
      </div>

      <ul class="service-seo-feature__list">

        <li class="service-seo-feature__item">
          <p class="service-seo-feature__num">01</p>
          <h3 class="service-seo-feature__title">営業構造から逆算した検索設計</h3>
          <div class="service-seo-feature__approach">
            <p>
              記事を増やすことが目的ではありません。
              「認知 → 興味関心 → 比較検討 → 商談」の流れを整理し、どの検索意図のユーザーを獲得すべきかを設計します。
              流入数ではなく「商談につながる検索」を軸に構築します。
            </p>
          </div>
          <div class="service-seo-feature__benefit">
            <p>
              <span class="service-seo-feature__benefit-arrow">→</span>
              流入数だけでは見えなかった<span class="keyword">「商談につながる検索」が可視化</span>される
            </p>
          </div>
        </li>

        <li class="service-seo-feature__item">
          <p class="service-seo-feature__num">02</p>
          <h3 class="service-seo-feature__title">Web基盤と一体で導線を設計</h3>
          <div class="service-seo-feature__approach">
            <p>
              記事単体では成果は出ません。
              サービスページ、資料請求、事例ページなどと接続し、「読む → 理解する → 比較する → 行動する」導線を設計します。
              SEOをWeb全体の構造に組み込みます。
            </p>
          </div>
          <div class="service-seo-feature__benefit">
            <p>
              <span class="service-seo-feature__benefit-arrow">→</span>
              記事が孤立した発信から脱却し、<span class="keyword">商談へとつながる経路として機能</span>する
            </p>
          </div>
        </li>

        <li class="service-seo-feature__item">
          <p class="service-seo-feature__num">03</p>
          <h3 class="service-seo-feature__title">ターゲットに刺さる構成設計</h3>
          <div class="service-seo-feature__approach">
            <p>
              BtoBでは信頼が最重要です。
              読了率・理解度・信頼感を高める構成設計を行い、単なる情報記事ではなく「検討を前に進める記事」を設計します。
            </p>
          </div>
          <div class="service-seo-feature__benefit">
            <p>
              <span class="service-seo-feature__benefit-arrow">→</span>
              単なる「読まれる記事」から脱却し、<span class="keyword">検討を前に進める記事</span>に変わる
            </p>
          </div>
        </li>

        <li class="service-seo-feature__item">
          <p class="service-seo-feature__num">04</p>
          <h3 class="service-seo-feature__title">改善前提で資産化する運用</h3>
          <div class="service-seo-feature__approach">
            <p>
              公開して終わりではありません。
              検索順位、回遊、CTAクリック、問い合わせまでを分析し、リライト・内部リンク最適化を継続的に実施します。
              積み上がる資産として育てます。
            </p>
          </div>
          <div class="service-seo-feature__benefit">
            <p>
              <span class="service-seo-feature__benefit-arrow">→</span>
              書きっぱなしの記事から脱却し、<span class="keyword">リードを生み続けるWeb資産として育つ</span>
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
<section class="service-seo-price">
  <div class="container">
    <div class="service-seo-price__inner">

      <div class="service-seo-price__head price-header">
        <p class="en">PRICE</p>
        <h2>料金プラン</h2>
        <p class="subtitle">下記の料金は参考価格です。詳細なお見積もりはヒアリング後にご提示いたします。</p>
      </div>

      <p class="service-seo-price__lead">
        目的や営業体制に応じて最適な設計をご提案します。
      </p>

      <div class="service-seo-price__plans">
        <h3 class="service-seo-price__plans-heading">コンテンツSEO構築・運用支援</h3>

        <div class="service-seo-price__plans-grid">

          <div class="service-seo-price__plan-card">
            <p class="service-seo-price__plan-num">01</p>
            <p class="service-seo-price__plan-name">初期構築プラン</p>
            <p class="service-seo-price__plan-desc">
              営業構造整理、検索意図設計、キーワード戦略設計、コンテンツカテゴリ設計、内部リンク設計、CTA設計、編集ルール・運用ルール整備までを実施し、「リードと商談につながるSEO設計」を構築します。
            </p>
            <p class="service-seo-price__plan-price">300,000円〜<span class="service-seo-price__plan-tax"> / 回</span></p>
          </div>

          <div class="service-seo-price__plan-card">
            <p class="service-seo-price__plan-num">02</p>
            <p class="service-seo-price__plan-name">月額運用伴走プラン</p>
            <p class="service-seo-price__plan-desc">
              月1回の戦略MTG、優先順位設計、記事テーマ設計、構成レビュー、リライト方針設計、内部リンク最適化、10記事作成、数値分析と改善提案を実施します。
              改善を積み上げながら、Webサイトを「資産」として育てていきます。
            </p>
            <p class="service-seo-price__plan-price">350,000円〜<span class="service-seo-price__plan-tax"> / 月</span></p>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [7] PRINCIPLE(私たちが大切にしている3つのこと)          -->
<!-- ===================================================== -->
<section class="service-seo-principle">
  <div class="container">
    <div class="service-seo-principle__inner">

      <div class="service-seo-principle__head principle-header">
        <p class="en">PRINCIPLE</p>
        <h2>私たちが大切にしている<br class="sp">3つのこと</h2>
        <p class="subtitle">サービス設計を貫く、3つの軸をお伝えします。</p>
      </div>
      <p class="service-seo-principle__lead">
        BtoB中小企業の現場で培った経験から、私たちは以下の3つを軸にサービスを組み立てています。
      </p>

      <ul class="service-seo-principle__list">

        <li class="service-seo-principle__item">
          <p class="service-seo-principle__num">01</p>
          <h3 class="service-seo-principle__title">BtoB中小企業に特化した型化</h3>
          <p class="service-seo-principle__text">
            業種・規模にあわせた支援フローを標準化することで、<span class="keyword">「刺さる型」を最短で構築できる体制</span>をつくっています。
            50社以上のBtoB中小企業を支援してきた経験から、共通する成功パターンを型として持っているため、ゼロから設計するのではなく、貴社の状況にあわせて最適化する形で進められます。
          </p>
        </li>

        <li class="service-seo-principle__item">
          <p class="service-seo-principle__num">02</p>
          <h3 class="service-seo-principle__title">共同制作を前提とした設計</h3>
          <p class="service-seo-principle__text">
            完全代行ではなく、社内と一緒に積み上げる伴走型。だからこそ無駄な工数を削ぎ落とし、<span class="keyword">必要な部分に集中</span>できます。
            社内のノウハウを蓄積しながら進められるため、将来的な内製化も視野に入れた、長期的な投資効果が見込めます。
          </p>
        </li>

        <li class="service-seo-principle__item">
          <p class="service-seo-principle__num">03</p>
          <h3 class="service-seo-principle__title">段階移行型のプラン構造</h3>
          <p class="service-seo-principle__text">
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
<section class="service-seo-flow">
  <div class="container">
    <div class="service-seo-flow__inner">

      <div class="service-seo-flow__head flow-header">
        <p class="en">FLOW</p>
        <h2>支援の流れ</h2>
        <p class="subtitle">完全代行ではなく、社内と共に積み上げていく伴走型のプロセスです。</p>
      </div>

      <p class="service-seo-flow__lead">
        初期構築から運用伴走、内製移行までを段階的に進めていきます。
      </p>

      <ol class="service-seo-flow__list">

        <li class="service-seo-flow__step">
          <p class="service-seo-flow__step-num">Step 1</p>
          <p class="service-seo-flow__step-period">1〜2ヶ月</p>
          <h3 class="service-seo-flow__step-title">初期構築</h3>
          <p class="service-seo-flow__step-sub">「商談につながるSEO設計」を構築するフェーズ</p>
          <ul class="service-seo-flow__step-list">
            <li>営業構造の整理(誰に何を売るか・どこで詰まっているか)</li>
            <li>検索意図設計・キーワード戦略設計</li>
            <li>コンテンツカテゴリ設計(ピラー&クラスター構造)</li>
            <li>内部リンク設計・CTA設計</li>
            <li>編集ルール・運用ルールの整備</li>
          </ul>
        </li>

        <li class="service-seo-flow__step">
          <p class="service-seo-flow__step-num">Step 2</p>
          <p class="service-seo-flow__step-period">月次</p>
          <h3 class="service-seo-flow__step-title">運用伴走</h3>
          <p class="service-seo-flow__step-sub">「型」を回しながら改善するフェーズ</p>
          <ul class="service-seo-flow__step-list">
            <li>月1回の戦略MTG</li>
            <li>優先順位設計・記事テーマ設計</li>
            <li>10記事の構成・原稿作成</li>
            <li>既存記事のリライト方針設計・内部リンク最適化</li>
            <li>数値分析と改善提案(検索順位・回遊・CTAクリック・問い合わせ)</li>
          </ul>
        </li>

        <li class="service-seo-flow__step">
          <p class="service-seo-flow__step-num">Step 3</p>
          <h3 class="service-seo-flow__step-title">内製移行</h3>
          <p class="service-seo-flow__step-sub">社内体制への段階的な引き継ぎ</p>
          <p class="service-seo-flow__step-text">
            伴走を続ける中で蓄積されたノウハウをもとに、<span class="keyword">社内でSEO運用を自走できる状態</span>を目指します。
            必要に応じて部分的な伴走に移行することも可能です。
          </p>
        </li>

      </ol>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [9] FAQ(15問・既存 .accordion + js/accordion.js 流用)   -->
<!-- ===================================================== -->
<section class="service-seo-faq">
  <div class="container">
    <div class="service-seo-faq__inner">

      <div class="service-seo-faq__head faq-header">
        <p class="en">FAQ</p>
        <h2>よくあるご質問</h2>
        <p class="subtitle">お問い合わせ前によくいただく質問をまとめました。</p>
      </div>

      <div class="accordion service-seo-faq__list">
        <ul>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">何ヶ月で何件のリード・商談につながりますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">コンテンツSEOは、Webサイトを「育てる」ための施策です。検索順位の安定や記事の蓄積には時間がかかるため、「公開後◯ヶ月でリード◯件」という約束はいたしかねます。業種や競合状況により異なりますが、一般的には3〜6ヶ月で変化が出始め、6〜12ヶ月で安定したリード獲得につながるケースが多いです。記事は積み上がる資産として残り続けるため、時間とともに獲得効率が高まっていく点が特徴です。現状の集客施策の状況もお伺いしたうえで、現実的な見通しをお伝えします。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">AI検索が増えていますが、SEOはまだ意味がありますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">むしろ、これまで以上に重要になっています。AI検索(ChatGPT・Perplexity・Google AI Overviewなど)は、Web上の情報を拾って回答を生成する仕組みです。そのため、AI検索が普及するほど「発信されているコンテンツ」が回答ソースとして引用される機会が増えます。検索エンジン対策とAI最適化を両立した記事設計を標準で行います。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">コンテンツSEOはどんな企業に向いていますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">検討期間が長いBtoB商材や、比較検討の情報が重視される業種に向いています。「検索 → 理解 → 比較 → 問い合わせ」の流れを作ることで、営業依存からの脱却にもつながります。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">記事制作はすべて代行してもらえますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。月額運用伴走プランには10記事の構成・原稿作成が含まれます。ただし、最終的には社内にノウハウを残し、自走できる状態を目指すため、構成テンプレートや編集ルールの共有、改善観点の共有もセットで進めます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">キーワード選定はすべてお任せで進められますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">戦略設計はウィル側で行いますが、業界特有の用語や顧客の検索行動については貴社のドメイン知識をお借りします。月1回のMTGでヒアリングしながら、「検索される言葉」と「営業の現場で使われる言葉」のすり合わせを行います。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">既存の記事のリライトもお願いできますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、リライトもサービスに含まれます。新規記事の作成と並行して、既存記事の検索順位・滞在時間・CTAクリックを分析し、優先順位をつけてリライト方針を設計します。「書き直す価値のある記事」と「そのまま残す記事」を見極めて進めます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">ブログがWordPressではない場合でも対応できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。CMSの種類を問わず、構成設計・原稿作成・SEO設計までを支援できます。ただし、内部リンクの実装方法や記事公開フローなど、CMSによって運用設計が変わるため、現状の体制をヒアリングした上でご提案します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">SEOツールの導入は必要ですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">必須ではありませんが、Google Search Consoleとアナリティクスは最低限導入することを推奨します。有料ツール(Ahrefs・Semrushなど)については、月間の記事数や競合分析の頻度に応じてご提案します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">ChatGPTなどのAIライティングは活用していますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">構成設計や下書きの効率化には部分的に活用しますが、最終的な原稿は必ず人の手で編集・推敲します。BtoBでは「誰が書いたか」「どこまで実体験に基づくか」が信頼に直結するため、AIに丸投げした文章は使いません。貴社の実例・経験を組み込んだコンテンツ設計を行います。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">AIO(AI最適化)にも対応していますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、対応しています。Google検索だけでなく、ChatGPTやPerplexityなどのAI検索でも引用されやすい構成設計(定義パート・FAQ・結論先出し・E-E-A-T表現の分散配置など)を標準で組み込みます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">どのくらいの期間で成果が見えてきますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">業種や競合状況により異なりますが、一般的には3〜6ヶ月で変化が出始め、6〜12ヶ月で安定した成果につながるケースが多いです。改善を前提に運用するため、最低6ヶ月のご契約を推奨しています。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">Webサイトの導線やCTAも見直してもらえますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、コンテンツSEOはWeb導線と一体で設計して初めて機能します。サービスページ、資料請求、内部リンク、CTA配置など、必要に応じて改善提案を行います。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">社内でどの程度の工数が必要ですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">月1回のMTG参加と情報共有(商材・事例・強み・現場の声など)をご協力いただきます。伴走型で進めるため、社内理解が深まり、長期的に自走しやすくなります。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">競合分析はどのように行いますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">検索結果上位の競合記事の構成・情報量・E-E-A-T要素を分析し、貴社の強みを活かせるポジションを設計します。「競合に勝つ」のではなく、「検索者にとって最も役立つ記事」を作る視点で進めます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">月10記事以上のボリュームでも対応できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。月15〜20記事規模の運用にも対応しています。ただし、記事数を増やすほど品質維持のために体制設計が重要になるため、ヒアリングのうえで最適なペースをご提案します。</p>
              </div>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [10] CTA(page-service-web パターン・3 カード並列)        -->
<!-- ===================================================== -->
<section class="service-seo-cta">
  <div class="container">
    <div class="service-seo-cta__inner">

      <div class="service-seo-cta__head cta-header">
        <p class="en">CONTACT</p>
        <h2>3つの相談入口をご用意しています</h2>
        <p class="subtitle">ご検討の段階に合わせて、お気軽にお問い合わせください。</p>
      </div>

      <ul class="service-seo-cta__grid">

        <li class="service-seo-cta__card">
          <a class="service-seo-cta__card-link" href="<?php echo esc_url( home_url('/diagnosis/') ); ?>">
            <p class="service-seo-cta__label">[初期検討の方へ]</p>
            <h3 class="service-seo-cta__title">1分でできる無料診断</h3>
            <p class="service-seo-cta__desc">現在のWebサイトの課題を整理します</p>
            <span class="service-seo-cta__btn">診断する →</span>
          </a>
        </li>

        <li class="service-seo-cta__card">
          <a class="service-seo-cta__card-link" href="<?php echo esc_url( home_url('/ebooks/') ); ?>">
            <p class="service-seo-cta__label">[情報収集の方へ]</p>
            <h3 class="service-seo-cta__title">無料ダウンロード資料</h3>
            <p class="service-seo-cta__desc">BtoB Web制作のお役立ち資料を配布中</p>
            <span class="service-seo-cta__btn">資料を見る →</span>
          </a>
        </li>

        <li class="service-seo-cta__card">
          <a class="service-seo-cta__card-link" href="<?php echo esc_url( home_url('/contact/') ); ?>">
            <p class="service-seo-cta__label">[具体的な相談の方へ]</p>
            <h3 class="service-seo-cta__title">お問い合わせ・お見積もり</h3>
            <p class="service-seo-cta__desc">具体的なご相談・お見積もりはこちら</p>
            <span class="service-seo-cta__btn">問い合わせる →</span>
          </a>
        </li>

      </ul>

    </div>
  </div>
</section>

<?php get_footer(); ?>
