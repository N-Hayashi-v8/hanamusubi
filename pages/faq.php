<?php
$pageTitle = 'よくあるご質問';
$breadcrumbLabel = 'よくあるご質問＜京都・華結び＞';
?>
<!DOCTYPE html>
<html lang="ja">
<?php include __DIR__ . '/../includes/head.php'; ?>

<body class="faq-page">
<?php include __DIR__ . '/../includes/header-page.php'; ?>

<?php include __DIR__ . '/../includes/sidebar.php'; ?>

  <main class="l-main">
<?php include __DIR__ . '/../includes/page-title.php'; ?>

    <!-- ===== ここからよくある質問ページ固有コンテンツ ===== -->
    <!-- section1: カテゴリーナビ（各Q&Aセクションへのアンカー・スムーススクロール） -->
    <!-- 300×60 の枠ボタンを 3列×2行。箱同士の縦横余白は 40px -->
    <section class="p-faq-nav">
      <ul class="p-faq-nav__list">
        <li class="p-faq-nav__item">
          <a class="p-faq-nav__btn" href="#q-costume">衣装について</a>
        </li>
        <li class="p-faq-nav__item">
          <a class="p-faq-nav__btn" href="#q-contract">ご契約について</a>
        </li>
        <li class="p-faq-nav__item">
          <a class="p-faq-nav__btn" href="#q-reserve">予約・試着について</a>
        </li>
        <li class="p-faq-nav__item">
          <a class="p-faq-nav__btn" href="#q-other">その他</a>
        </li>
        <li class="p-faq-nav__item">
          <a class="p-faq-nav__btn" href="#q-payment">お支払いについて</a>
        </li>
        <li class="p-faq-nav__item">
          <a class="p-faq-nav__btn" href="#q-rental">レンタルについて</a>
        </li>
      </ul>
    </section>

    <!-- section2: Q&A本体（カテゴリーごと。アコーディオン式 details/summary） -->
    <!-- 衣装について（ナビ #q-costume の着地先） -->
    <section class="p-faq" id="q-costume">
      <div class="p-faq__inner">
        <h2 class="p-faq__title">衣装について</h2>
        <ul class="p-faq__list">
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
                <span class="p-faq__q-mark">Q</span>
                <span class="p-faq__q-text">妊婦でも和装の婚礼衣装が着られますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">もちろんです。挙式当日の妊娠週数により、通常とは違う「作り帯」で楽な着付けが出来るセットも用意していますので、ご体調によりスタッフにご相談ください。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
                <span class="p-faq__q-mark">Q</span>
                <span class="p-faq__q-text">新郎の衣装はレンタルできますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">新郎様の紋付き袴もお取り扱いしております。他にも列席者様のモーニングコートセット、留袖・訪問着などもございます。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
                <span class="p-faq__q-mark">Q</span>
                <span class="p-faq__q-text">綿帽子や角隠しもレンタルできますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">出来ます。衣装と一緒にお送り致します。綿帽子には大きさの違う「かつら用」と「洋髪用」の2種類を用意していますので、当日のヘアメイクご担当者との打ち合わせの際にサイズをご確認ください。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
                <span class="p-faq__q-mark">Q</span>
                <span class="p-faq__q-text">小物セットもレンタルできますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">小物セットは衣装代金に含まれていますのでご安心ください。色も衣装に合わせてお客様のお好きなものをお選びいただけます。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
                <span class="p-faq__q-mark">Q</span>
                <span class="p-faq__q-text">挙式の衣装のまま披露宴に出席できますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">出来ます。小物の色を変えたりヘアアクセサリーを付け替えるだけで雰囲気が変わります。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
                <span class="p-faq__q-mark">Q</span>
                <span class="p-faq__q-text">挙式は白無垢でないといけませんか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">一般的に挙式の際は白無垢を着用される方が多いですが、色打掛や引振袖でも大丈夫です。</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <!-- ご契約について（ナビ #q-contract の着地先） -->
    <section class="p-faq" id="q-contract">
      <div class="p-faq__inner">
        <h2 class="p-faq__title">ご契約について</h2>
        <ul class="p-faq__list">
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">キャンセルした場合どうなりますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">ご契約額に応じ、弊社規定のキャンセル料を頂戴致します。<br>1.ご契約日～ご契約日から7日目…キャンセル料なし<br>2.ご契約日から8日目～ご使用日31日前…ご契約額の20％<br>3.ご使用日30日前～10日前…ご契約額の80％<br>4.ご使用日前日～当日…ご契約額の100％</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">来店せずに契約する事は出来ますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">遠方にお住まいなどでご来店が叶わないお客様には、画像で衣装を選んでいただきご契約していただけます。また、来店は難しいけれど実際に衣装を見たいとお考えの方は「ご自宅試着サービス」をご利用ください。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">契約は来店時にしないといけませんか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">試着でご来店の際にご契約いただくか、または後日ご検討の上お電話やメールでのお申込みも受け付けています。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">衣装選びから契約までの流れをおしえてください</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">詳細は<a class="p-faq__a-link" href="/pages/flow.php">「ご利用の流れ」</a>のページをご覧ください。</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <!-- 予約・試着について（ナビ #q-reserve の着地先） -->
    <section class="p-faq" id="q-reserve">
      <div class="p-faq__inner">
        <h2 class="p-faq__title">予約・試着について</h2>
        <ul class="p-faq__list">
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">試着の時間はどのくらいかかりますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">レンタルについてのご説明などをスタッフからさせていただきますが、その時間を合わせて早い方で1時間くらいです。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">試着する衣装は何点ですか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">ご試着の枚数は決まっていませんが、あまりたくさんご覧になると迷ってしまい決められなくなるようです。ご自分の好みの色や柄などをスタッフにお伝えいただき、ご試着されながらお気に入りの一枚を見つけてください。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">来店する時の注意点はありますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">ご来店いただいた場合は簡単にですがご試着をしていただきますので、出来るだけ衿元が開き気味のお洋服をお召しになるとイメージが湧きやすくなります。<br>また、髪が襟足にかかるくらい長い方は髪をアップに出来る髪留めをご持参ください。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">来店予約はどうすればいいですか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">ご来店予約はお電話（075-491-2010）か、メールで承っています。</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <!-- その他（ナビ #q-other の着地先） -->
    <section class="p-faq" id="q-other">
      <div class="p-faq__inner">
        <h2 class="p-faq__title">その他</h2>
        <ul class="p-faq__list">
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">小物セットや草履だけのレンタルはできますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">はい。その他にも綿帽子や角隠しのみのレンタルも承っております。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">契約した後で衣装の変更はできますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">はい。ただし、最終のお支払いがご利用日の10日前までですので、それ以降の変更で料金が変わる場合は衣装の出荷日までに差額をお支払いください。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">海外に住んでいるので来店ができません</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">華結びでは今まで何組も海外在住のお客様にご利用いただいております。ご来店が出来なくてもHPに掲載している画像でお衣装をお選びくださればレンタルしていただけます。</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <!-- お支払いについて（ナビ #q-payment の着地先） -->
    <section class="p-faq" id="q-payment">
      <div class="p-faq__inner">
        <h2 class="p-faq__title">お支払いについて</h2>
        <ul class="p-faq__list">
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">新郎新婦と列席者との請求を別にする事はできますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">出来ます。新郎家、新婦家それぞれの請求明細を別にしてお作りする事も可能です。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">クレジットカードで支払えますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">お支払いは現金か振込みのどちらかです。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">支払のタイミングは？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">ご契約時に内金として20,000円(税込)をお預かり致します（ご来店時もしくはご契約後1週間以内）。内金を除く残りのお支払いは、ご使用日の10日前までに全額頂戴致します。</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <!-- レンタルについて（ナビ #q-rental の着地先） -->
    <section class="p-faq" id="q-rental">
      <div class="p-faq__inner">
        <h2 class="p-faq__title">レンタルについて</h2>
        <ul class="p-faq__list">
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">発送と返送はどうすればいいですか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">衣装をお送りする場所、お脱ぎになる場所のそれぞれの担当者様に荷物の受取と返送をしてもらえるかどうかご確認ください。ご了承が得られましたら弊社から直接お電話をし、お届けのお日にちなど詳細をご相談させていただきます。</p>
              </div>
            </div>
          </li>
          <li class="p-faq__item">
            <button class="p-faq__q" type="button" aria-expanded="false">
              <span class="p-faq__q-mark">Q</span>
              <span class="p-faq__q-text">衣装はどこに送られますか？</span>
            </button>
            <div class="p-faq__a">
              <div class="p-faq__a-inner">
                <p class="p-faq__a-text">着付けをされる場所にお送り致します。神社の控室・ホテルの衣装室・提携の美容室など、お客様にご指定いただいた場所へお届けします。</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <!-- ===== よくある質問ページ固有コンテンツここまで ===== -->
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
