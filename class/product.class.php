<?php
/*
 ************** this file include product class ******************
 *           this V.1.0 of mazad website at 9 MAR 2018           *
 *          this file contains product handle function class     *
 *****************************************************************
*/

class product{
	/* start of proberties */
	private $tableName 			= "product";// set table name "DATABASE TABLE NAME"
	private $uploadsDir 		= UPLOADS_DIR . "sessionFiles/";// set directors of uploading file "USED FOR PRODUCT PHOTO"
	private $insertArray 		= array("imagePath", "tags", "productName", "catId");// this array of data base cols
	private $files;
	/* end of proberties */
	/* start of methods*/

	/*
		addNewProduct:: FUNCTION
		::TARGET::      add new product to data base insert data like product ( name - tags - image - catiegrie )
		@Param::        no
		::relations::   this<->session | this<->user
		::TABLE NAME::  (product)
	*/

	public function __construct($f){
		$this->files = $f;
	}
	
	public function addNewProduct(){
		/*
			NOT THAT::: data not valid yet
			** we will add validation after implement validation class
			@TODO||and should add hours in session time later
		*/
		/* start collecting data phase */
		$productName 			= isset($_POST['itemName'])?$_POST['itemName']:""; // productName
		$sessionTags			= isset($_POST['tags'])?$_POST['tags']:""; // session tags for describe product
		$productImage			= $this->uploadsDir . $_FILES['images']["name"]; // get imagePath "NOTE may make it method ******************"
		$productCatiegorie		= isset($_POST['categories'])?intval($_POST['categories']):""; // set productCatiegorie this make forignKey with cate.
		$valuesArray			= array($_FILES['images']["name"]
										, $sessionTags
										, $productName
										, $productCatiegorie); // make values array from collection data
		$connectMazadDB 		= new dataBase(HOST, DB_NAME, DB_USER, DB_PASS); // connect to database
		$connectMazadDB->setTable($this->tableName); // set product active table "DATA BASE TABLE NAME"
		$this->uploadProductImage(); // execute uploadProductImage for uploading image
		$connectMazadDB->insert($this->insertArray, $valuesArray); // inserting data to database  
	}// end of addNewProduct

	public function getLastProductId(){
		$connectMazadDB 		= new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);// connecting to database by creating new object
		$connectMazadDB->setTable($this->tableName);// set active table product table "DATA BASE TABLE NAME"
		return $connectMazadDB->getLastId()[0]['max'];// get max id in database
	}//end of getLastProductId function

	private function uploadProductImage(){
		$test = new fileUploader($this->uploadsDir, "images"); // make new object of fileUploader
		//print_r($test->getErrors()); // not Recommend but to debug only ********::******* don't forget to remove it
		$test->upload();// uploading phase
		/* End of methods*/
	}// end of uploadProductImage function

	public function setImageName($img){
		$_FILES['images'] = $img;
	}
}//end of class product