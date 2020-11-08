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

iF(isset($_POST['postid'])) {

$postid = $_POST['postid'];

}

if(isset($_POST['comment'])) {
    if (!empty($_POST['comment'])) {
        $comment = $_POST['comment'];
        $comment = stripslashes($_POST['comment']); // removes backslashes
        $comment = mysqli_real_escape_string($conn, $comment); //escapes special characters in a string


        $mkcom= $conn->query("INSERT INTO comments_posts (id, comment, com_at, com_by, post_id, com_status) VALUES (DEFAULT, '$comment', now(), $userid, $postid, 0)");

       header("location: ". $_SERVER['HTTP_REFERER']);

    }
} else {


   header("location: ". $_SERVER['HTTP_REFERER']);


}


?>