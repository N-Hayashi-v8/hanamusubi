<?php
$pageTitle = 'アクセス・店舗案内';
$breadcrumbLabel = 'アクセス・店舗案内＜京都・華結び＞';
?>
<!DOCTYPE html>
<html lang="ja">
<?php include __DIR__ . '/../includes/head.php'; ?>

<body class="access-page">
<?php include __DIR__ . '/../includes/header-page.php'; ?>

<?php include __DIR__ . '/../includes/sidebar.php'; ?>

  <main class="l-main">
<?php include __DIR__ . '/../includes/page-title.php'; ?>

    <!-- ===== ここからアクセスページ固有コンテンツ ===== -->
    <!-- section1: 店舗案内リード（白背景・中央寄せ・上下8rem） -->
    <section class="p-access-intro">
      <h2 class="p-access-intro__title">店舗案内</h2>
      <p class="p-access-intro__lead">華結びは明治から続く、京都でも有数の歴史ある老舗衣装店が運営しております。<br>京都の雰囲気が漂う京町家（店舗）にて、ゆっくりご試着して頂けます。</p>
    </section>

    <!-- section2: 店舗外観（全幅 1枚画像 1920×530） -->
    <section class="p-access-shop">
      <img class="p-access-shop__img" src="/img/access/img_shop01_pc.jpg" alt="華結び 店舗外観">
    </section>

    <!-- section3: 店舗情報（1100px：見出し → 左:表+注記 / 右:地図画像 → 下:GoogleMap枠） -->
    <section class="p-access-info">
      <div class="p-access-info__body">
        <div class="p-access-info__left">
          <h2 class="p-access-info__title">京 和装WEDDING 華結び</h2>

          <table class="p-access-info__table">
            <tbody>
              <tr>
                <th>住所</th>
                <td>〒603-8217　京都府京都市北区紫野上門前町23</td>
              </tr>
              <tr>
                <th>TEL</th>
                <td>075-491-2010</td>
              </tr>
              <tr>
                <th>営業時間</th>
                <td>10:00〜18:00</td>
              </tr>
            </tbody>
          </table>

          <ul class="p-access-info__notes">
            <li>※ご来店は予約制となっております。来店予約フォームかお電話にてご予約をお願い申し上げます。</li>
            <li>※当日のご予約はお断りさせて頂く場合がございます。できるだけ事前のご予約をお奨め致します。</li>
            <li>※土日祝のメールでのお問い合わせは来店状況により、ご連絡が翌営業日となる場合がございます。</li>
          </ul>
        </div>

        <div class="p-access-info__right">
          <img class="p-access-info__map-img" src="/img/access/img_map01.jpg" alt="華結び 周辺地図">
        </div>
      </div>

      <!-- GoogleMap 埋め込み（1100×450）。セクション内の住所で検索 -->
      <iframe
        class="p-access-info__gmap"
        src="https://maps.google.com/maps?q=%E4%BA%AC%E9%83%BD%E5%BA%9C%E4%BA%AC%E9%83%BD%E5%B8%82%E5%8C%97%E5%8C%BA%E7%B4%AB%E9%87%8E%E4%B8%8A%E9%96%80%E5%89%8D%E7%94%BA23&output=embed"
        title="華結び 店舗地図"
        loading="lazy"
        allowfullscreen></iframe>
    </section>

    <!-- section4: 電車・バスでお越しの方（1100px：アイコン見出し → 駅別ブロック×2） -->
    <section class="p-access-route">
      <h2 class="p-access-route__title">
        <img class="p-access-route__icon" src="/img/access/ico_train01.png" alt="">
        電車・バスでお越しの方
      </h2>

      <div class="p-access-route__block">
        <h3 class="p-access-route__station">JR京都駅より</h3>
        <p class="p-access-route__label">【電車】</p>
        <p class="p-access-route__text">地下鉄烏丸線（国際会館行）に乗り換え、「京都駅」〜「北大路駅」乗車（所要時間・約13分）。「北大路駅」下車後、タクシーにて5分。</p>
        <p class="p-access-route__label">【バス】</p>
        <p class="p-access-route__text">市バス206系統「千本通北大路バスターミナル行き」に乗車（所要時間・約35分）、バス停「大徳寺前」で下車、徒歩5分。</p>
      </div>

      <div class="p-access-route__block">
        <h3 class="p-access-route__station">阪急烏丸駅より</h3>
        <p class="p-access-route__label">【電車】</p>
        <p class="p-access-route__text">地下鉄烏丸線（国際会館行）に乗り換え、「四条駅」〜「北大路駅」乗車（所要時間・約9分）。「北大路駅」下車後、タクシーにて5分。</p>
        <p class="p-access-route__label">【バス】</p>
        <p class="p-access-route__text">26番出口、きらっ都プラザ前のバス停「四条烏丸駅」から、市バス12系統「金閣寺立命館大学前行き」に乗車（所要時間・約30分）。バス停「大徳寺前」で下車、徒歩5分。</p>
      </div>
    </section>

    <!-- section5: お車でお越しの方（1100px：アイコン見出し → リード → ストリートビュー） -->
    <section class="p-access-car">
      <h2 class="p-access-car__title">
        <img class="p-access-car__icon" src="/img/access/ico_car01.png" alt="">
        お車でお越しの方
      </h2>
      <p class="p-access-car__lead">駐車場のご用意がございます。ご来店の際は事前のご予約の上、ご来店くださいませ。</p>

      <!-- GoogleMap ストリートビュー（1100×600）。店舗住所と同じ地点 -->
      <iframe
        class="p-access-car__sv"
        src="https://maps.google.com/maps?q=%E4%BA%AC%E9%83%BD%E5%BA%9C%E4%BA%AC%E9%83%BD%E5%B8%82%E5%8C%97%E5%8C%BA%E7%B4%AB%E9%87%8E%E4%B8%8A%E9%96%80%E5%89%8D%E7%94%BA23&layer=c&output=svembed"
        title="華結び 店舗ストリートビュー"
        loading="lazy"
        allowfullscreen></iframe>
    </section>
    <!-- ===== ここから各子ページ共通の下部エリア ===== -->
<?php include __DIR__ . '/../includes/breadcrumb.php'; ?>

<?php include __DIR__ . '/../includes/btn-field-page.php'; ?>

<?php include __DIR__ . '/../includes/contact.php'; ?>

<?php include __DIR__ . '/../includes/map.php'; ?>
  </main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

  <script src="/js/main.js"></script>
</body>

</html>
