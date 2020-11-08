<?php

if ($u=='friend') {

    $ypr = $conn->query("SELECT byear_privacy FROM byearprivacy INNER JOIN users ON users.id=byearprivacy.user_id WHERE user_id=".$rows['id']."");

    iF($ypr->num_rows > 0){
        while($rowypr = $ypr->fetch_assoc()){

            $privacy = $rowypr['byear_privacy'];
        }
    }

    $y = $conn->query("SELECT year FROM years INNER JOIN users ON years.id=year_id WHERE users.id=".$rows['id']."");
    if($y->num_rows > 0) {
        while($rowy = $y->fetch_assoc()){
            $year = $rowy['year'];
        }

    }


    if($privacy==0) {

        echo $year;

    } else if ($privacy == 1) {

        if($status==1) {

            echo $year;

        }


    }



} else if ($u=='user') {

    $y = $conn->query("SELECT years.id, year FROM years INNER JOIN users ON years.id=users.year_id WHERE email='$email'");


    if ($y->num_rows > 0) {
        while ($row3 = $y->fetch_assoc()) {
            echo $row3['year'];
        }
    }
}
?>

