<?php

class Student extends Database{

	private $tbl = 'user';

	public function getAll(){
		$str = " SELECT * FROM $this->tbl WHERE student != 0";
		return $this->selectAll($str);
	}
	public function getAllWithoutGroup(){
		$str = " SELECT * FROM $this->tbl WHERE student != 0 AND group_id is null";
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

	public function getAllFromGroup($groupId){

		$str = " SELECT * FROM $this->tbl WHERE group_id = :groupId ";
		$arr = array('groupId'=>$groupId);

		return $this->selectAll($str, $arr);

	}

}

?>