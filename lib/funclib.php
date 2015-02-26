<?php
/**
 * Functions library
 */


//Password function, create hash with salt (use email?).
//Will return new string (long).
function cryptPassword($pword, $salt){
	$newPassword = hash("SHA512", $pword.strtoupper($salt));
	return $newPassword;
}

//Redirect function
function redirect($toLink){
	header("location:".$toLink, FILTER_SANITIZE_URL);
	die();
}

function newLine($str){
	return str_replace("\n", '<br>', $str);
}

//Randomizer STRING
function randomStr($len = 10){
	$char = "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789-_";
	$charLen = strlen($char);
	$str = "";

	for ($i=0; $i < $len; $i++) { 
		$str .=$char[ rand(0, $charLen - 1) ];
	}

	return $str;
}

//Randomizer INT
function randomInt($len = 5){
	$char = "1234567890";
	$charLen = strlen($char);
	$str = "";

	for ($i=0; $i < $len; $i++) { 
		$str .=$char[ rand(0, $charLen - 1) ];
	}

	return $str;
}

?>