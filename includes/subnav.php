

        <nav class="navbar navbar-subnav navbar-static-top <?php if ($p == 'timeline' || $p == 'profile' || $p == 'friend_profile' || $p == 'friend_friends' || $p == 'friend_photos') echo "margin-bottom-none" ?>"
             role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-ellipsis-h"></span>
                    </button>
                </div>




                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="subnav">
                    <ul class="nav navbar-nav ">

        <?php if ($u == 'user') { ?>

                        <li <?php if ($p == 'timeline') echo "class='active'"; ?>><?php echo '<a href="user_timeline.php?u=', urlencode($row['id']), '">' ?>
                            <i class="fa fa-fw fa-trello"></i> My Wall</a></li>

                        <li <?php if ($p == 'profile') echo "class='active'"; ?>><?php echo '<a href="user_profile.php?u=', urlencode($row['id']), '">' ?>
                            <i class="fa fa-fw icon-user-1"></i> My Profile</a></li>

                        <li <?php if ($p == 'friends') echo "class='active'"; ?>><?php echo '<a href="user_friends.php?u=', urlencode($row['id']), '">' ?>
                            <i class="fa fa-fw fa-users"></i> My Friends</a></li>

            <li <?php if ($p == 'photos') echo "class='active'"; ?>><?php echo '<a href="user_photos.php?u=', urlencode($row['id']), '">' ?>
                <i class="fa fa-picture-o"></i> My Photos</a></li>
                        <li <?php if ($p == 'messages') echo "class='active'"; ?>><?php echo '<a href="user_messages.php?u=', urlencode($row['id']), '">' ?>
                            <i class="icon-comment-fill-1"></i> My Messages</a></li>


        <?php } else if ($u=='friend') { ?>


            <li <?php if ($p == 'friend_profile') echo "class='active'"; ?>><?php echo '<a href="friend_profile.php?u=', urlencode($id), '">' ?>
                <i class="fa fa-fw icon-user-1"></i> Profile</a></li>

            <li <?php if ($p == 'friend_friends') echo "class='active'"; ?>><?php echo '<a href="friend_friends.php?u=', urlencode($id), '">' ?>
                <i class="fa fa-fw fa-users"></i> Friends</a></li>

            <li <?php if ($p == 'friend_photos') echo "class='active'"; ?>><?php echo '<a href="friend_photos.php?u=', urlencode($id), '">' ?>
                <i class="fa fa-picture-o"></i> Photos</a></li>

            <?php } ?>


            </ul>

            </div>
            <!-- /.navbar-collapse -->
            </div>

            </nav>




