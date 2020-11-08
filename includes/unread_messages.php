<?php
$text = $conn->query("SELECT sent_at, opened, users.first_name, avatar, msg_to, msg_from, messages.message AS text FROM messages INNER JOIN users ON users.id=msg_from WHERE (((msg_from=$sessionid AND msg_to=".$rowlist['userid'].") OR (msg_from=".$rowlist['userid']." AND msg_to=$sessionid)) AND users.id!=$sessionid) AND opened=0 GROUP BY messages.message ORDER BY sent_at DESC");
iF($text->num_rows > 0) {
    $countmsg = $text->num_rows;
    if($countmsg > 0) { ?>

        <span id="countmsg" class="badge badge-danger pull-right"><?php echo $countmsg ?></span>

    <?php }


}

?>