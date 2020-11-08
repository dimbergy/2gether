<?php

require('../includes/db_connect.php');
session_start();

if(isset($_POST['message'], $_POST['recipient'])) {


    $email = $_SESSION['email'];
    $recipient = $_POST['recipient'];


    $session = $conn->query("SELECT id FROM users WHERE email='$email'");
    if ($session->num_rows) {
        while ($rowsession = $session->fetch_assoc()) {

            $sessionuser = $rowsession['id'];
        }

    }


    if (!empty($_POST['message'])) {

        $message = $_POST['message'];
        $message = stripslashes($_POST['message']); // removes backslashes
        $message = mysqli_real_escape_string($conn, $message); //escapes special characters in a string


        $conn->query("INSERT INTO messages (id, message, sent_at, msg_from, msg_to, opened, opened_at, recipient_del, sender_del) VALUES (DEFAULT, '$message', now(), $sessionuser, $recipient, 0, NULL, 0, 0)");


    }


    header("location: ../friend_profile.php?u=" . $recipient);


}

?>