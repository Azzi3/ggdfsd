    <form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
    <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
    <td colspan="2">
    <div align="center">
    <?php
    $remarks=$_GET['remarks'];
    if ($remarks==null and $remarks=="")
    {
    echo 'Register Here';
    }
    if ($remarks=='success')
    {
    echo 'Registration Success';
    }
    ?>	
    </div></td>
    </tr>
    <tr>
    <td width="95"><div align="right">Företag Namn:</div></td>
    <td width="171"><input type="text" name="company_name" /></td>
    </tr>
    <tr>
    <td><div align="right">Företag Adress:</div></td>
    <td><input type="text" name="company_address" /></td>
    </tr>
    <tr>
    <td><div align="right">Kontaktperson:</div></td>
    <td><input type="text" name="contact person" /></td>
    </tr>
    <tr>
    <td><div align="right">kontaktuppgifter:</div></td>
    <td><input type="text" name="contact information" /></td>
    </tr>
    <tr>
    <td><div align="right">Contact No.:</div></td>
    <td><input type="text" name="contact" /></td>
    </tr>
    <tr>
    <td><div align="right">Länk till webbsida:</div></td>
    <td><input type="text" name="pic" /></td>
    </tr>
    <tr>
    <td><div align="right">Kort beskrivning:</div></td>
    <td><input type="text" name="description" /></td>
    </tr>
    <tr>
    <td><div align="right">Tekniker (programmeringsspråk):</div></td>
    <td><input type="text" name="technique" /></td>
    </tr>
    <tr>
    <td><div align="right"></div></td>
    <td><input name="submit" type="submit" value="Submit" /></td>
    </tr>
    </table>
    </form>