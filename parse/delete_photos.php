<?php

require('../includes/db_connect.php');
session_start();


$email = $_SESSION['email'];

$picid = $_POST['picid'];


$conn->query($del = "DELETE FROM photos WHERE id=$picid");

$users = $conn->query("SELECT id FROM users WHERE email='$email'");
if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {

        header("location: ../user_photos.php?u=" . $userid);
    }
}




?>