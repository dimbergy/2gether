 <!-- notifications -->
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown notifications updates">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge badge-danger">4</span>
                            </a>
                            <ul class="dropdown-menu" role="notification"  style="max-height:500px; overflow-y: scroll;">
                                <li class="dropdown-header">Notifications</li>

                                <?php
$not1 = $conn->query("SELECT id, added_by, post_cat, added_at FROM posts WHERE posted_to=$sessionid AND added_by!=$sessionid AND post_status=0 ORDER BY added_at DESC");
if($not1->num_rows > 0) {

    while($rownot1 = $not1->fetch_assoc()) {
        $person = $conn->query("SELECT id, first_name, last_name, avatar FROM users WHERE users.id=".$rownot1['added_by']."");
        if($person->num_rows > 0) {

            while ($rowper = $person->fetch_assoc()){ ?>



        <li class="media">
            <div class="pull-right">
                <a href="user_timeline.php?u=<?php echo $sessionid ?>"><span id="<?php echo $rownot1['id'] ?>" class="postnot label label-danger">New</span></a>
            </div>
            <div class="media-left">
                <img src="<?php echo $rowper['avatar'] ?>" alt="people" class="img-circle"
                     width="30">
            </div>
            <div class="media-body">
                <a href="friend_profile.php?u=<?= $rowper['id']; ?>"><?php echo $rowper['first_name']?></a>
                <?php if($rownot1['post_cat']==1) { ?>
                    wrote<a href="user_timeline.php?u=<?php echo $sessionid ?>"> somethnig</a>
                <?php } else if ($rownot1['post_cat']==2) { ?>
                    posted<a href="user_timeline.php?u=<?php echo $sessionid ?>"> a photo</a>
                    <?php } else if ($rownot1['post_cat']==3) { ?>
                    posted<a href="user_timeline.php?u=<?php echo $sessionid ?>"> a video</a>
                    <?php } else { ?>
                    posted<a href="user_timeline.php?u=<?php echo $sessionid ?>"> a link</a>
                    <?php } ?>
                    on your timeline.
                <br/>
                <span class="text-caption text-muted">at <?php echo $rownot1['added_at'] ?></span>
            </div>
        </li>


  <?php  }
}
                                }
                                }

       $not2 = $conn->query("SELECT comments_posts.id AS comid, com_at, com_by, post_id, post_cat, posted_to FROM comments_posts INNER JOIN posts ON posts.id=post_id WHERE com_by!=$sessionid AND posted_to=$sessionid AND com_status=0");
if($not2->num_rows > 0) {
    while($rownot2=$not2->fetch_assoc()){
        $per2 = $conn->query("SELECT id, first_name, last_name, avatar FROM users WHERE users.id=".$rownot2['com_by']."");
        if($per2->num_rows > 0){
            while($rowper2 = $per2->fetch_assoc()){ ?>


                                <li class="media">
                                    <div class="pull-right">
                                        <a href="user_timeline.php?u=<?php echo $sessionid ?>"><span id="<?php echo $rownot2['comid'] ?>" class="comnot label label-danger">New</span></a>
                                    </div>
                                    <div class="media-left">
                                        <img src="<?php echo $rowper2['avatar'] ?>" alt="people" class="img-circle"
                                             width="30">
                                    </div>
                                    <div class="media-body">
                                        <a href="friend_profile.php?u=<?php echo $rowper2['id'] ?>"><?php echo $rowper2['first_name']?></a> commented a post on <a
                                                href="user_timeline.php?u<?php echo $sessionid ?>">your</a> timeline.
                                        <br/>
                                        <span class="text-caption text-muted"><?php echo $rownot2['com_at'] ?></span>
                                    </div>
                                </li>

            <?php          }

        }

    }

}


                                $not3 = $conn->query("SELECT likes_posts.id AS likepostid, liked_by, post_id FROM likes_posts INNER JOIN posts ON posts.id=post_id WHERE liked_by!=$sessionid AND posted_to=$sessionid AND like_status=0");
                                if($not2->num_rows > 0) {
                                    while($rownot3=$not3->fetch_assoc()){
                                        $per3 = $conn->query("SELECT id, first_name, last_name, avatar FROM users WHERE users.id=".$rownot3['liked_by']."");
                                        if($per3->num_rows > 0){
                                            while($rowper3 = $per3->fetch_assoc()){ ?>


                                                <li class="media">
                                                    <div class="pull-right">
                                                        <a href="user_timeline.php?u=<?php echo $sessionid ?>"><span id="<?php echo $rownot3['likepostid'] ?>" class="likenotpost label label-danger">New</span></a>
                                                    </div>
                                                    <div class="media-left">
                                                        <img src="<?php echo $rowper3['avatar'] ?>" alt="people" class="img-circle"
                                                             width="30">
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="friend_profile.php?u=<?php echo $rowper3['id'] ?>"><?php echo $rowper3['first_name']?></a> liked a post on <a
                                                                href="user_timeline.php?u<?php echo $sessionid ?>">your</a> timeline.

                                                    </div>
                                                </li>

                                            <?php          }

                                        }

                                    }

                                }

                                $not4 = $conn->query("SELECT likes_com_posts.id As likecompostid, liked_by, comment_id FROM likes_com_posts INNER JOIN comments_posts ON comments_posts.id=comment_id WHERE liked_by!=$sessionid AND com_by=$sessionid AND like_status=0");
                                if($not4->num_rows > 0) {
                                    while($rownot4=$not4->fetch_assoc()){
                                        $per4 = $conn->query("SELECT id, first_name, last_name, avatar FROM users WHERE users.id=".$rownot4['liked_by']."");
                                        if($per4->num_rows > 0){
                                            while($rowper4 = $per4->fetch_assoc()){ ?>


                                                <li class="media">
                                                    <div class="pull-right">
                                                        <a href="user_timeline.php?u=<?php echo $sessionid ?>"><span id="<?php echo $rownot4['likecompostid'] ?>" class="likenotcom label label-danger">New</span></a>
                                                    </div>
                                                    <div class="media-left">
                                                        <img src="<?php echo $rowper4['avatar'] ?>" alt="people" class="img-circle"
                                                             width="30">
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="friend_profile.php?u=<?php echo $rowper4['id'] ?>"><?php echo $rowper4['first_name']?></a> liked a comment of <a
                                                                href="user_timeline.php?u<?php echo $sessionid ?>">you</a> on your timeline.

                                                    </div>
                                                </li>

                                            <?php          }

                                        }

                                    }

                                }

                                ?>

                            </ul>
                        </li>

                    </ul>
                        <!-- // END notifications -->
