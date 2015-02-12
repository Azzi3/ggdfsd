<?php

class Key extends Database{


	public $tbl = 'secret_key';

	public function createKey($keyValue, $type){

		if($type=='student'){
			$student = 1;
			$company = 0;
		}else{
			$student = 0;
			$company = 1;
		}

		$str = " INSERT INTO $this->tbl (key_value, student, company)
		VALUES(:keyValue, :student, :company) ";

		$arr = array('keyValue'=>$keyValue,
			'student'=>$student,
			'company'=>$company);

		$this->insert($str, $arr);

	}

	public function checkValidKey($key){
		$str = " SELECT * FROM $this->tbl WHERE key_value = :key ";
		$arr = array('key'=>$key);

		$result = $this->select($str, $arr);

		if($result){
			return $result;
		}

		return false;
	}

	public function removeKey($key){
		$str = " DELETE FROM $this->tbl WHERE key_value = :key ";
		$arr = array('key'=>$key);

		$this->delete($str, $arr);
	}



}


?>