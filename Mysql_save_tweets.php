<?php

$host = null;
$username = 'root';
$pass = null;
$database = 'iponda';
$port = null;
$sock = '/opt/local/var/run/mysql55/mysqld.sock';

$mysqli = new mysqli($host, $username, $pass, $database, $port, $sock);



$tweets = $mysqli->query("SELECT * FROM Tweets WHERE `name` = '$twitterhandle'")->fetch_all(MYSQLI_ASSOC);



$time_lastchecked = $mysqli->query("SELECT timeentered FROM Time WHERE `twitterhandle` = '$twitterhandle'")->fetch_object()->timeentered;


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

        $statement = $mysqli->prepare("INSERT INTO Tweets (tweet,time,name,tweetid) VALUES (?, ?, ?, ?)");

        $statement->bind_param('sisi', $tweet['text'], strtotime($tweet['created_at']), $tweet['user']['screen_name'], $tweet['id']);

        $statement->execute();



$tweets = $mysqli->query("SELECT * FROM Tweets WHERE `name` = '$twitterhandle'")->fetch_all(MYSQLI_ASSOC);


$mysqli->close();



?>
