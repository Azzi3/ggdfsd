<?php


class StudentProfile extends Database{


	public $tbl = 'student_profile';
	public $tbl_tags = 'student_tag';

	//get profile information from userID
	public function getProfile($userId){

		$str = " SELECT * FROM $this->tbl WHERE user_id = :id ";
		$arr = array('id'=>$userId);

		return $this->select($str, $arr);

	}

	public function createProfile($items = array(), $tags){


		$str = " INSERT INTO $this->tbl (user_id, phone, website, resume, picture, info)
		VALUES(:userId, :phone, :website, :resume, :picture, :info) ";
		$arr = array('userId'=>$items['id'],
					'phone'=>$items['phone'],
					'website'=>$items['website'],
					'resume'=>$items['resume'],
					'picture'=>$items['picture'],
					'info'=>$items['info']);

		$this->insert($str, $arr);


		foreach ($tags as $key) {
			
			$str = " INSERT INTO $this->tbl_tags (user_id, tag_id)
			values(:user_id, :tagId) ";
			$arr = array('user_id' => $items['id'], 'tagId'=>$key);

			$this->insert($str, $arr);
		}

	}

	public function updateProfile($items = array(), $tags){


		$str = " UPDATE $this->tbl SET phone = :phone,
										website = :website,
										resume = :resume,
										picture = :picture,
										info = :info
										 WHERE user_id = :userId ";

		$arr = array('userId'=>$items['id'],
					'phone'=>$items['phone'],
					'website'=>$items['website'],
					'resume'=>$items['resume'],
					'picture'=>$items['picture'],
					'info'=>$items['info']);

		$this->update($str, $arr);




		$str = " DELETE FROM $this->tbl_tags WHERE user_id = :user_id ";
		$arr = array('user_id'=>$items['id']);
		$this->delete($str, $arr);

		foreach ($tags as $key) {
			
			$str = " INSERT INTO $this->tbl_tags (user_id, tag_id)
			values(:user_id, :tagId) ";
			$arr = array('user_id' => $items['id'], 'tagId'=>$key);

			$this->insert($str, $arr);
		}
	}

	public function getTags($id) {

    $str = " SELECT *
        FROM student_tag
          INNER JOIN user
            ON student_tag.user_id = user.id
          INNER JOIN tag
            ON student_tag.tag_id = tag.id
        WHERE user.id = :id ";

    $arr = array('id' => $id);

    return $this->selectAll($str, $arr);
  }

}


?>