<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];


if(isset($_POST['delete'])){

    $delete = $_POST['delete'];
}

$conn->query("DELETE FROM posts WHERE id=$delete");


header("location: ". $_SERVER['HTTP_REFERER']);




?>