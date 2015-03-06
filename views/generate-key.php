<?php
$key = new Key();


if(isset($_POST['sendKey'])){
	$sendKey = $_POST['sendKey'];

	//check if email is valid
	if(filter_var($sendKey['mail'], FILTER_VALIDATE_EMAIL)){
		mail($sendKey['mail'], 'Registrering på Lia banken', $sendKey['message'], 'From: noreply@liabanken.se');
		$session->killSession('key');
	}else{
		$session->setSession('error','Epostadressen är inte gilltig!');
	}
}


if(isset($_GET['reset'])){
	$session->killSession('key');
	redirect(CURRENT_PATH);
}

if(isset($_POST['key'])){
	$keyType = $_POST['key'];
	$generatedKey = randomStr(40);

	//Create for student
	if($keyType == 'student' || $keyType == 'company'){
		$key->createKey($generatedKey, $keyType);
		$session->setSession('key', $generatedKey);
	}
}



$messageText = 
"Hej!\n
Här kommer din nyckel till Lia banken: ".$session->getSession('key')."
Använd nyckeln när du registrerar dig, eller klicka på länken nedan.\n".
'<a href="http://DOMÄNNAMN.se/register?key='.$session->getSession('key').'">Registrera dig!</a>'."\n\n\n Med vänliga hälsningar \n Lia banken";


?>
<div class="container">

<?php if($session->getSession('key')) : ?>
<div class="alert alert-info"><b>Nyckel:</b> <?php echo $session->getSession('key'); ?></div>
<?php
//show error if error-session is active
if($session->getSession('error')){
	echo '<div class="alert alert-danger" role="alert">'.$session->getSession('error').'</div>';
	//kill session when 'echoed'.
	$session->killSession('error');
}
?>

<form action="" method="POST" accept-charset="utf-8">

	<div class="form-group">
		<label for="email">Skicka nyckeln till epost</label>
		<input class="form-control" type="email" name="sendKey[mail]" value="" placeholder="Epostadress" required>
	</div>

	<div class="form-group">
	<label for="msg">Epostmeddelande</label>
	<textarea class="form-control" style="resize:none; height:200px;" id="msg" name="sendKey[message]"><?php echo $messageText; ?></textarea>
	</div>
	<button class="btn btn-default" type="submit">Skicka nyckeln</button>
	<a href="?reset=1"><button class="btn btn-default" type="button">Generera ny nyckel</button></a>
</form>

<?php else : ?>

<form action="" method="POST" accept-charset="utf-8">
	<div class="form-group">
		<label for="type">Generera nyckel för</label>
		<select class="form-control" name="key" id="type">
			<option value="0">-Välj typ av nyckel-</option>
			<option value="company">Företag</option>
			<option value="student">Student</option>
		</select>
	</div>
	<button class="btn btn-default" type="submit">Generera nyckel</button>
</form>

<?php endif; ?>
</div>
