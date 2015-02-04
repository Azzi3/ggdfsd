<?php

class LiaProject extends Database{

	private $tbl = 'lia_project';


	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";

		return $this->selectAll($str);

	}

	public function create($item, $tags){

		$str = " INSERT INTO $this->tbl (name, description, spots, company, estimated_time)
		VALUES(:name, :description, :spots, :company, :estimated_time) ";
		$arr = array('name'=>$item['name'],
					'description'=>$item['description'],
					'spots'=>$item['spots'],
					'company'=>$item['company'],
					'estimated_time'=>$item['estimated_time']);

		$lastProjectId = $this->insert($str, $item);

		foreach ($tags as $value => $key) {

			$str = " INSERT INTO project_tags (project_id, tag_id)
			values(:projectId, :tagId) ";
			$arr = array('projectId' => $lastProjectId, 'tagId'=>$key);

			$this->insert($str, $arr);
		}

	}

	public function save($items = array()) {
		// Förbereder mysql kommando
		$str = " UPDATE $this->tbl SET name=:name,
			description=:description,
			spots=:spots,
			company=:company,
			estimated_time=:estimated_time
			WHERE id = :id";

		$this->update($str, $items);
	}




	public function delete($id){
		$str = " DELETE FROM $this->tbl WHERE id = :id ";
		$arr = array('id'=>$id);

		$this->delete($str, $arr);		
	}





	public function getTags($id) {

		$str = " SELECT *
				FROM project_tag
				  INNER JOIN lia_project
				    ON project_tag.project_id = lia_project.id
				  INNER JOIN tag
				    ON project_tag.tag_id = tag.id
				WHERE lia_project.id = :id ";

		$arr = array('id' => $id);

		return $this->selectAll($str, $arr);
	}


}
?>