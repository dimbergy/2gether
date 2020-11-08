<?php


$likepost1 = $conn->query("SELECT id, liked_by, post_id FROM likes_posts WHERE post_id=".$rowpost['postid']."");
if($likepost1->num_rows > 0) {
    $countlikes = $likepost1->num_rows; ?>


<?php

    echo "<span class='likes pull-right padding-v-5-1' style='padding-right: 5px'>".$countlikes."&emsp;<i class='fa fa-thumbs-up fa-lg'></i></span>";

}



?>