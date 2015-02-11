<?php
//open the object/class....
$user = new User();

$county = new County();
$municipality = $county->listMunicipality();

//default values for form
$formFillerTemplate = array('email'=>'',
                            'firstname'=>'',
                            'lastname'=>'',
                            'municipality'=>'',
                            'guid'=>'');

//fetch ID (it's an edit)
if($signedUser){
    $guid = $signedUser['guid'];
    $thisUser = $user->getUserByGuid($guid);

    //if no user found, send 'user' to 404.
    if(!$thisUser){
        redirect('404');
    }
   
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

    $form = $_POST['manage'];
    $form['guid'] = $thisUser['guid'];
    $session->setSession('form',$form);
    $error = array();

    if(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)){
        $error[] .= 'Epostadressen är inte gilltig.';
    }
    if($user->checkUniqueEmail($form['email'], $thisUser['guid'])){
        $error[] .= 'Epostadressen är redan registrerad.';
    }
    if(strlen($form['password']) < 2 || strlen($form['password']) > 30){
        $error[] .= 'Välj ett lösenord mellan 2 och 30 tecken.';
    }
    if($form['password'] != $form['password2']){
        $error[] .= 'Lösenorden stämmer inte överens.';
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

    if(count($error) > 0){
        $session->setSession('error',$error);
    }else{

        $user->updateUser($form);

        $session->setSession('success','Dina uppgifter sparades korrekt.');


    }



    redirect(CURRENT_PATH);

}
?>



<div class="container">

    <form action="" method="POST" accept-charset="utf-8">
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
            <label for="mail">Epostadress</label>
            <input type="text" class="form-control" value="<?php echo $formFiller['email']; ?>" id="mail" name="manage[email]" placeholder="Epostadress" required>
        </div>
        <div class="form-group">
            <label for="pword">Lösenord</label>
            <input type="password" class="form-control" id="pword" name="manage[password]" placeholder="Lösenord" required>
        </div>
        <div class="form-group">
            <label for="pword2">Validera lösenord</label>
            <input type="password" class="form-control" id="pword2" name="manage[password2]" placeholder="Validera lösenord" required>
        </div>
        <br>
        <div class="form-group">
            <label for="firstname">Förnamn</label>
            <input type="text" class="form-control" value="<?php echo $formFiller['firstname']; ?>" id="firstname" name="manage[firstname]" placeholder="Förnamn" required>
        </div>
        <div class="form-group">
            <label for="lastname">Efternamn</label>
            <input type="text" class="form-control" value="<?php echo $formFiller['lastname']; ?>" id="lastname" name="manage[lastname]" placeholder="Efternamn" required>
        </div>
        <div class="form-group">
            <label for="region">Välj kommun</label>
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

        <button class="btn" type="submit">Spara uppgifter</button>

    </form>

</div>


<?php
//kill the form session
$session->killSession('form'); ?>