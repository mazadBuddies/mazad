<?php

class user{
    private $firstName;
    private $lastName;
    private $gender;
    private $userRole;
    private $email;
    private $password;
    private $userName;
    private $imgPath;
    private $following;
    private $followers;
    private $birthDate;
    private $biddings;
    private $createdSessions;
    private $arrayOfData;
    
    public function __construct($email ="", $password =""){
        $this->email = $email;
        $this->password = $password;
//        echo "GOOOOOOOOOOOOOOOD";
        //$this->logIn();
    }


    public function lsData(){
        echo $this->firstName. $this->lastName;
    }
    public function logIn(){
        $connect = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
        $connect->setTable('user');
        $this->email = $_POST['email'];
        $this->password = sha1($_POST['password']);
        $allData = $connect->select("*", array('email', 'userPassword'),array($this->email, $this->password));
        if(sizeof($allData) > 0){
            $_SESSION['id']             = $allData[0]['id'];
            $_SESSION['firstName']      = $allData[0]['firstName'];
            $_SESSION['lastName']       = $allData[0]['lastName'];
            $_SESSION['userName']       = $allData[0]['userName'];
            $_SESSION['imagePath']      = $allData[0]['imagePath'];
            $_SESSION['email']          = $allData[0]['email'];
            $_SESSION['gender']         = $allData[0]['gender'];
            $_SESSION['userRole']       = $allData[0]['userRole'];
            $_SESSION['following']      = $allData[0]['following'];
            $_SESSION['followers']      = $allData[0]['followers'];
            $_SESSION['biddings']       = $allData[0]['biddings'];
            $_SESSION['createdSessions']= $allData[0]['createdSessions'];
            $_SESSION['birthDate']      = $allData[0]['birthDate'];
            $_SESSION['user']           = new user($this->email, $this->password);
            $_SESSION['user']->setData();
            header("location:index.php");
            } 
            else{
                //echo HOST . " " . DB_NAME . " " . DB_USER . " " . DB_PASS;
                
                print_r($connect->select());
            }//end of else
        }//end of if

        public function setData(){
            $this->firstName = $_SESSION['firstName'];
            $this->lastName  = $_SESSION['lastName'];
            $this->email     = $_SESSION['email'];
            $this->imgPath   = $_SESSION['imagePath'];
            $this->password  = $_SESSION['password'];
            $this->userName  = $_SESSION['userName'];
            $this->gender    = $_SESSION['gender'];
            $this->userRole  = $_SESSION['userRole'];
            $this->following = $_SESSION['following'];
            $this->followers = $_SESSION['followers'];
            $this->birthDate = $_SESSION['birthDate'];
            $this->createdSessions = $_SESSION['createdSessions'];
        }

        public function logOut(){
            
            session_unset(); 
            session_destroy(); 
            header("location:login.php");
        }

        public function getRole(){
            return $_SESSION['userRole'];
        }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of imgPath
     */
    public function getImgPath(){
        echo ($_SESSION['imagePath'] == '')?"imgs/12.jpg":$_SESSION['imagePath'];
        
    }//end of getImage
    }

$masterUser = new user("","");