<?php

// $app = new \Slim\Slim();

// $app->get('/', function () {
// 	readfile('index.html');	
// 	require('pages/home.php');

	
// $app->get('/phones', function () {
	
// 	$phones = $Phones->getAll();
	
// 	readfile('whychooseus.html');	
// });
// });


// {

// 	$txt="Hello world!";
// 	$x=5;
// 	$y=10.5;

// 	echo $txt;
// 	echo "<br>";
// 	echo $x+$y;
// 	echo "<br>";
// 	echo $y;
// 	echo "<br>";

// }


{

	echo '<div class="red">';
	
	$favcolor=  "blue";
	switch ($favcolor)

	{
	case "red":
	  echo "Your favorite color is red! <br> <br>";
	  break;
	case "blue":
	  echo "Your favorite color is blue! <br> <br>";
	  break;
	case "green":
	  echo "Your favorite color is green! <br> <br>";
	  break;
	default:
	  echo "Your favorite color is neither red, blue, or green! <br> <br>";
	}
	
	echo '</div>';

}


// {

// 	$box="blue";

// 	switch ($box)
// 	{
// 	case "red":
// 	  echo "Your favorite color is red! <br> <br>";
// 	  break;
// 	case "blue":
// 	  echo "Your favorite color is blue! <br> <br>";
// 	  break;
// 	case "green":
// 	  echo "Your favorite color is green! <br> <br>";
// 	  break;
// 	default:
// 	  echo "Your favorite color is neither red, blue, or green! <br> <br>";
// 	}

// }

// {
// 	$x=6;
// 	do
// 	   {
// 	   echo "The number is: $x <br>";
// 	   $x--;
// 	   }
// 	while ($x>-27);
// }

// {
// 	function Name($fname)
// 	{
// 	echo "Hello $fname .<br>";
// 	}		

// 	Name("Jani");
// 	Name("Hege");
// 	Name("Stale");
// 	Name("Kai Jim");
// 	Name("Borge");
// }

// $app->get('/phones', function () {
	
// 	$phones = $Phones->getAll();
	
// 	readfile('whychooseus.html');	
// });

// $app->get('/hello/:name', function ($name) {
// 	echo "Hello, $name";
// });
?>