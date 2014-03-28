<?php

namespace Iponda\Main;

class Core {
	
	function __construct() {
		
		$this->getURL();
		
	}
	
	function getURL() {
		
		$queries = explode('/', $_SERVER['REQUEST_URI']);

		foreach ($queries as $key => $value) {
		    
		    if ($key == 0) continue;

		    $i++;

		    $this->url->{ 'param' . $i } = current(explode("&", $value, 2));

		}
		
	}
	
}

?>