<?php
$newCompany = new Company();
$companyTag = new CompanyTag();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $items = $liaProject->getFromId($id);
    $usedTags = $projectTag->getAllFromProjectId($id);

    $buttonText = 'Spara';
}else{
    $id = 0;
    $buttonText = 'Skapa';
}

if(isset($_POST['company'])){
    $company = $_POST['company'];

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }

    $newCompany->createCompanyAndContact($company, $tags);

    redirect(CURRENT_PATH);

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
                    <input type="text" class="form-control" id="contact_name" name="company[contact_name]">
                </div>
                <div class="form-group">
                    <label for="contactPersonTel">Telefonnummer:</label>
                    <input type="text" class="form-control" id="contact_phone" name="company[contact_phone]">
                </div>
                <div class="form-group">
                    <label for="contactPersonEmail">E-post:</label>
                    <input type="text" class="form-control" id="contact_email" name="company[contact_email]">
                </div>

                <legend>Företagsinfo</legend>
                <div class="form-group">
                    <label for="companyName">Företagsnamn</label>
                    <input type="text" class="form-control" id="name" name="company[name]">
                </div>
                <div class="form-group">
                    <label for="companyAddress">Gatuadress</label>
                    <input type="text" class="form-control" id="street_address" name="company[street_address]">
                </div>
                <div class="form-group">
                    <label for="companyZipCode">Postnummer</label>
                    <input type="text" class="form-control" id="zip_code" name="company[zip_code]">
                </div>
                <div class="form-group">
                    <label for="companyCity">Postort</label>
                    <input type="text" class="form-control" id="city" name="company[city]">
                </div>

                <div class="form-group">
                    <label for="companyURL">Webbadress:</label>
                    <input type="text" class="form-control" id="website_url" name="company[website_url]">
                </div>
                <div class="form-group">
                    <label for="companyDescription">Företagsbeskrivning:</label>
                    <textarea id="description" class="form-control" rows="3" name="company[description]"></textarea>
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
