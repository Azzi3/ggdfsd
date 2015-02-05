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
else if($curPage == 'manage-company'){
	$pageName = "manage-company";
	$subTitle = "Hantera företag";
}
else if($curPage == 'company-list'){
	$pageName = "company-list";
	$subTitle = "Företagslista";
}

else if($curPage == 'company-profile'){
	$pageName = "company-profile";
	$subTitle = "Företagsprofil";
}

else if($curPage == 'generate-key'){
	$pageName = "generate-key";
	$subTitle = "Generera nyckel";
}

else if($curPage == 'manage-courses') {
	$pageName = "manage-courses";
	$subTitle = "Hantera kurser";
}

else{
	$pageName = "404";
	$subTitle = "404 (Page not found)";
}

?>