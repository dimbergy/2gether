<?php


    $web = $conn->query("SELECT user_id, website_link, website_privacy FROM websites WHERE user_id='$id'");

if ($web->num_rows > 0) {
    while($rowweb = $web->fetch_assoc()) {

        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

        if($rel->num_rows > 0) {
            while ($rowrel = $rel->fetch_assoc()) {

                if ($rowrel['status']==1 && ($rowweb['website_privacy']==1 OR $rowweb['website_privacy']==0)) {


                    echo "<div id='infoitem9' class='col-sm-8 weblink'><a href='".$rowweb['website_link']."' target='_blank'>" .$rowweb['website_link']. "</a></div><div class='col-sm-4'></div>";
                }
            }

        } else if ($rel->num_rows == 0) {

            if ($rowweb['website_privacy']==0) {

                echo "<div id='infoitem9' class='col-sm-8 weblink'><a href='".$rowweb['website_link']."' target='_blank'>" .$rowweb['website_link']. "</a></div><div class='col-sm-4'></div>";

            }
        }

    }

}


?>


