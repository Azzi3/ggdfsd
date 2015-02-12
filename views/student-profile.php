<?php
  
  $studentProfile = new StudentProfile(); 
  $county = new County();

  if(isset($_GET['uid'])){
    $userInfo = $user->getUserByGuid($_GET['uid']);
  } else {
    $userInfo = $signedUser;
  }

  $studentProfileInfo = $studentProfile->getProfile($userInfo['id']);
  $userCounty = $county->getMunicipalityName($userInfo['municipality']);

?>
<div class="container">

  <div class="row">
    <div class="jumbotron">

      <div id="profile-img"></div>

      <h2> <?php echo $userInfo['firstname'] . " " . $userInfo['lastname']; ?> </h2>

    </div>
  </div>
  
  <div class="row">
    
    <div class="col-md-4">
      <h3 class="text-center">Info</h3>  
      
      <ul>
        <li>Telefon: <?php echo $studentProfileInfo['phone']; ?> </li>
        <li>Stad: <?php echo $userCounty['name']; ?> </li>
        <li>Email: <?php echo $userInfo['email']; ?> </li>
        <li>Hemsida: <?php echo $studentProfileInfo['website']; ?> </li>
      </ul>

    </div>

    <div class="col-md-8">
      <h3 class="text-center">Om</h3>
        <p><?php echo $studentProfileInfo['info']; ?></p>
      
      <hr>
      
      <h3 class="text-center">Mina kunskaper</h3>

    </div>
  </div>

</div>