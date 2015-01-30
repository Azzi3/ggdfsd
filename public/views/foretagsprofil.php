<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
    <style type="text/css">
    label {
        
    }
    legend {
 
    }
    </style>
</head>
<body>

    <?php require_once '../../partials/project-header.php'; ?>

    <h1>Hantera företagsprofil</h1>

    <div class="table-responsive">

        <div class="container">
            <form>
                <!-- <div class="form-group">
                    <label for="companyChangedPassword">Ändra lösenord</label>
                    <input type="text" class="form-control" id="companyPassword" placeholder="Skriv nytt lösenord">
                </div>
                <div class="form-group">
                    <label for="companyConfirmPassword">Bekräfta lösenord</label>
                    <input type="text" class="form-control" id="companyComfirmdPassword" placeholder="Bekräfta lösenord">
                </div> -->

                <legend>Kontaktperson</legend>
                <div class="form-group">
                    <label for="contactPersonName">Namn:</label>
                    <input type="text" class="form-control" id="contactPersonName" placeholder="Kontaktperson">
                </div>
                <div class="form-group">
                    <label for="contactPersonTel">Telefonnummer:</label>
                    <input type="tel" class="form-control" id="contactPersonTel" placeholder="Kontaktpersons telefonnummer">
                </div>
                <div class="form-group">
                    <label for="contactPersonEmail">E-post:</label>
                    <input type="email" class="form-control" id="contactPersonEmail" placeholder="Kontaktpersons e-post">
                </div>

                <legend>Företagsinfo</legend>
                <div class="form-group">
                    <label for="companyName">Företagsnamn</label>
                    <input type="text" class="form-control" id="companyName" placeholder="Företagsnamn">
                </div>
                <div class="form-group">
                    <label for="companyAddress">Gatuadress</label>
                    <input type="text" class="form-control" id="companyAddress" placeholder="Gatuadress">
                </div>
                <div class="form-group">
                    <label for="companyZipCode">Postnummer</label>
                    <input type="number" class="form-control" id="companyZipCode" placeholder="Postnummer">
                </div>
                <div class="form-group">
                    <label for="companyCity">Postort</label>
                    <input type="text" class="form-control" id="companyCity" placeholder="Postort">
                </div>

                <div class="form-group">
                    <label for="companyURL">Webbadress:</label>
                    <input type="url" class="form-control" id="companyURL" placeholder="Webbadress">
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
