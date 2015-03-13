<?php 
	$studentProfile = new StudentProfile(); 
	$companyObj = new Company(); 
	$arrayWithCompanies = array();
	$studentTags = $studentProfile->getTagIds($signedUser['id']);
	if(count($studentTags) != 0){
		$arrayWithCompanies = $companyObj->getCompaniesWithTagIds($studentTags);
	}


 ?>
<div class="container">
    <div class="jumbotron">

        <h1>Företag</h1>
        <h3><i>Företag som matchar din profil.</i></h3>
    </div>
</div>
<div class="container">
<div class="row">

	<?php 
		foreach ($arrayWithCompanies as $company) {
			if($company['name'] != ''){
				$description = $company['description'];
				if (strlen($description) > 150){
   					$description = substr($description, 0, 147) . '...';
				}
				echo '	<div style="margin-bottom:2em" class="col-lg-4 col-md-6 text-center">
							<h2><a href="'. $path . 'company-profile?id='. $company['id'] . '">' . $company['name'] . '</a></h2>
							<p>'.$description .'</p>
						</div>';
			}
		}

		if(count($arrayWithCompanies) == 0){
			echo '<div style=" width: 50%; margin: 0 auto;" class="alert alert-danger" role="alert">Hittade inga företag, testa lägga till fler taggar.</div>';
		}
	 ?>	
	 </div>
</div>

</body>
</html>