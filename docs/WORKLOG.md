# WORKLOG

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
