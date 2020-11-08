<?php

if ($u=='friend') {

$daymonth = $conn->query("SELECT day_id, month_id, bdaymonth_privacy FROM users INNER JOIN bdaymonthprivacy ON users.id=user_id WHERE users.id=".$rows['id']."");

iF($daymonth->num_rows){
    while($rowdaymo = $daymonth->fetch_assoc()){

        $day = $rowdaymo['day_id'];
        $month = $rowdaymo['month_id'];
        $dmprivacy = $rowdaymo['bdaymonth_privacy'];
    }
}

if ($dmprivacy==0) {

    echo $day;
    echo " ";

    $mo = $conn->query("SELECT month FROM months WHERE id=$month");
    if($mo->num_rows > 0){
        while($rowmo = $mo->fetch_assoc()){

            echo $rowmo['month'];
        }
    }


} else if ($dmprivacy==1) {
    if ($status == 1) {

        echo $day;
        echo " ";
        $mo = $conn->query("SELECT month FROM months WHERE id=$month");
        if ($mo->num_rows > 0) {
            while ($rowmo = $mo->fetch_assoc()) {

                echo $rowmo['month'];
            }
        }

    }

}

} else if ($u=='user') {

echo $row['day_id'];
echo " ";
    $mo = $conn->query("SELECT month FROM months INNER JOIN users ON months.id=month_id WHERE users.id=".$row['id']."");
    if ($mo->num_rows > 0) {
        while ($rowmo = $mo->fetch_assoc()) {

            echo $rowmo['month'];
        }
    }


}

?>