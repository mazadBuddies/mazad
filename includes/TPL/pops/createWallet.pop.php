<?php
    include "../../../config/directors.config.php";
    //include ROOT_APP . "init.php";
?>


<section class="body">
<div class="login col-lg-4 col-md-6 col-sm-8">
        <span class="dir-signUp">
            New to Mazad? <a href="signUp.html">Sign up</a>
        </span>
        <div class="form">
            <div class="myCon">
                <h2 class="signIn"><i class="fa fa-bullseye"></i> Sign in</h2>
                <form method="POST" class="signUp ajax submit" data-method="post" autocomplete="off" enctype="multipart/form-data" id="editProfile" data-action="INSERT_WALLET" data-accept="1" data-url="class/wallet.class.php">

                    <div class="row">
                        <div class="email col-12">
                            <label for="email" class="col-12">Email address</label>
                            <div class="border">
                                <input type="text" name="name" class="col-12" placeholder='wallet name' checked/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="password col-12">
                            <label for="password" class="col-12">Password</label>
                            <div class="border add-icon">
                                <input type="text" class="col-12" name="balance" data-show="true" placeholder="Enter your balance" />
                            </div>
                        </div>
                    </div>

                    <div class="sup">
                        <input type="submit" value = "Sign in"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</html>
