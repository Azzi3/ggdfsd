<?php 

class Tag extends Database{

  private $tbl = 'tag';

  public function getAll(){
    $str = " SELECT * FROM $this->tbl ";

    return $this->selectAll($str);
  }

  public function create($newTag){

    $str = " INSERT INTO $this->tbl (name)
    VALUES(:name) ";

    $arr = array('name'=>$newTag,
      );

    $this->insert($str, $arr);

  }

}
