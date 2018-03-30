<?php
    include "config/directors.config.php";
    include ROOT_APP . "init.php";
    if(isLogin())header("location:index.php");
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $r = new user($_POST['email'], $_POST['password']);
    $r->logIn();
}
?>


<section class="body">
<div class="login col-lg-4 col-md-6 col-sm-8">
        <span class="dir-signUp">
            New to Mazad? <a href="signUp.html">Sign up</a>
        </span>
        <div class="form">
            <div class="myCon">
                <h2 class="signIn"><i class="fa fa-bullseye"></i> Sign in</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                    <div class="row">
                        <div class="email col-12">
                            <label for="email" class="col-12">Email address</label>
                            <div class="border">
                                <input type="email" name="email" class="col-12" placeholder='Your@mail.com' />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="password col-12">
                            <label for="password" class="col-12">Password</label>
                            <div class="border add-icon">
                                <input type="password" class="col-12" name="password" data-show="true" placeholder="Enter strong password" />
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
