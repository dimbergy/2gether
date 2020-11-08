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

iF(isset($_POST['photoid'])) {

$photoid = $_POST['photoid'];

}

if(isset($_POST['phcomment'])) {
    if (!empty($_POST['phcomment'])) {
        $phcomment = $_POST['phcomment'];
        $phcomment = stripslashes($_POST['phcomment']); // removes backslashes
        $phcomment = mysqli_real_escape_string($conn, $phcomment); //escapes special characters in a string


        $mkphcom= $conn->query("INSERT INTO comments_photos (id, photo_comment, photocom_at, photocom_by, photo_id, com_status) VALUES (DEFAULT, '$phcomment', now(), $userid, $photoid, 0)");

       header("location: ". $_SERVER['HTTP_REFERER']);

    }
} else {


   header("location: ". $_SERVER['HTTP_REFERER']);


}


?>