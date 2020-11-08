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



$postid = $_POST['postid'];


$sel = $conn->query("SELECT * FROM likes_posts WHERE liked_by=$userid AND post_id=$postid");
if($sel->num_rows > 0) {

    header("location: ". $_SERVER['HTTP_REFERER']);

} else {

    $like= $conn->query("INSERT INTO likes_posts (id, liked_by, post_id, like_status) VALUES (DEFAULT, $userid, $postid, 0)");
    header("location: ". $_SERVER['HTTP_REFERER']);
}










?>