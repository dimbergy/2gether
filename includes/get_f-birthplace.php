<?php


$bcity = $conn->query("SELECT cities.city AS cityname FROM cities INNER JOIN bcity ON cities.id=bcity.city_id WHERE user_id=$id");

$bcountry = $conn->query("SELECT countries.country AS countryname FROM countries INNER JOIN bcountry ON countries.id=bcountry.country_id WHERE user_id=$id");

$bplace = $conn->query("SELECT birthplace_privacy FROM birthplace WHERE user_id=$id");


if ($bcity->num_rows > 0) {
    while ($rowbcity = $bcity->fetch_assoc()) {

        if ($bcountry->num_rows > 0) {
            while ($rowbcountry = $bcountry->fetch_assoc()) {

                if ($bplace->num_rows > 0) {
                    while ($rowbplace = $bplace->fetch_assoc()) {

                        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

                        if ($rel->num_rows > 0) {
                            while ($rowrel = $rel->fetch_assoc()) {

                                if ($rowrel['status'] == 1 && ($rowbplace['birthplace_privacy'] == 1 OR $rowbplace['birthplace_privacy'] == 0)) {

                                    echo "<div id='infoitem5' class='col-sm-8'>" . $rowbcity['cityname'];
                                    if ($rowbcity['cityname'] != "") {
                                        echo ", ";
                                    }
                                    echo $rowbcountry['countryname'] . "</div><div class='col-sm-4'></div>";
                                }
                            }
                        } else if ($rel->num_rows == 0) {

                            if ($rowbplace['birthplace_privacy'] == 0) {

                                echo "<div id='infoitem5' class='col-sm-8'>" . $rowbcity['cityname'];
                                if ($rowbcity['cityname'] != "") {
                                    echo ", ";
                                }
                                echo $rowbcountry['countryname'] . "</div><div class='col-sm-4'></div>";

                            }
                        }




                    }

                }
            }
        }
    }
}

?>