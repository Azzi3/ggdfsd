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

}else{
    $id = 0;
   
}
?>

<div class="container">
    <div class="jumbotron">

        <h1>Projekt!</h1>
        <a class="btn btn-default" href="<?php echo $path; ?>projects" role="button">Tillbaka</a>
    </div>
</div>

    <div class="container">
    	
    	  <div>
    	    <label for="projectName">Namn</label>
    	    <p><?php echo $items['name']; ?></p>
    	  </div>
    	  <div>
    	    <label for="description">Beskriving</label>
    		  <p><?php echo $items['description']; ?></p>
    		</div>
          <div>
            <label for="spots">Antal platser</label>
            <p><?php echo $items['spots']; ?></p>
          </div>
    	  <div>
    	    <label for="file">Uppskattad tid</label>
    	    <p><?php echo $items['estimated_time']; ?></p> 	
    	  </div>
    	  <div class="checkbox">
          <?php foreach ($projectTag->getAll() as $item) :
            $tag = $projectTag->checkIfTagIsUsed($id, $item['id']);
          ?>
    	    <label>
    	      <input type="checkbox" disabled <?php if($tag){echo 'checked';} ?> value="<?php echo $item['id']; ?>" name="tag[<?php echo $item['id']; ?>]"> <?php echo $item['name']; ?>
    	    </label>
            <?php endforeach; ?>
    	  </div>

          <a href="<?php echo $path ?>apply?cid=<?php echo $items['id']; ?>"><button type="button" class="btn">Ansök</button></a>
    	
    </div><?php
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


}else{
    $id = 0;
}

//insert function


?>
   
