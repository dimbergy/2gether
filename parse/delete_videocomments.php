<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];


if(isset($_POST['videoid'])){

    $videoid = $_POST['videoid'];
}

if(isset($_POST['videocomid'])){

    $comid = $_POST['videocomid'];
}


$conn->query("DELETE FROM comments_videos WHERE id=$videocomid AND video_id=$videoid");


header("location: ". $_SERVER['HTTP_REFERER']);


?>