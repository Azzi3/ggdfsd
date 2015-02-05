<?php

class CompanyTag extends Database{

	private $tblTag = 'tag';
	private $tblCompanyTag = 'company_tag';


	public function getAll(){
		$str = " SELECT * FROM $this->tblTag ";

		return $this->selectAll($str);
	}


	public function getAllFromCompanyId($id){
		$str = " SELECT * FROM $this->tblCompanyTag WHERE  company_id = :id ";
		$arr = array('id'=>$id);

		return $this->selectAll($str, $arr);
	}

	public function checkIfTagIsUsed($companyId, $tagId){
		$str = " SELECT * FROM $this->tblCompanyTag WHERE company_id = :companyId AND tag_id = :tagId ";
		$arr = array('companyId'=>$companyId, 'tagId'=>$tagId);

		return $this->select($str, $arr);
	}


}


?>