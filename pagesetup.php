<?php
$user = new User();
$session = new Session();

if($user->getUserByGuid($session->getSession('guid'))) {

	if(isset($_GET['logout'])){
		$user->logout($session->getSession('guid'));
		$session->killSession('guid');
		redirect($path);
	}
		$signedUser = $user->getUserByGuid($session->getSession('guid'));

}

//If nothing is in URL, load main(.php).
if($curPage == ""){
	$pageName = "main";
	$subTitle = "";
}
else if($curPage == 'projects' && $signedUser){
	$pageName = "projects";
	$subTitle = "List projects";
}
else if($curPage == 'manage-projects' && $signedUser){
	$pageName = "manage-projects";
	$subTitle = "Manage project";
}
else if($curPage == 'manage-company' && $signedUser['company_owner'] == 1){
	$pageName = "manage-company";
	$subTitle = "Hantera företag";
}
else if($curPage == 'company-list'){
	$pageName = "company-list";
	$subTitle = "Företagslista";
}

else if($curPage == 'company-profile' && $signedUser){
	$pageName = "company-profile";
	$subTitle = "Företagsprofil";
}

else if($curPage == 'apply' && $signedUser['student'] == 1){
	$pageName = "apply-project";
	$subTitle = "Ansök";
}

else if($curPage == 'generate-key' && $signedUser['course_leader'] == 1){
	$pageName = "generate-key";
	$subTitle = "Generera nyckel";
}

else if($curPage == 'manage-user' && $signedUser) {
	$pageName = "manage-users";
	$subTitle = "Hantera dina uppgifter";
}

else if($curPage == 'manage-courses' && $signedUser['course_leader'] == 1) {
	$pageName = "manage-courses";
	$subTitle = "Hantera kurser";
}

else if($curPage == 'register') {
	$pageName = "register";
	$subTitle = "Registrera";
}

else if($curPage == 'course-list') {
	$pageName = "course-list";
	$subTitle = "Kurser";
}

else if($curPage == 'course-info'){
	$pageName = "course-info";
	$subTitle = "Kurs";
}

else if($curPage == 'student-profile' && $signedUser){
	$pageName = "student-profile";
	$subtitle = "Studentprofil";
}
else if($curPage == 'manage-applications' && $signedUser){
	$pageName = "manage-applications";
	$subtitle = "Ansökningar";
}
else if($curPage == 'project-info'){
	$pageName = "project-info";
	$subtitle = "Projektinfo";
}


else if($curPage == 'list-student'){
	$pageName = "list-student";
	$subtitle = "List students";
}

else if($curPage == 'manage-tags'){
	$pageName = "manage-tags";
	$subtitle = "Manage tags";
}
else if($curPage == 'match' && $signedUser){
	$pageName = "match";
	$subtitle = "Hitta företag";
}

else{
	$pageName = "404";
	$subTitle = "404 (Page not found)";
}

?>
