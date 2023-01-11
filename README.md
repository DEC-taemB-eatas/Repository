# 開発環境構築
## 事前準備
* docker が動く状態にしておく．
  ```
  docker -v

  Docker version 20.10.12, build e91ed57

  docker-compose -v

  docker-compose version 1.26.2, build eefe0d31
  ```

* curl も必要．

  ```
  curl --version

  curl 7.68.0 (x86_64-pc-linux-gnu) libcurl/7.68.0 OpenSSL/1.1.1f zlib/1.2.11 brotli/1.0.7 libidn2/2.2.0 libpsl/0.21.0 (+libidn2/2.2.0) libssh/0.9.3/openssl/zlib nghttp2/1.40.0 librtmp/2.3
  Release-Date: 2020-01-08
  Protocols: dict file ftp ftps gopher http https imap imaps ldap ldaps pop3 pop3s rtmp rtsp scp sftp smb smbs smtp smtps telnet tftp
  Features: AsynchDNS brotli GSS-API HTTP2 HTTPS-proxy IDN IPv6 Kerberos Largefile libz NTLM NTLM_WB PSL SPNEGO SSL TLS-SRP UnixSockets
  ```

## プロジェクトのクローン
```
git clone git@github.com:DEC-taemB-eatas/target.git
```

## 必要なディレクトリの作成
このまま起動すると必要なディレクト入りがなくてエラーになる．

そのため，下記コマンドを順に実行して必要なディレクトリを作成する．
```
mkdir -p storage/framework/cache/data/
mkdir -p storage/framework/app/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
```

* 以下プロジェクトディレクトリに移動すること（以下のコードで移動）
```
cd ./target
```

## コンテナ動作に必要なファイルをダウンロード & インストール
Laravel Sail の実行に必要な vendor ディレクトリは Git では管理されていない．そのため，コマンドを実行して用意する必要がある．

下記コマンドを実行すると自動的に全部入る．6 行まとめて入力して実行すること．

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
## env ファイルの準備
下記コマンドで準備する．
```
cp .env.example .env
```
ファイルができたら mysql 設定部分を以下のように編集する．

DB_USERNAME と DB_PASSWORD が DB のアクセス情報となる．phpmyadmin もこの情報でログインすることとなる．
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=プロジェクト作成者のDB名に合わせる
DB_USERNAME=プロジェクト作成者のユーザ名に合わせる
DB_PASSWORD=プロジェクト作成者のパスワードに合わせる
```
## 動作確認
下記コマンドでコンテナを立ち上げる

```
./vendor/bin/sail up -d
```
立ち上がったら下記コマンドを順に実行し，アプリケーションの準備を整える．
```
./vendor/bin/sail php artisan key:generate
./vendor/bin/sail php artisan migrate
```
ブラウザから localhost にアクセスするとアプリケーションの動作が確認できる．

また，```localhost:8080``` にアクセスすると phpmyadmin にアクセスできる．

* ユーザー名は「sail」パスワードは「password」
* これでうまくログイン出来ないときはユーザー名「root」パスワードは空白でログインするとうまくいくはず
* データベースは共有されていないため、マイグレーションやseederなどのデータベースの更新は各自作業が必要→メンバーで共有する

コンテナ終了させるときは下記コマンドを実行する．

```
./vendor/bin/sail down
```
