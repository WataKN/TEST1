# README # 
### How do I get set up? ###

１．外部ライブラリをインストール

$ curl -sS https://getcomposer.org/installer | php

$ sudo mv composer.phar /usr/local/bin/composer  
$ cd /work

$ vi composer.json で下記を記載。

{
    "require": {
        "php": ">=5.4.0",
        "abraham/twitteroauth": "0.5.0"
    }
{


$ composer install

２．config.phpにてCOMSUMER_KEYなどを設定。


下記エラーが出た場合、TwitterOAuth.php の private function oAuthRequest(url,url,method, $parameters) の private を削除。 
PHP Fatal error:  Call to private method Abraham\TwitterOAuth\TwitterOAuth::OAuthRequest() from context ''
