<?php
$company = new Company();
$companies = $company->getAll();
?>

<div class="container">
    <div class="jumbotron">

        <h1>Företagslista</h1>
        <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>

    </div>
</div>

<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Företag</th>
					<th>Kontaktperson</th>
					<th>Stad</th>
					<th>Taggar</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($companies as $company){  ?>
				<tr>
					<td><?php echo $company['name'] ?></td>
					<td style="max-width: 10em"><?php echo $company['street_address'] ?></td>
					<td><?php echo $company['zip_code'] ?></td>
						<td><?php echo $company['city'] ?></td>
						<td><?php echo $company['website_url'] ?></td>
						<td><?php echo $company['description'] ?></td>
						<td><?php
						$counter = 0;
						$companyTags = $company->getTags($company['id']);
						foreach ($companyTags as $companyTag) {
							echo $companyTag['name']; if ($counter != count($companyTags) - 1){
								echo ", ";
							};
							$counter++;
						} ?></td>
						<td>
							<a href="btn" title="">Ändra</a>
							<a href="btn btn-danger" title="">Ta bort</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>

			</div>
		</div>
	</div>
</div>
