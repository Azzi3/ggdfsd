<?php
if($signedUser){
	require_once('../partials/signedin-header.php');
}



if($signedUser['course_leader'] == 1){
	require_once('../partials/leader-header.php');
}else if($signedUser['student'] == 1){
	require_once('../partials/student-header.php');
}
else{
	//null
}
?>


<ul>
	<li><a href="<?php echo $path; ?>projects">Projekt</a></li>
	<li><a href="<?php echo $path; ?>company-list">Företag</a></li>
  <li><a href="<?php echo $path; ?>list-courses">Kurser</a></li>
  <li><a href="<?php echo $path; ?>list-student">Studenter</a></li>
  <li><a href="<?php echo $path; ?>manage-applications">Mina ansökningar</a></li>
</ul>

<?php require_once('login.php'); ?>