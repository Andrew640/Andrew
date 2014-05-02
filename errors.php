<?php

try {
   $ctime->createIndex(array('id' => 1), array("unique" => true));
}
catch(Exception $e) {
  print_r($e);
}

?>
