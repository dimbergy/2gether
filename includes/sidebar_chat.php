
<!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
<div class="sidebar sidebar-chat right sidebar-size-3 sidebar-offset-0 chat-skin-white sidebar-visible-mobile"
             id=sidebar-chat>
            <div class="split-vertical">
                <div class="chat-search">
                    <input type="text" class="form-control" placeholder="Search"/>
                </div>

                <?php
                $lgg = $conn->query("SELECT id, user_id, online FROM sessions WHERE user_id=$sessionid");
                if($lgg->num_rows > 0) {
                    while ($rowlgg = $lgg->fetch_assoc()) {
                        $online = $rowlgg['online'];
                    }
                }
                ?>

                <ul class="chat-filter nav nav-pills">
                    <li class="active"><a href="#" data-target="li">All</a></li>
                    <li><a href="#" data-target=".online">Online</a></li>
                    <li><a href="#" data-target=".offline">Offline</a></li>
                    <form name="online" action="parse/online_chat.php" method="post" class="navbar-form navbar-right" style="margin-top: 0px">
                            <input type="checkbox" data-toggle="switch-checkbox" id="switch" data-size="mini" name="switch" <?php if ($online==1) { echo "checked"; } ?> onchange="this.form.submit();" />
                    </form>

                </ul>
                <div class="split-vertical-body">
                    <div class="split-vertical-cell" style="max-height:500px; overflow-y: scroll;">
                        <div data-scrollable>
                            <ul class="chat-contacts">

                                <?php
                                $list1 = $conn->query("SELECT users.id AS userid, first_name, last_name, avatar FROM users INNER JOIN relationship ON users.id=user1_id OR users.id=user2_id WHERE (user1_id=$sessionid OR user2_id=$sessionid) AND status=1 AND users.id!=$sessionid GROUP BY users.id");
                                if($list1->num_rows > 0){
                                while ($rowlist1 = $list1->fetch_assoc()) {
                                    $login = $conn->query("SELECT id, user_id, online FROM sessions WHERE user_id=".$rowlist1['userid']."");
                                    if($login->num_rows == 0) {
                                    ?>
                                    <li class="offline" data-user-id="<?php echo $rowlist1['userid']; ?>">
                                        <a href="#">

                                            <div class="media">
                                                <div class="pull-left">
                                                    <span class="status"></span>
                                                    <img src="<?php echo $rowlist1['avatar'] ?>" width="40" class="img-circle"/>
                                                </div>
                                                <div class="media-body">
                                                    <div class="contact-name"><?php echo $rowlist1['first_name'];
                                                        echo "&nbsp;";
                                                        echo $rowlist1['last_name']; ?></div>

                                    <?php
                                    $chat1 = $conn->query("SELECT sent_at, opened, recipient_del, sender_del, users.first_name, avatar, msg_to, msg_from, message, messages.id AS messageid FROM messages INNER JOIN users ON users.id=msg_from WHERE ((msg_from=$sessionid AND msg_to=".$rowlist1['userid'].") OR (msg_from=".$rowlist1['userid']." AND msg_to=$sessionid)) GROUP BY message ORDER BY sent_at ASC");
                                    if($chat1->num_rows > 0) {
                                        while($rowchat1=$chat1->fetch_assoc()) { ?>

                                            <span class="hidden">
    <span class="message" class="hidden"><?php echo "&#10687; [".$rowchat1['first_name']."]: ".$rowchat1['message'].PHP_EOL; ?></span>
</span>


<?php } } ?>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                        <?php } else {
                                        while($rowlog=$login->fetch_assoc()) {
                                            if($rowlog['online']==0) { ?>

                                                <li class="online away" data-user-id="<?php echo $rowlist1['userid']; ?>">
                                                    <a href="#">

                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <span class="status"></span>
                                                                <img src="<?php echo $rowlist1['avatar'] ?>" width="40" class="img-circle"/>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="contact-name"><?php echo $rowlist1['first_name'];
                                                                    echo "&nbsp;";
                                                                    echo $rowlist1['last_name']; ?></div>

                                                                <?php
                                                                $chat1 = $conn->query("SELECT sent_at, opened, recipient_del, sender_del, users.first_name, avatar, msg_to, msg_from, message, messages.id AS messageid FROM messages INNER JOIN users ON users.id=msg_from WHERE ((msg_from=$sessionid AND msg_to=".$rowlist1['userid'].") OR (msg_from=".$rowlist1['userid']." AND msg_to=$sessionid)) GROUP BY message ORDER BY sent_at ASC");
                                                                if($chat1->num_rows > 0) {
                                                                    while($rowchat1=$chat1->fetch_assoc()) { ?>

                                                                        <span class="hidden">
    <span class="message" class="hidden"><?php echo "&#10687; [".$rowchat1['first_name']."]: ".$rowchat1['message'].PHP_EOL; ?></span>
</span>


                                                                    <?php } } ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>



                                         <?php    } else { ?>

                                                <li class="online" data-user-id="<?php echo $rowlist1['userid']; ?>">
                                                    <a href="#">

                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <span class="status"></span>
                                                                <img src="<?php echo $rowlist1['avatar'] ?>" width="40" class="img-circle"/>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="contact-name"><?php echo $rowlist1['first_name'];
                                                                    echo "&nbsp;";
                                                                    echo $rowlist1['last_name']; ?></div>

                                                                <?php
                                                                $chat1 = $conn->query("SELECT sent_at, opened, recipient_del, sender_del, users.first_name, avatar, msg_to, msg_from, message, messages.id AS messageid FROM messages INNER JOIN users ON users.id=msg_from WHERE ((msg_from=$sessionid AND msg_to=".$rowlist1['userid'].") OR (msg_from=".$rowlist1['userid']." AND msg_to=$sessionid)) GROUP BY message ORDER BY sent_at ASC");
                                                                if($chat1->num_rows > 0) {
                                                                    while($rowchat1=$chat1->fetch_assoc()) { ?>

                                                                        <span class="hidden">
    <span class="message" class="hidden"><?php echo "&#10687; [".$rowchat1['first_name']."]: ".$rowchat1['message'].PHP_EOL; ?></span>
</span>


                                                                    <?php } } ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>


                                     <?php       }
                                       }
                                    } ?>








                                <?php } } ?>
                            </ul>

                            <script id="chat-window-template" type="text/x-handlebars-template">

                                <div class="panel panel-default">
                                    <div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
                                        <a href="#" class="close"><i class="fa fa-times"></i></a>
                                        <a href="#">
            <span class="pull-left">
                    <img src="{{ user_image }}" width="40">
                </span>
                                            <span class="contact-name">{{user}}</span>
                                        </a>
                                    </div>

                                    <?php
                                    $var ="{{user_message}}";

                                    ?>
                                    <div class="panel-body" id="chat-bill">
                                        <div class="media">

                                            <div class="media-body">
                                                <span class=""><?php  echo nl2br($var); ?></span>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="text" class="form-control" placeholder="Type message..." />
                                </div>

                            </script>



                        </div>
                    </div>
                </div>
            </div>
        </div>
