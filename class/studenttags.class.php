<?php

class StudentTag extends Database{

	private $tblTag = 'tag';
	private $tblStudentTag = 'student_tag';


	public function getAll(){
		$str = " SELECT * FROM $this->tblTag ";

		return $this->selectAll($str);
	}


	public function getAllFromStudentId($id){
		$str = " SELECT * FROM $this->tblStudentTag WHERE  user_id = :id ";
		$arr = array('id'=>$id);

		return $this->selectAll($str, $arr);
	}

	public function checkIfTagIsUsed($userId, $tagId){
		$str = " SELECT * FROM $this->tblStudentTag WHERE user_id = :userId AND tag_id = :tagId ";
		$arr = array('userId'=>$userId, 'tagId'=>$tagId);

		return $this->select($str, $arr);
	}


}


?>