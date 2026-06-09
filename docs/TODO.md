# TODO

## Now

- [ ] ブレークポイントの確定（暫定: sp 767 / pc 768）
- [ ] report 以降のセクション（ブログ・フッター等）の実装

## Next

- [ ] 各セクションの残り仮置き（`// 要確認`）を Figma 実値で確定
- [ ] object/component・utility の追加
- [ ] 金系カラーの用途確定後に変数名をリネーム

## Done

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
