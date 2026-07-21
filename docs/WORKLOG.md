# WORKLOG

## 2026-07-21

- 社用PCでの作業開始にあたり環境を確認・整備
  - Herd・PHPが未検出（`php`/`herd`コマンドがPATH無し）。ユーザーがHerd/DBnginを起動後に再確認したところ、Herd自体は`C:\Users\hayashi\.config\herd`に導入済み（PHP 8.4.23）でPATH未通過のみと判明。`hanamusubi`サイトはHerdのvalet Sitesに既にリンク済みで動作確認
  - `hanamusubi-wp/`（WordPress環境）はこのPCの`htdocs`配下に存在せず、DBnginのMySQLも`hanamusubi_wp`データベースが無い空インスタンスと判明。前回PC（2026-07-13作業）の環境がGit管理外のため引き継がれていなかった
  - Pythonが未導入（`WindowsApps`のストア誘導スタブのみ実体無し）だったため、winget で Python 3.13.14 を導入（本プロジェクトはPHP/SCSSでPython非依存だが、社用PC全般のツールとして）
  - VSCode組み込みPHP機能の「PHPのインストールが見つからない」通知に対応: ユーザー設定`settings.json`に`php.validate.executablePath`を追加（Herdの`php84/php.exe`を指定）。Intelephenseとは別の組み込み機能である点を確認
- WordPress環境（`hanamusubi-wp/`）を再構築
  - `wp-cli.phar`を配置、DBnginのMySQLに`hanamusubi_wp`データベースを作成（PHPの`mysqli`で直接作成。root/パス無し接続を確認）
  - `wp core download --locale=ja`（WordPress 7.0.2）→`wp config create`→`wp core install`（サイトタイトル「華結び-模写」、管理者は仮アカウント admin/hanamusubi-dev・要変更）
  - `herd link hanamusubi-wp`で`hanamusubi-wp.test`として公開。フロント・管理画面とも200を確認（Windows PowerShell 5.1は`-SkipCertificateCheck`未対応のためHTTPで確認）
- テーマ`hanamusubi`を新規作成し`includes/`のheader/footer/sidebarを移植（`docs/TODO.md` Next 1件目）
  - `css/`・`img/`・`js/`を静的サイトからテーマ配下へ丸ごとコピー（robocopy。終了コード1は「コピー成功」を意味し異常ではない）
  - `header.php`は共通の`<!DOCTYPE>`〜`wp_head()`〜`<body>`のみとし、大ロゴ(トップ)/小ロゴ(子ページ)の`<header>`タグ自体は`template-parts/site-header.php`・`site-header-front.php`に分離（重複を持たせない設計）。`sidebar.php`・`footer.php`（`wp_footer()`込み）も移植
  - `template-parts/page-title.php`・`breadcrumb.php`は`get_template_part()`の`$args`でタイトル・パンくずラベルを受け取る可変パーツに。`btn-field-page.php`・`contact.php`・`map.php`は静的パーツをそのまま移植
  - `front-page.php`に`index.php`のトップページ内容を移植。`page.php`・`index.php`（フォールバック用、WordPressテーマ必須ファイル）も作成
  - `functions.php`: `wp_enqueue_style/script`でdestyle/style.css・Google Fonts・main.js読込、`register_nav_menus`
  - `wp theme activate`は初回「独立したテーマには`index.php`が必要」エラー→追加して解消。有効化後、トップページ・検証用固定ページで全セクション200・PHP警告なしを確認（検証用ページは確認後削除）
- about/rental/production/first/flow/access/privacyの7ページを固定ページ化（`docs/TODO.md` Next 2件目）
  - 各`pages/xxx.php`の固有セクションをそのまま`page-xxx.php`（`Template Name`コメント付き）に移植。画像パスは`get_template_directory_uri()`基準、`href="/pages/xxx.php"`は`home_url()`基準に変更
  - rental/blog/faq/flow/report/access/privacyは静的サイトで`<body class="xxx-page">`により地色を出していたため、`functions.php`に`hanamusubi_body_classes()`を追加: ページテンプレート名（`page-rental.php`）から自動で`rental-page`等のbody classを付与するフィルターとし、ページごとの個別対応を不要にした
  - 7ページとも固定ページを作成しテンプレートを割り当て、200・PHP警告なし・セクション数/画像パスを確認
- ヘッダー/フッターのナビメニューを構築
  - 静的サイトはヘッダー9項目・フッター10項目（個人情報保護方針はフッターのみ）と項目数が異なるため、`register_nav_menus`に`primary`（ヘッダー）と`footer`の2ロケーションを用意し、`footer.php`の参照を`footer`ロケーションに変更
  - WP-CLIで「ヘッダーメニュー」「フッターメニュー」の2メニューを作成しそれぞれ割り当て。当初`wp menu location assign header-menu primary`のようにスラッグを推測したが日本語名はURLエンコードされたスラッグになるため失敗→`term_id`（3, 4）で指定し解決
  - `wp_nav_menu()`の`items_wrap`は`<ul>`の class しか制御できず、各`<li>`はWP既定の`menu-item-xx`系classになり静的サイトのSCSSが想定する`l-header__item`/`l-footer__item`が付かない問題が発覚→`nav_menu_css_class`フィルターを追加し、ロケーションに応じてclassを完全に置換
- ブログ・幸せレポート・FAQ の投稿タイプを設計・実装（`docs/TODO.md` Next 3件目）
  - 型は用途に応じて使い分け: ブログ＝標準投稿(post)＋標準カテゴリー（新規CPT不要と判断）／FAQ＝カスタム投稿タイプ`faq`＋カスタムタクソノミー`faq_category`（質問=タイトル・回答=本文で足りるためACF不要）／幸せレポート＝カスタム投稿タイプ`report`＋ACF（地域・プラン・サムネ4枚・コメント2種という定型の繰り返し項目があるため）
  - ACF（Advanced Custom Fields 無料版）をWP-CLIで導入・有効化。フィールド定義は管理画面UIで作らず`functions.php`内で`acf_add_local_field_group()`によりコード定義（Git管理下に残り環境間で再現できるようにするため）。メイン写真はACFフィールドを増やさずアイキャッチ（thumbnail）を流用
  - `page-blog.php`: `WP_Query`＋`paged`/`cat`クエリ引数で2カラムカード一覧・カテゴリ絞り込み・ページングを実装（静的サイトでは`href="#"`仮置きだった部分が、動的化により追加コストなしで実際に機能するようになった）。`single.php`はデザイン未確定のため共通chrome+本文のみの暫定実装
  - `page-faq.php`: カテゴリ用配列のslugをアンカー用id（`q-costume`等）と一致させ、静的サイトのページ内ナビをそのまま流用。アコーディオンJS（`js/main.js`の`.p-faq__q`セレクタ）は無変更で動作
  - `page-report.php`: ACFのgalleryフィールド・textareaフィールドから出力。コメントは`nl2br()`で改行を保持
  - テストデータ投入は個別のWP-CLI呼び出しではなく、`wp-load.php`を読み込む使い捨てPHPスクリプト（scratchpad）で一括実行（日本語テキストを含む大量データをシェル引数で渡す際の引用符崩れを回避するため）。画像は`wp_insert_attachment`+`wp_generate_attachment_metadata`でメディアライブラリに取り込み。ブログ10件・FAQ22件・レポート3件（サムネ計12枚）を投入し、レンダリング結果を確認
  - ブログ1件目のカテゴリ表記が元データで「衣装ご来店のお客様」となっており、サイドバーの9カテゴリ名（「衣装ご利用のお客様」）と不一致だったため、サイドバー側の名称に正規化して登録
  - ヘッダー/フッターメニューの「幸せレポート」「よくある質問」「ブログ」を`/pages/xxx.php`の仮リンクから実ページへ更新
