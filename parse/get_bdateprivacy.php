<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $bdmprivacy = $conn->query("SELECT * FROM bdaymonthprivacy WHERE user_id=$id");
            $byprivacy = $conn->query("SELECT * FROM byearprivacy WHERE user_id=$id");


            if ($bdmprivacy->num_rows > 0) {
                while ($rowbdmprivacy = $bdmprivacy->fetch_assoc()) {


                    if ($byprivacy->num_rows > 0) {
                        while ($rowbyprivacy = $byprivacy->fetch_assoc()) {

                            $bdm_id = $_POST['privsel1'];
                            $by_id = $_POST['privsel2'];

                            if (isset($_POST['bdaymopr'])) {

                                $conn->query($upd1 = "UPDATE  bdaymonthprivacy SET bdaymonth_privacy=$bdm_id, updated_at=now() WHERE user_id=$id");


                            } else if (isset($_POST['byearpr'])) {

                                $conn->query($upd2 = "UPDATE byearprivacy SET byear_privacy=$by_id, updated_at=now() WHERE user_id=$id");
                            }


                        }
                    }

                }
            }

        }
    }
}
header("location: ../user_profile.php?url=".$id);

?>


