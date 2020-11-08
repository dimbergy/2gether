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

if(isset($_POST['hide'])){

    $hide = $_POST['hide'];
}

$conn->query("UPDATE posts SET post_hide=1 WHERE id=$hide");


header("location: ". $_SERVER['HTTP_REFERER']);



?>