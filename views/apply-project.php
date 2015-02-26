<?php

if(isset($_GET['cid'])){
	$error = array();
	$liaProject = new LiaProject();
	$lia = $liaProject->getFromId($_GET['cid']);
	if(!$lia){
		redirect($path.'404');
	}

	$formFiller['txt'] = '';

	if(isset($_POST['txt'])){
		$form['msg'] = $_POST['txt'];
		$form['project_id'] = $_GET['cid'];
		$form['user_id'] = $signedUser['id'];

		$formFiller['txt'] = $form['msg'];

		if(strlen($form['msg']) > 200){
			$error[] .= 'Ange en text mellan 0 och 200 tecken.';
		}else{
			if(!$liaProject->checkExistingApplicant($form)){

				$company = new Company();
				$user = new User();

				$thisCompany = $company->getFromId($_GET['cid']);
				$contactEmail = $user->getUserById($thisCompany['id_contact_person'])['email'];

				$header = 'From: noreply@liabanken.se';

				$msg = "Din ansökan till ".$lia['name']." är mottagen.";
				mail($signedUser['email'], 'Projektansökan', $msg);

				$msg = "Du har fått en ansökan till ett liaprojekt från ".$signedUser['firstname'].' '.$signedUser['lastname'].". \nLogga in på liabanken.se för att läsa hela meddelandet.";
				mail($contactEmail, 'Projektansökan', $msg);


				$liaProject->addApplicant($form);

				$session->setSession('success','Din ansökning lagrades korrekt.');
			}else{
				$error[] .= 'Användaren har redan ansökt.';
			}
		}

		if(count($error) > 0){
	        $session->setSession('error',$error);
	    }

		redirect(CURRENT_PATH.'?cid='.$_GET['cid']);
	}



}else{
	redirect($path.'404');
}

?>
<h1>Ansök lia (<?php echo $lia['name']; ?>)</h1>
<p><?php echo newLine($lia['description']); ?></p>
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
    ?>
	<div class="form-group">
		<label for="txt">Meddelande</label>
		<textarea id="txt" class="form-control" name="txt" placeholder="Meddelande till handledare på företaget"><?php echo $formFiller['txt']; ?></textarea>
		<button class="btn" type="submit">Skicka ansökan</button>
	</div>
</form>