<nav class="nav-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="brand col-6">
                <div class="row">
                    <span class="logo col-1">
                        <a href="#">
                            <i class="fab fa-accusoft"></i>
                        </a>
                    </span>
                    <span class="name col-11">
                        <span class="fir">MA</span>
                        <span class="sec">ZAD</span>
                    </span>
                </div>
            </div>

            <div class="availble-bounce col-3">
                <div>   
                    <span class="bold">
                        Available Balance:
                    </span>
                    <span class="balance">
                        <span>5.00</span>
                        <sup>EGP<i class="fa fa-dolar"></i></sup>
                        <i class="fa fa-angle-down sz rotate"></i>
                    </span>
                </div>
            </div>

            <div class="col-3">

                <div class="row">
                    <div class="newSession col-1">
                        <div class="cir">
                            <i class="fa fa-coffee makeOverLay" data-content="1"></i>
                        </div>
                    </div>

                    <div class="info row col-7">
                        <div class="name">
                            <?php echo $_SESSION['firstName'];?>
                        </div>
                    </div>

                    <div class="col-2 info">
                        <div class="cir">
                            <img src= <?php 
                            $master = new user();
                            $master->getImgPath();
                            ?> alt="">
                        </div>
                        <i class="fa fa-angle-down blur ll"></i>

                        <div class="drop-down">
                            <ul>
                                <li>
                                    <i class="far fa-smile"></i>
                                    help
                                </li>
                                
                                <li>
                                    
                                    <a href="logout.php" class="logOut"><i class="fas fa-power-off"></i> logout</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</nav>
