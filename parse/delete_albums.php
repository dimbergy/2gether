<?php

require('../includes/db_connect.php');
session_start();


$email = $_SESSION['email'];

$id = $_POST['albumid'];


$conn->query($del = "DELETE FROM albums WHERE id=$id");

$users = $conn->query("SELECT id FROM users WHERE email='$email'");
if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {

       header("location: ../user_photos.php?u=" . $userid);
    }
}




?>