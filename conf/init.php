<?php

require 'vars.php';

function classload($NAME) {

    $STRUCTURE = explode('\\', $NAME);

    if ($STRUCTURE[0] && $STRUCTURE[0] == 'Smarty') {

        require_once( ROOT.'/classes/Smarty/Smarty.class.php' );

    }

    if ($STRUCTURE[0] && $STRUCTURE[0] == 'Iponda') {

        require_once( ROOT.'/classes/'. str_replace('\\', '/', $NAME).'.class.php' );

    }

}

spl_autoload_register('classload');

// ++++++++++++++++++++++++++++++
// LOAD CLASSES
// ++++++++++++++++++++++++++++++

require 'vendor/autoload.php';

$Core = new \Iponda\Main\Core();

// ++++++++++++++++++++++++++++++
// CONFIGURE SMARTY
// ++++++++++++++++++++++++++++++

$smarty = new \Smarty();
$smarty->setCacheDir(SMARTY_DIR_CACHE);
$smarty->setConfigDir(SMARTY_DIR_CONFIG);
$smarty->setCompileDir(SMARTY_DIR_COMPILE);
$smarty->setTemplateDir(SMARTY_DIR_TEMPLATES);

// ++++++++++++++++++++++++++++++
// CONFIGURE SMARTY
// ++++++++++++++++++++++++++++++

if (!$Core->url->param1) {
    $smarty->display('home.tpl');
}

if ($Core->url->param1 == 'login') {
    
    /*if ($Core->url->param2 == 'green')
        $smarty->assign('specialsmartycolourvariable', 'green');
    
    if ($Core->url->param2 == 'blue')
        $smarty->assign('specialsmartycolourvariable', 'blue');*/
    
    // if ($Core->url->param2 != 'green' && $Core->url->param2 != 'blue')
    // $smarty->assign('specialsmartycolourvariable', '#'.$Core->url->param2);
        
    $specialtobiearray = array(
        'blue',
        'green',
        'lightblue',
        'yellow',
        '#00BFFF',
        '#000000'  
    );
    
    print_r($specialtobiearray);
    
    $smarty->assign('specialsmartycolourvariable', $specialtobiearray[rand(0,5)]);

    $smarty->assign('specialsmartyuser', $Core->url->param2);
    
    $smarty->display('login.tpl');
    
}

// $smarty->display('index.tpl');

// $smarty->assign('iponda', $iponda);
// $smarty->display($template);

// $pages = array(
//         "home" => array("index.tpl", " - Home"),
//         "test" => array("test.tpl", " - test"),
//         "test2" => array("test2.tpl", " - test2"),
//         "e404"   => array("404.tpl", " - Page not found")
//     );

//     $pag_selected = $pages["home"];





    
    // if(isset($pages[$_GET["test"]]) && isset($pages[$_GET["test"]])):
    //     $pag_selected = $pages[$_GET["test"]];
    // endif;
    
    // $smarty->assign('home', $pag_selected[0]);
    // $smarty->assign('test', $pag_selected[1]);
    // $smarty->assign('test2', $pag_selected[2]);
    // $smarty->assign('e404', $pag_selected[3]);

    // $smarty->display($pag_selected[0]);
    // $smarty->display($pag_selected[1]);
    // $smarty->display($pag_selected[2]);
    // $smarty->display($pag_selected[3]);


// {
// 	if(empty($_GET[page])){
		
// 	 $template="index.tpl";
// 	 $smarty->assign('pagename', ' - Home');
// 	}

// 	else {
		
// 	$page = $_GET["page"];
// 	switch ($page) {
// 	        case "home":
// 	            $template="index.tpl";
// 	             $smarty->assign('pagename', ' - Home');
// 	            break;
// 	        case "contact":
// 	            $template="test.tpl";
// 	            $smarty->assign('pagename', ' - Contact us');
// 	            break;
// 	        case "verify":
// 	            $template="test2.tpl";
// 	            $smarty->assign('pagename', ' - Verify your account');
// 	            break;
// 	    }

// }




// $app->run();

?>