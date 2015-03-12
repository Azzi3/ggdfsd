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

        <h1><?php echo $items['name']; ?></h1>
        <a class="btn btn-default" href="<?php echo $path; ?>projects" role="button">Visa alla LIA-Projekt</a>
    </div>
</div>

    <div class="container">
    	
    	  <div>
    	    <label for="description">Beskriving</label>
    		  <p><?php echo $items['description']; ?></p>
    		</div>
          <div>
            <label for="spots">Antal platser</label>
            <p><?php echo $liaProject->getAcceptedApplicantsForProject($id)[0]; ?> / <?php echo $items['spots']; ?></p>
          </div>
    	  <div>
    	    <label for="file">Uppskattad tid</label>
    	    <p><?php echo $items['estimated_time']; ?></p> 	
    	  </div>
    	  <div class="checkbox">
          <?php foreach ($projectTag->getAll() as $item){
                $tag = $projectTag->checkIfTagIsUsed($id, $item['id']);
                if($tag['id']){
                    echo '<a class="tag btn btn-primary">'. $item["name"] . '</a> ';
                };
            }; 
            ?>
    	  </div>
    <?php if($signedUser['student']): ?>
          <a class="btn btn-success" href="<?php echo $path ?>apply?cid=<?php echo $items['id']; ?>&comp=<?php echo $items['company_id']; ?>" >Ansök</a>
    	<?php endif; ?>
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
   
