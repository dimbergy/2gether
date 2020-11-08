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


$sel = $conn->query("SELECT * FROM likes_photos WHERE liked_by=$userid AND photo_id=$photoid");
if($sel->num_rows > 0) {

    header("location: ". $_SERVER['HTTP_REFERER']);
} else {

    $like= $conn->query("INSERT INTO likes_photos (id, liked_by, photo_id, like_status) VALUES (DEFAULT, $userid, $photoid, 0)");
    header("location: ". $_SERVER['HTTP_REFERER']);
}










?>