<?php


$hplace = $conn->query("SELECT cities.city AS cityname, countries.country AS countryname, homeplace_privacy FROM cities INNER JOIN users ON cities.id=users.city_id INNER JOIN countries ON countries.id=users.country_id INNER JOIN homeplace ON homeplace.user_id=users.id WHERE users.id='$id'");



if ($hplace->num_rows > 0) {
    while($rowhplace = $hplace->fetch_assoc()) {

        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

        if($rel->num_rows > 0) {
            while ($rowrel = $rel->fetch_assoc()) {

                if ($rowrel['status'] == 1 && ($rowhplace['homeplace_privacy'] == 1 OR $rowhplace['homeplace_privacy'] == 0)) {

                    echo "<div id='infoitem4' class='col-sm-8'>" .$rowhplace['cityname']. ", ".$rowhplace['countryname']. "</div><div class='col-sm-4'></div>";
                }
            }
        } else if ($rel->num_rows == 0) {

            if ($rowhplace['homeplace_privacy']==0) {

                echo "<div id='infoitem4' class='col-sm-8'>" .$rowhplace['cityname']. ", ".$rowhplace['countryname']. "</div><div class='col-sm-4'></div>";

            }
        }

    }

}

?>