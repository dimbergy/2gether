<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<?php

session_start();

if($_SESSION['status']!="Active")
{
    header("location:logout.php");
}


require_once ('includes/db_connect.php');
require ('includes/header.php');

if (isset($_SESSION['email'])){
$email= $_SESSION['email'];

$query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id FROM users WHERE email='$email'");

if ($query->num_rows > 0) {

while($row = $query->fetch_assoc()) {

$owner=$row['id'];

$id = $_GET['u'];

$query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id FROM users WHERE id=" . $id);

if ($query->num_rows > 0) {

while ($rows = $query->fetch_assoc()) {

$rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$owner) AND (user2_id=$owner OR user2_id=$id))");

if($rel->num_rows > 0) {
    while ($key = $rel->fetch_assoc()){

        $status = $key['status'];
    }
} else {

    $status = 0;
}


?>

<body>

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

      <?php
      $p = 'friend_photos';
      $u = 'friend';
      require('includes/fixed_navbar.php');
      require('includes/sidebar.php');

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

            <?php require('includes/subnav.php'); ?>


          <div class="cover overlay cover-image-full height-300-lg">

              <?php include ('includes/get_cover.php'); ?>

          </div>

            <div class="container-fluid">



                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#myalbums" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> All Albums</a></li>
                        <li class=""><a href="#myphotos" data-toggle="tab"><i class="fa icon-photo-camera-fill fa-fw fa-lg"></i> All Photos</a></li>

                        <li class=""><a href="#posted" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> All Timeline Photos</a></li>

                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="myalbums">

                            <div class="page-section-heading">

                                <p class="lead">See all albums</p>
                            </div>


                            <div class="panel panel-default" style="box-shadow: 1px 1px 10px #888888; padding: 10px">
                                <!-- Set up your HTML -->
                                <div class="owl-mixed">

                                    <?php
                                    $videos = $conn->query("SELECT users.id AS userid, videos.id AS vidid, video_src, video_path, video_title, video_desc, video_city, video_country, uploaded_by, uploaded_at, video_privacy, album_id FROM videos INNER JOIN users ON uploaded_by=users.id WHERE uploaded_by=$id");

                                    $count=$videos->num_rows;

                                    if($count>0) {


                                        ?>


                                        <div class="item">
                                            <div class="media media-clearfix-xs-min">
                                                <div class="media-left">

                                                    <img id="screenshot" src="images/videoplayer2.png" alt="" class="media-object" data-toggle="modal" data-target="#myModal1"/>


                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><i class="fa fa-film fa-lg"></i> Videos</h4>

                                                    <div class="meta">
                                                        <p>Supported video formats: video/mp4, video/webm.<br />
                                                            Video must not exceed 300M.</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                    <?php  }   include ('includes/get_f-albums.php'); ?>


                                </div>



                            </div>


                            <?php include ('includes/get_f-albumpics.php'); ?>

                        </div>

                        <?php include ('includes/f-showvideos_modal.php'); ?>




                        <div class="tab-pane fade" id="myphotos">
                            <div class="row">
                                <div class="page-section-heading">
                                    <p class="lead">See all photos</p>


                                </div>

                                <?php include ('includes/get_f-allphotos.php'); ?>

                            </div>




                            <div class="tab-pane fade" id="posted">
                                <div class="row">
                                    <div class="page-section-heading">
                                        <p class="lead">See all timeline photos</p>


                                    </div>

                                    <?php include ('includes/get_f-timeline_photos.php'); ?>


                                </div>
                            </div>





                        </div>

                    </div>



                </div>
                <!-- /st-content-inner -->

            </div>
            <!-- /st-content -->

        </div>
          <!-- /st-pusher -->


      <?php

      }
      }
      }

      }


      } else {

          echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/2016-17/2gether/index.php\">";
          exit();

          ;}

      require ('includes/footer.php');
      require ('includes/scripts.php');

      mysqli_close($conn);

      ?>

</body>

</html>