<?php

class LiaProject extends Database{

	private $tbl = 'lia_project';
	private $tbl_tags = 'project_tag';
	private $tbl_applicant = 'project_applicant';


	public function getAll(){
		$str = " SELECT * FROM $this->tbl ";

		return $this->selectAll($str);

	}

	public function getFromId($id){
		$str = " SELECT * FROM $this->tbl WHERE id = :id ";
		$arr = array('id'=>$id);
		return $this->select($str, $arr);
	}

	public function create($item, $tags){

		$str = " INSERT INTO $this->tbl (name, description, spots, company_id, estimated_time)
		VALUES(:name, :description, :spots, :company, :estimated_time) ";
		$arr = array('name'=>$item['name'],
					'description'=>$item['description'],
					'spots'=>$item['spots'],
					'company'=>$item['company'],
					'estimated_time'=>$item['estimated_time']);

		$lastProjectId = $this->insert($str, $item);

		foreach ($tags as $value => $key) {

			$str = " INSERT INTO project_tag (project_id, tag_id)
			values(:projectId, :tagId) ";
			$arr = array('projectId' => $lastProjectId, 'tagId'=>$key);

			$this->insert($str, $arr);
		}

	}

	public function updateProject($item, $tags, $id){

		$str = " UPDATE $this->tbl SET name = :name,
		description = :description,
		spots = :spots,
		company_id = :company,
		estimated_time = :estimated_time 
		WHERE id = :id ";


		$arr = array('name'=>$item['name'],
					'description'=>$item['description'],
					'spots'=>$item['spots'],
					'company'=>$item['company'],
					'estimated_time'=>$item['estimated_time'],
					'id'=>$id);


		$this->update($str, $arr);

		$str = " DELETE FROM project_tag WHERE project_id = :projectId ";
		$arr = array('projectId'=>$id);
		$this->delete($str, $arr);

		foreach ($tags as $key) {
			
			$str = " INSERT INTO project_tag (project_id, tag_id)
			values(:projectId, :tagId) ";
			$arr = array('projectId' => $id, 'tagId'=>$key);

			$this->insert($str, $arr);
		}
	}

	public function save($items = array()) {
		// Förbereder mysql kommando
		$str = " UPDATE $this->tbl SET name=:name,
			description=:description,
			spots=:spots,
			company_id=:company,
			estimated_time=:estimated_time
			WHERE id = :id";

		$this->update($str, $items);
	}




	public function deleteProjectAndTag($id, $companyId){
		// ta bort mellantabell rader 
		// ta bort tagger med projekt 
		$str = "UPDATE $this->tbl_applicant SET project_id = null WHERE project_id = :id ";
		$arr = array(
			'id'=>$id
		);
		$this->update($str, $arr);

		$str = " DELETE FROM $this->tbl_tags WHERE project_id = :id";
		$arr = array('id'=>$id);
		$this->delete($str, $arr);	

		$str = "DELETE FROM $this->tbl WHERE id = :id AND company_id = :company_id ";
		$arr = array(
			'id'=>$id,
			'company_id' => $companyId
		);
		$this->delete($str, $arr);

	
	}

	public function checkExistingApplicant($items = array()){
		$str = " SELECT * FROM $this->tbl_applicant WHERE
		(project_id = :project_id AND user_id = :user_id)
		OR (company_id = :company_id AND user_id = :user_id) ";
		$arr = array('project_id'=>$items['project_id'],
			'company_id'=>$items['company_id'],
			'user_id'=>$items['user_id']);

		return $this->select($str, $arr);

	}


	public function addApplicant($items = array()){
		$str = " INSERT INTO $this->tbl_applicant (project_id, user_id, msg, company_id, course_id)
		VALUES (:project_id, :user_id, :msg, :company_id, :course_id) ";
		$arr = array('project_id'=>$items['project_id'],
			'company_id'=>$items['company_id'],
			'user_id'=>$items['user_id'],
			'course_id'=>$items['course_id'],
			'msg'=>$items['msg']);

		$this->insert($str, $arr);
	}

	public function getAcceptedApplicantsForProject($course){
		$str = " SELECT COUNT(id)FROM project_applicant WHERE course_id = :course AND status = 1 ";
		$arr = array('course' => $course);

		return $this->select($str, $arr);

	}

	public function getMyApplicationsUser($userId){
		$str = " SELECT * FROM $this->tbl_applicant WHERE user_id = :id ";
		$arr = array('id'=>$userId);

		return $this->selectAll($str, $arr);
	}

	public function getMyApplicationsCompany($companyId){
		$str = " SELECT * FROM $this->tbl_applicant WHERE company_id = :id ";
		$arr = array('id'=>$companyId);

		return $this->selectAll($str, $arr);
	}

	public function removeApplicant($applicationId){
		$str = " DELETE FROM $this->tbl_applicant WHERE id = :id ";
		$arr = array('id'=>$applicationId);

		$this->delete($str, $arr);
	}

	public function acceptApplicant($uid, $id){
		$str = " UPDATE $this->tbl_applicant SET status = 1 WHERE user_id = :uid AND id = :id ";
		$arr = array('uid'=>$uid, 'id'=>$id);
		$this->update($str, $arr);
	}

	public function denyApplicant($uid, $id){
		$str = " UPDATE $this->tbl_applicant SET status = 2 WHERE user_id = :uid AND id = :id ";
		$arr = array('uid'=>$uid, 'id'=>$id);
		$this->update($str, $arr);
	}

	public function finishApplicant($uid, $id){
		$str = " UPDATE $this->tbl_applicant SET status = 3 WHERE user_id = :uid AND id = :id ";
		$arr = array('uid'=>$uid, 'id'=>$id);
		$this->update($str, $arr);
	}

	public function editReportApplicant($uid, $id, $report){
		$str = " UPDATE $this->tbl_applicant SET report = :report WHERE user_id = :uid AND id = :id ";
		$arr = array('uid'=>$uid, 'id'=>$id, 'report'=>$report);
		$this->update($str, $arr);
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