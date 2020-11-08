<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $eml = $conn->query("SELECT id, email FROM users WHERE id=$id");


            if ($eml->num_rows > 0) {
                while ($roweml = $eml->fetch_assoc()) {


                    $eml_id = $_POST['privsel'];

                    if (isset($_POST['mailpr'])) {

                        $conn->query($upd = "UPDATE mailprivacy SET email_privacy=$eml_id, updated_at=now() WHERE user_id=$id");


                    }


                }
            }

        }
    }

}

header("location: ../user_profile.php?url=".$id);

?>


