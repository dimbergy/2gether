<?php
$fname= $row['first_name'];
$lname= $row['last_name'];
$name = $fname . "" . $lname;
$index= 'sidebar';

?>

                                    <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu">
                                        <div data-scrollable>
                                            <div class="sidebar-block">
                                                <div class="profile">

                                                    <img src="<?php include 'get_avatar.php'; ?>" alt="people"
                                                         class="img-circle" style="height: 140px; width: 140px"/>

<?php if ($u=='user') {?>
                                                    <div class="image-upload text-right" style="margin-top:-20px">
                                                        <label for="myprofile">
                                                            <i class="fa fa-camera"></i>
                                                        </label>
    <form id="profilepic" name="profilepic" action="parse/upload_profile.php" method="post" enctype="multipart/form-data">
        <input id="myprofile" name="myprofile" type="file" style="display: none" onchange="this.form.submit()"/>
    </form>                                             </div>




<?php } else  {} ?>
                                                    <h4><?php include 'get_name.php'; ?></h4>
                                                </div>
                                            </div>
                                        <?php if ($u=='user') { ?>
                                            <div class="category"> <?php echo '<a href="user_profile.php?u=', urlencode($row['id']), '">' ?>About</a></div>
                                            <?php } else if ($u=='friend') { ?>

                                            <div class="category"> About</div>
                                            <?php } ?>
                                                <div class="sidebar-block">
                                                    <ul class="list-about">
                 <?php include ('get_homeplace_side.php'); ?>

              <li><i class="icon-cake"></i><?php include 'get_daymonth.php'; ?>&nbsp;<?php include 'get_year.php'; ?></li>

                                                        <?php include ('get_sex_side.php');
                                                        include ('get_phone_side.php');
                                                        include ('get_email_side.php');
                                                        ?>

                                                    </ul>
                                                </div>

                                            <?php if($u=='friend') { ?>

                                            <ul class="sidebar-menu">
                                                <li <?php if ($p=='friend_profile') echo "class='active'"; ?>><?php echo '<a href="friend_profile.php?u=', urlencode($id), '">' ?><i
                                                                class="icon-user-1"></i> <span>Profile</span></a></li>

                                                <li <?php if ($p=='friend_friends') echo "class='active'"; ?>><?php echo '<a href="friend_friends.php?u=', urlencode($id), '">' ?>
                                                    <i class="fa fa-group"></i> <span>Friends</span></a></li>
                                                <li <?php if ($p=='friend_photos') echo "class='active'"; ?>><?php echo '<a href="friend_photos.php?u=', urlencode($id), '">' ?><i
                                                            class="fa fa-picture-o"></i> <span>Photos</span></a>
                                                </li>
                                            </ul>
                                        </div></div>

                                <?php } else if ($u=='user') { ?>

    <div class="category">

        <?php echo '<a href="user_photos.php?u=', urlencode($row['id']), '">' ?>Photos</a>

    </div>

                                    <?php include ('get_u-allphotos-side.php'); ?>


                                    <div class="category"> <?php echo '<a href="user_friends.php?u=', urlencode($row['id']), '">' ?>Friends</a></div>
    <div class="sidebar-block">
        <div class="sidebar-photos">
            <ul>

                <?php include ('get_friends_side.php'); ?>

            </ul>

            <a href="user_friends.php?u<?php echo $row['id'] ?>" class="btn btn-inverse btn-xs">view all</a>
        </div>
    </div>


    <div class="category">Activity</div>
    <div class="sidebar-block">
        <ul class="sidebar-feed">
            <li class="media">
                <div class="media-left">
                <span class="media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                </div>
                <div class="media-body">
                    <a href="" class="text-white">Adrian</a> just logged in
                    <span class="time">2 min ago</span>
                </div>
                <div class="media-right">
                    <span class="news-item-success"><i class="fa fa-circle"></i></span>
                </div>
            </li>
            <li class="media">

                <div class="media-left">
                <span class="media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                </div>
                <div class="media-body">
                    <a href="" class="text-white">Adrian</a> just added <a href="" class="text-white">mosaicpro</a> as their office
                    <span class="time">2 min ago</span>
                </div>
                <div class="media-right">
                    <span class="news-item-success"><i class="fa fa-circle"></i></span>
                </div>
            </li>
            <li class="media">
                <div class="media-left">
                <span class="media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                </div>
                <div class="media-body">
                    <a href="" class="text-white">Adrian</a> just logged in
                    <span class="time">2 min ago</span>
                </div>
            </li>
            <li class="media">
                <div class="media-left">
                <span class="media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                </div>
                <div class="media-body">
                    <a href="" class="text-white">Adrian</a> just logged in
                    <span class="time">2 min ago</span>
                </div>
            </li>
            <li class="media">
                <div class="media-left">
                <span class="media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                </div>
                <div class="media-body">
                    <a href="" class="text-white">Adrian</a> just logged in
                    <span class="time">2 min ago</span>
                </div>
            </li>
        </ul>
    </div>
                                    </div></div>




        <?php }


        include ('sidebar_chat.php');

                                            if ($u=='user') {
        include ('showallphotos_sidebar.php');
                                            }

                                ?>

