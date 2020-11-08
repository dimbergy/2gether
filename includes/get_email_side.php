<?php

if ($u=='friend') {

    $mail = $conn->query("SELECT email, email_privacy FROM mailprivacy INNER JOIN users ON users.id=user_id WHERE user_id=".$rows['id']."");

    iF($mail->num_rows > 0){
        while($rowmail = $mail->fetch_assoc()){

            $mailprivacy = $rowmail['email_privacy'];
            $mailadd=$rowmail['email'];

        }
    }


    if($mailprivacy==0) {

        echo "<a href='mailto:".$mailadd."'><li><i class='fa fa-at'></i> ".$mailadd."</li></a>";

    } else if ($mailprivacy == 1) {

        if($status==1) {

            echo "<a href='mailto:".$mailadd."'><li><i class='fa fa-at'></i> ".$mailadd."</li></a>";

        }


    }



} else if ($u=='user') {


    echo "<a href='mailto:".$email."'><li><i class='fa fa-at'></i> ".$email."</li></a>";


}
?>

