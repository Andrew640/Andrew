<?php

// require_once('./conf/vars.php');

// require_once('./classes/Smarty/Smarty.class.php');


// $smarty = new \Smarty();
// $smarty->setCacheDir(SMARTY_DIR_CACHE);
// $smarty->setConfigDir(SMARTY_DIR_CONFIG);
// $smarty->setCompileDir(SMARTY_DIR_COMPILE);
// $smarty->setTemplateDir(SMARTY_DIR_TEMPLATES);

// $smarty->display('index.tpl');


require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "351505732-9Fk9UBGnkTFCBLyqYZhiMw1nhXdHIH5OIQkk9ZR4",
    'oauth_access_token_secret' => "hLg57Z0BeaCscFvEV3rHr5QlmXyFd809ZZk7YgznBIDgz",
    'consumer_key' => "myB0Hr6IkRoX5IrkBPG0TXfMo",
    'consumer_secret' => "8NR75HQPf7rFUcXZlQNWGlW4vUh7uIq33RInPYTrbTstErqXiJ"
);
 
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
 
$requestMethod = "GET";
 
$getfield = '?screen_name=abcum&count=20';
 
$twitter = new TwitterAPIExchange($settings);
// echo $twitter->setGetfield($getfield)
//              ->buildOauth($url, $requestMethod)
//              ->performRequest();

$json = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
$data = json_decode($json, true);

// header('Content-type: application/json');
// echo $json;

// exit();

// if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}

// print_r($string);

foreach($data as $items)
    {
        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ". $items['text']."<br /><br />";
        echo "Source: ". $items['source']."<br /><br />";
    }

?>




