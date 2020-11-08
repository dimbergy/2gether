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

$sessionid = $row['id'];
?>


<body>

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

      <?php
      $p='timeline';
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

            <div class="cover overlay hover cover-image-full height-300">
                <?php include ('includes/get_cover.php'); ?>

                <div class="overlay overlay-full overlay-hover overlay-bg-black">
                    <div class="v-center">
                        <label for="mycover">
                        <p class="btn btn-circle btn-lg btn-white"><i class="fa fa-camera"></i></p>
                        <br/>
                        <p class="text-h5" style="color:white; font-weight: 300">Update cover</p>
                        </label>
                        <form id="coverpic" name="coverpic" action="parse/upload_cover.php" method="post" enctype="multipart/form-data">
                            <input id="mycover" name="mycover" type="file" style="display: none" onchange="this.form.submit()"/></form>
                    </div>
                </div>
            </div>

          <div class="container-fluid">

            <div class="timeline row">

   <?php include ('includes/make_u-posts.php') ?>




                <div class="col-xs-12 col-md-6 col-lg-8 item">
                    <div class="timeline-block">
                    <div class="panel panel-default share clearfix-xs">
                      <div class="panel-heading panel-heading-gray title">
                            <i class="icon-user-1" style="padding-left: 10px;"></i>&emsp;Friends
                        </div>

                        <div class="panel-body">
                            <ul class="img-grid">

                                <?php include ('includes/get_friends_timeline.php'); ?>

                            </ul>
                        </div>
                    </div>
                </div>
                </div>

            </div>


              <div class="timeline row" data-toggle="isotope">


<?php

