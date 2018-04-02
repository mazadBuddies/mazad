<?php
/*
 ************** this file include for globals ********************
 *           this V.2.1.1 of mazad website at 2 feb 2018         *
 *          this file contains database class                    *
 *****************************************************************
*/
    ini_set('display_errors', 1);//this for show errs
    error_reporting(~0);// the same target

    class dataBase{
        /* start of props */
        private $dsn;// this var to define data source name
        private $dataBaseName;// data base name 
        private $user;// user name to login to data base
        private $pass;// password for database
        private $option;// option of data base
        public  $con;// this var for connection
        public $curQuery;// this for put query on it and execute
        private $curTable;// to make active table to run methods
        private $tables;
        /* end of props */

        /* start of methods */
        public function __construct($serverName, $dbName, $userName,$password){
            $this->dataBaseName = $dbName;// set database name
            $this->dsn          = "mysql:host=$serverName;dbname=$this->dataBaseName";// make data source name
            $this->user         = $userName;// set user name
            $this->pass         = $password;// setpassword not using sha1
            $this->option       = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);// make our option and make it friendly with arabic
            if( version_compare(PHP_VERSION, '5.3.6', '<') )
                if( defined('PDO::MYSQL_ATTR_INIT_COMMAND') )
                    $options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';    
                else
                    $this->dsn .= ';charset= utf8' /*. DB_ENCODING */;    
            $this->connect();//try to connect to database
            $this->refreashTables();// load tables from databases
            /*if((int)sizeof($this->option) != 0 )//this for check if array not empty
                $this->curTable = $this->tables[0][0];// set first table as default "if you forget"*/
        }//end of construct

        public function connect(){
            try{
                $this->con = new PDO($this->dsn, $this->user, $this->pass, $this->option);// make new connection with database
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// set errMod to show all errors
                return true;// you can use true and false to make sure it is connected suc.
            }catch(PDOException $e){
                echo "falid to connect " . $e->getMessage();//catch all errors and display message
                return false;// return false if not connect
            }//end of catch
        }//end of connect function

        public function refreashTables(){
            $this->curQuery = 'show Tables'; // to get all tables
            $this->tables   = $this->executeQuery(false, true); // set all tables in table varible
        }//end of refreshTables function

        public function select($select = "*", $whereIn = array(), $whereEq = array(), $get = true){
            $where = $this->whereFormat($whereIn);// set where query as string to mk new sql
            $this->curQuery = "SELECT $select FROM $this->curTable WHERE $where"; // set current query fo select syntax
            $fin = $this->mkInsertArray($whereIn, $whereEq); //set values in [key => value] array to execute it
            if($get){return $this->executeQuery(false, true, $fin);}//if we pass parameter get true => return data
        }//end of mkQuery

        public function executeQuery($getCount = false, $get = false, $data = array()){
            try{
                $stmt = $this->con->prepare($this->curQuery);//try to mk prepare statement
                if((int)sizeof($data) != 0){$stmt->execute($data) ;}//if we pass data he execute it
                else{$stmt->execute();}// else execute without array
                if($getCount){return $stmt->rowCount();}// if you execute query for count only set it true
                if($get){return $stmt->fetchAll();}// get data if you set get true
            }catch(PDOException $e){
                echo 'faild to execute query' . $e->getMessage();// if not suc. to execute query get error massege 
            }//end of catch
        }//end of executeQuery

        public function getCount(){
            $this->select();//this make select all for active table
            return $this->executeQuery(true);// and execute curQuery and return value
        }//end of getCountFromTable

        public function delete($whereIn = array(), $whereEq = array()){
            $where = $this->whereFormat($whereIn);// set where format var1 = :var1 AND .....
            $fin = $this->mkInsertArray($whereIn, $whereEq);// mk insert array as shown 
            $this->curQuery = "DELETE FROM $this->curTable WHERE $where";// delete where condition true
            $this->executeQuery(false, false, $fin);// and execute it
        }//end of delete

        public function update($setIn, $setEq ,$whereIn = array(), $whereEq= array()){
            $set = $this->whereFormat($setIn, ' ,');// set where format and set sep. ' ,' (replace it AND -> ,)
            $where = $this->whereFormat($whereIn);// set where format
            $fin = $this->mkInsertArray($setIn, $setEq);//mk insert array as shown
            $fin = $this->mkInsertArray($whereIn, $whereEq, $fin);// we pass fin[Array] to add new values//error_reporting(0);
            $this->curQuery = "UPDATE $this->curTable SET $set WHERE $where";// set current query with UPDATE syntax
            $this->executeQuery(false, false, $fin);// execute qur. with array of data
        }//end of update function

        public function whereFormat($whereArr, $seb = ' AND'){
            if((int)sizeof($whereArr) == 0)return '1';//if no condition (Array is Empty) return 1 "No Condition set"
            $str = '';
            for($i = 0 ; $i<(int)sizeof($whereArr); $i++)
                $str .= $whereArr[$i] . ' = :' . $whereArr[$i] . $seb . ' ';// make string as where format
            $str = chop($str, $seb);// remove last sep.
            return $str;// return gen. str
        }// end of whereFormat function

        public function innerJoin($select = '*', $colName, $secTableName, $secColName){
            /* SELECT column_name(s) FROM table1 INNER JOIN table2 ON table1.column_name = table2.column_name; */ 
            $this->curQuery = " SELECT $select
                                FROM $this->curTable 
                                INNER JOIN $this->dataBaseName.$secTableName 
                                ON $this->curTable.$colName = $this->dataBaseName.$secTableName.$secColName";
            return $this->executeQuery(false,true);
        }//end of inner join ////////////////////////// not finished yet

        public function setTable($tableName){
            $this->curTable = $this->dataBaseName . "." . $tableName;// set active table
        }//end of setTable

        public function toString($array){
            $str = "(";
            foreach($array as $arr)
                $str .= $arr." ,";
            $str = chop($str , " ,");
            $str .=" )";
            return $str;
        }//end of toString

        public function lsDB(){
            echo $this->dsn . " " . $this->user . " " . $this->pass . " " . $this-> option[0];// ls options and config data
            /*this function for test your database config */
        }//end of lsBB function

        public function getTableName(){
            return $this->curTable;// return active table
        }//end of getTableName
        /* end of methods */

        public function sql($qur){// this function for test sql only "quick"
            $this->curQuery = $qur;// set sql
            $this->executeQuery();// execute qur.
        }//end of sql function 

        public function insert($cols, $vals){
            $val = $this->insertFormat($cols);// this will edited soon ISA*/
            $col = $this->toString($cols);// this to make cols as sql syntax
            $this->curQuery = "INSERT INTO $this->curTable $col VALUES $val\n" ;// make current query insert mode
            $all = $this->mkInsertArray($cols, $vals);// mk insert array as shown
            $this->executeQuery(false, false, $all);// execute qurey and pass data
        }// end of insert function

        public function mkInsertArray($arrCols , $arrVals, $tragS = array()){
            $targ = $tragS;// set passed array and set new values 
                for($i = 0; $i < (int)sizeof($arrCols); $i++)
                    $targ[':' . $arrCols[$i]] = $arrVals[$i];// make array [key=>value]
                    
            return $targ;
        }// end of mkInsertArray function

        public function insertFormat($array, $brac = true ){
            $str = ($brac)? '( ':'';
            for($i = 0;$i < (int)sizeof($array); $i++)
                $str .= ':' . $array[$i] . ', ';
            $str = chop($str , " ,");
            $str .= ($brac)? ') ':'';
            return $str;
        }// end of insertFormat function

        public function setSqlQur($myQur){
                $this->con->exec($myQur);
        }//end of setSqlQur function

        public function isDatabase($databaseName){
            $stmt = $this->con->prepare('SHOW DATABASES');
            $stmt->execute();
            $allDatabases = $stmt->fetchAll();
            //echo "<pre>";
            //print_r($allDatabases);
            //echo "</pre>";
            for($i = 0; $i<sizeof($allDatabases);$i++){
                if($allDatabases[$i][0] == $databaseName)
                    return true;
            }
            return false;
        }//end of function isDatabase
        public function getLastId(){
            $this->curQuery = "SELECT  MAX(id) AS max FROM $this->curTable";
            return $this->executeQuery(false, true);
        }
        public function mk(){
                $Make = array();
                if($this->isDatabase('mazad'))$Make[] = 'DROP DATABASE mazad';
                $Make[] = 'CREATE DATABASE mazad';
                $Make[] = 'USE mazad';
                $Make[] = 'CREATE TABLE user (
                                id int(11) AUTO_INCREMENT  PRIMARY KEY, 
                                firstName varchar(255) NOT NULL, 
                                lastName varchar(255) NOT NULL,
                                gender TINYINT(2) NOT NULL,
                                userName varchar(255) NOT NULL, 
                                email varchar(255) NOT NULL,
                                birthDate date,
                                userPassword varchar(255) NOT NULL,
                                imagePath varchar(255) DEFAULT "imgs/original.jpg",
                                userRole TINYINT(2) DEFAULT 2,
                                balance int(11) DEFAULT 5,
                                active TINYINT(2) DEFAULT 1,
                                blocked TINYINT(2) DEFAULT 0,
                                rate int(11) DEFAULT 0,
                                lastVisit DATETIME ,
                                RegisterDate DATE ,
                                UNIQUE(email),
                                UNIQUE(userName))';
                                
                $Make[] = 'CREATE TABLE notification (
                                id int(11) AUTO_INCREMENT  PRIMARY KEY,
                                fromId int(11) NOT NULL,
                                toId int(11) NOT NULL,
                                kind int(11) NOT NULL,
                                targetLink varchar(255),
                                seen TINYINT(2) DEFAULT 0,
                                notificationTime DATETIME,
                                FOREIGN KEY (fromId) REFERENCES user(id),
                                FOREIGN KEY (toId) REFERENCES user(id))';

                $Make[] = 'CREATE TABLE categorie(
                            id int(11) AUTO_INCREMENT  PRIMARY KEY,
                            icon varchar(255),
                            catiegorieName varchar(255) NOT NULL,
                            details varchar(255) NOT NULL)';

                $Make[] = 'CREATE TABLE session(
                                id int(11) AUTO_INCREMENT  PRIMARY KEY,
                                sessionName varchar(255),
                                startPrice varchar(255),
                                autoSell int(11) DEFAULT 0,
                                Blind int(11),
                                startTime DATETIME NOT NULL,
                                endTime DATETIME NOT NULL,
                                sessionPassword varchar(255),
                                productId int(11),
                                sessionOwnerId int(11) NOT NULL,
                                currentOffer int(11) DEFAULT 0,
                                currentUser int(11),
                                finished TINYINT(2) DEFAULT 0,
                                FOREIGN KEY (sessionOwnerId) REFERENCES user(id),
                                FOREIGN KEY (currentUser) REFERENCES user(id))';

                $Make[] = 'CREATE TABLE product(
                                id int(11) AUTO_INCREMENT  PRIMARY KEY,
                                imagePath varchar(255) NOT NULL,
                                tags varchar(255),
                                productName varchar(255) NOT NULL,
                                catId int(11) NOT NULL,
                                stars int(11) DEFAULT 0,
                                bidderId int(11),
                                FOREIGN KEY (catId) REFERENCES categorie(id),
                                FOREIGN KEY (bidderId) REFERENCES user(id)
                            )';
                
                $Make[] = 'CREATE TABLE feedback(
                            id int(11) AUTO_INCREMENT  PRIMARY KEY,
                            feedback varchar(255) NOT NULL,
                            fromId int(11) NOT Null,
                            aboutId int(11) NOT NULL,
                            stars int(11) DEFAULT 0,
                            FOREIGN KEY (fromId) REFERENCES user(id),
                            FOREIGN KEY (aboutId) REFERENCES user(id)
                        )';
                $Make[] = 'CREATE TABLE follow(
                            id int(11) AUTO_INCREMENT  PRIMARY KEY,
                            fromId int(11) NOT NULL,
                            toId int(11) NOT NULL,
                            status TINYINT(2) DEFAULT 0,
                            FOREIGN KEY (fromId) REFERENCES user(id),
                            FOREIGN KEY (toId) REFERENCES user(id)
                        )';
                $Make[] = 'ALTER TABLE session ADD FOREIGN KEY (productId) REFERENCES product(id)';// set here alter table constr. between session and product
                $Make[] = 'CREATE TABLE report(
                            id int(11) AUTO_INCREMENT  PRIMARY KEY,
                            report varchar(255) NOT NULL,
                            fromId int(11) NOT Null,
                            aboutId int(11) NOT NULL,
                            respond TINYINT(2) DEFAULT 0,
                            sessionId int(11) NOT NULL,
                            FOREIGN KEY (fromId) REFERENCES user(id),
                            FOREIGN KEY (aboutId) REFERENCES user(id),
                            FOREIGN KEY (sessionId) REFERENCES session(id)
                        )';
                $Make[] = 'CREATE TABLE sessionEnters(
                            id int(11) AUTO_INCREMENT  PRIMARY KEY,
                            sessionId int(11) NOT NULL,
                            userId int(11) NOT NULL,
                            FOREIGN KEY (sessionId) REFERENCES session(id),
                            FOREIGN KEY (userId) REFERENCES user(id)
                        );';
                $Make[] = 'CREATE TABLE activity(
                    id int(11) AUTO_INCREMENT  PRIMARY KEY,
                    type TINYINT(2) NOT NULL,
                    activityDate DATETIME NOT NULL,
                    statusKind int(11) NOT NULL,
                    amount int(11) NOT NULL,
                    userId int(11) NOT NULL,
                    FOREIGN KEY (userId) REFERENCES user(id)
                );';
                $Make[] = 'CREATE TABLE sessionOffers(
                    id int(11) AUTO_INCREMENT  PRIMARY KEY,
                    offer int(11) NOT NULL,
                    userId int(11) NOT NULL,
                    sessionId int(11) NOT NULL,
                    offerTime DATETIME,
                    FOREIGN KEY (userId) REFERENCES user(id),
                    FOREIGN KEY (sessionId) REFERENCES session(id)
                );';
                for($i = 0 ; $i< sizeof($Make); $i++){
                    $this->setSqlQur($Make[$i]);
                }//end of loop function
            }//end of mk function 
            public function edit(){
                $Make = array();
                $Make[] = 'CREATE TABLE categorie(
                    id int(11) AUTO_INCREMENT  PRIMARY KEY,
                    icon varchar(255),
                    sessionName varchar(255) NOT NULL,
                    numOfSession int(11),
                    details varchar(255) NOT NULL)';
                for($i = 0 ; $i< sizeof($Make); $i++){
                    $this->setSqlQur($Make[$i]);
                }//end of loop function
            }//end of edit function
    }//end of class data base
