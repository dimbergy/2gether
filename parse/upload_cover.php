<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];


$name = $_FILES['mycover']['name'];
$type = $_FILES['mycover']['type'];
$size = $_FILES['mycover']['size'];
$temp = $_FILES['mycover']['tmp_name'];
$error = $_FILES['mycover']['error'];
$kaboom = explode(".", $name); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
$path = "../users/covers/";

if (!$temp) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
} else if($size > 5242880) { // if file size is larger than 5 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($temp); // Remove the uploaded file from the PHP temp folder
    exit();
} else if (!preg_match("/.(gif|jpg|png)$/i", $name) ) {
    // This condition is only if you wish to allow uploading of specific file types
    echo "ERROR: Your image was not .gif, .jpg, or .png.";
    unlink($temp); // Remove the uploaded file from the PHP temp folder
    exit();
} else if ($error == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}



$moveResult = move_uploaded_file($temp, "../users/covers/$name");
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($temp2); // Remove the uploaded file from the PHP temp folder
    exit();
}
unlink($temp2); // Remove the uploaded file from the PHP temp folder

include_once("ak_php_img_lib_1.0.php");


if ($fileExt == "jpg") {

    $target_file = "../users/covers/$name";
    $resized_file = "../users/covers/thumbs/rsz_$name";
    $wmax = 800;
    $hmax = 300;
    ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
    //unlink($target_file);
    $cover_src = "users/covers/$name";


    $target_file = "../users/covers/thumbs/rsz_$name";
    $thumbnail = "../users/covers/thumbs/$name";
    $wthumb = 300;
    $hthumb = 300;
    ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
    unlink($target_file);

    $cover_thumb = "users/covers/thumbs/$name";


    $users = $conn->query("SELECT id, city_id, country_id FROM users WHERE email='$email'");
    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {

            $covers = $conn->query("SELECT * FROM albums WHERE album_cat=1 AND created_by=" . $row['id'] . "");

            if ($covers->num_rows == 0) {

                $conn->query("INSERT INTO albums (id, album_title, album_desc, album_city, album_country, created_by, created_at, album_thumb, album_path, album_cat, album_privacy) VALUES (DEFAULT, 'Cover Photos', NULL, ".$row['city_id'].", ".$row['country_id'].", " . $row['id'] . ", now(), '$cover_thumb', '$path', 1, 0)");

                $albums = $conn->query("SELECT id FROM albums WHERE album_cat=1 AND created_by=" . $row['id'] . "");
                if ($albums->num_rows > 0) {
                    while ($rowalbum = $albums->fetch_assoc()) {

                        $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$cover_thumb', '$cover_src', NULL, NULL, " . $row['id'] . ", now(), 0, " . $rowalbum['id'] . ")");



                    }
                }
            } else if ($covers->num_rows > 0) {
                while ($rowcovers = $covers->fetch_assoc()) {
                    $conn->query("UPDATE albums SET album_thumb='$cover_thumb' WHERE album_cat=1");

                    $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$cover_thumb', '$cover_src', NULL, NULL, " . $row['id'] . ", now(), 0, " . $rowcovers['id'] . ")");


                }

            }

            header("location: ../user_timeline.php?u=" . $row['id']);
            }


    }  else { echo "0 results"; }


} else {

    $target_file = "../users/covers/$name";
    $thumbnail = "../users/covers/thumbs/$name";
    $wthumb = 200;
    $hthumb = 200;
    ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
    //unlink($target_file);

    $cover_src = "users/covers/$name";
    $cover_thumb = "users/covers/thumbs/$name";


    $users = $conn->query("SELECT id, city_id, country_id FROM users WHERE email='$email'");
    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {

            $covers = $conn->query("SELECT * FROM albums WHERE album_cat=1 AND created_by=" . $row['id'] . "");

            if ($covers->num_rows == 0) {

                $conn->query("INSERT INTO albums (id, album_title, album_desc, album_city, album_country, created_by, created_at, album_thumb, album_path, album_cat, album_privacy) VALUES (DEFAULT, 'Cover Photos', NULL, ".$row['city_id'].", ".$row['country_id'].", " . $row['id'] . ", now(), '$cover_thumb', '$path', 1, 0)");

                $albums = $conn->query("SELECT id FROM albums WHERE album_cat=1 AND created_by=" . $row['id'] . "");
                if ($albums->num_rows > 0) {
                    while ($rowalbum = $albums->fetch_assoc()) {

                        $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$cover_thumb', '$cover_src', NULL, NULL, " . $row['id'] . ", now(), 0, " . $rowalbum['id'] . ")");



                    }
                }
            } else if ($covers->num_rows > 0) {
                while ($rowcovers = $covers->fetch_assoc()) {
                    $conn->query("UPDATE albums SET album_thumb='$cover_thumb'");

                    $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$cover_thumb', '$cover_src', NULL, NULL, " . $row['id'] . ", now(), 0, " . $rowcovers['id'] . ")");


                }

            }

            header("location: ../user_timeline.php?u=" . $row['id']);
        }


    }  else { echo "0 results"; }
}


?>