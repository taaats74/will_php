# ダウンロード資料(`ebooks`)実装メモ

合同会社ウィル WordPress テーマに追加した資料一覧 / 個別ページのセットアップ手順と運用ガイド。

## 構成ファイル

### 新規

| ファイル | 役割 |
|---|---|
| `archive-ebooks.php` | `/ebooks/` 一覧。タブ(お役立ち / サービス紹介)+ ピックアップ + 全件 + 信頼性ブロック |
| `single-ebooks.php` | 資料個別。左:本文 / 右:HubSpot フォーム sticky |
| `scss/style-template/_archive-ebooks.scss` | アーカイブ用 SCSS(`.ebooks-` プレフィックス) |
| `scss/style-template/_single-ebooks.scss` | 個別用 SCSS(`.ebooks-` プレフィックス) |
| `js/ebooks-archive.js` | タブ切替 + URLハッシュ同期 + GA4 イベント送出 |
| `acf-json/group_ebooks_settings.json` | ACF フィールドグループ「ダウンロード資料設定」 |

### 既存への追記

| ファイル | 追加内容 |
|---|---|
| `functions.php` | `is_post_type_archive('ebooks')` での JS enqueue / `pre_get_posts` で `posts_per_page=-1` / `acf/settings/load_json` 登録 |
| `scss/style-template/_index.scss` | `@use "archive-ebooks";` `@use "single-ebooks";` の 2 行 |

### 触っていないもの

- 投稿タイプ `ebooks` 登録(CPT UI 管理)
- タクソノミー `ebook_type` / `ebook_theme` / `ebook_pickup` 登録(CPT UI 管理)
- 既存の `archive-*.php` / `single-*.php` / `page-*.php`
- 既存 SCSS パーシャル(`_page-contentdl.scss` 含む)
- 既存 JS

## セットアップ手順

1. **CPT UI でタクソノミーが登録されていることを確認**
   - `ebook_type`(階層型 / ターム: `useful`, `service`)
   - `ebook_theme`(階層型 / ターム: `willsuppo`, `willsuppo-ec`, `partner-program`, …)
   - `ebook_pickup`(階層型 / ターム: `top_featured`, `archive_featured`)
   - 投稿タイプ `ebooks` に上記タクソノミーを紐付け

2. **パーマリンク再保存**
   - 設定 → パーマリンク設定 → 変更を保存(`/ebooks/` URL を有効化)

3. **ACF フィールドグループの読み込み確認**
   - 管理画面 → カスタムフィールド → 「ダウンロード資料設定」が表示されていれば OK
   - 表示されない場合は ACF プラグインを更新するか、グループ画面で「ローカル JSON」から同期

4. **SCSS コンパイル**
   - `_index.scss` に `@use "archive-ebooks";` `@use "single-ebooks";` 追記済み
   - 既存の Live Sass Compile などで `style.css` が再生成されることを確認

5. **テスト投稿で確認**
   - `ebooks` 投稿を 1 件作成し `ebook_type` / `ebook_theme` / `ebook_pickup` を付与
   - カスタムフィールドを入力(目次・こんな方におすすめ・HubSpot ID など)
   - `/ebooks/` 一覧と個別ページがそれぞれ意図通りに描画されるか確認

## 投稿運用ルール

### 必須項目

- アイキャッチ画像(資料カバー)
- タイトル(資料名)
- `ebook_type`:`useful` または `service` のどちらか必須
- HubSpot Portal ID / Form ID(フォーム表示に必要)

### 推奨項目

- サブコピー(`dl_subtitle`)
- 全ページ数(`dl_page_count`)
- こんな方におすすめ(`dl_target_items` 3〜6 件)
- この資料でわかること(`dl_benefit_items` 3〜5 件)
- 目次(`dl_toc_items`)
- 制作背景(`dl_message_body`)
- `ebook_theme` 1 つ以上(サービス別グルーピング・関連資料の精度向上に使用)

### ピックアップ運用

- アーカイブ上部のピックアップに出したい資料は `ebook_pickup` の `archive_featured` ターム付与
- 各タブ(useful / service)それぞれ最大 3 件まで表示
- ピックアップが 0 件なら注目セクション自体が非表示

### 関連資料の優先順位

1. `dl_related_ebooks` で手動指定(最大 3 件)
2. 同じ `ebook_type` かつ同じ `ebook_theme` の最新投稿
3. 同じ `ebook_type` の最新投稿
4. 全 `ebooks` の最新投稿

ブログ記事は混入しません(`ebooks` 投稿タイプのみ)。

## URL 仕様

| URL | 動作 |
|---|---|
| `/ebooks/` | お役立ち資料タブが初期選択 |
| `/ebooks/#useful` | お役立ち資料タブ |
| `/ebooks/#service` | サービス紹介資料タブ |
| `/ebooks/{slug}/` | 個別ページ |

## アクセシビリティ

- タブ UI は `role="tablist"` / `role="tab"` / `role="tabpanel"` / `aria-selected` / `aria-controls` 完全対応
- キーボード操作:左右矢印 / Home / End でタブ移動
- 非アクティブパネルは `hidden` 属性でスクリーンリーダーから除外
- `prefers-reduced-motion` でホバー / トランジションを無効化

## GA4 イベント

| イベント名 | 発火タイミング | パラメータ |
|---|---|---|
| `ebooks_tab_change` | タブ切替時 | `event_label`(useful / service) |
| `ebooks_card_click` | カード(資料リンク)クリック時 | `event_label`(資料タイトル) |
| `form_submit` | HubSpot フォーム送信完了時 | `event_label`(資料タイトル)、`ebook_id` |

## デザイントークン

```scss
$will-primary:   #7CC1C9;
$will-light:     #B4DBE0;
$will-accent:    #28849D;
$will-highlight: #F0E74E;
$will-text:      #3E5054;
$will-bg-pale:   #F0F8F9;
$will-border:    #C0D5D8;
$will-subtle:    #8AA0A4;
```

- 見出し:`$will-accent`
- 本文:`$will-text`
- CTA ボタン:背景 `$will-accent` / 文字 #ffffff
- 大面積背景:#ffffff または `$will-bg-pale`

## ブレイクポイント

- PC ベース → `@media (max-width: 770px)` で SP に切替(`_general.scss` 規約に準拠)

## 既知の注意点 / TODO

- `ebook_theme` のスラッグはプロジェクトの命名に応じて `archive-ebooks.php` の `$theme_groups` キーを差し替える(現状: `willsuppo` / `willsuppo-ec` / `partner-program` / `other`)
- HubSpot フォームを置く前に Portal ID / Form ID を ACF 入力。未設定時はプレースホルダー表示
- SP では `.ebooks-form-sidebar` が `position: static` で本文末尾に縦積み(構造上「この資料でわかること」直下への差し込みは PHP 構造変更が必要なため、現実装では本文末尾配置で代替)
