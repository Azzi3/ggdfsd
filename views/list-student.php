<?php
$studentObj = new Student();
$students = $studentObj->getAll();

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

        <h1>Elever</h1>
       
    </div>
</div>



<?php

	if(isset($_POST['search'])){

		$serachVal = $_POST['search'];
		$students = $studentObj->searchResult($serachVal);

	}

?>



<div class="container">

<form action="" method="POST" accept-charset="utf-8">
<input type="text" name="search" value="" placeholder="Sök student"> <button type="submit">Sök</button>
</form>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Förnamn</th>
					<th>Efternamn</th>
					<th>Email</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($students as $student) :  ?>
				<tr>
					<td><a href="<?php echo $path.'student-profile?uid='.$student['guid']; ?>"><b><?php echo $student['firstname'] ?></b></a></td>
					<td style="max-width: 10em"><?php echo $student['lastname'] ?></td>
					<td><?php echo $student['email'] ?></td>
				</tr>
					<?php endforeach; ?>
				</tbody>

			</div>
		</div>
	</div>
</div>
