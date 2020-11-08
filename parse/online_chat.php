<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];

$user = $conn->query("SELECT id FROM users WHERE email='$email'");
if($user->num_rows > 0){
    while ($row=$user->fetch_assoc()){
        $userid=$row['id'];
    }
}



    $log = $conn->query("SELECT id, user_id, online FROM sessions WHERE user_id=$userid");

    if($log->num_rows > 0) {
        while ($rowlog = $log->fetch_assoc()) {

            if ($rowlog['online']==1) {

                $conn->query("UPDATE sessions SET online=0 WHERE user_id=$userid");

                header("location: ". $_SERVER['HTTP_REFERER']);
            } else {

                $conn->query("UPDATE sessions SET online=1 WHERE user_id=$userid");

                header("location: ". $_SERVER['HTTP_REFERER']);
            }

        }

    }



?>