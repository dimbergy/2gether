<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $hpl = $conn->query("SELECT id, city_id, country_id FROM users WHERE id=$id");


            if ($hpl->num_rows > 0) {
                while ($rowhpl = $hpl->fetch_assoc()) {


                    $hpl_id = $_POST['privsel'];

                    if (isset($_POST['hplpr'])) {

                        $conn->query($upd = "UPDATE homeplace SET homeplace_privacy=$hpl_id, updated_at=now() WHERE user_id=$id");


                    }


                }
            }

        }
    }

}

header("location: ../user_profile.php?url=".$id);

?>


