

<section class="profile col-11">
        <div class="container-fluid">
            <h2 class="head">My Account</h2>
            <div class="row">
                <div class="col-md-12 myInfo">
                    <h3>Info</h3>
                    <div class="menu-header">
                            <div class="menu">
                                    <ul>
                                        <li class="active" data-color="green"> 
                                            <i class="far fa-dot-circle"></i>
                                            active
                                        </li>
                                        <li data-color="black"> 
                                            <i class="far fa-dot-circle"></i>
                                            offline
                                        </li>
                                        <li data-color="red">
                                            <i class="far fa-dot-circle"></i> 
                                            don't show
                                        </li>
                                    </ul>
                                </div>
                        <div class="img">
                            <img src=<?php $master = new user();
                            $master->getImgPath();?> alt=""/>
                            <!--acive here-->
                        </div>
                    </div>
                    <span class="name"><?php  
                    $master = new user();
                    echo $master->getFullName();
                    ?></span>
                    <div class="row">
                        <table class="col-6">
                                <tr>
                                    <th>Email</th>
                                    <th>solieman@gmail.com</th>
                                </tr>
                                <tr>
                                    <th>User name</th>
                                    <th>bodey__solieman</th>
                                </tr>
                                <tr>
                                    <th>gender</th>
                                    <th>male</th>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <th>20</th>
                                </tr>
                        </table>
                        <table class="col-6">
                            <tr>
                                <th>RANK</th>
                                <th> Candidate Master </th>
                            </tr>
                            <tr>
                                <th>RATE</th>
                                <th>190</th>
                            </tr>
                            <tr>
                                <th>Registered</th>
                                <th>18 months ago</th>
                            </tr>
                            <tr>
                                <th>Last visit</th>
                                <th>20 min</th>
                            </tr>
                    </table>
                    </div>
                    <button class="makeOverLay" data-content="0">Edit Profile</button>
                    <?php 
                        //echo '<button class="follow" data-content="0">FOLLOW</button>';
                    ?>
                </div>
            </div><!-- end of div row-->
            <div class="row row2">
                <div class="wallet col-6">
                    <h3>wallet</h3>
                    <div class="inner">
                        <p>No Wallet Created Yet</p>
                        <div class="cir">
                                <i class="fab fa-google-wallet"></i>
                        </div>
                    </div>
                    <button class="makeOverLay" data-content="2">Create Wallet</button>
                </div>
    
                <div class="power col-5">
                    <h3>
                        Session <span>₽ower</span>
                    </h3>
                    <div class="content row">
                        <div class="left col-6">
                            <p>My ₽ower</p>
                            <span>0.00%</span>
                        </div><!-- end of div left-->
                        <div class="right col-6">
                            <div class="cir">    
                                <i class="fab fa-phoenix-framework fa-5x"></i>
                            </div><!-- end of div cir-->
                        </div><!-- end of div right-->
                    </div><!-- end of div content-->
                    <a href="#">What is Brain Power ?</a>
                </div><!-- end of div power-->
                <div class="container-fluid">
                    <div class="row activity">
                        <div class="col-12">
                            <h3>
                                Activity
                            </h3>
                            <div class="controls">
                                <span class="active first">My Wallet</span>
                                <span>Session</span>
                            </div><!-- end of div controls-->
                            <div class="slide">
                                <div class="inner">
                                    <div class="myWallet">
                                        <table class="wallet">
                                            <tr class="head">
                                                <th>Type</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fa fa-stop-circle"></i>
                                                </th>
                                                <th>26.02.2018</th>
                                                <th>Free 5 EGP</th>
                                                <th></th>
                                                <th><span>+5.00</span><sup>EGP</sup></th>
                                            </tr>
                                            <tr>
                                                    <td>
                                                        <i class="fa fa-stop-circle"></i>
                                                    </th>
                                                    <th>26.02.2018</th>
                                                    <th>Free 5 EGP</th>
                                                    <th></th>
                                                    <th><span>+5.00</span><sup>EGP</sup></th>
                                                </tr>
                                        </table>
                                    </div><!-- end of div wallet-->
                                    <div class="session">
                                        <table class="session">
                                            <tr class="head">
                                                <th>Type</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Final Price</th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <i class="fa fa-stop-circle"></i>
                                                </th>
                                                <th>10.03.2018</th>
                                                <th>sell bike</th>
                                                <th>Race bike with speed cog</th>
                                                <th><span>4000</span><sup>EGP</sup></th>
                                            </tr>
                                        </table><!-- end of div table-->
                                    </div><!-- end of div session-->
                                </div><!-- end of div inner-->
                            </div><!-- end of div slide-->
                        </div><!-- end of div col-12-->
                    </div><!-- end of div activity-->
                </div><!-- end of div container-fluid-->
    
                <div class="following col-12">
                    <h3>Follow</h3>
                    <div class="row">
                        <div class="col-6">
                            <span class="outter">Following</span>
                            <div class="cir f1" data-open = "false">
                                <span class="number" data-open="followPup">
                                    17
                                </span><!-- end of div span-->    
                            </div>
                        </div><!-- end of div col-6-->
                        <div class="col-6">
                            <span class="outter">Followers</span>
                            <div class="cir f2" data-open = "false">
                                <span class="number" data-open="followerPup">
                                    189
                                </span><!-- end of div span-->    
                            </div>
                        </div><!-- end of div col-6-->
                    </div><!-- end of div row-->
                    <?php 
                        include "profile_pops/followers.inc.php";
                        include "profile_pops/following.inc.php";
                    ?>
                </div><!-- end of div follow-->
    
                <div class="col-12 feedbacks">
                    <h2> Feedbacks</h2>
                    <div class="tbl">
                        <table>
                            <tr class="head">
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Stars</th>
                                <th>Date</th>
                                <th>Details</th>
                            </tr>
                            <?php
                            $masterFeed = new feedback();
                            $myFeeds = $masterFeed->getAllMyFeedBacks($_SESSION['id']);
                            for($i=sizeof($myFeeds)-1; $i>=0;$i--){
                                echo'<tr>
                                        <th>
                                            <div class="cir">
                                                <img src="';
                                                echo $myFeeds[$i]['photo'];    
                                                echo'" alt="">
                                            </div>
                                        </th>
                                    <th>';
                                    echo $myFeeds[$i]['name'];
                                    echo'</th>
                                    <th>
                                        <div class="stars" data-rate = "';
                                        echo $myFeeds[$i]['stars'];
                                        echo '">
                                            <i class="far fa-star 1"></i>
                                            <i class="far fa-star 2"></i>
                                            <i class="far fa-star 3"></i>
                                            <i class="far fa-star 4"></i>
                                            <i class="far fa-star 5"></i>
                                        </div>
                                    </th>
                                    <th>';
                                    echo $myFeeds[$i]['date'];
                                    echo '</th>
                                    <th>';
                                    echo $myFeeds[$i]['feedback'];;
                                    echo '</th>
                                </tr>';
                            }    
                            ?>
                            
                        </table>
                    </div><!--end of div.tbl-->
                </div>
        </div><!-- end of div container-fluid-->
    </section><!-- end of section profile-->

