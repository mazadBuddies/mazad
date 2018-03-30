<?php
/*
 ************** this file include session class ******************
 *           this V.1.0 of mazad website at 10 MAR 2018          *
 *          this file contains session handle function class     *
 *****************************************************************
*/
include "../config/directors.config.php";
include CLASS_DIR . "autoLoader.class.php";


class session{
	/* start of proberties */
	private $tableName = "session";// set table name "DATABASE TABLE NAME"
	private $uploadsDir = "uploads/sessionFiles/"; // set directors of uploading file "NOT USED"
	private $insertArray = array("sessionName","startPrice","autoSell", "Blind", "startTime", "endTime", "sessionPassword","productId", "sessionOwnerId"); // this array of data base cols
	/* end of proberties */

	/* start of methods*/
	public function __construct($block){
		switch ($block) {
			case 'add':// start of case one add new session
				if($_SERVER['REQUEST_METHOD'] === 'POST'){
					$this->addNewSession();// this for execute function of add new session
				}//end of if
				break;// end of case add
			default:
				echo "not yet";
				break;//end of default
		}//end of switch
	}//end of construct

	private function addNewSession(){
		/*
			NOT THAT::: data not valid yet
			** we will add validation after implement validation class
			@TODO||and should add hours in session time later
		*/
		/* start collecting data phase */
		$sessionName 			= isset($_POST['sessionName'])?$_POST['sessionName']:""; // session name
		$sessionStartPrice 		= isset($_POST['startPrice'])?$_POST['startPrice']:"";// start price of ses.
		$sessionStartTime		= isset($_POST['startTime'])?$_POST['startTime']:""; // srat Time
		$sessionEndTime			= isset($_POST['endTime'])?$_POST['endTime']:""; // end time 
		$sessionAutoSellValue	= isset($_POST['autoSellValue'])?intval($_POST['autoSellValue']):""; // auto Sell
		$sessionBlindValue  	= isset($_POST['blindTime'])?$_POST['blindTime']:""; // blindValue
		$sessionPassword 		= isset($_POST['password'])?sha1($_POST['password']):""; // session password
		$sessionIncreament  	= isset($_POST['sessionIncreament'])?$_POST['sessionIncreament']:""; // increament of next price
		$ownerId				= isset($_POST['ownerId'])?$_POST['ownerId']:"";
		/* end collecting data phase */
		$connectMazadDB 		= new dataBase(HOST, DB_NAME, DB_USER, DB_PASS); // connect to mazad dataBase
		$setNewProductToDataBase = new product($_FILES);// make new object from pruduct to add new one
		$setNewProductToDataBase->setImageName($_FILES["images"]);
		$setNewProductToDataBase->addNewProduct();// execute addNewProuduct function to add this
		$productId 				= $setNewProductToDataBase->getLastProductId(); // get last product id for forignKey between product <-> session
		$connectMazadDB->setTable($this->tableName);// set session "TABLE NAME" active to execute quei.
		/* make values array with the same order of insert array to insert it in data base using dataBase class this phase not finished yet but add data to database in product table and session */
		$valuesArray 			= array(
			$sessionName, 
			$sessionStartPrice, 
			$sessionAutoSellValue, 
			$sessionBlindValue,
			$sessionStartTime, 
			$sessionEndTime, 
			$sessionPassword, 
			$productId, 
			$ownerId);// end of session values array
		$connectMazadDB->insert($this->insertArray, $valuesArray);// this step for insert data
		/*echo "<pre>";
		print_r($_POST); //NOTE THAT ::: this for debug only :::
		echo "</pre>";*/
	}//end of addNewSession function
	/* start of methods*/
}//end of class session

if($_SERVER['REQUEST_METHOD'] === "POST"){
	if($_POST['ACTION'] == 'ADD')
	{
		$lol = new session('add');
		echo "1";
	}
	
}
