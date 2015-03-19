<?php
$newCompany = new Company();
$companyTag = new CompanyTag();

if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) &&
     empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0)
{
  $errors = array();
  $errors[] = 'The file is way too large to upload buddy.';
  $session->setSession('error',$errors);
}
//default values for form

$items = array_fill_keys(
  array('name', 'street_address', 'zip_code', 'city', 'website_url', 'description', 'file'), '');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $items = $newCompany->getFromId($id);
    $usedTags = $companyTag->getAllFromCompanyId($id);
    $buttonText = 'Spara';
}else if(!isset($_POST['company'])){
    $items['contact_name'] = '';
    $items['contact_email'] = '';
    $items['company_email'] = '';
    $items['image'] = '';
    $id = 0;
    $buttonText = 'Skapa';
}else{
    $id = 0;
    $items['image'] = '';
}
if(isset($_GET['id'])){
    if($_GET['id'] != $signedUser['company_id']) { die("No access"); }
}



if(isset($_POST['company'])){
    $company = $_POST['company'];

    if ($_FILES['picture']['name'] != ""){
        $image = $_FILES['picture'];
        $errors = array();
        $maxsize = 2097152;

        $uplPath = PUBLIC_ROOT.'/images/company/'.$company['name'].'/';

        if (!file_exists($uplPath)) {
            mkdir($uplPath, 0777);
        }

        $upl = new Upl();

        if(strlen($image['tmp_name']) > 0){
            $picturename = $upl->upload($image, $uplPath, 200, 200, 1);
        }

        if(count($errors) > 0){
            $session->setSession('error',$errors);
            redirect(PATH.'manage-company/');
        }

    } elseif(isset($company['deleteimg'])){
        $picturename['name'] = "";
    } else{
        $picturename['name'] = $items['image'];
    }

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }
    if($id > 0){
        $newCompany->updateCompany($company, $tags, $id, $picturename['name']);
    }
    else{
        $lastId = $newCompany->createCompanyAndContact($company, $tags, $picturename['name']);
        $user->setCompany($lastId, $signedUser['id']);
    }

    redirect(PATH.'company-profile/');

}

?>

<div class="container">
    <div class="jumbotron">

        <h1>Hantera företagsprofil!</h1>
        <a class="btn btn-default" href="<?php echo $path; ?>company-profile" role="button">Tillbaka</a>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
    <div class="row">
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
        ?>
        <div class="col-md-6">
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
                <input type="number" class="form-control" value="<?php echo $items['zip_code'] ?>" id="zip_code" name="company[zip_code]">
            </div>
            <div class="form-group">
                <label for="companyCity">Postort</label>
                <input type="text" class="form-control" id="city" value="<?php echo $items['city'] ?>" name="company[city]" required>
            </div>

            <div class="form-group">
                <label for="companyEmail">Företagets email:</label>
                <input type="email" class="form-control" id="company_email" value="<?php echo $items['company_email'] ?>" name="company[company_email]">
            </div>

            <div class="form-group">
                <label for="companyURL">Webbadress:</label>
                <input type="text" class="form-control" id="website_url" value="<?php echo $items['website_url'] ?>" name="company[website_url]">
            </div>
            <div class="form-group">
                <label for="companyDescription">Företagsbeskrivning:</label>
                <textarea id="description" class="form-control" rows="3" name="company[description]"><?php echo $items['description'] ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <legend>Kontaktperson</legend>
            <div class="form-group">
                <label for="contactPersonName">Kontaktpersonens namn:</label>
                <input type="text" class="form-control" id="contact_name" value="<?php echo $items['contact_name']; ?>" pattern="^([^0-9]*)$"  name="company[contact_name]" required>
            </div>
            <div class="form-group">
                <label for="contactPersonTel">Kontaktpersonens telefonnummer:</label>
                <input type="number" class="form-control" id="contact_phone" value="<?php echo $items['contact_phone']; ?>" name="company[contact_phone]" required>
            </div>
            <div class="form-group">
                <label for="contactPersonEmail">Kontaktpersonens email:</label>
                <input type="email" class="form-control" id="contact_email" value="<?php echo $items['contact_email']; ?>" name="company[contact_email]" required>
            </div>
            <hr>
            <div class="form-group">
                <?php if($items['image']): ?>
                    <img src=" <?php echo $path . "images/company/" . $items['name'] . "/tum_" . $items['image'] ?> " alt="">
                    <label for="deleteimg">Ta bort profilbild?</label>
                    <input id="deleteimg" type="checkbox" value="0" name="company[deleteimg]">

                <?php else: ?>
                    <p>Ingen profilbild uppladdad</p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="resume">Ladda upp profilbild</label>
                <input type="file" name="picture" accept="image/*" value="" placeholder="Ladda upp profilbild">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="form-group">
                <legend>Taggar</legend>
                <div class="checkbox">
                          <?php foreach ($companyTag->getAll() as $item) :
                            $tag = $companyTag->checkIfTagIsUsed($id, $item['id']);
                          ?>
                          <label class="checkbox-label">
                              <input type="checkbox" <?php if($tag){echo 'checked';} ?> value="<?php echo $item['id']; ?>" name="tag[<?php echo $item['id']; ?>]"> <?php echo $item['name']; ?>
                            </label>
                            <?php endforeach; ?>
                </div>
                <a style="margin-top:-25px;" class="btn btn-default" href="<?php echo $path; ?>manage-tags">Ny tagg</a>
            </div>
        </div>
        <div class="row">
            <button style="margin-bottom: 1em;" type="submit" class="btn btn-default"><?php echo $buttonText; ?></button>
        </div>
    </form>
</div>
</body>
</html>
