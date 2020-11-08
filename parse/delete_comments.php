<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];


if(isset($_POST['photoid'])){

    $photoid = $_POST['photoid'];
}

if(isset($_POST['photocomid'])){

    $photocomid = $_POST['photocomid'];
}


$conn->query("DELETE FROM comments_photos WHERE id=$photocomid AND photo_id=$photoid");


header("location: ". $_SERVER['HTTP_REFERER']);


?>