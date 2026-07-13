<?php
$pageTitle = '幸せレポート';
$breadcrumbLabel = '幸せレポート＜京都・華結び＞';
$fontWeights = '400;600';
?>
<!DOCTYPE html>
<html lang="ja">
<?php include __DIR__ . '/../includes/head.php'; ?>

<body class="report-page">
<?php include __DIR__ . '/../includes/header-page.php'; ?>

<?php include __DIR__ . '/../includes/sidebar.php'; ?>

  <main class="l-main">
    <!-- ===== タイトルセクション（MV） ===== -->
    <!-- 他ページの p-page-title とは別仕様: 全幅MV画像に、タイトル画像を重ねてMV下端からはみ出させる。 -->
    <section class="p-report-mv">
      <p class="p-report-mv__bg">
        <img src="/img/report/bg_intro01.jpg" alt="">
      </p>
      <h1 class="p-report-mv__title">
        <img src="/img/report/img_intro01_pc.jpg" alt="最新の幸せレポート">
      </h1>
    </section>

    <!-- ===== ここから幸せレポートページ固有コンテンツ ===== -->
    <!-- リード文（ベージュ地）。MVのタイトル画像がこの帯の上部へはみ出してくる -->
    <section class="p-report-intro">
      <p class="p-report-intro__text">
        華結びをご利用いただいた、<br>
        幸せなカップルさんをご紹介させていただきます。
      </p>
    </section>

    <!-- お客様の声一覧（ベージュ地。後続パンくずまで地続き） -->
    <section class="p-report-list">
      <!-- レポート1件目 -->
      <article class="p-report-list__item">
        <div class="p-report-list__inner">
          <h2 class="p-report-list__title">【京都神社結婚式】下鴨神社</h2>

          <div class="p-report-list__meta">
            <span class="p-report-list__place">東京都　S様</span>
            <span class="p-report-list__plan p-report-list__plan--use">ご利用プラン</span>
            <span class="p-report-list__plan p-report-list__plan--type">和婚プラン</span>
          </div>

          <figure class="p-report-list__main">
            <img src="/img/report/rep1-1.jpg" alt="下鴨神社での結婚式 メイン写真">
          </figure>

          <ul class="p-report-list__thumbs">
            <li class="p-report-list__thumb"><img src="/img/report/rep1-2.jpg" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep1-3.jpg" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep1-4.jpg" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep1-5.jpg" alt=""></li>
          </ul>

          <div class="p-report-list__comments">
            <div class="p-report-list__comment">
              <div class="p-report-list__comment-head">
                <h3 class="p-report-list__comment-title">スタッフから</h3>
              </div>
              <p class="p-report-list__comment-text">とっても美しい新婦様でどのお写真を拝見してもうっとりします。また新郎新婦のお二人の笑顔が見ているこちらまで幸せな気持ちにさせてくれます。沢山のお写真、誠にありがとうございました。末永くお幸せにお過ごしください♡</p>
            </div>
          </div>

          <div class="p-report-list__btn-wrap">
            <a class="p-report-list__btn" href="#">ブログで見る</a>
          </div>
        </div>
      </article>

      <!-- レポート2件目 -->
      <article class="p-report-list__item">
        <div class="p-report-list__inner">
          <h2 class="p-report-list__title">梅宮大社で前撮り</h2>

          <div class="p-report-list__meta">
            <span class="p-report-list__place">京都府　S様</span>
            <span class="p-report-list__plan p-report-list__plan--use">ご利用プラン</span>
            <span class="p-report-list__plan p-report-list__plan--type">京都前撮りプラン</span>
          </div>

          <figure class="p-report-list__main">
            <img src="/img/report/rep2-1.jpg" alt="梅宮大社での前撮り メイン写真">
          </figure>

          <ul class="p-report-list__thumbs">
            <li class="p-report-list__thumb"><img src="/img/report/rep2-2.jpg" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep2-3.jpg" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep2-4.jpg" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep2-5.jpg" alt=""></li>
          </ul>

          <div class="p-report-list__comments">
            <div class="p-report-list__comment">
              <div class="p-report-list__comment-head">
                <h3 class="p-report-list__comment-title">スタッフから</h3>
              </div>
              <p class="p-report-list__comment-text">白無垢と引振袖をご使用くださいました。どちらのお衣装もよくお似合いで素敵なお写真ばかりです。ヘアスタイルは新日本髪にされました。</p>
            </div>
          </div>

          <div class="p-report-list__btn-wrap">
            <a class="p-report-list__btn" href="#">ブログで見る</a>
          </div>
        </div>
      </article>

      <!-- レポート3件目（コメント2カラム＝お客様から＋スタッフから） -->
      <article class="p-report-list__item">
        <div class="p-report-list__inner">
          <h2 class="p-report-list__title">一目惚れの色打掛</h2>

          <div class="p-report-list__meta">
            <span class="p-report-list__place">香川県　K様</span>
            <span class="p-report-list__plan p-report-list__plan--use">ご利用プラン</span>
            <span class="p-report-list__plan p-report-list__plan--type">京都前撮り「結」プラン</span>
          </div>

          <figure class="p-report-list__main">
            <img src="/img/report/rep3-1.png" alt="一目惚れの色打掛 メイン写真">
          </figure>

          <ul class="p-report-list__thumbs">
            <li class="p-report-list__thumb"><img src="/img/report/rep3-2.png" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep3-3.png" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep3-4.png" alt=""></li>
            <li class="p-report-list__thumb"><img src="/img/report/rep3-5.png" alt=""></li>
          </ul>

          <div class="p-report-list__comments">
            <div class="p-report-list__comment">
              <div class="p-report-list__comment-head">
                <h3 class="p-report-list__comment-title">お客様から</h3>
              </div>
              <p class="p-report-list__comment-text">とても楽しい時間でした。<br>念願だった色打掛を着ることができ、白無垢もとてもすてきなお着物で嬉しかったです。<br>ヘアメイクの先生もとても楽に着付けていただきまして、撮影も苦しくなく、とてもありがたかったです。<br><br>いい思い出になり、京都へ出かけて、さらに華結びさんにお願いしてよかったねと主人とも話しております。<br>お世話になりました。</p>
            </div>
            <div class="p-report-list__comment">
              <div class="p-report-list__comment-head">
                <h3 class="p-report-list__comment-title">スタッフから</h3>
              </div>
              <p class="p-report-list__comment-text">新郎新婦様共に（特に新郎様？）ピンクの色打掛が気に入っていただけたらしく、この着物を着たいから華結びを選んでくださったとのこと。<br>当日も「これが着られて嬉しい！」と仰っていただきました。<br>撮影終了後お着替えになった後も着物のお写真を撮影され、喜んでいただけたのが感じられました。</p>
            </div>
          </div>

          <div class="p-report-list__btn-wrap">
            <a class="p-report-list__btn" href="#">ブログで見る</a>
          </div>
        </div>
      </article>
    </section>
    <!-- ===== 幸せレポートページ固有コンテンツここまで ===== -->
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
