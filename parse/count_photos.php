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
$count_img = $conn->query("SELECT img_privacy FROM photos WHERE uploaded_by=".$c['userid']." AND img_privacy!=2");
$num_img=0;
if($count_img->num_rows > 0) {
    while ($res_img = $count_img->fetch_assoc()){
        if ($res_img['img_privacy']==0) {

            $num_img++;
        } else {

            if($status_med==1) {

                $num_img++;
            }
        }


    }

}

echo $num_img;

?>