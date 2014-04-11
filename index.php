<?php

require_once('./conf/vars.php');

require_once('./classes/Smarty/Smarty.class.php');


$smarty = new \Smarty();
$smarty->setCacheDir(SMARTY_DIR_CACHE);
$smarty->setConfigDir(SMARTY_DIR_CONFIG);
$smarty->setCompileDir(SMARTY_DIR_COMPILE);
$smarty->setTemplateDir(SMARTY_DIR_TEMPLATES);



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

/*

$variable = ( is this statement true) ? yes it is true so set the variable to this : no it isn't true so set the variable to this;

$twitterhandle = 'abcum';

$twitterhandle = ($_COOKIE['twitterhandle']) ? $_COOKIE['twitterhandle'] : $twitterhandle;

$twitterhandle = ($_POST['twitterhandle']) ? $_POST['twitterhandle'] : $twitterhandle;

setcookie("twitterhandle", $twitterhandle);
*/



$twitterhandle = 'abcum';

if ($_COOKIE['twitterhandle'])
  $twitterhandle = $_COOKIE['twitterhandle'];

if ($_POST['twitterhandle'])
  $twitterhandle = $_POST['twitterhandle'];

setcookie("twitterhandle", $twitterhandle);

/*
if (!$_COOKIE['twitterhandle'] && !$_POST['twitterhandle'])
  $twitterhandle = 'abcum';

elseif ($_POST['twitterhandle'])
  $twitterhandle = $_POST['twitterhandle'];

elseif ($_COOKIE['twitterhandle'])
  $twitterhandle = $_COOKIE['twitterhandle'];

setcookie("twitterhandle", $twitterhandle);
*/


$getfield = "?screen_name={$twitterhandle}&count=20";


$twitter = new TwitterAPIExchange($settings);
// echo $twitter->setGetfield($getfield)
//              ->buildOauth($url, $requestMethod)
//              ->performRequest();

$json = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
$data = json_decode($json, true);

/**assign a word to a $value so the template file knows what the value is: now the template knows that the word data is refering to $data **/


$host = null;
$username = 'root';
$pass = null;
$database = 'iponda';
$port = null;
$sock = '/opt/local/var/run/mysql55/mysqld.sock';

$con = mysqli_connect($host, $username, $pass, $database, $port, $sock)or die("cannot connect");

    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

foreach($data as $tweet)
    {

    }


    mysqli_query($con,"INSERT INTO Tweets (tweets) VALUES ($data)");


  mysqli_close($con);




$smarty->assign('data', $data);
$smarty->assign('twitterhandle', $twitterhandle);


$smarty->display('index.tpl');

/*header('Content-type: application/json');
echo $json;
exit();*/

// if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}

// print_r($string);

// foreach($data as $item)
//     {
//         echo "Time and Date of Tweet: ".$items['created_at']."<br />";
//         echo "Tweet: ". $items['text']."<br /><br />";
//         echo "Source: ". $items['source']."<br /><br />";
//     }


// $people = array('fname' => 'John', 'lname' => 'Doe', 'email' => 'j.doe@example.com');


?>
