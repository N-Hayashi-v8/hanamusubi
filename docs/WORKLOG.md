# WORKLOG

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
