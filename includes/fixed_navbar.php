<?php

$email=$_SESSION['email'];
$fname= $row['first_name'];
$lname= $row['last_name'];
$name = $fname . "" . $lname;

$queryuser = $conn->query("SELECT id FROM users WHERE email='$email'");

if ($queryuser->num_rows > 0) {
  while($rowuser = $queryuser->fetch_assoc()) {

  $user=$rowuser['id'];
$sessionid=$user;
}
}

?>
        <!-- Fixed navbar -->
        <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
            <div class="container-fluid">

                <div class="navbar-header">
                    <a href="#sidebar-menu" data-effect="st-effect-1" data-toggle="sidebar-menu"
                       class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1"
                       class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a>
                    <a class="navbar-brand" href="index.php"><img src="images/2gether-white.png"
                                                                  style="width: 100px; margin: 10px 0 0 30px"/></a>
                </div>



                <!-- Collect the nav links, forms, and other content for toggling -->


                <div class="collapse navbar-collapse" id="main-nav">



                  <?php include ('nav_search.php'); ?>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs">
                            <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1">
                                <i class="fa fa-comments"></i>
                            </a>
                        </li>
                        <!-- User -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                <img src="<?php echo $row['avatar'] ?>" alt="Bill" class="img-circle" /> <?php echo $row['first_name'] ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li <?php if ($p == 'profile') echo "class='active'"; ?>><?php echo '<a href="user_profile.php?u=', urlencode($sessionid), '">' ?>
                                    My Profile<i class="fa fa-user pull-right"></i></a></li>
                                <li <?php if ($p == 'timeline') echo "class='active'"; ?>><?php echo '<a href="user_timeline.php?u=', urlencode($sessionid), '">' ?>
                                    My Timeline<i class="fa fa-trello pull-right"></i> </a></li>
                                <li <?php if ($p == 'settings') echo "class='active'"; ?>><?php echo '<a href="user_settings.php?u=', urlencode($sessionid), '">' ?>
                                    Settings<i class="fa fa-wrench pull-right"></i> </a></li>
                                <li><a href="parse/logout.php">Logout<i class="fa fa-sign-out pull-right"></i> </a></li>
                            </ul>
                        </li>
                    </ul>


                    <?php include ('nav_notifications.php') ?>

                    <?php include ('nav_messages.php'); ?>


                    <ul class="nav navbar-nav navbar-right">
                        <!-- notifications -->
                        <li class="dropdown notifications updates">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa-lg md-group-add"></i>

                                <?php include ('parse/requests_count.php'); ?>

                            </a>
                            <ul class="dropdown-menu" role="notification" style="max-height:500px; overflow-y: scroll;">
                                <li class="dropdown-header" style="color: #9e1f63">Friend requests</li>

                        <?php include ('parse/get_requests.php'); ?>

                            </ul>
                        </li>


                    </ul>

                </div>
                <!-- /.navbar-collapse -->

            </div>
        </div>


<?php include ('sidebar_chat.php'); ?>
