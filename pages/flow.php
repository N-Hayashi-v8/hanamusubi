<?php
$pageTitle = 'ご利用の流れ';
$breadcrumbLabel = 'ご利用の流れ＜京都・華結び＞';
?>
<!DOCTYPE html>
<html lang="ja">
<?php include __DIR__ . '/../includes/head.php'; ?>

<body class="flow-page">
<?php include __DIR__ . '/../includes/header-page.php'; ?>

<?php include __DIR__ . '/../includes/sidebar.php'; ?>

  <main class="l-main">
<?php include __DIR__ . '/../includes/page-title.php'; ?>

    <!-- ===== ここからご利用の流れページ固有コンテンツ ===== -->
    <!-- 大section: ご利用の流れ（白カードを地色グレーの上に積む。各ステップ共通モチーフ＝番号見出し＋金下線） -->
    <section class="p-flow">
      <div class="p-flow__inner">

        <!-- STEP1: 衣装を選ぶ -->
        <div class="p-flow__panel">
          <div class="p-flow__head">
            <span class="p-flow__num">1.</span>
            <h2 class="p-flow__title">衣装を選ぶ</h2>
          </div>

          <div class="p-flow__select">
            <div class="p-flow__select-img">
              <img src="/img/flow/img_flow01.png" alt="衣装一覧ページのサンプル">
            </div>
            <div class="p-flow__select-body">
              <p class="p-flow__lead">当サイトにて、ご試着を希望される衣装をお選びください。「京 和装 WEDDING 華結び」は京都でもトップクラスの衣装点数を誇り、古典からモダン柄、ブランドものなど幅広い品揃え。リーズナブルでありながら上質な衣装を多数取り揃えております。</p>

              <div class="p-flow__note">
                <p class="p-flow__note-title">※試着されない方</p>
                <p class="p-flow__note-text">ご試着されずにそのままレンタル予約も、もちろん可能です。</p>
                <a class="p-flow__note-link" href="#apply">4.お申込み〜衣装発送へ</a>
              </div>
            </div>
          </div>

          <div class="p-flow__btn-wrap">
            <a class="p-flow__btn-black" href="/pages/rental.php">レンタル衣装一覧</a>
          </div>
        </div>

        <!-- 分岐ラベル（来店試着できる / できない）。ピル＋下矢印が焼き込まれた画像 -->
        <div class="p-flow__branch">
          <p class="p-flow__branch-item">
            <img src="/img/flow/ico_flow01_pc.png" alt="来店試着できる">
          </p>
          <p class="p-flow__branch-item">
            <img src="/img/flow/ico_flow02_pc.png" alt="来店試着できない">
          </p>
        </div>

        <!-- STEP2: ご来店・来店予約 / 宅配試着サービス（同じカードを2枚横並び） -->
        <div class="p-flow__cols">
          <div class="p-flow__panel p-flow__panel--half">
            <div class="p-flow__head">
              <span class="p-flow__num">2.</span>
              <h2 class="p-flow__title">ご来店・来店予約</h2>
            </div>
            <p class="p-flow__lead">フォームか、お電話にてご試着の予約をお願いします。追ってスタッフよりお客様へ直接ご連絡を差し上げ、ご来館日の相談をさせて頂きます。希望の衣装が決まっていらっしゃらなくても、是非お越しください。</p>
            <div class="p-flow__contact">
              <p class="p-flow__tel">
                <img src="/img/flow/btn_tel01_pc.png" alt="TEL.075-491-2010 営業時間 10:00〜18:00">
              </p>
              <a class="p-flow__btn-gold" href="#">
                <svg class="p-flow__btn-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                  <rect x="3" y="5" width="18" height="14" rx="1.5" />
                  <path d="M3.5 6.5 12 13l8.5-6.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                ご相談・来店予約
              </a>
            </div>
          </div>

          <div class="p-flow__panel p-flow__panel--half">
            <div class="p-flow__head">
              <span class="p-flow__num">2.</span>
              <h2 class="p-flow__title">宅配試着サービス</h2>
            </div>
            <p class="p-flow__lead">様々な理由でご試着に来店出来ない方のために、宅配試着サービスを行っております。ご自宅で、ご家族と上質な華結びの衣装をご覧ください。</p>
            <div class="p-flow__btn-row">
              <a class="p-flow__btn-dark" href="#">詳しいサービス内容</a>
              <a class="p-flow__btn-dark" href="#">フォームから申し込む</a>
            </div>
          </div>
        </div>

        <!-- STEP2→3の下矢印（来店試着の導線なので左カラム下に寄せる） -->
        <p class="p-flow__arrow p-flow__arrow--left">
          <img src="/img/flow/ico_arrow01_pc.png" alt="">
        </p>

        <!-- STEP3: ご試着・お衣装選び -->
        <div class="p-flow__panel">
          <div class="p-flow__head">
            <span class="p-flow__num">3.</span>
            <h2 class="p-flow__title">ご試着・お衣装選び</h2>
          </div>
          <p class="p-flow__lead">京都の雰囲気が漂う京町家（華結び店舗）にて、お好きな衣装をゆっくりご試着いただけます。お客様の好みをお伺いしながら大切なお衣装選びのお手伝いを致します。ご来店された時にご契約の必要はございませんので、お気軽にお越しくださいませ。</p>

          <ul class="p-flow__trial">
            <li class="p-flow__trial-item">
              <img src="/img/flow/img_trial_list01_pc.jpg" alt="">
              <p class="p-flow__trial-cap">カウンセリング後、サイトから選んだ打掛以外にも数着ご覧いただきます。豪華な打掛に皆さんうっとりされます。</p>
            </li>
            <li class="p-flow__trial-item">
              <img src="/img/flow/img_trial_list02_pc.jpg" alt="">
              <p class="p-flow__trial-cap">掛下を着て衣装を羽織り、本番の雰囲気に。簡易的にですが実際にご試着いただきますので、胸元が開いたお洋服でお越しいただくとイメージが湧きやすくなります。</p>
            </li>
            <li class="p-flow__trial-item">
              <img src="/img/flow/img_trial_list03_pc.jpg" alt="">
              <p class="p-flow__trial-cap">スタッフのアドバイスの元、顔写りのいいものや身長に合ったものを何着か試着。楽しい時間ですね。写真撮影も可能です。</p>
            </li>
          </ul>
        </div>

        <!-- STEP3→4の下矢印 -->
        <p class="p-flow__arrow">
          <img src="/img/flow/ico_arrow01_pc.png" alt="">
        </p>

        <!-- STEP4: 申し込み〜衣装発送（STEP1注記「※試着されない方」の飛び先） -->
        <div class="p-flow__panel" id="apply">
          <div class="p-flow__head">
            <span class="p-flow__num">4.</span>
            <h2 class="p-flow__title">申し込み〜衣装発送</h2>
          </div>
          <p class="p-flow__lead">ご契約はご来店の際だけでなく、後日ご検討の上お返事いただいても結構です。ご契約はメールやお電話でも承っております。衣装の発送や返送についての詳細は、華結びのスタッフが会場の担当者様に直接ご連絡して打ち合わせを致します。お衣装の出荷日までにお衣装についてのご変更や追加、気になる事などがあればお気軽にお問い合わせください。</p>
          <div class="p-flow__contact p-flow__contact--fixed">
            <p class="p-flow__tel">
              <img src="/img/flow/btn_tel01_pc.png" alt="TEL.075-491-2010 営業時間 10:00〜18:00">
            </p>
            <a class="p-flow__btn-inquiry" href="#">
              <img src="/img/flow/btn_inquery02_pc.png" alt="ご相談・来店予約">
            </a>
          </div>
        </div>

        <!-- STEP4→5の下矢印 -->
        <p class="p-flow__arrow">
          <img src="/img/flow/ico_arrow01_pc.png" alt="">
        </p>

        <!-- STEP5: お衣装ご利用当日（最後のステップなので矢印なし） -->
        <div class="p-flow__panel">
          <div class="p-flow__head">
            <span class="p-flow__num">5.</span>
            <h2 class="p-flow__title">お衣装ご利用当日</h2>
          </div>
          <div class="p-flow__select">
            <div class="p-flow__select-img">
              <img src="/img/flow/img_flow04.jpg" alt="挙式当日の和装姿">
            </div>
            <div class="p-flow__select-body">
              <p class="p-flow__lead">お客様からご指定いただいた場所へご使用日の前々日〜前日に到着するように手配致します。荷物の到着確認もスタッフが行いますのでご安心ください。お客様が大切な日にお召しになるお衣装は、スタッフ一同心を込めてメンテナンスを行い大切に梱包してお送りしております。思い出に残る素晴らしい一日をお過ごしください。</p>
            </div>
          </div>
        </div>

        <!-- 末尾: お衣装ご利用に関するご注意（上のSTEP群とは8rem離す） -->
        <div class="p-flow__notice">
          <div class="p-flow__notice-head">
            <h2 class="p-flow__notice-title">お衣装ご利用に関するご注意</h2>
          </div>
          <ul class="p-flow__notice-list">
            <li class="p-flow__notice-item">ご契約前に衣装持ち込みについてお客様ご自身で会場へご連絡いただき、了解を取っていただきます様お願い申し上げます。また、お脱ぎになった衣装の片付けと梱包もお客様自身でご手配下さいませ。衣装持ち込みに関するトラブルや、会場様ご指定の持ち込み料金等の発生に関しては、当店では責任を負いかねますので充分ご注意下さいませ。</li>
            <li class="p-flow__notice-item">お衣装は着付け用品を含め当社指定の一式にてご用意をしております。万が一、着付けをされる方からのご指定がある場合は事前にご相談下さいませ。</li>
            <li class="p-flow__notice-item">お衣装代金には「往復送料・基本クリーニング料」が含まれております。通常の着用汚れについては基本クリーニング料にてメンテナンスをしておりますが、食べこぼしやお化粧汚れなど汚れや傷みが著しい場合、別途メンテナンス料をご請求差し上げる場合がございます。予めご了承下さいませ。</li>
          </ul>
        </div>

      </div>
    </section>
    <!-- ===== ご利用の流れページ固有コンテンツここまで ===== -->
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
