<?php

require('../includes/db_connect.php');
session_start();


$email=$_SESSION['email'];

$user = $conn->query("SELECT id, city_id FROM users WHERE email='$email'");
if($user->num_rows > 0){
    while ($row=$user->fetch_assoc()){
        $userid=$row['id'];
        $usercity = $row['city_id'];
    }
}

$id = $_POST['posted_to'];

echo $id;



if(isset($_POST['postbody'])) {

    $postbody = $_POST['postbody'];
    $postbody = stripslashes($_POST['postbody']); // removes backslashes
    $postbody = mysqli_real_escape_string($conn, $postbody); //escapes special characters in a string


}

if(isset($_POST['postvidtit'])) {

    $postvidtit = $_POST['postvidtit'];
    $postvidtit = stripslashes($_POST['postvidtit']); // removes backslashes
    $postvidtit = mysqli_real_escape_string($conn, $postvidtit); //escapes special characters in a string


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


    if(isset($_FILES['postvid']['name'])) {

        $name = $_FILES['postvid']['name'];
        $type = explode ('.', $name);
        $type = end($type);
        $size = $_FILES['postvid']['size'];
        $random_name = rand();
        $temp = $_FILES['postvid']['tmp_name'];
        $error = $_FILES['postvid']['error'];



        if (!$temp) { // if file not chosen
            $message= "ERROR: Please browse for a file before clicking the upload button.";
            exit(); ?>
            <script language="javascript" type="text/javascript">
                alert('<?php echo $message ?>');
                window.location = '../friend_profile.php?u=<?php echo $id ?>';
            </script>
            <?php
        } else if($size > 314572800) { // if file size is larger than 300 Megabytes
            $message = "ERROR: Your file was larger than 300 Megabytes in size.";
            unlink($temp); // Remove the uploaded file from the PHP temp folder
            exit(); ?>
            <script language="javascript" type="text/javascript">
                alert('<?php echo $message ?>');
                window.location = '../friend_profile.php?u=<?php echo $id ?>';
            </script>

        <?php } else if ($type != 'mp4' && $type != 'MP4') {
            // This condition is only if you wish to allow uploading of specific file types
            $message = "ERROR: Your video was not .mp4.";
            unlink($temp); // Remove the uploaded file from the PHP temp folder
            exit(); ?>
            <script language="javascript" type="text/javascript">
                alert('<?php echo $message ?>');
                window.location = '../friend_profile.php?u=<?php echo $id ?>';
            </script>

        <?php } else if ($error == 1) { // if file upload error key is equal to 1
            $message = "ERROR: An error occurred while processing the file. Try again.";
            exit(); ?>
            <script language="javascript" type="text/javascript">
                alert('<?php echo $message ?>');
                window.location = '../friend_profile.php?u=<?php echo $id ?>';
            </script>
        <?php }


        $moveResult = move_uploaded_file($temp, '../users/videos/'.$random_name.'.'.$type);
        if ($moveResult != true) {
            $message = "ERROR: File not uploaded. Try again.";
            //unlink($temp2); // Remove the uploaded file from the PHP temp folder
            exit(); ?>

            <script language="javascript" type="text/javascript">
                alert('<?php echo $message ?>');
                window.location = '../user_timeline.php?u=<?php echo $userid ?>';
            </script>

        <?php }

//unlink($temp); // Remove the uploaded file from the PHP temp folder

        $src = "users/videos/$random_name.$type";
        $path="users/videos/";



        $conn->query("INSERT INTO posts (id, body, added_at, added_by, posted_to, post_city, post_country, post_cat, post_privacy, post_hide, post_status) VALUES (DEFAULT, '$postbody', now(), $userid, $id, $cityid, $postcountry, 3, 1, 0, 0)");

        $conn->query("INSERT INTO videoposts (id, videopost_title, videopost_src, videopost_path, post_id) VALUES(DEFAULT, '$postvidtit', '$src', '$path', LAST_INSERT_ID())");


        header("location: ../friend_profile.php?u=" . $id);
}





?>