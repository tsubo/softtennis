# ソフトテニスホームページ説明書

## ホームページの構成要素

![レイアウト構成](img/doc/layout_elements.png)
![ページコンテンツ構成](img/doc/page_elements.png)

## ディレクトリ構成

```
softtennis/
│
├── README.md                       このファイル
├── apple-touch-icon.png            iOS デスクトップ用のアイコン
├── composer.json                   PHP関連（知らなくても大丈夫です）
├── composer.lock                   PHP関連（知らなくても大丈夫です）
├── favicon.ico                     ファビコン
├── index.php                       トップページ（PHPで記述されています）
├── img/                            画像を格納
│   └── slider/                     スライダ用の画像を格納
├── lib/                            PHPのソースコードを格納
│
├── templates/                      トップページの HTML を格納
│   ├── layouts/                    レイアウト用 HTML を格納
│   │   ├── _bottom.html.twig
│   │   ├── _footer.html.twig
│   │   ├── _head.html.twig
│   │   ├── _header.html.twig
│   │   ├── _sitecss.html.twig
│   │   └── base.html.twig
│   ├── mega_menu/                  メガメニュー用 HTML を格納
│   │   ├── _bag.html.twig
│   │   ├── _ball.html.twig
│   │   ├── _brand.html.twig
│   │   ├── _gut.html.twig
│   │   ├── _other.html.twig
│   │   ├── _racket.html.twig
│   │   ├── _shoes.html.twig
│   │   ├── _wear.html.twig
│   │   └── mega_menu.html.twig
│   └── pages/                      ページ用 HTML を格納
│       └── home/                   トップページ用 HTML を格納
│           ├── _blog_youtube.html.twig     ブログと Youtube ブロック
│           ├── _hot_products.html.twig     店長のおすすめブロック
│           ├── _info.html.twig             インフォメーションブロック
│           ├── _new_products.html.twig     新着商品ブロック
│           ├── _news.html.twig             おしらせとピックアップブロック
│           ├── _pagescript.html.twig       ページ用 JavaScript（未使用）
│           ├── _popular_products.html.twig 人気商品ブロック
│           ├── _slider.html.twig           スライダーブロック
│           └── home.html.twig              トップページ本体
│
└── vendor/                         PHP のライブラリを格納
```

## PC ローカル環境構築（Mac 用）

### PHP 動作確認

ターミナルを起動して以下のコマンドを実行。
以下のようにバージョンが表示されれば OK。

PHP のバージョンが表示されなければ、ググって PHP をインストールしてください。

```
$ php -v

PHP 5.6.29 (cli) (built: Dec  9 2016 07:03:56) 
Copyright (c) 1997-2016 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies
```

### Composer をインストール

ターミナルで以下のコマンドを実行。実行場所はどこでも OK

```
$ curl -sS https://getcomposer.org/installer | php
$ mv composer.phar /usr/local/bin/composer
```

ターミナルを再起動して以下のコマンドを実行。
ロゴとバージョンが表示されれば OK。

```
$ composer
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.1.3 2016-06-26 15:42:08
```

### ホームページのセットアップ

- softtennis.zip ファイルをダブルクリックして解凍。上記の「ディレクトリ構成」が展開される。
- `composer install` コマンドで PHP が必要としているライブラリをインストール
- `ls -l` コマンドで `vendor` ディレクトリが生成されていれば OK

```
$ cd /path/to/softtennis
$ composer install
...
$ ls -l
...
drwxr-xr-x  6 username  groupname    204  3 23 22:23 vendor
```

### ホームページの表示確認

- php のビルトインサーバを起動

```
$ cd /path/to/softtennis
$ php -S localhost:8000
...
```

- WWW ブラウザの URL に `localhost:8000` を入力
- ホームページが表示されれば OK
- PHP ビルトインサーバを終了する時は、起動したターミナル画面で `Ctrl+C`

## ホームページの修正手順（Mac用）

### 必要なツール

- エディタ（Atom か Visual Studio Code がお薦めです）
- FTPクライアント（FileZilla がお薦めです）

各ツールのインストール方法、設定方法はググって調べて下さい

### ホームページの修正とファイル転送

- template ディレクトリ以下のファイルをエディタで修正
- どのファイルを修正するかは、上記の「ホームページの構成要素」図および「ディレクトリ構成」を参照してください
- PC ローカル環境で修正内容が正しく反映されているかをブラウザで確認
- 修正したファイルを FTP サーバーに転送
- インターネット上のホームページに修正が反映されたかをブラウザで確認

### サブページのヘッダ・フッタへの反映

ヘッダやメガメニュー、インフォメーション、フッタを修正した時は、Future Shop の管理画面からサブ画面用のヘッダ、フッタの HTML コードを修正する必要があります。

- ブラウザでトップページを表示
- 右クリックしてメニューから「ソースを表示」を選択
- ヘッダ〜メガメニューの部分 or インフォーメーション〜フッタ部分の HTML をコピー
- [管理画面]-[デザイン設定]-[本番用]の編集ボタンをクリック
- 「ヘッダエリアに表示させるHTMLタグ」or 「フッタエリアに表示させるHTMLタグ」にペーストして登録
- サブ画面のヘッダ、フッタに変更内容が反映されているかブラウザで確認