- `docs/TODO.md`を更新: Next の3件（テーマ移植／固定ページ化／投稿タイプ設計）をDoneへ移動し集約クローズ。新たに気づいた残作業（パーマリンク整備・ブログ詳細デザイン）をNextへ追記

## 2026-07-13

- 静的HTML11ページ（`index.html` + `pages/*.html`）をPHP化
  - 全ページの共通部分（ヘッダー・サイドバー・フッター・お問い合わせ・Googleマップ・子ページ共通4ボタン帯・パンくず・ページタイトル見出し）を突き合わせ、構造が完全一致することを確認（差分は `<body class>`・`<title>`・パンくず末尾・report.htmlのみフォントweight追加、の4点のみ）
  - `includes/` を新設: `head.php`（`$pageTitle`/`$fontWeights`）・`header.php`（index専用大ロゴ）・`header-page.php`（子ページ共通）・`sidebar.php`・`page-title.php`（`$pageTitle`）・`breadcrumb.php`（`$breadcrumbLabel`）・`btn-field-page.php`・`contact.php`・`map.php`・`footer.php`。将来のWordPressテーマ化を見据え、ファイル名はWPのテンプレートパーツ規約に寄せた
  - パスをルート相対（`/css/...` `/img/...` `/js/...` `/pages/xxx.php` `/index.php`）に統一。これにより index と子ページで include の中身を完全に同一にできた（`../` の有無で分岐させる`$base`変数等が不要に）
  - `index.html`→`index.php`、`pages/*.html`→`pages/*.php` に変換。固有セクションの中身は無変更、パスのみ機械的に置換（sed抽出＋差分検証で転記ミスを防止）。report.htmlのみ `p-page-title` を使わず独自の `p-report-mv` のため page-title include は不使用
  - 副産物: `pages/blog.html` の既存バグ（`<h2 class="p-contact__title">` 直後に余分な `</div>` があり `.p-contact__box` が途中で閉じてDOM構造が壊れていた。一括置換事故の取りこぼしと推測）を、共通 `contact.php` 化により自動解消
  - 検証: 全PHPファイルをHerd付属PHP 8.4で構文チェック（`php -l`）、レンダリング結果を元HTMLと正規化diffして内容差分が空白・コメントのみであることを確認。旧`.html`11ファイルは削除（git管理下のため復元可能）
  - `herd link` で `hanamusubi.test` として動作確認（全ページ200 OK）
- WordPress環境を新規構築（`hanamusubi-wp/`。今回のPHP化とは別フォルダ、既存の模写サイトはそのまま維持）
  - Herd無料版は`services`（MySQL等）がPro限定と判明。DBnginを導入しMySQL 9.7.1をローカルに用意（Windows版のMySQLは既知の不具合報告があるが、今回は問題なく動作）。データベース `hanamusubi_wp` を作成
  - WP-CLI（`wp-cli.phar`、Herd付属PHPで実行）を導入。`core download --locale=ja`（初回はPHPのデフォルトmemory_limit 128MBで展開時にメモリ不足→`-d memory_limit=512M`で解消）→`config create`（DBngin接続情報）→`core install`（サイトタイトル・管理者アカウント）を実行し、日本語版WordPress 7.0.1のインストールが完了
  - `herd link hanamusubi-wp` で `hanamusubi-wp.test` として公開。フロント200・管理画面302（ログイン画面へのリダイレクトで正常）を確認
  - 次段階（未着手）: `includes/` のheader/footer/sidebarをテーマとして移植、about等をページテンプレート化、ブログ/幸せレポート/FAQを投稿タイプとして再設計

## 2026-06-30

- フォルダ階層の見直し（可読性向上のリファクタ。CSS 出力結果は不変）
  - 共通画像を `img/common/` へ分離: `logo_nav01.png`/`logo02.png`/`bg_pattern03.png`/`bg_btn01.png`（全ページ・レイアウト共通）を `img/top/` から移動（git mv で履歴保持）。HTML 全11ページ・SCSS 4ファイル・コンパイル済み `css/style.css` の参照を一括更新
  - 未参照のデッドファイル3つを削除: ルート直下 `img/logo02.png`・`img/logo_nav01 1.svg`（スペース付き名）・`img/top/img_rental01_pc.png`（旧素材）。リンク切れ0件を確認
  - `scss/object/project/` を「共通＋ページ別」サブフォルダに再編: `common`(side/page-title/btn-field/contact/map)・`top`(mv/price/intro/rental/belief/cta/blog/report)・`about`・`access`・`first`・`production`・`report`・`blog`・`rental`・`flow`・`faq`・`privacy`。44ファイルを git mv、各ファイルの `@use "../../global"` を `../../../global` に補正。`_index.scss` は `@forward` の並び順（＝CSS 出力順）を1行も変えずパス付きに書き換え、上書き競合による表示崩れを回避。命名衝突気味だった top の `_blog`/`_report` と子ページの `blog-*`/`report-*` が物理的に分離
  - img/top・scss/layout・global・foundation 等はフラットが適切と判断し、これ以上の分割はしない方針を確認
- コメント整理（レビュー提出向け。コードの値・設計意図は保持し、仮版の痕跡と冗長メモを除去）
  - 「要確認」マーカーを全除去（304行）・先頭の「Figma 未共有のため仮置き」宣言ブロックを除去。複文は句点単位で宣言文だけ削り設計意図文は残す処理（perl）。「下側は対称と仮定」「（未指定）」等の設計判断・事実メモは意図的に残置
  - figma/px の純粋値メモ（`// Figma 42px`・`// 16px`・`// 20px に丸め` 等）・装飾区切り線 `// -----`（42本）・説明なしの hex メモ（`// #9E8846`）を除去（計199件）。計算根拠（`カラム間56px（976−460×2）`）・設計理由・セクション見出し・理由付き色メモは残置
  - sass CLI 不在のため自動コンパイル検証は不可。`@forward` 先・`@use` 先の到達性は静的に全件確認。Watch Sass の再コンパイルで最終確認予定

## 2026-06-29

