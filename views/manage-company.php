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
if(isset($_GET['id'])){
    if($_GET['id'] != $signedUser['company_id']) { die("No access"); }
}

if(isset($_POST['company'])){
    $company = $_POST['company'];
    if (isset($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        $errors = array();
        $maxsize = 2097152;
        $acceptable = array(
            'JPEG',
            'JPG',
            'GIF',
            'PNG' ,
            'jpeg',
            'jpg',
            'gif',
            'png'
        );
        $ext = pathinfo($image, PATHINFO_EXTENSION);

        if(($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
            $errors[] = 'File too large. File must be less than 2 megabytes.';
        }

        if(!in_array($ext,$acceptable)) {
            $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
        }

        if(count($errors) > 0){
            $session->setSession('error',$errors);
            redirect(PATH.'manage-company/');
        } else {
            $companyName = $company['name'];
            $imageDirectory = ROOT_PATH . '/images/' . $companyName;
            //CHECKS IF THERE IS A DIRECTORY (IF THE COMPANY HAS AN IMAGE ALREADY)
            if(!is_dir($imageDirectory)){
                //SETS UP THE NEW FILE DIRECTORY & UPLOADS THE IMAGE
                $fileTmp = $_FILES['image']['tmp_name'];
                $newDir = mkdir(ROOT_PATH . '/images/' . $companyName .'/');
                $path = ROOT_PATH . '/images/' . $companyName .'/';
                move_uploaded_file($fileTmp, $path.$image);
                $session->killSession('error');
            } else {
                //DELETES ALL FILES IN THE IMAGE DIRECTORY 
                $path = $imageDirectory . '/*';
                $files = glob($path);
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }
                //UPLOADS THE NEW IMAGE
                $fileTmp = $_FILES['image']['tmp_name'];
                $path = ROOT_PATH . '/images/' . $companyName .'/';
                move_uploaded_file($fileTmp, $path.$image);
                $session->killSession('error');
            }
        }
  
    }

    if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }
    if($id > 0){
        $newCompany->updateCompany($company, $tags, $id, $image);
    }
    else{
        $newCompany->createCompanyAndContact($company, $tags, $image);
    }

    redirect(PATH.'company-list/');

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
            <form class="col-md-4" method="POST" action="" enctype="multipart/form-data">
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
                    <input type="number" class="form-control" value="<?php echo $items['zip_code'] ?>" id="zip_code" name="company[zip_code]">
                </div>
                <div class="form-group">
                    <label for="companyCity">Postort</label>
                    <input type="text" class="form-control" id="city" value="<?php echo $items['city'] ?>" name="company[city]" required>
                </div>

                <div class="form-group">
                    <label for="companyURL">Webbadress:</label>
                    <input type="text" class="form-control" id="website_url" value="<?php echo $items['website_url'] ?>" name="company[website_url]">
                </div>
                <div class="form-group">
                    <label for="companyDescription">Företagsbeskrivning:</label>
                    <textarea id="description" class="form-control" rows="3" name="company[description]"><?php echo $items['description'] ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <img src="<?php echo '/images/' . $items['name'] .'/' . $items['image']; ?>" alt=""/>
                    <label for="companyDescription">Bild:</label>
                    <input type="file" id="image" class="form-control" rows="3" name="image" accepted="image/jpeg, image/jpg, image/gif, image/png">
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
