
<?php
$videos = $conn->query("SELECT users.id AS userid, videos.id AS vidid, video_src, video_path, video_title, video_desc, video_city, video_country, uploaded_by, uploaded_at, video_privacy, album_id FROM videos INNER JOIN users ON uploaded_by=users.id WHERE email='$email'");
if($videos->num_rows > 0) {
    $j=0;
    while($rowvideo=$videos->fetch_assoc()){
        $j++;

        $videoid = $rowvideo['vidid']; ?>
        <!-- video modal start -->
        <div class="modal fade modal-fullscreen footer-to-bottom" id="myModal<?php echo $j ?>" role="dialog"  tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
                                       data-setup="{}">
                                    <source src="<?php echo $rowvideo['video_src'] ?>" type='video/mp4'>
                                    <source src="<?php echo $rowvideo['video_src'] ?>" type='video/webm'>

                                </video>
                            </div>

                            <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="margin-top:20%; margin-bottom:20%">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next"style="margin-top:20%; margin-bottom:20%">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>



                        <div class="col-md-3 col-sm-12 col-xs-12 infocol">

                            <a href="user_timeline.php?u=<?php echo $row['id'] ?>"><h4><img src="<?php echo $row['avatar'] ?>" alt="Bill" class="img-circle" width="40px"/> <?php echo "&nbsp;"; echo $row['first_name']; echo " "; echo $row['last_name'] ?></h4></a>

                            <div class="meta"><p><span><i class="fa fa-calendar-o fa-fw"></i> <?php echo $rowvideo['uploaded_at'] ?> </span><span><i class="fa fa-map-marker fa-fw"></i>
                                        <?php
                                        $vcity = $conn->query("SELECT city FROM cities INNER JOIN videos ON cities.id=video_city WHERE videos.id=$videoid");

                                        if ($vcity->num_rows > 0) {
                                            while($rowvcity=$vcity->fetch_assoc()){

                                                $videocity=$rowvcity['city'];
                                                echo $rowvcity['city'];
                                            }

                                        }
                                        ?>,
                                        <?php
                                        $vcountry = $conn->query("SELECT country FROM countries INNER JOIN videos ON countries.id=video_country WHERE videos.id=$videoid");
                                        if ($vcountry->num_rows > 0) {
                                            while($rowvcountry=$vcountry->fetch_assoc()){

                                                echo $rowvcountry['country'];
                                            }

                                        }
                                        ?>

                                          </span>
                                    <span>
                            <?php if ($rowvideo['video_privacy']==0) { ?>
                                        <i class="fa fa-globe fa-fw"></i>
                                        <?php } else if ($rowvideo['video_privacy']==1) { ?>
                                    <i class="fa fa-user fa-fw"></i>
                                        <?php } else if ($rowvideo['video_privacy']==2) { ?>
                                        <i class="fa fa-lock fa-fw"></i>
                                        <?php } ?>
                                    </span>



                                    <button class="btn btn-white btn-xs pull-right" data-toggle="modal" data-target="#editvideo<?php echo $videoid ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-pencil"></i></button>
                                </p>
                                <p><?php echo $rowvideo['video_desc'] ?></p></div>


                            <div class="panel panel-default">
                                <div class="view-all-comments">

                                        <button id="<?php echo $videoid ?>" type="button" class="likevideo btn btn-white btn-sm">
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
                                                        <div class="pull-right dropdown" data-show-hover="li">
                                                            <a href="#" data-toggle="dropdown" class="toggle-button">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#" onclick="document.getElementById('deletevcom1').submit();">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                        <form id="deletevcom1" action="parse/delete_videocomments.php" method="post" class="hidden">
                                                            <input type="text" name="videooid" value="<?php echo $videoid ?>">
                                                            <input type="text" name="videocomid" value="<?php echo $rowvcom['videocomid'] ?>">
                                                        </form>
                                                        <?php if($rowvcom['videocom_by']==$row['id']) {?>
                                                        <a href="user_timeline.php?u=<?php echo $row['id'] ?>"  class="comment-author pull-left">
                                                            <?php } else { ?>
                                                            <a href="friend_timeline.php?u=<?php echo $rowvcom['videocom_by']; ?>"  class="comment-author pull-left">
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
                                                <select id="videoid1" name="videoid" class="hidden"><option value="<?php echo $videoid ?>"></option></select>
                                                <input id="videocomment1" type="text" name="vcomment" class="form-control" />

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

<!-- start edit/delete video info -->

        <div class="modal fade" id="editvideo<?php echo $videoid ?>" role="dialog">

            <div class="modal-dialog" style="margin-top: 50px; min-width: 250px">


                <div class="modal-content" style="background-color: #e6ee9c">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                        <h4 class="modal-title" style="color: #013b68">Edit "<?php echo $rowvideo['video_title'] ?>"</h4>
                    </div>

                    <div class="modal-body">
                        <div class="panel panel-body" style="background-color: #faffcd">

                            <form role="form" name="editvideos_form" action="parse/edit_videos.php" method="post" id="editvideos_form">
                                <ul class="list-unstyled profile-about margin-none">
                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Video title</span>
                                            </div>
                                            <div id="videotit" class="col-sm-8"><input
                                                    type="text" name="videotit"
                                                    maxlength="50" class="form-control" placeholder="<?php echo $rowvideo['video_title'] ?>"></div>

                                        </div>
                                    </li>


                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Video description</span>
                                            </div>
                                            <div id="videodesc" class="col-sm-8"><input type="text" name="videodesc" maxlength="255" class="form-control" placeholder="<?php echo $rowvideo['video_desc'] ?>"></div>

                                        </div>
                                    </li>


                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Video privacy</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <select name="videoprivacy"
                                                        class="privacy1 btn btn-white form-control">
                                                    <option value="0"
                                                        <?php if ($rowvideo['video_privacy']==0) echo "selected"; ?>>&#xf0ac; &nbsp; Public
                                                    </option>
                                                    <option value="1"
                                                        <?php if ($rowvideo['video_privacy']==1) echo "selected"; ?>>&#xf007;&nbsp;Friends
                                                    </option>
                                                    <option value="2"
                                                        <?php if ($rowvideo['video_privacy']==2) echo "selected"; ?>>&#xf023; &nbsp; Only me</option>
                                                </select>
                                            </div>
                                    </li>


                                    <li class="padding-v-5">
                                        <div class="row form-group"><div class="col-sm-4"><span class="text-muted">Location</span></div>
                                            <div class="col-sm-4"><input type="text" name="videocity" class="form-control" maxlength="100" placeholder="<?php echo $videocity ?>"></div>
                                            <div class="col-sm-4">

                                                <?php
                                                $getcountry = "SELECT id, country FROM countries";
                                                $rescountry = mysqli_query($conn, $getcountry);
                                                if (mysqli_num_rows($rescountry) > 0) { ?>

                                                    <select name="videocountry" id="videocountry" class="form-control">

                                                        <option disabled>Country</option>

                                                        <?php while ($rowcountry = mysqli_fetch_assoc($rescountry)) { ?>

                                                            <option value="<?php echo $rowcountry['id'] ?>"

                                                                <?php if ($rowcountry['id'] == $rowvideo['video_country']) echo "selected";
                                                                ?>

                                                            >
                                                                <?php echo $rowcountry['country'] ?>

                                                            </option>


                                                        <?php } ?>

                                                    </select>

                                                    <?php
                                                } else {

                                                    echo "<p>0 αποτελέσματα</p>";

                                                }

                                                ?>

                                            </div>
                                        </div>
                                    </li>
<select name="videoid" class="hidden"><option value="<?php echo $videoid ?>"></option></select>

                                    <hr>

                                    <li class="padding-v-5" style="margin-top: 10px">
                                        <div class="row form-group">
                                            <div style="padding-right: 8px">
                                                <button type="button" name="cancel" id="cancel" class="btn btn-warning pull-right" data-dismiss='modal'><i class="fa fa-ban" style="color: white"></i></button></div>
                                            <div class="pull-right">&emsp;</div>
                                            <div><button type="button" name="delete" id="delete" class="btn btn-danger pull-right" data-toggle="modal" data-target="#delvideo<?php echo $videoid ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-trash" style="color: white"></i></button>
                                            </div>
                                            <div class="pull-right">&emsp;</div>
                                            <div>
                                                <button type="reset" name="reset" id="reset" class="btn btn-inverse pull-right"><i class="fa fa-refresh"></i></button>
                                            </div>
                                            <div class="pull-right">&emsp;</div>
                                            <div>
                                                <button type="submit" name="update" id="update" class="btn btn-success pull-right"><i class="fa fa-check"></i></button>
                                            </div>


                                        </div>
                                    </li>

                                </ul>
                            </form>


                        </div>


                    </div>

                </div>

            </div>

        </div>
        <!-- end modal edit album -->

        <!-- start modal delete album -->

        <div class="modal fade" id="delvideo<?php echo $videoid ?>" role="dialog">
            <?php

            echo "<div class='modal-dialog modal-sm' style='margin-top: 150px; min-width: 250px'>

    <!-- Modal content-->
    <div class='modal-content' style='background-color: #d3a6b4'>

        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h5 class='modal-title' style='color: #013b68'>Delete ".$rowvideo['video_title']."</h5>
        </div>

         <div class='modal-body'>
           <div class='panel panel-default text-center' style='background-color: #faffcd'>
           
            <form name='delvideo_form' role='form' action='parse/delete_videos.php' method='post' class='priv_form'>

<div class='row'><h5 style='padding-left:8px'>Are you sure you want to delete<br />".$rowvideo['video_title']." ?</h5></div>

<div class='row text-center'>
         <select class='hidden' name='videoid'><option value='".$videoid."' selected></option></select>           
      <button type='button' name='cancel' class='btn btn-primary btnpriv1' data-dismiss='modal'><i class='fa fa-ban fa-lg' style='color:grey'></i></button>              
    <button type='submit' name='delete' class='btn btn-primary btnpriv1'><i class='fa fa-trash fa-lg'></i></button>
                            </div>
                            
        </form>

</div>
            
        </div>


    </div>

</div>";

            ?>
        </div>









        <!-- end edit/delete video info -->
    <?php       }
}



?>


