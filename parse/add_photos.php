<?php

require('../includes/db_connect.php');
session_start();

include_once("ak_php_img_lib_1.0.php");


    $email = $_SESSION['email'];

    $id = $_POST['albumid'];

    $random_name = rand();


    $users = $conn->query("SELECT id FROM users WHERE email='$email'");
    if ($users->num_rows > 0) {
        while ($row = $users->fetch_assoc()) {

            $userid = $row['id'];

        }
    }

    $alb = $conn->query("SELECT album_privacy, album_path FROM albums WHERE id=$id");
    if($alb->num_rows > 0) {
        while ($rowalb = $alb->fetch_assoc()) {

            $privacy = $rowalb['album_privacy'];
            $path1 = $rowalb['album_path'];

        }

    }

        $path2 = str_replace("../", "", $path1);




   foreach ($_FILES['addphotos']['name'] AS $i => $name) {

        $name = $_FILES['addphotos']['name'][$i];
        $size = $_FILES['addphotos']['size'][$i];
        $type = $_FILES['addphotos']['type'][$i];
        $temp = $_FILES['addphotos']['tmp_name'][$i];



        $path = $path1 . basename($name);

        $explode = explode('.', $name);
        $ext = end($explode);

        $errors = array();

        if (empty($_FILES['addphotos']['tmp_name'][$i])) {
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



            if (move_uploaded_file($temp, $path)) {


                    $target_file = "$path1/$name";
                    $thumbnail = "$path1/thumb_$name";
                    $wthumb = 500;
                    $hthumb = 500;
                    ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $ext);
                    //unlink($target_file);

                    $img_thumb="$path2/thumb_$name";
                    $img_src="$path2/$name";




              $conn->query($upd = "INSERT INTO photos (id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id) VALUES (DEFAULT, '$img_thumb', '$img_src', NULL, NULL, $userid, now(), $privacy, $id)");



                   header("location: ../user_photos.php?u=" . $userid);




            } else {
                $message = "Something went wrong while uploading the file!"; ?>

                <script language="javascript" type="text/javascript">
                    alert('<?php echo $message ?>');
                    window.location = '../user_photos.php';
                </script>

            <?php }

        } else {

            foreach ($errors as $error) {
                $message = "<p>" . $error . "</p>"; ?>

                <script language="javascript" type="text/javascript">
                    alert('<?php echo $message ?>');
                    window.location = '../user_photos.php';
                </script>

            <?php }
        }

    }






?>