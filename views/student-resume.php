<?php 
  
  $applicantObj = new Applicant();

  $userObj = new User();
  $companyObj = new Company();

  $applicant = $applicantObj->getApplicantWithId($_GET['id']);
  $user = $userObj->getUserById($applicant['user_id']);
  
  $company = $companyObj->getFromId($applicant['user_id']);
 ?>
  
  <div class="container">
    <div class="jumbotron">

        <h1><?php echo $user['firstname'] . " " . $user['lastname'] ?></h1>
        <h3>Omdöme för LIA på <?php echo $company['name'] ?></h3>    
    </div>
  </div>

  <div class="container">
    
    <div class="row">
      <div class="col-md-12">
        <h3>Omdöme</h3>
        <p><?php echo $applicant['report'] ?></p>
      </div>
    </div>
  </div>