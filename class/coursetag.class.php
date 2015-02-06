<?php 

class CourseTag extends Database{

  private $tblTag = 'tag';
  private $tblCourseTag = 'course_tag';


  public function getAll(){
    $str = " SELECT * FROM $this->tblTag ";

    return $this->selectAll($str);
  }


  public function getAllFromCourseId($id){
    $str = " SELECT * FROM $this->tblCourseTag WHERE  course_id = :id ";
    $arr = array('id'=>$id);

    return $this->selectAll($str, $arr);
  }

  public function checkIfTagIsUsed($courseId, $tagId){
    $str = " SELECT * FROM $this->tblCourseTag WHERE course_id = :courseId AND tag_id = :tagId ";
    $arr = array('courseId'=>$courseId, 'tagId'=>$tagId);

    return $this->select($str, $arr);
  }

}
