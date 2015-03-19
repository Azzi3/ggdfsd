<?php
$groups = new Group();
$company = new Company();


//ADD ITEMS FUNCTION
if(isset($_GET['add']) && is_numeric($_GET['add'])){
	$addGroup = $groups->getGroupById($_GET['add'], $signedUser['id']);


	if(isset($_POST['add'])){
		if($addGroup['student'] == 1) {
			if($user->getUserByEmail($_POST['add']['mail'])){
				$user->updateGroup($_POST['add']['mail'], $_GET['add']);
			}
		}else{
			if($company->getFromCompanyEmail($_POST['add']['mail'])){
				$company->updateGroup($_POST['add']['mail'], $_GET['add']);
			}
		}
	}

	if(isset($_GET['remove']) && is_numeric($_GET['remove'])){
		if($addGroup['student'] == 1) {
			$userMail = $user->getUserById($_GET['remove'])['email'];
			$user->updateGroup($userMail, 0);
		}else{
			$companyMail = $company->getFromId($_GET['remove'])['company_email'];
			$company->updateGroup($companyMail, 0);
		}
	}


}



//REMOVE FUNCTION
if(isset($_GET['remove']) && isset($_GET['id'])){


	if(is_numeric($_GET['id'])){
		$groups->removeGroup($_GET['id'], $signedUser['id']);
	}

	redirect(CURRENT_PATH);
}


//EDIT FUNCTION
if(isset($_GET['edit']) && is_numeric($_GET['edit'])){
	$formFiller = $groups->getGroupById($_GET['edit'], $signedUser['id']);
	$headText = 'Ändra';
}else{
	$formFiller = array('name'=>'','company'=>0,'student'=>1);
	$headText = 'Skapa';
}


//CREATE NEW FUNCTION
if(isset($_POST['group'])){
	$error = array();
	$group = $_POST['group'];
	$group['userId'] = $signedUser['id'];

	if(strlen($group['name']) > 50 || strlen($group['name']) < 2){
		$error[] .= 'Namnet måste vara mellan 2 och 50 tecken.';
	}

	if($group['type'] == 1){
		$group['student'] = 1;
		$group['company'] = 0;
	}else{
		$group['student'] = 0;
		$group['company'] = 1;
	}

	if(count($error) == 0){
		if(isset($formFiller['group_id'])){
			$group['groupId'] = $formFiller['group_id'];
			$groups->updateGroup($group);
		}else{
			$groups->createGroup($group);
		}
		
	}else{	
		$session->setSession('error',$error);
	}


	redirect(CURRENT_PATH);



}



?>
<div class="container">
	<div class="jumbotron">
		<h1>Hantera grupper</h1>
	</div>
            <?php
                //show error if error-session is active
                if($session->getSession('error')){
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($session->getSession('error') as $item) {
                        echo '<li>'.$item.'</li>';
                    }
                    echo '</div>';
                    //kill session when 'echoed'.
                    $session->killSession('error');
                }
                ?>
        <?php if(isset($addGroup)) : ?>

        	<h3><?php echo $addGroup['name']; ?> grupp</h3>
        	<form action="" method="POST" accept-charset="utf-8">
	        	<div class="form-group">
	        		<label for="email">Sök epostadress</label>
	        		<input type="email" id="email" name="add[mail]" value="" class="form-control" placeholder="Epostadress">
	        	</div>


	        	<button type="submit" class="btn">Lägg till</button>
	        	<hr>
	        	<h3>Medlemmar</h3>
        	</form>

        	<?php
        	if($addGroup['student'] == 1) :
	        	$student = new Student();
	        	$allStudent = $student->getAllFromGroup($addGroup['group_id']);
	        	foreach ($allStudent as $item) {
	        		echo '<a href="'.CURRENT_PATH.'?add='.$addGroup['group_id'].'&remove='.$item['id'].'"><button class="btn btn-danger">Ta bort</button></a>
	        		 '.$item['firstname'].' '.$item['lastname'].' ('.$item['email'].')<br>';
	        	}
        	else :
        		$allCompany = $company->getCompanyFromGroup($addGroup['group_id']);
        		foreach ($allCompany as $item) {
	        		echo '<a href="'.CURRENT_PATH.'?add='.$addGroup['group_id'].'&remove='.$item['id'].'"><button class="btn btn-danger">Ta bort</button></a>
	        		 '.$item['name'].' ('.$item['company_email'].')<br>';
        		}

        	endif;

        	?>

        <?php else : ?>
	<form action="" method="POST" accept-charset="utf-8">
	<h3><?php echo $headText; ?> grupp</h3>
		<div class="form-group">
            <label for="name">Gruppnamn</label>
            <input type="text" name="group[name]" value="<?php echo $formFiller['name']; ?>" class="form-control" id="name" placeholder="Namn" required>
        </div>
        <div class="form-group">
            Grupptyp<br>
            <label for="radio01">Elevklass</label> <input type="radio" <?php if($formFiller['student'] == 1){echo 'checked';} ?> id="radio01" name="group[type]" value="1" placeholder=""><br>
            <label for="radio02">Företagsgrupp</label> <input type="radio" <?php if($formFiller['company'] == 1){echo 'checked';} ?> id="radio02" name="group[type]" value="2" placeholder="">
        </div>
        <button type="submit" class="btn"><?php echo $headText; ?> grupp</button>
	</form>
		<?php endif; ?>

	<hr>


	<table class="table table-hover">
		<thead>
			<tr>
				<th>Gruppnamn</th>
				<th>Grupptyp</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
	<?php
		$myGroups = $groups->getAllGroups($signedUser['id']);

		foreach ($myGroups as $item) {
			echo '<tr>';
			echo '<td>'.$item['name'].'</td>';
			if($item['student'] == 1){
				echo '<td>Studentklass</td>';
				$types = 'Elever';
			}else{
				echo '<td>Företagsgrupp</td>';
				$types = 'Företag';
			}
			echo '<td>
			<a href="'.CURRENT_PATH.'?remove=1&id='.$item['group_id'].'"><button class="btn btn-danger">Ta bort</button></a>
			<a href="'.CURRENT_PATH.'?edit='.$item['group_id'].'"><button class="btn btn-warning">Ändra</button></a>
			<a href="'.CURRENT_PATH.'?add='.$item['group_id'].'"><button class="btn btn-success">Lägg till '.$types.'</button></a>
			</td>';
			echo '</tr>';
		}

	?>
	</tbody>

</div>