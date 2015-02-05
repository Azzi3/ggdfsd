<?php
if($signedUser['course_leader'] == 1){
	require_once('../partials/leader-header.php');
}
?>


<ul>
	<li><a href="<?php echo $path; ?>projects">Projekt</a></li>
	<li><a href="<?php echo $path; ?>company-list">Företag</a></li>
  <li><a href="<?php echo $path; ?>list-courses">Kurser</a></li>
</ul>

<?php require_once('login.php'); ?>