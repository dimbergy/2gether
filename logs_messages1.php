<?php session_start();

require_once ('includes/db_connect.php');
$sessionid = $_SESSION['id'];


    $href = $_POST['href'];
    $sender = $_POST['sender'];
    $sender_id = (int)$sender;



$list = $conn->query("SELECT id, first_name, last_name, avatar FROM users INNER JOIN relationship ON users.id=user1_id OR users.id=user2_id WHERE (user1_id=$sessionid OR user2_id=$sessionid) AND status=1");
    if($list->num_rows > 0) {
    while ($rowlist = $list->fetch_assoc()) { ?>

              <div id="<?= $href ?>" class="collapse in"> <!-- toggle-collapse B -->

    <!-- QUERY FOR MATCHING SENDERS AND RECEIVERS WITH EACH OTHER MESSAGES -->
                  <?php
                  $chat1 = $conn->query("SELECT sent_at, opened, recipient_del, sender_del, users.first_name, avatar, msg_to, msg_from, message, messages.id AS messageid FROM messages INNER JOIN users ON users.id=msg_from WHERE ((msg_from=$sessionid AND msg_to=$sender_id) OR (msg_from=$sender_id AND msg_to=$sessionid)) GROUP BY message ORDER BY sent_at DESC");

                  if($chat1->num_rows > 0) { ?>

                  <!-- SEND MESSAGE FORM AND BUTTON | START -->
                  <form id="sendmessage" class="panel panel-default share" name="sendmessage" action="parse/send_messages.php" method="post">

                      <div class="input-group">
                          <div class="input-group-btn">
                              <button id="send" type="submit" class="btn btn-inverse" name="send">
                                  <i class="fa fa-envelope"></i> Send
                              </button></a>
                          </div>

                              <input id="sender" name="sender" class="hidden" value="<?php echo $rowlist['id'] ?>"/>
                              <input type="text" name="message" class="form-control share-text" placeholder="Write a message to <?= $sender_id; ?><?php echo $rowlist['first_name'] ?>" />

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
