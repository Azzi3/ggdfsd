<?php 

class Applicant extends Database{
  private $tbl = 'project_applicant';

  public function getApplicantWithId($id){
    $str = " SELECT * FROM $this->tbl WHERE id = :id";
    $arr = array('id' => $id);

    return $this->select($str, $arr);
  }
}