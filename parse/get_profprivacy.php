<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $prf = $conn->query("SELECT professions.id AS prfid, user_id, profession_desc FROM professions INNER JOIN users ON users.id=user_id WHERE users.email='$email' AND professions.id=".$_POST['selection']."");


            if ($prf->num_rows > 0) {
                while ($rowprf = $prf->fetch_assoc()) {

                    $prf_id = $_POST['selection'];
                    $pr_id = $_POST['privsel'];

                    if (isset($_POST['prfpr'])) {

                        $conn->query($upd = "UPDATE professions SET profession_privacy=$pr_id, updated_at=now() WHERE id=$prf_id");


                    } else if (isset($_POST['prfrmv'])) {

                        $conn->query($del = "DELETE FROM professions WHERE id=$prf_id");
                    }


                }
            }

        }
    }

}

header("location: ../user_profile.php?url=".$id);

?>


