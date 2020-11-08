
<?php
$videos = $conn->query("SELECT videos.id AS vidid, video_src, video_path, video_title, video_desc, video_city, video_country, uploaded_by, uploaded_at, video_privacy, album_id FROM videos WHERE uploaded_by=$id");
if($videos->num_rows > 0) {
    $j=0;
    while($rowvideo=$videos->fetch_assoc()){
        $j++;

        $videoid = $rowvideo['vidid'];


        if($rowvideo['video_privacy']==0) {

            ?>


            <!-- video modal start -->
            <div class="modal fade modal-fullscreen footer-to-bottom" id="myModal<?php echo $j ?>" role="dialog"
                 tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog animated zoomInLeft">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <h4 class="modal-title"><?php echo $rowvideo['video_title'] ?></h4>

                        </div>


                        <div class="modal-body">


                            <div class="col-md-8 col-sm-12 col-xs-12 mediacol">

                                <div class="embed-responsive embed-responsive-16by9">
                                    <video id="my-video" class="video-js" controls preload="auto" width="640"
                                           height="264"
                                           data-setup="{}">
                                        <source src="<?php echo $rowvideo['video_src'] ?>" type='video/mp4'>
                                        <source src="<?php echo $rowvideo['video_src'] ?>" type='video/webm'>

                                    </video>
                                </div>

                                <a class="left carousel-control" href="#myCarousel" data-slide="prev"
                                   style="margin-top:20%; margin-bottom:20%">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next"
                                   style="margin-top:20%; margin-bottom:20%">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                            </div>


                            <div class="col-md-3 col-sm-12 col-xs-12 infocol">

                                <a href="friend_profile.php?u=<?php echo $id ?>"><h4><img
                                                src="<?php echo $rows['avatar'] ?>" class="img-circle"
                                                width="40px"/> <?php echo "&nbsp;";
                                        echo $rows['first_name'];
                                        echo " ";
                                        echo $rows['last_name'] ?></h4></a>

                                <div class="meta"><p><span><i
                                                    class="fa fa-calendar-o fa-fw"></i> <?php echo $rowvideo['uploaded_at'] ?> </span><span><i
                                                    class="fa fa-map-marker fa-fw"></i>
                                            <?php
                                            $vcity = $conn->query("SELECT city FROM cities INNER JOIN videos ON cities.id=video_city WHERE videos.id=$videoid");

                                            if ($vcity->num_rows > 0) {
                                                while ($rowvcity = $vcity->fetch_assoc()) {

                                                    $videocity = $rowvcity['city'];
                                                    echo $rowvcity['city'];
                                                }

                                            }
                                            ?>,
                                            <?php
                                            $vcountry = $conn->query("SELECT country FROM countries INNER JOIN videos ON countries.id=video_country WHERE videos.id=$videoid");
                                            if ($vcountry->num_rows > 0) {
                                                while ($rowvcountry = $vcountry->fetch_assoc()) {

                                                    echo $rowvcountry['country'];
                                                }

                                            }
                                            ?>

                                          </span>
                                        <span>
                            <?php if ($rowvideo['video_privacy'] == 0) { ?>
                                <i class="fa fa-globe fa-fw"></i>
                            <?php } else if ($rowvideo['video_privacy'] == 1) { ?>
                                <i class="fa fa-user fa-fw"></i>
                            <?php } else if ($rowvideo['video_privacy'] == 2) { ?>
                                <i class="fa fa-lock fa-fw"></i>
                            <?php } ?>
                                    </span>


                                    </p>
                                    <p><?php echo $rowvideo['video_desc'] ?></p></div>


                                <div class="panel panel-default">
                                    <div class="view-all-comments">

                                            <button id="<?php echo $vidid ?>" type="button" class="likevideo btn btn-white btn-sm">
                                                <i class="fa fa-thumbs-o-up fa-lg"></i>
                                            </button>

                                            <span class="likes pull-right padding-v-5-1"><i class="fa fa-thumbs-up fa-lg"></i>&emsp;10 likes</span>
                                        </form>
                                    </div>
                                    <ul class="comments">

                                        <div style="max-height:200px; overflow-y: scroll;">

                                            <?php
                                            $vcom = $conn->query("SELECT comments_videos.id AS videocomid, video_comment, videocom_at, videocom_by, video_id, users.id AS userid, first_name, last_name, avatar FROM comments_videos INNER JOIN users ON videocom_by=users.id WHERE video_id=$videoid");
                                            if($vcom->num_rows > 0) {
                                                while($rowvcom=$vcom->fetch_assoc()) { ?>

                                                    <li class="media">
                                                        <div class="media-left">
                                                            <?php if($rowvcom['videocom_by']==$row['id']) {?>
                                                            <a href="user_timeline.php?u=<?php echo $row['id'] ?>">
                                                                <?php } else { ?>
                                                                <a href="friend_profile.php?u=<?php echo $rowvcom['videocom_by'] ?>">
                                                                    <?php }  ?>
                                                                    <img src="<?php echo $rowvcom['avatar'] ?>" class="media-object" width="45">
                                                                </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <?php if($rowvcom['videocom_by']==$row['id']) { ?>
                                                            <div class="pull-right dropdown" data-show-hover="li">
                                                                <a href="#" data-toggle="dropdown" class="toggle-button">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><a href="#" onclick="document.getElementById('deletevcom2').submit();">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                            <form id="deletevcom2" action="parse/delete_videocomments.php" method="post" class="hidden">
                                                                <input type="text" name="videooid" value="<?php echo $videoid ?>">
                                                                <input type="text" name="videocomid" value="<?php echo $rowvcom['videocomid'] ?>">
                                                            </form>
                                                        <?php } ?>

                                                            <?php if($rowvcom['videocom_by']==$row['id']) {?>
                                                            <a href="user_timeline.php?u=<?php echo $row['id'] ?>"  class="comment-author pull-left">
                                                                <?php } else { ?>
                                                                <a href="friend_profile.php?u=<?php echo $rowvcom['videocom_by']; ?>"  class="comment-author pull-left">e
                                                                    <?php }

                                                                    echo "<span>".$rowvcom['first_name']."</span>"; ?></a>
                                                                <span><?php echo $rowvcom['video_comment'] ?></span>
                                                                <div class="comment-date">
        <button id="<?php echo $rowvcom['videocomid'] ?>" type="button" class="likecomvid btn btn-white btn-sm"><i class="fa fa-thumbs-o-up fa-lg"></i></button>
                                                                    &emsp;&emsp;<span class="likes padding-v-5-1 pull-right"><i class="fa fa-thumbs-up fa-lg"></i>&ensp;3</span>

                                                                    <span class="padding-v-5-1 pull-left"><?php echo $rowvcom['videocom_at'] ?></span></div>
                                                        </div>
                                                    </li>



                                                <?php  }
                                            }



                                            ?>





                                        </div>



                                        <li class="comment-form">
                                            <form id="makecomment" name="makecomment" action="parse/comments_on_videos.php" method="post">
                                                <div class="input-group">

                          <span class="input-group-btn">
                   <img src="<?php echo $row['avatar'] ?>" width="35" class="media-object"/>
                </span>
                                                    <select id="videoid2" name="videoid" class="hidden"><option value="<?php echo $videoid ?>"></option></select>
                                                    <input id="videocomment2" type="text" name="vcomment" class="form-control" />

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

            <!-- video modal end -->


            <?php
        } else {

          if($status==1) { ?>

              <!-- video modal start -->
              <div class="modal fade modal-fullscreen footer-to-bottom" id="myModal<?php echo $j ?>" role="dialog"
                   tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog animated zoomInLeft">

                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>

                              <h4 class="modal-title"><?php echo $rowvideo['video_title'] ?></h4>

                          </div>


                          <div class="modal-body">


                              <div class="col-md-8 col-sm-12 col-xs-12 mediacol">

                                  <div class="embed-responsive embed-responsive-16by9">
                                      <video id="my-video" class="video-js" controls preload="auto" width="640"
                                             height="264"
                                             data-setup="{}">
                                          <source src="<?php echo $rowvideo['video_src'] ?>" type='video/mp4'>
                                          <source src="<?php echo $rowvideo['video_src'] ?>" type='video/webm'>

                                      </video>
                                  </div>

                                  <a class="left carousel-control" href="#myCarousel" data-slide="prev"
                                     style="margin-top:20%; margin-bottom:20%">
                                      <span class="glyphicon glyphicon-chevron-left"></span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control" href="#myCarousel" data-slide="next"
                                     style="margin-top:20%; margin-bottom:20%">
                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                      <span class="sr-only">Next</span>
                                  </a>

                              </div>


                              <div class="col-md-3 col-sm-12 col-xs-12 infocol">

                                  <a href="friend_profile.php?u=<?php echo $id ?>"><h4><img
                                                  src="<?php echo $rows['avatar'] ?>" class="img-circle"
                                                  width="40px"/> <?php echo "&nbsp;";
                                          echo $rows['first_name'];
                                          echo " ";
                                          echo $rows['last_name'] ?></h4></a>

                                  <div class="meta"><p><span><i
                                                      class="fa fa-calendar-o fa-fw"></i> <?php echo $rowvideo['uploaded_at'] ?> </span><span><i
                                                      class="fa fa-map-marker fa-fw"></i>
                                              <?php
                                              $vcity = $conn->query("SELECT city FROM cities INNER JOIN videos ON cities.id=video_city WHERE videos.id=$videoid");

                                              if ($vcity->num_rows > 0) {
                                                  while ($rowvcity = $vcity->fetch_assoc()) {

                                                      $videocity = $rowvcity['city'];
                                                      echo $rowvcity['city'];
                                                  }

                                              }
                                              ?>,
                                              <?php
                                              $vcountry = $conn->query("SELECT country FROM countries INNER JOIN videos ON countries.id=video_country WHERE videos.id=$videoid");
                                              if ($vcountry->num_rows > 0) {
                                                  while ($rowvcountry = $vcountry->fetch_assoc()) {

                                                      echo $rowvcountry['country'];
                                                  }

                                              }
                                              ?>

                                          </span>
                                          <span>
                            <?php if ($rowvideo['video_privacy'] == 0) { ?>
                                <i class="fa fa-globe fa-fw"></i>
                            <?php } else if ($rowvideo['video_privacy'] == 1) { ?>
                                <i class="fa fa-user fa-fw"></i>
                            <?php } else if ($rowvideo['video_privacy'] == 2) { ?>
                                <i class="fa fa-lock fa-fw"></i>
                            <?php } ?>
                                    </span>


                                      </p>
                                      <p><?php echo $rowvideo['video_desc'] ?></p></div>


                                  <div class="panel panel-default">
                                      <div class="view-all-comments">
                                              <button id="<?php echo $videoid ?>" type="button" class="likevideo btn btn-white btn-sm">
                                                  <i class="fa fa-thumbs-o-up fa-lg"></i>
                                              </button>

                                              <span class="likes pull-right padding-v-5-1"><i class="fa fa-thumbs-up fa-lg"></i>&emsp;10 likes</span>
                                      </div>
                                      <ul class="comments">

                                          <div style="max-height:200px; overflow-y: scroll;">

                                              <?php
                                              $vcom = $conn->query("SELECT comments_videos.id AS videocomid, video_comment, videocom_at, videocom_by, video_id, users.id AS userid, first_name, last_name, avatar FROM comments_videos INNER JOIN users ON videocom_by=users.id WHERE video_id=$videoid");
                                              if($vcom->num_rows > 0) {
                                                  while($rowvcom=$vcom->fetch_assoc()) { ?>

                                                      <li class="media">
                                                          <div class="media-left">
                                                              <?php if($rowvcom['videocom_by']==$row['id']) {?>
                                                              <a href="user_timeline.php?u=<?php echo $row['id'] ?>">
                                                                  <?php } else { ?>
                                                                  <a href="friend_profile.php?u=<?php echo $rowvcom['videocom_by'] ?>">
                                                                      <?php }  ?>
                                                                      <img src="<?php echo $rowvcom['avatar'] ?>" class="media-object" width="45">
                                                                  </a>
                                                          </div>
                                                          <div class="media-body">
                                                              <?php if($rowvcom['videocom_by']==$row['id']) { ?>
                                                                  <div class="pull-right dropdown" data-show-hover="li">
                                                                      <a href="#" data-toggle="dropdown" class="toggle-button">
                                                                          <i class="fa fa-trash-o"></i>
                                                                      </a>
                                                                      <ul class="dropdown-menu" role="menu">
                                                                          <li><a href="#" onclick="document.getElementById('deletevcom2').submit();">Delete</a></li>
                                                                      </ul>
                                                                  </div>
                                                                  <form id="deletevcom2" action="parse/delete_videocomments.php" method="post" class="hidden">
                                                                      <input type="text" name="videooid" value="<?php echo $videoid ?>">
                                                                      <input type="text" name="videocomid" value="<?php echo $rowvcom['videocomid'] ?>">
                                                                  </form>
                                                              <?php } ?>

                                                              <?php if($rowvcom['videocom_by']==$row['id']) {?>
                                                              <a href="user_timeline.php?u=<?php echo $row['id'] ?>"  class="comment-author pull-left">
                                                                  <?php } else { ?>
                                                                  <a href="friend_profile.php?u=<?php echo $rowvcom['videocom_by']; ?>"  class="comment-author pull-left">
                                                                      <?php }

                                                                      echo "<span>".$rowvcom['first_name']."</span>"; ?></a>
                                                                  <span><?php echo $rowvcom['video_comment'] ?></span>
                                                                  <div class="comment-date">
     <button id="<?php echo $rowvcom['videocomid'] ?>" type="button" class="likecomvid btn btn-white btn-sm"><i class="fa fa-thumbs-o-up fa-lg"></i></button>
                                                                      &emsp;&emsp;<span class="likes padding-v-5-1 pull-right"><i class="fa fa-thumbs-up fa-lg"></i>&ensp;3</span>

                                                                      <span class="padding-v-5-1 pull-left"><?php echo $rowvcom['videocom_at'] ?></span></div>
                                                          </div>
                                                      </li>



                                                  <?php  }
                                              }



                                              ?>





                                          </div>



                                          <li class="comment-form">
                                              <form id="makecomment" name="makecomment" action="parse/comments_on_videos.php" method="post">
                                                  <div class="input-group">

                          <span class="input-group-btn">
                   <img src="<?php echo $row['avatar'] ?>" width="35" class="media-object"/>
                </span>
                                                      <select id="videoid2" name="videoid" class="hidden"><option value="<?php echo $videoid ?>"></option></select>
                                                      <input id="videocomment2" type="text" name="vcomment" class="form-control" />

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


 <?php         }


        }
       }
}



?>


