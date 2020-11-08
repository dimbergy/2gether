<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $sx = $conn->query("SELECT id, sex FROM users WHERE id=$id");


            if ($sx->num_rows > 0) {
                while ($rowsx = $sx->fetch_assoc()) {


                    $sx_id = $_POST['privsel'];

                    if (isset($_POST['sexpr'])) {

                        $conn->query($upd = "UPDATE sexprivacy SET sex_privacy=$sx_id, updated_at=now() WHERE user_id=$id");


                    }


                }
            }

        }
    }

}

header("location: ../user_profile.php?url=".$id);

?>


