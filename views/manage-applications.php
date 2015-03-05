<?php 

$liaProject = new liaProject();

if(isset($_GET['deleteid'])){

	$liaProject->removeApplicant($_GET['deleteid']);
	redirect(CURRENT_PATH);
}

if(isset($_GET['accept']) && isset($_GET['uid'])){
	$liaProject->acceptApplicant($_GET['uid'], $_GET['accept']);
	redirect(CURRENT_PATH);
}

if(isset($_GET['deny']) && isset($_GET['uid'])){
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
        <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
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
					<th></th>
				</tr>
			</thead>

			<tbody>
			<?php
			$course = new Course();
			$CompanyObj = new Company();
			$UserObj = new User();
			foreach ($myApplications as $ApplicationForm){
				if($signedUser['student']){
						
						$company = $CompanyObj->getFromId($ApplicationForm['company_id']); 
						$tdName = $company['name'];
						$btn = 	'<a data-name=" ansökan till '.$tdName.'" data-applicationid="' . $ApplicationForm['id'] . '"  id="deleteApplicationBtn" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Ta bort</a>';
				}elseif($signedUser['company_owner']){
					 	$user = $UserObj->getUserByid($ApplicationForm['user_id']);
					 	$tdName = $user['firstname'] . ' ' . $user['lastname'];
					 	$btn = '<a href="'.CURRENT_PATH.'?accept='.$ApplicationForm['id'].'&uid='.$user['id'].'" class="btn btn-success">Godkänd</a>
					 	<a href="'.CURRENT_PATH.'?deny='.$ApplicationForm['id'].'&uid='.$user['id'].'" class="btn btn-danger">Neka</a>
					 	<a href="'.CURRENT_PATH.'?finish='.$ApplicationForm['id'].'&uid='.$user['id'].'" class="btn btn-warning">Genomförd</a>';
				}

				$courseName = $course->getFromId($ApplicationForm['course_id'])['name'];

				if($ApplicationForm['status'] == 0){
					$status = 'Ny ansökan';
				}else if($ApplicationForm['status'] == 1){
					$status = 'Godkänd';
				}else if($ApplicationForm['status'] == 2){
					$status = 'Nekad';
				}else if($ApplicationForm['status'] == 3){
					$status = 'Genomförd';
				}

			?>
			
				 <tr>
				 	<td><?php echo $tdName; ?></td>
				 	<td><?php echo $courseName; ?></td>
				 	<td><b><?php echo $status; ?></b></td>
				 	<td><?php echo $btn; ?></td>
				 </tr>
			 	 <?php } ?>

