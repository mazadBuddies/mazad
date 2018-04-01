<?php
include "autoLoader.class.php";
class catiegorie{
	public function getAllCatiegorie(){
		$openMazadDataBase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
		$openMazadDataBase->setTable('categorie');
		return $openMazadDataBase->select();
	}// end of function getAllCatiegorie
}//end of class catiegorie


if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$database = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
	$database->setTable('follow');
	$database->insert(array('fromId', 'toId', 'status'), array(1,2,0));
	echo"gFOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOD" . $_POST['sessionName'] ;
}
	