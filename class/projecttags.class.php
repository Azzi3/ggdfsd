<?php

class ProjectTag extends Database{

	private $tblTag = 'tag';
	private $tblProjectTag = 'project_tag';


	public function getAll(){
		$str = " SELECT * FROM $this->tblTag ";

		return $this->selectAll($str);
	}


	public function getAllFromProjectId($id){
		$str = " SELECT * FROM $this->tblProjectTag WHERE  project_id = :id ";
		$arr = array('id'=>$id);

		return $this->selectAll($str, $arr);
	}

	public function checkIfTagIsUsed($projectId, $tagId){
		$str = " SELECT * FROM $this->tblProjectTag WHERE project_id = :projectId AND tag_id = :tagId ";
		$arr = array('projectId'=>$projectId, 'tagId'=>$tagId);

		return $this->select($str, $arr);
	}


}


?>