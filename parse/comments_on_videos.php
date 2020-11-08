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

iF(isset($_POST['videoid'])) {

$videoid = $_POST['videoid'];

}

if(isset($_POST['vcomment'])) {
    if (!empty($_POST['vcomment'])) {
        $vcomment = $_POST['vcomment'];
        $vcomment = stripslashes($_POST['vcomment']); // removes backslashes
        $vcomment = mysqli_real_escape_string($conn, $vcomment); //escapes special characters in a string


        $mkvcom= $conn->query("INSERT INTO comments_videos (id, video_comment, videocom_at, videocom_by, video_id, com_status) VALUES (DEFAULT, '$vcomment', now(), $userid, $videoid, 0)");

       header("location: ". $_SERVER['HTTP_REFERER']);

    }
} else {


   header("location: ". $_SERVER['HTTP_REFERER']);


}


?>