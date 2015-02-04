<?php
/**
 * Functions library
 */


//Redirect function
function redirect($toLink){
	header("location:".$toLink, FILTER_SANITIZE_URL);
	die();
}

?>