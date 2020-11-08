<?php



$mail = $conn->query("SELECT id, email, email_privacy FROM users INNER JOIN mailprivacy ON id=user_id WHERE id=$id");



if ($mail->num_rows > 0) {
    while($rowmail = $mail->fetch_assoc()) {

        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

        if($rel->num_rows > 0) {
            while ($rowrel = $rel->fetch_assoc()) {

                if ($rowrel['status'] == 1 && ($rowmail['email_privacy'] == 1 OR $rowmail['email_privacy'] == 0)) {

                    echo "<div id='infoitem8' class='col-sm-8 mailink'><a href='mailto:".$rowmail['email']."'>" . $rowmail['email'] . "</a></div><div class='col-sm-4'></div>";
                }
            }
        } else if ($rel->num_rows == 0) {

            if ($rowmail['email_privacy']==0) {

                echo "<div id='infoitem8' class='col-sm-8 mailink'><a href='mailto:".$rowmail['email']."'>" . $rowmail['email'] . "</a></div><div class='col-sm-4'></div>";

            }
        }

    }

}

?>