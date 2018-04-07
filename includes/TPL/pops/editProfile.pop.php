<?php
        include "../../../config/directors.config.php";
        include CLASS_DIR . "autoLoader.class.php";

        $masterUser = new user ();
        $IdData = $masterUser->getUserInfoById(6);
?>

<div class="form col-lg-4 col-md-6 col-sm-8" id="test">
          <div class="myCon">
               <h2 class="title"><i class="fa fa-bullseye"></i>Edit MY INFO </h2>
                <form method="POST" class="signUp ajax submit" data-method="post" autocomplete="off" enctype="multipart/form-data" id="editProfile" data-action="Edit" data-accept="1" data-url="class/user.class.php">
                    <div class="row">
                        <div class="firstName col-6">
                            <label for="firstName" class="col-12">First Name</label>
                            <input name="ACTION" value="Edit" type="hidden">
                            <div class="border">
                                <input type="text" name="firstName" class="col-12" value="<?php echo $IdData[0]['firstName']?>"/>
                            </div>
                        </div>
                        <div class="lastName col-6">
                            
                            <label for="lastName" class="col-12">Last Name</label>
                            <div class="border">
                                <input type="text" name="lastName" class="col-12"  value="<?php echo $IdData[0]['lastName']?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="email col-12">
                            <label for="email" class="col-12">Email address</label>
                            <div class="border">
                                <input type="email" name="email" class="col-12"  value="<?php echo $IdData[0]['email']?>"/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="userName col-12">
                            <label for="userName" class="col-12">Username</label>
                            <div class="border">
                                <input type="text" class="col-12" name="userName"  value="<?php echo $IdData[0]['userName']?>"/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="phone col-12">
                            <label for="phoneNumber" class="col-12">Phone</label>
                            <div class="border">
                                <input type="tel" class="col-12" name="phoneNumber" placeholder="0-111-1111-111"/>
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
                      <input type="hidden" value="6" name="id"/>
                      
                    <div class="sup">
                        <input type="submit" value = "EDIT INFO"/>
                    </div>
                </form>
            </div>
            <p>
                * By Editing your Info , you agree to changing your Profile Info. 
            </p>
        </div>
        <script src="../../../js/jquery.min.js"></script>
        <script src="../../../js/forms.js"></script>
        <script src="../../../js/main.js"></script>