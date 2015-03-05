<?php

class ApplicationForm extends Database{
	private $tbl = 'application_form';

	public function getAllWhereCompanyId($id){
		$str = " SELECT * FROM $this->tbl WHERE company_id= :id ";
		$arr = array('id'=>$id);

		return $this->selectAll($str, $arr);
	}
	public function getAllWhereStudentGuid($guid){
		$str = " SELECT * FROM $this->tbl WHERE student_guid= :guid ";
		$arr = array('guid'=>$guid);

		return $this->selectAll($str, $arr);
	}

	public function getAllWhereCourseId($id){
		$str = "SELECT * FROM $this->tbl WHERE course_id = :id";
		$arr = array('id' => $id);

		return $this->selectAll($str, $arr);
	}

	public function deleteApplication($id){
		$str = " DELETE FROM $this->tbl WHERE id= :id";
		$arr = array('id'=>$id);
		return $this->delete($str, $arr);
	}

}