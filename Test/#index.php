<?php

require_once('./conf/vars.php');

require_once('./classes/Smarty/Smarty.class.php');


$smarty = new \Smarty();
$smarty->setCacheDir(SMARTY_DIR_CACHE);
$smarty->setConfigDir(SMARTY_DIR_CONFIG);
$smarty->setCompileDir(SMARTY_DIR_COMPILE);
$smarty->setTemplateDir(SMARTY_DIR_TEMPLATES);

// $smarty->display('./skin/templates/index.tpl');


{

	echo '<div class="red">';
	
	
	{

	$box="red";

	switch ($box)
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


?>

<!-- {$date} use for linking to this (smarty) -->