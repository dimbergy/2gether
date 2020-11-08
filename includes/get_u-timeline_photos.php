<?php

$postpic = $conn->query("SELECT photoposts.id AS photoid, photopost_thumb, photopost_src, photopost_title, photoposts.post_id, posts.id AS postid, body, added_at, added_by, posted_to, post_city, post_country, post_cat, post_privacy FROM photoposts INNER JOIN posts ON posts.id=post_id WHERE post_cat=2 AND posted_to=$frindex ORDER BY added_at DESC");

if ($postpic->num_rows > 0) {
    $i=0;
    while ($rowpostpic = $postpic->fetch_assoc()) {
$i++;
        ?>

        <div class="item col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive"
                     src="<?php echo $rowpostpic['photopost_thumb'] ?>"
                     alt="" width="300px" data-toggle="modal" data-target="#postPics<?php echo $i ?>">
            </a>
        </div>

        <div class="modal fade modal-fullscreen footer-to-bottom" id="postPics<?php echo $i ?>" role="dialog"  tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog animated zoomInLeft">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">


                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <?php if ($rowpostpic['photopost_title']== "") { ?>
                                    <h4 class="modal-title">Timeline Photos</h4>
                                <?php } else { ?>
                                    <h4 class="modal-title"><?php echo $rowpostpic['photopost_title'] ?></h4>
                            <?php } ?>
                    </div>


                    <div class="modal-body">


                        <div class="col-md-8 col-sm-12 col-xs-12 mediacol">

                            <img class="img-responsive" src="<?php echo $rowpostpic['photopost_src'] ?>" alt=""/>

                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>



                        <div class="col-md-3 col-sm-12 col-xs-12 infocol">

                            <a href="user_timeline.php?u=<?php echo $frindex ?>"><h4><img src="<?php echo $row['avatar'] ?>" alt="" class="img-circle" width="40px"/> <?php echo "&nbsp;"; echo $row['first_name']; echo " "; echo $row['last_name'] ?></h4></a>

                            <div class="meta padding-v-10-12"><p>
                                    <span><i class="fa fa-calendar-o fa-fw"></i> <?php echo $rowpostpic['added_at'] ?></span>
        <?php
        $loc = $conn->query("SELECT city, country FROM cities INNER JOIN posts ON cities.id=post_city INNER JOIN countries ON countries.id=post_country WHERE posts.id=".$rowpostpic['postid']."");
        if($loc->num_rows > 0){
            while($rowloc = $loc->fetch_assoc()){ ?>

                                    <span><i class="fa fa-map-marker fa-fw"></i><?php echo $rowloc['city'].", ".$rowloc['country']; } } ?>
                                    </span>
                                    <?php if($rowpostpic['post_privacy']==0) { ?>
                                        <span><i class="fa fa-globe fa-fw"></i></span>
                                    <?php } else if ($rowpostpic['post_privacy']==1) { ?>
                                        <span><i class="fa fa-user fa-fw"></i></span>
                                    <?php } else if ($rowpostpic['post_privacy']==2) { ?>
                                        <span><i class="fa fa-lock fa-fw"></i></span>
                                    <?php } ?>



                                </p>
                                <p><?php echo $rowpostpic['body'] ?></p>

                                <p class="text-right">added by <?php
                                    if($rowpostpic['added_by']==$sessionid) { ?>
                                    <a href="user_timeline.php?u=<?php echo $sessionid ?>">
                                        <?php } else { ?>
                                        <a href="friend_profile.php?u=<?php echo $rowpostpic['added_by'] ?>">
                                            <?php }


                                            $add = $conn->query("SELECT id, first_name, last_name FROM users WHERE id=".$rowpostpic['added_by']."");
                                            if($add->num_rows > 0){
                                                while ($rowadd = $add->fetch_assoc()){
                                                    echo $rowadd['first_name']." ".$rowadd['last_name']; } } ?>
                                        </a></p>





                            </div>


                            <div class="panel panel-default">
                                <div class="view-all-comments">

                                        <button id="<?php echo $rowpostpic['photoid']?>" type="button" class="likepost btn btn-white btn-sm">
                                            <i class="fa fa-thumbs-o-up fa-lg"></i>
                                        </button>

                                        <span class="likes pull-right padding-v-5-1"><i class="fa fa-thumbs-up fa-lg"></i>&emsp;10 likes</span>

                                </div>
                                <ul class="comments">
                                    <div style="max-height:200px; overflow-y: scroll;">
                                        <?php
                                        $comm = $conn->query("SELECT comments_posts.id AS comid, comment, com_at, com_by, post_id, users.id AS userid, first_name, last_name, avatar FROM comments_posts INNER JOIN users ON com_by=users.id WHERE post_id=" . $rowpostpic['postid'] . "");
                                        if($comm->num_rows > 0) {
                                            while($rowcomm=$comm->fetch_assoc()) { ?>

                                                <li class="media">
                                                    <div class="media-left">
                                                        <?php if($rowcomm['com_by']==$row['id']) {?>
                                                        <a href="user_timeline.php?u=<?php echo $row['id'] ?>">
                                                            <?php } else { ?>
                                                            <a href="friend_profile.php?u=<?php echo $rowcomm['com_by'] ?>">
                                                                <?php }  ?>
                                                                <img src="<?php echo $rowcomm['avatar'] ?>" class="media-object" width="45">
                                                            </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="pull-right dropdown" data-show-hover="li">
                                                            <a href="#" data-toggle="dropdown" class="toggle-button">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#" onclick="document.getElementById('deletecom2').submit();">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                        <?php if($rowcomm['com_by']==$row['id']) {?>
                                                            <a href="user_timeline.php?u=<?php echo $row['id'] ?>  class="comment-author pull-left">
                                                        <?php } else { ?>
                                                            <a href="friend_profile.php?u=<?php echo $rowpost['com_by'] ?>  class="comment-author pull-left">
                                                        <?php } ?>

                                                        <?php echo $rowcomm['first_name'] ?></a>
                                                        <span><?php echo $rowcomm['comment'] ?></span>
                                                        <form id="deletecom2" action="parse/delete_comments.php" method="post" class="hidden">
                                                            <input type="text" name="postid" value="<?php echo $rowpostpic['postid'] ?>">
                                                            <input type="text" name="comid" value="<?php echo $rowcomm['comid'] ?>">
                                                        </form>


                                                        <div class="comment-date">
                                                            <button id="<?php echo $rowcomm['comid'] ?>" type="button" class="likecompost btn btn-white btn-sm"><i class="fa fa-thumbs-o-up fa-lg"></i></button>
                                                            &emsp;&emsp;<span class="likes padding-v-5-1 pull-right"><i class="fa fa-thumbs-up fa-lg"></i>&ensp;3</span>
                                                            <span class="padding-v-5-1 pull-left"><?php echo $rowcomm['com_at'] ?></span></div>
                                                    </div>
                                                </li>



                                            <?php  }
                                        }


                                        ?>

                                    </div>
                                    <li class="comment-form">
                                        <form id="makecomment" name="makecomment" action="parse/comments_on_posts.php" method="post">
                                            <div class="input-group">

                          <span class="input-group-btn">
                   <img src="<?php echo $row['avatar'] ?>" width="35" class="media-object"/>
                </span>
                                                <select id="postid4" name="postid" class="hidden"><option value="<?php echo $rowpostpic['postid'] ?>"></option></select>
                                                <input id="comment4" type="text" name="comment" class="form-control" />

                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        </div>




                    </div>


                </div>

            </div>
        </div>




        <?php
    }

    echo "</div>";
}
?>