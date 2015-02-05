<?php

class Company extends Database{

	private $tbl = 'company';


	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";

		return $this->selectAll($str);

	}



	public function save($items = array()) {
		// Förbereder mysql kommando
		$str = " UPDATE $this->tbl SET name=:name,
			street_address=:street_address,
			zip_code=:zip_code,
			city=:city,
			website_url=:website_url,
			description=:description
			WHERE id = :id";
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




	public function deleteCompany($id){
		$str = " DELETE FROM $this->tbl WHERE id = :id ";
		$arr = array('id'=>$id);

		$this->delete($str, $arr);		
	}


	public function getTags($id) {

		$str = " SELECT *
				FROM company_tag
				  INNER JOIN company
				    ON company_tag.company_id = company.id
				  INNER JOIN tag
				    ON company_tag.tag_id = tag.id
				WHERE company.id = :id ";

		$arr = array('id' => $id);

		return $this->selectAll($str, $arr);
	}


}
?>