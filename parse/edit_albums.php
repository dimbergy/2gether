<?php

require('../includes/db_connect.php');
session_start();


    $email = $_SESSION['email'];

    $id = $_POST['albumid'];


    if(!empty($_POST['albumtit'])) {
        $albumtitle = $_POST['albumtit'];
        $albumtitle = stripslashes($_POST['albumtit']); // removes backslashes
        $albumtitle = mysqli_real_escape_string($conn, $albumtitle); //escapes special characters in a string

        $conn->query("UPDATE albums SET album_title='$albumtitle' WHERE id=$id");

    }


if(!empty($_POST['albumdesc'])) {
    $albumdesc = $_POST['albumdesc'];
    $albumdesc = stripslashes($_POST['albumdesc']); // removes backslashes
    $albumdesc = mysqli_real_escape_string($conn, $albumdesc); //escapes special characters in a string

    $conn->query("UPDATE albums SET album_desc='$albumdesc' WHERE id=$id");

}


if(!empty($_POST['albumcity'])) {
    $albumcity = $_POST['albumcity'];
    $albumcity = stripslashes($_POST['albumcity']); // removes backslashes
    $albumcity = mysqli_real_escape_string($conn, $albumcity); //escapes special characters in a string


    $city_check = $conn->query("SELECT id, city FROM cities WHERE city='$albumcity'");
    if ($city_check->num_rows == 0) {

        $conn->query("INSERT INTO cities (id, city) VALUES (DEFAULT, '$albumcity')");

        $ablcit = $conn->query("SELECT id FROM cities WHERE city='$albumcity'");
        if ($albcit->num_rows > 0) {
            while ($rowalbcit = $albcit->fetch_assoc()) {

                $cityid = $rowalbcit['id'];
            }

        }

    } else {
        while ($rowcity = $city_check->fetch_assoc()) {

            $cityid = $rowcity['id'];
        }

    }

    $conn->query("UPDATE albums SET album_city=$cityid WHERE id=$id");

}


    $albumprivacy = $_POST['albumprivacy'];
    $albumcountry = $_POST['albumcountry'];


    $conn->query("UPDATE albums SET album_country=$albumcountry, album_privacy=$albumprivacy WHERE id=$id");

$users = $conn->query("SELECT id FROM users WHERE email='$email'");
if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {

        $userid = $row['id'];
        header("location: ../user_photos.php?u=" . $userid);
    }
}




?>