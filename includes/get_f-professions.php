<?php



    $prof = $conn->query("SELECT id, user_id, profession_desc, profession_privacy FROM professions WHERE user_id='$id'");


if ($prof->num_rows > 0) {
    while($rowprof = $prof->fetch_assoc()) {

        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

        if($rel->num_rows > 0) {
            while ($rowrel = $rel->fetch_assoc()) {

                if ($rowrel['status'] == 1 && ($rowprof['profession_privacy'] == 1 OR $rowprof['profession_privacy'] == 0)) {

                    echo "<div id='infoitem2' class='col-sm-8'>" . $rowprof['profession_desc'] . "</div><div class='col-sm-4'></div>";
                }
            }
        } else if ($rel->num_rows == 0) {

            if ($rowprof['profession_privacy']==0) {

                echo "<div id='infoitem2' class='col-sm-8'>" .$rowprof['profession_desc']."</div><div class='col-sm-4'></div>";

            }
        }

    }

}

?>