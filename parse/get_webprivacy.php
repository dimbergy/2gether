<?php

require('../includes/db_connect.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];

            $web_id = $_POST['selection'];
            $pr_id = $_POST['privsel'];


     $website = $conn->query("SELECT websites.id AS wbsid, user_id, website_link FROM websites INNER JOIN users ON users.id=user_id WHERE users.email='$email' AND websites.id=".$_POST['selection']."");

            if ($website->num_rows > 0) {
                while ($rowsite = $website->fetch_assoc()) {



                   if (isset($_POST['webpr'])) {

                  $conn->query($update = "UPDATE websites SET website_privacy=$pr_id, updated_at=now() WHERE id=$web_id");



                } else if  (isset($_POST['webrmv'])) {

                  $conn->query($delete = "DELETE FROM websites WHERE id=$web_id");
                    }


                }
            } else { echo "0 results"; }

        }
    }

}

header("location: ../user_profile.php?url=".$id);

?>


