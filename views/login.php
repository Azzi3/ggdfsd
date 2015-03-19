
<!-- login Section -->

<?php

if(isset($_POST['loginform'])){

	$userResult = $user->loginUser($_POST['loginform']);

	if($userResult){
		$session->setSession('guid',$userResult['guid']);
	}else{
		$session->setSession('error','Fel användaruppgifter.');
	}
}
$signedUser = $user->getUserByGuid($session->getSession('guid'));
if($signedUser['student'] == 1){
	redirect($path."student-profile");
}
if($signedUser['company_owner'] == 1){
	redirect($path."company-profile?id=". $signedUser['company_id']);
}
if($signedUser['course_leader'] == 1){
	redirect($path."generate-key");
}

if(isset($_POST['register'])){
	$key = new Key();
	$secret = '';
	$secret = $_POST['register']['secret'];

	$validKey = $key->checkValidKey($secret);

	if($validKey){
		$session->setSession('secretKey',$validKey);
		redirect(CURRENT_PATH.'register');
	}
	else{
		$session->setSession('errorKey','Det finns ingen nyckel med det värdet.');
	}

}

			//show error if error-session is active
if($session->getSession('errorKey')){
	echo '<div class="alert alert-danger error-alert" role="alert">'.$session->getSession('errorKey').'</div>';
				//kill session when 'echoed'.

	$session->killSession('errorKey');
}
			//show error if error-session is active
if($session->getSession('error')){
	echo '<div class="alert alert-danger error-alert" role="alert">'.$session->getSession('error').'</div>';
				//kill session when 'echoed'.

	$session->killSession('error');
}
			//show success if success-session is active
if($session->getSession('success')){
	echo '<div class="alert alert-success" role="alert">'.$session->getSession('success').'</div>';
				//kill session when 'echoed'.
	$session->killSession('success');
}
?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<form action="" method="POST" accept-charset="utf-8">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="form-group">
						<label for="mail">Epostadress</label>
						<input type="text" class="form-control" id="mail" name="loginform[email]" placeholder="Epostadress" required>
					</div>
					<div class="form-group">
						<label for="password">Lösenord</label>
						<input type="password" class="form-control" id="password" name="loginform[password]" placeholder="Lösenord" required>
					</div>
					<button type="submit" class="btn btn-default">Logga in</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Avbryt</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<form action="" method="POST" accept-charset="utf-8">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<form action="" method="POST" accept-charset="utf-8">
						<div class="form-group">
							<label for="mail">Registrera dig med din nyckel</label>
							<input type="text" class="form-control" id="mail" name="register[secret]" placeholder="Nyckel" required>
						</div>
						<button type="submit" class="btn btn-default">Registrera</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Header -->
	<header>
		<div class="container">


					<!--<h3 class="section-subheading text-muted">Undertext</h3>-->
			<div class="row text-center">
				<h2 class="section-heading">LIA-Banken</h2>
				<div class="col-md-5 col-md-offset-1">
					<p class="section-text">
						All utbildning inom yrkeshögskolan sker i nära samarbete med arbetslivet.
						Lärande i arbete (LIA) innebär att en del av utbildningen är förlagd till en eller flera arbetsplatser.</p>
					</div>
					<div class="col-md-5">
						<p class="section-text">LIA-banken erbjuder en unik mötesplats till studenter och företag för att säkra LIA-platser till Växjö Yrkeshögskola.</p>
					</div>
				</div>
			</header>
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-md-4">
						</div>

						<div class="col-md-4">
							<span class="copyright">Copyright &copy; LIA-Banken 2015</span>
						</div>

						<div class="col-md-4">
						</div>
					</div>
				</div>
			</footer>