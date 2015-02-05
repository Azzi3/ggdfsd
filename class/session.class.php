<?php

class Session
{

	public function setSession($name, $value){
		$_SESSION[$name] = $value;
	}

	public function killSession($name){
		unset($_SESSION[$name]);
	}

	public function getSession($name){
		if(isset($_SESSION[$name]))
			return $_SESSION[$name];
		else
			return false;
	}

	public function killAll(){
		session_destroy();
	}

}


?>