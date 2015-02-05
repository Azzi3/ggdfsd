<?php

class Company extends Database{

	private $tbl = 'company';
	private $tbl_contact = 'contact_person';

	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";

		return $this->selectAll($str);

	}

	public function createCompanyAndContact($item, $tags){

		$str = " INSERT INTO $this->tbl_contact (name, email, phone)
		VALUES(:contact_name, :contact_email, :contact_phone) ";

		$arr = array('contact_name'=>$item['contact_name'],
					'contact_email'=>$item['contact_email'],
					'contact_phone'=>$item['contact_phone']);

		$lastContactId = $this->insert($str, $arr);	

		$str = " INSERT INTO $this->tbl (name, street_address, zip_code, city, website_url, description, id_contact_person)
		VALUES(:name, :street_address, :zip_code, :city, :website_url, :description, :id_contact_person) ";
		$arr = array('name'=>$item['name'],
					'street_address'=>$item['street_address'],
					'zip_code'=>$item['zip_code'],
					'city'=>$item['city'],
					'website_url'=>$item['website_url'],
					'description'=>$item['description'],
					'id_contact_person'=>$lastContactId);
		
		$lastCompanyId = $this->insert($str, $arr);

		foreach ($tags as $value => $key) {

			$str = " INSERT INTO $this->tbl_tags (company_id, tag_id)
			VALUES(:companyId, :tagId) ";
			$arr = array('companyId' => $lastCompanyId, 'tagId'=>$key);

			$this->insert($str, $arr);
		}

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




	public function deleteCompanyAndTag($id){
			// ta bort mellantabell rader 
		// ta bort tagger med projekt 
		$str = " DELETE FROM $this->tbl_tags WHERE company_id = :id ";
		$arr = array('id'=>$id);
		$this->delete($str, $arr);		
		$str = "DELETE FROM $this->tbl WHERE id = :id";
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