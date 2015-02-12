<?php

class Student extends Database{

	private $tbl = 'user';

	public function getAll(){
		$str = " SELECT * FROM $this->tbl WHERE student != 0";
		return $this->selectAll($str);
	}

}

?>