<?php
$liaProject = new LiaProject();
$projects = $liaProject->getAll();

if(isset($_GET['id'])){
	echo $_GET['id'];
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
				<button id="reallyDelete" type="button" class="btn btn-danger">Tabort</button>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="jumbotron">

		<h1>Projekt!</h1>
		<a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
		<a class="btn btn-primary" href="<?php echo $path; ?>projects" role="button">Visa projekt</a>
		<a class="btn btn-warning pull-right" href="<?php echo $path; ?>manage-projects" role="button">Lägg upp Projekt</a>

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
				<?php foreach ($projects as $project){  ?>
				<tr>
					<td><?php echo $project['name'] ?></td>
					<td style="max-width: 10em"><?php echo $project['description'] ?></td>
					<td><?php echo $project['company'] ?></td>
					<td><?php echo $project['spots'] ?></td>
					<td><?php echo $project['estimated_time'] ?></td>
					<td><?php
						$counter = 0;
						$projectTags = $liaProject->getTags($project['id']);
						foreach ($projectTags as $projectTag) {
							echo $projectTag['name']; if ($counter != count($projectTags) - 1){
								echo ", ";
							};
							$counter++;
						} ?>
					</td>
					<td>
						<a id="deleteBtn" data-projectid="<?php echo $project['id'] ?>" class="btn" data-toggle="modal" data-target="#deleteModal" >Tabort</a>
					</td>
				</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>