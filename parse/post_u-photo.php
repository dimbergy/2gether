<?php

require('../includes/db_connect.php');
session_start();

include_once("ak_php_img_lib_1.0.php");

$email=$_SESSION['email'];

$user = $conn->query("SELECT id, city_id FROM users WHERE email='$email'");
if($user->num_rows > 0){
    while ($row=$user->fetch_assoc()){
        $userid=$row['id'];
        $usercity = $row['city_id'];
    }
}


if(isset($_POST['postbody'])) {

    $postbody = $_POST['postbody'];
    $postbody = stripslashes($_POST['postbody']); // removes backslashes
    $postbody = mysqli_real_escape_string($conn, $postbody); //escapes special characters in a string


}

if(isset($_POST['postpictit'])) {

    $postpictit = $_POST['postpictit'];
    $postpictit = stripslashes($_POST['postpictit']); // removes backslashes
    $postpictit = mysqli_real_escape_string($conn, $postpictit); //escapes special characters in a string


}


    $postcountry = $_POST['postcountry'];




        if (isset($_POST['postcity'])) {
            if (!empty($_POST['postcity'])) {

                $postcity = $_POST['postcity'];
                $postcity = stripslashes($_POST['postcity']); // removes backslashes
                $postcity = mysqli_real_escape_string($conn, $postcity); //escapes special characters in a string


                $city_check = $conn->query("SELECT id, city FROM cities WHERE city='$postcity'");
                if ($city_check->num_rows == 0) {

                    $conn->query("INSERT INTO cities (id, city) VALUES (DEFAULT, '$postcity')");

                } else {
                    while ($rowcity = $city_check->fetch_assoc()) {

                        $cityid = $rowcity['id'];
                    }

                }

            } else {

                $cityid = $usercity;
            }


            
        }


    if(isset($_FILES['postpic']['name'])) {

        $random_name = rand();
        $name = $_FILES['postpic']['name'];
        $size = $_FILES['postpic']['size'];
        $type = $_FILES['postpic']['type'];
        $temp = $_FILES['postpic']['tmp_name'];
        $path1 = "../users/timeline/$random_name/";
        $path = $path1 . basename($name);

        $explode = explode('.', $name);
        $ext = end($explode);

        $errors = array();


        if (empty($_FILES['postpic']['tmp_name'])) {
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

            if (!file_exists('../users/timeline/' . $random_name)) {
                mkdir('../users/timeline/' . $random_name . '/', 0777);


            }


            if (move_uploaded_file($temp, $path)) {




                    $target_file = "../users/timeline/$random_name/$name";
                    $thumbnail = "../users/timeline/$random_name/thumb_$name";
                    $wthumb = 500;
                    $hthumb = 500;
                    ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $ext);
                    //unlink($target_file);

                    $img_src = "users/timeline/$random_name/$name";
                    $img_thumb = "users/timeline/$random_name/thumb_$name";

                    $conn->query("INSERT INTO posts (id, body, added_at, added_by, posted_to, post_city, post_country, post_cat, post_privacy, post_hide, post_status) VALUES (DEFAULT, '$postbody', now(), $userid, $userid, $cityid, $postcountry, 2, 1, 0, 0)");

                    $conn->query("INSERT INTO photoposts (id, photopost_title, photopost_thumb, photopost_src, photopost_path, post_id) VALUES(DEFAULT, '$postpictit', '$img_thumb', '$img_src', '$path1', LAST_INSERT_ID())");


                header("location: ../user_timeline.php?u=" . $userid);


            } else {
            $message = "Something went wrong while uploading the file!"; ?>

            <script language="javascript" type="text/javascript">
                alert('<?php echo $message ?>');
                window.location = '../user_timeline.php?u=<?php echo $userid ?>';
            </script>

        <?php }

    } else {


            $message = "<p>" . $error . "</p>"; ?>

            <script language="javascript" type="text/javascript">
                alert('<?php echo $message ?>');
                window.location = '../user_timeline.php?u=<?php echo $userid ?>';
            </script>

        <?php
    }







    }

else {

            echo "Error!";
}




?>