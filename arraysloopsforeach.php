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

echo $string;







exit ();


?>