- 個人情報保護方針ページ（`pages/privacy.html`）を作成・全10項目まで実装
  - 共通雛形を access.html から複製（head/`l-header--page`/`p-side`/`p-page-title`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）。差し替えは `<title>`＝個人情報保護方針・`p-page-title__text`＝個人情報保護方針・パンくず末尾＝個人情報保護方針＜京都・華結び＞・`<body class="privacy-page">`
  - 地色 #F1F4F7（`$color-bg-rental` 再利用）を body直付け（`.privacy-page`・新規 `_privacy.scss`）。下部共通エリアが上塗りするためグレーが見えるのはタイトル〜パンくず（faq/flow/blog と同方式）
  - 導線接続: 全10ページ（index/about/rental/production/first/flow/report/faq/blog/access）＋自ページのフッター「個人情報保護方針」`href="#"` → privacy へ。index はルート基準 `pages/privacy.html`、`pages/` 配下は `privacy.html`。一部ファイルが未読で Edit 不可だったため PowerShell の `[System.IO.File]` で BOM 無し UTF-8 のまま一括置換
  - section1 リード文 `p-privacy`（`_privacy.scss`）: 1100px インナー・タイトルセクションから `margin-top:10rem`。地の文の共通タイポgrafy＝Noto Serif JP 400 / 16px / 行高32px を `__lead`・`__text` に定義（このページの地の文は全てこれ）。URL「`https://kyo-hanamusubi.com/wp2019/`」は装飾なしの引用表記のためプレーンテキスト
  - section2 各項目 `p-privacy-list`（`_privacy.scss`）: 白箱（`$color-white`）1100px・`padding-inline:4.5rem` で中身（項目）幅1010px。項目間に #E3E0CE（`$color-bg-beige` 再利用）の罫線を `&__item + &__item` の `border-top` で。罫線の上下余白は `padding-block:4rem`。`__title`＝23px→24丸め（2.4rem）/行高30px・タイトル→本文 `margin-bottom:2rem`。段落間の余白は不要のため `__text` を並べるだけ（margin 0）
  - 4番は箇条書き `__bullets`/`__bullet`（行頭「・」を `::before`・`padding-left`＋`text-indent` のぶら下げで2行目以降を揃え）。5番は本文2段落。10番は見出しのみ
  - `object/project/_index.scss` に `@forward "privacy";`
  - `__title` 24px・各 `padding-block`/`margin` 等は Figma 実値未確定の仮置き（`// 要確認`）
- 模写全工程の完了レビューを実施し、横断チェックで2点を修正
  - 表記ゆれ「衣装製作」→「衣装制作」をヘッダーナビに合わせて統一（index＋全 pages のフッターナビ＋`about.html` 本文ボタン。計11ファイルを PowerShell の BOM 無し UTF-8 一括置換）
  - privacy 箇条書き `__bullet` のぶら下げ量を `1.4rem`→`1.6rem`（行頭「・」全角1em ぶん）に調整し、折り返し2行目を1行目の文字頭に揃え（`_privacy.scss`）
  - その他チェック結果は問題なし（画像パス欠落なし／ページ内アンカー全解決／`id` 重複なし／全 `<img>` に `alt`／`<title>` 全11ページ統一／見出し階層 h1→h2 整合）。faq の「よくある質問」(ナビ・フッター)／「よくあるご質問」(title・h1・パンくず・btn-field) の表記差は模写元どおりのため対応不要

## 2026-06-26

- アクセス・店舗案内ページ（`pages/access.html`）を作成・一通り完成
  - 共通雛形を faq.html から複製（head/`l-header--page`/`p-side`/`p-page-title`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）。差し替えは `<title>`＝アクセス・店舗案内 | 華結び-模写・`p-page-title__text`＝アクセス・店舗案内・パンくず末尾＝アクセス・店舗案内＜京都・華結び＞・`<body class="access-page">`
  - 背景方針: このページは**タイトルセクションだけ**地色 #F1F4F7。他ページのような body 直付けはせず、`.access-page .p-page-title` にのみ `background-color: $color-bg-rental` を適用（`_access-intro.scss`）。以降は base の `body{background:#fff}` の白がそのまま出る
  - 導線接続: 全9ページ（index/about/rental/production/first/flow/report/faq/blog）＋自ページのヘッダー・フッターの「アクセス」`href="#"` → access へ。index はルート基準 `pages/access.html`、`pages/` 配下は `access.html`。一部ファイルが未読で Edit 不可だったため PowerShell の `[System.IO.File]` で BOM 無し UTF-8 のまま一括置換
  - section1 `p-access-intro`（`_access-intro.scss`）: 白背景・中央寄せ・`padding-block:8rem`。タイトル「店舗案内」30px/42px、リード2行 17px/32px。フォントは Noto Serif JP 400＝base 既定のため未指定
  - section2 `p-access-shop`（`_access-shop.scss`）: `img_shop01_pc.jpg`（1920×530）を `width:100%` で全幅配置。Figma `top:648` は通常フロー位置として解釈し座標は書かない
  - section3 `p-access-info`（`_access-info.scss`）: 1100px。当初は見出しを上に独立配置していたが、指示で**見出しを左カラム内へ移動**し `align-items:flex-start` で見出し＋表（左610）と地図（右440）の上端を揃える型に変更。見出し下のborderは不要との指示で削除。◆は回転正方形の `::before`（`$color-gold-2`／`_first-option` と同パターン）。表＝ラベル `th` 幅12rem・地色 #F7F8FA（`$color-bg-gray`）、上罫線＋行区切り `#171716`（`$color-black`）、上下左右 `padding:2rem`。※注記は `list-style:disc` の黒点リスト（白背景）。地図画像 `img_map01.jpg` 440×380。下部に GoogleMap を `iframe`（1100×450）で埋め込み＝店舗住所「京都府京都市北区紫野上門前町23」を URL エンコードして `q=…&output=embed`
  - section4 `p-access-route`（`_access-route.scss`）: 「電車・バスでお越しの方」。`ico_train01.png`＋中央見出し・下に `1px solid #000000`。駅別ブロック2つ（JR京都駅／阪急烏丸駅）、`block + block` の上に区切り罫線 #000000。各ブロック＝◆駅名（金ひし形）＋【電車】【バス】ラベル＋本文
  - section5 `p-access-car`（`_access-car.scss`）: 「お車でお越しの方」。`ico_car01.png`＋中央見出し・下罫線 #000000・左寄せリード。GoogleMap **ストリートビュー**を `iframe`（1100×600）で埋め込み＝同住所に `&layer=c&output=svembed`。※キー無し svembed は住所だけだとパノラマに確実にスナップしない可能性あり（要・実機確認）
  - `object/project/_index.scss` に `access-intro`/`access-shop`/`access-info`/`access-route`/`access-car` を `@forward`
  - 罫線色が `p-access-info`（表＝`$color-black`#171716）と `p-access-route`/`p-access-car`（#000000）で混在。寸法・余白・◆色・GoogleMap枠サイズ等は Figma 実値未確定の仮置き（`// 要確認`）

## 2026-06-25

