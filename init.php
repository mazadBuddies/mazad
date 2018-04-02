<?php
session_start();
include ROOT_APP . "global.php";
include CLASS_DIR . "autoLoader.class.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset='utf-8'/>
    <title>MAZAD</title>
    <link rel="stylesheet" href="fonts/SEGOEUI.ttf"/>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/selectize.default.css"/>
    <link rel="stylesheet" href="css/styles/loader.css">
    <?php $numberOfStyles = includeStyles();?>
    <link rel="stylesheet" href="css/styles/frontEnd1.css" class="sepp" data-count="3" data-cur="1"/> <!-- STRONG STYLE-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
</head>