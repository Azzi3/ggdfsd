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


    if($signedUser['company_id'] != $items['company_id']){
        redirect($path.'404');
    }


    $buttonText = 'Spara';
}else{
    $id = 0;
    $buttonText = 'Skapa';
}

//insert function
if(isset($_POST['project'])){
    $project = $_POST['project'];
    $project['company']=$signedUser['company_id'];

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
    
    redirect($path.'projects/');
}


require_once('../partials/project-header.php');
?>
    <div class="container">
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