- ブログページ（`pages/blog.html`）を作成・左2カラム＋右カテゴリ＋ページ送りまで実装
  - 共通雛形を faq.html から複製（head/`l-header--page`/`p-side`/`p-page-title`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）。差し替えは `<title>`＝華結びブログ・`p-page-title__text`＝華結びブログ・パンくず末尾・`<body class="blog-page">`
  - 地色 #F1F4F7（`$color-bg-rental` 再利用）を body直付け。ルールは既存 `_blog.scss`（index の `p-blog` と同居）に `.blog-page` で追加。下部共通エリアが上塗りするためグレーが見えるのはタイトル〜パンくず。パンくずは「mainと同じ地色が透ける」方式（faq/flow/rental と同方式）
  - 導線接続: 全8ページ（index/about/rental/production/first/flow/report/faq）＋自ページのヘッダー・フッターの「ブログ」`href="#"` → blog へ。index はルート基準 `pages/blog.html`、`pages/` 配下は `blog.html`。report の「ブログで見る」(`p-report-list__btn`)は個別記事向けの可能性があり保留
  - 構成: 3カラム＝左2列ブログカード／右1列カテゴリ。最初のラフ確認で「左2列を上から順に」方針 → デザイン共有後に実値化
  - `p-blog-list`（`_blog-list.scss`）: `__inner` を flex `justify-content:space-between`（中央幅110rem 仮）。左 `__main` に2列カードグリッド `__cards`＝`grid-template-columns: repeat(2, 38.5rem)`（385px×2・列間3rem/行間4rem 仮）。`__main` は `flex-shrink:0` でカード幅維持
  - `p-blog-card`: 実寸 385×388。写真 `__thumb` 385×250（`height:25rem` 固定・`object-fit:cover`・画像未挿入時はグレー地）、白部分 `__body` は `height:13.8rem`(138)固定＋`padding:3rem 3rem 0`（上30/左右30/下なし＝下余白は付けない指示）。メタ `__meta` 14px/18px、タイトル `__title` 17px/22px＋`margin-top:1.4rem`（間14）。メタ＋タイトルを `__body` で包む（一括置換で投入）
  - `p-blog-cat`（`_blog-cat.scss`）: 右サイドバー幅255px。背景 #ffffff だが当初 flex の `align-items:stretch` で左カード列の高さに引き伸ばされ列全体が白くなった → `align-self:flex-start` で中身の高さに留めて解消。ヘッダー `__head`＝◆カテゴリ左寄せ（`justify-content:flex-start`・左右`padding-inline:2rem`）、◆は `#AB7300` の文字（`__mark`）、見出し20px/26px、`border-bottom`1px `#ab7300`。花絵 `bg_category01.png` を `__deco`(absolute right/top・幅13rem 仮)でヘッダー右上に重ね。各行 `__item`＝区切り線#e3e3e3、`__link` min-height 53px・13px/17px・テキスト左＋右端シェブロン5×5px(border回転・色`$color-gray-text`)。カテゴリ9項目
  - 不具合修正: カードの白部分を `__body` で包む際の一括置換 `</h2>`→`</h2>+</div>` が、カテゴリ見出し `p-blog-cat__title` の `</h2>` にも当たり `__head` に余分な `</div>` が混入 → aside の入れ子が壊れ本文下に回り込み。余分な閉じタグを1つ削除して復旧
  - `p-blog-pager`（`_blog-pager.scss`）: ブログセクション↔パンくず間のページ送り。`1`(現在=白文字赤背景・常時)/`2`/`3`/`>`/`≫`。他ボタンはホバーで白文字赤背景。赤＝`$color-red`#a50a24、枠＝`$color-black`#000。`≫` は CSS描画でなくテキスト（U+226B・他と同サイズ）、`--last` は枠なし。配置は全体中央でなく**左2カラムの中央**＝`.p-blog-pager`を`width:110rem;margin:0 auto`、`__list`を`width:80rem`(385×2＋列間)＋`justify-content:center`。2・3ページ未作成のためリンクは `#` 仮置き
  - `object/project/_index.scss` に `blog-list`/`blog-cat`/`blog-pager` を `@forward`
  - 記事カードの日付・カテゴリ・タイトルはラフ画像からの暫定読み取り、サムネ画像は `img/blog/blog01〜10.jpg`（未配置＝グレー枠）、各寸法・色は仮置き（要確認）

## 2026-06-24

- よくある質問ページ（`pages/faq.html`）を作成・完成（カテゴリーナビ＋アコーディオンQ&A 全6カテゴリー22問）
  - 共通雛形を flow.html から複製（head/`l-header--page`/`p-side`/`p-page-title`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）。差し替えは `<title>`・`p-page-title__text`・パンくず末尾・`<body class="faq-page">`
  - 地色 #F1F4F7（`$color-bg-rental` 再利用）を body直付け（`.faq-page`・新規 `_faq.scss`）。下部共通エリアが上塗りするためグレーが見えるのはタイトル〜パンくずの範囲（rental/flow と同方式）
  - section1 カテゴリーナビ `p-faq-nav`（`_faq.scss`）: 300×60 の枠ボタン6個を `grid-template-columns: repeat(3, 30rem)` ＋ `justify-content:center` で3列×2行。箱同士の縦横余白 `gap: 4rem`（40px）。右端に下向きシェブロン（`::after` 45度回転・production-nav 流用）。各ボタンは Q&Aセクションへのアンカー（`#q-costume`〜`#q-rental`）。スムーススクロールは既存 `html{scroll-behavior:smooth}`、着地ずれは `p-faq` の `scroll-margin-top: calc($header-h + 2rem)` で吸収
  - section2 Q&A本体 `p-faq`（`_faq.scss`）: カテゴリーごとに `&__inner` 1100px＋上border 1px #171716＋中央タイトル（Noto Serif JP 36px/36px・`margin-block:8rem`）。各カテゴリー section は `margin-top:8rem`。白カード（`&__item`）を地色グレーの上に積み、カード間は `0.2rem` の隙間
  - アコーディオン: `details/summary` ではなく **button＋パネル方式**（ネイティブは瞬時開閉でスライド不可のため）。`&__a` を `display:grid; grid-template-rows:0fr` → `.is-open` で `1fr`＋`&__a-inner{overflow:hidden}` で下スライド展開。JS（`js/main.js`）は `.p-faq__q` クリックで親 `.p-faq__item` に `.is-open` をトグル＋`aria-expanded` 更新するだけ。アニメーションは全てCSS
  - ＋アイコン: 疑似要素で描画（指定）。`::before`＝横棒固定／`::after`＝同じ横棒を `rotate(90deg)` した縦棒で「＋」。開くと `rotate(180deg)` まで**時計回り**に倒して横棒へ重ね「−」に（太さ2px・#000・`transition:transform .3s`）
  - Q＝Cantata One 25px（`&__q-mark`）、質問テキスト20px、回答 `&__a-text` 16px/行高30px。複数行回答（キャンセル料4区分・来店注意点）は `<br>`。figma の数字前後の空白（「7 日目」等）は詰めて統一
  - 質問文の調整: 予約・試着の4問目はスクショ表記「来店用意」だったが、figma回答側の質問「来店予約はどうすればいいですか？」＋回答内容（電話・メール予約）と一致するため「来店予約」に修正。試着1問目はスクショの重複表記を誤植と判断し「どのくらいかかりますか？」
  - 「衣装選びから契約までの流れ」回答内の「ご利用の流れ」を flow.html へリンク化（`&__a-link`＝金 #AB7300＋下線・ホバーで下線オフ）
  - `object/project/_index.scss` に `@forward "faq";`
  - 導線接続: 全7ページ（index/about/first/flow/production/rental/report）＋自ページのヘッダーナビ・フッターナビ・`p-btn-field` の「よくある質問」`href="#"` → faq へ（index はルート基準 `pages/faq.html`、`pages/` 配下は `faq.html`）

## 2026-06-23

