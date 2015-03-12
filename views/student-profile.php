<?php
  
  $studentProfile = new StudentProfile(); 
  $county = new County();
  $studentTags = new StudentTag();

  if(isset($_GET['uid'])){
    $userInfo = $user->getUserByGuid($_GET['uid']);
  } else {
    $userInfo = $signedUser;
  }

  $studentProfileInfo = $studentProfile->getProfile($userInfo['id']);
  $userCounty = $county->getMunicipalityName($userInfo['municipality']);
  $studentTags = $studentProfile->getTags($userInfo['id']);

?>
<div class="container">

    <div class="jumbotron">

      <div class="row">
        <div class="col-md-3 text-center">
          
          <a href="<?php echo $path . "images/users/" . $userInfo['id'] . "/" . $studentProfileInfo['picture']; ?>" target="_blank">
            <img class="profile-img" src=" <?php echo $path . "images/users/" . $userInfo['id'] . "/tum_" . $studentProfileInfo['picture']; ?> " alt="">
          </a>
          
          <h3 class="text-center"> <?php echo $userInfo['firstname'] . " " . $userInfo['lastname']; ?> </h3>
          <h4><?php echo $userCounty['name']; ?></h4>
        </div>        <div class="col-md-3 pull-right	">        	<?php if($session->getSession('guid') == $userInfo['guid']) : ?>          	<a class="btn btn-warning pull-right" href="<?php echo $path; ?>manage-user">Redigera uppgifter</a>        	<?php endif; ?>        </div>
      </div>
      
    </div>
  
  <div class="row">
    
    <div class="col-md-4">
      <h3 class="text-center">Info</h3>  
      

      <ul class="info-list">
        <li> <?php echo $studentProfileInfo['phone']; ?> </li>
        <li> <?php echo $userInfo['email']; ?> </li>

        <?php if(strlen($studentProfileInfo['website']) > 1) : ?>
          <li> <a href="<?php echo 'http://'.$studentProfileInfo['website']; ?>" target="_blank"><?php echo $studentProfileInfo['website']; ?></a>  </li>
        <?php endif; ?>
        <?php if(strlen($studentProfileInfo['resume']) > 1) : ?>
          <li> <a href="<?php echo $path . "images/users/" . $userInfo['id'] . "/" . $studentProfileInfo['resume']; ?>" target="_blank"> <?php echo $studentProfileInfo['resume'] ?> </a> </li>
        <?php endif; ?>
    </div>

    <div class="col-md-8">
      <h3 class="text-center">Om</h3>
        <p><?php echo newLine($studentProfileInfo['info']); ?></p>
      
      <hr>
      
      <h3 class="text-center">Mina kunskaper</h3>

      <div class="tags text-center">

          <?php foreach ($studentTags as $studentTag) : ?>      
        
             <a class="tag btn btn-primary"><?php echo $studentTag['name']; ?></a>

        <?php endforeach; ?>

      </div>

    </div>
  </div>

</div>