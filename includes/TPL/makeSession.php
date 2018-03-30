<?php
    session_start();
    include "../../config/directors.config.php";
    include CLASS_DIR . "catiegorie.class.php";
?>

    <div class="form col-lg-4 col-md-6 col-sm-8" id="test">

        <div class="myCon">
            <h2 class="title"><i class="fa fa-bullseye"></i>Add New Session</h2>
                <form action="/mazad/class/session.class.php"; class="signUp" method="post" autocomplete="off" enctype="multipart/form-data" id="mkSession" data-action="ADD" data-accept="11">
                    <div class="row">
                        <div class="firstName col-6">
                            <label for="sessionName" class="col-12">Session Name</label>
                            <div class="border">
                                <input type="text" name="sessionName" class="col-12" placeholder="more than 3 chars"/>
                            </div>
                        </div>
                        <div class="lastName col-6">
                            <label for="startPrice" class="col-12">Start price</label>
                            <div class="border">
                                <input type="text" name="startPrice" class="col-12"  placeholder="100 EGP"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="email col-12">
                            <label for="itemName" class="col-12">product Name</label>
                            <div class="border">
                                <input type="text" name="itemName" class="col-12"  placeholder="Enter Product Name"/>
                            </div>
                        </div>    
                    </div>
                                
                    <div class="row">
                        <div class="firstName col-6">
                            <label for="startTime" class="col-12">Start Time</label>
                            <div class="border">
                                <input type="date" name="startTime" class="col-12" placeholder="more than 3 chars"/>
                            </div>
                        </div>
                        <div class="lastName col-6">
                            <label for="endTime" class="col-12">End time</label>
                            <div class="border">
                                <input type="date" name="endTime" class="col-12"  placeholder="100 EGP"/>
                            </div>
                        </div>
                    </div>

                    <div class="row bt">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <p class="gen">Auto Sell</p>
                                </div>
                                <div class="col-4">
                                    <div class="switch open-panel" data-off="-15px" data-on="-60px" data-name="autoSell" data-tar="false" data-panel="autoSell"></div>
                                </div>
                                <div class="col-4 hidden autoSell">
                                    <input type="text" name="autoSellValue" placeholder="Enter Value" class="autoSellValue"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bt">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4"><p class="gen">Blind Time</p></div>
                                <div class="col-4">
                                    <div class="switch open-panel" data-off="-15px" data-on="-60px" data-name="blind" data-tar="false"></div>
                                </div>
                                <div class="col-4 blind hidden"><!-- hidden-->
                                    <select name="blindTime">
                                        <option value="1">Last hour</option>
                                        <option value="2">Last 2 hour</option>
                                        <option value="3">Last 3 hour</option>
                                        <option value="4">Last 4 hour</option>
                                        <option value="5">Last 5 hour</option>
                                        <option value="6">Last 6 hour</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bt">
                        <div class="col-12">
                           <div class="row">

                               <div class="col-4"><p class="gen">Private</p></div>

                                <div class="col-4">
                                    <div class="switch open-panel" data-off="-15px" data-on="-60px" data-name="private" data-tar="false"></div>
                                </div>

                                <div class="col-12 private hidden"><!-- CUR-->
                                    <div class="row">
                                        <div class="password col-12">
                                            <label for="password" class="col-12">Session Password</label>
                                            <div class="border add-icon">
                                                <input type="password" class="col-12" name="password" data-show="true" placeholder="Enter strong password"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ">
                            <div class="row">
                                <label for="increament" class="col-3">increament</label>
                                <input type="range" value="0"  min="3" max="30" step = "0.1" class="col-7" name="sessionIncreament"/>
                                <span id="val" class="col-1">0</span>
                                <span class="col-1">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="userName col-12">
                            <label for="userName" class="col-12">Image</label>
                            <div class="border">
                                <input type="file" class="col-12" name="images"  placeholder="eg. mr.robot" id="images"/>
                            </div>
                        </div>    
                    </div>

                    <div class="row">
                        <div class="phone col-12">
                            <label for="phoneNumber" class="col-12">Tags</label>
                            <div class="border">
                                <input type="text" class="col-12 tagsInput" placeholder="Enter Tags"/>
                                <input type="hidden" class="setTags" name="tags"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tags">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <label for="increament">Categories</label>
                            <select name="categories" id="">
                               <?php
                                    $cats = new catiegorie();
                                    $allData = $cats->getAllCatiegorie();
                                    print_r($allData);
                                    if(!sizeof($allData)){
                                        echo "<option value=";
                                        echo "not catiegories yet";
                                        echo ">";
                                        echo "not found catiegories yet";
                                        echo "</option>";
                                    }else{
                                        for($i=0;$i<sizeof($allData); $i++){
                                            echo "<option value=";
                                            echo $allData[$i]["id"];
                                            echo ">";
                                            echo $allData[$i]["catiegorieName"];
                                            echo "</option>";  
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="ownerId"/>
                    <div class="sup">
                        <input type="submit" value = "Add Session"/>
                    </div>
                </form>
            </div>
            <p>
                * By signing up, you agree to receive Stox emails, newsletters & updates.
            </p>
        </div>
    