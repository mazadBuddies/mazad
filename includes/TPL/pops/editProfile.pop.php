<?php
    session_start();
    include "include/TPL/profile.inc.php";
   
?>
<div class="form col-lg-4 col-md-6 col-sm-8" id="test">
          <div class="myCon">
               <h2 class="title"><i class="fa fa-bullseye"></i>Edit MY INFO</h2>
                <form action="/mazad/class/editProfile.pop.php" class="signUp ajax_file submit" data-method="post" autocomplete="off" enctype="multipart/form-data" id="editProfile" data-action="Edit" data-accept="11" data-url="/mazad/class/editProfile.pop.php">
                    <div class="row">
                        <? php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                             if (empty($_POST["firstName"])) {
                         } else {
                                 $firstname = test_input($_POST["firstName"]);
                                }?>

                        <div class="firstName col-6">
                            <label for="firstName" class="col-12">First Name</label>
                            <div class="border">
                                <input type="text" name="firstName" class="col-12" placeholder="more than 3 chars"/>
                            </div>
                        </div>
                        <div class="lastName col-6">
                              <? php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                             if (empty($_POST["lastName"])) {
                         } else {
                                 $lastname = test_input($_POST["lastName"]);
                                }?>
                            <label for="lastName" class="col-12">Last Name</label>
                            <div class="border">
                                <input type="text" name="lastName" class="col-12"  placeholder="more than 3 chars"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                          <? php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                             if (empty($_POST["email"])) {
                         } else {
                                 $email = test_input($_POST["email"]);
                             }?>
                        <div class="email col-12">
                            <label for="email" class="col-12">Email address</label>
                            <div class="border">
                                <input type="email" name="email" class="col-12"  placeholder="Your@mail.com"/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                          <? php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                             if (empty($_POST["userName"])) {
                         } else {
                                 $userName = test_input($_POST["userName"]);
                                }?>
                        <div class="userName col-12">
                            <label for="userName" class="col-12">Username</label>
                            <div class="border">
                                <input type="text" class="col-12" name="userName"  placeholder="eg. mr.robot"/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                          <? php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                             if (empty($_POST["phone"])) {
                         } else {
                                 $Phone = test_input($_POST["phone"]);
                                }?>
                        <div class="phone col-12">
                            <label for="phoneNumber" class="col-12">Phone</label>
                            <div class="border">
                                <input type="tel" class="col-12" name="phoneNumber" placeholder="0-111-1111-111"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="password col-12">
                              <? php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                             if (empty($_POST["password"])) {
                         } else {
                                 $pass = test_input($_POST["password"]);
                                }?>
                            <label for="password"  class="col-12">Password</label>
                            <div class="border add-icon">
                                <input type="password" class="col-12" name="password" data-show="true" placeholder="Enter strong password"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="rePassword col-12">
                              <? php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                             if (empty($_POST["rePassword"])) {
                         } else {
                                 $repass = test_input($_POST["rePassword"]);
                                }?>
                            <label for="comPassword" class="col-12">Password Confirmation</label>
                            <div class="border add-icon">
                                <input type="password" class="col-12" name="comPassword" data-show="true" placeholder="Rewrite password"/>
                            </div>
                        </div>
                    </div>
                
                    <div class="sup">
                           <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="ownerId"/>
                        <input type="submit" value = "EDIT INFO"/>
                    </div>
                </form>
            </div>
            <p>
                <!--* By signing up, you agree to receive Stox emails, newsletters &amp; updates.-->
            </p>
        </div>';
