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

      $p='messages';
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

            <div class="media messages-container media-clearfix-xs-min media-grid">
              <div class="media-left">

                  <div class="chat-search form-group">
                      <input type="text" id="myMessages" onkeyup="myFunction()" class="form-control" placeholder="Search" style="background-color: ghostwhite;"/>
                  </div>



                <div class="messages-list">

                  <div class="panel panel-default">
                      <div data-scrollable>
                    <ul class="list-group" id="myUL">

        <!-- SEARCH FOR FRIENDS-->
                        <?php
                        $list = $conn->query("SELECT users.id AS userid, first_name, last_name, avatar FROM users INNER JOIN relationship ON users.id=user1_id OR users.id=user2_id INNER JOIN messages ON msg_from=user1_id OR msg_from=user2_id WHERE (user1_id=$sessionid OR user2_id=$sessionid) AND status=1 AND users.id!=$sessionid GROUP BY users.id");
                        if($list->num_rows > 0) {
                            while ($rowlist = $list->fetch_assoc()) { ?>

                                <li id="msg-group" class="list-group-item" onclick="chatboxclicked(this)">
                                    <a href="#msg<?php echo $rowlist['userid'] ?>" data-toggle="collapse"> <!-- toggle-collapse A -->
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo $rowlist['avatar'] ?>" width="50" alt=""
                                                     class="media-object"/>
                                            </div>
                                            <div class="media-body">

    <?php
            include ('includes/unread_messages.php'); // COUNT UNREAD MESSAGES
            include ('includes/time_sent.php'); // CALCULATE MESSAGES TIME SENT
    ?>

        <span class="user"><?php echo $rowlist['first_name']; echo " "; echo $rowlist['last_name']; ?></span>

           <!-- GET MESSAGES OF THE LEFT MESSAGE COLUMN -->

   <?php
      $text = $conn->query("SELECT messages.id AS msgid, users.first_name, avatar, msg_to, msg_from, messages.message AS text FROM messages INNER JOIN users ON users.id=msg_from WHERE (((msg_from=$sessionid AND msg_to=".$rowlist['userid'].") OR (msg_from=".$rowlist['userid']." AND msg_to=$sessionid)) AND users.id!=$sessionid AND recipient_del=0) GROUP BY messages.message ORDER BY sent_at DESC LIMIT 1");
              if($text->num_rows > 0) {
                  while ($rowtext = $text->fetch_assoc()) { ?>
                 <input class="hidden" value="<?php echo $rowtext['msg_to'] ?>"/>
                 <input class="hidden" value="<?php echo $rowtext['msg_from'] ?>"/>
                 <div class="message"><?php echo substr($rowtext['text'], 0, 42) .((strlen($rowtext['text']) > 42)?'...':''); ?></div>

                  <?php } } else { ?>
                  <div class="message">No messages</div>

                  <?php } ?>                          </div>
                                        </div>
                                    </a>
                                </li>
                                <?php
                            }


                        } else {

       include ('includes/if_not_friends.php'); // IF NOT FRIENDS SEARCH FOR PEOPLE AROUND

                                } ?>

                    </ul>

                      </div> <!-- data scrollable -->
                  </div> <!-- class="panel panel-default" -->

                </div> <!-- class="messages-list" id="myUL" -->

              </div> <!-- media-left -->


              <div class="media-body">

    <!-- NEW SEARCH FOR FRIENDS TO BE MATCHED WITH THE COLLAPSED RIGHT COLUMN -->

<?php
$list = $conn->query("SELECT id, first_name, last_name, avatar FROM users INNER JOIN relationship ON users.id=user1_id OR users.id=user2_id WHERE (user1_id=$sessionid OR user2_id=$sessionid) AND status=1");
        if($list->num_rows > 0) {
        while ($rowlist = $list->fetch_assoc()) { ?>

                  <div id="msg<?php echo $rowlist['id'] ?>" class="collapse"> <!-- toggle-collapse B -->

        <!-- QUERY FOR MATCHING SENDERS AND RECEIVERS WITH EACH OTHER MESSAGES -->
                      <?php
                      $chat1 = $conn->query("SELECT sent_at, opened, recipient_del, sender_del, users.first_name, avatar, msg_to, msg_from, message, messages.id AS messageid FROM messages INNER JOIN users ON users.id=msg_from WHERE ((msg_from=$sessionid AND msg_to=".$rowlist['id'].") OR (msg_from=".$rowlist['id']." AND msg_to=$sessionid)) GROUP BY message ORDER BY sent_at DESC");

                      if($chat1->num_rows > 0) { ?>

                      <!-- SEND MESSAGE FORM AND BUTTON | START -->
                      <form id="sendmessage" class="panel panel-default share" name="sendmessage" action="parse/send_messages.php" method="post">

                          <div class="input-group">
                              <div class="input-group-btn">
                                  <button id="send" type="submit" class="btn btn-inverse" name="send">
                                      <i class="fa fa-envelope"></i> Send
                                  </button></a>
                              </div>

                                  <input name="recipient" class="hidden" value="<?php echo $rowlist['id'] ?>"/>
                                  <input type="text" name="message" class="form-control share-text" placeholder="Write a message to <?php echo $rowlist['first_name'] ?>" />

                          </div>
                      </form>
                      <!-- SEND MESSAGE FORM AND BUTTON | END -->


<?php include ('includes/message_logs.php'); ?>



      <?php         }  else { ?> <!-- QUERY FOR MATCHING SENDERS AND RECEIVERS WITH EACH OTHER MESSAGES END -->

                          <!-- SEND MESSAGE FORM AND BUTTON | START -->
                          <form class="panel panel-default share" id="sendmessage" name="sendmessage"  action="parse/send_messages.php" method="post">

                              <div class="input-group">
                                  <div class="input-group-btn">
                                      <button id="send" class="btn btn-inverse" type="submit" name="send">
                                          <i class="fa fa-envelope"></i> Send
                                      </button>
                                  </div>

                    <input name="recipient" class="hidden" value="<?php echo $rowlist['id'] ?>"/>
                          <input type="text" name="message" class="form-control share-text" placeholder="Write a message to <?php echo $rowlist['first_name'] ?>" />

                              </div>

                          </form>
                          <!-- SEND MESSAGE FORM AND BUTTON | END -->

  <?php } ?>

                  </div> <!-- toggle-collapse B END -->







 <?php } } ?>     <!-- END NEW SEARCH FOR MATCHING FRIENDS MESSAGES FOR THE RIGHT COLUMN-->

              </div> <!-- media-body -->


            </div> <!-- media messages-container media-clearfix-xs-min media-grid -->

          </div> <!-- container fluid END -->








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

          echo "<meta http-equiv=\"refresh\" content=\"0; url=".$_SERVER['HTTP_HOST']."/2gether/index.php\">";

      }

      require ('includes/footer.php');
      require ('includes/scripts.php');

      mysqli_close($conn);

      ?>

</body>

</html>
