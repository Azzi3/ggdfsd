<?php


class Group extends Database{

	private $tbl = 'groups';


	public function createGroup($item = array()){
		$str = " INSERT INTO $this->tbl (name, student, company, user_id)
		VALUES (:name, :student, :company, :user) ";
		$arr = array('name'=>$item['name'],
					'student'=>$item['student'],
					'company'=>$item['company'],
					'user'=>$item['userId']);

		$this->insert($str, $arr);
	}

	public function updateGroup($item = array()){
		$str = " UPDATE $this->tbl SET name = :name, student = :student, company = :company WHERE group_id = :groupId ";
		$arr = array('name'=>$item['name'],
					'student'=>$item['student'],
					'company'=>$item['company'],
					'groupId'=>$item['groupId']);

		$this->update($str, $arr);
	}

	public function getGroupById($groupId, $userId){
		$str = " SELECT * FROM $this->tbl WHERE group_id = :groupId AND user_id = :userId";
		$arr = array('groupId'=>$groupId, 'userId'=>$userId);

		return $this->select($str, $arr);
	}

	public function getAllGroups($userId = 0){

		$str = " SELECT * FROM $this->tbl WHERE user_id = :userId ORDER BY name ASC ";
		$arr = array('userId'=>$userId);

		return $this->selectAll($str, $arr);

	}

	public function removeGroup($groupId, $userId){
		$str = " DELETE FROM $this->tbl WHERE user_id = :userId AND group_id = :groupId ";
		$arr = array('userId'=>$userId,
					'groupId'=>$groupId);

		$this->delete($str, $arr);

	}

}


?>