<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $bpl = $conn->query("SELECT * FROM birthplace WHERE user_id=$id");


            if ($bpl->num_rows > 0) {
                while ($rowbpl = $bpl->fetch_assoc()) {


                    $bpl_id = $_POST['privsel'];

                    if (isset($_POST['bplpr'])) {

                        $conn->query($upd = "UPDATE birthplace SET birthplace_privacy=$bpl_id, updated_at=now() WHERE user_id=$id");


                    } else if (isset($_POST['bplrmv'])) {

                        $conn->query($del1 = "DELETE FROM birthplace WHERE user_id=$id");
                        $conn->query($del2 = "DELETE FROM bcity WHERE user_id=$id");
                        $conn->query($del3 = "DELETE FROM bcountry WHERE user_id=$id");
                    }


                }
            }

        }
    }

}

header("location: ../user_profile.php?url=".$id);

?>


