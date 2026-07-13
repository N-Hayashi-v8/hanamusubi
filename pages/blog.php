<?php
$pageTitle = '華結びブログ';
$breadcrumbLabel = '華結びブログ＜京都・華結び＞';
?>
<!DOCTYPE html>
<html lang="ja">
<?php include __DIR__ . '/../includes/head.php'; ?>

<body class="blog-page">
<?php include __DIR__ . '/../includes/header-page.php'; ?>

<?php include __DIR__ . '/../includes/sidebar.php'; ?>

  <main class="l-main">
<?php include __DIR__ . '/../includes/page-title.php'; ?>

    <!-- ===== ここからブログページ固有コンテンツ ===== -->
    <!-- ブログ一覧: 3カラム（左2列=カード / 右1列=カテゴリ）。右サイドバーは後日実装 -->
    <!-- 記事テキスト・サムネ画像は詳細スクショ未共有のため暫定（要確認）。サムネは img/blog/ に追加予定 -->
    <section class="p-blog-list">
      <div class="p-blog-list__inner">
        <!-- 左: 2列カードグリッド（上から順） -->
        <div class="p-blog-list__main">
          <ul class="p-blog-list__cards">
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog01.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.05.02 | 衣装ご来店のお客様</p>
                  <h2 class="p-blog-card__title">【白打掛】飛鶴に牡丹 青</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog02.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.30 | 京都神社結婚式</p>
                  <h2 class="p-blog-card__title">【白無垢】吹き寄せライン 鳳凰七宝／【引き振袖】紅梅四傘に鶴</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog03.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.24 | 婚礼衣装について</p>
                  <h2 class="p-blog-card__title">色打掛 藤牡丹</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog04.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.24 | 京都神社結婚式</p>
                  <h2 class="p-blog-card__title">【色打掛】黒地 四季詰御所車／【色打掛】赤菖蒲に鶴</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog05.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.19 | 京都神社結婚式</p>
                  <h2 class="p-blog-card__title">【白打掛】相良四季草花鳳凰</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog06.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.15 | 京都神社結婚式</p>
                  <h2 class="p-blog-card__title">【色打掛】赤菖蒲に鶴</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog07.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.12 | 京都神社結婚式</p>
                  <h2 class="p-blog-card__title">【白無垢】相良四季草花鳳凰 牡丹に鶴</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog08.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.10 | 婚礼衣装について</p>
                  <h2 class="p-blog-card__title">【色打掛】重ね仕立て 春七宝に鳳凰</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog09.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.09 | 京都神社結婚式</p>
                  <h2 class="p-blog-card__title">【白無垢】御所車に花車</h2>
                </div>
              </a>
            </li>
            <li class="p-blog-card">
              <a class="p-blog-card__link" href="#">
                <div class="p-blog-card__thumb">
                  <img class="p-blog-card__img" src="/img/blog/blog10.jpg" alt="">
                </div>
                <div class="p-blog-card__body">
                  <p class="p-blog-card__meta">2024.04.05 | 京都神社結婚式</p>
                  <h2 class="p-blog-card__title">【白無垢】黒地 相良刺繍 牡丹に飛鶴／【引振袖】鳥居ユキ黒裾取り鶴</h2>
                </div>
              </a>
            </li>
          </ul>
        </div>
        <!-- 右: カテゴリサイドバー（幅255px） -->
        <aside class="p-blog-cat">
          <div class="p-blog-cat__head">
            <img class="p-blog-cat__deco" src="/img/blog/bg_category01.png" alt="">
            <h2 class="p-blog-cat__title"><span class="p-blog-cat__mark">◆</span>カテゴリ</h2>
          </div>
          <ul class="p-blog-cat__list">
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">ご案内</a></li>
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">京都神社結婚式</a></li>
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">衣装ご利用のお客様</a></li>
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">打掛マメ知識</a></li>
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">衣装レンタル全国発送いたします</a></li>
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">華結びお得情報</a></li>
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">京都前撮り</a></li>
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">婚礼衣装について</a></li>
            <li class="p-blog-cat__item"><a class="p-blog-cat__link" href="#">ちょっとウラ話</a></li>
          </ul>
        </aside>
      </div>
    </section>

    <!-- ページ送り（2・3ページは未作成のためリンクは仮置き #） -->
    <nav class="p-blog-pager" aria-label="ページ送り">
      <ul class="p-blog-pager__list">
        <li class="p-blog-pager__item"><a class="p-blog-pager__link is-current" href="#" aria-current="page">1</a></li>
        <li class="p-blog-pager__item"><a class="p-blog-pager__link" href="#">2</a></li>
        <li class="p-blog-pager__item"><a class="p-blog-pager__link" href="#">3</a></li>
        <li class="p-blog-pager__item"><a class="p-blog-pager__link" href="#" aria-label="次のページ">&gt;</a></li>
        <li class="p-blog-pager__item"><a class="p-blog-pager__link p-blog-pager__link--last" href="#" aria-label="最後のページ">≫</a></li>
      </ul>
    </nav>
    <!-- ===== ブログページ固有コンテンツここまで ===== -->
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
