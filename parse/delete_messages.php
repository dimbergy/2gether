<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];

$session = $conn->query("SELECT id FROM users WHERE email='$email'");
if($session->num_rows > 0) {
    while ($rowsession=$session->fetch_assoc()){

        $sessionuser = $rowsession['id'];
    }

}


    $messageid = $_POST['messageid'];
    $messageid = stripslashes($_POST['messageid']); // removes backslashes
    $messageid = mysqli_real_escape_string($conn, $messageid); //escapes special characters in a string



    $del = $conn->query("SELECT id, msg_from, msg_to, message FROM messages WHERE id='$messageid'");
    if($del->num_rows>0) {
        while ($rowdel = $del->fetch_assoc()) {

            $sender = $rowdel['msg_from'];
            $recipient = $rowdel['msg_to'];


            if ($sender == $sessionuser) {

                $conn->query("UPDATE messages SET sender_del=1 WHERE id='$messageid'");

            } else if ($recipient == $sessionuser) {

                $conn->query("UPDATE messages SET recipient_del=1 WHERE id='$messageid'");

            }
        }

    }

              header("location: ../user_messages.php?u=" . $sessionuser);


?>