- 幸せレポート（お客様の声）ページ（`pages/report.html`）を作成・着手〜一通り完成
  - ファイル名は `report.html`。共通雛形（head/`l-header--page`/`p-side`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）を flow.html から複製。`<body class="report-page">`
  - 導線接続: 全6ページ（index/about/first/flow/production/rental）のヘッダー・フッターの「幸せレポート」`href="#"` → report へ。index はルート基準 `pages/report.html`＋カルーセル下「最新の幸せレポートを見る」ボタンも接続。`pages/` 配下は `report.html`
  - タイトルセクションは他ページの `p-page-title` と別仕様 → 新規 `p-report-mv`（`_report-mv.scss`）: 全幅MV画像（`bg_intro01.jpg` 1920×500）に、タイトル画像（`img_intro01_pc.jpg` 460×310）を `absolute` で重ね、MV下端から下へはみ出させる。位置・サイズはMV(1920×500)基準の比率（top 68%＝340/500・left 54.69%＝1050/1920・width 23.96%＝460/1920）でレスポンシブ追従。「重ね＋下方向はみ出し」は通常フローで作れないため absolute を採用（座標再現を既定にしない方針の正当な例外）
  - 画像 `img_intro01_pc 1.jpg`（スペース＋重複サフィックス）を `img_intro01_pc.jpg` にリネーム
  - リード文 `p-report-intro`（`_report-intro.scss`）: テクスチャ地（`bg_pattern02.png`）に2行の中央文。文字上20rem/下12rem。フォント Noto Serif JP **SemiBold(600)** 2.4rem（Figma 23px→24丸め）/行高4.2rem。600を出すため report.html のフォントリンクに `wght@400;600` を追加
  - お客様の声一覧 `p-report-list`（`_report-list.scss`）: ベージュ地（`bg_pattern01.png`・`repeat`）に**白カード×3**。各カード幅110rem（1100px）中央寄せ・上辺に赤線（カード幅追従）。カード間4rem。カード内余白 上下6rem/左右6.2rem（コンテンツ幅976px）
    - メタ: 地域・様＋プランピル2つ（黒「ご利用プラン」＋ベージュのプラン名）を中央に `gap:0` で密着、名前のみ右1.6rem空け
    - 写真: メイン1枚（976幅）＋サムネ4枚（`__thumbs` 幅760中央寄せ＝両サイド170px・各181×260 `object-fit:cover`・gap1.2rem）。メイン/サムネとも上余白4rem
    - コメント: `__comments`（flex・カラム間56px）＋`__comment`（460＝メイン半幅）。1カラム＝スタッフから（カード1・2）／2カラム＝お客様から＋スタッフから（カード3）。460×2＋56＝976 でちょうど整合。「◆見出し＋金下線」は blog 見出しを流用
    - 「ブログで見る」ボタンは about-card の枠＋右下金三角を流用
  - パンくず地続き: `.p-report-list + .l-breadcrumb` に同じテクスチャ地＋全幅化＋マージン打ち消し（first-rental 方式）。レポートのベージュ地がパンくずまで連続
  - `object/project/_index.scss` に `report-mv`/`report-intro`/`report-list` を `@forward`
  - 色hex（タイトル赤 `#a83427`／赤線 `$color-pink`／プランのベージュ `$color-bg-beige`）・各余白・背景タイルの可否は Figma 実値未確定の仮置き（`// 要確認`）

## 2026-06-22

- ご利用の流れページ（`pages/flow.html`）を作成・完成（STEP1〜5＋末尾の注意事項）
  - 共通雛形を流用（head/`l-header--page`/`p-side`/`p-page-title`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）。差し替えは `<title>`・`p-page-title__text`・パンくず末尾の3点
  - 地色 #F1F4F7（`$color-bg-rental` 再利用）を `<body class="flow-page">` ＋ `.flow-page` で body直付け。下部共通エリアが上塗りするため、グレーが見えるのはタイトル〜パンくずの範囲（rental ページと同方式）
  - 新コンポーネント `p-flow`（`_flow.scss`）: `__inner` 1100px の上に白カード `__panel` を積む反復テンプレート。全ステップ共通モチーフ＝番号＋タイトル＋金下線の `__head`（`$color-gold-2`）、本文 `__lead` を共有。`__panel` に `scroll-margin-top: calc($header-h + 2rem)`（アンカー着地が固定ヘッダーに隠れない）
  - STEP1 衣装を選ぶ: 画像＋本文の2カラム `__select`（`img_flow01.png`）。本文カラム内に金枠注記ボックス `__note`（※試着されない方）→「4.お申込み〜衣装発送へ」は `href="#apply"` で STEP4 へアンカー接続。カード中央に黒ボタン「レンタル衣装一覧」→ `rental.html`
  - 分岐ラベル `__branch`: 「来店試着できる／できない」のピル画像2つ（`ico_flow01_pc.png`/`ico_flow02_pc.png`）を各カラム中央に
  - STEP2 `__cols`: 同型カードを2枚横並び（`--half` で1:1等幅・`align-items:stretch` で高さ追従）。左=来店予約（TEL画像 `btn_tel01_pc.png`＋金ボタン `__btn-gold`／メールはインラインSVG）、右=宅配試着（黒ボタン2つ `__btn-row`）
  - STEP3 ご試着・お衣装選び: `__trial` で番号付き写真3枚（`img_trial_list01〜03_pc.jpg`）を均等3カラムGrid＋各下に `__trial-cap` キャプション
  - STEP4 申し込み〜衣装発送（`id="apply"`）: 本文＋中央寄せの `__contact`。TEL画像＋画像ボタン `__btn-inquiry`（`btn_inquery02_pc.png`）を `__contact--fixed` で各幅300（30rem）固定（STEP2 の `__contact` には非干渉）
  - STEP5 お衣装ご利用当日: STEP1 の `__select` を再利用（画像左＋本文右・`img_flow04.jpg`）。最後のステップなので末尾矢印なし
  - ステップ間の下矢印 `__arrow`（`ico_arrow01_pc.png`）: 余白は `margin-block: 1rem` 固定。STEP2→3 のみ `--left`（`width: calc(50% - 1rem)`）で左カラム下に寄せる。分岐 `__branch`／`__cols` の上下も 1rem に統一
  - 末尾 注意事項 `__notice`: 上のSTEP群と `margin-top: 8rem`。ひし形見出しアイコンは画像 `bg_ico01.png`（`__notice-title::before`）、各項目行頭の赤丸はCSS描画 `#a83627`（`__notice-item::before`・`flex` でぶら下げ整列）。見出し下に区切り線。**背景白・外枠は不要との指示で削除**（地色の上に直接）
  - `object/project/_index.scss` に `@forward "flow";`
  - 導線接続: 全5ページ（index/about/first/production/rental）の「ご利用の流れ」`href="#"` → `flow.html`（ヘッダーナビ・フッターナビ・`p-btn-field`）。index はルート基準 `pages/flow.html`、`pages/` 配下は `flow.html`
  - フォント・余白の多くは Figma 実値未確定のため仮置き（`// 要確認`）
- CLAUDE.md を教官モードから実装担当モードへ書き換え（Role／Operating Mode／Code Diff Policy／Never Do）。完成コードを直接ファイルへ反映し、実装後に変更点を簡潔報告する運用に

## 2026-06-18

