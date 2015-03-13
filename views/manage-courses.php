
<?php
//open the object/class....
$course = new Course();
$courseTag = new CourseTag();
$allCourses = $course->getAll();

//default values for form
$items = array('name'=>'',
               'description'=>'',
               'course_start'=>'',
               'course_end'=>'',
               'id'=>''
               );
                


//fetch ID (it's an edit)
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $redirectPath = CURRENT_PATH . "?id=" . $id;

    $items = $course->getFromId($id);
    $usedTags = $courseTag->getAllFromCourseId($id);

    $buttonText = 'Spara';
}else{
    $redirectPath = CURRENT_PATH;
    $id = 0;
    $buttonText = 'Skapa';
}



if($session->getSession('form'))
  $formFiller = array_merge($items, $session->getSession('form'));
else{
  $formFiller = $items;
}



if(isset($_POST['course'])){
  $removeFileValue = 0;

  $form = $_POST['course'];
  $file = $_FILES['uplFile'];
  $form['file'] = '';

  if(isset($form['removefile'])){
    $removeFileValue = 1;
  }



  $session->setSession('form',$form);
  $error = array();
  $daysToAdd = strtotime("+3 day");
  $earliestDate = date('Y-m-d', $daysToAdd);

  if(strlen($form['name']) < 2 || strlen($form['name']) > 50){
    $error[] .= 'Ett namn måste vara mellan 2 och 50 tecken.';
  }

  if(strlen($form['description']) < 2 || strlen($form['description']) > 300){
    $error[] .= 'En beskrivning måste vara mellan 2 och 300 tecken.';
  }

  if($_POST['course']['course_start'] > $_POST['course']['course_end']){
        $errors[] = 'Kursen kan inte sluta innan den började.';
        $session->setSession('error',$errors);
        redirect($redirectPath);
    }

  if($_POST['course']['course_start'] < $earliestDate){
        $errors[] = 'Startdatum för kursen måste ligga minst tre dagar fram i tiden.';
        $session->setSession('error',$errors);
        redirect($redirectPath);
    }

  // CHECKS IF THERE IS ANOTHER COURSE WITH THE SAME NAME & START DATE

  if(!isset($_GET['id'])){
    foreach ($allCourses as $courseRow) {
      if($_POST['course']['course_start'] == $courseRow['course_start'] && ($_POST['course']['name'] == $courseRow['name'])){
        $errors[] = 'En kurs med det här namnet och startdatum finns redan.';
        $session->setSession('error',$errors);
        redirect($redirectPath);
      }
    } 
  }

  $uplPath = PUBLIC_ROOT.'/files/';

  $upl = new Upl();

    if(strlen($file['tmp_name']) > 0 && $form['removefile'] == 0){
        $fileName = $upl->upload($file, $uplPath);
        $form['file'] = $fileName['name'];
    }
  
  if(count($error) > 0){
      $session->setSession('error',$error);
  }  
  else {
 
    $courseItems = $form;

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }

    if($id > 0){

      if($courseItems['file'] == ''){
        $courseItems['file'] = $items['file'];
      }

      if($removeFileValue == 1 && strlen($items['file']) > 2){
        $courseItems['file'] = '';
        unlink($uplPath.$items['file']);
      }

        $course->updateCourse($courseItems, $tags, $id);
      
    }
    else{
        $course->create($courseItems, $tags);
    }
      $session->killSession('form');
      redirect($path.'course-list');

       
  }

  if(isset($_GET['id'])){
      redirect(CURRENT_PATH.'?id='.$_GET['id']);
    }else{
      redirect(CURRENT_PATH);
    }
  

}
?>

<div class="container">
    <div class="jumbotron">

        <h1>Hantera kurser!</h1>
        <a class="btn btn-default" href="<?php echo $path; ?>course-list" role="button">Tillbaka</a>

    </div>
</div>

    <div class="container">  
        <form method="POST" action="" enctype="multipart/form-data">

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
            <input type="text" name="course[name]" value="<?php echo $formFiller['name']; ?>" class="form-control" id="name" placeholder="Namn" required>
          </div>
          
          <div class="form-group">
            <label for="description">Beskriving</label>
            <textarea id="description" name="course[description]" class="form-control" rows="3" required><?php echo $formFiller['description']; ?></textarea>
          </div>
          
          <div class="form-group">
            <label for="courseStart">Startdatum</label>
            <input type="date" name="course[course_start]" value="<?php echo $formFiller['course_start']; ?>" class="form-control" id="courseStart" placeholder="yyyy-mm-dd" pattern="^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$" required>
          </div>
          
          <div class="form-group">
            <label for="courseEnd">Slutdatum</label>
            <input type="date" name="course[course_end]" value="<?php echo $formFiller['course_end']; ?>" class="form-control" id="courseEnd" placeholder="yyyy-mm-dd" pattern="^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$" required>
          </div>

          <div class="form-group">
            <label for="uplFile">Ladda upp Fil</label>
            <input type="file" name="uplFile" value="" id="uplFile" placeholder="Ladda upp FIl">
            <?php if(!empty($items['file']) && strlen($items['file']) > 1) : ?>
              Nuvarande fil: <b><?php echo $items['file']; ?>.</b><br>
              <div class="alert alert-warning">
                <input type="checkbox" name="course[removefile]" value="1"> Ta bort filen
              </div>
            <?php else : ?>
              <b>Ingen nuvarande fil.</b>
            <?php endif; ?>
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
            &nbsp;<a class="btn btn-default" href="<?php echo $path; ?>manage-tags">Ny tagg</a>
          </div>
          
          <button type="submit" class="btn btn-default"><?php echo $buttonText; ?></button>
        
        </form>
    </div>
</body>
</html>

<?php
//kill the form session
$session->killSession('form'); ?>
