<?php
ini_set('display_errors', 1);//this for show errs
error_reporting(~0);// the same target
echo "YEAH";
include "/var/www/html/mazad/config/directors.config.php";
include "/var/www/html/mazad/class/autoLoader.class.php";

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if($_FILES["images"]["name"] != ''){
        $up = new fileUploader('/var/www/html/mazad/testIm/', 'images');
        print_r($up->upload());
    }
}
