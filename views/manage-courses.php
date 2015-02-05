
<?php
//open the object/class....
$liaCourse = new LiaCourse();
$courseTag = new CourseTag();


//default values for form
$items = array( 'name'=>'',
                'description'=>'',
                'course_start'=>'',
                'course_end'=>'',
                


//fetch ID (it's an edit)
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $items = $liacourse->getFromId($id);
    $usedTags = $courseTag->getAllFromCourseId($id);

    $buttonText = 'Spara';
}else{
    $id = 0;
    $buttonText = 'Skapa';
}

//insert function
if(isset($_POST['course'])){
    $course = $_POST['course'];

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }

    if($id > 0){
        $liaCourse->updateCourse($course, $tags, $id);
    }
    else{
        $liaCourse->create($course, $tags);
    }
    

    redirect($path.'/courses/');

}
?>

<div class="container">
    <div class="jumbotron">

        <h1>Hantera kurser!</h1>
        <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
        <a class="btn btn-primary" href="<?php echo $path; ?>company-list" role="button">Visa företag</a>

    </div>
</div>

    <div class="table-responsive">

        <div class="container">
            <form class="col-md-4"> 

                <legend>Kurs</legend>
                <div class="form-group">
                    <label for="courseName">Namn:</label>
                    <input type="text" class="form-control" id="courseName">
                </div>
                <div class="form-group">
                    <label for="courseDescription">Beskrivning:</label>
                    <input type="textarea" class="form-control" id="courseDescription">
                </div>
                <div class="form-group">
                    <label for="courseStart">Start:</label>
                    <input type="date" class="form-control" id="courseStart">
                </div>
                <div class="form-group">
                    <label for="courseEnd">Slut:</label>
                    <input type="date" class="form-control" id="courseEnd">
                </div>
                
                <button type="submit" class="btn btn-default">Spara</button>
            </form>
        </div>
    </div>

</body>
</html>
