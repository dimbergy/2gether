<?php

require('../includes/db_connect.php');
session_start();


$email = $_SESSION['email'];

$picid = $_POST['picid'];


if(!empty($_POST['phototit'])) {
    $phototitle = $_POST['phototit'];
    $phototitle = stripslashes($_POST['phototit']); // removes backslashes
    $phototitle = mysqli_real_escape_string($conn, $phototitle); //escapes special characters in a string

    $conn->query("UPDATE photos SET img_title='$phototitle' WHERE id=$picid");

}


if(!empty($_POST['photodesc'])) {
    $photodesc = $_POST['photodesc'];
    $photodesc = stripslashes($_POST['photodesc']); // removes backslashes
    $photodesc = mysqli_real_escape_string($conn, $photodesc); //escapes special characters in a string

    $conn->query("UPDATE photos SET img_desc='$photodesc' WHERE id=$picid");

}

$q = $conn->query("SELECT album_id FROM photos INNER JOIN albums ON albums.id=album_id WHERE photos.id=$picid");
if($q->num_rows > 0) {
    while($row = $q->fetch_assoc()){

        $albumid=$row['album_id'];
    }
}

if(!empty($_POST['photocity'])) {
    $photocity = $_POST['photocity'];
    $photocity = stripslashes($_POST['photocity']); // removes backslashes
    $photocity = mysqli_real_escape_string($conn, $photocity); //escapes special characters in a string


    $city_check = $conn->query("SELECT id, city FROM cities WHERE city='$photocity'");
    if ($city_check->num_rows == 0) {

        $conn->query("INSERT INTO cities (id, city) VALUES (DEFAULT, '$photocity')");

        $phcit = $conn->query("SELECT id FROM cities WHERE city='$photocity'");
        if ($phcit->num_rows > 0) {
            while ($rowphcit = $phcit->fetch_assoc()) {

                $cityid = $rowphcit['id'];
            }

        }

    } else {
        while ($rowcity = $city_check->fetch_assoc()) {

            $cityid = $rowcity['id'];
        }

    }
    
    
   $conn->query("UPDATE albums SET album_city=$cityid WHERE id=$albumid");

}


$photocountry = $_POST['photocountry'];

 $conn->query("UPDATE albums SET album_country=$photocountry WHERE id=$albumid");

$photoprivacy = $_POST['photoprivacy'];

 $conn->query("UPDATE photos SET img_privacy=$photoprivacy WHERE id=$picid");


$users = $conn->query("SELECT id FROM users WHERE email='$email'");
if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {

        $userid = $row['id'];
        header("location: ../user_photos.php?u=" . $userid);
    }
}




?>