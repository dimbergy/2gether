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

$owner = $row['id'];
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
      $p = 'friend_friends';
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
            <div class="overlay overlay-full">

            </div>
          </div>

          <div class="container-fluid">

            <div id="filter">
              <form class="form-inline">
                <label><i class="fa fa-search"></i></label>
                <select name="users-filter" id="users-filter-select" class="selectpicker" data-style="btn-inverse" data-width="auto">
                  <option value="all">All</option>
                  <option value="friends">Friends of Friends</option>
                  <option value="name">by Name</option>
                </select>
                <div id="users-filter-trigger">
                  <div class="select-friends hidden">
                    <select name="users-filter-friends" class="selectpicker" data-style="btn-primary" data-live-search="true">
                        <?php


                        $a = "SELECT users.id AS userid, first_name, last_name, avatar FROM relationship INNER JOIN users ON users.id=user1_id OR users.id=user2_id WHERE relationship.status=1 AND NOT users.id='$id' AND (user1_id=$id OR user2_id=$id) ORDER BY last_name ASC";

                        $b = mysqli_query($conn, $a);

                        $c = mysqli_num_rows($b);

                        if($c>0){ ?>
                            <option value="0">Select Friend</option>
                        <?php while($c = mysqli_fetch_assoc($b)) { ?>
                      <option value="<?php echo $c['userid']?>"><?php echo $c['first_name']?>&nbsp;<?php echo $c['last_name']?></option>
                        <?php } } else { ?>

                            <li>
                                <p class="text-center" style="color:firebrick">You have no friends</p>
                            </li>

                        <?php   } ?>


                    </select>
                  </div>
                  <div class="search-name hidden">
                    <input type="text" class="form-control" name="user-first" placeholder="First Last Name" id="name" />
                    <a href="#" class="btn btn-default hidden" id="user-search-name"><i class="fa fa-search"></i> Search</a>
                  </div>

                </div>
              </form>
            </div>

            <div class="row" data-toggle="isotope">

                <?php


                $a = "SELECT users.id AS userid, first_name, last_name, avatar FROM relationship INNER JOIN users ON users.id=user1_id OR users.id=user2_id WHERE relationship.status=1 AND NOT users.id='$id' AND (user1_id=$id OR user2_id=$id) ORDER BY last_name ASC";

                $b = mysqli_query($conn, $a);

                $c = mysqli_num_rows($b);

                if($c>0){

                    while($c = mysqli_fetch_assoc($b)) {

                        $friend=$c['userid'];

                        ?>
                        <div class="col-md-6 col-lg-4 item">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="media">
                                        <div class="pull-left">

                                            <?php if($c['userid']==$row['id']) { ?>
                                            <a href="user_profile.php?u=<?php echo $c['userid'] ?>">
                                                <?php } else { ?>
                                            <a href="friend_profile.php?u=<?php echo $c['userid'] ?>">
                                                <?php } ?>
                                            <img src="<?php echo $c['avatar']?>" alt="people" class="media-object img-circle" width="80px"/>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading margin-v-5"><?php echo $c['first_name']?>&nbsp;<?php echo $c['last_name']?></a></h4>
                                            <div class="profile-icons">
                                                <a href="friend_friends.php?u=<?php echo $c['userid'] ?>"><span><i class="fa fa-users"></i> <?php include ('parse/count_friends.php'); ?> </span></a>
                                                <a href="friend_photos.php?u=<?php echo $c['userid'] ?>"><span><i class="fa fa-photo"></i> <?php include 'parse/count_photos.php'; ?></span></a>
                                                <a href="friend_photos.php?u=<?php echo $c['userid'] ?>"><span><i class="fa fa-video-camera"></i> <?php include 'parse/count_videos.php'; ?></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p class="common-friends">Common Friends</p>
                                    <div class="user-friend-list">
                                        <?php

                                        $mut= "SELECT a.friendID FROM (SELECT CASE WHEN user1_id = ".$friend." THEN user2_id ELSE user1_id END AS friendID FROM relationship WHERE (user1_id = ".$friend." OR user2_id = ".$friend." ) AND status=1) a JOIN (SELECT CASE WHEN user1_id = ".$id." THEN user2_id ELSE user1_id END AS friendID FROM relationship WHERE (user1_id = ".$id." OR user2_id= ".$id.") AND status=1) b ON b.friendID = a.friendID";

                                        $mutres = mysqli_query($conn, $mut);

                                        $mutrow = mysqli_num_rows($mutres);

                                        if ($mutrow>0) {

                                            while ($mutrow = mysqli_fetch_assoc($mutres)) {

                                                $mut1 = "SELECT id, first_name, last_name, avatar FROM users WHERE id=".$mutrow['friendID']."";

                                                $mutres1 = mysqli_query($conn, $mut1);
                                                $mutrow1 = mysqli_num_rows($mutres1);

                                                if ($mutrow1 > 0) {
                                                    while ($mutrow1 = mysqli_fetch_assoc($mutres1)) { ?>

<?php if ($mutrow1['id'] == $row['id']) { ?>
                                                            <a href="user_profile.php?u=<?php echo $mutrow1['id'] ?>">
                                                        <?php } else { ?>
                                                        <a href="friend_profile.php?u=<?php echo $mutrow1['id'] ?>">
                                                            <?php } ?>
                                                            <img src="<?php echo $mutrow1['avatar'] ?>" alt="people" class="img-circle" width="50px"/>
                                                        </a>
                                                    <?php              }

                                                }

                                            }


                                        } else { ?>

                                            <p>You have no common friends with <?php echo $c['first_name'] ?></p>

                                        <?php     }
                                        ?>

                                    </div>
                                </div>

         <?php include ('parse/add_friend_friendpage.php'); ?>



                            </div>
                        </div>

                        <?php

                    } } else { ?>

                    <li>

                        <p class="text-center" style="color:firebrick">You have no friends</p>
                    </li>



                <?php   } ?>







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