- 「初めての方へ」ページ（`pages/first.html`）の固有セクション section4〜6 を実装し、ページを一通り完成
  - section4 花嫁衣装の選び方 `p-first-choice`（`_first-choice.scss`）: 1100px インナーに上border（1px `#E3E0CE`＝`$color-bg-beige` 再利用）＋中央見出し → 丸画像＋テキストの2カラムを3行。`flex`＋`align-items:center`＋`--reverse` で行ごとに画像左右反転（1左/2右/3左）。番号は画像（`img_choice01〜03.jpg`）に焼き込み済みのためHTML側では出さない。丸画像は元画像が円のため `border-radius` 不要、`flex-shrink:0` で真円保護・本文は `flex:1`
  - section5 着付け用品一式 `p-first-option`（`_first-option.scss`）: 上border＋中央見出し/リード → 小物ブロック2つ（`&__block + &__block` の上に中border 1px `#171716`＝`$color-black`）→ 全幅画像（`img_option01_pc.jpg`）。◆見出しは回転正方形の擬似要素（金 `$color-gold-2` 仮）。2ブロックとも見出し「飾り小物」はスクショ通り再現（原本の表記ゆれの可能性＝要確認）
  - section6 全国どこでも簡単レンタル `p-first-rental`（`_first-rental.scss`）: 流れ図は5ステップ＋矢印＋番号/ラベル＋赤ボタン＋「ご試着なしでご予約」帯が1枚に焼き込まれた `img_rental01_pc.jpg`。HTMLは見出し＋リード＋画像＋黒ボタンのみ。地色 `#F1F4F7`（`$color-bg-rental` 再利用）を**全幅**で敷き、中身は `&__inner` で1100px中央寄せ
  - パンくずとの「入り込む（地色連結）」を実装: `.p-first-rental + .l-breadcrumb` の隣接セレクタで、このページのこの位置のパンくずだけに地色を適用（他ページ非干渉）。当初は地色だけ付けたが (1) 上に `margin-block:6rem` の白隙間 (2) `max-width:168rem` 中央寄せによる左右の白ノッチ (3) 下マージンの白 が出たため、`max-width:none`（全幅化）＋`margin-block:0`（上下白マージン打ち消し）で連結。黒帯との間の灰色下余白は `padding-bottom:6rem`（背景内＝灰色のまま）で確保
  - `object/project/_index.scss` に `first-choice`/`first-option`/`first-rental` を `@forward`
  - フォント・余白の多くは Figma 実値未確定のため仮置き（`// 要確認`）

## 2026-06-16

- 衣装制作ページ（`pages/production.html`）を作成・完成
  - 共通雛形（head/`l-header--page`/`p-side`/`p-page-title`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）を流用し、固有部のみ実装
  - section1 ページ内ナビ `p-production-nav`（`_production-nav.scss`）: 300×60 の枠ボタン2つを中央に横並び（gap 4rem）。高さは `padding-block` で成立させ固定しない。右端に下向きシェブロン（`::after` を45度回転）
  - 大セクション見出しを共有部品 `p-production-lead`（`_production-lead.scss`）に一般化: 上罫線（1px #000・inner=1100px幅）＋中央タイトル36px＋リード文。「衣装ができるまで」「技法・素材」の2セクションで共用。当初の `_production-flow.scss` はこの一般化に伴いリネーム（flow＝制作の流れの意で技法側に合わないため）
  - 工程ブロック `p-production-step`（`_production-step.scss`）: 「番号＋中央タイトルのグレー帯 → 本文 → 工程写真1枚」を縦積み。番号は帯内 `absolute` 左寄せ・縦中央。図案〜刺繍の計7ブロックを実装。ブロック間余白は 5rem に統一（flow→1ブロック目も共用）
  - 技法・素材 `p-production-technic`（`_production-technic.scss`）: inner=1100px を CSS Grid で2カラム均等（column-gap 4rem / row-gap 6rem）。各セル＝画像→中央タイトル→本文。相良刺繍〜スパンコールの全12件を実装（01のみ .jpg、02〜12は .png）
  - 技法・素材セクションは前セクション（工程ブロック末尾）との間を 12rem 空ける。`.p-production-step + .p-production-lead` の隣接セレクタで section3 側だけに `margin-top` を当て、section2（ナビ→衣装ができるまで）には非干渉
  - ページ内ナビのスムーズスクロールを CSS のみで実装: `html { scroll-behavior: smooth }`（`_base.scss`）＋ナビボタン href を `#flow`/`#technic`、各見出しセクションに id 付与。固定ヘッダーぶんの着地ずれは `p-production-lead` の `scroll-margin-top: calc($header-h + 2rem)` で吸収
  - `object/project/_index.scss` に `production-nav`/`production-lead`/`production-step`/`production-technic` を `@forward`
- 導線を接続
  - 全ページ（index/about/rental/production）のヘッダー・フッター・about本文の「衣装制作」`href="#"` を `production.html` へ
  - 取りこぼし修正: `about.html` フッターの「レンタル衣装」`href="#"` を `rental.html` へ（他ページは接続済みでここだけ残っていた）。「レンタル衣装一覧」は別物（一覧ページ向け）として保留のまま
- レンタルページの「一覧を見る」下線をホバーアニメ化（`p-costume__more` / `p-costume-cols__more`）: `text-decoration` をやめ `::before` の1px金バーに変更。ホバーで `transform: scaleX(0)`（中央基点）で中央へ縮んで消える
- 「初めての方へ」ページ（`pages/first.html`）に着手
  - 共通骨格を先行作成: production.html の共通部（head/`l-header--page`/`p-side`/`p-page-title`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）を流用。固有部は TODO プレースホルダーで開始。ファイル名は意味スラッグ統一で `first.html`
  - 全ページ（index/about/rental/production/first）の「初めての方へ」`href="#"` を接続: ヘッダーナビ・フッターナビ・`p-btn-field` の該当ボタン。index はルート基準 `pages/first.html`、`pages/` 配下は `first.html`
  - section1 メインビジュアル `p-first-main`（`_first-main.scss`）: `mainimg01_pc.jpg` を `width:100%` で全幅設置（高さは base の `height:auto` で維持）
  - section2 花嫁衣装レンタルのいろは `p-first-iroha`（`_first-iroha.scss`）: テクスチャ背景 `bg_iroha01.jpg` の1680px帯。`min-height:46.4rem`（463→464丸め・固定せず）＋flex縦横中央。タイトル32/42、本文16（17丸め）/42。上余白40px
  - section3 花嫁衣装の種類 `p-first-type`（`_first-type.scss`）: 1100px幅に中央見出し＋3カラムGrid（column-gap 5rem）。各カラム=画像→中央タイトル→本文→黒「一覧を見る」ボタン。ボタンは高さpadding成立＋右下に金三角（`::after`・clip-path）。タイトルはスクショ通り「色打掛」×3（本文は白無垢/引振袖の説明・要確認）
  - `object/project/_index.scss` に `first-main`/`first-iroha`/`first-type` を `@forward`
  - フォント・余白の多くは Figma 実値未確定のため仮置き（`// 要確認`）

## 2026-06-15

