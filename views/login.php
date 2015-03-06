<!-- Header -->
		<header>
				<div class="container">
						<div class="intro-text">
								<div class="intro-lead-in">Välkommen till LIA-Banken</div>
								<a href="#login" class="page-scroll btn btn-xl">Logga in</a>
						</div>
				</div>
		</header>
		
		<!-- login Section -->
		<section id="login">
				<div class="container">
								<div class="row">
										<div class="col-lg-12 text-center">
												<h2 class="section-heading">Logga in</h2>
										</div>
								</div>
								
								<div class="row">
										<div class="col-md-4 col-md-offset-2">
											<?php
											
											if(isset($_POST['loginform'])){
											
												$userResult = $user->loginUser($_POST['loginform']);
											
												if($userResult){
													$session->setSession('guid',$userResult['guid']);
												}else{
													$session->setSession('error','Fel användaruppgifter.');
												}

									
											
											}
											// Why isnt signed user set @Tobias
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
											
												redirect(CURRENT_PATH);
											}
					
											?>
											
											
											<?php if(!$session->getSession('guid')) : ?>
											<form action="" method="POST" accept-charset="utf-8">
											
											<?php
											//show success if success-session is active
											if($session->getSession('success')){
												echo '<div class="alert alert-success" role="alert">'.$session->getSession('success').'</div>';
												//kill session when 'echoed'.
												$session->killSession('success');
											}
											
											
											
											//show error if error-session is active
											if($session->getSession('error')){
												echo '<div class="alert alert-danger" role="alert">'.$session->getSession('error').'</div>';
												//kill session when 'echoed'.
												$session->killSession('error');
											}
											?>
												<div class="form-group">
													<label for="mail">Epostadress</label>
													<input type="text" class="form-control" id="mail" name="loginform[email]" placeholder="Epostadress" required>
												</div>
												<div class="form-group">
													<label for="password">Lösenord</label>
													<input type="password" class="form-control" id="password" name="loginform[password]" placeholder="Lösenord" required>
												</div>
												<button type="submit" class="btn btn-default">Logga in</button>
											</form>
											
											</div>
											
											<div class="col-lg-4">
											
											<form action="" method="POST" accept-charset="utf-8">
											<?php
											//show error if error-session is active
											if($session->getSession('errorKey')){
												echo '<div class="alert alert-danger" role="alert">'.$session->getSession('errorKey').'</div>';
												//kill session when 'echoed'.
												$session->killSession('errorKey');
											}
											?>
												<div class="form-group">
													<label for="mail">Registrera dig med din nyckel</label>
													<input type="text" class="form-control" id="mail" name="register[secret]" placeholder="Nyckel" required>
												</div>
												<button type="submit" class="btn btn-default">Registrera</button>
											</form>
											<?php endif; ?>
									 </div>
						</div>
				</div>
		</section>

<!-- information Section -->
		<section id="information">
				<div class="container">
							<div class="row">
									<div class="col-lg-12 text-center">
											<h2 class="section-heading">Information</h2>
											<h3 class="section-subheading text-muted">Undertext</h3>
									</div>
							</div>
							<div class="row text-center">
									<div class="col-md-6">
											<h4 class="service-heading">Arbetsgivare</h4>
											<p class="text-muted">
											Rekryteringsmöjligheter.
										Vägen till rätt person.
										YH-studenters utbildning består av ca 30% "Lärande i arbete". Här har du som arbetsgivare möjligheten att lära känna personer och testa deras kompetens inför en potentiell rekrytering.
										På Liabanken.se kan du erbjuda YH-studenter i hela landet olika spännande karriärmöjligheter som LIA-jobb, extrajobb, sommarjobb, examensarbeten eller heltidsjobb efter studierna.</p>
								</div>
								
								<div class="col-md-6">
										<h4 class="service-heading">Studenter</h4>
										<p class="text-muted">Karriärcentrum för dig som läser en YH- eller KY-utbildning.
										Liabanken.se finns för att du som läser på någon av landets YH/KY-utbildningar lättare ska komma in på arbetsmarknaden.
										Man kan säga att Liabanken.se är språngbrädan för din karriär och en hjälpreda för dig som söker LIA-plats, extrajobb eller anställning efter studierna.</p>
								</div>
						</div>
				</div>
		</section>


		<footer>
				<div class="container">
						<div class="row">
								<div class="col-md-4">
										<ul class="list-inline quicklinks">
												<li><a href="#">Länkar 1</a>
												</li>
												<li><a href="#">Länkar 2</a>
												</li>
										</ul>
								</div>
								<div class="col-md-4">
										<span class="copyright">Copyright &copy; LIA-Banken 2015</span>
										
										
								</div>
								<div class="col-md-4">
										<ul class="list-inline quicklinks">
												<li><a href="#">Länkar 3</a>
												</li>
												<li><a href="#">Länkar 4</a>
												</li>
										</ul>
								</div>
						</div>
				</div>
		</footer>