<?php
$newCompany = new Company();
$companyTag = new CompanyTag();

//default values for form

$items = array_fill_keys(
  array('name', 'street_address', 'zip_code', 'city', 'website_url', 'description'), '');
$contact = array_fill_keys(
  array('name', 'phone', 'email'), '');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $items = $newCompany->getFromId($id);
    $usedTags = $companyTag->getAllFromCompanyId($id);
    $contact = $newCompany->getContact($items['id_contact_person'])[0];

    $buttonText = 'Spara';
}else{
    $id = 0;
    $buttonText = 'Skapa';
}

if(isset($_POST['company'])){
    $form = $_POST['company'];
    $session->setSession('company',$form);
    $error = array();

    if(strlen($form['contactPersonName']) < 2 || strlen($form['contactPersonName']) > 40){
        $error[] .= 'Namnet måste vara mellan 2 och 40 tecken.';
    }

    if(!is_numeric($form['contactPersonTel'])){
        $error[] .= 'Telefonnumret är inte giltig.';
    }

    if(!filter_var($form['contactPersonEmail'], FILTER_VALIDATE_EMAIL)){
        $error[] .= 'E-post adressen är inte giltig.';
    }

    if(strlen($form['companyName']) < 2 || strlen($form['companyName']) > 40){
        $error[] .= 'Namnet måste vara mellan 2 och 40 tecken.';
    }

    if(strlen($form['street_address']) < 2 || strlen($form['street_address']) > 40){
        $error[] .= 'Adressen måste vara mellan 2 och 40 tecken.';
    }

    if(!is_numeric($form['zip_code'])){
        $error[] .= 'Postnumret är inte giltig.';
    }

    if(strlen($form['city']) < 2 || strlen($form['city']) > 40){
        $error[] .= 'Stadens namn måste vara mellan 2 och 40 tecken.';
    }

    if(!filter_var($form['website_url'], FILTER_VALIDATE_URL)){
        $error[] .= 'Webbadressen är inte giltig.';
    }

    if(strlen($form['description']) < 2 || strlen($form['description']) > 1000){
        $error[] .= 'Beskrivningen måste vara mellan 2 och 1000 tecken.';
    }


    


      if(count($error) > 0){
        $session->setSession('error',$error);
    }

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }
    if($id > 0){
        $newCompany->updateCompany($company, $tags, $id);
    }
    else{
        $newCompany->createCompanyAndContact($company, $tags);
    }

    redirect($path.'company-list/');

}

?>

<div class="container">
    <div class="jumbotron">

        <h1>Hantera företagsprofil!</h1>
        <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
        <a class="btn btn-primary" href="<?php echo $path; ?>company-list" role="button">Visa företag</a>

    </div>
</div>

    <div class="table-responsive">

        <div class="container">
            <form class="col-md-4" method="POST" action="">
                <legend>Kontaktperson</legend>
                <div class="form-group">
                    <label for="contactPersonName">Namn:</label>
                    <input type="text" class="form-control" id="contact_name" value="<?php echo $contact['name']; ?>" pattern="^([^0-9]*)$"  name="company[contact_name]" required>
                </div>
                <div class="form-group">
                    <label for="contactPersonTel">Telefonnummer:</label>
                    <input type="number" class="form-control" id="contact_phone" value="<?php echo $contact['phone']; ?>" name="company[contact_phone]" required>
                </div>
                <div class="form-group">
                    <label for="contactPersonEmail">E-post:</label>
                    <input type="email" class="form-control" id="contact_email" value="<?php echo $contact['email']; ?>" name="company[contact_email]" required>
                </div>

                <legend>Företagsinfo</legend>
                <div class="form-group">
                    <label for="companyName">Företagsnamn</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $items['name'] ?>" name="company[name]" required>
                </div>
                <div class="form-group">
                    <label for="companyAddress">Gatuadress</label>
                    <input type="text" class="form-control" id="street_address" value="<?php echo $items['street_address'] ?>" name="company[street_address]" required>
                </div>
                <div class="form-group">
                    <label for="companyZipCode">Postnummer</label>
                    <input type="number" class="form-control" value="<?php echo $items['zip_code'] ?>" id="zip_code" name="company[zip_code]" required>
                </div>
                <div class="form-group">
                    <label for="companyCity">Postort</label>
                    <input type="text" class="form-control" id="city" value="<?php echo $items['city'] ?>" name="company[city]">
                </div>

                <div class="form-group">
                    <label for="companyURL">Webbadress:</label>
                    <input type="url" class="form-control" id="website_url" value="<?php echo $items['website_url'] ?>" name="company[website_url]">
                </div>
                <div class="form-group">
                    <label for="companyDescription">Företagsbeskrivning:</label>
                    <textarea id="description" class="form-control" rows="3" name="company[description]"><?php echo $items['description'] ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="checkbox">Företagstaggar</label>
                <div class="checkbox">
                          <?php foreach ($companyTag->getAll() as $item) :
                            $tag = $companyTag->checkIfTagIsUsed($id, $item['id']);
                          ?>
                            <label>
                              <input type="checkbox" <?php if($tag){echo 'checked';} ?> value="<?php echo $item['id']; ?>" name="tag[<?php echo $item['id']; ?>]"> <?php echo $item['name']; ?>
                            </label>
                            <?php endforeach; ?>
                </div>
                    
                </div>
                <button type="submit" class="btn btn-default"><?php echo $buttonText; ?></button>
            </form>
        </div>
    </div>

</body>
</html>
