<?php
$pageTitle = '初めての方へ';
$breadcrumbLabel = '初めての方へ | 和装レンタルのいろは＜京都・華結び＞';
?>
<!DOCTYPE html>
<html lang="ja">
<?php include __DIR__ . '/../includes/head.php'; ?>

<body>
<?php include __DIR__ . '/../includes/header-page.php'; ?>

<?php include __DIR__ . '/../includes/sidebar.php'; ?>

  <main class="l-main">
<?php include __DIR__ . '/../includes/page-title.php'; ?>

    <!-- ===== ここから初めての方へページ固有コンテンツ ===== -->
    <!-- section1: メインビジュアル（全幅1枚画像） -->
    <section class="p-first-main">
      <img class="p-first-main__img" src="/img/first/mainimg01_pc.jpg" alt="初めての方へ">
    </section>

    <!-- section2: 花嫁衣装レンタルのいろは（テクスチャ背景＋中央テキスト） -->
    <section class="p-first-iroha">
      <h2 class="p-first-iroha__title">花嫁衣装レンタルのいろは</h2>
      <p class="p-first-iroha__text">
        和装には憧れるけれど、選び方がわからず戸惑っている花嫁様は多いです。<br>
        ポイントを抑えて、理想の和装花嫁になりましょう。
      </p>
    </section>

    <!-- section3: 花嫁衣装の種類（1100px・3カラム） -->
    <section class="p-first-type">
      <h2 class="p-first-type__heading">花嫁衣装の種類</h2>
      <ul class="p-first-type__list">
        <li class="p-first-type__item">
          <img class="p-first-type__img" src="/img/first/pic_type01.jpg" alt="色打掛">
          <h3 class="p-first-type__title">色打掛</h3>
          <p class="p-first-type__text">披露宴を華やかに彩る色打掛。和式のお食事会場はもちろん、ホテルでの披露宴でもその存在感を発揮します。織物から刺繍、染物など種類があり、色も定番の赤系だけでなく寒色系など多彩。</p>
          <a class="p-first-type__btn" href="#">一覧を見る</a>
        </li>
        <li class="p-first-type__item">
          <img class="p-first-type__img" src="/img/first/pic_type02.jpg" alt="白無垢">
          <h3 class="p-first-type__title">色打掛</h3>
          <p class="p-first-type__text">昔から伝わる「和」の婚礼衣装。小物から草履まで全て白で統一する事により「真っ白な気持ちで参ります」と言う思いを込めたお衣装ですが、近年は裏紅の白無垢も人気です。</p>
          <a class="p-first-type__btn" href="#">一覧を見る</a>
        </li>
        <li class="p-first-type__item">
          <img class="p-first-type__img" src="/img/first/pic_type03.jpg" alt="引振袖">
          <h3 class="p-first-type__title">色打掛</h3>
          <p class="p-first-type__text">打掛とは違い着物の裾を引きずったまま着用する婚礼衣装なので、料亭で披露宴をされる方におすすめ。着物と帯、小物の色を自分らしくコーディネイト出来るのも魅力のひとつ。</p>
          <a class="p-first-type__btn" href="#">一覧を見る</a>
        </li>
      </ul>
    </section>

    <!-- section4: 花嫁衣装の選び方（上border＋3行の2カラム：丸画像＋テキスト、行ごとに左右反転） -->
    <section class="p-first-choice">
      <h2 class="p-first-choice__heading">花嫁衣装の選び方</h2>
      <ul class="p-first-choice__list">
        <li class="p-first-choice__item">
          <div class="p-first-choice__img">
            <img src="/img/first/img_choice01.jpg" alt="">
          </div>
          <div class="p-first-choice__body">
            <h3 class="p-first-choice__title">顔写りを考えメインカラーを決める</h3>
            <p class="p-first-choice__text">「着物の事はよく分からない…」と衣装選びに不安を感じていらっしゃる方も多いのですが、自分に合う色は洋服も着物も同じ。まずはご自分に合った系統の色を見つけて、その後で微妙な色の違いや柄を決めていきましょう。</p>
          </div>
        </li>
        <li class="p-first-choice__item p-first-choice__item--reverse">
          <div class="p-first-choice__img">
            <img src="/img/first/img_choice02.jpg" alt="">
          </div>
          <div class="p-first-choice__body">
            <h3 class="p-first-choice__title">なりたいイメージの柄を選ぼう</h3>
            <p class="p-first-choice__text">例えば同じ赤系でも他の色との分量や柄によっても雰囲気が大きく変わります。古典的なイメージ、可愛らしいイメージ、カッコいいイメージ等々、こういう感じで着こなしたいという全体のイメージを膨らませてみましょう。</p>
          </div>
        </li>
        <li class="p-first-choice__item">
          <div class="p-first-choice__img">
            <img src="/img/first/img_choice03.jpg" alt="">
          </div>
          <div class="p-first-choice__body">
            <h3 class="p-first-choice__title">身長に合わせてさらに魅力的に</h3>
            <p class="p-first-choice__text">洋服と違い打掛のサイズはどれもほぼ同じなため、ご身長によって柄を決めるのもポイントのひとつです。例えばご身長が高い方は柄が大きく入っているもの、小柄な方は細かく小さな柄が入っているものにされると素敵です。</p>
          </div>
        </li>
      </ul>
    </section>

    <!-- section5: 着付け用品一式（上border＋中央見出し/リード → 小物ブロック2つ＋中border → 全幅画像） -->
    <section class="p-first-option">
      <h2 class="p-first-option__heading">着付け用品一式</h2>
      <p class="p-first-option__lead">お着付けに必要な小物類は全てセットになっているので、お届け後もご安心頂けます。</p>

      <div class="p-first-option__group">
        <div class="p-first-option__block">
          <h3 class="p-first-option__subtitle">飾り小物</h3>
          <p class="p-first-option__text">はこせこ、懐剣、末広、帯締め、帯揚げ、かかえ帯、草履<br>
            ※綿帽子、角隠しはオプションです。</p>
        </div>
        <div class="p-first-option__block">
          <h3 class="p-first-option__subtitle">飾り小物</h3>
          <p class="p-first-option__text">掛下、掛下帯、長襦袢、腰紐（5本）、伊達締め（2本）、衿芯（3本）、帯板（大小2枚）、帯枕、着付けベルト（2本）<br>
            ※肌襦袢（新婦様）と足袋（新郎新婦様）はプレゼント！</p>
        </div>
      </div>

      <div class="p-first-option__img">
        <img src="/img/first/img_option01_pc.jpg" alt="着付け用品一式">
      </div>
    </section>

    <!-- section6: 全国どこでも簡単レンタル（全幅 #F1F4F7・後続パンくずと地色を連続させる） -->
    <section class="p-first-rental">
      <div class="p-first-rental__inner">
        <h2 class="p-first-rental__heading">全国どこでも簡単レンタル</h2>
        <p class="p-first-rental__lead">華結びのレンタル衣装は「店舗にご来店」または「宅配試着サービス」でご決定いただき、<br>
          会場までの発送と返送はスタッフにお任せください！</p>
        <div class="p-first-rental__flow">
          <img src="/img/first/img_rental01_pc.jpg" alt="レンタルの流れ 01 衣装を選ぶ → 02 ご試着（京都店舗 or ご自宅）→ 03 会場にお届け（前日 or 前々日）→ 04 結婚式当日 → 05 ご返却（ご試着なしでご予約も可）">
        </div>
        <div class="p-first-rental__btn-wrap">
          <a class="p-first-rental__btn" href="#">レンタルの詳しい流れ</a>
        </div>
      </div>
    </section>

    <!-- ===== 初めての方へページ固有コンテンツここまで ===== -->
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
