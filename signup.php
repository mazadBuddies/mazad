<?php
    require_once "init.php";
?>

<div class="form col-lg-4 col-md-6 col-sm-8" id='test'>
          <div class="myCon">
               <h2 class="title"><i class="fa fa-bullseye"></i>Sign up</h2>
                <form action="" class="signUp" method="post" autocomplete="off">
                    <div class="row">
                        <div class="firstName col-6">
                            <label for="firstName" class="col-12">First Name</label>
                            <div class="border">
                                <input type="text" name="firstName" class="col-12" placeholder='more than 3 chars'/>
                            </div>
                        </div>
                        <div class="lastName col-6">
                            <label for="lastName" class="col-12">Last Name</label>
                            <div class="border">
                                <input type="text" name="lastName" class="col-12"  placeholder='more than 3 chars'/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="email col-12">
                            <label for="email" class="col-12">Email address</label>
                            <div class="border">
                                <input type="email" name="email" class="col-12"  placeholder='Your@mail.com'/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="userName col-12">
                            <label for="userName" class="col-12">Username</label>
                            <div class="border">
                                <input type="text" class="col-12" name="userName"  placeholder='eg. mr.robot'/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="phone col-12">
                            <label for="phoneNumber" class="col-12">Phone</label>
                            <div class="border">
                                <input type="tel" class="col-12" name="phoneNumber" placeholder='0-111-1111-111'/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="password col-12">
                            <label for="password"  class="col-12">Password</label>
                            <div class="border add-icon">
                                <input type="password" class="col-12" name="password" data-show="true" placeholder="Enter strong password"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="rePassword col-12">
                            <label for="comPassword" class="col-12">Password Confirmation</label>
                            <div class="border add-icon">
                                <input type="password" class="col-12" name="comPassword" data-show="true" placeholder="Rewrite password"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                           <div class="row">
                               <div class="col-4"><p class='gen'>Gender</p></div>
                                <div class="col-4">
                                    <input id="gen1" type="radio" class="col-1" name="gender" value="male" checked/>
                                    <label for="gen1" class="col-11">Male</label>
                                </div>
                                <div class="col-4">
                                    <input id="gen2" type="radio" class="col-1" name="gender" value="female"/>
                                    <label for="gen2" class="col-11">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sup">
                        <input type="submit" value = "Sign Up"/>
                    </div>
                </form>
            </div>
            <p>
                * By signing up, you agree to receive Stox emails, newsletters &amp; updates.
            </p>
        </div>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>