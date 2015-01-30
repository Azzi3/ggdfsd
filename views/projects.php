<?php
$liaProject = new LiaProject();
$projects = $liaProject->getAll();

require_once('../partials/project-header.php');
?>

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