<?php
//ROOT PATH
define("ROOT_PATH", dirname(__FILE__));

//PUTTING THE FUCTION DATE INTO A VARIABLE
$showdate = date('l jS F');	

//Models
require_once 'models/base-model.php';
require_once 'models/LiaProject.php';

//SETUP FOR PDO DB CONNECTION
$user = 'root';
$pass = '';
$db = new PDO( 'mysql:host=localhost;dbname=lia-projekt', $user, $pass );

BaseModel::setDbh($db);
?>