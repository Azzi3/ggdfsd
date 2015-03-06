<?php 

$liaProject = new liaProject();
$course = new Course();
$CompanyObj = new Company();
$UserObj = new User();

if(isset($_GET['deleteid'])){

	$liaProject->removeApplicant($_GET['deleteid']);
	redirect(CURRENT_PATH);
}

if(isset($_GET['accept']) && isset($_GET['uid'])){
	$userEmail = $UserObj->getUserByid($_GET['uid'])['email'];

	$subject = 'LIA-plats accepterad';
	$msg = 'Din sökta LIA-plats är accepterad, logga in på LIAbanken för mer information.';
	mail($userEmail, $subject, $msg, 'From: noreply@liabanken.se');

	$liaProject->acceptApplicant($_GET['uid'], $_GET['accept']);
	redirect(CURRENT_PATH);
}

if(isset($_GET['deny']) && isset($_GET['uid'])){
	$userEmail = $UserObj->getUserByid($_GET['uid'])['email'];

	$subject = 'LIA-plats nekad';
	$msg = 'Din sökta LIA-plats är nekad, logga in på LIAbanken för mer information.';
	mail($userEmail, $subject, $msg, 'From: noreply@liabanken.se');

	$liaProject->denyApplicant($_GET['uid'], $_GET['deny']);
	redirect(CURRENT_PATH);
}

if(isset($_GET['finish']) && isset($_GET['uid'])){
	$liaProject->finishApplicant($_GET['uid'], $_GET['finish']);
	redirect(CURRENT_PATH);
}

if($signedUser['student']){
	$myApplications = $liaProject->getMyApplicationsUser($signedUser['id']);
	$thName = 'Företag';
}elseif($signedUser['company_owner']){
	$myApplications = $liaProject->getMyApplicationsCompany($signedUser['company_id']);
	$thName = "Elevens namn";
}




if(isset($_POST['report']) && isset($_GET['app']) && isset($_GET['id'])){
	$report = $_POST['report'];
	$applicant = $_GET['app'];
	$id = $_GET['id'];

	if(strlen($report) > 200){
		//error här, lämnar tomt så att jocke kan fixa sen. :) Ha så kul Joeck!!1
	}
	else{
		$liaProject->editReportApplicant($applicant, $id, $report);
	}

	
	redirect(CURRENT_PATH);

}


?>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Är du säker på att du vill ta bort</h4>
			</div>
		
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="reallyDelete" type="button" class="btn btn-danger">Ta bort</button>
			</div>
		</div>
	</div>
</div>

<div class="container">
    <div class="jumbotron">

        <h1>Ansökningar</h1>
    </div>
</div>

<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php echo $thName; ?></th>
					<th>Lia kurs</th>
					<th>Status</th>
					<th>Ansökning slutar</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
			<?php
			foreach ($myApplications as $ApplicationForm){

						$acceptButton = '';
					 	$denyButton = '';
					 	$finishButton = '';
					 	$formButton = '';


				if($signedUser['student']){				
						$company = $CompanyObj->getFromId($ApplicationForm['company_id']); 
						$tdName = $company['name'];
						$deleteBtn = 	'<a data-name=" ansökan till '.$tdName.'" data-applicationid="' . $ApplicationForm['id'] . '"  id="deleteApplicationBtn" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Ta bort</a>';
				}elseif($signedUser['company_owner']){
						$deleteBtn = '';
					 	$user = $UserObj->getUserByid($ApplicationForm['user_id']);
					 	$tdName = $user['firstname'] . ' ' . $user['lastname'];

					 	$acceptButton = '<a href="'.CURRENT_PATH.'?accept='.$ApplicationForm['id'].'&uid='.$user['id'].'" class="btn btn-success">Godkänd</a>';
					 	$denyButton = '<a href="'.CURRENT_PATH.'?deny='.$ApplicationForm['id'].'&uid='.$user['id'].'" class="btn btn-danger">Neka</a>';
					 	$finishButton = '<a href="'.CURRENT_PATH.'?finish='.$ApplicationForm['id'].'&uid='.$user['id'].'" class="btn btn-warning">Genomförd</a>';
					 	$formButton = '<form action="?app='.$ApplicationForm['user_id'].'&id='.$ApplicationForm['id'].'" method="POST">
					<textarea name="report" class="form-control" placeholder="Omdömme">'.$ApplicationForm['report'].'</textarea><br>
					<button class="btn" type="submit">Spara omdömme</button>
					</form>';
				}

				$courseName = $course->getFromId($ApplicationForm['course_id'])['name'];
				$lastDay = $course->getFromId($ApplicationForm['course_id'])['course_start'];


				if($ApplicationForm['status'] == 0){
					$status = 'Ny ansökan';
					$btn = $acceptButton.' '.$denyButton;
				}else if($ApplicationForm['status'] == 1){
					$status = 'Godkänd';
					$btn = $denyButton.' '.$finishButton;
				}else if($ApplicationForm['status'] == 2){
					$status = 'Nekad';
					$btn = $acceptButton.' '.$finishButton;
				}else if($ApplicationForm['status'] == 3){
					$status = 'Genomförd';
					$btn = $formButton;
				}

			?>
			
				 <tr>
				 	<td><?php echo $tdName; ?></td>
				 	<td><?php echo $courseName; ?></td>
				 	<td><b><?php echo $status; ?></b></td>
				 	<td><?php echo $lastDay; ?></td>
				 	<td><?php echo $btn.$deleteBtn; ?></td>
				 </tr>
			 	 <?php } ?>

