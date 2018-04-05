<?php
    $_SESSION['sessionId'] = 1;
    $masterSession = new session();
    $masterSession->getSessionById(1);
    $offerTableData = $masterSession->getOffersBySesionId(1);
    //$masterSession->getNewOffers(123344);
?>
<section class="dashboard session-all col-11">
    <div class="container-fluid">
        <div class="session-titles">
            <h2 class="title head"><?php echo $masterSession->getSessionName(); ?></h2>
            <!--<div class="time"> 00:00:00</div>
            <div class="blind"></div>-->
        </div><!--end of sessionTitles-->

        <div class="sessionConnect">
            <div class="row">
                <div class="sessionOffers col-7">
                    <h3>Session Offers</h3>
                    <div class="scroll">
                        <table class="col-12">
                            <tr class="head offers">
                                <th>Offer</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Time</th>
                            </tr>
                            <?php
                                for($i=0; $i<sizeof($offerTableData); $i++){
                                    echo '
                                        <tr>
                                            <th class="offfer">';
                                    echo $offerTableData[$i]['offer'];
                                    echo'<sup>EGP</sup>
                                            </th>
                                            <th>
                                                <div class="cir">
                                                    <img class="img-responsive" src="';
                                                    echo $offerTableData[$i]['image'];
                                                    echo '"></img>
                                                </div>
                                            </th>
                                            <th>';
                                            echo $offerTableData[$i]['name'];
                                            echo '</th>
                                            <th>';
                                            echo $offerTableData[$i]['time'];
                                            echo'</th>
                                        </tr>';
                                }
                            ?>
                        </table>
                    </div>
                    <div class="setOffer">
                        <div class="offerInfo">
                        </div>
                        <div class="offerInput mrg-input">
                                <input type="text" name="offer" placeholder="Enter Your Offer Here" class="offerPanel"/>
                                <button class="myBtn ajax click addNewOffer"  data-url="class/session.class.php" data-action="INSERT_OFFER" data-accept="1" data-method="POST" data-values=""/>Offer</button>
                        </div>
                    </div>
                </div><!--end of sessionOffers-->

                <div class="sessionBroadCast col-4">
                    <div class="messages">
                        <?php 
                        for($i=0;$i<4;$i++)
                        {
                            echo '<div class="message me row">
                            <div class="message-text">Test test test test test</div>
                            <div class="cir">
                                <img class="img-responsive" src="imgs/islam.jpg"></img>
                            </div>
                        </div>
                        <div class="message other row">
                            <div class="cir">
                                <img class="img-responsive" src="imgs/sherif.jpg"></img>
                            </div>
                            <div class="message-text">Test test test test test</div>
                        </div>
                        <div class="message other row">
                            <div class="cir">
                                <img class="img-responsive" src="imgs/12.jpg"></img>
                            </div>
                            <div class="message-text">Test test test test test</div>
                        </div>
                        ';
                        }
                        ?>
                    </div><!--end of message-->
                    <div class="send mrg-input">
                        <input type="text" name="message" placeholder="Enter Your Message Here, Hashem!"/>
                        <button >Send</button>
                    </div><!--end of send-->
                </div><!--end of sessionBroadCast-->
            </div><!--end of row-->
        </div><!--end of sessionConnect-->
        <div class="cir2">
            <i class="fas fa-angle-double-down"></i>
        </div><!--end of cir-->
        <div class="preview">
            
        </div><!--end of preview-->
    </div><!--end of container-->
</section>
