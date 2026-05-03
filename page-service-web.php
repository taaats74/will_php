<?php
/**
 * Template Name: Service - Web制作
 * Template Post Type: page
 *
 * Webサイト制作サービスの新ページ(10セクション構成)。
 * セントラルメッセージ:「Webサイトは、集めるツールではなく、選ばれるためのツール」
 *
 * - header + footer
 * - ブランド・メッセージガイドライン v2.0 / カラーガイドライン v1.0 準拠
 *
 * @package will-corp
 */
get_header();
?>

<?php
// ヒーロー(下層ページ共通の template-parts/page-hero を流用)
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'WEB CREATIVE',
  'title' => 'Webサイト制作',
  'lead'  => '営業構造から逆算した、フルオーダーのBtoB Webサイト制作',
] );
?>

<!-- ===================================================== -->
<!-- [1] HERO 補足(キャッチコピー + ウィルサポ並列提示)      -->
<!-- ===================================================== -->
<section class="service-web-hero">
  <div class="container">
    <div class="service-web-hero__inner">

      <h2 class="service-web-hero__tagline">
        自社で運用体制を持ち、<br class="sp">Webサイトを資産として<br>
        しっかり作り込みたい会社のための、<span class="keyword">一括制作型サービス</span>です。
      </h2>

      <p class="service-web-hero__lead">
        ヒアリングから構成設計・デザイン・実装・公開まで、フルオーダーで伴走。<br class="pc">
        営業基盤として機能するWebサイトを、貴社の事業フェーズに合わせて構築します。
      </p>

      <p class="service-web-hero__alternative">
        ※ Web担当者がいない・運用も任せたい場合は、月額制の<a href="<?php echo esc_url( home_url('/willsupport/') ); ?>" target="_blank" rel="noopener noreferrer">「ウィルサポ」</a>もご用意しています。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [2] CONCEPT                                             -->
<!-- ===================================================== -->
<section class="service-web-concept">
  <div class="container">
    <div class="service-web-concept__inner">

      <h2 class="service-web-concept__headline">
        Webサイトは、集めるツールではなく、<br>
        <span class="keyword">選ばれるためのツール</span>。
      </h2>

      <div class="service-web-concept__body">
        <p>
          見込み客との接点は、コンテンツSEO・SNS・広告・展示会・営業活動など、
          認知施策で生まれます。Webサイト単体で新しい接点を作ることは、現実には難しい。
        </p>
        <p>
          私たちが大切にしているのは、それらの施策で接点を持った見込み客が、
          自社と他社を比較検討するときに、<span class="keyword">「ここに相談してみたい」と感じてもらえる
          状態を、Webサイトに実装すること</span>です。
        </p>
        <p>
          つまりWebサイトの本当の役割は、集客装置ではなく、
          <span class="keyword">比較検討フェーズで選ばれるための装置</span>である。
        </p>
        <p>
          私たちは、この前提に立って、貴社の営業構造から逆算したWebを設計します。
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [3] FOR WHOM                                            -->
<!-- ===================================================== -->
<section class="service-web-target">
  <div class="container">
    <div class="service-web-target__inner">

      <div class="service-web-target__head target-header">
        <p class="en">FOR WHOM</p>
        <h2>こんな会社のためのサービスです</h2>
        <p class="subtitle">本サービスは、特に以下のような会社向けにご提供しています。</p>
      </div>

      <ul class="service-web-target__list">

        <li class="service-web-target__item">
          <p class="service-web-target__category-label">自社で運用体制が組める会社</p>
          <p class="service-web-target__text">
            Web担当者(または担当できる方)が社内にいて、公開後の更新・改善を
            自社主導で進めていける体制を持っている会社。
          </p>
        </li>

        <li class="service-web-target__item">
          <p class="service-web-target__category-label">サイトを資産として保有したい会社</p>
          <p class="service-web-target__text">
            月額継続契約ではなく、Webサイトを自社の資産として
            一括で所有したい・しっかり作り込みたい会社。
          </p>
        </li>

        <li class="service-web-target__item">
          <p class="service-web-target__category-label">大規模・独自要件のあるプロジェクト</p>
          <p class="service-web-target__text">
            ページ数が多い、独自機能の実装が必要、業界特性に合わせた設計が必要、
            など、テンプレート的な制作では対応できない要件を持つ会社。
          </p>
        </li>

      </ul>

      <div class="service-web-target__alt-note">
        <p>
          「Web担当者がいない」「運用も含めて任せたい」「月額負担で始めたい」
          といったご要望の場合は、月額制の「ウィルサポ」がフィットします。
        </p>
        <a class="service-web-target__alt-link" href="<?php echo esc_url( home_url('/willsupport/') ); ?>" target="_blank" rel="noopener noreferrer">
          ウィルサポの詳細はこちら →
        </a>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [4] PROBLEM                                             -->
