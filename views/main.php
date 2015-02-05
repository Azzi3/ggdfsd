<?php
if($signedUser['course_leader'] == 1){
	require_once('../partials/leader-header.php');
}
?>


<ul>
	<li><a href="<?php echo $path; ?>projects">Projekt</a></li>
	<li><a href="<?php echo $path; ?>manage-company">Företag</a></li>
</ul>

<?php require_once('login.php'); ?>