<?php

//Find URL
//$url = $_SERVER["REQUEST_URI"];


//Strip URL from ex. development enviroment.
$url = str_replace(ROOT_PATH, "/", $url);

//Break up the query to get pieces.
$url = explode("/", $url);
$urlEm = array_filter($url);
$url = array_values($urlEm);

//Set usefull variables.
$urlParams = 0;
$curPage = "";

//Loop through array of url-params and naming them url0, url1 etc (no ending).
if(isset($url[0])){
	foreach ($url as $key => $value) {
		//Naming URLS and remove an eventually querystring.
		//Using +1 will make it more simple to understand URLparams.
		$newVal = substr($value, 0, strpos($value, "?"));
		if($newVal == ""){
			${'url'.($key)} = $value;

		}
		else{
			${'url'.($key)} = $newVal;
		}

		//Set number of params in URL.
		$urlParams = $urlParams+1;

		//Naming the last parameter to our current page.
		$curPage = ${'url'.($key)};
	}
}

?>