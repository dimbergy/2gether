<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];


if(isset($_POST['show'])){

    $show = $_POST['show'];
}


$conn->query("UPDATE posts SET post_hide=0 WHERE posted_to=$show");


header("location: ". $_SERVER['HTTP_REFERER']);



?>