<!-- ===================================================== -->
<section class="service-web-problem">
  <div class="container">
    <div class="service-web-problem__inner">

      <div class="service-web-problem__head problem-header">
        <p class="en">PROBLEM</p>
        <h2>こんなお悩みはありませんか?</h2>
        <p class="subtitle">BtoB中小企業のWebサイト制作で、よくいただくご相談を3つの観点で整理しました。</p>
      </div>

      <ul class="service-web-problem__list">

        <li class="service-web-problem__category">
          <h3 class="service-web-problem__category-title">入口の課題</h3>
          <ul class="service-web-problem__check-list">
            <li>展示会・紹介で接点を持った見込み客が、サイトを見て他社に流れている</li>
            <li>SEO・広告で獲得したアクセスが、問い合わせにつながっていない</li>
            <li>自社サイトが、認知獲得後の受け皿になっていない</li>
          </ul>
        </li>

        <li class="service-web-problem__category">
          <h3 class="service-web-problem__category-title">構造の課題</h3>
          <ul class="service-web-problem__check-list">
            <li>「誰に・何を・どう売るか」が曖昧なまま制作が始まり、方向性がブレる</li>
            <li>サービスの強みが整理できず、競合と比較されたときに選ばれる理由が伝わらない</li>
            <li>Webが営業と分断され、商談前の事前理解を促す導線がない</li>
            <li>見た目は整っているが、問い合わせに直結する設計になっていない</li>
          </ul>
        </li>

        <li class="service-web-problem__category">
          <h3 class="service-web-problem__category-title">運用の課題</h3>
          <ul class="service-web-problem__check-list">
            <li>公開後に何を見て改善すべきか分からず、更新が止まってしまう</li>
            <li>社内に運用ノウハウが蓄積せず、ベンダー依存が続いている</li>
            <li>施策が単発で打たれ、データとして蓄積・活用されていない</li>
          </ul>
        </li>

      </ul>

      <p class="service-web-problem__closing">
        これらの課題は、見た目を整えるだけでは解決できません。<br>
        Webサイトを<span class="keyword">「営業基盤の一部」</span>として捉え直し、<br>
        営業構造から逆算して設計することが必要です。
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [5] REASON(★最重要・ベネフィット型訴求)                -->
<!-- ===================================================== -->
<section class="service-web-reason">
  <div class="container">
    <div class="service-web-reason__inner">

      <div class="service-web-reason__head reason-header">
        <p class="en">REASON</p>
        <h2>ウィルが選ばれる<br class="sp">4つの理由</h2>
        <p class="subtitle">数あるWebサイト制作会社の中から、ウィルが選ばれる理由をお伝えします。</p>
      </div>

      <ul class="service-web-reason__list">

        <li class="service-web-reason__item">
          <p class="service-web-reason__number">01</p>
          <h3 class="service-web-reason__title">営業構造から逆算したサイト設計</h3>
          <div class="service-web-reason__approach">
            <p>
              Webは「会社案内」ではなく、営業を支える仕組みです。
              誰が、どんな経路で、何を不安に感じ、どう比較して意思決定するのか。
              認知から比較検討、意思決定までの流れを整理し、
              ページ構成・導線・CTAを営業プロセスと連動させて設計します。
            </p>
          </div>
          <div class="service-web-reason__benefit">
            <p>
              <span class="service-web-reason__benefit-arrow">→</span>
              営業現場の属人化から脱却し、<span class="keyword">サイトが見込み客を育てる仕組み</span>に変わります。
            </p>
          </div>
        </li>

        <li class="service-web-reason__item">
          <p class="service-web-reason__number">02</p>
          <h3 class="service-web-reason__title">比較検討で選ばれる構成・導線設計</h3>
          <div class="service-web-reason__approach">
            <p>
              どれだけ良いサービスでも、伝わらなければ選ばれません。
              ヒアリングで強み・実績・提供範囲・得意な顧客像を整理し、
              競合と比べたときの「選ばれる理由」を明確にします。
              キャッチコピー、見出し、構成の順番まで含めて言語化することで、
              価格勝負にならない提案力のあるサイトに仕上げます。
            </p>
          </div>
          <div class="service-web-reason__benefit">
            <p>
              <span class="service-web-reason__benefit-arrow">→</span>
              商談前の事前理解が深まり、<span class="keyword">受注率と商談の質が両方向上</span>します。
            </p>
          </div>
        </li>

        <li class="service-web-reason__item">
          <p class="service-web-reason__number">03</p>
          <h3 class="service-web-reason__title">点で打たない、線でつなぐ集客設計</h3>
          <div class="service-web-reason__approach">
            <p>
              Webサイト単体では、新しい接点は生まれません。
              コンテンツSEO・SNS・広告・営業活動など、認知施策との連動が前提です。
              狙うべきキーワードと検索意図を整理し、
              サービスページ・事例・ブログの役割分担まで含めて設計します。
            </p>
          </div>
          <div class="service-web-reason__benefit">
            <p>
              <span class="service-web-reason__benefit-arrow">→</span>
              認知施策と連動し、<span class="keyword">Webが継続的に見込み客を生み出す資産</span>として育っていきます。
            </p>
          </div>
        </li>

        <li class="service-web-reason__item">
          <p class="service-web-reason__number">04</p>
          <h3 class="service-web-reason__title">テンプレートに頼らないフルオーダーデザイン</h3>
          <div class="service-web-reason__approach">
            <p>
              情報を載せるだけでは成果につながりません。
              事業の専門性・強み・ターゲットに合わせたフルオーダーデザインで、
              第一印象で「信頼できる」と感じてもらえる見た目・言葉・余白を設計。
              構造とデザインを連動させ、伝えたい価値が一目で伝わる構成に落とし込みます。
            </p>
          </div>
          <div class="service-web-reason__benefit">
            <p>
              <span class="service-web-reason__benefit-arrow">→</span>
              離脱率が下がり、伝えたい内容が届き、<span class="keyword">お問い合わせにつながるサイト</span>になります。
            </p>
          </div>
        </li>

      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [6] FLOW                                                -->
