<?php
  
  $company = new Company(); 
  $county = new County();

  if(isset($_GET['uid'])){
    $userInfo = $user->getUserByGuid($_GET['uid']);
  } else {
    $userInfo = $signedUser;
  }
  
  $companyInfo = $company->getFromId($signedUser['company_id']);
  $companyProfileInfo = $company->getFromId($userInfo['company_id']);
  $contact = $company->getContact($companyInfo['id_contact_person'])[0];
  $userCounty = $county->getMunicipalityName($userInfo['municipality']);
  $companyTags = $company->getTags($signedUser['company_id']);
  $companyProjects = $company->getProjects($signedUser['company_id']);
?>
<div class="container">

  <div class="row">
    <div class="jumbotron">

      <?php if($session->getSession('guid') == $userInfo['guid']) : ?>
        <a class="edit-anchor" href="<?php echo $path . "manage-company?id=" . $companyInfo['id']; ?>"> <button class="btn pull-right">Redigera uppgifter</button></a>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-3 text-center">
          


          <?php if($companyInfo['image']): ?>
						<a href="<?php echo $path . "images/company/" . $companyProfileInfo['name'] . "/" . $companyProfileInfo['image']; ?>" target="_blank">
            	<img class="profile-img" src="<?php echo $path . "images/company/" . $companyProfileInfo['name'] . "/tum_" . $companyProfileInfo['image']; ?>" alt="">
          	</a>
          <?php else: ?>
						<img class="profile-img" src="<?php echo $path . "images/placeholder.jpg" ?>" alt="">
          <?php endif; ?>
			
          <h3 class="text-center"> <?php echo $companyInfo['name']; ?> </h3>
          <h4><?php echo $userCounty['name']; ?></h4>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <h3 class="text-center">Info</h3>  
      
      <ul>
				<dl>
          <dt>Kontaktperson</dt>
          <dd><?php echo $contact['name']; ?></dd>
          <dd>Telefon: <?php echo $contact['phone'] ?></dd>
          <dd>Email: <?php echo $contact['email'] ?></dd>
        </dl>
        
        <dl>
          <dt>Företag</dt>
          <dd>Företagsmail: <?php echo $userInfo['email']; ?></dd>
          <dd>Hemsida: <?php echo $companyProfileInfo['website_url']; ?></dd>
        </dl>
      </ul>

    </div>

    <div class="col-md-8">
      <h3 class="text-center">Om oss</h3>
        <p><?php echo $companyProfileInfo['description']; ?></p>
      
      <hr>
      
      <h3 class="text-center">Våra områden</h3>

	  <div class="tags text-center">
        
      <?php if(count($companyTags) <= 0 ): ?>
        <p>Användaren har inte lagt till några kunskaper ännu.</p>
      <?php else: ?>

        <?php foreach ($companyTags as $companyTag) : ?>      
        
             <a href="#" class="tag btn btn-primary"><?php echo $companyTag['name']; ?></a>

        <?php endforeach; ?>

      <?php endif; ?>
      </div>

    </div>
  </div>
  
  <div class="row">
  	<div class="col-md-12"><h3 class="text-center">Våra projekt</h3></div>
  </div>


  <div class="row">
  	<table class="table table-striped table-hover">
	  	<thead>
	  		<tr>
  				<th>Namn</th>
  				<th>Beskrivning</th>
  				<th></th>
  			</tr>	
	  	</thead>
  		<tbody>
  			
  			<?php foreach($companyProjects as $project): ?>
					<tr>
						<td><?php echo $project['name']; ?></td>
						<td><?php echo $project['description']; ?></td>
						<td>
							<?php if($signedUser['company_owner'] == 1 && $signedUser['company_id'] == $project['company_id']) : ?>
								<a class="push-right" href="<?php echo $path; ?>manage-projects?id=<?php echo $project['id']; ?>"><button class="btn">Ändra</button></a>
								<a class="btn btn-danger" id="deleteProjectBtn" data-projectid="<?php echo $project['id']; ?>" data-toggle="modal" data-target="#deleteModal" >Ta bort</a>
							<?php endif; ?>
						</td>
					</tr>	  
				<?php endforeach; ?>

  		</tbody>
  	</table>
  </div>
	
</div>