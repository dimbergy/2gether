<?php

require('../includes/db_connect.php');
session_start();

include_once("ak_php_img_lib_1.0.php");

$email = $_SESSION['email'];

$users = $conn->query("SELECT id FROM users WHERE email='$email'");
if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {

        $userid = $row['id'];

    }
}

    if (isset($_POST['cancel'])) {

        header("location: ../user_photos.php?=" . $userid);

    } else {




        $albumtitle = $_POST['albumtit'];
        $albumtitle = stripslashes($_POST['albumtit']); // removes backslashes
        $albumtitle = mysqli_real_escape_string($conn, $albumtitle); //escapes special characters in a string
        $random_name = rand();

        $albumdesc = $_POST['albumdesc'];
        $albumdesc = stripslashes($_POST['albumdesc']); // removes backslashes
        $albumdesc = mysqli_real_escape_string($conn, $albumdesc); //escapes special characters in a string


        $ablumprivacy = $_POST['albumprivacy'];

        $albumcity = $_POST['albumcity'];
        $albumcity = stripslashes($_POST['albumcity']); // removes backslashes
        $albumcity = mysqli_real_escape_string($conn, $albumcity); //escapes special characters in a string

        $albumcountry = $_POST['albumcountry'];

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



        $conn->query("INSERT INTO albums (id, album_title, album_desc, album_city, album_country, created_by, created_at, album_thumb, album_path, album_cat, album_privacy) VALUES (DEFAULT, '$albumtitle', '$albumdesc', $cityid, $albumcountry, $userid, now(), 'sample_value', 'sample_value', 5, '$ablumprivacy')");

        $upl = $conn->query("SELECT id, album_title, album_desc, album_privacy FROM albums WHERE created_by=$userid AND album_title='$albumtitle' AND album_desc='$albumdesc'");
        if($upl->num_rows > 0) {
            while ($rowup = $upl->fetch_assoc()) {

                $albumid = $rowup['id'];
            }
        }


        foreach ($_FILES['photoalbum']['name'] AS $i => $name) {

            $name = $_FILES['photoalbum']['name'][$i];
            $size = $_FILES['photoalbum']['size'][$i];
            $type = $_FILES['photoalbum']['type'][$i];
            $temp = $_FILES['photoalbum']['tmp_name'][$i];
            $path1 = "../users/uploads/$random_name/";
            $path = $path1 . basename($name);

            $explode = explode('.', $name);
            $ext = end($explode);

            $errors = array();


            if (empty($_FILES['photoalbum']['tmp_name'][$i])) {
                $errors[] = "ERROR: Please choose at least one file before clicking the upload button.";
            } else {

                $allowed = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
                $max_size = 5242880;

                if (in_array($ext, $allowed) === false) {
                    $errors[] = "ERROR: Your image " . $name . " was not .gif, .jpg, .png. or .bmp";
                }

                if ($size > $max_size) {

                    $errors[] = "ERROR: Your file " . $name . " was larger than 5 Megabytes in size.";
                }
            }

            if (empty($errors)) {

                if (!file_exists('../users/uploads/' . $random_name)) {
                    mkdir('../users/uploads/' . $random_name . '/', 0777);


                }


                if (move_uploaded_file($temp, $path)) {


                    if ($ext == "jpg") {

                        $target_file = "../users/uploads/$random_name/$name";
                        $thumbnail = "../users/uploads/$random_name/thumb_$name";
                        $wthumb = 500;
                        $hthumb = 500;
                        ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $ext);
                        //unlink($target_file);

                        $img_src = "users/uploads/$random_name/$name";
                        $img_thumb = "users/uploads/$random_name/thumb_$name";

$conn->query("UPDATE albums SET album_thumb='$img_thumb', album_path='$path1' WHERE created_by=$userid AND id=$albumid");

$conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$img_thumb', '$img_src', '$albumtitle', '$albumdesc', $userid, now(), $ablumprivacy, $albumid)");



             header("location: ../user_photos.php?u=" . $userid);


                    } else {

                        $target_file = "../users/uploads/$random_name/$name";
                        $thumbnail = "../users/uploads/$random_name/thumb_$name";
                        $wthumb = 300;
                        $hthumb = 300;
                        ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $ext);
                        //unlink($target_file);

                        $img_src = "users/uploads/$random_name/$name";
                        $img_thumb = "users/uploads/$random_name/thumb_$name";

                        $conn->query("UPDATE albums SET album_thumb='$img_thumb', album_path='$path1' WHERE created_by=$userid AND id=$albumid");

                        $conn->query("INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$img_thumb', '$img_src', '$albumtitle', '$albumdesc', $userid, now(), $ablumprivacy, $albumid)");



                        header("location: ../user_photos.php?u=" . $userid);
                    }

                } else {
                    $message = "Something went wrong while uploading the file!"; ?>

                    <script language="javascript" type="text/javascript">
                        alert('<?php echo $message ?>');
                        window.location = '../user_photos.php?u=<?php echo $userid ?>';
                    </script>

                <?php }

            } else {

                foreach ($errors as $error) {
                    $message = "<p>" . $error . "</p>"; ?>

                    <script language="javascript" type="text/javascript">
                        alert('<?php echo $message ?>');
                        window.location = '../user_photos.php?u=<?php echo $userid ?>';
                    </script>

                <?php }
            }

        }

            }




?>