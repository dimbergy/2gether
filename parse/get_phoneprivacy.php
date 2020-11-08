<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $tel = $conn->query("SELECT user_id, phone_number FROM phones WHERE user_id=$id");


            if ($tel->num_rows > 0) {
                while ($rowtel = $tel->fetch_assoc()) {


                    $pr_id = $_POST['privsel'];

                    if (isset($_POST['phopr'])) {

                        $conn->query($upd = "UPDATE phones SET phone_privacy=$pr_id, updated_at=now() WHERE user_id=$id");


                    } else if (isset($_POST['phormv'])) {

                        $conn->query($del = "DELETE FROM phones WHERE user_id=$id");
                    }


                }
            }

        }
    }

}

header("location: ../user_profile.php?url=".$id);

?>


