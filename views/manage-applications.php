<?php 

$ApplicationFormObj = new ApplicationForm();

if($signedUser['student']){
	$ApplicationForm = $ApplicationFormObj->getAllWhereStudentGuid($signedUser['guid']);
	$CompanyObj = new Company();
	$company = $CompanyObj->getFromId($ApplicationForm['company_id']); 

	$thName = 'Företag';
	$tdName = $company['name'];
	$btn = 	'<a class="btn btn-danger">Ta bort</a>';
}elseif($signedUser['company_owner']){
	$ApplicationForm = $ApplicationFormObj->getAllWhereCompanyId($signedUser['company_id']);
	$UserObj = new User();
	$user = $UserObj->getUserByGuid($ApplicationForm['student_guid']);
	$thName = "Elevens namn";

	$tdName = $user['firstname'] . ' ' . $user['lastname'];
	$btn = '<a class="btn btn-success">Godkänd</a><a class="btn">Neka</a>';
}
?>
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
			<tr>
				<td><?php echo $tdName; ?></td>
				<td>CMS + länk till kursen</td>
				<td>Nej</td>
				<td>
					<?php echo $btn ?>
				</td>
			</tr>