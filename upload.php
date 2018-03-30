<?php
ini_set('display_errors', 1);//this for show errs
error_reporting(~0);// the same target
echo "YEAH";
    if($_FILES["file"]["name"] != ''){
        $test = explode(".", $_FILES['file']['name']);
        $extension = end($test);
        $name = rand(100, 999) . '.' . $extension;
        $location = /*'/var/www/html/mazad/testIm/'*/'/testIm/' . $name;
        move_uploaded_file($_FILE["file"]["temp_name"], $location);
        echo "GOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOD" . $_FILE["file"]["temp_name"];
    }