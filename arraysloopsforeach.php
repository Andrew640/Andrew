<?php

$food = array(
  'Dairy' => 'Cheese',
  'Fruit' => 'orange',
  'Bread',
  'Fish' => array(
    'Salmon',
    'trout',
    'cod'
  )

);

foreach($food as $key => $value)
{

    if (is_array($value))
    {
      foreach($value as $number => $arrayvalue)
         {
           echo $number . ' ' . $arrayvalue . '<br />';
         }
    }

    else
    {
      echo $key . ' ' . $value . '<br />';
    }

}




$string = "this is a strange string<br /><br />";

echo $string;

$string = str_replace('a', '1', $string);
$string = str_replace('t', '2', $string);

$searches = array('a', 'b');
$replaces = array('1', '2');

$string = str_replace($searches, $replaces, $string);

echo $string;

exit ();







if (!is_null($getfield))
{
    $getfields = str_replace('?', '', explode('&', $getfield));
    foreach ($getfields as $g)
    {
        $split = explode('=', $g);
        $oauth[$split[0]] = $split[1];
    }
}

$stirng = "user=tobie&pass=123456&time=now";

$exploded = explode('&', $stirng);

$explodedwouldbelikethis = array(
  'user=tobie',
  'pass=123456',
  'time=now'
);







// JS
var myarray = [];

// PHP 5.3
$array = array();

// PHP 5.4
$array = [];







$temp = false;

// if evaluates to true
//   - boolean (true)
//   - string other than '0'
//   - int other than 0
//   - anything which is not null

if ($temp) echo 'Temp exists';


echo '<br />';

// if variable has been set
//   - boolean (true/false)
//   - any string
//   - any int
//   - anything which is not null

if ( isset($temp) ) echo 'Temp is set';




// If account name set in url, go to that account. If not, default to abcum.

if ($_GET['t']) {
  $getfield = "?screen_name={$_GET['t']}&count=20";

}
else {
  $getfield = "?screen_name=abcum&count=20";

}


$x = ($y == 2) ? 9 : 3;

return ($user['type'] == 'admin') ? 'admin' : 'normal';

if ($user['type'] == 'admin')
  return 'admin';
else
  return 'normal';


// cookie creation methods- best one is in index.php



// $variable = ( is this statement true) ? yes it is true so set the variable to this : no it isn't true so set the variable to this;

$twitterhandle = 'abcum';

$twitterhandle = ($_COOKIE['twitterhandle']) ? $_COOKIE['twitterhandle'] : $twitterhandle;

$twitterhandle = ($_POST['twitterhandle']) ? $_POST['twitterhandle'] : $twitterhandle;

setcookie("twitterhandle", $twitterhandle);



if (!$_COOKIE['twitterhandle'] && !$_POST['twitterhandle'])
  $twitterhandle = 'abcum';

elseif ($_POST['twitterhandle'])
  $twitterhandle = $_POST['twitterhandle'];

elseif ($_COOKIE['twitterhandle'])
  $twitterhandle = $_COOKIE['twitterhandle'];

setcookie("twitterhandle", $twitterhandle);


// Foreach statement- split up


foreach($data as $item)
    {
        echo "Time and Date of Tweet: ".$item['created_at']."<br />";
        echo "Tweet: ". $item['text']."<br /><br />";
        echo "Source: ". $item['source']."<br /><br />";
    }



?>
