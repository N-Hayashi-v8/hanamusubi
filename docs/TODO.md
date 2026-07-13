# TODO

## Now

- [ ] ブレークポイントの確定（暫定: sp 767 / pc 768）
- [ ] blog の記事カード内容（日付・カテゴリ・タイトル）を詳細スクショで確定し、サムネ画像を `img/blog/blog01〜10.jpg` に配置（現状プレースホルダー）。「2×10＝20枚」想定なら残り10枚を追記
- [ ] report の「ブログで見る」ボタン（`p-report-list__btn`）の遷移先を確定（個別記事 or blog 一覧）
- [ ] access ストリートビュー（`p-access-car__sv`）の表示確認。キー無し `svembed` は住所だけだとパノラマに確実にスナップしないため、灰色/地図表示なら `cbll=lat,lng` 指定 or 正規の埋め込みコードに差し替え

> 注: 各ページの仮置き（`// 要確認`）の実値化タスクは、2026-06-30 に現行値を確定版として採用し要確認コメントを除去したため Done へ集約クローズ。Figma 実値の入手時に再検証する。

## Next

- [ ] `hanamusubi-wp`（WordPress環境）に `includes/` の header/footer/sidebar をテーマとして移植（`wp_head()`/`wp_footer()`・`wp_nav_menu()`対応）
- [ ] about/rental/production/first/flow/access/privacy を固定ページ＋ページテンプレートに移植
- [ ] ブログ・幸せレポート・FAQ の投稿タイプ設計（カスタム投稿タイプ＋ACF案）を確定
- [ ] SNSアイコン（`l-footer`）を正式アイコン画像/SVGに差し替え
- [ ] Googleマップ（`p-map`）の住所を実店舗に差し替え
- [ ] object/component・utility の追加
- [ ] 金系カラーの用途確定後に変数名をリネーム
- [ ] 行末尾コメントの整理（2026-06-30 に残したラベル系コメント＝「カラム間」「見出し→本文」等、セレクタ＋プロパティから自明なものの精査・削減。設計理由・計算根拠・セクション見出しは残す）
- [ ] ブログの右カテゴリの各リンク先・ページ送り（2・3ページ）を作成後に接続（現状 `href="#"` 仮置き）
- [ ] 各子ページのナビ/フッターで未作成ページ向け `href="#"` を、ページ作成後に順次接続

## Done

