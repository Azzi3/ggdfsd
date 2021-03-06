<?php
  
  $company = new Company(); 
  $county = new County();
  $liaProject = new LiaProject();

  if(isset($_GET['id']) && strlen($_GET['id']) > 0 && $company->getFromId($_GET['id'])){
    $userInfo = $company->getFromId($_GET['id']);
  } else if($signedUser['company_owner'] == 1) {
    $userInfo = $company->getFromId($signedUser['company_id']);
  }else{
    redirect($path.'404');
  }
  
  $companyInfo = $company->getFromId($userInfo['id']);
  $companyProfileInfo = $company->getFromId($userInfo['id']);
  $companyTags = $company->getTags($userInfo['id']);
  $companyProjects = $company->getProjects($userInfo['id']);


?>
<div class="container">

    <div class="jumbotron">

      <div class="container">
        <div class="col-md-6">
          <?php if($companyInfo['image']): ?>
						<a href="<?php echo $path . "images/company/" . $companyProfileInfo['name'] . "/" . $companyProfileInfo['image']; ?>" target="_blank">
            	<img class="img-responsive" src="<?php echo $path . "images/company/" . $companyProfileInfo['name'] . "/" . $companyProfileInfo['image']; ?>" alt="">
          	</a>
          <?php else: ?>
						<img class="profile-img" src="<?php echo $path . "images/placeholder.jpg" ?>" alt="">
          <?php endif; ?>
			
          <h4><?php echo $companyInfo['city']; ?></h4>
        </div>
        <div class="col-md-3 pull-right">
        	<?php if($signedUser['company_owner'] == 1 && $signedUser['company_id'] == $companyInfo['id']) : ?>
        	  <a class="btn btn-warning pull-right" href="<?php echo $path . "manage-company?id=" . $companyInfo['id']; ?>">Redigera uppgifter</a>
        	<?php endif; ?>
        	<?php if($signedUser['company_owner'] == 1 && $signedUser['company_id'] == 0) : ?>
        	  <a class="btn btn-success pull-right" href="<?php echo $path . "manage-company"; ?>"> <button class="btn pull-right">Skapa företag</button></a>
        	<?php endif; ?>
        </div>
      </div>
      
    </div>

  
  <div class="container">
    <div class="col-md-4">
      <h3 class="text-center">Info</h3>  
      
      <ul>
				<dl>
          <dt>Kontaktperson</dt>
          <dd><?php echo $companyProfileInfo['contact_name']; ?></dd>
          <dd>Telefon: <?php echo $companyProfileInfo['contact_phone']; ?></dd>
          <dd>Email: <?php echo $companyProfileInfo['contact_email']; ?></dd>
        </dl>
        
        <dl>
          <dt>Företag</dt>
          <dd>Email: <?php echo $companyProfileInfo['company_email']; ?></dd>
          <dd>Hemsida: <a href="<?php echo 'http://' . $companyProfileInfo['website_url']; ?>"><?php echo $companyProfileInfo['website_url']?></a></dd>
        </dl>
        
        <dl>
        	<?php if($signedUser['student'] == 1) {
        	echo
        	    "<a href='$path" . "apply?comp=$userInfo[id]'>" . 
        	      "<button type='button' class='btn btn-success'>Ansök om LIA-plats</button></a>";
        	  }?>
        </dl>
        
      </ul>

       

    </div>

    <div class="col-md-8">
      <h3 class="text-center">Om oss</h3>
        <p id="profile-description"><?php echo newLine($companyProfileInfo['description']); ?></p>
      
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
  
  
  
  <div class="container">
<?php if($companyProjects) : ?>
  <hr>
  	<div class="col-md-12"><h3 class="text-center">Våra projekt</h3></div>
  </div>

  <div class="container">
  	<div class="table-responsive">
  			<table class="table table-hover">
  				<thead>
  					<tr>
  						<th>Namn</th>
  						<th>Platser</th>
  						<th>Uppskattad tid</th>
  						<th>Taggar</th>
  						<th></th>
  					</tr>
  				</thead>
  	
  				<tbody>
  					<?php $company = new Company();
  					 foreach ($companyProjects as $project){ 
  							$companyInfo = $company->getFromId($project['company_id']);
  	
  						?>
  					<tr>

  						<td style="max-width: 10em"> <a href="<?php echo $path; ?>project-info?id=<?php echo $project['id']; ?>"><?php echo $project['name']; ?><a> </td>
  						<td><?php echo $project['spots']; ?></td>
  						<td><?php echo $project['estimated_time']; ?></td>
  						<td><?php
  							$counter = 0;
  							$projectTags = $liaProject->getTags($project['id']);
  							foreach ($projectTags as $projectTag) {
  								echo $projectTag['name']; if ($counter != count($projectTags) - 1){
  									echo ", ";
  								};
  								$counter++;
  	
  							} ?></td>
  							<td>
  								<?php if($signedUser['company_owner'] == 1 && $signedUser['company_id'] == $project['company_id']) : ?>
  									<a class="btn btn-default" href="<?php echo $path; ?>manage-projects?id=<?php echo $project['id']; ?>">Ändra</a>
  									<a id="deleteProjectBtn" data-name="<?php echo $project['name'];  ?>" data-projectid="<?php echo $project['id']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" >Ta bort</a>
  								<?php endif; ?>
  	
  							</td>
  					</tr>
  						<?php } ?>
  				</tbody>
  			</table>
  		</div>
  </div>
<?php endif; ?>
	
</div>