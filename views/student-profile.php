<?php 
  if(isset($_GET['uid'])){
    $userInfo = $user->getUserByGuid($_GET['uid']);
  } else {
    $userInfo = $signedUser;
  }


?>
<div class="container">

  <div class="row">
    <div class="jumbotron">

      <div id="profile-img"></div>

      <h2> <?php echo $userInfo['firstname']; ?> </h2>

    </div>
  </div>
  
  <div class="row">
    
    <div class="col-md-4">
      <h3 class="text-center">Info</h3>  
    </div>

    <div class="col-md-8">
      <h3 class="text-center">Om</h3>
      <hr>
      <h3 class="text-center">Mina kunskaper</h3>
    </div>
  </div>

</div>