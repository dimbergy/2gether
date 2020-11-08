<?php



    $pho = $conn->query("SELECT user_id, phone_number, phone_privacy FROM phones WHERE user_id=$id");



if ($pho->num_rows > 0) {
    while($rowpho = $pho->fetch_assoc()) {

        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

        if($rel->num_rows > 0) {
            while ($rowrel = $rel->fetch_assoc()) {

                if ($rowrel['status'] == 1 && ($rowpho['phone_privacy'] == 1 OR $rowpho['phone_privacy'] == 0)) {

                    echo "<div id='infoitem7' class='col-sm-8'>" . $rowpho['phone_number'] . "</div><div class='col-sm-4'></div>";
                }
            }
        } else if ($rel->num_rows == 0) {

            if ($rowpho['phone_privacy']==0) {

                echo "<div id='infoitem7' class='col-sm-8'>" .$rowpho['phone_number']."</div><div class='col-sm-4'></div>";

            }
        }

    }

}

?>