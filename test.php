<?php
$dataBase  = new dataBase(HOST, DB_NAME, DB_USER, DB_PASS);
$dataBase->setTable('user');
print_r($dataBase->select());
