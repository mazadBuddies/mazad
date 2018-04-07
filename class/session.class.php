<?php
/*
 ************** this file include session class ******************
 *           this V.1.0.3 of mazad website at 10 MAR 2018        *
 *          this file contains session handle function class     *
 *****************************************************************
*/
/*
include "config/directors.config.php";
include CLASS_DIR . "autoLoader.class.php";
*/

    ini_set('display_errors', 1);//this for show errs
	error_reporting(~0);// the same target
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		session_start();
		include "../config/directors.config.php";
		include CLASS_DIR . "autoLoader.class.php";
	}
	

class session{
	/* start of proberties */
	private $tableName 			= "session";// set table name "DATABASE TABLE NAME"
	private $uploadsDir			= "uploads/sessionFiles/"; // set directors of uploading file "NOT USED"
	private $insertArray 		= array("sessionName","startPrice","autoSell", "Blind", "startTime", "endTime", "sessionPassword","productId", "sessionOwnerId"); // this array of data base cols
	private $insertOfferArray 	= array("offer", "userId", "sessionId", "offerTime");
	private $sessionData;
	/* end of proberties */

	/* start of methods*/
	public function __construct($block =""){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
		switch ($block) {
			case 'add':// start of case one add new session
				$this->addNewSession();// this for execute function of add new session
			break;// end of case add

			default:
			break;//end of default
		}//end of if
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

	public function getSessionById($sessionId){
		$getSessionByIdFromDatabase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
		$getSessionByIdFromDatabase->setTable('session');
		$this->sessionData = $getSessionByIdFromDatabase->select("*", array("id"), array($sessionId));
		return $this->sessionData;
	}//end of getSessionById

	public function getSessionName(){
		return $this->sessionData[0]['sessionName'];
	}// end of get sessionName

	public function getOffersBySesionId($sessionId){
		$getSessionOffersByIdFromDatabase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
		$getSessionOffersByIdFromDatabase->setTable('sessionOffers');
		$sessionOfferData = $getSessionOffersByIdFromDatabase->select("offer,userId, offerTime", array("sessionId"), array($sessionId));
		$offerDataAsFrontEnd = array();
		$getSessionOffersByIdFromDatabase->setTable('user');
		for($i = (int)sizeof($sessionOfferData )-1; $i >= 0 ; $i--){
			$currentUserOffer = $getSessionOffersByIdFromDatabase->select("imagePath, firstName", array('id'), array($sessionOfferData[$i]['userId']));
			$offerDataAsFrontEnd[] = array(
										'offer'=>$sessionOfferData[$i]['offer'],
										'image'=>$currentUserOffer[0]['imagePath'],
										'name'=>$currentUserOffer[0]['firstName'],
										'time'=>$sessionOfferData[$i]['offerTime']
									);

		}
		return $offerDataAsFrontEnd;
	}

	public function insertOffer(){
		
		$dataInfo = array();
		$userId 	= $_SESSION['id'];
		$offer		= $_POST['offer'];
		$time		= date('Y-m-d h:m:s');
		$connectToDatabase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
		$connectToDatabase->setTable('sessionOffers');
		$errorReportingOfOffer = array();
		//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		if(!filter_var($offer, FILTER_VALIDATE_INT)){
			$errorReportingOfOffer[] = "This Not a number";
		}//end of if
		if($connectToDatabase->getMaxValueByColumnName("offer",array("sessionId"), array($_SESSION['sessionId']))[0][0] >= $offer){
			$errorReportingOfOffer[] = "This Offer Less than Current Offer";
		}//end of if
		//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
		if(sizeof($errorReportingOfOffer) == 0){
			$connectToDatabase->insert($this->insertOfferArray, array($offer, $userId, $_SESSION['sessionId'], $time));
		}//end of if

		return json_encode($errorReportingOfOffer);
		
		/*
		$connectToDatabase->setTable('user');
		$userInfo 	= $connectToDatabase->select('firstName, imagePath', array('id'), array($userId));
		$dataInfo['offer'] = $offer;
		$dataInfo['name']  = $userInfo[0]['firstName'];
		$dataInfo['photo'] = $userInfo[0]['imagePath'];
		$dataInfo['time']  = $time;
		return json_encode($dataInfo);
		*/
	}

