<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];
$receiver=$_POST['receiver'];

echo $email;
echo "<br />";
echo $receiver;
echo "<br />";


$session = $conn->query("SELECT id FROM users WHERE email='$email'");
if($session->num_rows) {
    while ($rowsession=$session->fetch_assoc()){

        $sessionuser = $rowsession['id'];
    }

}



if(!empty($_POST['message'])) {

    $message = $_POST['message'];
    $message = stripslashes($_POST['message']); // removes backslashes
    $message = mysqli_real_escape_string($conn, $message); //escapes special characters in a string


    $conn->query("INSERT INTO messages (id, message, sent_at, msg_from, msg_to, opened, opened_at, recipient_del, sender_del) VALUES (DEFAULT, '$message', now(), $sessionuser, $receiver, 0, NULL, 0, 0)");



echo "$sessionuser";

   // header("location: ../user_messages.php?u=" . $sender);

} else {

    header("location: ../user_messages.php?u=" . $sender);
}





?>