
<?php
//open the object/class....
$tag = new Tag();
$profanities = new Profanity();
$tags = $tag->getAll();
$profanitiesList = $profanities->getProfanityList();

//default values for form
$items = array('name'=>'');
 

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

<div class="container">
    <div class="jumbotron">

        <h1>Taggar</h1>
        <?php
        if($signedUser['company_owner'] == 1){ ?>
          <a class="btn btn-primary" href="<?php echo $path; ?>manage-company" role="button">Tillbaka</a><?php
        } else { ?>
          <a class="btn btn-primary" href="<?php echo $path; ?>manage-user" role="button">Tillbaka</a> <?php
        } ?>
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
        </tr>
      </thead>

      <tbody>

        <?php foreach ($tags as $tag){  ?>
          <tr>
            <td><?php echo $tag['name'] ?></td>
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
