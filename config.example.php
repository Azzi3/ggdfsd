<?php
/**
 * CONFIG-FILE!
 * Fill with your personal variables
 * RENAME TO config.php
 */






//-------------------------------------------------
//define Database variables
//CHANGE THIS TO YOUR VARIABLES
define("DB_HOST", "localhost");
define("DB_DATABASE", "lia-projekt");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
//-------------------------------------------------












//----------------DON'T TOUCH, KK THX BBQ-----------------------------
//startSession
$lifetime=7200;
session_set_cookie_params($lifetime);
session_start();



//Define paths
if(isset($_GET['url'])){
	$url = $_GET['url'];
}else{
	$url = '';
}

/**
 * ROOT_PATH 	= the root (c:/..../...)
 * CURRENT_PATH = /projects/id
 * PATH / $path = homeDir
 */
define('ROOT_PATH',__DIR__);
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
$currentUrlNoQuery = explode('?', $_SERVER['REQUEST_URI'])[0];
define("CURRENT_PATH", $currentUrlNoQuery);
$path = str_replace($url, '', CURRENT_PATH);
define("PATH", $path);

?>