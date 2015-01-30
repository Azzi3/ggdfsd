<?php

//Title variables
$subTitle = "";
$pageId = 0;
$itemId = "";
$title = "";
$titleSeperator = '-';

if(preg_match('/(?i)msie [2-8]/',$_SERVER['HTTP_USER_AGENT']))
{
    // if IE<=8
    die();
}


require_once('pagesetup.php');


//Change subtitle if set
if($subTitle != "")
$title = " ".$titleSeperator. " ".$subTitle;


//Require all the necessary files
require_once("views/header.php");
require_once("views/".$pageName.".php");
require_once("views/footer.php");

?>