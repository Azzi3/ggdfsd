<?php

class ProjectTag extends Database{

	private $tbl = 'tags';


	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";

		return $this->selectAll($str);
	}



}


?>