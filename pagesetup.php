<?php

//If nothing is in URL, load main(.php).
if($curPage == ""){
	$pageName = "main";
	$subTitle = "";
}

//EXAMPLE----------------------
//elseif{
//	$pageName = "PAGENAME HERE NO .PHP";
//	$subTitle = "SUBTITLE HERE";
//}
//EXAMPLE/---------------------

else{
	$pageName = "404";
	$subTitle = "404 (Page not found)";
}

?>