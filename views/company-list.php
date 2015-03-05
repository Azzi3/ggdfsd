<?php
$companyObj = new Company();
$user = new User();
$companies = $companyObj->getAll();
if(isset($_GET['deleteid'])){
	$getCmpName = $companyObj->getFromId($_GET['deleteid']);
	$companyName = $getCmpName['name'];
	$companyObj->deleteCompanyAndTag($_GET['deleteid'], $companyName);
	redirect(CURRENT_PATH);
}?>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Är du säker på att du vill ta bort?</h4>
			</div>
		
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Avbryt</button>
				<button id="reallyDelete" type="button" class="btn btn-danger">Ta bort</button>
			</div>
		</div>
	</div>
</div>

<div class="container">
    <div class="jumbotron">

        <h1>Företagslista</h1>
        
    </div>
</div>

<div class="container">


<?php

	if(isset($_POST['search'])){

		$serachVal = $_POST['search'];
		$companies = $companyObj->searchResult($serachVal);

	}

?>


<form action="" method="POST" accept-charset="utf-8">
	<input type="text" name="search" value="" placeholder="Sök företag"> <button type="submit">Sök</button>
</form>


	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Företag</th>
					<th>Adress</th>
					<th>Kontaktperson</th>
					<th>Stad</th>
					<th>Hemsida</th>
					<th>Beskrivning</th>
					<th>Taggar</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($companies as $company){	?>
				<tr>
					<td><a href="<?php echo $path; ?>company-profile?id=<?php echo $company['id']; ?>"><?php echo $company['name'] ?></a></td>
					<td style="max-width: 10em"><?php echo $company['street_address'] ?></td>
					<td><?php echo $company['zip_code'] ?></td>
						<td><?php echo $company['city'] ?></td>
						<td><?php echo $company['website_url'] ?></td>
						<td><?php echo $company['description'] ?></td>
						<td><?php
						$counter = 0;
						$companyTags = $companyObj->getTags($company['id']);
						foreach ($companyTags as $companyTag) {
							echo $companyTag['name']; if ($counter != count($companyTags) - 1){
								echo ", ";
							};
							$counter++;
						} ?></td>
						<td>
						<?php if($signedUser['company_owner'] == 1 && $signedUser['company_id'] == $company['id']) : ?>
						<a href="<?php echo $path; ?>manage-company?id=<?php echo $company['id']; ?>"><button class="btn">Ändra</button></a>
							<a id="deleteCompanyBtn" data-companyid="<?php echo $company['id'] ?>" class="btn" data-toggle="modal" data-target="#deleteModal" >Ta bort</a>
						<?php endif; ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>

			</div>
		</div>
	</div>
</div>
