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

  <div class="row">
    <div class="jumbotron">

      <?php if($session->getSession('guid') == $userInfo['guid']) : ?>
        <a class="edit-anchor" href="<?php echo $path; ?>manage-user"><button class="btn pull-right">Redigera uppgifter</button></a>
      <?php endif; ?>

      <div class="row">
        <div class="col-md-3 text-center">
          
          <a href="<?php echo $path . "images/users/" . $userInfo['id'] . "/" . $studentProfileInfo['picture']; ?>" target="_blank">
            <img class="profile-img" src=" <?php echo $path . "images/users/" . $userInfo['id'] . "/tum_" . $studentProfileInfo['picture']; ?> " alt="">
          </a>
          
          <h3 class="text-center"> <?php echo $userInfo['firstname'] . " " . $userInfo['lastname']; ?> </h3>
          <h4><?php echo $userCounty['name']; ?></h4>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="row">
    
    <div class="col-md-4">
      <h3 class="text-center">Info</h3>  
      
<<<<<<< HEAD
      <ul class="info-list">
        <li> <?php echo $studentProfileInfo['phone']; ?> </li>
        <li> <?php echo $userInfo['email']; ?> </li>
        <li> <a href="<?php echo $studentProfileInfo['website']; ?>" target="_blank"><?php echo $studentProfileInfo['website']; ?></a>  </li>
        <li> <a href="<?php echo $path . "images/users/" . $userInfo['id'] . "/" . $studentProfileInfo['resume']; ?>" target="_blank"> <?php echo $studentProfileInfo['resume'] ?> </a> </li>
=======
      <ul>
        <li>Telefon: <?php echo $studentProfileInfo['phone']; ?> </li>
        <li>Email: <?php echo $userInfo['email']; ?> </li>
        <li>Hemsida: <?php echo $studentProfileInfo['website']; ?> </li>
>>>>>>> origin/master
      </ul>

    </div>

    <div class="col-md-8">
      <h3 class="text-center">Om</h3>
        <p><?php echo $studentProfileInfo['info']; ?></p>
      
      <hr>
      
      <h3 class="text-center">Mina kunskaper</h3>

      <div class="tags">
        
        <?php 
          
          $counter = 0;

          foreach ($studentTags as $studentTag) {
            
            echo $studentTag['name'];
            if ($counter != count($studentTags) -1) {
                echo ", ";
              }  
            $counter ++;
          }



        ?>

      </div>

    </div>
  </div>

</div>