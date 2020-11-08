<?php

if ($u=='friend') {

    $sexpr = $conn->query("SELECT sex_privacy, sex FROM sexprivacy INNER JOIN users ON users.id=sexprivacy.user_id WHERE user_id=".$rows['id']."");

    iF($sexpr->num_rows > 0){
        while($rowsex = $sexpr->fetch_assoc()){

            $sexprivacy = $rowsex['sex_privacy'];
            $sex=$rowsex['sex'];
            if ($sex=='1') {

                $sex = "<li><i class='icon-male'></i> Male</li>";

            } else {

                $sex = "<li><i class='icon-female'></i> Female</li>";
            }
        }
    }


    if($sexprivacy==0) {

        echo $sex;

    } else if ($sexprivacy == 1) {

        if($status==1) {

            echo $sex;

        }


    }



} else if ($u=='user') {

    $gender = $conn->query("SELECT sex FROM users WHERE email='$email'");

    if ($gender->num_rows > 0) {
        while ($rowgender = $gender->fetch_assoc()) {

            $sex = $rowgender['sex'];

            if ($sex==1) { ?>

                <li><i class="icon-male"></i>Male</li>

            <?php } else { ?>

                <li><i class="icon-female"></i>Female</li>

           <?php  }

        }
    }
}
?>