	public function getNewOffers($bigSessionOffer){
		$connectToDatabase	= new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
		$connectToDatabase->setTable('sessionOffers');
		$offersData		 	= $connectToDatabase->selectWithOperator("offer, userId, offerTime", array("offer"), array(">"), array($bigSessionOffer));
		$sizeOfOferData = sizeof($offersData);
		$newSessionOffers = array();
		if($sizeOfOferData > 0){
			//print_r($offersData);
			$connectToDatabase->setTable('user');
			for($i = 0; $i <$sizeOfOferData; $i++){
				$userInfo 	= $connectToDatabase->select('firstName , imagePath', array('id'), array($offersData[$i]['userId']));
				$newUserInfo = array(
					'offer'=>$offersData[$i]['offer'],
					'photo'=>$userInfo[0]['imagePath'],
					'name'=>$userInfo[0]['firstName'],
					'time'=>$offersData[$i]['offerTime']
			);
				$newSessionOffers[] = $newUserInfo;
			}//end of for
		}//end of if
		return json_encode($newSessionOffers);
	}//end of function 

	public function getSessionMessagesById($id){
		$connectToDatabase	= new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
		$connectToDatabase->setTable('sessionChat');
		$allsessionMessage 	= $connectToDatabase->select("message, fromId, messageTime", array("sessionId"),array($id));
		$messagesView		= array();
		$connectToDatabase->setTable('user');
		for($i = 0; $i < (int)sizeof($allsessionMessage); $i++){
			$userInfo = $connectToDatabase->select("firstName, imagePath", array('id'), array($allsessionMessage[$i]['fromId']));
			$userMessageAsRow = array(
								"fromId" 	=> $allsessionMessage[$i]['fromId'],
								"fromName"	=> $userInfo[0]['firstName'],
								"meesage"	=>$allsessionMessage[$i]['message'],
								"fromImage"	=> $userInfo[0]['imagePath'],
								"messageTime"=> $allsessionMessage[$i]['messageTime']
							);
			$messagesView[] = $userMessageAsRow;
		}//end of for
		return $messagesView;
	}//end of function getSessionMessagesById

	public function insertSessionMessage($msg, $frmId, $sesId){
		$message 	= $msg;
		$fromId 	= $frmId;
		$sessionId 	= $sesId;
		$time		= date('Y-m-d H:i:s');
		$connectToDatabase	= new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
		$connectToDatabase->setTable('sessionChat');
		$connectToDatabase->insert(array('message', 'fromId', 'sessionId', 'messageTime'), array($message, $fromId, $sessionId, $time));
	}//end of function

	public function getNewMessages(){
		//print_r($_POST);
		$maxTime = $_POST['lastDisplayed'];
		$connectToDatabase	= new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
		$connectToDatabase->setTable('sessionChat');
		$newMessages = $connectToDatabase->selectWithOperator("message, fromId, sessionId, messageTime", array('messageTime', 'sessionId'), array('>', '='), array($maxTime, $_SESSION['sessionId']));
		$connectToDatabase->setTable('user');
		$messageAsView = array();
		for($i=0; $i<(int)sizeof($newMessages); $i++){
			$userInfo = $connectToDatabase->select('firstName, imagePath', array('id'), array($newMessages[$i]['fromId']));
			$userInfoAsRow = array(
				"firstName" 	=> $userInfo[0]['firstName'],
				"imagePath" 	=> $userInfo[0]['imagePath'],
				"message"		=> $newMessages[$i]['message'],
				"messageTime"	=> $newMessages[$i]['messageTime'],
				"fromId"		=> $newMessages[$i]['fromId']
			);
			$messageAsView[] = $userInfoAsRow;
		}//end of for
		return $messageAsView;
	}
}//end of class session

if($_SERVER['REQUEST_METHOD'] === "POST"){

	if($_POST['ACTION'] == 'ADD'){
		$lol = new session('add');
		echo "1";
	}

	elseif($_POST['ACTION'] == 'INSERT_OFFER'){
		//print_r($_POST);
		$sessionToAddNewOffer = new session();
		print_r($sessionToAddNewOffer->insertOffer());
	}//end of else if

	elseif($_POST['ACTION'] == 'GET_NEW_OFFERS'){
		/*
			we need to send id for this function in request
		*/
		$sessionToreturnNewOffers = new session();
		print_r($sessionToreturnNewOffers->getNewOffers($_POST['curOffer']));
	}//end of if

	elseif($_POST['ACTION'] == 'INSERT_MESSAGE'){
		$sessionToreturnNewOffers = new session();
		$sessionToreturnNewOffers->insertSessionMessage($_POST['message'], $_SESSION['id'],$_SESSION['sessionId']);
	}

	elseif($_POST['ACTION'] == 'GET_NEW_MESSAGE'){
		$sessionToreturnNewOffers = new session();
		print_r(json_encode($sessionToreturnNewOffers->getNewMessages()));
	}// end of else if
}//end of if $_SERVER