- レンタル衣装ページ（`pages/rental.html`）を作成・完成
  - まず共通雛形を先行作成: about.html の共通部分（head/`l-header--page`/`p-side`/`p-page-title`/パンくず/`p-btn-field--page`/`p-contact`/`p-map`/`l-footer`）をそのまま流用。差し替えは `<title>`・`p-page-title__text`・パンくず末尾の3点のみ。ユニーク部分は TODO コメント付きプレースホルダーで開始
  - 導線を接続: ナビ「レンタル衣装」の `href="#"` を rental.html へ（index.html ヘッダー/フッター → `pages/rental.html`、about.html → `rental.html`）。belief の「レンタル衣装一覧」(index 187行)は一覧ページ向けの可能性があり別物として保留
  - section1〜3（色打掛/白無垢/引振袖）を新コンポーネント `p-costume`（`_costume.scss`）で実装: 1680幅写真をセンタリング（left120 は自動成立で未記述）し、570×530の白箱を写真内に `absolute`（top75/left1000＝右寄り）で重ねる型。`--reverse` で箱を左寄り（left11rem＝右インセット110pxと対称）。内側線は `::before` の inset:1rem＋1px金枠。section間 `& + &` で5rem。タイトル 42/56（55→丸め）、本文 18/36・width410、「一覧を見る ›」は金シェブロン＋金下線
  - section4〜6（留袖/訪問着/振袖）を新コンポーネント `p-costume-cols`（`_costume-cols.scss`）で実装: 1100幅を 1:1 に分割した2カラム（各550）。既定=画像左/白箱右、`--reverse`（訪問着）=画像右/白箱左。`align-items: stretch` で白箱を画像高さに追従（高さ固定なし）。行間・カラム間は余白なし。`.p-costume + &` で 3→4 間18rem、`.p-costume-cols + .l-breadcrumb` で 6→パンくず間2rem（about のパンくずには非干渉）
  - 「一覧を見る」に #AB7300 の下線を追加（`text-decoration-color: $color-gold-2` ＋ `text-underline-offset`）。`::after` の金シェブロンは `inline-block` のため下線が乗らない
  - ページ地色を #F1F4F7 に: `<body class="rental-page">` ＋ `.rental-page { background-color: $color-bg-rental }`（既存変数を流用）。body直付けで l-main の隙間に出す。他ページ非干渉
  - `object/project/_index.scss` に `@forward "costume";` `@forward "costume-cols";` を追加

## 2026-06-12

- 子ページ共通フッターセクション（パンくず以降の下部エリア）を実装
  - `p-btn-field--page` 修飾子を追加: 子ページは4ボタン（先頭に「華結びについて」）。ボタン 266×80、帯の上余白 80px（下は対称と仮定）。Figma の `left: 410` は 1920px カンバスのセンタリング＋gap 12px で自動成立するため CSS には書かない
  - お問い合わせ `p-contact` を新規実装（`_contact.scss`）: 灰帯 `$color-bg-contact`（#E6E8E9・定義済み変数）＋中央白カード 940px。内側 1px 罫線は `::before` + `inset: 1rem`（左右インセット・色は仮）。タイトル 26/34、「TEL.」26＋番号 40（Cantata）、営業時間 16/20（lh 21→20 に丸め）。ボタン 230×60 は高さ固定せず `padding: 2rem 0`＋行高 20px で成立させ、`bg_btn01.png`（p-side と共通）を再利用
  - Googleマップ `p-map` を index.html と同一マークアップで移植（iframe の src は絶対URLのためパス調整不要）
  - 背景 `bg_pattern03.png` のパスは変更不要と判断: CSS の `url()` は style.css 基準で解決されるため子ページでもそのまま届く
- CLAUDE.md の CSS/SCSS Policy に追記: Figma の `top`/`left` は絶対座標ではなく margin・padding・flex 配置で発生する相対位置として解釈する（センタリング等で成立する値は CSS に書かない）

## 2026-06-11

- 子ページ共通の基盤を整備
  - `l-header--page` 修飾子を追加: 子ページは FV が無いため最初から `fixed` で上端固定・小ロゴ表示（大ロゴは markup に置かない）。ヘッダー高さを変数 `$header-h: 8rem` に切り出し（`_variables.scss`）
  - `layout/_main.scss` を新設: `.l-main` に `padding-top: $header-h` を持たせ、固定ヘッダーぶん本文を下げる
  - サイドバー（`p-side`）を全ページ共通化: `p-mv` 内の `absolute` をやめ、body 直下＋`position: fixed`（top 15rem / z-index 40）に変更。スクロール中も右端に追従。パネルのはみ出しクリップは `p-mv` の `overflow: hidden` から `p-side` 自身の `overflow: hidden` に移管
  - `index.html`・`l-footer` のナビから `pages/about.html` へリンク
- 「華結びについて」ページ（`pages/about.html`）を実装
  - `p-page-title`: 子ページ共通のタイトルセクション（中央見出し＋金の短い下線。余白 100/25/90px）
  - `p-about-section`: ページ共通ラッパー（max-width 168rem・セクション間 60px）
  - `p-about-intro`: テクスチャ背景 `bg_intro01_pc` ＋中央キャッチ・本文
  - `p-about-card`: 番号（Cantata）→見出し→本文→枠ボタン（右下金三角）の共通文章クラスター
  - `p-about-block`（section2/7）: 全幅写真背景に 540×540 の白カードを座標指定で重ねる型。`--01`（カード右寄り）/`--06`（カード左寄り）
  - `p-about-cols`（section3〜6）: 左テキスト 790px / 右画像 890px の2カラム。`--reverse` で左右反転し交互配置
  - 画像 `img/about/` を追加（背景2・イントロ背景1・写真4）。フォント・余白の多くは Figma 実値未確定のため仮置き（`// 要確認`）
- パンくず（`layout/_breadcrumb.scss`）を実装
  - 子ページ下部の共通パンくず。`ol` を flex 横並び、2つ目以降の前に 4px 角ボックスの上・右ボーダーを 45 度回転させたシェブロンを擬似要素で挿入
  - シェブロンの縦位置ずれを修正: `vertical-align: middle`（ベースライン基準で数pxずれる）をやめ、`__item` を `display: flex; align-items: center` にしてボックス基準の縦中央揃えに変更
- CLAUDE.md に環境メモを追記（SCSS は Live Sass Compiler の Watch Sass で自動コンパイルされる前提）

## 2026-06-10

- ブログ（`p-blog`）を実装
  - 全幅帯に `bg_blog_wrap02.jpg`。`__inner` を flex で2カラム（左:記事リスト / 右:Facebook枠）
  - 見出しは `◆`（擬似要素・金）＋テキスト＋金罫線（`$color-gold-2`）。左のみ右端に「一覧を見る ›」
  - 記事は `__item` ごとに金罫線で区切り、`__meta`（日付＋カテゴリ）＋`__post-title`
  - 右は白いプレースホルダー枠＋「ここにFacebookからのリンクを貼る」
  - 幅・余白・フォントは Figma 未共有のため仮置き（`// 要確認`）
- CTAバナー（`p-cta`）を実装
  - `p-btn-field` と同じ黒地＋`bg_pattern03.png`。`bnr_footer01/02`（実寸460×139＝920×278@144dpi）を中央に横並び（`__item` 46rem・gap 2rem）
- Googleマップ（`p-map`）を実装
  - CTAとフッターの間に全幅×390px の埋め込み iframe（`output=embed`、API キー不要）。住所は仮で上賀茂神社（`q=`）
- フッター（`l-footer`・layout層）を実装
  - 上段: ナビ10項目を中央1行（gap 6rem）＋下罫線 `#AB7300`（`$color-gold-2`）
  - 下段: 中央コンテナ 104rem を flex space-between。左=ロゴ `logo02.png`（33rem）→住所/TEL、右=SNS円2つ＋`© 2018 華結び`
  - SNSは専用画像が無いため枠付き円＋インラインSVG（IG/FB）で自作。後で正式アイコンに差し替え可
- フッターの調整
  - nav下の区切り線を `#AB7300`（`$color-gold-2`）に、nav項目間 gap を 6rem に変更
- ページトップへ戻るボタン（`l-footer__pagetop`）を実装
  - 7rem角の黒四角＋白い上向きシェブロン（インラインSVG）
  - スクロール量で `.is-fixed` を出し分け（[js/main.js](../js/main.js)）。トップ画面では非表示、300px超で右下に固定（`bottom:2.3rem`）、フッター到達でフッター内へ収める
  - ボタンを `__nav` の中に入れ `top:50%/translateY` で帯の縦中央に。nav を `min-height:8rem`（＞ボタン7rem）にして金線にボタンが乗らないよう逃がした。区切り線は全幅のまま nav に残置
