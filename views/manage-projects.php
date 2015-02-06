<?php
//open the object/class....
$liaProject = new LiaProject();
$projectTag = new ProjectTag();


//default values for form
$items = array( 'name'=>'',
                'description'=>'',
                'spots'=>'0',
                'company'=>'',
                'estimated_time'=>'');


//fetch ID (it's an edit)
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $items = $liaProject->getFromId($id);
    $usedTags = $projectTag->getAllFromProjectId($id);

    $buttonText = 'Spara';
}else{
    $id = 0;
    $buttonText = 'Skapa';
}

//insert function
if(isset($_POST['project'])){
    $project = $_POST['project'];
    $form = $_POST['project'];
    $session->setSession('form',$project);
    $error = array();
    if(strlen($form['name']) < 2 || strlen($form['name']) > 40){
        $error[] .= 'Namnet måste vara mellan 2 och 40 tecken.';
    }
    if(strlen($form['description']) < 2 || strlen($form['description']) > 300){
        $error[] .= 'Beskrivingen måste mellan 2 och 300 tecken.';
    }
    if(!is_numeric($form['spots']) && $form['spots']  < 1){
        $error[] .= 'Platser måste vara ett nummer och större än 0.';
    }
    if(strlen($form['company']) < 2 || strlen($form['company']) > 40){
        $error[] .= 'Företagsnamnet måste vara mellan 2 och 300 tecken.';
    }
    if(strlen($form['estimated_time']) < 2 || strlen($form['estimated_time']) > 30){
        $error[] .= 'Uppskattad tid måste vara mellan 2 och 30 tecken.';
    }

    if(count($error) > 0){
        $session->setSession('error',$error);
    }else{


        if(isset($_POST['tag'])){
            $tags = $_POST['tag'];
        }else{
            $tags = array();
        }

        if($id > 0){
            $liaProject->updateProject($project, $tags, $id);
        }
        else{
            $liaProject->create($project, $tags);
        }
        $session->killSession('error');
        $session->killSession('projects');
        redirect($path.'projects/');
    }
}


require_once('../partials/project-header.php');
?>
    <div class="container">
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
    	<form method="POST" action="">
    	  <div class="form-group">
    	    <label for="projectName">Namn</label>
    	    <input type="text" name="project[name]" value="<?php echo $items['name']; ?>" class="form-control" id="projectName" placeholder="Namn" required>
    	  </div>
    	  <div class="form-group">
    	    <label for="description">Beskriving</label>
    	    <textarea id="description" name="project[description]" class="form-control" rows="3"><?php echo $items['description']; ?></textarea>
    	  </div>
          <div class="form-group">
            <label for="spots">Antal platser</label>
            <input type="number" name="project[spots]" value="<?php echo $items['spots']; ?>" class="form-control" id="spots" placeholder="Antal platser" required>
          </div>
    	  <div class="form-group">
    	    <label for="company">Företag</label>
    	    <input type="text" name="project[company]" value="<?php echo $items['company']; ?>" class="form-control" id="company" placeholder="Företag" required>
    	  </div>
    	  <div class="form-group">
    	    <label for="file">Uppskattad tid</label>
    	    <input class="form-control" name="project[estimated_time]"  value="<?php echo $items['estimated_time']; ?>" type="text" placeholder="Uppskattad tid" id="file" required>
    	  </div>
    	  <div class="checkbox">
          <?php foreach ($projectTag->getAll() as $item) :
            $tag = $projectTag->checkIfTagIsUsed($id, $item['id']);
          ?>
    	    <label>
    	      <input type="checkbox" <?php if($tag){echo 'checked';} ?> value="<?php echo $item['id']; ?>" name="tag[<?php echo $item['id']; ?>]"> <?php echo $item['name']; ?>
    	    </label>
            <?php endforeach; ?>
    	  </div>
    	  <button type="submit" class="btn btn-default"><?php echo $buttonText; ?></button>
    	</form>

    </div>