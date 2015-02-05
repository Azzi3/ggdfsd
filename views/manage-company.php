<?php

if(isset($_POST['company'])){
    $company = $_POST['company'];

    /*if(isset($_POST['tag'])){
        $tags = $_POST['tag'];
    }else{
        $tags = array();
    }*/

    $newCompany = new Company();
    $newCompany->createCompanyAndContact($company);

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
                <!-- <div class="form-group">
                    <label for="companyChangedPassword">Ändra lösenord</label>
                    <input type="text" class="form-control" id="companyPassword">
                </div>
                <div class="form-group">
                    <label for="companyConfirmPassword">Bekräfta lösenord</label>
                    <input type="text" class="form-control" id="companyComfirmdPassword">
                </div> -->
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
                    <label for="companyTags">Företagstaggar</label>
                <!--<div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags" value="JAVA">JAVA
                    </label>
                </div>-->
                    
                </div>

                <button type="submit" class="btn btn-default">Spara</button>
            </form>
        </div>
    </div>

</body>
</html>
