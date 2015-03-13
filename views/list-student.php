<?php
$studentObj = new Student();
$students = $studentObj->getAll();

function checkForProfanity($stringToCheck){
	$profanities = new Profanity();
	$profanitiesList = $profanities->getProfanityList();
	$nameLowerCase = strtolower($stringToCheck);
	
	if(in_array($nameLowerCase, $profanitiesList)) {
      			$msg = 'Sökningen tycker inte om fula ord';
        		return $msg;
      		}  
	foreach ($profanitiesList as $profanity){
		if(strpos($nameLowerCase, $profanity) !== false) {
      		$msg = 'Sökningen tycker inte om delvis fula ord heller'; 
      		return $msg;
      	}
	}

    $msg = 'Sökningen gav inget resultat';
    return $msg;  	
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

	<form style="width:50%; margin: 0 auto 1em auto;" class="input-group" action="" method="POST" accept-charset="utf-8">
	     <input name="search" type="text" class="form-control" placeholder="Sök">
	     <span class="input-group-btn">
	       <button class="btn btn-default" type="submit">Sök</button>
	     </span>
	</form>

	<?php if(!empty($students)){ ?>
		<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Namn</th>
					<th>Email</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($students as $student) :  ?>
				<tr>
					<td><a href="<?php echo $path.'student-profile?uid='.$student['guid']; ?>"><b><?php echo $student['firstname'] . ' ' . $student['lastname'] ?></b></a></td>

					<td><?php echo $student['email'] ?></td>
				</tr>
					<?php endforeach; ?>
				</tbody>

			</div> <?php
	} else { 
		echo checkForProfanity($_POST['search']);
	} ?>
		</div>
	</div>
</div>
