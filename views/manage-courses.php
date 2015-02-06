
<?php
//open the object/class....
$course = new Course();
$courseTag = new CourseTag();


//default values for form
$items = array('name'=>'',
               'description'=>'',
               'course_start'=>'',
               'course_end'=>''
               );
                


//fetch ID (it's an edit)
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $items = $course->getFromId($id);
    $usedTags = $courseTag->getAllFromCourseId($id);

    $buttonText = 'Spara';
}else{
    $id = 0;
    $buttonText = 'Skapa';
}

if(isset($_POST['course'])){  
  $form = $_POST['course'];
  $session->setSession('form',$form);
  $error = array();

  if(strlen($form['name']) < 2 || strlen($form['name']) > 50){
    $error[] .= 'Ett namn måste vara mellan 2 och 50 tecken.';
  }

  if(strlen($form['description']) < 2 || strlen($form['description']) > 300){
    $error[] .= 'En beskrivning måste vara mellan 2 och 300 tecken.';
  }
  
  if(count($error) > 0){
      $session->setSession('error',$error);
  }  
  else {
 
    $courseItems = $_POST['course'];

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }

    if($id > 0){
        $course->updateCourse($courseItems, $tags, $id);
    }
    else{
        $course->create($courseItems, $tags);
    }
       redirect($path.'list-courses/');
  }
  
  redirect(CURRENT_PATH);

}
?>

<div class="container">
    <div class="jumbotron">

        <h1>Hantera kurser!</h1>
        <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
        <a class="btn btn-primary" href="<?php echo $path; ?>list-courses" role="button">Visa kurser</a>

    </div>
</div>

    <div class="container">  
        <form method="POST" action="">

          <?php
            //show error if error-session is active
            if($session->getSession('error')){
              echo '<div class="alert alert-danger" role="alert">';
              foreach ($session->getSession('error') as $item) {
                echo '<li>'.$item.'</li>';
              }
              echo '</div>';

              //kill session when 'echoed'.
              $session->killSession('error');
            }
          ?>

          <div class="form-group">
            <label for="name">Namn</label>
            <input type="text" name="course[name]" value="<?php echo $items['name']; ?>" class="form-control" id="name" pattern="^([^0-9]*)$" placeholder="Namn" required>
          </div>
          
          <div class="form-group">
            <label for="description">Beskriving</label>
            <textarea id="description" name="course[description]" class="form-control" rows="3" required><?php echo $items['description']; ?></textarea>
          </div>
          
          <div class="form-group">
            <label for="courseStart">Startdatum</label>
            <input type="date" name="course[course_start]" value="<?php echo $items['course_start']; ?>" class="form-control" id="courseStart" placeholder="yyyy-mm-dd" pattern="^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$" required>
          </div>
          
          <div class="form-group">
            <label for="courseEnd">Slutdatum</label>
            <input type="date" name="course[course_end]" value="<?php echo $items['course_end']; ?>" class="form-control" id="courseEnd" placeholder="yyyy-mm-dd" pattern="^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$" required>
          </div>
          
          <div class="form-group">
            <label for="checkbox">Företagstaggar</label>
          </div>
          
          <div class="checkbox">
          
            <?php 
              foreach ($courseTag->getAll() as $item) :
                $tag = $courseTag->checkIfTagIsUsed($id, $item['id']);
            ?>
              <label>
                <input type="checkbox" <?php if($tag){echo 'checked';} ?> value="<?php echo $item['id']; ?>" name="tag[<?php echo $item['id']; ?>]"> <?php echo $item['name']; ?>
              </label>
            <?php endforeach; ?>
          
          </div>
          <button type="submit" class="btn btn-default"><?php echo $buttonText; ?></button>
        
        </form>
    </div>
</body>
</html>
