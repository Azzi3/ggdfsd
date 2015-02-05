<?php 

class Course extends Database{

  private $tbl = 'course';

  public function getAll(){
    $str = " SELECT * FROM $this->tbl ";

    return $this->selectAll($str);

  }

    public function getFromId($id){
    $str = " SELECT * FROM $this->tbl WHERE id = :id ";
    $arr = array('id'=>$id);
    return $this->select($str, $arr);
  }

  public function create($item){

    $str = " INSERT INTO $this->tbl (name, description, course_start, course_end)
    VALUES(:name, :description, :course_start, :course_end) ";
    $arr = array('name'=>$item['name'],
          'description'=>$item['description'],
          'course_start'=>$item['course_start'],
          'course_end'=>$item['course_end']);

    // $lastCourseId = $this->insert($str, $item);

    // foreach ($tags as $value => $key) {

    //   $str = " INSERT INTO project_tag (project_id, tag_id)
    //   values(:projectId, :tagId) ";
    //   $arr = array('projectId' => $lastProjectId, 'tagId'=>$key);

          $this->insert($str, $arr);
    // }

  }

  // public function updateProject($item, $tags, $id){

  //   $str = " UPDATE $this->tbl SET name = :name,
  //   description = :description,
  //   spots = :spots,
  //   company = :company,
  //   estimated_time = :estimated_time 
  //   WHERE id = :id ";


  //   $arr = array('name'=>$item['name'],
  //         'description'=>$item['description'],
  //         'spots'=>$item['spots'],
  //         'company'=>$item['company'],
  //         'estimated_time'=>$item['estimated_time'],
  //         'id'=>$id);


  //   $this->update($str, $arr);

  //   $str = " DELETE FROM project_tag WHERE project_id = :projectId ";
  //   $arr = array('projectId'=>$id);
  //   $this->delete($str, $arr);

  //   foreach ($tags as $key) {
      
  //     $str = " INSERT INTO project_tag (project_id, tag_id)
  //     values(:projectId, :tagId) ";
  //     $arr = array('projectId' => $id, 'tagId'=>$key);

  //     $this->insert($str, $arr);
  //   }
  // }

  // public function save($items = array()) {
  //   // Förbereder mysql kommando
  //   $str = " UPDATE $this->tbl SET name=:name,
  //     description=:description,
  //     spots=:spots,
  //     company=:company,
  //     estimated_time=:estimated_time
  //     WHERE id = :id";

  //   $this->update($str, $items);
  // }




  // public function deleteProjectAndTag($id){
  //   // ta bort mellantabell rader 
  //   // ta bort tagger med projekt 
  //   $str = " DELETE FROM $this->tbl_tags WHERE project_id = :id ";
  //   $arr = array('id'=>$id);
  //   $this->delete($str, $arr);    
  //   $str = "DELETE FROM $this->tbl WHERE id = :id";
  //    $arr = array('id'=>$id);
  //   $this->delete($str, $arr);    
  // }





  // public function getTags($id) {

  //   $str = " SELECT *
  //       FROM project_tag
  //         INNER JOIN lia_project
  //           ON project_tag.project_id = lia_project.id
  //         INNER JOIN tag
  //           ON project_tag.tag_id = tag.id
  //       WHERE lia_project.id = :id ";

  //   $arr = array('id' => $id);

  //   return $this->selectAll($str, $arr);
  // }
}