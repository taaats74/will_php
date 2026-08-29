# ブログ(/blog/)用 mu-plugin

`https://will-corp.co.jp/blog/` は**コーポレートサイトとは別のWordPress**（SWELL テーマ）で動いている。
このディレクトリはそのブログ側に置くコードのソース管理用で、**このテーマからは読み込まれない**。

## 設置先

```
/home/taaats74/will-corp.co.jp/public_html/blog/wp-content/mu-plugins/will-blog-structured-data.php
```

mu-plugins は**直下のPHPファイルのみ**が自動で読み込まれる（サブディレクトリは対象外）。

## なぜ子テーマではなく mu-plugin か

- 稼働中の有効テーマは親テーマの `swell` で、`swell_child` は無効。
  いま子テーマへ切り替えると、テーマ単位で保存されている
  ウィジェット配置（サイドバー・フッター）と追加CSSが現在の設定と食い違い、表示が変わる。
- mu-plugin は有効化不要・常時有効で、WordPress本体／テーマ／プラグインの
  どの更新でも置き換えられない。将来テーマを変更しても残る。

## 内容

| 機能 | 依存 |
|---|---|
| 記事本文の `<section id="faq">` から FAQPage を生成 | なし（Slim SEO が消えても動く） |
| ブログ単体の Organization をコーポレートと同一エンティティに統合 | Slim SEO の `slim_seo_schema_graph` |
| 著者を代表 高橋竜也 の Person に差し替え | 同上 |
| 日本語で機能していない wordCount を除去 | 同上 |

Slim SEO 側の仕様が変わってフィルタが呼ばれなくなった場合、統合系の3つは効かなくなるが、
対象が見つからなければ何もしない作りなのでサイトは壊れない。FAQPage は影響を受けない。

## 更新手順

1. このディレクトリのファイルを編集
2. `php -l` で構文チェック
3. サーバーへ転送し、サーバー側の PHP でも構文チェック
4. 記事ページの JSON-LD を確認

## 注意

mu-plugin は常時有効なため、致命的エラーはサイト全体を停止させる。
転送前後の構文チェックを省略しないこと。
