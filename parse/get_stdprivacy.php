<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $std = $conn->query("SELECT studies.id AS stid, user_id, study_desc FROM studies INNER JOIN users ON users.id=user_id WHERE users.email='$email' AND studies.id=".$_POST['selection']."");


            if ($std->num_rows > 0) {
                while ($rowstd = $std->fetch_assoc()) {

                    $std_id = $_POST['selection'];
                    $pr_id = $_POST['privsel'];

                if (isset($_POST['stdpr'])) {

                    $conn->query($upd = "UPDATE studies SET study_privacy=$pr_id, updated_at=now() WHERE id=$std_id");
                    

                } else if (isset($_POST['stdrmv'])) {

                    $conn->query($del = "DELETE FROM studies WHERE id=$std_id");
                }


                }
            }

        }
    }

}

header("location: ../user_profile.php?url=".$id);

?>


