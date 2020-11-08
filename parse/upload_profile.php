<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];

$name = $_FILES['myprofile']['name'];
$type = $_FILES['myprofile']['type'];
$size = $_FILES['myprofile']['size'];
$temp = $_FILES['myprofile']['tmp_name'];
$error = $_FILES['myprofile']['error'];
$kaboom = explode(".", $name); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
$path = "../users/profiles/";

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



    $moveResult = move_uploaded_file($temp, "../users/profiles/$name");
    if ($moveResult != true) {
        echo "ERROR: File not uploaded. Try again.";
        unlink($temp2); // Remove the uploaded file from the PHP temp folder
        exit();
    }
    unlink($temp2); // Remove the uploaded file from the PHP temp folder

    include_once("ak_php_img_lib_1.0.php");


if ($fileExt == "jpg") {

    $target_file = "../users/profiles/$name";
    $resized_file = "../users/profiles/thumbs/rsz_$name";
    $wmax = 500;
    $hmax = 500;
    ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
    //unlink($target_file);
    $profile_src = "users/profiles/$name";


    $target_file = "../users/profiles/thumbs/rsz_$name";
    $thumbnail = "../users/profiles/thumbs/$name";
    $wthumb = 200;
    $hthumb = 200;
    ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
    unlink($target_file);


    $avatar_name = "users/profiles/thumbs/$name";


    $users =$conn->query("SELECT id, city_id, country_id FROM users WHERE email='$email'");
    if ($users->num_rows > 0) {

        while ($row = $users->fetch_assoc()) {


            $conn->query("UPDATE users SET avatar='$avatar_name' WHERE id=" . $row['id'] . "");

            $covers = $conn->query("SELECT * FROM albums WHERE album_cat=2 AND created_by=" . $row['id'] . "");

            if ($covers->num_rows == 0) {

                $conn->query("INSERT INTO albums (id, album_title, album_desc, album_city, album_country, created_by, created_at, album_thumb, album_path, album_cat, album_privacy) VALUES (DEFAULT, 'Profile Pictures', NULL, ".$row['city_id'].", ".$row['country_id'].", " . $row['id'] . ", now(), '$avatar_name', '$path', 2, 0)");

                $albums = $conn->query("SELECT id FROM albums WHERE album_cat=2 AND created_by=" . $row['id'] . "");
                if ($albums->num_rows > 0) {
                    while ($rowalbum = $albums->fetch_assoc()) {

                        $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$avatar_name', '$profile_src', NULL, NULL, " . $row['id'] . ", now(), 0, " . $rowalbum['id'] . ")");



                    }
                }
            } else if ($covers->num_rows > 0) {
                while ($rowcovers = $covers->fetch_assoc()) {


                    $conn->query("UPDATE albums SET album_thumb='$avatar_name' AND album_cat=2");

                    $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$avatar_name', '$profile_src', NULL, NULL, " . $row['id'] . ", now(), 0, " . $rowcovers['id'] . ")");


                }

            }

            header("location: ../user_profile.php?u=" . $row['id']);
        }


    }  else { echo "0 results"; }



} else {

    $target_file = "../users/profiles/$name";
    $thumbnail = "../users/profiles/thumbs/$name";
    $wthumb = 200;
    $hthumb = 200;
    ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
    //unlink($target_file);

    $profile_src = "users/profiles/$name";
    $avatar_name = "users/profiles/thumbs/$name";


    $users =$conn->query("SELECT id, city_id, country_id FROM users WHERE email='$email'");
    if ($users->num_rows > 0) {

        while ($row = $users->fetch_assoc()) {


            $conn->query("UPDATE users SET avatar='$avatar_name' WHERE id=" . $row['id'] . "");

            $covers = $conn->query("SELECT * FROM albums WHERE album_cat=2 AND created_by=" . $row['id'] . "");

            if ($covers->num_rows == 0) {

                $conn->query("INSERT INTO albums (id, album_title, album_desc, album_city, album_country, created_by, created_at, album_thumb, album_cat, album_privacy) VALUES (DEFAULT, 'Profile Pictures', NULL, ".$row['city_id'].", ".$row['country_id'].", " . $row['id'] . ", now(), '$avatar_name', 2, 0)");

                $albums = $conn->query("SELECT id FROM albums WHERE album_cat=2 AND created_by=" . $row['id'] . "");
                if ($albums->num_rows > 0) {
                    while ($rowalbum = $albums->fetch_assoc()) {

                        $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$avatar_name', '$profile_src', NULL, NULL, " . $row['id'] . ", now(), 0, " . $rowalbum['id'] . ")");



                    }
                }
            } else if ($covers->num_rows > 0) {
                while ($rowcovers = $covers->fetch_assoc()) {


                    $conn->query("UPDATE albums SET album_thumb='$avatar_name'");

                    $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$avatar_name', '$profile_src', NULL, NULL, " . $row['id'] . ", now(), 0, " . $rowcovers['id'] . ")");


                }

            }

            header("location: ../user_profile.php?u=" . $row['id']);
        }


    }  else { echo "0 results"; }
}








?>