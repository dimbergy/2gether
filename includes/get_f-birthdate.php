<?php


$bdate = $conn->query("SELECT day_id, month, year, bdaymonth_privacy, byear_privacy FROM users INNER JOIN months ON months.id=users.month_id INNER JOIN bdaymonthprivacy ON bdaymonthprivacy.user_id=users.id INNER JOIN byearprivacy ON byearprivacy.user_id=users.id INNER JOIN years ON years.id=users.year_id WHERE users.id=$id");


if ($bdate->num_rows > 0) {
    while($rowbdate = $bdate->fetch_assoc()) {

                        $rel = $conn->query("SELECT status FROM relationship WHERE ((user1_id=$id OR user1_id=$x) AND (user2_id=$x OR user2_id=$id))");

                        if ($rel->num_rows > 0) {
                            while ($rowrel = $rel->fetch_assoc()) {

                                echo "<div id='infoitem6' class='col-sm-8'>";

                                if ($rowrel['status'] == 1 && ($rowbdate['bdaymonth_privacy'] == 1 OR $rowbdate['bdaymonth_privacy'] == 0)) {

                                    echo $rowbdate['day_id'].", ". $rowbdate['month']. " "; }

                                if ($rowrel['status'] == 1 && ($rowbdate['byear_privacy'] == 1 OR $rowbdate['byear_privacy'] == 0)) {

                                    echo $rowbdate['year'];
                                }
                                echo "</div><div class='col-sm-4'></div>";
                            }
                        } else if ($rel->num_rows == 0) {

                            echo "<div id='infoitem6' class='col-sm-8'>";

                            if ($rowbdate['bdaymonth_privacy'] == 0) {

                                echo $rowbdate['day_id'].", ". $rowbdate['month']. " "; }

                            if ($rowbdate['byear_privacy'] == 0) {

                                 echo $rowbdate['year'];
                                }
                            echo "</div><div class='col-sm-4'></div>";

                            }
                        }




                    }



?>