# 未使用画像の退避ディレクトリ(2026-05-10)

このディレクトリは、テーマ内のソースコード(PHP / CSS / SCSS / JS / HTML / JSON / MD / TXT)から
ファイル名参照が grep でヒットしなかった画像を一時的に退避した場所です。

## 検出方法

- 対象: `wp-content/themes/will-corp/` 配下の画像(.png / .jpg / .jpeg / .webp / .svg / .gif / .avif)
- 検出: 各画像のファイル名(basename)が、テーマ内のソースに 1 件もヒットしなかったもの
- 結果: 全 149 枚中 61 枚が候補(全 17.92 MB)

## 検出できないケース(注意)

- 動的に組み立てられた URL(変数連結など)
- WordPress 投稿本文 / カスタムフィールド / オプションに DB 経由で格納されている画像
- 第三者ツール / メールテンプレート / 外部サイトからの直接参照

そのため、削除前に**主要ページ + 過去記事の表示を巡回確認**してください。

## 復元方法

特定ファイルを戻すには:

```bash
git mv _unused_images_20260510/img/foo.png img/foo.png
```

すべて戻すには:

```bash
cd _unused_images_20260510
for f in $(find . -type f -not -name README.md); do
  git mv "$f" "../$f"
done
```

## 一定期間運用に問題が出なければ削除

git 履歴に残るため、削除後も `git log --follow` 等で過去の内容にはアクセス可能。
