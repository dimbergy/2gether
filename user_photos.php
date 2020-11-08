<?php

session_start();
require_once ('includes/db_connect.php');

if (isset($_SESSION['email'])){
$email= $_SESSION['email'];

$query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id FROM users WHERE email='$email'");

if ($query->num_rows > 0) {

while($row = $query->fetch_assoc()) {
$frindex=$row['id'];

?>

<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<?php

require ('includes/header.php');

?>

<body>

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

      <?php
      $p='photos';
      $u='user';
      require ('includes/fixed_navbar.php');
      require ('includes/sidebar.php');

      ?>



    <div class="chat-window-container"></div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">


            <?php require ('includes/subnav.php'); ?>

            <div class="container-fluid">



                <?php include ('includes/add_albumvideo_modal.php'); ?>
                <?php include ('includes/showvideos_modal.php'); ?>


                <div class="tabbable">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#myalbums" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> My Albums</a></li>
                        <li class=""><a href="#myphotos" data-toggle="tab"><i class="fa icon-photo-camera-fill fa-fw fa-lg"></i> My Photos</a></li>

                        <li class=""><a href="#posted" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> Timeline Photos</a></li>

                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="myalbums">

                            <div class="page-section-heading">

                                <p class="lead">My albums<span class="pull-right" style="font-size: 12px">
                                        <button class="btn btn-inverse" data-toggle="modal" data-target="#addalbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-plus"></i> &nbsp;<i class="fa fa-picture-o"></i></button>&emsp;

                                        <button class="btn btn-inverse" data-toggle="modal" data-target="#addvideos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-plus"></i> &nbsp;<i class="fa fa-video-camera"></i> </button>

                                    </span></p>
                            </div>



<?php include ('includes/edit-delete_album.php'); ?>


                            <div class="panel panel-default" style="box-shadow: 1px 1px 10px #888888; padding: 10px">
                                <!-- Set up your HTML -->
                                <div class="owl-mixed">

                                    <?php
                                    $videos = $conn->query("SELECT users.id AS userid, videos.id AS vidid, video_src, video_path, video_title, video_desc, video_city, video_country, uploaded_by, uploaded_at, video_privacy, album_id FROM videos INNER JOIN users ON uploaded_by=users.id WHERE email='$email'");

$count=$videos->num_rows;

if($count>0) {
                                     ?>


                                    <div class="item">
                                        <div class="media media-clearfix-xs-min">
                                            <div class="media-left">

                                                <img id="screenshot" src="images/videoplayer2.png" alt="" class="media-object" data-toggle="modal" data-target="#myModal1"/>


                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><i class="fa fa-film fa-lg"></i> Videos<button class="btn btn-white btn-xs pull-right" data-toggle="modal" data-target="#addvideos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-plus"></i></button></h4>

                                                <div class="meta">
                                                    <p>Supported video formats: video/mp4, video/webm.<br />
                                                    Video must not exceed 300M.</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                <?php  }   include ('includes/get_u-albums.php'); ?>


                                </div>



                            </div>


                    <?php include ('includes/get_u-albumpics.php'); ?>








                        </div> <!-- MY ALBUMS -->









                        <div class="tab-pane fade" id="myphotos">
                            <div class="row">
                            <div class="page-section-heading">
                                <p class="lead">All my photos
                                    <span class="pull-right" style="font-size: 12px; margin-right: 15px">
                                        <button class="btn btn-inverse" data-toggle="modal" data-target="#addalbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-plus"></i> &nbsp;<i class="fa fa-picture-o"></i></button>&emsp;

                                        <button class="btn btn-inverse" data-toggle="modal" data-target="#addvideos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-plus"></i> &nbsp;<i class="fa fa-video-camera"></i> </button>

                                    </span></p>


                            </div>

<?php include ('includes/get_u-allphotos.php'); ?>



                        </div>





                        <div class="tab-pane fade" id="posted">
    <div class="row">
                            <div class="page-section-heading">
                                <p class="lead">My timeline photos<span class="pull-right" style="font-size: 12px; margin-right: 15px">
                                        <button class="btn btn-inverse" data-toggle="modal" data-target="#addalbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-plus"></i> &nbsp;<i class="fa fa-picture-o"></i></button>&emsp;

                                        <button class="btn btn-inverse" data-toggle="modal" data-target="#addvideos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-plus"></i> &nbsp;<i class="fa fa-video-camera"></i> </button>

                                    </span></p>


                            </div>

        <?php include ('includes/get_u-timeline_photos.php'); ?>




                        </div>


</div> <!-- TAB CONTENT -->
            </div> <!-- TABABLE -->






        </div> <!-- container fluid -->



        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

      <?php

      }

      }


      } else {

          echo "<meta http-equiv='refresh' content='0; url=http://localhost/2016-17/2gether/index.php'>";
      }


     require ('includes/footer.php');
      require ('includes/scripts.php');

      mysqli_close($conn);

      ?>

</body>

</html>