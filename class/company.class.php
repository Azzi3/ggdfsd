<?php

class Company extends Database{

	private $tbl = 'company';
	private $tbl_tags = 'company_tag';
	private $tbl_contact = 'contact_person';

	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";

		return $this->selectAll($str);

	}
	public function getAllWithoutGroup(){
		$str = " SELECT * FROM $this->tbl WHERE group_id = 0 ";

		return $this->selectAll($str);

	}

	public function getFromId($id){
		$str = " SELECT * FROM $this->tbl WHERE id = :id ";
		$arr = array('id'=>$id);
		return $this->select($str, $arr);
	}

	public function getFromCompanyEmail($email){
		$str = " SELECT * FROM $this->tbl WHERE company_email = :email ";
		$arr = array('email'=>$email);
		return $this->select($str, $arr);
	}

	public function getCompanyFromGroup($groupId){
		$str = " SELECT * FROM $this->tbl WHERE group_id = :groupId ";
		$arr = array('groupId'=>$groupId);
		return $this->selectAll($str, $arr);
	}

	public function updateGroup($email, $groupId){
		$str = " UPDATE $this->tbl SET group_id = :groupId WHERE company_email = :email ";
		$arr = array('groupId'=>$groupId, 'email'=>$email);

		$this->update($str, $arr);
	}

	public function searchResult($string){

		$str = " SELECT * FROM $this->tbl WHERE
		name LIKE :string
		OR contact_name LIKE :string
		OR description LIKE :string
		OR city LIKE :string ";

		$arr = array('string' => "%".$string."%");

		return $this->selectAll($str, $arr);

	}


	public function createCompanyAndContact($item, $tags, $image){


		$str = " INSERT INTO $this->tbl (name,
			street_address,
			zip_code,
			city,
			website_url,
			description,
			image,
			contact_phone,
			contact_email,
			contact_name,
			company_email)
		VALUES(:name,
			:street_address,
			:zip_code,
			:city,
			:website_url,
			:description,
			:image,
			:contact_phone,
			:contact_email,
			:contact_name,
			:company_email) ";
		$arr = array('name'=>$item['name'],
					'street_address'=>$item['street_address'],
					'zip_code'=>$item['zip_code'],
					'city'=>$item['city'],
					'website_url'=>$item['website_url'],
					'description'=>$item['description'],
					'image'=>$image,
					'contact_phone'=>$item['contact_phone'],
					'contact_email'=>$item['contact_email'],
					'contact_name'=>$item['contact_name'],
					'company_email'=>$item['company_email']);

		$lastCompanyId = $this->insert($str, $arr);

		foreach ($tags as $value => $key) {

			$str = " INSERT INTO $this->tbl_tags (company_id, tag_id)
			VALUES(:companyId, :tagId) ";
			$arr = array('companyId' => $lastCompanyId, 'tagId'=>$key);

			$this->insert($str, $arr);
		}

		return $lastCompanyId;

	}

	public function updateCompany($item, $tags, $id, $image){

		$str = " UPDATE $this->tbl SET name = :name,
		street_address = :street_address,
		zip_code = :zip_code,
		city = :city,
		website_url = :website_url,
		image = :image,
		description = :description,
		contact_name = :contact_name,
		contact_phone = :contact_phone,
		contact_email = :contact_email,
		company_email = :company_email
		WHERE id = :id ";


		$arr = array('name'=>$item['name'],
					'street_address'=>$item['street_address'],
					'zip_code'=>$item['zip_code'],
					'city'=>$item['city'],
					'website_url'=>$item['website_url'],
					'image'=>$image,
					'description'=>$item['description'],
					'id'=>$id,
					'contact_phone'=>$item['contact_phone'],
					'contact_email'=>$item['contact_email'],
					'contact_name'=>$item['contact_name'],
					'company_email'=>$item['company_email']);

		$this->update($str, $arr);


		$str = " DELETE FROM $this->tbl_tags WHERE company_id = :companyId ";
		$arr = array('companyId'=>$id);
		$this->delete($str, $arr);

		foreach ($tags as $key) {

			$str = " INSERT INTO $this->tbl_tags (company_id, tag_id)
			values(:company_id, :tagId) ";
			$arr = array('company_id' => $id, 'tagId'=>$key);

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




	public function deleteCompanyAndTag($id, $companyName){
			// ta bort mellantabell rader
		// ta bort tagger med projekt
		$str = " DELETE FROM $this->tbl_tags WHERE company_id = :id ";
		$arr = array('id'=>$id);
		$this->delete($str, $arr);
		$str = "DELETE FROM $this->tbl WHERE id = :id";
		 $arr = array('id'=>$id);
		$this->delete($str, $arr);

		//REMOVES IMAGE
		$imageDirectory = PUBLIC_ROOT . '/images/' . '/company/' . $companyName;
		$path = $imageDirectory . '/*';
		$files = glob($path);
		foreach($files as $file){
			if(is_file($file))
				unlink($file);
			}
		//REMOVES DIRECTORY
		rmdir($imageDirectory);
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

	public function getCompaniesWithTagIds($studentTagids){
		$str = "SELECT DISTINCT company_id FROM `company_tag` where tag_id IN (";
		foreach ($studentTagids as $tagId) {
			if(end($studentTagids) === $tagId){
				$str .= $tagId['tag_id'];
			}else{
				$str .= $tagId['tag_id'] . ",";
			}
		}
		$str .= ')';

		$company_ids = $this->selectAll($str);
		$companies = array();
		foreach ($company_ids as $company_id) {
			$company = $this->getFromId($company_id['company_id']);
			if($company){
				array_push($companies,$company);
			}
		}
		return $companies;

	}

	/**
	* Get all the projects that belong to the company
	*/
	public function getProjects($id) {

		$str = " SELECT *
				FROM lia_project
				WHERE company_id = :id ";

		$arr = array('id' => $id);

		return $this->selectAll($str, $arr);
	}

	public function getContact($contactId){
		$str = "SELECT *
		FROM contact_person
		WHERE id = :id ";

		$arr = array('id' => $contactId);

		return $this->select($str, $arr);
	}


}
?>