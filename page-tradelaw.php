<?php
/**
 * Template Name: tradelaw
 * Template Post Type: page
 *
 * 特定商取引法に基づく表記ページ。本文はテンプレート内に直書き。
 *
 * - header + footer + template-parts/page-hero
 * - トンマナ: page-service-* / page-contact / page-privacypolicy 準拠(Zen Kaku Gothic + 共通余白)
 *
 * @package will-corp
 */
get_header();
?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'LEGAL',
  'title' => '特定商取引法に基づく表記',
] );
?>

<section class="page-tradelaw">
  <div class="container">
    <div class="page-tradelaw__inner">

      <table class="page-tradelaw__table">
        <tbody>
          <tr>
            <th>販売業者名</th>
            <td>合同会社ウィル</td>
          </tr>
          <tr>
            <th>所在地</th>
            <td>〒812-0011<br>福岡県福岡市博多区博多駅前1丁目23番2号ParkFront博多駅前1丁目5F-B</td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td>070-4131-3250</td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>info@will-corp.co.jp</td>
          </tr>
          <tr>
            <th>運営統括責任者</th>
            <td>高橋竜也</td>
          </tr>
          <tr>
            <th>追加手数料等の追加料金</th>
            <td>消費税、振り込み手数料</td>
          </tr>
          <tr>
            <th>返金ポリシー</th>
            <td>
              <p>デジタルデータという商品の性質上、いかなる理由があってもご入金後の返金はできかねます。返金に対応する事由は下記2点のみとします。</p>
              <ul>
                <li>当社の請求額が本来の料金より多く請求してしまった場合(※手数料を当社が負担しての返金)</li>
                <li>クライアントが誤って本来の請求額より多く振り込んでしまった場合(※手数料をクライアントが負担しての返金)</li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>引渡時期</th>
            <td>ご契約後にWebサイトの作成に着手、公開させていただきます。サイトのボリュームにより公開時期が変わりますので、事前にご相談しながら進めさせていただきます。</td>
          </tr>
          <tr>
            <th>決済手段と時期</th>
            <td>
              <ul>
                <li>決済方法:口座振替、クレジットカード決済、銀行振り込み</li>
                <li>時期:ご契約締結後に上記のいずれかでお手続きさせていただきます。</li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>販売価格</th>
            <td>サービスページに記載の表示金額</td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</section>

<?php get_footer(); ?>
