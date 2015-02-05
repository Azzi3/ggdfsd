<?php
$session = new Session();

if(isset($_POST['loginform'])){
	$user = new User();

	$userResult = $user->loginUser($_POST['loginform']);

	if($userResult){
		$session->setSession('user',$userResult['email']);
	}else{
		$session->setSession('error','Fel användaruppgifter.');
	}

	redirect(CURRENT_PATH);
}


?>


<?php if(!$session->getSession('user')) : ?>
<form action="" method="POST" accept-charset="utf-8">

<?php
//show error if error-session is active
if($session->getSession('error')){
	echo '<div class="alert alert-danger" role="alert">'.$session->getSession('error').'</div>';
	//kill session when 'echoed'.
	$session->killSession('error');
}
?>
	<div class="form-group">
		<label for="mail">Epostadress</label>
		<input type="text" class="form-control" id="mail" name="loginform[email]" placeholder="Epostadress">
	</div>
	<div class="form-group">
		<label for="password">Lösenord</label>
		<input type="text" class="form-control" id="password" name="loginform[password]" placeholder="Lösenord">
	</div>
	<button type="submit" class="btn">Logga in</button>
</form>
<?php endif; ?>