<?php
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