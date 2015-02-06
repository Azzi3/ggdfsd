
<?php
//open the object/class....
$course = new Course();
//$courseTag = new CourseTag();


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
    //$usedTags = $courseTag->getAllFromCourseId($id);

    $buttonText = 'Spara';
}else{
    $id = 0;
    $buttonText = 'Skapa';
}

//insert function
if(isset($_POST['course'])){
    $courseItems = $_POST['course'];

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }

    if($id > 0){
        $course->updateCourse($courseItems, $id);
    }
    else{
        $course->create($courseItems);
    }
    

    redirect($path.'list-courses/');

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

          <div class="form-group">
            <label for="name">Namn</label>
            <input type="text" name="course[name]" value="<?php echo $items['name']; ?>" class="form-control" id="name" placeholder="Namn" required>
          </div>
          
          <div class="form-group">
            <label for="description">Beskriving</label>
            <textarea id="description" name="course[description]" class="form-control" rows="3"><?php echo $items['description']; ?></textarea>
          </div>
          
          <div class="form-group">
            <label for="courseStart">Startdatum</label>
            <input type="date" name="course[course_start]" value="<?php echo $items['course_start']; ?>" class="form-control" id="courseStart" placeholder="yyyy-mm-dd" pattern="^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$" required>
          </div>
          
          <div class="form-group">
            <label for="courseEnd">Slutdatum</label>
            <input type="date" name="course[course_end]" value="<?php echo $items['course_end']; ?>" class="form-control" id="courseEnd" placeholder="yyyy-mm-dd" pattern="^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$" required>
          </div>
          
          <button type="submit" class="btn btn-default"><?php echo $buttonText; ?></button>
        
        </form>
    </div>
</body>
</html>
