<?php
//classloader--------------------------------------------


//Localize director of classes and scan.
$filePath = __DIR__."/class/";
$files = scandir($filePath);


//Load all files inside classfolder.
foreach ($files as $file) {
	if(strlen($file)>5)
	require_once($filePath.$file);
}

//end of classloader--------------------------------------------

?>