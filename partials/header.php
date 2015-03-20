<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<title>Lia projekt<?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo $path; ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $path; ?>assets/css/custom.css">
	<script src="<?php echo $path; ?>assets/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $path; ?>assets/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $path; ?>assets/js/jquery.required.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $path; ?>assets/js/main.js" type="text/javascript" charset="utf-8"></script>
	<style type="text/css" media="screen">
		.ui-state-error{
			border: 1px solid red !important;
		}
	</style>
</head>
<body>
<?php

	$user = new User();
	$session = new Session();

	if($user->getUserByGuid($session->getSession('guid'))){

		if(isset($_GET['logout'])){
			$user->logout($session->getSession('guid'));
			$session->killSession('guid');
			redirect($path);
		}

		$signedUser = $user->getUserByGuid($session->getSession('guid'));
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) &&
     empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0) {
  		$errors = array();
 		$errors[] = 'Filen är för stor, välj en mindre fil (max 2MB).';
 		$session->setSession('error',$errors);
	}

	include("nav.php");

?>
