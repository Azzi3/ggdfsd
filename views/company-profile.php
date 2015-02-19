<?php
  
  $company = new Company(); 
  $county = new County();

  if(isset($_GET['uid'])){
    $userInfo = $user->getUserByGuid($_GET['uid']);
  } else {
    $userInfo = $signedUser;
  }
  
  $companyName = $company->getFromId($signedUser['company_id'])['name'];
  $companyProfileInfo = $company->getFromId($userInfo['id']);
  $userCounty = $county->getMunicipalityName($userInfo['municipality']);
  $companyTags = $company->getTags($signedUser['company_id']);
  $companyProjects = $company->getProjects($signedUser['company_id']);
?>
<div class="container">

  <div class="row">
    <div class="jumbotron">

      <?php if($session->getSession('guid') == $userInfo['guid']) : ?>
        <a class="edit-anchor" href="<?php echo $path . "manage-company?id=" . $companyProfileInfo['id']; ?>"> <button class="btn pull-right">Redigera uppgifter</button></a>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-3 text-center">
          
          <a href="<?php echo $path . "images/users/" . $userInfo['id'] . "/" . $companyProfileInfo['picture']; ?>" target="_blank">
            <img class="profile-img" src=" <?php echo $path . "images/users/" . $userInfo['id'] . "/tum_" . $companyProfileInfo['picture']; ?> " alt="">
          </a>
          
          <h3 class="text-center"> <?php echo $companyName; ?> </h3>
          <h4><?php echo $userCounty['name']; ?></h4>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <h3 class="text-center">Info</h3>  
      
      <ul>
		<!-- <li>Telefon: <?php echo $companyProfileInfo['phone']; ?> </li> -->
        <li>Email: <?php echo $userInfo['email']; ?> </li>
        <li>Hemsida: <?php echo $companyProfileInfo['website_url']; ?> </li>
      </ul>

    </div>

    <div class="col-md-8">
      <h3 class="text-center">Om</h3>
        <p><?php echo $companyProfileInfo['description']; ?></p>
      
      <hr>
      
      <h3 class="text-center">Mina kunskaper</h3>

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
  	<table>
	  	<thead>
	  		<tr>
  				<th>Namn</th>
  				<th>Beskrivning</th>
  				<th><h2>VÅRA PROJEKT</h2></th>
  			</tr>	
	  	</thead>
  		<tbody>
  			
  			<?php foreach($companyProjects as $project): ?>
					<tr>
						<td><?php echo $project['name']; ?></td>
						<td><?php echo $project['description']; ?></td>
						<td>
							<?php if($signedUser['company_owner'] == 1 && $signedUser['company_id'] == $project['company_id']) : ?>
								<a href="<?php echo $path; ?>manage-projects?id=<?php echo $project['id']; ?>"><button class="btn">Ändra</button></a>
							<?php endif; ?>
						</td>
					</tr>	  
				<?php endforeach; ?>

  		</tbody>
  	</table>
  </div>
	
</div>