<?php 
	$studentProfile = new StudentProfile(); 
	$companyObj = new Company(); 

	$studentTags = $studentProfile->getTags($signedUser['id']);

	$arrayWithCompaniesArray = array();
	foreach ($studentTags as $tag) {
		array_push($arrayWithCompaniesArray, $companyObj->getCompaniesWhereTagId($tag['id']));
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
		$uniqueCompanies = array();
		foreach ($arrayWithCompaniesArray as $arrayWithCompanies) {
			foreach ($arrayWithCompanies as $company) {
				$uniqueCompanies[$company['name']] = $company;

			}
		}
		foreach ($uniqueCompanies as $company) {
			if($company['name'] != ''){
				$imgSrc = $path . 'images/placeholder.jpg';
				$description = $company['description'];
				if (strlen($description) > 200){
   					$description = substr($description, 0, 197) . '...';
				}
				if($company['image']){
					$imgSrc = $path . 'images/company/' . $company['name'] . '/' . $company['image'];
				}
				echo '	<div style="margin-bottom:2em" class="col-lg-4 col-md-6 text-center">
							<h2><a href="'. $path . 'company-profile?id='. $company['id'] . '">' . $company['name'] . '</a></h2>
							<p>'.$description .'</p>
						</div>';
			}
		}

		if(count($uniqueCompanies) == 0){
			echo '<div style=" width: 50%; margin: 0 auto;" class="alert alert-danger" role="alert">Hittade inga företag, testa lägga till fler taggar.</div>';
		}
	 ?>	
	 </div>
</div>

</body>
</html>