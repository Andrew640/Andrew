<?php


while($i<1000000) {

    echo rand();

    sleep(15);

    $i++;

}

// ------------------------------
// Setup everything
// ------------------------------

// openlog('php', LOG_ODELAY | LOG_PID, LOG_USER);
// syslog(LOG_ERR, 'Script starting: ' . $_SERVER['REQUEST_URI']);
// closelog();

/*use with console*/

require_once('./conf/vars.php');

require_once('./classes/Smarty/Smarty.class.php');

require 'vendor/autoload.php';


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


// $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";


$requestMethod = "GET";


$twitter = new TwitterAPIExchange($settings);

$conn = r\connect('localhost', 28015);

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
//
// if ($_COOKIE['twitterhandle'])
//   $twitterhandle = $_COOKIE['twitterhandle'];
//
// if ($_POST['twitterhandle'])
//   $twitterhandle = $_POST['twitterhandle'];

// ------------------------------
// Store the selected handle in
// a cookie to remember it for
// later on
// ------------------------------

// setcookie("twitterhandle", $twitterhandle);

// ------------------------------
// Check last time tweets
// were retrieved for the
// selected twitter handle
// ------------------------------

// try {

// $twitterhandle = 'techcrunch';


// $doc = r\db('Twitter')->table('Time')->get($twitterhandle)->pluck('loaded')->run($conn)->toNative();
// $loaded = $doc['loaded'];


 // $ctime->find( array('_id' => $twitterhandle), array('loaded') );
// }
// catch(Exception $e) {
//     // ignore errors here
// }

// foreach ($querytimes as $querytime) {
//     $onetime = $querytime['loaded'];
// }

// ------------------------------
// If the tweets were retrieved
// more than ### seconds ago
// then check twitter for the
// latest tweets and store any new
// tweets in the database
// ------------------------------

// $ctime->createIndex(array('twitterhandle' => 1), array("unique" => true));


// $time_10minutesago = time() - 600;

// if ($loaded < $time_10minutesago) { /*if number of seconds at which last checked is smaller than 600 seconds less than the current time, get tweets from twitter*/

        // r\db('Twitter')->table('Time')->filter(array('twitterhandle' => $twitterhandle))->get('loaded')->update(array('loaded' => time()))->run($conn);
        // r\db('Twitter')->table('Time')->get($twitterhandle)->pluck('loaded')->update(array('loaded' => time()))->run($conn);


        // $ctime->update(
        //     array("_id" => $twitterhandle),
        //     array("_id" => $twitterhandle, "loaded" => time()),
        //     array("upsert" => true)
        // );

        $getfield = "?screen_name={$twitterhandle}&count=20";
        $json = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
        echo strlen($json);exit();
        $data = json_decode($json, true);

        foreach ($data as $key => $tweet) {
            $data[$key]['created_time'] = strtotime($tweet['created_at']);
        }

        r\db('Twitter')->table('Tweets')->insert($data)->run($conn);


// }


// ------------------------------
// Pull all of the tweets for
// the selected twitter handle
// from the database
// ------------------------------

$tweets = r\db('Twitter')->table('Tweets')->filter(function($tweet) {
    $user = $tweet('user');
    return $user('screen_name')->eq('abcum');
    // return $tweet('user')('screen_name')->eq('abcum');
})->orderBy( array('created_time') )->run($conn);

foreach($tweets as $tweet) {
    print_r($tweet->toNative());
}

// print_r($tweets);

exit();

$i=0;

foreach($tweets as $tweet) {

    if ($i >= 20) break;

    $tweets[] = $tweet;

    $i++;

}


// $tweets = $mysqli->query("SELECT * FROM Tweets WHERE `name` = '$twitterhandle'")->fetch_all(MYSQLI_ASSOC);

// ------------------------------
// Display the tweets using
// smarty
// ------------------------------

$smarty->assign('tweets', $tweets);

$smarty->assign('twitterhandle', $twitterhandle);
/*The first value takes its definition from the second value. The second value has been defined above and now the first value can be read by the .tpl file*/

$smarty->display('index.tpl');

?>
