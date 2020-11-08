                        <!-- messages -->

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown notifications">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>

     <?php  $count = $conn->query("SELECT * FROM messages WHERE opened=0 AND msg_to=$sessionid");
                                iF($count->num_rows > 0) {
                                $countmsg = $count->num_rows;
                                if($countmsg > 0) { ?>


                                <span class="badge badge-danger" style="background-color: red; color:white"><?php echo $countmsg ?></span>
                                <?php }

                                } ?>
                            </a>
                            <ul class="dropdown-menu" style="max-height:500px; overflow-y: scroll;">
                                <li class="dropdown-header" style="color: #9e1f63">Messages</li>
<?php
$unread = $conn->query("SELECT users.id AS userid, first_name, last_name, avatar, message, sent_at FROM messages INNER JOIN users ON msg_from=users.id WHERE msg_to=$sessionid AND opened=0 GROUP BY msg_from ORDER BY sent_at DESC");
if($unread->num_rows > 0) {
    while($rowunread=$unread->fetch_assoc()) { ?>

                                <li class="media">
                                    <div class="media-left">
                                        <a href="friend_profile.php?u=<?php echo $rowunread['userid'] ?>">
                                            <img class="media-object thumb" src="<?php echo $rowunread['avatar'] ?>"
                                                 alt="people">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="pull-right">
       <?php
       $new = $conn->query("SELECT * FROM messages WHERE msg_from=".$rowunread['userid']." AND msg_to=$sessionid");
       $rowcount=0;
       if($rownew=$new->num_rows){
           $newcount=$new->num_rows;
       }

       ?>



                                            <div class="redirect">
                                            <a href="user_messages.php?u=<?php echo $sessionid ?>">

                     <span id="readspan" class="label label-danger">read</span>

                                            </a></div>
                                        </div>
                                        <a href="friend_profile.php?u=<?php echo $rowunread['userid'] ?>">
                                            <h5 class="media-heading"><?php echo $rowunread['first_name']; echo " "; echo $rowunread['last_name'] ?></h5></a>

                                        <p class="margin-none"><?php echo substr($rowunread['message'], 0, 90) .((strlen($rowunread['message']) > 90)?'...':''); ?></p>
                                    </div>
                                </li>


    <?php    }
} else { ?>

    <li class="media">


        <div class="media-body">
    You have no imcoming messages at this time.
        </div>
    </li>
<?php }

?>


                            </ul>
                        </li>
                        </ul>
                        <!-- // END messages -->
