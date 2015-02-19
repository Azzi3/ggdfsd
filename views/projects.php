<?php
$liaProject = new LiaProject();
$projects = $liaProject->getAll();
if(isset($_GET['deleteid'])){
	$liaProject->deleteProjectAndTag($_GET['deleteid'], $signedUser['company_id']);
	redirect(CURRENT_PATH);
}



?>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Är du säker på att du vill ta bort </h4>
			</div>
		
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
				<button id="reallyDelete" type="button" class="btn btn-danger">Ta bort</button>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="jumbotron">

		<h1>Projekt!</h1>
		<a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
		<a class="btn btn-primary" href="<?php echo $path; ?>projects" role="button">Visa projekt</a>
			<?php if($signedUser['company_owner'] == 1) : ?>
				<a class="btn btn-warning pull-right" href="<?php echo $path; ?>manage-projects" role="button">Lägg upp Projekt</a>
			<?php endif;?>
	</div>
</div>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Namn</th>
					<th>Beskrivning</th>
					<th>Företag</th>
					<th>Platser</th>
					<th>Uppskattad tid</th>
					<th>Taggar</th>
				</tr>
			</thead>

			<tbody>
				<?php $company = new Company();
				 foreach ($projects as $project){ 
						$companyInfo = $company->getFromId($project['company_id']);

					?>
				<tr>
					<td><?php echo $project['name']; ?></td>
					<td style="max-width: 10em"><?php echo $project['description']; ?></td>
					<td><?php echo $companyInfo['name']; ?></td>
					<td><?php echo $project['spots']; ?></td>
					<td><?php echo $project['estimated_time']; ?></td>
					<td><?php
						$counter = 0;
						$projectTags = $liaProject->getTags($project['id']);
						foreach ($projectTags as $projectTag) {
							echo $projectTag['name']; if ($counter != count($projectTags) - 1){
								echo ", ";
							};
							$counter++;

						} ?></td>
						<td>
							<?php if($signedUser['company_owner'] == 1 && $signedUser['company_id'] == $project['company_id']) : ?>
								<a href="<?php echo $path; ?>manage-projects?id=<?php echo $project['id']; ?>"><button class="btn">Ändra</button></a>
								<a id="deleteProjectBtn" data-name="<?php echo $project['name'];  ?>" data-projectid="<?php echo $project['id']; ?>" class="btn" data-toggle="modal" data-target="#deleteModal" >Ta bort</a>
							<?php endif; ?>

						</td>
				</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>