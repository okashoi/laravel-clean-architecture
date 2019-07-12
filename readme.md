## Laravel を用いたクリーンアーキテクチャに基づく実装のサンプルアプリケーション

## 動作環境

* Docker
* Docker Compose

## ディレクトリ構造

```text
./
 |-- services/          # Docker イメージビルド用のファイル等が入っている
 |-- src/               # ソースコード
 :  :
 |  |-- packages/       # 各パッケージ
 |  |  |-- api/         # Web API 用パッケージ
 |  |  |-- components/  # 各種ビジネスルール（Application Business Rules, Enterprise Business Rules）
 |  |  |-- console/     # コンソール用パッケージ
 |  |  |-- database/    # データベース用パッケージ
 |  |  `-- database/    # Web アプリケーション用パッケージ
 :  :
```

詳細は各パッケージの readme を参照のこと


## 参考スライド

* [Laravel でやってみるクリーンアーキテクチャ #phpconfuk](https://www.slideshare.net/ShoheiOkada/laravel-phpconfuk-152500600)
    * 2018/06/29 開催の [PHP カンファレンス福岡 2019](https://phpcon.fukuoka.jp/2019/) の発表資料
