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



}


?>