# My Snow Monkey Starter Kit

Snow Monkeyのカスタマイズをするプラグイン生成のスターターキットです。

※ Snow Monkey 本体、Snow Monkey Dietは含まれていません。

[glightbox](https://biati-digital.github.io/glightbox/) をgallery blockのlightboxとして利用しています。

## Install

Node.js と npm
https://docs.npmjs.com/downloading-and-installing-node-js-and-npm

Docker
https://www.docker.com/get-started

wp-env
https://www.npmjs.com/package/@wordpress/env

composer
https://getcomposer.org/doc/00-intro.md

1. Snow Monkey を`./wp-content/themes/snow-monkey` に、Snow Monkey Dietを`./wp-content/plugins/snow-monkey-diet` に置いてください。
2. `wp-env start` でテーマがSnow MonkeyでSnow Monkey Block, Snow Monkey Editor, Snow Monkey Formが有効化されたローカル環境が`http://localhost:5432` で立ち上がります

### CSS, JSのbuildを利用する

`npm install`

### phpcsを利用する

`composer install`

### wp-envでローカル環境を構築する

`wp-env start`

または

`npm start`

で`http://localhost:5432`にSnow Monkeyをテーマとして有効化し Snow Monkey Diet, Snow Monkey Blocks, Snow Monkey Editor, Snow Monkey Formsがインストールされた環境が立ち上がります。

※ 2020/09/20現在、themeはインストールされていてもアクティベートされません。

[wp-envについてはこちら](https://github.com/WordPress/gutenberg/tree/master/packages/env#readme)

## Use

### 1. Custom Color Setup

カスタムカラーを`color-config.json`に指定し、以下のコマンドを実行。

`npm run init:colors`

### 2. Build

`npm run build`

### 3. watch

`npm run watch`

### 4. release

`npm run release`

