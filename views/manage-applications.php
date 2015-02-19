<?php 

$ApplicationFormObj = new ApplicationForm();

if(isset($_GET['deleteid'])){

	$ApplicationFormObj->deleteApplication($_GET['deleteid']);
	redirect(CURRENT_PATH);
}

if($signedUser['student']){
	$ApplicationForms = $ApplicationFormObj->getAllWhereStudentGuid($signedUser['guid']);
	$thName = 'Företag';
}elseif($signedUser['company_owner']){
	$ApplicationForms = $ApplicationFormObj->getAllWhereCompanyId($signedUser['company_id']);
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
					<th>Godkänd</th>
				</tr>
			</thead>

			<tbody>
			<?php 
			foreach ($ApplicationForms as $ApplicationForm){
				if($signedUser['student']){
						$CompanyObj = new Company();
						$company = $CompanyObj->getFromId($ApplicationForm['company_id']); 
						$tdName = $company['name'];
						$btn = 	'<a data-applicationid="' . $ApplicationForm['id'] . '"  id="deleteApplicationBtn" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Ta bort</a>';
				}elseif($signedUser['company_owner']){
					 	$UserObj = new User();
					 	$user = $UserObj->getUserByGuid($ApplicationForm['student_guid']);
					 	$tdName = $user['firstname'] . ' ' . $user['lastname'];
					 	$btn = '<a class="btn btn-success">Godkänd</a><a class="btn">Neka</a>';
				}
			?>
			
				 <tr>
				 	<td><?php echo $tdName; ?></td>
				 	<td>CMS + länk till kursen</td>
				 	<td>Nej</td>
				 	<td>
				 		<?php echo $btn ?>
				 	</td>
				 </tr>
			 	 <?php } ?>

