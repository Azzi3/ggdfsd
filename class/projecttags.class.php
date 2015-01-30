<?php

class ProjectTag extends Database{

	private $tbl = 'tag';


	public function save($items = array()) {
	$str = " UPDATE $this->tbl SET name=:name,
		description=:description,
		spots=:spots,
		company=:company,
		estimated_time=:estimated_time
		WHERE id=:id";
	// Exekverar mysql kommando
	/*$arr = array('id' => $items['id'], 
		'name' => $items['name'],
		'description' => $items['description'],
		'spots' => $items['spots'],
		'company' => $this->company,
		'estimated_time' => $this->estimated_time
		));*/

		$this->update($str, $items);
	}

}


?>