<?php



$sex = $conn->query("SELECT id, sex, sex_privacy FROM users INNER JOIN sexprivacy ON id=user_id WHERE id=$id");



if ($sex->num_rows > 0) {
    while($rowsex = $sex->fetch_assoc()) {

        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

        if($rel->num_rows > 0) {
            while ($rowrel = $rel->fetch_assoc()) {

                if ($rowrel['status'] == 1 && ($rowsex['sex_privacy'] == 1 OR $rowsex['sex_privacy'] == 0)) {

                    echo "<div id='infoitem3' class='col-sm-8'>"; if ($rowsex['sex']==1) echo "Άντρας"; else echo "Γυναίκα"; echo "</div><div class='col-sm-4'></div>";
                }
            }
        } else if ($rel->num_rows == 0) {

            if ($rowsex['sex_privacy']==0) {

                echo "<div id='infoitem3' class='col-sm-8'>"; if ($rowsex['sex']==1) echo "Άντρας"; else echo "Γυναίκα"; echo "</div><div class='col-sm-4'></div>";

            }
        }

    }

}

?>