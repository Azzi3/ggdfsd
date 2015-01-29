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

    <h1>Registrera ert företag</h1>

    <div class="table-responsive">

        <div class="container">
            <form>
                <div class="form-group">
                    <label for="companyPasswordNew">Nytt lösenord</label>
                    <input type="text" class="form-control" id="companyPassword" placeholder="Skriv nytt lösenord">
                </div>
                <div class="form-group">
                    <label for="companyPasswordNewRepeted">Repeterat lösenord</label>
                    <input type="text" class="form-control" id="companyComfirmdPassword" placeholder="Repetera valt lösenord">
                </div>



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
                    <label for="companyURL">Webbadress:</label>
                    <input type="url" class="form-control" id="companyURL" placeholder="Webbadress">
                </div>
                <div class="form-group">
                    <label for="companyDescription">Företagsbeskrivning:</label>
                    <input type="text" class="form-control" id="companyDescription" placeholder="Företagsbeskrivning">
                </div>
                <div class="form-group">
                    <label for="companyTags">Företagstaggar</label>
                    <select class="form-control" id="companyTags">
                        <option value="java">JAVA</option>
                        <option value="php">PHP</option>
                        <option value="mysql">MySQL</option>
                        <option value="css">CSS</option>
                    </select>
                </div>


            
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>
