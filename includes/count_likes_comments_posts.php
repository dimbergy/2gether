<?php


$like2 = $conn->query("SELECT id, liked_by, comment_id FROM likes_com_posts WHERE comment_id=".$rowcomm['comid']."");
if($like2->num_rows > 0) {
    $countcomlikes = $like2->num_rows; ?>


<?php

    echo "<span class='likes pull-right padding-v-5-1' style='padding-right: 5px'>".$countcomlikes."&emsp;<i class='fa fa-thumbs-up fa-lg'></i></span>";

}



?>