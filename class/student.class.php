<?php

class Student extends Database{

	private $tbl = 'user';

	public function getAll(){
		$str = " SELECT * FROM $this->tbl WHERE student != 0";
		return $this->selectAll($str);
	}

		public function searchResult($string){

		$str = " SELECT * FROM $this->tbl WHERE
		(firstname LIKE :string AND student != 0)
		OR (lastname LIKE :string AND student != 0)
		OR (email LIKE :string AND student != 0) ";

		$arr = array('string' => "%".$string."%");

		return $this->selectAll($str, $arr);

	}

}

?>