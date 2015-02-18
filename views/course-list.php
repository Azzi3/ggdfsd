<?php
	$courseObj = new Course();
	$courses = $courseObj->getAll();

if($signedUser['course_leader']){
	if(isset($_GET['deleteid'])){
		$courseObj->deleteCourseAndTag($_GET['deleteid']);
		redirect(CURRENT_PATH);
	}
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

		<h1>Kurser!</h1>
		<?php if($signedUser['course_leader']){  ?>
		<a class="btn btn-warning pull-right" href="<?php echo $path; ?>manage-courses" role="button">Lägg upp Kurser</a>
		<?php } ?>
	</div>
</div>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Namn</th>
					<th>Beskrivning</th>
					<th>Startdatum</th>
					<th>Slutdatum</th>
					<th>Taggar</th>
				</tr>
			</thead>

			<tbody>
				
				<?php foreach ($courses as $course){  ?>
					<tr>
						<td><?php echo $course['name'] ?></td>
						<td style="max-width: 10em"><?php echo $course['description'] ?></td>
						<td><?php echo $course['course_start'] ?></td>
						<td><?php echo $course['course_end'] ?></td>
						<td>
							<?php
								$counter = 0;
								$courseTags = $courseObj->getTags($course['id']);
								
								foreach ($courseTags as $courseTag) {
									echo $courseTag['name']; if ($counter != count($courseTags) - 1){
										echo ", ";
									};
									$counter++;

								} 
							?>
						</td>   
						<td>   
							<?php 
							if($signedUser['course_leader']){
								echo $editBtn  = '<a href="'. $path . 'manage-courses?id='. $course['id'].'"><button class="btn">Ändra</button></a>';
								echo $deleteBtn  = '<a id="deleteCourseBtn" data-courseid="'. $course['id']. '" class="btn" data-toggle="modal" data-target="#deleteModal" >Ta bort</a>';
							}
							 ?>

						</td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
</div>