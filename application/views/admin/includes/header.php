<?php 
    $admin = $this->session->userdata('admin');
?>
<header class="main-header">
    <a href="index2.html" class="logo">
        <span class="logo-mini"><b>A</b>D</span>
        <span class="logo-lg"><b>Admin</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <ul class="menu">
                                <li><!-- start message -->
                                    <!-- <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a> -->
                                </li>
                                <!-- end message -->
                                <li>
                                    
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                        page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <style type="text/css">
                    .nav>li>a>img {
                        float: left;
                        width: 25px;
                        height: 25px;
                        border-radius: 50%;
                        margin-right: 10px;
                        margin-top: -2px;
                        max-width: none;
                    }
                </style>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <? if ($admin["image"] != "" || $admin["image"] != null) {?>
                            <img src="/<?=$admin["image"]?>" alt="User Image" class="img-circle">
                        <?}else{?>
                            <img src="/images/t_img_login.svg" class="img-circle" alt="User Image">
                        <?}?>
                        <span class="hidden-xs"><?php echo $admin['fullname'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <? if ($admin["image"] != "" || $admin["image"] != null) {?>
                                <img src="/<?=$admin["image"]?>" alt="User Image" class="img-circle">
                            <?}else{?>
                                <img src="/images/t_img_login.svg" class="img-circle" alt="User Image">
                            <?}?>
                            <p>
                                <?php echo $admin['fullname'] ?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <!-- <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div> -->
                            <div class="pull-right">
                                <a href="/admin/logout" class="btn btn-default btn-flat" onclick="return confirm('Bạn có chắc muốn đăng xuất không?')">Log out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                </li>
            </ul>
        </div>
    </nav>
</header>
