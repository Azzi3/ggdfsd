<?php 

class Tag extends Database{

  private $tbl = 'tag';
  private $tblCourseTag = 'course_tag';
  private $tblProjectTag = 'project_tag';
  private $tblStudentTag = 'student_tag';
  private $tblCompanyTag = 'company_tag';

  public function getAll(){
    $str = " SELECT * FROM $this->tbl ORDER BY name ASC ";

    return $this->selectAll($str);
  }

  public function getFromId($id){
    $str = " SELECT * FROM $this->tbl WHERE id = :id ";
    $arr = array('id'=>$id);
    return $this->select($str, $arr);
  }

  public function create($newTag){

    $str = " INSERT INTO $this->tbl (name)
    VALUES(:name) ";

    $arr = array('name'=>$newTag,
      );

    $this->insert($str, $arr);

  }

  public function getByName($name){
    $str = " SELECT * FROM $this->tbl WHERE name = :name ";
    $arr = array('name'=>$name);

    return $this->select($str, $arr);
  }

  public function deleteTag($id){
    $str = "DELETE FROM $this->tbl WHERE id = :id ";
    $arr = array(
      'id'=>$id
    );
    $this->delete($str, $arr);
  }

  public function findTagUsage($id, $tableName){
    $str = " SELECT * FROM $tableName WHERE tag_id = :id ";
    $arr = array('id'=>$id);
    return $this->select($str, $arr);
  }

}
