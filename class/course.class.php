<?php 

class Course extends Database{

  private $tbl = 'course';
  private $tbl_tags = 'course_tag';

  public function getAll(){
    $str = " SELECT * FROM $this->tbl ";

    return $this->selectAll($str);

  }

    public function getFromId($id){
    $str = " SELECT * FROM $this->tbl WHERE id = :id ";
    $arr = array('id'=>$id);
    return $this->select($str, $arr);
  }

  public function create($item, $tags){

    $str = " INSERT INTO $this->tbl (name, description, course_start, course_end)
    VALUES(:name, :description, :course_start, :course_end) ";
    $arr = array('name'=>$item['name'],
          'description'=>$item['description'],
          'course_start'=>$item['course_start'],
          'course_end'=>$item['course_end']);

    $lastCourseId = $this->insert($str, $item);

    foreach ($tags as $value => $key) {

      $str = " INSERT INTO course_tag (course_id, tag_id)
      values(:courseId, :tagId) ";
      $arr = array('courseId' => $lastCourseId, 'tagId' => $key);

      $this->insert($str, $arr);
   }

  }

  public function updateCourse($item, $tags, $id){

    $str = " UPDATE $this->tbl SET name = :name,
    description = :description,
    course_start = :course_start,
    course_end = :course_end 
    WHERE id = :id ";


    $arr = array('name'=>$item['name'],
          'description'=>$item['description'],
          'course_start'=>$item['course_start'],
          'course_end'=>$item['course_end'],
          'id'=>$id);


    $this->update($str, $arr);

    $str = " DELETE FROM course_tag WHERE course_id = :courseId ";
    $arr = array('courseId'=>$id);
    $this->delete($str, $arr);

    foreach ($tags as $key) {
      
      $str = " INSERT INTO course_tag (course_id, tag_id)
      values(:courseId, :tagId) ";
      $arr = array('courseId' => $id, 'tagId'=>$key);

      $this->insert($str, $arr);
    }
  }
  
  public function deleteCourseAndTag($id){
    // ta bort mellantabell rader 
    // ta bort tagger med projekt 
    
    $str = " DELETE FROM $this->tbl_tags WHERE course_id = :id ";
    $arr = array('id'=>$id);
    $this->delete($str, $arr);    
    
    $str = "DELETE FROM $this->tbl WHERE id = :id";
    $arr = array('id'=>$id);
    $this->delete($str, $arr);    
  }

  public function getTags($id) {

    $str = " SELECT *
        FROM course_tag
          INNER JOIN course
            ON course_tag.course_id = course.id
          INNER JOIN tag
            ON course_tag.tag_id = tag.id
        WHERE course.id = :id ";

    $arr = array('id' => $id);

    return $this->selectAll($str, $arr);
  }
}