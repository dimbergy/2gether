<?php

if ($u=='friend') {


    $rel_med = $conn->query("SELECT status FROM relationship WHERE ((user1_id=".$c['userid']." OR user1_id=$owner) AND (user2_id=$owner OR user2_id=".$c['userid']."))");

    if($rel_med->num_rows > 0) {
        while ($key_med = $rel_med->fetch_assoc()){

            $status_med = $key_med['status'];
        }
    } else {

        $status_med = 0;
    }
} else if ($u=='user') {

    $rel_med = $conn->query("SELECT status FROM relationship WHERE ((user1_id=".$c['userid']." OR user1_id=$frindex) AND (user2_id=$frindex OR user2_id=".$c['userid']."))");

    if($rel_med->num_rows > 0) {
        while ($key_med = $rel_med->fetch_assoc()){

            $status_med = $key_med['status'];
        }
    } else {

        $status_med = 0;
    }

}


$count_vid = $conn->query("SELECT video_privacy FROM videos WHERE uploaded_by=".$c['userid']." AND video_privacy!=2");
$num_vid=0;
if($count_vid->num_rows > 0) {
    while ($res_vid = $count_vid->fetch_assoc()){
        if ($res_vid['video_privacy']==0) {

            $num_vid++;
        } else {

            if($status_med==1) {

                $num_vid++;
            }
        }


    }

}

echo $num_vid;

?>
