<?php

session_start();
require ('db_connect.php');
$sessionid = $_SESSION['id'];

?>

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
                                    <img src="http://dimitriosvergados.eu/2gether/<?php echo $rowlist['avatar'] ?>" width="50" alt=""
                                         class="media-object"/>
                                </div>
                                <div class="media-body">

<?php

$text = $conn->query("SELECT sent_at, opened, users.first_name, avatar, msg_to, msg_from, messages.message AS text FROM messages INNER JOIN users ON users.id=msg_from WHERE (((msg_from=$sessionid AND msg_to=".$rowlist['userid'].") OR (msg_from=".$rowlist['userid']." AND msg_to=$sessionid)) AND users.id!=$sessionid) AND opened=0 GROUP BY messages.message ORDER BY sent_at DESC");
iF($text->num_rows > 0) {
    $countmsg = $text->num_rows;
    if($countmsg > 0) { ?>

        <span id="countmsg" class="badge badge-danger pull-right"><?php echo $countmsg ?></span>

    <?php }


}


$tim = $conn->query("SELECT sent_at, opened, users.first_name, avatar, msg_to, msg_from, messages.message AS text FROM messages INNER JOIN users ON users.id=msg_from WHERE (((msg_from=$sessionid AND msg_to=".$rowlist['userid'].") OR (msg_from=".$rowlist['userid']." AND msg_to=$sessionid)) AND users.id!=$sessionid) AND opened=0 GROUP BY messages.message ORDER BY sent_at DESC LIMIT 1");
iF($tim->num_rows > 0) {
    while ($rowtim = $tim->fetch_assoc()) {
        $time_ago_msg = timeago($rowtim['sent_at']); ?>

        <span class="date"><?php echo $time_ago_msg ?>&emsp;</span>

        <?php


    }
}  else {

    $tim1 = $conn->query("SELECT sent_at, opened, users.first_name, avatar, msg_to, msg_from, messages.message AS text FROM messages INNER JOIN users ON users.id=msg_from WHERE (((msg_from=$sessionid AND msg_to=".$rowlist['userid'].") OR (msg_from=".$rowlist['userid']." AND msg_to=$sessionid)) AND users.id!=$sessionid) GROUP BY messages.message ORDER BY sent_at DESC LIMIT 1");
            iF($tim1->num_rows > 0) {
                while($rowtim1=$tim1->fetch_assoc()) {

                    $time_ago_msg1 = timeago($rowtim1['sent_at']); ?>

                    <span class="date"><?php echo $time_ago_msg1 ?></span>

<?php   } }     }


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

include ('if_not_friends.php'); // IF NOT FRIENDS SEARCH FOR PEOPLE AROUND

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


          <?php

                         while ($rowchat1 = $chat1->fetch_assoc()){

                         $time_ago_msg1= timeago($rowchat1['sent_at']);

                        if ($rowchat1['msg_from']==$sessionid) {   // PANEL FOR PROFILE USER

                            if ($rowchat1['sender_del']==0) { ?>

                            <!-- MESSAGE WINDOW SESSIONUSER | START -->
                            <div class="media">
                                <div class="media-body message">
                                    <div class="panel panel-default session-body">
                                        <div class="panel-heading panel-heading-white session-head">
                                            <div class="pull-right">
                                                <small class="text-muted"><?php echo $time_ago_msg1 ?></small>
                            <?php if ($rowchat1['opened']==1) { ?>
                                                <small class="text-muted">&nbsp;<i class="fa fa-check"></i> </small>
                                <?php } ?>
                                            </div>
                                            <a href="user_profile.php?u=<?php echo $sessionid ?>">Me</a>
                                        </div>
                                        <div class="panel-body">
                    <form name="deleteform" id="deleteform" action="parse/delete_messages.php" method="post">

          <span class="pull-right">&emsp;
            <?php if ($rowchat1['sender_del']==0) { ?>
            <button type="submit" name="delete" class="btn btn-sm btn-white" style="background-color: #d4dfed;"><i class="fa fa-trash fa-lg"></i></button>
            <?php } ?>
                   <input type="text" class="hidden" name="messageid" value="<?php echo $rowchat1['messageid'] ?>"/>
          </span>
                                            </form>
                                            <span><?php echo $rowchat1['message'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-right">
                                    <a href="user_profile.php?u=<?php echo $sessionid ?>">
                                    <img src="<?php echo $rowchat1['avatar'] ?>" width="60" alt="" class="media-object" />
                                    </a>
                                </div>
                            </div>
                            <!-- MESSAGE WINDOW SESSIONUSER | END -->


           <?php } } else {

                            if ($rowchat1['recipient_del']==0) {    ?>
                            <!-- MESSAGE WINDOW FRIEND | START -->
                            <div id="msg-chat" class="media">
                                <div class="media-left">
                                    <a href="friend_profile.php?u=<?php echo $rowlist['id'] ?>">
                                        <img src="<?php echo $rowchat1['avatar'] ?>" width="60" alt="woman" class="media-object" />
                                    </a>
                                </div>
                                <div class="media-body message">
                                    <div class="panel panel-default">
                                        <div class="panel-heading panel-heading-white">
                                            <div class="pull-right">
                                                <small class="text-muted"><?php echo $time_ago_msg1 ?></small>
                                                <?php if ($rowchat1['opened']==1) { ?>
                                                    <small class="text-muted">&nbsp;<i class="fa fa-check"></i> </small>
                                                <?php } ?>
                                            </div>
                                            <a href="friend_profile.php?u=<?php echo $rowlist['id'] ?>"><?php echo $rowchat1['first_name'] ?></a>
                                        </div>
                                        <div class="panel-body">

            <form name="deleteform" id="deleteform" action="parse/delete_messages.php" method="post">
                                 <span class="pull-right">&emsp;

                                 <button type="submit" name="delete" class="btn btn-sm btn-white"><i class="fa fa-trash fa-lg"></i></button>

                                 <input type="text" class="hidden" name="messageid" value="<?php echo $rowchat1['messageid'] ?>"/>
                                 </span>
                                            </form>
                                            <span><?php echo $rowchat1['message'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MESSAGE WINDOW FRIEND | END -->

                        <?php  } }

          } ?>




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
