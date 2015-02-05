<?php

class User extends Database{

	public $tbl = 'user';


	//find user with guid (session).
	public function getUserByGuid($guid){
		$str = " SELECT * FROM $this->tbl WHERE guid = :guid ";
		$arr = array('guid'=>$guid);

		return $this->select($str, $arr);
	}




	public function createUser($items = array()){

		$token = randomStr();
		$cleanPassword = $items['password'];

		$cryptedPassword = cryptPassword($cleanPassword, $token);

		$str = " INSERT INTO $this->tbl (email, password, token, firstname, lastname, course_leader, company_owner, student, kommun_id, guid)
		VALUES (:email, :password, :token, :firstname, :lastname, :course_leader, :company_owner, :student, :kommunId, UUID()) ";

		$arr = array('email'=>$items['email'],
			'password'=>$cryptedPassword,
			'token'=>$token,
			'firstname'=>$items['firstname'],
			'lastname'=>$items['lastname'],
			'course_leader'=>$items['course_leader'],
			'company_owner'=>$items['company_owner'],
			'student'=>$items['student'],
			'kommunId'=>$items['kommunId']);

		$this->insert($str, $arr);

	}



	public function updateToken($id, $password){

		$newToken = randomStr();
		$newPassword = cryptPassword($password, $newToken);

		$str = " UPDATE $this->tbl SET token = :newToken, password = :newPassword WHERE id = :id ";
		$arr = array('newToken'=>$newToken, 'newPassword'=>$newPassword, 'id'=>$id);
		$this->update($str, $arr);
	}


	public function checkPasswordMatch($items = array()){

		$str = " SELECT token FROM $this->tbl WHERE mail = :mail ";
		$arr = array('mail'=>$items['oldmail']);
		$userToken = $this->select($str, $arr);

		$newPassword = cryptPassword($items['password'], $userToken['token']);

		$str = " SELECT user_id FROM $this->tbl WHERE mail = :mail AND password = :pword ";
		$arr = array('mail'=>$items['oldmail'], 'pword'=>$newPassword);

		return $this->select($str, $arr);
	}


	public function loginUser($arr = array()){

		$defaultArray = array('email'=>'', 'password'=>'');
		$items = array_merge($defaultArray, $arr);

		$str = " SELECT token FROM $this->tbl WHERE email = :mail ";
		$arr = array('mail'=>$items['email']);
		$userToken = $this->select($str, $arr);


		if($userToken){
			$newPassword = cryptPassword($items['password'], $userToken['token']);
			$str = " SELECT email, id, guid FROM $this->tbl WHERE email = :mail AND password = :password ";
			$arr = array('mail'=>$items['email'], 'password'=>$newPassword);

			$result = $this->select($str, $arr);

			if($result){

				$this->updateToken($result['id'], $items['password']);

				return $result;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}





}



?>