<!-- ===================================================== -->
<section class="service-web-flow">
  <div class="container">
    <div class="service-web-flow__inner">

      <div class="service-web-flow__head flow-header">
        <p class="en">FLOW</p>
        <h2>制作の流れ</h2>
        <p class="subtitle">ヒアリングと設計に十分な時間をかけて、6ステップで進めます。</p>
      </div>

      <p class="service-web-flow__lead">
        営業構造から逆算した設計を実現するため、<br>
        ヒアリングと設計に十分な時間をかけて進めます。
      </p>

      <ol class="service-web-flow__list">

        <li class="service-web-flow__item">
          <p class="service-web-flow__step-number">Step 01</p>
          <h3 class="service-web-flow__title">お問い合わせ・初回ヒアリング(無料)</h3>
          <p class="service-web-flow__text">
            事業内容・現状の課題・ご要望を伺い、現実的な進め方をご提案します。
          </p>
        </li>

        <li class="service-web-flow__item">
          <p class="service-web-flow__step-number">Step 02</p>
          <h3 class="service-web-flow__title">詳細ヒアリング・要件整理</h3>
          <p class="service-web-flow__text">
            営業プロセス・ターゲット・強み・競合状況を深く掘り下げ、
            Webサイトの役割と目標を明確にします。
          </p>
        </li>

        <li class="service-web-flow__item">
          <p class="service-web-flow__step-number">Step 03</p>
          <h3 class="service-web-flow__title">構成設計・ワイヤーフレーム</h3>
          <p class="service-web-flow__text">
            営業構造から逆算したサイト構成・導線・CTA配置を設計します。
            ここがサイトの成果を決める最重要工程です。
          </p>
        </li>

        <li class="service-web-flow__item">
          <p class="service-web-flow__step-number">Step 04</p>
          <h3 class="service-web-flow__title">デザイン・コーディング</h3>
          <p class="service-web-flow__text">
            構成設計に基づき、フルオーダーでデザイン・実装を進めます。
            進捗は定例共有・制作環境URLで随時ご確認いただけます。
          </p>
        </li>

        <li class="service-web-flow__item">
          <p class="service-web-flow__step-number">Step 05</p>
          <h3 class="service-web-flow__title">公開・運用引き渡し</h3>
          <p class="service-web-flow__text">
            公開後は、貴社の運用体制で更新・改善を進めていただきます。
            必要に応じて、運用マニュアル整備や操作レクチャーも対応します。
          </p>
        </li>

        <li class="service-web-flow__item">
          <p class="service-web-flow__step-number">Step 06</p>
          <h3 class="service-web-flow__title">継続サポート(ご希望に応じて)</h3>
          <p class="service-web-flow__text">
            公開後の改善・コンテンツ追加・分析支援なども別途承ります。
            継続的な伴走をご希望の場合はご相談ください。
          </p>
        </li>

      </ol>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [7] PRICE                                               -->
