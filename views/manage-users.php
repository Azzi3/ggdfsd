<?php


//open the object/class....
$user = new User();
$county = new County();
$studentProfile = new StudentProfile();
$studentTag = new StudentTag();

$municipality = $county->listMunicipality();

//default values for form
$formFillerTemplate = array('email'=>'',
                            'firstname'=>'',
                            'lastname'=>'',
                            'municipality'=>'',
                            'guid'=>'',
                            'phone'=>'',
                            'website'=>'',
                            'resume'=>'',
                            'picture'=>'',
                            'info'=>'');

//fetch ID (it's an edit)
if($signedUser){
    $guid = $signedUser['guid'];
    $thisUser = $user->getUserByGuid($guid);
    //if no user found, send 'user' to 404.
    if(!$thisUser){
        redirect('404');
    }

    //get additional info from studentProfile tbl
    $profileInfo = $studentProfile->getProfile($thisUser['id']);

    if(!$profileInfo){
        $emptyProfile = true;
        $profileInfo = array();
    }else{
        $emptyProfile = false;
    }

    
    $formFillerTemplate = array_merge($formFillerTemplate, $profileInfo);
   
    //if form is edited, set formFiller to form-values.
    if($session->getSession('form'))
        $formFiller = array_merge($formFillerTemplate, $session->getSession('form'));
    else{
        $formFiller = array_merge($formFillerTemplate, $thisUser);
    }

}else{
    //no guid requested, send 'user' to 404.
    redirect('404');
}

//insert function
if(isset($_POST['manage'])){


    $uplPath = PUBLIC_ROOT.'/images/users/'.$signedUser['id'].'/';

    if (!file_exists($uplPath)) {
        mkdir($uplPath, 0777);
    }

    $tags = $_POST['tag'];
    $form = $_POST['manage'];

    $picture = $_FILES['picture'];
    $resume = $_FILES['resume'];

    $upl = new Upl();

    if(strlen($picture['tmp_name']) > 0){
        $picturename = $upl->upload($picture, $uplPath, 200, 200, 1);
        $form['picture'] = $picturename['name'];
    }
    if(strlen($resume['tmp_name']) > 0){
        
        $resumename = $upl->upload($resume, $uplPath);
        $form['resume'] = $resumename['name'];    
    }

    if(isset($form['deleteresume'])){
        $form['resume'] = "";
    }

    if(isset($form['deleteimg'])){
        $form['picture'] = "";
    }

    $form = array_merge($formFiller, $form);

    $form['guid'] = $thisUser['guid'];
    $session->setSession('form',$form);
    $error = array();

    if(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)){
        $error[] .= 'Epostadressen är inte gilltig.';
    }
    if($user->checkUniqueEmail($form['email'], $thisUser['guid'])){
        $error[] .= 'Epostadressen är redan registrerad.';
    }


    if(strlen($form['password']) > 0){
        if(strlen($form['password']) < 2 || strlen($form['password']) > 30){
            $error[] .= 'Välj ett lösenord mellan 2 och 30 tecken.';
        }
        if($form['password'] != $form['password2']){
            $error[] .= 'Lösenorden stämmer inte överens.';
        }
    }

    if(strlen($form['firstname']) < 2 || strlen($form['firstname']) > 30){
        $error[] .= 'Välj ett förnamn mellan 2 och 30 tecken.';
    }
    if(strlen($form['lastname']) < 2 || strlen($form['lastname']) > 40){
        $error[] .= 'Välj ett efternamn mellan 2 och 40 tecken.';
    }
    if(!$county->checkValidMunicipality($form['municipality'])){
        $error[] .= 'Välj en korrekt kommun.';
    }

    if(!is_numeric($form['phone'])){
        $error[] .= 'Telefonnummer måste bestå av endast nummer.';
    }
    if(strlen($form['phone']) > 30){
        $error[] .= 'Telefonnummer måste vara mindre än 30 tecken.';
    }
    if(strlen($form['website']) > 200){
        $error[] .= 'Websidan måste vara mindre än 200 tecken.';
    }
    if(strlen($form['info']) > 5000){
        $error[] .= 'Informationen måste vara mindre än 5000 tecken.';
    }

    if(count($error) > 0){
        $session->setSession('error',$error);
    }else{

        $user->updateUser($form);

        if($emptyProfile){
            $studentProfile->createProfile($form,$tags);
        }else{
            $studentProfile->updateProfile($form,$tags);
        }

        $session->setSession('success','Dina uppgifter sparades korrekt.');


    }



    redirect(CURRENT_PATH);

}
?>



