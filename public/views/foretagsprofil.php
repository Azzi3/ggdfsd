<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
    <style type="text/css">
    label {
        display: none;
    }
    </style>
</head>
<body>

<form role="form">

    <fieldset class="form-group">

        <legend>Företagsnamn</legend>

        <label for="companyName">Företagsnamn:</label>
        <input type="text" class="form-control" id="companyName" placeholder="Företagsnamn">
    </fieldset>

    <fieldset class="form-group">

        <legend>Företagsadress</legend>

        <label for="companyAddress">Gatuadress</label>
        <input type="text" class="form-control" id="companyAddress" placeholder="Gatuadress">

        <label for="companyZipCode">Postnummer</label>
        <input type="number" class="form-control" id="companyZipCode" placeholder="Postnummer">

        <label for="companyCity">Postort</label>
        <input type="text" class="form-control" id="companyCity" placeholder="Postort">
    
    </fieldset>

    <fieldset class="form-group">

        <legend>Kontaktperson</legend>

        <label for="contactPersonName">Namn:</label>
        <input type="text" class="form-control" id="contactPersonName" placeholder="Namn">

        <label for="contactPersonTel">Telefonnummer:</label>
        <input type="tel" class="form-control" id="contactPersonTel" placeholder="Telefonnummer">

        <label for="contactPersonEmail">E-post:</label>
        <input type="email" class="form-control" id="contactPersonEmail" placeholder="E-post">

    </fieldset>

    <fieldset class="form-group">

        <legend>Företagsinfo</legend>

        <label for="companyURL">Webbadress:</label>
        <input type="url" class="form-control" id="companyURL" placeholder="Webbadress">

        <label for="companyDescription">Företagsbeskrivning:</label>
        <input type="text" class="form-control" id="companyDescription" placeholder="Företagsbeskrivning">

        <label for="companyTags">Företagstaggar</label>
        <select class="form-control" id="companyTags">
            <option value="java">JAVA</option>
            <option value="php">PHP</option>
            <option value="mysql">MySQL</option>
            <option value="css">CSS</option>
        </select>

    </fieldset>
    
    <button type="submit" class="btn btn-default">Submit</button>
</form>



</body>
</html>
<?php echo '<p>Hello Mother Duckers</p>'; ?>
