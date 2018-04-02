<?php
/*
 ************** this file include for globals ********************
 *           this V.1.0 of mazad website at 11 MAR 2018          *
 *          this file contains global config file                *
 *****************************************************************
*/
ini_set('display_errors', 1);//this for show errs
error_reporting(~0);// the same target
function lsStyles(){
    return scandir(STYLE_DIR);
}

function includeStyles(){
    $allStyles = lsStyles(); // get all files on style folder
    for($i = 2; $i < sizeof($allStyles); $i++){
        if(substr($allStyles[$i], -4) == STYLE_EX) // if file is .css include it
            echo '<link rel="stylesheet" href="' . STYLE_DIR . $allStyles[$i] . '"/>';
    }//end of for
    return sizeof($allStyles);// added ******************************
}// end of function includeStyle

function getLastId($tableName, $colName= 'id'){
    $db = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
    $db->setTable($tableName);
    $allData = $db->select();
    $sz = (int)sizeof($allData);
    return ($sz > 0 )?$allData[$sz - 1][$colName]:-1;
}// end of function getLastId

function isLogin(){
    return (isset($_SESSION['firstName']));
}