<!-- ===================================================== -->
<section class="service-web-price">
  <div class="container">
    <div class="service-web-price__inner">

      <div class="service-web-price__head price-header">
        <p class="en">PRICE</p>
        <h2>料金プラン</h2>
        <p class="subtitle">目的・体制・必要な制作範囲に応じて、最適な構成をご提案します。</p>
      </div>

      <p class="service-web-price__lead">
        下記は参考価格です。詳細のお見積もりは、ヒアリング後に改めてご提示します。<br>
        目的・体制・必要な制作範囲に応じて最適な構成をご提案します。
      </p>

      <!-- ① 料金プラン:ホームページ制作 -->
      <div class="service-web-price__plans">
        <h3 class="service-web-price__plans-heading">ホームページ制作</h3>
        <div class="service-web-price__plans-grid">

          <div class="service-web-price__plan-card">
            <p class="service-web-price__plan-num">01</p>
            <p class="service-web-price__plan-name">小規模サイト</p>
            <ul class="service-web-price__plan-spec">
              <li>ページ数:6ページ</li>
              <li>デザイン:フルオーダー</li>
              <li>CMS:WordPress</li>
              <li>工期:2ヶ月〜</li>
            </ul>
            <p class="service-web-price__plan-price">70万円〜<span class="service-web-price__plan-tax">(税別)</span></p>
          </div>

          <div class="service-web-price__plan-card">
            <p class="service-web-price__plan-num">02</p>
            <p class="service-web-price__plan-name">中規模サイト</p>
            <ul class="service-web-price__plan-spec">
              <li>ページ数:12ページ</li>
              <li>デザイン:フルオーダー</li>
              <li>CMS:WordPress</li>
              <li>工期:2.5ヶ月〜</li>
            </ul>
            <p class="service-web-price__plan-price">110万円〜<span class="service-web-price__plan-tax">(税別)</span></p>
          </div>

          <div class="service-web-price__plan-card">
            <p class="service-web-price__plan-num">03</p>
            <p class="service-web-price__plan-name">大規模サイト</p>
            <ul class="service-web-price__plan-spec">
              <li>ページ数:18ページ</li>
              <li>デザイン:フルオーダー</li>
              <li>CMS:WordPress</li>
              <li>工期:3.5ヶ月〜</li>
            </ul>
            <p class="service-web-price__plan-price">160万円〜<span class="service-web-price__plan-tax">(税別)</span></p>
          </div>

        </div>
      </div>

      <!-- ① 料金プラン:LP -->
      <div class="service-web-price__plans">
        <h3 class="service-web-price__plans-heading">ランディングページ制作</h3>
        <div class="service-web-price__plans-grid service-web-price__plans-grid--single">

          <div class="service-web-price__plan-card">
            <p class="service-web-price__plan-num">01</p>
            <p class="service-web-price__plan-name">LP</p>
            <ul class="service-web-price__plan-spec">
              <li>ページ数:1ページ</li>
              <li>デザイン:フルオーダー</li>
              <li>CMS:WordPress</li>
              <li>工期:1ヶ月〜</li>
            </ul>
            <p class="service-web-price__plan-price">35万円〜<span class="service-web-price__plan-tax">(税別)</span></p>
          </div>

        </div>
      </div>

      <!-- ② ウィルサポとの比較 -->
      <div class="service-web-price__comparison">
        <h3 class="service-web-price__comparison-heading">2つのプランから、貴社に合うものをお選びください</h3>
        <p class="service-web-price__comparison-lead">
          ウィルでは、Webサイト制作のニーズに応じて2つのプランをご用意しています。<br>
          「営業構造から逆算したWeb設計」という考え方は両プラン共通です。
        </p>

        <div class="service-web-price__comparison-tablewrap">
          <table class="service-web-price__comparison-table">
            <thead>
              <tr>
                <th>項目</th>
                <th>Webサイト制作<br><span class="service-web-price__comparison-sub">(本サービス)</span></th>
                <th>ウィルサポ<br><span class="service-web-price__comparison-sub">(月額サブスク型)</span></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>初期費用</th>
                <td>70〜120万円</td>
                <td>0円</td>
              </tr>
              <tr>
                <th>月額</th>
                <td>なし</td>
                <td>9,800円〜</td>
              </tr>
              <tr>
                <th>サイトの所有</th>
                <td>納品・自社所有</td>
                <td>月額契約期間中に利用</td>
              </tr>
              <tr>
                <th>公開後の更新</th>
                <td>別途お見積もり</td>
                <td>月額内で対応</td>
              </tr>
              <tr>
                <th>向いている会社</th>
                <td>
                  ・自社で運用体制が組める<br>
                  ・サイトを資産として持ちたい<br>
                  ・大規模・独自要件あり
                </td>
                <td>
                  ・Web担当者がいない<br>
                  ・運用も含めて任せたい<br>
                  ・初期投資を抑えて始めたい
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <p class="service-web-price__comparison-link">
          <a href="<?php echo esc_url( home_url('/willsupport/') ); ?>" target="_blank" rel="noopener noreferrer">→ ウィルサポの詳細はこちら</a>
        </p>
      </div>

      <!-- ③ 価格哲学 -->
      <div class="service-web-price__philosophy">
        <h3 class="service-web-price__philosophy-heading">適正価格で、本気の設計を</h3>

        <ul class="service-web-price__philosophy-list">

          <li class="service-web-price__philosophy-card">
            <h4 class="service-web-price__philosophy-title">制作フローの標準化</h4>
            <p class="service-web-price__philosophy-text">
              成果につながる構成設計と工程最適化により、無駄な工数を削減しています。
              「安いから簡易的」ではなく「仕組みが合理的」だから可能な価格設定です。
            </p>
          </li>

          <li class="service-web-price__philosophy-card">
            <h4 class="service-web-price__philosophy-title">2名体制による直接運営</h4>
            <p class="service-web-price__philosophy-text">
              代表が直接プロジェクトに関わり、多重下請け構造を排除。
              コミュニケーションコストと中間マージンを抑えています。
            </p>
          </li>

          <li class="service-web-price__philosophy-card">
            <h4 class="service-web-price__philosophy-title">長期関係を前提とした設計</h4>
            <p class="service-web-price__philosophy-text">
              公開後の運用支援・継続的な関係性も視野に入れた価格設計で、
              初期費用で過剰に回収する必要がありません。
            </p>
          </li>

        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [8] WORKS(一覧ページへの誘導のみ)                       -->
