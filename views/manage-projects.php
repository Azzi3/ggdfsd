<?php

if(isset($_POST['project'])){
    $project = $_POST['project'];

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }

    $liaProject = new LiaProject();
    $liaProject->create($project, $tags);

    redirect(CURRENT_PATH);

}


require_once('../partials/project-header.php');
$projectTag = new ProjectTag();
?>
    <div class="container">
    	<form method="POST" action="">
    	  <div class="form-group">
    	    <label for="projectName">Namn</label>
    	    <input type="text" name="project[name]" class="form-control" id="projectName" placeholder="Namn" required>
    	  </div>
    	  <div class="form-group">
    	    <label for="description">Beskriving</label>
    	    <textarea id="description" name="project[description]" class="form-control" rows="3"></textarea>
    	  </div>
          <div class="form-group">
            <label for="spots">Antal platser</label>
            <input type="text" name="project[spots]" class="form-control" id="spots" placeholder="Antal platser" required>
          </div>
    	  <div class="form-group">
    	    <label for="company">Företag</label>
    	    <input type="text" name="project[company]" class="form-control" id="company" placeholder="Företag" required>
    	  </div>
    	  <div class="form-group">
    	    <label for="file">Uppskattad tid</label>
    	    <input class="form-control" name="project[estimated_time]" type="text" placeholder="Uppskattad tid" id="file" required>
    	  </div>
    	  <div class="checkbox">
          <?php foreach ($projectTag->getAll() as $item) : ?>
    	    <label>
    	      <input type="checkbox" value="<?php echo $item['id']; ?>" name="tag[<?php echo $item['id']; ?>]"> <?php echo $item['name']; ?>
    	    </label>
            <?php endforeach; ?>
    	  </div>
    	  <button type="submit" class="btn btn-default">Submit</button>
    	</form>

    </div>