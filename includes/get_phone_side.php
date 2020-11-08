<?php

if ($u=='friend') {

    $tel = $conn->query("SELECT phone_privacy, phone_number FROM phones INNER JOIN users ON users.id=user_id WHERE user_id=".$rows['id']."");

    iF($tel->num_rows > 0){
        while($rowtel = $tel->fetch_assoc()){

            $phoneprivacy = $rowtel['phone_privacy'];
            $phone=$rowtel['phone_number'];




    if($phoneprivacy==0) {

        echo "<li><i class='fa fa-phone'></i> ".$phone."</li>";

    } else if ($phoneprivacy == 1) {

        if($status==1) {

            echo "<li><i class='fa fa-phone'></i> ".$phone."</li>";

        }


    }
        }
    }


} else if ($u=='user') {

    $tel = $conn->query("SELECT phone_privacy, phone_number FROM phones INNER JOIN users ON users.id=user_id WHERE email='$email'");

    iF($tel->num_rows > 0){
        while($rowtel = $tel->fetch_assoc()){

            echo "<li><i class='fa fa-phone'></i> ".$rowtel['phone_number']."</li>";

        }
    }
}
?>