<!-- ===================================================== -->
<section class="service-web-works">
  <div class="container">
    <div class="service-web-works__inner">

      <div class="service-web-works__head works-header">
        <p class="en">WORKS</p>
        <h2>制作実績</h2>
        <p class="subtitle">業種・規模を問わず、BtoB中小企業を中心にご支援しています。</p>
      </div>

      <p class="service-web-works__lead">
        これまでに制作したBtoB企業様のWebサイトを、一覧ページにまとめています。<br>
        業種・課題・設計の意図とあわせて、ぜひご覧ください。
      </p>

      <p class="service-web-works__cta-wrap">
        <a class="service-web-works__cta-btn" href="<?php echo esc_url( home_url('/works/') ); ?>">
          制作実績一覧を見る
          <span class="service-web-works__cta-arrow">→</span>
        </a>
      </p>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [9] FAQ                                                 -->
<!-- ===================================================== -->
<section class="service-web-faq">
  <div class="container">
    <div class="service-web-faq__inner">

      <div class="service-web-faq__head faq-header">
        <p class="en">FAQ</p>
        <h2>よくあるご質問</h2>
        <p class="subtitle">お問い合わせ前によくいただく質問をまとめました。</p>
      </div>

      <div class="accordion service-web-faq__list">
        <ul>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">ウェブサイト制作にかかる予算はどれくらいですか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">目的(問い合わせ増、採用強化、資料請求など)と必要なページ構成により変わります。現状と目標を伺った上で、優先順位を整理し最適な範囲でお見積もりします。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">制作期間はどのくらいかかりますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">小規模で約2ヶ月〜、中規模で約2.5ヶ月〜が目安です。原稿や写真素材の準備状況によって前後するため、開始時にスケジュールを明確化します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">公開後の運用や改善までお願いできますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。アクセス解析、導線改善、CV改善、コンテンツ追加など、公開後を前提にした改善サイクル(PDCA)まで含めて伴走します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">SEO対策は含まれていますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、基本的なSEO(サイト構造・内部設計・表示速度・メタ情報など)は含みます。さらにコンテンツSEOを強化する場合は、別途運用設計をご提案します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">スマートフォン対応はサービスに含まれますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、全プランでレスポンシブ対応(スマホ・タブレット最適化)を行います。主要ブラウザでの表示確認も含め、ストレスなく閲覧できる状態を整えます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">原稿や写真素材がなくても進められますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。ヒアリング内容をもとに構成案・文章のたたき台を作成し、必要に応じて撮影や素材準備の進め方もご提案します(別途費用の場合あり)。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">制作途中の進捗状況は確認できますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">はい、定例共有・制作環境URLの共有などで随時確認いただけます。認識違いが起きないよう、要所で確認ポイントを設けて進行します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">公開後に自社で更新できるようにできますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">可能です。WordPressで更新しやすい設計にし、更新マニュアルの整備や操作レクチャーも対応します。将来的な内製化を前提にした運用体制づくりも支援できます。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">著作権についてはどうなりますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <p class="text">原則、納品物の取り扱いは契約で明確にします。使用素材(写真・フォント等)のライセンス条件に応じて、適切に整理した上でご案内します。</p>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">公開後どれくらいで成果が出ますか?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <div class="text">
                  <p>Webサイトは「比較検討時に選ばれる状態」を作るツールです。見込み客がサイトに訪れるための認知施策(コンテンツSEO・SNS・広告・営業活動など)と連動してはじめて、成果が生まれます。</p>
                  <p>そのため「公開後◯ヶ月で問い合わせが◯件」という約束はいたしかねますが、認知施策と並行して整えていくことで、6ヶ月〜1年のスパンで成果が現れ始めるケースが多くあります。</p>
                  <p>現状の集客施策の状況もお伺いしたうえで、現実的な見通しをお伝えします。</p>
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="list question">
              <div class="text-wrapper">
                <div class="list-icon">Q</div>
                <p class="text">月額制サービス「ウィルサポ」との違いと使い分けは?</p>
              </div>
              <i class="fa-solid fa-chevron-up"></i>
            </div>
            <div class="list answer">
              <div class="text-wrapper">
                <div class="list-icon">A</div>
                <div class="text">
                  <p>ウィルでは2つのWebサイト制作プランをご用意しています。考え方(営業構造から逆算した設計)は共通ですが、運用スタイルが異なります。</p>
                  <p class="service-web-faq__sub">[本ページの一括制作型がおすすめの方]</p>
                  <ul class="service-web-faq__inner-list">
                    <li>自社で更新・運用できる体制があり、サイトを資産として保有したい</li>
                    <li>大規模・独自要件があり、一度しっかり作り込みたい</li>
                    <li>月額継続契約より、初期投資型を好む</li>
                  </ul>
                  <p class="service-web-faq__sub">[ウィルサポがおすすめの方]</p>
                  <ul class="service-web-faq__inner-list">
                    <li>Web担当者が不在で、更新・運用も任せたい</li>
                    <li>初期投資を抑えて、月次経費として継続的に活用したい</li>
                    <li>育てながら長く使えるWebサイトが欲しい</li>
                  </ul>
                  <p>どちらが合うか分からない場合は、まず無料診断またはお問い合わせください。現状の体制と目的に合わせて、最適なプランをご提案します。</p>
                </div>
              </div>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- [10] CTA                                                -->
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
