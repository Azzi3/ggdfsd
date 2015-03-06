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
				<h4 class="modal-title" id="myModalLabel">Är du säker på att du vill ta bort <span></span></h4>
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

		<h1>LIA-Projekt</h1>
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
					<th>Företag</th>
					<th>Platser</th>
					<th>Uppskattad tid</th>
					<th>Taggar</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php $company = new Company();
				 foreach ($projects as $project){ 
						$companyInfo = $company->getFromId($project['company_id']);

					?>
				<tr>
					<td style="max-width: 10em"> <a href="<?php echo $path; ?>project-info?id=<?php echo $project['id']; ?>"><?php echo $project['name']; ?><a> </td>
					<td><a href="<?php echo $path; ?>company-profile?id=<?php echo $project['company_id']; ?>"> <?php echo $companyInfo['name']; ?></a></td>
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
								<a class="btn btn-default" href="<?php echo $path; ?>manage-projects?id=<?php echo $project['id']; ?>">Ändra</a>
								<a class="btn btn-danger" id="deleteProjectBtn" data-name="<?php echo $project['name'];  ?>" data-projectid="<?php echo $project['id']; ?>" class="btn" data-toggle="modal" data-target="#deleteModal" >Ta bort</a>
							<?php endif; ?>

						</td>
				</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>