<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
</head>
<body>
<form action="">
    <div class="form-group">
    <fieldset>
        <label>Namn <input type="text"/></label>
        <fieldset>
            <legend>Företagsadress</legend>
            <label>Gatuadress<input type="text"/></label>
            <label>Postnummer <input type="number"/></label>
            <label>Postort <input type="text"/></label>
        </fieldset>
        <fieldset>
            <legend>Kontaktperson</legend>
            <label for="namn">Namn</label><input id="namn" type="text"/>
            <label for="phone">Telefonnummer</label><input id="phone" type="tel"/>
            <label>E-post<input type="email"/></label>
        </fieldset>
        <label>Webbadress <input type="url"/></label>
        <label>Företagsbeskrivning <input type="text"/></label>
        <label>Tekniker</label>
    </fieldset>
        </div>
</form>
</body>
</html>
<?php echo '<p>Hello Mother Duckers</p>'; ?>
