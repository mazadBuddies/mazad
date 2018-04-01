<section class="admin-panel col-11">
        <div class="container-fluid">
            <h2 class="makeOverLay">Admin Panel</h2>
            <div class="stat">
                <h3>Statistics</h3>
                <div class="con">
                    <p>users</p>
                    <div class="cir">
                        <span class="number">
                        <?php 
                            $test = new dataBase(HOST ,DB_NAME,DB_USER, DB_PASS);
                            $test->setTable("user");
                            echo $test->getCount();
                        ?>
                        </span>
                    </div>
                </div>

                <div class="con">
                    <p>Sessions</p>
                    <div class="cir">
                        <span class="number">123</span>
                    </div>
                </div>

                <div class="con">
                    <p>Admin</p>
                    <div class="cir">
                        <span class="number">19</span>
                    </div>
                </div>

                <div class="con">
                    <p>Categories</p>
                    <div class="cir">
                        <span class="number">8</span>
                    </div>
                </div>
            </div><!-- end of div.stat-->
            <div class="manage-user">
                <h3>manage-user</h3>
                <div class="tbl">
                    <table>
                        <tr class="head">
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Rate</th>
                            <th>Number Of Reports</th>
                            <th> controls</th>
                        </tr>
                        <?php 
                            
                            $test->setTable('user');

                            $allData = $test->select();
                            
                            for($i = 0; $i<sizeof($allData);$i++){
                                ?>
                                <tr>
                                <th>
                                    <div class="cir">
                                        <img src= <?php echo $allData[$i]["imagePath"];?> alt="">
                                    </div>
                                </th>
                                <th>
                                    <?php echo $allData[$i]['firstName'];?>
                                </th>
                                <th>
                                    190
                                </th>
                                <th>
                                    3
                                </th>
                                <th>
                                    <?php
                                        echo ($allData[$i]["blocked"])?"<button class='good'>Activte</button>":"<button>Deactivte</button>";?>
                                    <!--<button class="danger">Delete</button>-->
                                </th>
                            </tr>
                            <?php }?>
                        
                        
                    </table>
                </div><!-- end of div tbl-->
            </div><!-- end of div manage-user-->

            <div class="manage-cats">
                <h3>Manage Categories</h3>
                <table>
                    <tr class="head">
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Number Of Session</th>
                        <th>Details</th>
                        <th> controls</th>
                    </tr>
                    <tr>
                        <th>
                            <div class="cir">
                                <i class="fas fa-car"></i>
                            </div>
                        </th>
                        <th>
                            cars
                        </th>
                        <th>
                            24
                        </th>
                        <th>
                            buying old cars
                        </th>
                        <th>
                            <button>Edit</button>
                            <button class="danger">Delete</button>
                        </th>
                    </tr>
                </table>
                <button class="add">Add New</button>
            </div><!-- end of div manage-cats-->

            <div class="manage-cats">
                    <h3>Manage Reports</h3>
                    <table>
                        <tr class="head">
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Session Name (id)</th>
                            <th>Details</th>
                            <th>controls</th>
                        </tr>
                        <tr>
                            <th>
                                <div class="cir">
                                    <img class="img-responsive" src="imgs/sherif.jpg"></img>
                                </div>
                            </th>
                            <th>
                                sherif
                            </th>
                            <th>
                                KIA (10)
                            </th>
                            <th>
                                sewar mn 3l elface
                            </th>
                            <th>
                                <button>Clear</button>
                                <button class="danger">Block</button>
                            </th>
                        </tr>

                        <tr>
                            <th>
                                <div class="cir">
                                    <img class="img-responsive" src="imgs/islam.jpg"></img>
                                </div>
                            </th>
                            <th>
                                Islam
                            </th>
                            <th>
                                FAIT (20)
                            </th>
                            <th>
                                sewar 3'er la2eka
                            </th>
                            <th>
                                <button>Clear</button>
                                <button class="danger">Block</button>
                            </th>
                        </tr>
                    </table>
                </div><!-- end of div manage-cats-->

                <div class="manage-session">
                    <h3>Manage Session</h3>
                    <table>
                        <tr class="head">
                            <th>Id</th>
                            <th>Auto Sell</th>
                            <th>Blind</th>
                            <th>startTime</th>
                            <th>endTime</th>
                            <th>Item</th>
                            <th>Controls</th>
                        </tr>
                        <tr>
                            <th>
                                12
                            </th>
                            <th>
                                400K<sup>EGP</sup>
                            </th>
                            <th>
                                <i class="fas fa-circle on"></i>
                            </th>
                            <th>
                                11.2.2018 9:23 PM
                            </th>
                            <th>
                                12.2.2018 10:03 PM
                            </th>
                            <th>
                                BMW E36
                            </th>
                            <th>
                                <button>Block</button>
                                <button class="danger">Delete</button>
                            </th>
                        </tr>
                    </table>
                    <!-- id  autoSell 	isBlind 	startTime 	endTime 	itemId  -->
                </div>
        </div><!-- end of section container-fluid-->
    </section><!-- end of section admin-panel-->
