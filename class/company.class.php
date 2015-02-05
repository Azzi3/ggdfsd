<?php

class Company extends Database{

	private $tbl = 'company';
	private $tbl_contact = 'contact_person';


	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";

		return $this->selectAll($str);

	}

	public function createCompanyAndContact($item){

		$str = " INSERT INTO $this->tbl_contact (contact_name, contact_email, contact_phone)
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
		
		$this->insert($str, $arr);


		/*foreach ($tags as $value => $key) {

			$str = " INSERT INTO project_tags (project_id, tag_id)
			values(:projectId, :tagId) ";
			$arr = array('projectId' => $lastProjectId, 'tagId'=>$key);

			$this->insert($str, $arr);
		}*/

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