<?php

class ProjectTag extends Database{

	private $tbl = 'tag';


	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";

		return $this->selectAll($str);
	}



}


?>