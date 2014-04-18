<?php

// ------------------------------
// Setup everything
// ------------------------------

openlog('php', LOG_ODELAY | LOG_PID, LOG_USER);
syslog(LOG_ERR, 'Script starting: ' . $_SERVER['REQUEST_URI']);
closelog();

/*use with console*/

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


$twitter = new TwitterAPIExchange($settings);

$host = null;
$username = 'root';
$pass = null;
$database = 'iponda';
$port = null;
$sock = '/opt/local/var/run/mysql55/mysqld.sock';

$mysqli = new mysqli($host, $username, $pass, $database, $port, $sock);


// ------------------------------
// If no twitter handle has been
// defined with the form input
// box or with a cookie, default
// to this one
// ------------------------------

$twitterhandle = 'abcum';

// ------------------------------
// Check for the selected
// twitter handle using the
// input form, or a cookie
// ------------------------------

if ($_COOKIE['twitterhandle'])
  $twitterhandle = $_COOKIE['twitterhandle'];

if ($_POST['twitterhandle'])
  $twitterhandle = $_POST['twitterhandle'];

// ------------------------------
// Store the selected handle in
// a cookie to remember it for
// later on
// ------------------------------

setcookie("twitterhandle", $twitterhandle);

// ------------------------------
// Check last time tweets
// were retrieved for the
// selected twitter handle
// ------------------------------

$time_lastchecked = $mysqli->query("SELECT timeentered FROM Time WHERE `twitterhandle` = '$twitterhandle'")->fetch_object()->timeentered;

// ------------------------------
// If the tweets were retrieved
// more than ### seconds ago
// then check twitter for the
// latest tweets and store any new
// tweets in the database
// ------------------------------

$time_10minutesago = time() - 600;

if ($time_lastchecked < $time_10minutesago){ /*if number of seconds at which last checked is smaller than 600 seconds less than the current time, get tweets from twitter*/

    $statement = $mysqli->prepare("REPLACE INTO Time (twitterhandle,timeentered) VALUES (?,?)");
    $statement->bind_param('si',$twitterhandle,time());
    $statement->execute();

    $getfield = "?screen_name={$twitterhandle}&count=20";
    $json = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
    $data = json_decode($json, true);

    foreach($data as $tweet) {

        openlog('php', LOG_ODELAY | LOG_PID, LOG_USER);
        syslog(LOG_ERR, 'New item into Tweets');
        closelog();

        $statement = $mysqli->prepare("INSERT INTO Tweets (source,tweet,time,name,tweetid) VALUES (?, ?, ?, ?, ?)");

        $statement->bind_param('ssisi', $tweet['source'], $tweet['text'], strtotime($tweet['created_at']), $tweet['user']['screen_name'], $tweet['id']);


    }

}

// ------------------------------
// Pull all of the tweets for
// the selected twitter handle
// from the database
// ------------------------------

$tweets = $mysqli->query("SELECT * FROM Tweets WHERE `name` = '$twitterhandle'")->fetch_all(MYSQLI_ASSOC);

// ------------------------------
// Display the tweets using
// smarty
// ------------------------------

$mysqli->close();


$smarty->assign('tweets', $tweets);
$smarty->assign('twitterhandle', $twitterhandle);
/*The first value takes its definition from the second value. The second value has been defined above and now the first value can be read by the .tpl file*/

$smarty->display('index.tpl');


?>
