<?php

if(isset($_GET['cid']) || isset($_GET['comp'])){
	$error = array();
	$liaProject = new LiaProject();
	$company = new Company();
	$cid = null;
	$comp = null;

	if(isset($_GET['cid'])){
		$cid = $_GET['cid'];
		$lia = $liaProject->getFromId($_GET['cid']);
		if(!$lia){
			redirect($path.'404');
		}
		$name = $lia['name'];
		$desc = $lia['description'];
		$msg = "Din ansökan till ".$lia['name']." är mottagen.";
		$comp = $_GET['comp'];
		$company = new Company();
		$companyInfo = $company->getFromId($_GET['comp']);
		$name = $companyInfo['name'];

		$redirectPath = CURRENT_PATH.'?cid='.$_GET['cid'].'&comp='. $_GET['comp'];

	}else{
		$comp = $_GET['comp'];
		$company = new Company();
		$companyInfo = $company->getFromId($_GET['comp']);
		$name = "Spontanansökan till ".$companyInfo['name'];
		$desc = '';
		$msg = "Din Spontanansökan är mottagen.";

		$redirectPath = CURRENT_PATH.'?comp='.$_GET['comp'];

	}

	$formFiller['txt'] = '';

	if(isset($_POST['apply'])){
		$form['msg'] = $_POST['apply']['txt'];
		$form['course_id'] = $_POST['apply']['course'];
		$form['project_id'] = $cid;
		$form['company_id'] = $comp;
		$form['user_id'] = $signedUser['id'];

		$formFiller['txt'] = $form['msg'];

		if(strlen($form['msg']) > 200){
			$error[] .= 'Ange en text mellan 0 och 200 tecken.';
		}else{
			if(!$liaProject->checkExistingApplicant($form)){

				$company = new Company();
				$user = new User();

				$thisCompany = $company->getFromId($_GET['comp']);
				$contactEmail = $thisCompany['contact_email'];

				$header = 'From: noreply@liabanken.se';

				
				mail($signedUser['email'], 'Projektansökan', $msg);

				$msg = "Du har fått en ansökan till ett liaprojekt från ".$signedUser['firstname'].' '.$signedUser['lastname'].". \nLogga in på liabanken.se för att läsa hela meddelandet.";
				mail($contactEmail, 'Projektansökan', $msg);


				$form['company_id'] = $thisCompany['id'];

				$liaProject->addApplicant($form);

				$session->setSession('success','Din ansökning lagrades korrekt.');
			}else{
				$error[] .= 'Användaren har redan ansökt.';
			}
		}

		if(count($error) > 0){
	        $session->setSession('error',$error);
	    }

		redirect($redirectPath);
	}


	
}else{
	redirect($path.'404');
}

?>
<div class="container">

	<h1>LIA-ansökan till <?php echo $name; ?></h1>
	<p><?php echo newLine($desc); ?></p>
	<form action="" method="POST" accept-charset="utf-8">
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
	    //show SUCCESS if SUCCESS-session is active
	    if($session->getSession('success')){
	        echo '<div class="alert alert-success" role="alert">';
	        echo '<li>'.$session->getSession('success').'</li>';
	        echo '</div>';

	        //kill session when 'echoed'.
	        $session->killSession('success');
	    }




	    $courseObj = new Course();
		$courses = $courseObj->getAll();

	    ?>
	    <div class="form-group">
		    <label for="course">Lia kurs</label><br>
		    <select id="course" name="apply[course]">
		    <?php foreach ($courses as $item) :

		    	if($item['course_start'] > date('Y-m-d')) : ?>
		    	<option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
		    <?php endif;
		    endforeach; ?>
		    	option
		    </select>
	    </div>

		<div class="form-group">
			<label for="txt">Meddelande</label>
			<textarea id="txt" class="form-control" name="apply[txt]" placeholder="Meddelande till handledare på företaget"><?php echo $formFiller['txt']; ?></textarea>
			<br>
			<button class="btn btn-success" type="submit">Skicka ansökan</button>
		</div>
	</form>

</div>