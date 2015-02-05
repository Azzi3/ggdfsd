<?php
  $course = new Course();
  $courses = $course->getAll();
  
  // if(isset($_GET['deleteid'])){
  //   $liaProject->deleteProjectAndTag($_GET['deleteid']);
  //   redirect(CURRENT_PATH);
?>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Är du säker på att du vill ta bort</h4>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="reallyDelete" type="button" class="btn btn-danger">Tabort</button>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="jumbotron">

    <h1>Kurser!</h1>
    <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
    <a class="btn btn-primary" href="<?php echo $path; ?>list-courses" role="button">Visa kurser</a>
    <a class="btn btn-warning pull-right" href="<?php echo $path; ?>manage-courses" role="button">Lägg upp Kurser</a>

  </div>
</div>
<div class="container">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Namn</th>
          <th>Beskrivning</th>
          <th>Startdatum</th>
          <th>Slutdatum</th>
        </tr>
      </thead>

      <tbody>
        
        <?php foreach ($courses as $course){  ?>
          <tr>
            <td><?php echo $course['name'] ?></td>
            <td style="max-width: 10em"><?php echo $course['description'] ?></td>
            <td><?php echo $course['course_start'] ?></td>
            <td><?php echo $course['course_end'] ?></td>
            
            <td>
              <a href="<?php echo $path; ?>manage-courses?id=<?php echo $course['id']; ?>"><button class="btn">Ändra</button></a>
              <a id="deleteCourseBtn" data-projectid="<?php echo $course['id'] ?>" class="btn" data-toggle="modal" data-target="#deleteModal" >Tabort</a>
            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
</div>