- これでトップページのセクションが下端まで一通り揃った（仮値の実値化は残課題）

## 2026-06-09

- レンタル衣装セクション（`p-rental`）を実装
  - 大きい横帯3枚（縦積み・背景 `bg_list_rental0X`）。帯は1680×590。白カードは画像に焼き込みが無いため HTML/CSS で重ね、位置は右→左→右（`--left` 修飾子）。各カード280×380、外枠は白のまま内側に金枠（`::before`）、右下に赤三角、「一覧を見る ›」。カードは画像端から固定（top100 / 左右410px）
  - 下段の小カード3枚（写真360×580）。白ラベル100×230を写真右端から54px内側に配置し、縦書きテキスト＋ ›＋30px金下線（`#AB7300`）
- belief（`p-belief`）を実装
  - 見出し（日本語36px＋金字 BELIEF 15px）。6カードを市松グリッド（奇数=赤 `bg_belief01`/白文字、偶数=ピンク `bg_belief02`/黒文字。花柄はピンク画像に焼き込み済み）。カード552×670、横12 / 縦46px
  - カード内: padding 50px、番号（Cantata 20px）→キャッチ26px→画像328→本文16/32→白ボタン200×39（右下に金三角9px）。縦余白 34/48/48/14
  - `$color-bg-pink` を変数追加（ピンクのフォールバック色。実hex未確認の仮）
  - 下部に黒ボタン300×60
- btn-field（`p-btn-field`）を実装
  - 背景 `bg_pattern03`（黒帯240px・左右に金粒）。枠付きボタン3つ（360×120、間隔12px、白枠1px、右下に白三角9px、上26/下14pxを密着）
- 幸せレポート（`p-report`）を実装
  - 背景 `bg_report02`＋鶴の装飾 `img_report01`（左上・幅384）。見出しは画像 `tit_report_pc`
  - カルーセル: 3枚表示・5枚を無限ループ（`js/main.js`、クローン無しのDOM回転式）。カード360×370（写真360×230＋名前/プラン（ピンク＋金下線）/詳細、余白12/0/12/12/24）、カード間12px、窓幅110.4rem
  - 矢印 `ico_prev/next`（高さ48px、カードから22px、カード上端から128px）。下部に黒ボタン（右下三角 `#C39E2F`）
- 不具合修正
  - `p-side` パネルが画面右外へ退避して横スクロールが発生 → `.p-mv` に `overflow: hidden` を付けてクリップ
  - 固定ヘッダーのロゴが帯高さ8remを超えていた（width基準で約85px）→ `img` を `height: 4.4rem` 基準に変更し帯内へ収めた

## 2026-06-08

- FV（メインビジュアル）を実装
  - `index.html`: `p-mv`（スライダー3枚 + `l-info` リード文 + `l-header`）、`p-side`（縦書きタブ2種）、`p-price`（特別価格）を追加
  - `scss/object/project/` を新設し `_mv` / `_side` / `_price` を追加、`object/project` を `style.scss` で有効化
  - `scss/layout/_info.scss` を追加（MV 上の白文字リード）
  - `_header.scss` を拡張: 初期は `absolute` で FV 下部に重ね、`.is-fixed` で上端 `fixed` に切替。大ロゴ⇄小ロゴの入れ替え設計
  - 画像: `img_pc_main03-2.png` を削除し `img_pc_main03.png` / `bg_limited01.jpg` / `logo_nav01.png` を追加
- JS を新規作成（`js/main.js`）
  - 5秒ごとのスライド切替（`.is-active` のクロスフェード）
  - スクロール量でヘッダーに `.is-fixed` 付与（`load`/`scroll`/`resize` で閾値再計算）
- バグ修正: `scss/layout/_index.scss` の `@forward "header";` 重複を削除
- 確認: Google Fonts のリンク・変数・適用（`body` に `$font-base`、TEL/料金に `$font-en`）が整合済みであることを確認
- サイドパネル（`p-side`）を作り込み
  - ホバー挙動を変更: 「タブ＋パネルが1枚の帯として右からスライドする」方式へ。`absolute` パネル方式をやめ、flex 横並び＋`translateX($side-panel-w)` で退避→`:hover` で `translateX(0)`
  - 帯の高さを `20rem` 固定、タブ/パネルの色を種類別に統一（contact=ベージュ / mail=赤）
  - ボタン背景を画像 `bg_btn01.png` に（フォールバック色 `$color-gold-2`）
- 価格カード（`p-price`）を作り込み
  - 背景を `bg_limited01.jpg` に変更、文字色を濃色へ。「特別価格」を左上の小バッジ化（80×18 / 14px）
  - 下段2カラムを透過（カード背景を見せる）、カラム区切り・上下区切り・外周枠線を黒（`$color-black`）に
- ヘッダーのナビ調整
  - 大ロゴ `__logo-lg` 位置を Figma 値へ（left 21.6rem / width 21rem、top はナビ重なり基準の `bottom` に変換）
  - ナビを `space-around` で均等配置。左ロゴと同幅の右スペーサー（`__inner::after`、幅 `$header-side-w`）でナビを帯の中央に維持
- スクロール追従の解除: `p-price` / `p-side` を `fixed`→`absolute` にし、`index.html` 上で `p-mv` 内へ移動（FV と一緒に流れる挙動へ）
- intro セクションを新規追加
  - `index.html`: `p-intro`（黒ロゴ `img_intro01.png` + キャッチコピー + 本文）。本文は最終的に1つの `__text` に統合
  - `scss/object/project/_intro.scss` を追加し `@forward`。背景 `bg_intro02.png`（全幅・cover）、余白を Figma 値で設定（画像→見出し106 / 見出し→本文44 / 本文→下端88px）、本文 16px・行40px（17/41px の奇数を丸め）

## 2026-06-04

- 最小ワークスペース構成を作成
  - `index.html`: HTML5 雛形（lang=ja / viewport / destyle.css → style.css の読み込み）
  - `scss/`: FLOCSS 構成（global / foundation / layout）、`@use`/`@forward` で連結
  - 出力先 `css/style.css`、入力 `scss/style.scss`
  - `docs/TODO.md` / `docs/WORKLOG.md` を新規作成
- 変数を定義（`scss/global/_variables.scss`）
  - フォント: `$font-base`（Noto Serif JP）/ `$font-en`（Cantata One）、weight 400 固定
  - 色: 無彩色・背景・赤系・金系を用途コメント付きで整理。金系6色は用途未確定のため明るさ順の暫定連番
  - `_base.scss` の参照名を新変数（`$color-black` / `$color-white`）に追従
- Git / GitHub 整備
  - `gh` CLI を winget で導入し認証（account: N-Hayashi-v8）
  - `.gitignore` 追加（OS / `*.css.map` / `node_modules`）、`css/style.css.map` を追跡から除外
  - イニシャルコミット（48ファイル）→ Private リモート作成・push 済み
  - リポジトリ: <https://github.com/N-Hayashi-v8/hanamusubi>

---

## 記法ルール

- 見出しは日付（`## YYYY-MM-DD`）。**新しい日付を上に**積む
- 同日内の項目は**時系列で下に**追記する
- 「何を・なぜ・結果」が分かる粒度で書く。コマンドや確認手順は子箇条書きで残す
