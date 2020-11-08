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


$sel = $conn->query("SELECT * FROM likes_videos WHERE liked_by=$userid AND video_id=$videoid");
if($sel->num_rows > 0) {

    header("location: ". $_SERVER['HTTP_REFERER']);

} else {

    $like= $conn->query("INSERT INTO likes_videos (id, liked_by, video_id, like_status) VALUES (DEFAULT, $userid, $videoid, 0)");

    header("location: ". $_SERVER['HTTP_REFERER']);

}





?>