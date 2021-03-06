<?php 
  
  $courseObj = new Course();
  $userObj = new User();
  $projectObj = new LiaProject();

  $course = $courseObj->getFromId($_GET['id']);

  $applications = $courseObj->getApplicationsWithCourseId($course['id']);

 ?>
  
  <div class="container">
    <div class="jumbotron">

        <h1><?php echo $course['name'] ?></h1>
        <h3><?php echo $course['course_start'] ?> - <?php echo $course['course_end'] ?></h3>    
    </div>
  </div>

  <div class="container">
    
    <div class="row">
      <div class="col-md-12">
        <h3>Kursbeskrivning</h3>
        <p><?php echo $course['description'] ?></p>
      </div>
    </div>
    
    <?php if($signedUser['course_leader']): ?>
      <div class="row">
        <div class="col-md-12">
          
          <h3>Lia-ansökningar</h3>
          <table class="table">
            <thead>
              <tr>
                <th>Namn</th>
                <th>Projekt</th>
                <th>Status</th>
              </tr>
            </thead>
            
            <tbody>
              
              <?php foreach($applications as $application): ?>
                <?php 
                  $user = $userObj->getUserById($application['user_id']);
                  $project = $projectObj->getFromId($application['project_id']);
                  $status = "Unknown";
                  
                  if($application['status'] == 0){
                    $status = "<p class='status-block status-default'>Ej godkännd</p>";
                  } else if($application['status'] == 1){
                    $status = "<p class='status-block status-success'>Godkänd</p>";
                  } else if($application['status'] == 2){
                    $status = "<p class='status-block status-danger'>Nekad</p>";
                  } else{
                    $status = "<p class='status-block status-success'>Genomförd</p>" . 
                              " <a href='" . $path . 'student-resume?id='. $application['id'] . "'><button class='btn btn-default'>Visa omdöme</button></a>";
                    
                  }

                ?>
                
                <tr>
                  <td><a href="<?php echo $path . 'student-profile?uid=' . $user['guid']; ?>"><?php echo $user['firstname'] . " " . $user['lastname']?></a> </td>
                  <td> <a href="<?php echo $path . 'project-info?id=' . $project['id']; ?>"><?php echo $project['name'] ?></a> </td>
                  <td><?php echo $status ?></td>
                </tr>
                
              <?php endforeach; ?>  
              <div>
              </div>
            </tbody>

          </table>
        </div>
      </div>
    <?php endif; ?>
  </div>

