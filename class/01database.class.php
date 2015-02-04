<?php
/**
 * 	Database class, handle all request with PDO
 */
class Database{

	private $conn;

	public function __construct(){
	    try{
	    	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USERNAME, DB_PASSWORD);
	    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	$this->conn = $conn;
	    }
	    catch(PDOException $e) {
	    	echo str_replace(DB_PASSWORD, ' *************** ' , $e);
	    	die();
	    }
	}

//When done with connection to database, set conn to null.
public function __destruct() {
  $this->conn = null;
}

	//Delete function
	public function delete($sqlStr, $execArray = array()){

		$str = $this->conn->prepare($sqlStr);
		$str->execute($execArray);
	}

	//Insert function
	public function insert($sqlStr, $execArray = array()){

		$str = $this->conn->prepare($sqlStr);
		$str->execute($execArray);
		return $this->conn->lastInsertId();
	}

	//Update function
	public function update($sqlStr, $execArray = array()){

		$str = $this->conn->prepare($sqlStr);
		$str->execute($execArray);
	}

	//Select function
	//will return array
	public function select($sqlStr, $execArray = array()){

		$str = $this->conn->prepare($sqlStr);
		$str->execute($execArray);
		$result = $str->fetch();

		return $result;
	}

	//SelectALL function
	//will return array of arrays
	public function selectAll($sqlStr, $execArray = array()){

		$str = $this->conn->prepare($sqlStr);
		$str->execute($execArray);
		$result = $str->fetchAll();

		return $result;
	}

}


?>