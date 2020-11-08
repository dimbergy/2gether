<?php

require('../includes/db_connect.php');
session_start();


$email = $_SESSION['email'];

$videoid = $_POST['videoid'];


if(!empty($_POST['videotit'])) {
    $videotitle = $_POST['videotit'];
    $videotitle = stripslashes($_POST['videotit']); // removes backslashes
    $videotitle = mysqli_real_escape_string($conn, $videotitle); //escapes special characters in a string

    $conn->query("UPDATE videos SET video_title='$videotitle' WHERE id=$videoid");

}


if(!empty($_POST['videodesc'])) {
    $videodesc = $_POST['videodesc'];
    $videodesc = stripslashes($_POST['videodesc']); // removes backslashes
    $videodesc = mysqli_real_escape_string($conn, $videodesc); //escapes special characters in a string

    $conn->query("UPDATE videos SET video_desc='$videodesc' WHERE id=$videoid");

}


if(!empty($_POST['videocity'])) {
    $videocity = $_POST['videocity'];
    $videocity = stripslashes($_POST['videocity']); // removes backslashes
    $videocity = mysqli_real_escape_string($conn, $videocity); //escapes special characters in a string


    $city_check = $conn->query("SELECT id, city FROM cities WHERE city='$videocity'");
    if ($city_check->num_rows == 0) {

        $conn->query("INSERT INTO cities (id, city) VALUES (DEFAULT, '$videocity')");

        $vicit = $conn->query("SELECT id FROM cities WHERE city='$videocity'");
        if ($vicit->num_rows > 0) {
            while ($rowvicit = $vicit->fetch_assoc()) {

                $cityid = $rowvicit['id'];
            }

        }

    } else {
        while ($rowcity = $city_check->fetch_assoc()) {

            $cityid = $rowcity['id'];
        }

    }

    $conn->query("UPDATE videos SET video_city=$cityid WHERE id=$videoid");

}


$videoprivacy = $_POST['videoprivacy'];
$videocountry = $_POST['videocountry'];


$conn->query("UPDATE videos SET video_country=$videocountry, video_privacy=$videoprivacy WHERE id=$videoid");

$users = $conn->query("SELECT id FROM users WHERE email='$email'");
if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {

        $userid = $row['id'];
        header("location: ../user_photos.php?u=" . $userid);
    }
}




?>