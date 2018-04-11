<?php
/*
 ************** this file include for globals ********************
 *           this V.1.0 of mazad website at 11 MAR 2018          *
 *          this file contains file upload class                 *
 *****************************************************************
*/
define("ROOT", "../");
ini_set('display_errors', 1);//this for show errs
error_reporting(~0);// the same target
class fileUploader{
    private $targetDir; // this variable for upload path default value uploads
    private $targetFile; // this for get dir of file upload from user PC
    private $fileType; // this for get file type
    private $nameOfPost; // save name of post name of <HTML> input
    private $ERRORS; // array save all errors and return it
    private $uploadOk; // boolean to check if we good or not
    private $allMIME; // set all types of mimes
    private $maxSize;

    
    public function __construct($tDir = "uploads/", $nameOfPost = "fileUpload", $limitSize = 5000000000, $allTypes = array()){
        $this->nameOfPost = $nameOfPost; // set name of post to get file from it
        $this->targetDir = $tDir; // set target value
        $this->targetFile = $this->targetDir . basename($_FILES[$nameOfPost]["name"]);// get base name and set it to dir
        $this->ERRORS = array(); // make empty array for put error on it
        $this->maxSize = $limitSize; // set limit size of image "file" upload
        $this->uploadOk = 1;// this for check if steps continue suc.
        (sizeof($allTypes) == 0)?$this->allMIME = array('jpg','png','jpeg','gif'):$this->allMIME = $allTypes;
        $this->fileType = strtolower(pathinfo($this->targetFile, PATHINFO_EXTENSION));// set exetention of file
    }//end of __constructor

    public function upload(){
        // we test all steps for check upload file is fit with our option or not
        $this->checkMaxSize(); // check size is fit or not
        $this->fileIsExist(); // check if file exist im our website 
        $this->fileMime(); // check mime type
        $this->isImage(); // check if is image or not
        // Check if $uploadOk is set to 0 by an error
        //move_uploaded_file($_FILES[$this->nameOfPost]["tmp_name"], $this->targetFile);// not secure right now
        echo $this->uploadOk;
        if ($this->uploadOk == 0) {
            $this->ERRORS[] = "Sorry, your file was not uploaded.";// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$this->nameOfPost]["tmp_name"], $this->targetFile)) {
                move_uploaded_file($_FILES[$this->nameOfPost]["tmp_name"], $this->targetFile);
                return array();
            } else {
                return $this->ERRORS;
            }// end of else
        }// end of else
    }// end of function upload

    public function checkMaxSize(){
        if ($_FILES[$this->nameOfPost]["size"] > $this->maxSize) {
            $this->errs[] = "Sorry, your file is too large.";// file size in KB
            $this->uploadOk = 2;
        }//end of if
    }//end of function checkMazSize

    public function fileIsExist(){
        if (file_exists($this->targetFile)) {
            $this->ERRORS[] = "Sorry, file already exists.";
            $this->uploadOk = 3;
        } //end of if
    }//end of function fileIsExist

    public function fileMime(){
        if(!in_array($this->fileType, $this->allMIME)) {
            $this->ERRORS[] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $this->uploadOk = 4;
        }//end of if
    }

    public function isImage(){
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$this->nameOfPost]["tmp_name"]);
            if($check === false) {
                $this->ERRORS[] =  "File is not an image.";
                $this->uploadOk = 5;
            }//end of if
        }//end of big if
    }

    public function getErrors(){
        return $this->ERRORS;
    }// end of function getErrors
}//end of class fileUploader
?>
