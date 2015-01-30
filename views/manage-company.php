<div class="container">
    <div class="jumbotron">

        <h1>Hantera företagsprofil!</h1>
        <a class="btn btn-primary" href="<?php echo $path; ?>" role="button">Startsida</a>
        <a class="btn btn-primary" href="<?php echo $path; ?>company-list" role="button">Visa företag</a>

    </div>
</div>

    <div class="table-responsive">

        <div class="container">
            <form class="col-md-4">
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
                    <input type="text" class="form-control" id="contactPersonName">
                </div>
                <div class="form-group">
                    <label for="contactPersonTel">Telefonnummer:</label>
                    <input type="tel" class="form-control" id="contactPersonTel">
                </div>
                <div class="form-group">
                    <label for="contactPersonEmail">E-post:</label>
                    <input type="email" class="form-control" id="contactPersonEmail">
                </div>

                <legend>Företagsinfo</legend>
                <div class="form-group">
                    <label for="companyName">Företagsnamn</label>
                    <input type="text" class="form-control" id="companyName">
                </div>
                <div class="form-group">
                    <label for="companyAddress">Gatuadress</label>
                    <input type="text" class="form-control" id="companyAddress">
                </div>
                <div class="form-group">
                    <label for="companyZipCode">Postnummer</label>
                    <input type="number" class="form-control" id="companyZipCode">
                </div>
                <div class="form-group">
                    <label for="companyCity">Postort</label>
                    <input type="text" class="form-control" id="companyCity">
                </div>

                <div class="form-group">
                    <label for="companyURL">Webbadress:</label>
                    <input type="url" class="form-control" id="companyURL">
                </div>
                <div class="form-group">
                    <label for="companyDescription">Företagsbeskrivning:</label>
                    <textarea id="companyDescription" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="companyTags">Företagstaggar</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags" value="JAVA">JAVA
                    </label>
                </div>
                    
                </div>

                <button type="submit" class="btn btn-default">Spara</button>
            </form>
        </div>
    </div>

</body>
</html>
