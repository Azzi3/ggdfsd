<?php


class County extends Database{

	//tbl = län
	//tbl2 = kommun
	public $tbl = 'county';
	public $tbl2 = 'municipality';


	public function getMunicipalityName($id){
		$str = " SELECT name FROM $this->tbl2 WHERE municipality_id = :id ";
		$arr = array('id'=>$id);

		return $this->select($str, $arr);
	}

	public function listMunicipality(){
		$str = " SELECT * FROM $this->tbl2 ORDER BY name ASC ";
		return $this->selectAll($str);
	}

	public function checkValidMunicipality($id){
		$str = " SELECT * FROM $this->tbl2 WHERE municipality_id = :id ";
		$arr = array('id'=>$id);

		return $this->select($str, $arr);
	}


}

?>