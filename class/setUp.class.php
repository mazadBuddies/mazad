<?php
/*
 ************** this file include for globals ********************
 *           this V.1.0 of mazad website at 2 feb 2018           *
 *          this file contains database class                    *
 *****************************************************************
*/

define ("ROOT_APP_PATH", "../");
include "../config/directors.config.php";
require_once "../global.php";
require_once "dataBase.class.php";

$users = array();
$users[] = array('shehab', 'ahmed', 1, 'shehab98', 'shehab@gmail.com', '1998-03-07',sha1('1234A'), 'imgs/shehab.jpeg',1);
$users[] = array('abdo', 'shaker', 1, 'shaker98', 'shaker@gmail.com', '1998-03-07',sha1('1234A'), 'imgs/12.jpg',2);
$users[] = array('abdo', 'hashem', 1, 'hashem98', 'hashem@gmail.com', '1998-03-07',sha1('1234A'), 'imgs/hashem.jpg',1);
$users[] = array('bodey', 'Solieman', 1, 'solieman98', 'bodey@gmail.com', '1998-03-07',sha1('1234A'), 'imgs/shehab.jpeg',2);
$users[] = array('islam', 'tarek', 1, 'islam98', 'islam@gmail.com', '1998-03-07',sha1('1234A'), 'imgs/islam.jpg',1);
$users[] = array('shrouk', 'ragab', 2, 'shrouk98', 'shrouk@gmail.com', '1998-03-07',sha1('1234A'), 'imgs/shrouk.jpeg',2);
$users[] = array('sherif', 'mohamed', 1, 'sherif98', 'sherif@gmail.com', '1998-03-07',sha1('1234A'), 'imgs/sherif.jpg',1);
$createProjectDataBase = new dataBase(HOST, "test", DB_USER, DB_PASS);
$createProjectDataBase->mk();
$createProjectDataBase = null;
$createProjectDataBase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
$createProjectDataBase->setTable('user');
for($i=0;$i<sizeof($users);$i++){
	$createProjectDataBase->insert(array('firstName', 'lastName', 'gender', 'userName', 'email', 'birthDate','userPassword', 'imagePath', 'userRole'), $users[$i]);
}
print_r($createProjectDataBase->select());
$createProjectDataBase->setTable('categorie');
$createProjectDataBase->insert(array('icon', 'catiegorieName', 'details'), array('fa fa-test','Cars','testtest'));


echo "<h1>MAZAD CREATED YA BROOOOOOOOOOO HEEEEEEEEEEEEEEEEEEEEEEEE</h1>";

print_r($createProjectDataBase->select());