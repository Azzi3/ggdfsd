<?php
  
  $company = new Company(); 
  $county = new County();
  $companyTags = new CompanyTag();

  if(isset($_GET['uid'])){
    $userInfo = $user->getUserByGuid($_GET['uid']);
  } else {
    $userInfo = $signedUser;
  }
  
  $companyName = $company->getFromId($signedUser['company_id'])['name'];
  $companyProfileInfo = $company->getFromId($userInfo['id']);
  $userCounty = $county->getMunicipalityName($userInfo['municipality']);
  $companyTags = $company->getTags($signedUser['company_id']);

?>
<div class="container">

  <div class="row">
    <div class="jumbotron">

      <?php if($session->getSession('guid') == $userInfo['guid']) : ?>
        <a class="edit-anchor" href="<?php echo $path; ?>manage-company"> <i class="glyphicon glyphicon-pencil pull-right"></i></a>
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
  <h3 class="text-center">Våra projekt</h3>
	  	<table class="table">
		<th>Template Name</th><th align="center">Beskrivning</th>
		<tr>
			<td>Uncompleted Profile A</td>
			<td>Morbi posuere dapibus placerat. Ut quis ligula a orci efficitur lacinia dignissim in enim. Mauris quis enim mi. Proin luctus hendrerit enim. Mauris bibendum nulla id mauris accumsan lacinia. Etiam quis justo massa.</td>
			<td><a href="#" class="btn btn-primary" role="button">Ansök</a></td>
		</tr>

		<tr>
			<td><p>Uncompleted Profile A </p></td>
			<td>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris facilisis gravida metus, sagittis vulputate dolor dictum eget. Quisque nec placerat enim. Ut ac 				neque magna. Sed quam mauris, consequat a condimentum non, congue ut turpis. Nullam et eleifend ante.
			</td>
			<td><a href="#" class="btn btn-primary" role="button">Ansök</a></td>
		</tr>
		<tr>
			<td><p>Uncompleted Profile A </p></td>
			<td> Quisque sodales ut ipsum nec rhoncus. Donec ut justo ut tellus sollicitudin dictum. Morbi posuere dapibus placerat. Ut quis ligula a orci efficitur lacinia dignissim in enim. Mauris quis enim mi. Proin luctus hendrerit enim. Mauris bibendum nulla id mauris accumsan lacinia. Etiam quis justo massa.</td>
			<td><a href="#" class="lead btn btn-primary" role="button">Ansök</a></td>
		</tr>
	</table>
  </div>

</div>