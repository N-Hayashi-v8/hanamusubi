<?php
$pageTitle = 'レンタル衣装';
$breadcrumbLabel = 'レンタル衣装 | 色打掛・白無垢のレンタル＜京都・華結び＞';
?>
<!DOCTYPE html>
<html lang="ja">
<?php include __DIR__ . '/../includes/head.php'; ?>

<body class="rental-page">
<?php include __DIR__ . '/../includes/header-page.php'; ?>

<?php include __DIR__ . '/../includes/sidebar.php'; ?>

  <main class="l-main">
<?php include __DIR__ . '/../includes/page-title.php'; ?>

    <!-- ===== ここからレンタル衣装ページ固有コンテンツ（全4セクション） ===== -->
    <!-- section1: 色打掛（帯写真＋右寄り白箱） -->
    <section class="p-costume">
      <div class="p-costume__inner">
        <img class="p-costume__img" src="/img/rental/bg_cosutume01_pc.png" alt="色打掛を着た花嫁">
        <div class="p-costume__box">
          <h2 class="p-costume__title">色打掛</h2>
          <p class="p-costume__text">色鮮やかで華やかな色打掛は、洋装では表現できない重厚感と品格があります。その豪華さから披露宴で着用される事が多い衣装で、刺繍や金彩加工など多彩な技法を取り入れた色打掛は芸術品と言えます。</p>
          <a class="p-costume__more" href="#">一覧を見る</a>
        </div>
      </div>
    </section>

    <!-- section2: 白無垢（帯写真＋左寄り白箱 --reverse） -->
    <section class="p-costume p-costume--reverse">
      <div class="p-costume__inner">
        <img class="p-costume__img" src="/img/rental/bg_costume02_pc.png" alt="白無垢を着た花嫁">
        <div class="p-costume__box">
          <h2 class="p-costume__title">白無垢</h2>
          <p class="p-costume__text">全てを白一色で統一した最も代表的な「和」の婚礼衣裳。近年では金彩や銀彩加工の施されたものや、襟や褄が赤い「裏紅」も人気。どれも同じように見える白無垢も、実は柄ゆきや質感がそれぞれに違い個性的です。</p>
          <a class="p-costume__more" href="#">一覧を見る</a>
        </div>
      </div>
    </section>

    <!-- section3: 引振袖（帯写真＋右寄り白箱・section1型） -->
    <section class="p-costume">
      <div class="p-costume__inner">
        <img class="p-costume__img" src="/img/rental/bg_costume03_pc.png" alt="引振袖を着た花嫁">
        <div class="p-costume__box">
          <h2 class="p-costume__title">引振袖</h2>
          <p class="p-costume__text">一般的な振袖とは異なり、裾を引いた「引き着」のため、料亭などで披露宴をされる方に人気。打掛とは違い小物や帯が目立つため、帯の結び方や色使いなどでイメージが変わりコーディネートが楽しい着物です。</p>
          <a class="p-costume__more" href="#">一覧を見る</a>
        </div>
      </div>
    </section>

    <!-- section4: 留袖（2カラム・画像左／白箱右） -->
    <section class="p-costume-cols">
      <div class="p-costume-cols__img">
        <img src="/img/rental/img_costume04.png" alt="留袖を着た女性">
      </div>
      <div class="p-costume-cols__box">
        <h2 class="p-costume-cols__title">留袖</h2>
        <p class="p-costume-cols__text">留袖は既婚女性にとっての第一礼装。新郎新婦様のお母様やご親族の皆様にお召しいただけます。</p>
        <a class="p-costume-cols__more" href="#">一覧を見る</a>
      </div>
    </section>

    <!-- section5: 訪問着（2カラム・白箱左／画像右 --reverse） -->
    <section class="p-costume-cols p-costume-cols--reverse">
      <div class="p-costume-cols__img">
        <img src="/img/rental/img_costume05.png" alt="訪問着を着た女性">
      </div>
      <div class="p-costume-cols__box">
        <h2 class="p-costume-cols__title">訪問着</h2>
        <p class="p-costume-cols__text">幅広い年齢層の方がお召しいただける、留袖に次ぐ準礼装。ご親族の方以外のご結婚式や披露宴ご出席のお衣装に。</p>
        <a class="p-costume-cols__more" href="#">一覧を見る</a>
      </div>
    </section>

    <!-- section6: 振袖（2カラム・画像左／白箱右） -->
    <section class="p-costume-cols">
      <div class="p-costume-cols__img">
        <img src="/img/rental/img_costume06.png" alt="振袖を着た女性">
      </div>
      <div class="p-costume-cols__box">
        <h2 class="p-costume-cols__title">振袖</h2>
        <p class="p-costume-cols__text">華やかな彩りを添える、未婚女性の第一礼装。姉妹様や親族様、友人様まで幅広くお召し頂けるお衣装です。</p>
        <a class="p-costume-cols__more" href="#">一覧を見る</a>
      </div>
    </section>
    <!-- ===== レンタル衣装ページ固有コンテンツここまで ===== -->
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
