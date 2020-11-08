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

$conn->query("DELETE FROM sessions WHERE user_id=$userid");


session_destroy();
$_SESSION = array();
header("location: ../index.php");

?>