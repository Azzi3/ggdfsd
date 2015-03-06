
<?php
//open the object/class....
$tag = new Tag();
$profanities = new Profanity();
$tags = $tag->getAll();
$profanitiesList = $profanities->getProfanityList();

//table names (for checking tags)
$tbl_course = "course_tag";
$tbl_project = "project_tag";
$tbl_student = "student_tag";
$tbl_company = "company_tag";

//default values for form
$items = array('name'=>'');

//function called in tags iteration, to check if tag is used or not
function checkTagUsage($id, $tableName){
  $checkTag = new Tag();
  $findTags = $checkTag->findTagUsage($id, $tableName);
  return $findTags;
}

if(isset($_GET['deleteid'])){
  $tag->deleteTag($_GET['deleteid']);
  redirect(CURRENT_PATH);
}

if($session->getSession('form'))
  $formFiller = array_merge($items, $session->getSession('form'));
else {
  $formFiller = $items;
}

if(isset($_POST['tag'])){
  $form = $_POST['tag'];
  $newTag = $_POST['tag']['name'];

  $error = array();

  if(strlen($form['name']) < 1 || strlen($form['name']) > 30){
    $error[] .= 'Namnet på taggen måste vara mellan 1 och 30 bokstäver.';
  }

  $checkName = $tag->getByName($form['name']);
  if($checkName){
    $error[] .= 'Namnet används redan.'; 
  }

  $nameLowerCase = strtolower($form['name']);
  if(in_array($nameLowerCase, $profanitiesList)){
      $error[] .= 'Namnet kan anses stötande.'; 
  } else {
    foreach ($profanitiesList as $profanity){;
      if (strpos($nameLowerCase, $profanity) !== false) {
        $error[] .= 'Namnet kan anses stötande.'; 
      }
    }
  }

  if(preg_match("/[^\w-. åäö]/", $nameLowerCase)){
    $error[] .= 'Namnet innehåller ogiltliga tecken.';
  }

  if(count($error) > 0){
    $session->setSession('error',$error);
  }else{
    $session->setSession('success','Ny tagg sparades utan problem.');
    $tag->create($newTag);
    redirect(CURRENT_PATH);
  }
} ?>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Är du säker på att du vill ta bort?</h4>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Avbryt</button>
        <button id="reallyDelete" type="button" class="btn btn-danger">Ta bort</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="jumbotron">

        <h1>Taggar</h1>
    </div>
</div>

    <div class="container"> 
    <?php
      if($session->getSession('error')){
        echo '<div class="alert alert-danger" role="alert">';
        foreach ($session->getSession('error') as $item) {
          echo '<li>'.$item.'</li>';
        }
        echo '</div>';
        $session->killSession('error');
      }

    if($session->getSession('success')){
        echo '<div class="alert alert-success" role="alert">';
        echo '<li>'.$session->getSession('success').'</li>';
        echo '</div>';
        $session->killSession('success');
    }?>
    <form method="POST" action="">
      <div class="form-group">
        <label for="name">Namn</label>
        <input type="text" name="tag[name]" value="<?php echo $formFiller['name']; ?>" class="form-control" id="name" placeholder="Namn" required>
      </div>
      <button type="submit" class="btn btn-default">Spara</button>
    
    </form>
    <br>
    <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Tillgängliga taggar</th>
          <th>Används</th>
        </tr>
      </thead>

      <tbody>

        <?php foreach ($tags as $tag){  ?>
          <tr>
            <td><?php echo $tag['name'] ?></td>
            <td><?php
              if (!empty(checkTagUsage($tag['id'], $tbl_course)) || !empty(checkTagUsage($tag['id'], $tbl_project)) ||
                !empty(checkTagUsage($tag['id'], $tbl_student)) || !empty(checkTagUsage($tag['id'], $tbl_company))){
                  echo "Ja";
                  $used = true; 
              } else {
                echo "Nej";
                $used = false;
              } ?>
              <?php
              if(!$used){ ?>
                <a id="deleteTagBtn" data-tagid="<?php echo $tag['id'] ?>" class="btn btn-danger pull-right" data-toggle="modal" data-name="<?php echo " ". $tag['name'] ?>" data-target="#deleteModal" >Ta bort</a> <?php
              } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>

<?php
//kill the form session
$session->killSession('form'); ?>
