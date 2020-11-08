<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];


if(isset($_POST['postid'])){

    $postid = $_POST['postid'];
}

if(isset($_POST['comid'])){

    $comid = $_POST['comid'];
}


$conn->query("DELETE FROM comments_posts WHERE id=$comid AND post_id=$postid");


header("location: ". $_SERVER['HTTP_REFERER']);


?>