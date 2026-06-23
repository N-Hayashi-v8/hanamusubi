# TODO

## Now

- [ ] ブレークポイントの確定（暫定: sp 767 / pc 768）
- [ ] 各セクションの仮置き（`// 要確認`）を Figma 実値で確定（特に `p-blog` の幅・フッターの余白）
- [ ] about ページの仮置き（`// 要確認`）を確定（`p-page-title`・`p-about-*`・`l-breadcrumb` のフォント/余白）
- [ ] `p-contact` の残り仮置きを確定（カード上下padding・row余白・内側罫線の色/左右インセット・帯下余白）
- [ ] first ページの仮置き（`// 要確認`）を確定（`p-first-iroha`・`p-first-type`・`p-first-choice`・`p-first-option`・`p-first-rental` のフォント/余白、ボタンサイズ、金三角の形状・色、`p-first-type` のタイトル表記＝色打掛×3か白無垢/引振袖か、`p-first-option` の◆色＝金6色のどれか・2ブロック目の見出し「飾り小物」表記ゆれ）
- [ ] first パンくず連結の余白を実値で確定（`p-first-rental` の上下padding・パンくず下余白 6rem・全幅化に伴う文字左位置）
- [ ] flow ページの仮置き（`// 要確認`）を確定（`p-flow` の `__panel` 余白・`__head` フォント/下線間隔・`__select`/`__trial` 画像幅・`__note`・各ボタン `__btn-black`/`__btn-gold`/`__btn-dark` のサイズ・色＝`__btn-gold` の金は `$color-gold-6` 仮、`__notice` の各余白・ひし形/赤丸サイズ）
- [ ] report ページの仮置き（`// 要確認`）を確定（`p-report-list` の色hex＝タイトル赤`#a83427`/赤線`$color-pink`/プランのベージュ`$color-bg-beige`・カード上下/ベージュ上下/パンくず下の余白・各フォント、`bg_pattern01` の `repeat` 継ぎ目＝タイル可否、`p-report-intro` の文字上下20/12rem）

## Next

- [ ] SNSアイコン（`l-footer`）を正式アイコン画像/SVGに差し替え
- [ ] Googleマップ（`p-map`）の住所を実店舗に差し替え
- [ ] object/component・utility の追加
- [ ] 金系カラーの用途確定後に変数名をリネーム
- [ ] 残りの子ページ（よくある質問・ブログ・アクセス など）の作成（初めての方へ・ご利用の流れ・幸せレポート＝完了）
- [ ] 各子ページのナビ/フッターで未作成ページ向け `href="#"` を、ページ作成後に順次接続

## Done

- [x] 幸せレポートページ（`report.html`）作成・完成（`p-report-mv`＝全幅MV＋タイトル画像をabsoluteで重ね下にはみ出し／`p-report-intro`＝テクスチャ地にSemiBoldリード文／`p-report-list`＝ベージュ地に白カード×3：赤線・メタ密着ピル・メイン976＋サムネ760(両側170)・コメント1/2カラム460＋gap56／パンくず地続き／全6ページの導線接続／画像リネーム・フォント600追加）
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
