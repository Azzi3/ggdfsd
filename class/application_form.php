<?php

class ApplicationForm extends Database{
	private $tbl = 'application_form';

	public function getAllWhereCompanyId($id){
		$str = " SELECT * FROM $this->tbl WHERE company_id= :id ";
		$arr = array('id'=>$id);

		return $this->select($str, $arr);
	}
	public function getAllWhereStudentGuid($guid){
		$str = " SELECT * FROM $this->tbl WHERE student_guid= :guid ";
		$arr = array('guid'=>$guid);

		return $this->select($str, $arr);
	}

}