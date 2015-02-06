<?php
$key = new Key();
if(isset($_GET['key'])){
	$validKey = $key->checkValidKey($_GET['key']);
	$session->setSession('secretKey',$validKey);
}


$validKey = $session->getSession('secretKey');

if(!$validKey){
	$session->killSession('secretKey');
	redirect(PATH);
}

$county = new County();
$municipality = $county->listMunicipality();

$formFillerTemplate = array('email'=>'',
							'firstname'=>'',
							'lastname'=>'',
							'municipality'=>'');

if($session->getSession('form'))
	$formFiller = array_merge($formFillerTemplate, $session->getSession('form'));
else{
	$formFiller = $formFillerTemplate;
}

if(isset($_POST['register'])){
	$form = $_POST['register'];
	$session->setSession('form',$form);
	$error = array();

	if(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)){
		$error[] .= 'Epostadressen är inte gilltig.';
	}
	if($user->checkUniqueEmail($form['email'])){
		$error[] .= 'Epostadressen är redan registrerad.';
	}
	if(strlen($form['password']) < 2 || strlen($form['password']) > 30){
		$error[] .= 'Välj ett lösenord mellan 2 och 30 tecken.';
	}
	if($form['password'] != $form['password2']){
		$error[] .= 'Lösenorden stämmer inte överens.';
	}
	if(strlen($form['firstname']) < 2 || strlen($form['firstname']) > 30){
		$error[] .= 'Välj ett förnamn mellan 2 och 30 tecken.';
	}
	if(strlen($form['lastname']) < 2 || strlen($form['lastname']) > 40){
		$error[] .= 'Välj ett efternamn mellan 2 och 40 tecken.';
	}
	if(!$county->checkValidMunicipality($form['municipality'])){
		$error[] .= 'Välj en korrekt kommun.';
	}

	if(count($error) > 0){
		$session->setSession('error',$error);
	}
	else{

		if($validKey['student'] == 1){
			$form['student'] = 1;
			$form['company_owner'] = 0;
			$form['course_leader'] = 0;
		}else{
			$form['student'] = 0;
			$form['company_owner'] = 1;
			$form['course_leader'] = 0;
		}

		$user->createUser($form);

		$key = new Key();
		$key->removeKey($validKey['key_value']);

		$session->killSession('error');
		$session->killSession('form');
		$session->killSession('secretKey');
		$session->setSession('success','Registreringen lyckades, du kan nu logga in med dina uppgifter.');
		redirect(PATH);
	}

	redirect(CURRENT_PATH);
}
?>

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
?>
	<div class="form-group">
		<label for="mail">Epostadress</label>
		<input type="text" class="form-control" value="<?php echo $formFiller['email']; ?>" id="mail" name="register[email]" placeholder="Epostadress">
	</div>
	<div class="form-group">
		<label for="pword">Lösenord</label>
		<input type="password" class="form-control" id="pword" name="register[password]" placeholder="Lösenord">
	</div>
	<div class="form-group">
		<label for="pword2">Validera lösenord</label>
		<input type="password" class="form-control" id="pword2" name="register[password2]" placeholder="Validera lösenord">
	</div>
	<br>
	<div class="form-group">
		<label for="firstname">Förnamn</label>
		<input type="text" class="form-control" value="<?php echo $formFiller['firstname']; ?>" id="firstname" name="register[firstname]" placeholder="Förnamn">
	</div>
	<div class="form-group">
		<label for="lastname">Efternamn</label>
		<input type="text" class="form-control" value="<?php echo $formFiller['lastname']; ?>" id="lastname" name="register[lastname]" placeholder="Efternamn">
	</div>
	<div class="form-group">
		<label for="region">Välj kommun</label>
		<select class="form-control" name="register[municipality]" id="region">
			<option value="">-Välj kommun-</option>
			<?php foreach ($municipality as $item) {
				$selected = '';

				if($item['municipality_id'] == $formFiller['municipality'])
					$selected = 'selected';

				echo '<option '.$selected.' value="'.$item['municipality_id'].'">'.$item['name'].'</option>';
			} ?>
		</select>
	</div>

	<button class="btn" type="submit">Registrera</button>

</form>


<?php
//kill the form session
$session->killSession('form'); ?>