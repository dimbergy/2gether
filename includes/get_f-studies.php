<?php


    $std = $conn->query("SELECT id, user_id, study_desc, study_privacy FROM studies WHERE user_id='$id'");

if ($std->num_rows > 0) {
    while($rowstd = $std->fetch_assoc()) {


        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

if($rel->num_rows > 0) {
    while ($rowrel = $rel->fetch_assoc()) {

        if ($rowrel['status']==1 && ($rowstd['study_privacy']==1 OR $rowstd['study_privacy']==0)) {


        echo "<div id='infoitem1' class='col-sm-8'>" .$rowstd['study_desc']."</div><div class='col-sm-4'></div>";
        }
    }

} else if ($rel->num_rows == 0) {

    if ($rowstd['study_privacy']==0) {

        echo "<div id='infoitem1' class='col-sm-8'>" .$rowstd['study_desc']."</div><div class='col-sm-4'></div>";

    }
}

    }

}


?>