- [x] WordPress環境を新規構築（`hanamusubi-wp/`）: DBngin(MySQL)にデータベース`hanamusubi_wp`を作成、WP-CLIでWordPress本体（日本語版7.0.1）をダウンロード・`wp-config.php`生成・インストール実行、Herdで`hanamusubi-wp.test`としてlink。管理画面ログイン確認済み（テーマ移植は次タスク）
- [x] 静的HTML11ページ（index + pages/配下10枚）をPHP化: 共通のヘッダー/サイドバー/フッター/お問い合わせ/Googleマップ/子ページ共通ボタン帯を `includes/*.php` に切り出し、各ページから include。パスをルート相対（`/css/` `/img/` `/js/` `/pages/*.php`）に統一。Herdで`hanamusubi.test`としてlinkし全ページ200 OKを確認。副産物として blog.html にあった既存バグ（`p-contact__box`内の余分な`</div>`によるDOM破損）を解消
- [x] フォルダ階層の見直し（共通画像を `img/common` へ分離＋未参照デッド3ファイル削除／`scss/object/project` を common＋ページ別サブフォルダに再編し `@forward` 出力順は維持／HTML・SCSS・CSS の参照を一括更新／img/top・layout 等はフラット維持と確認）
- [x] コメント整理（「要確認」マーカー・仮置き宣言を除去〔設計意図・事実メモは保持〕／figma・px の値メモ・装飾区切り線・説明なし hex メモを除去。計約500件。コードの値は不変）
- [x] 全ページの仮置き（`// 要確認`）を現行値で確定版として採用し要確認コメントを除去（Figma 実値入手時に再検証）。旧 Now の各ページ実値化タスクをこの確定で集約クローズ
- [x] 残りの子ページの作成（初めての方へ・ご利用の流れ・幸せレポート・よくある質問・ブログ・アクセス・個人情報保護方針）＝全10子ページ完了
- [x] 個人情報保護方針ページ（`privacy.html`）作成・全10項目まで実装（access.html を雛形に共通部複製／`<body class="privacy-page">`＋地色#F1F4F7を`_privacy.scss`に追加〔タイトル〜パンくず〕／全10ページ＋自ページのフッター「個人情報保護方針」`href="#"`→privacy接続〔index はルート基準 `pages/privacy.html`〕）。`p-privacy`＝リード文（1100px・タイトルから10rem・地の文 Noto Serif JP 400 16px/32px を `__lead`/`__text` 共通定義・URL はプレーンテキスト）／`p-privacy-list`＝白箱1100px・`padding-inline:4.5rem`で項目幅1010px・項目間 #E3E0CE 罫線〔上下4rem〕・`__title`23px→24丸め/行高30px・タイトル→本文2rem・段落間余白なし。4番は箇条書き`__bullets`〔行頭「・」ぶら下げ〕・5番2段落・10番見出しのみ。各寸法は仮置き（要確認）
- [x] アクセス・店舗案内ページ（`access.html`）作成・完成（faq.html を雛形に共通雛形を複製／`<title>`＝アクセス・店舗案内・`p-page-title__text`＝アクセス・店舗案内・パンくず末尾・`<body class="access-page">`／全9ページ＋自ページのナビ・フッターの「アクセス」`href="#"`→access 接続〔index はルート基準 `pages/access.html`〕）。タイトルセクションのみ地色 #F1F4F7（`$color-bg-rental`）、以降は base の白。固有部＝`p-access-intro`（店舗案内リード・白・中央・上下8rem／30px・17px）／`p-access-shop`（全幅画像 `img_shop01_pc.jpg` 1920×530）／`p-access-info`（1100px・左カラム〔◆見出し＋表＋黒点注記〕＋右地図 `img_map01.jpg` 440×380・上端揃え／表ラベル #F7F8FA＝`$color-bg-gray`・表border #171716・上下pad2rem／GoogleMap iframe 1100×450＝店舗住所）／`p-access-route`（◆電車bus・JR京都/阪急烏丸の2ブロック・`ico_train01.png` 中央見出し・border #000000）／`p-access-car`（`ico_car01.png` 中央見出し・リード・ストリートビュー iframe 1100×600＝同住所 `svembed`）。各寸法・色は仮置き（要確認）
- [x] ブログページ（`blog.html`）作成・左2カラム＋右カテゴリ＋ページ送りまで実装（faq.html を雛形に共通部複製／`<body class="blog-page">`＋地色#F1F4F7を`_blog.scss`に追加／全8ページ＋自ページのナビ・フッターの「ブログ」`href="#"`→blog接続〔index はルート基準 `pages/blog.html`〕）。`p-blog-list`＝3カラム（左2列カード／右255pxカテゴリ）を`__inner`flex `space-between`で配置／`p-blog-card`＝385×388（写真`__thumb`385×250固定＋白部分`__body`高さ138固定・上30/左右30/下なし・メタ14px/18px・タイトル17px/22px・間14）／`p-blog-cat`＝白地・`align-self:flex-start`で中身高さに留め・◆カテゴリ左寄せ〔◆は#AB7300の文字〕・花絵`bg_category01.png`をabsoluteで右上・`border-bottom`#ab7300・各行min-height53px＋右シェブロン5×5・9カテゴリ／`p-blog-pager`＝1〔現在=白文字赤背景#a50a24〕/2/3/>/≫〔テキスト〕・他はホバーで赤・枠#000・左2カラム(80rem)の中央。記事内容・サムネ画像・各寸法は仮置き（要確認）
- [x] よくある質問ページ（`faq.html`）作成・完成（`p-faq-nav`＝300×60枠ボタン3列×2行・gap40px・各Q&Aセクションへのアンカー／`p-faq`＝1100px幅・上border #171716・タイトルNoto Serif JP 36px上下8rem・全6カテゴリー22問／アコーディオン＝button＋grid-rows(0fr→1fr)スライド・＋疑似要素2本を時計回り回転で−化（JSは.is-openトグルのみ）／回答16px・行高30px・複数行は`<br>`／地色#F1F4F7をbody直付け／「ご利用の流れ」回答をflow.htmlへリンク化／全7ページのナビ・フッター・btn-fieldの導線接続）（`p-report-mv`＝全幅MV＋タイトル画像をabsoluteで重ね下にはみ出し／`p-report-intro`＝テクスチャ地にSemiBoldリード文／`p-report-list`＝ベージュ地に白カード×3：赤線・メタ密着ピル・メイン976＋サムネ760(両側170)・コメント1/2カラム460＋gap56／パンくず地続き／全6ページの導線接続／画像リネーム・フォント600追加）
- [x] ご利用の流れページ（`flow.html`）作成・完成（`p-flow` 反復テンプレ＝番号＋金下線見出し／STEP1 衣装を選ぶ＋金枠注記→STEP4アンカー／分岐ピル／STEP2 来店予約・宅配の2カード／STEP3 試着写真3枚Grid／STEP4 申し込み〜発送＝TEL＋画像ボタン幅300／STEP5 当日＝画像左本文右／末尾 注意事項＝ひし形画像見出し＋赤丸#a83627・背景枠なし／矢印余白1rem・STEP2→3のみ左寄せ／全5ページのリンク接続）
- [x] CLAUDE.md を実装担当モードへ更新（完成コードを直接反映・実装後に変更点報告）
- [x] 「初めての方へ」ページ（`first.html`）固有セクション完成（section4 選び方 `p-first-choice`：上border #E3E0CE＋丸画像3行の左右反転2カラム／section5 着付け用品一式 `p-first-option`：上border＋◆見出し2ブロック＋中border #171716＋全幅画像／section6 簡単レンタル `p-first-rental`：全幅 #F1F4F7＋流れ図1枚画像＋黒ボタン／後続パンくずを全幅化・地色連結し灰色下余白6rem）
- [x] 衣装制作ページ（`pages/production.html`）作成・完成（`p-production-nav` ページ内ナビ／共有見出し `p-production-lead`／工程ブロック `p-production-step` 7個／技法・素材 `p-production-technic` 2カラム×6行＝12件／ナビのスムーズスクロール／全ページの衣装制作リンク接続／about フッターのレンタル衣装リンク補修）
- [x] レンタル衣装ページ（`pages/rental.html`）作成・完成（`p-costume` 帯3＋`p-costume-cols` 2カラム3／金下線「一覧を見る」／地色 #F1F4F7／ナビ導線接続）
- [x] 子ページ共通フッターセクション実装（`p-btn-field--page` 4ボタン帯／お問い合わせ `p-contact`／Googleマップ移植）
- [x] パンくず（`l-breadcrumb`）実装（シェブロンは `__item` の flex で縦中央揃え）
- [x] 「華結びについて」ページ（`pages/about.html`）実装（`p-page-title`／`p-about-intro`／`p-about-block`／`p-about-cols`）
- [x] 子ページ共通基盤（`l-header--page`・`l-main`・`p-side` のビューポート固定化）
- [x] ページトップへ戻るボタン（`l-footer__pagetop`）実装（スクロールで右下固定／フッターで帯内に縦中央収納）
- [x] フッター（`l-footer`）実装（中央ナビ＋金罫線＋ロゴ/住所＋SNS円/コピーライト）
- [x] Googleマップ（`p-map`）実装（全幅×390px の埋め込み iframe）
- [x] CTAバナー（`p-cta`）実装（黒地＋`bg_pattern03` にバナー2枚横並び）
- [x] ブログ（`p-blog`）実装（全幅帯に左:記事リスト／右:Facebook枠の2カラム）
- [x] 幸せレポート（`p-report`）実装（3枚表示・5枚ループのカルーセル＋鶴装飾、JSはDOM回転式）
- [x] btn-field（`p-btn-field`）実装（`bg_pattern03` 帯に枠付きボタン3つ）
- [x] belief（`p-belief`）実装（6カード市松グリッド／カード内レイアウト／白ボタン）
- [x] レンタル衣装（`p-rental`）実装（横帯3枚＋小カード3枚）
- [x] 横スクロール解消（`.p-mv` に `overflow: hidden`）
- [x] 固定ヘッダーのロゴサイズ調整（width基準→`height: 4.4rem`）
- [x] intro セクション実装（背景 `bg_intro02` 全幅 / 黒ロゴ / キャッチ・本文、余白 106/44/88px）
- [x] `p-price`・`p-side` のスクロール追従を解除（`fixed`→`absolute`、`p-mv` 内へ移動）
- [x] ヘッダーのナビ均等配置（`space-around`＋右スペーサーで中央維持）と大ロゴ位置調整
- [x] 価格カード（`p-price`）の作り込み（背景画像 / 左上バッジ / 透過2カラム / 黒枠・区切り線）
- [x] サイドパネル（`p-side`）を1枚の帯がスライドする方式に変更（高さ20rem / ボタン背景画像）
- [x] FV の仮値を詰める（ヘッダー・サイド・価格）
- [x] ヘッダー固定切替（`.is-fixed`）と大ロゴ⇄小ロゴ入れ替えの確認（ヘッダー完成）
- [x] FV を実装（`p-mv` スライダー / `l-info` / `l-header` / `p-side` / `p-price`）
- [x] object/project 層を新設（mv / side / price）と layout/info の追加
- [x] スライドショー・ヘッダー固定の JS を実装（`js/main.js`）
- [x] ヘッダー（layout/header）の実装（固定切替まで）
- [x] Google Fonts のリンクを `index.html` に追加（Noto Serif JP / Cantata One）
- [x] Private リモート作成・push（github.com/N-Hayashi-v8/hanamusubi）
- [x] 変数（フォント・色）定義
- [x] 最小ワークスペース構成の作成（HTML / SCSS FLOCSS / docs）

---

## 記法ルール

- セクションは `Now` / `Next` / `Done` の3つで固定する
- 新規タスクは該当セクションの**末尾**に追記する
- 完了したら `Done` の**先頭**へ移し、`[x]` にする
- 1タスク1行。詳細が要るときは子箇条書きをぶら下げる
