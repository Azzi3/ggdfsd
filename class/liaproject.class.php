<?php

class LiaProject extends Database{

	private $tbl = 'lia_project';



	public function save($items = array()) {
		// Förbereder mysql kommando
		$str = " UPDATE $this->tbl SET name=:name,
			description=:description,
			spots=:spots,
			company=:company,
			estimated_time=:estimated_time
			WHERE id=:id");
		// Exekverar mysql kommando
		/*$statement->execute(array('id' => $this->id,
		'name' => $this->name,
		'description' => $this->description,
		'spots' => $this->spots,
		'company' => $this->company,
		'estimated_time' => $this->estimated_time
		));*/

		$this->update($str, $items);
	}




	public function delete($id){
		$str = " DELETE FROM $this->tbl WHERE id = :id ";
		$arr = array('id'=>$id);

		$this->delete($str, $arr);		
	}





	public function getTags($id) {

		$str = " SELECT tags.name FROM $this->tbl INNER JOIN project_tags ON
		tags.id = project_tags.tag_id
		INNER JOIN $this->tbl
		ON project_tags.project_id = lia_projects.id
		WHERE lia_projects.id = :id ");

		$arr = array('id' => $id);

		return $this->selectAll($str, $arr);
	}


}
?>