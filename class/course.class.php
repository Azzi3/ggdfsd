<?php 

class Course extends Database{

  private $tbl = 'course';

  public function getAll(){
    $str = " SELECT * FROM $this->tbl ";

    return $this->selectAll($str);

  }

}