<div class="container">	<div class="jumbotron">		        <h1>Hantera profil</h1>	        <a class="btn btn-default" href="<?php echo $path; ?>company-profile" role="button">Tillbaka</a>	    </div>

    <form action="" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
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
    //show SUCCESS if SUCCESS-session is active
    if($session->getSession('success')){
        echo '<div class="alert alert-success" role="alert">';
        echo '<li>'.$session->getSession('success').'</li>';
        echo '</div>';

        //kill session when 'echoed'.
        $session->killSession('success');
    }
    ?>
        <div class="form-group">
            <label for="mail">*Epostadress</label>
            <input type="text" class="form-control" value="<?php echo $formFiller['email']; ?>" id="mail" name="manage[email]" placeholder="Epostadress" required>
        </div>
        <div class="form-group">
            <label for="pword">**Lösenord</label>
            <input type="password" autocomplete="off" class="form-control" id="pword" name="manage[password]" placeholder="Lösenord">
        </div>
        <div class="form-group">
            <label for="pword2">**Validera lösenord</label>
            <input type="password" autocomplete="off" class="form-control" id="pword2" name="manage[password2]" placeholder="Validera lösenord">
        </div>
        <br>
        <div class="form-group">
            <label for="firstname">*Förnamn</label>
            <input type="text" class="form-control" value="<?php echo $formFiller['firstname']; ?>" id="firstname" name="manage[firstname]" placeholder="Förnamn" required>
        </div>
        <div class="form-group">
            <label for="lastname">*Efternamn</label>
            <input type="text" class="form-control" value="<?php echo $formFiller['lastname']; ?>" id="lastname" name="manage[lastname]" placeholder="Efternamn" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefonnummer</label>
            <input type="text" class="form-control" value="<?php echo $formFiller['phone']; ?>" id="phone" name="manage[phone]" placeholder="Telefonnummer">
        </div>
        <div class="form-group">
            <label for="region">*Välj kommun</label>
            <select class="form-control" name="manage[municipality]" id="region" required>
                <option value="">-Välj kommun-</option>
                <?php foreach ($municipality as $item) {
                    $selected = '';

                    if($item['municipality_id'] == $formFiller['municipality'])
                        $selected = 'selected';

                    echo '<option '.$selected.' value="'.$item['municipality_id'].'">'.$item['name'].'</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="website">Hemsida</label>
            <input type="text" class="form-control" value="<?php echo $formFiller['website']; ?>" id="website" name="manage[website]" placeholder="Hemsida">
        </div>
        <div class="form-group">
            <label for="info">Information</label>
            <textarea class="form-control" id="info" name="manage[info]" placeholder="Information"><?php echo $formFiller['info']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="checkbox">Taggar</label>
            <div class="checkbox">
                  <?php foreach ($studentTag->getAll() as $item) :
                    $tag = $studentTag->checkIfTagIsUsed($signedUser['id'], $item['id']);
                  ?>
                    <label>
                      <input type="checkbox" <?php if($tag){echo 'checked';} ?> value="<?php echo $item['id']; ?>" name="tag[<?php echo $item['id']; ?>]"> <?php echo $item['name']; ?>
                    </label>
                    <?php endforeach; ?>
            </div>   
            <a class="btn btn-default" href="<?php echo $path; ?>manage-tags">Ny tagg</a>
        </div>

        

        <div class="form-group">
            
            <?php if(isset($profileInfo['resume'])): ?>
                <a href="<?php echo $path . "images/users/" . $thisUser['id'] . "/" . $profileInfo['resume']; ?>"><?php echo $profileInfo['resume']; ?></a>
                <label for="deleteresume">Ta bort CV?</label>
                <input id="deleteresume" type="checkbox" name="manage[deleteresume]">
                <br>
            <?php else: ?>
                <p>Ingen profilbild uppladdad</p>
            <?php endif; ?>

            <label for="resume">Ladda upp CV</label>
            <input type="file" name="resume" value="" placeholder="Ladda upp CV">
        </div>
        
        

        <div class="form-group">
            
            <?php if(isset($profileInfo['picture'])): ?>
                <img src=" <?php echo $path . "images/users/" . $thisUser['id'] . "/tum_" . $profileInfo['picture']; ?> " alt="">
                <label for="deleteimg">Ta bort profilbild?</label>
                <input id="deleteimg" type="checkbox" name="manage[deleteimg]">
                <br>
            <?php else: ?>
                <p>Ingen profilbild uppladdad</p>
            <?php endif; ?>
            
            <label for="resume">Ladda upp profilbild</label>
            <input type="file" name="picture" accept="image/*" value="" placeholder="Ladda upp profilbild">
        </div>


        * Måste anges<br>
        ** Lämnas blankt om du vill behålla nuvarande lösenord<br>
        <button class="btn btn-default" type="submit">Spara uppgifter</button>

    </form>

</div>


<?php
//kill the form session
$session->killSession('form'); ?>