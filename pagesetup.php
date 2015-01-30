<?php

//If nothing is in URL, load main(.php).
if($curPage == ""){
	$pageName = "main";
	$subTitle = "";
}
else if($curPage == 'projects'){
	$pageName = "projects";
	$subTitle = "List projects";
}
else if($curPage == 'manage-projects'){
	$pageName = "manage-projects";
	$subTitle = "Manage project";
}
else{
	$pageName = "404";
	$subTitle = "404 (Page not found)";
}

?>