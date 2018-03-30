<aside class="left-side">
    <div class="content">
        <ul>
            <li data-dir = "dashboard" data-on="true" class="active side">
                <i class="fab fa-audible"></i>  
                <span>Dashboard</span>
            </li>
            <?php 
                $masterUser = new user();
                if($masterUser->getRole() == 1){
                    echo    '<li data-dir = "admin-panel" data-on="true">
                                <i class="fab fa-buromobelexperte"></i>
                                <span>Admin panel</span>
                            </li>';
                            //<i class="fab fa-black-tie"></i>
                }//end of if
            ?>
            <li data-dir = "profile" data-on="true">
                <i class="far fa-user-circle"></i>
                <span>Account</span>
            </li>
            <li data-on="true">
                <i class="fas fa-assistive-listening-systems"></i>
                <span>Make Session</span>
            </li>
            <li class="chng" data-on="false">
                <i class="fas fa-paint-brush"></i>
                <span>Theme</span>
            </li>
            <li data-on="true">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </li>
            <li data-on="true">
                <i class="fas fa-power-off"></i>
                <span>
                    <a href="logout.php">
                        log out
                    </a>
                </span>
            </li>
            <!--
            <i class="fas fa-users"></i>
            <i class="fas fa-clock"></i>
            <i class="fas fa-hourglass-half"></i>
            <i class="fas fa-money-bill-alt"></i>
            <i class="fab fa-optin-monster"></i>
            <i class="fab fa-monero"></i>
            <i class="fa fa-angle-right"></i>-->
        </ul>
    </div>
</aside>
