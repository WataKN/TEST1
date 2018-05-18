<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>TwitterAPI利用</title>
    <script scr="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
</head>

<?php


require_once('twitteroauth/autoload.php');
require_once('twitteroauth/src/TwitterOAuth.php');
require_once(dirname(__FILE__) . '/config.php');
use Abraham\TwitterOAuth\TwitterOAuth;;


$twObj = new TwitterOAuth(
		consumer_key,
		consumer_secret,
		access_token,
		access_token_secret
		);

$search_word ='JustinBieber filter:images -rt';

$param = array(
		"q"=>$search_word,                  // keyword
		"lang"=>"ja",                   // language
		"count"=>10,                   // number of tweets
		"result_type"=>"recent",       // result type
		"include_entities"=>true       // entities
);
$json = $twObj->OAuthRequest(
		"https://api.twitter.com/1.1/search/tweets.json",
		"GET",
		$param);
$tweets = json_decode($json, true);


if(isset($tweets['statuses']) && empty($tweets->errors)){

	foreach($tweets['statuses'] as $tweet){
		if(isset($tweet['entities']['media'][0]['media_url_https']) ){
?>
	<ul>
		<p>
		<img src="<?php echo $tweet['entities']['media'][0]['media_url_https']; ?>">
		</p>
	</ul>
<?php
    	}
    }

}else{
	echo 'No images';
}

?>


</html>