$posts = $conn->query("SELECT posts.id AS postid, body, added_at, added_by, posted_to, post_city, post_country, post_cat, post_privacy, post_hide, first_name, last_name, avatar FROM posts INNER JOIN users ON added_by=users.id WHERE posted_to=$sessionid AND post_hide=0 ORDER BY added_at DESC ");
if($posts->num_rows > 0) {
    while($rowpost = $posts->fetch_assoc()){
        $time_ago_post = timeago($rowpost['added_at']);

?>


              <div class="col-xs-12 col-md-6 col-lg-4 item">
                <div class="timeline-block">
                  <div class="panel panel-default">

                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                            <?php if ($rowpost['added_by']==$row['id']) {?>
                          <a href="user_timeline.php?u=<?php echo $row['id'] ?> ">
                              <?php } else { ?>
                              <a href="friend_profile.php?u=<?php echo $rowpost['added_by'] ?> ">
            <?php } ?>
                            <img src="<?php echo $rowpost['avatar'] ?>" class="media-object" width="50px">
                          </a>
                        </div>
                        <div class="media-body">
                            <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>

                            <?php if ($rowpost['added_by']==$row['id']) {?>
                            <a href="user_timeline.php?u=<?php echo $row['id'] ?> ">
                                <?php } else { ?>
                                <a href="friend_profile.php?u=<?php echo $rowpost['added_by'] ?> ">
                                    <?php } ?>


                              <?php echo $rowpost['first_name']." ".$rowpost['last_name'] ?></a>

                          <span><?php echo $time_ago_post ?></span>

                        </div>
                      </div>
                    </div>

                    <div class="panel-body">
<div id="postbody" class="padding-v-0-7">

    <div class="pull-right dropdown" data-show-hover="#postbody">
        <a href="#" data-toggle="dropdown" class="toggle-button">
            <i class="fa fa-pencil fa-lg"></i>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" onclick="document.getElementById('hideposts').submit();">Hide</a></li>
            <li><a href="#" onclick="document.getElementById('deleteposts').submit();">Delete</a></li>
        </ul>
    </div>
    <p><?php echo $rowpost['body'] ?></p>
</div>

                        <form id="hideposts" action="parse/hide_posts.php" method="post" class="hidden">
                            <input type="text" name="hide" value="<?php echo $rowpost['postid'] ?>">
                        </form>
                        <form id="deleteposts" action="parse/delete_posts.php" method="post" class="hidden">
                            <input type="text" name="delete" value="<?php echo $rowpost['postid'] ?>">
                        </form>

<?php if($rowpost['post_cat']==2) {

    $postpic = $conn->query("SELECT posts.id AS postid, photopost_src, photopost_thumb FROM posts INNER JOIN photoposts ON posts.id=post_id WHERE post_id=".$rowpost['postid']."");
    if($postpic->num_rows > 0) {
        while ($rowpic = $postpic->fetch_assoc()) { ?>

            <img src="<?php echo $rowpic['photopost_src'] ?>" alt="photo" class="img-responsive">

 <?php       }
    }

} else if ($rowpost['post_cat']==3) {
$postvid = $conn->query("SELECT posts.id AS postid, videopost_src FROM posts INNER JOIN videoposts ON posts.id=post_id WHERE post_id=".$rowpost['postid']."");
if($postvid->num_rows > 0) {
    while ($rowvid = $postvid->fetch_assoc()) { ?>

        <div class="embed-responsive embed-responsive-4by3">
            <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
                   data-setup="{}">
                <source src="<?php echo $rowvid['videopost_src'] ?>" type='video/mp4'>
                <source src="" type='video/webm'>
            </video>
        </div>

<?php    }
}

} else if ($rowpost['post_cat']==4 || $rowpost['post_cat']==5 || $rowpost['post_cat']==6) {

    $postlink = $conn->query("SELECT posts.id AS postid, linkpost_src FROM posts INNER JOIN linkposts ON posts.id=post_id WHERE post_id=".$rowpost['postid']."");
    if($postlink->num_rows > 0) {
        while ($rowlink = $postlink->fetch_assoc()) { ?>

            <div class="embed-responsive embed-responsive-16by9">

                    <iframe class="embed-responsive-item" src="<?php echo $rowlink['linkpost_src'] ?>" frameborder="0" allowfullscreen></iframe>
                <?php if ($rowpost['post_cat']==6) { ?>
                <a href="<?php echo $rowlink['linkpost_src'] ?>" target="_blank" style="position:absolute; width:100%;height:100%"></a>
                <?php } ?>
            </div>

 <?php       }
    }


}?>



                        <div class="panel-body">

 <?php
 $likepost = $conn->query("SELECT likes_posts.id AS likeid, liked_by, post_id, avatar FROM likes_posts INNER JOIN users ON liked_by=users.id WHERE post_id=".$rowpost['postid']."");
 if($likepost->num_rows > 0) {
     $t = 0;
     while($rowlike = $likepost->fetch_assoc()) {
         $t++;
         if ($t < 6) {
         ?>

             <a href="<?php if($rowlike['liked_by']==$sessionid){ echo "user_timeline.php?u=".$row['id']; } else { echo "friend_profile.php?u=".$rowlike['liked_by']; }  ?>" ><img src="<?php echo $rowlike['avatar'] ?>" alt="people" class="img-circle" width="40"/></a>

  <?php } }

  if($t > 5) { ?>

     <a href="#" class="user-count-circle"><?php echo "+".($t-5) ?></a>

 <?php } } ?>

                        </div>



                    </div>
                    <div class="view-all-comments">
<?php
$like1 = $conn->query("SELECT liked_by FROM likes_posts WHERE liked_by=$sessionid AND post_id=".$rowpost['postid']."");
if ($like1->num_rows > 0) { ?>

                        <button type="button" class="btn btn-white btn-sm" disabled><i class="fa fa-thumbs-o-up fa-lg"></i>&emsp;You like this post</button>


<?php } else { ?>


                      <button id="<?php echo $rowpost['postid']?>" type="button" class="likepost btn btn-white btn-sm">
                        <i class="fa fa-thumbs-o-up fa-lg" style="color:green"></i>&emsp;Like this post
                      </button>
<?php }
                include ('includes/count_likes_posts.php'); ?>

                    </div>
                    <ul class="comments">
                  <div style="max-height:200px; overflow-y: scroll;">
                      <?php
                      $comm = $conn->query("SELECT comments_posts.id AS comid, comment, com_at, com_by, post_id, users.id AS userid, first_name, last_name, avatar FROM comments_posts INNER JOIN users ON com_by=users.id WHERE post_id=" . $rowpost['postid'] . "");
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
                                              <li><a href="#" onclick="document.getElementById('deletecom').submit();">Delete</a></li>
                                          </ul>
                                      </div>
                                      <?php if($rowcomm['com_by']==$row['id']) {?>
                                          <a href="user_timeline.php?u=<?php echo $row['id'] ?>  class="comment-author pull-left">
                                      <?php } else { ?>
                                          <a href="friend_profile.php?u=<?php echo $rowpost['com_by'] ?>  class="comment-author pull-left">
                                      <?php } ?>

                                      <?php echo $rowcomm['first_name'] ?></a>
                                      <span><?php echo $rowcomm['comment'] ?></span>
                                      <form id="deletecom" action="parse/delete_comments.php" method="post" class="hidden">
                                          <input type="text" name="postid" value="<?php echo $rowpost['postid'] ?>">
                                          <input type="text" name="comid" value="<?php echo $rowcomm['comid'] ?>">
                                      </form>


                                      <div class="comment-date">
  <?php $like3 = $conn->query("SELECT liked_by FROM likes_com_posts WHERE liked_by=$sessionid AND comment_id=".$rowcomm['comid']."");
                                          if ($like3->num_rows > 0) { ?>
                                              <button type="button" class="btn btn-white btn-sm" disabled><i class="fa fa-thumbs-o-up fa-lg"></i>&emsp;You like this comment</button>
                   <?php } else { ?>
                                              <button id="<?php echo $rowcomm['comid'] ?>" type="button" class="likecompost btn btn-white btn-sm"><i class="fa fa-thumbs-o-up fa-lg" style="color:green"></i>&emsp;Like this comment</button>

                        &emsp;&emsp;<?php }
                        include ('includes/count_likes_comments_posts.php'); ?>
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
                                <select id="postid3" name="postid" class="hidden"><option value="<?php echo $rowpost['postid'] ?>"></option></select>
                          <input id="comment3" type="text" name="comment" class="form-control" />

                        </div>
                                </form>
                      </li>



                    </ul>
                  </div>
                </div>
              </div>

        <?php

    }

}
?>


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