/*
$con = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
$con->setTable('user');
//$con->update(array("firstName"), array("shrouk2"), array("email"),array("shrouk@gmail.com"));
$con->delete(array("id"),array("4"));
$data = $con->select("firstName");
var_dump($data);
*/
//$test->insert(array("icon","sessionName", "numOfSession", "details"),array("fa-car", "cars", 5, "testtest"));
    //$array1 = array('firstName', 'lastName', 'gender','userName','email','userPassword', 'imagePath','userRole');
    //$array2 = array('abdelrhman', 'solieman',1,'bodey__Solieman2', 'abdelr2hman.solieman98@gmail.com', sha1('1234A'),'test',1);
    //$array1 = array('fromId','toId', 'details');
    //$array2 = array(2,1, 'details');
    //var_dump($test->innerJoin("firstName","toId","user","id"));;
    /*$test->curQuery = "UPDATE mazad.user SET firstName = :firstName WHERE id = :id";
    $stmt = $test->con->prepare($test->curQuery);
    $stmt->execute(array(':firstName' => 'testest', ':id' => 2));
    $test->insert(
    array('firstName', 'lastName', 'userName', 'email',  'userPassword', 'userRole', 'imagePath', 'gender'), 
    array('body', 'solieman', 'bodey__solieman','abdelrhman.s1solieman98@gamil.com', sha1('1234A'),1,'testtest', 1));
    $db = new dataBase('localhost', 'test2', 'root', '1234A');
    $db->setTable('habd');
    $allData = $db->select('*',1,true);
    for($i=0;$i<sizeof($allData);$i++){
        echo $allData[$i]['col1']. " " . $allData[$i]['col2']. "\n";}
    $db->insert(array("col1","col2"), array("njdgfkhsdfjg",120));
    $all = $db->mkInsertArray(array('test', 'test2'),array('1',2));
    print_r($all);
    echo $all[':test2'];
    print_r($db->insertFormat(array('test', '10')));
    $db->setTable('habd');
    $db->insert(array('col1', 'col2'), array('int',10));
    try{
        $con = new PDO('mysql:host=localhost;dbname=test2', 'root', '1234A', array("SET NAMES utf8"));
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $stmt = $con->prepare('INSERT INTO test2.habd  SET col1=:col1, col2=:col2');
    $stmt->execute(array(":col1"=>'bodey', ":col2"=> 120));
    try{
        $con = new PDO('mysql:host=localhost;dbname=test2', 'root', '1234A');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $con->prepare('INSERT INTO test2.habd (col1,   ) VALUES (:col1, :col2)');
        $stmt->execute(array(':col1'=>'ISLQm', ':col2'=>2002));
    }catch(PDOException $e){
        echo $e->getMessage();
        echo "good";
    }
    $stmt = $con->prepare("INSERT INTO test2.habd (col1,col2) values (':col1',10)");
    $stmt->execute();
    echo $stmt->rowCount();
    print_r($all);
    */
/*
    $testDataBase = new dataBase("localhost", "mazad", "root","");
    $testDataBase->setTable('user');
    $testDataBase->insert(array('firstName','lastName','gender', 'userName', 'email','userPassword', 'imagePath','userRole'),
     array('shrouk', 'ragab', 1, 'shroukRagab', 'shrouk@gmail.com',sha1('1234A'),'imgs/or2.jpeg',1));*/