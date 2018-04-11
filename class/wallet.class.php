<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../config/directors.config.php";
        include CLASS_DIR . 'autoLoader.class.php';
    }
session_start();
    class wallet{
        private $tableName = 'wallet';
        public function creatWallet($walletName, $balance, $userId){
            $connectToDatabase = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
            $connectToDatabase->setTable($this->tableName);
            $myWallets = $connectToDatabase->select('*', array('ownerId'), array($userId));
            if(sizeof($myWallets)==0){
                $connectToDatabase->insert(
                array('walletName', 'realBalance', 'ownerId'), 
                array($walletName, $balance, $userId));
                return true;
            }//end of if
            return false;
        }//end of function createWallet
    }//end of class wallet


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['ACTION'] == 'INSERT_WALLET'){
            //print_r($_POST);
            $wallet = new wallet();
            $wallet->creatWallet($_POST['name'], $_POST['balance'], $_SESSION['id']);
        }
    }