<?php 
  
  $courseObj = new Course();
  $userObj = new User();
  $projectObj = new LiaProject();
  $companyObj = new Company();


  $course = $courseObj->getFromId($_GET['id']);

  $applications = $courseObj->getApplicationsWithCourseId($course['id']);
  $courseTags = $courseObj->getTags($course['id']);
 ?>
  
  <div class="container">
    <div class="jumbotron">

        <h1><?php echo $course['name'] ?></h1>
        
    </div>
  </div>

  <div class="container">
    
    <div class="row">
      <div class="col-md-12">
        <p><?php echo $course['course_start'] ?> - <?php echo $course['course_end'] ?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h3>Kursbeskrivning</h3>
        <p><?php echo $course['description'] ?></p>
      </div>
    </div>
  
    <hr>

    <div class="row">
      <div class="col-md-12">
        <h3>Taggar</h3>
      
        <?php foreach ($courseTags as $courseTag): ?>
          <a href="#" class="tag btn btn-primary"><?php echo $courseTag['name']; ?></a>
        <?php endforeach ?>

      </div>
    </div>
    
    <hr>

    <div class="row">
      <div class="col-md-12">
        
        <h3>Lia-ansökningar</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Namn</th>
              <th>Företag</th>
              <th>Projekt</th>
              <th>Status</th>
            </tr>
          </thead>
          
          <tbody>
            
            <?php foreach($applications as $application): ?>
              <?php 
                $user = $userObj->getUserById($application['user_id']);
                $project = $projectObj->getFromId($application['project_id']);
                $company = $companyObj->getFromId($application['company_id']);
                
                $status = "Unknown";
                
                if($application['status'] == 0){
                  $status = "<a class='btn btn-default'>Ej godkänd</a>";
                } else if($application['status'] == 1){
                  $status = "<a class='btn btn-success'>Godkänd</a>";
                } else if($application['status'] == 2){
                  $status = "<a class='btn btn-danger'>Nekad</a>";
                } else{
                  $status = "<a class='btn btn-success'>Genomförd</a>";
                }

              ?>
              
              <tr>
                <td><a href="<?php echo $path . 'student-profile?uid=' . $user['guid']; ?>"><?php echo $user['firstname'] . " " . $user['lastname']?></a> </td>
                <td> <a href="<?php echo $path . 'company-profile?id=' . $company['id']; ?>"><?php echo $company['name'] ?></a> </td>
                <td> <a href="<?php echo $path . 'project-info?id=' . $project['id']; ?>"><?php echo $project['name'] ?></a> </td>
                <td><?php echo $status ?></td>
              </tr>
              
            <?php endforeach; ?>  

          </tbody>

        </table>
      </div>
    </div>

  </div>

