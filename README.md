# My Snow Monkey Starter Kit

Snow Monkeyのカスタマイズをするプラグイン生成のスターターキットです。

※ Snow Monkey 本体、Snow Monkey Dietは含まれていません。公式サイトより購入してご利用ください。

[glightbox](https://biati-digital.github.io/glightbox/) をgallery blockのlightboxとして利用しています。

## Install

### CSS, JSのbuildを利用する

`npm install`

### phpcsを利用する

`composer install`

### wp-envでローカル環境を構築する

`wp-env start`

で`http://localhost:54321`にSnow Monkeyをテーマとして有効化し、wp lazy loading, Snow Monkey Diet, Snow Monkey Blocks, Snow Monkey Editor, Snow Monkey Formsがインストールされた環境が立ち上がります。

[wp-envについてはこちら](https://github.com/WordPress/gutenberg/tree/master/packages/env#readme)

## Use

### 1. Custom Color Setup

カスタムカラーを`color-config.json`に指定し、以下のコマンドを実行。

`npm run init:colors`

### 2. Build

`npm run build`

### 3. release

`npm run release`

