<?php
session_start();
include('connection.php');
$companyName=$_POST['companyName'];
$companyAddress=$_POST['companyAddress'];
$companyEmail=$_POST['companyEmail'];
$linkToWebsite=$_POST['linkToWebsite'];
$shortDescription=$_POST['shortDescription'];
$contactPersonName=$_POST['contactPersonName'];
$contactPersonEmail=$_POST['contactPersonEmail'];
$companyZipCode=$_POST['companyZipCode'];
$username=$_POST['username'];
$password=$_POST['password'];

mysql_query("INSERT INTO member(companyName, companyAddress, companyEmail, linkToWebsite, shortDescription, contactPersonName, contactPersonEmail, companyZipCode. username, password)
	VALUES('$companyName', '$companyAddress', '$companyEmail', '$linkToWebsite', '$shortDescription', '$contactPersonName', $contactPersonEmail', $companyZipCode, '$username', '$password')");
    header("location: index.php?remarks=success");
    mysql_close($con);
    ?>