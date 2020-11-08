<?php

require('../includes/db_connect.php');
session_start();

$email=$_SESSION['email'];

$user = $conn->query("SELECT id FROM users WHERE email='$email'");
if($user->num_rows > 0){
    while ($row=$user->fetch_assoc()){
        $userid=$row['id'];
    }
}

// TEXT POSTS

if(isset($_POST['postbody']) && !empty($_POST['postbody'])) {
$postbody = $_POST['postbody'];
$postbody = stripslashes($_POST['postbody']); // removes backslashes
$postbody = mysqli_real_escape_string($conn, $postbody); //escapes special characters in a string

    echo $postbody."<br />";
}

$postcountry = $_POST['postcountry'];

echo $postcountry."<br />";

if(isset($_POST['postcity'] && !empty($_POST['postcity'])){
$postcity = $_POST['postcity'];
$postcity = stripslashes($_POST['postcity']); // removes backslashes
$postcity = mysqli_real_escape_string($conn, $postcity); //escapes special characters in a string


$city_check1 = $conn->query("SELECT id, city FROM cities WHERE city='$postcity'");
if($city_check1->num_rows == 0){

    $conn->query("INSERT INTO cities (id, city) VALUES (DEFAULT, '$postcity')");

} else {
    while($rowcity1 = $city_check1->fetch_assoc()) {

        $cityid1 = $rowcity1['id'];
    }

}

echo $cityid1."<br />";
}


// PHOTO POSTS

if(isset($_POST['postpictit']) && !empty($_POST['postpictit'])) {
    $postpictit = $_POST['postpictit'];
    $postpictit = stripslashes($_POST['postpictit']); // removes backslashes
    $postpictit = mysqli_real_escape_string($conn, $postpictit); //escapes special characters in a string

    echo $postpictit."<br />";
}

$postpiccountry = $_POST['postcountry'];

echo $postpicountry."<br />";

if(isset($_POST['postpiccity']) && !empty($_POST['postpiccity'])) {

$postpiccity = $_POST['postpiccity'];
$postpiccity = stripslashes($_POST['postpiccity']); // removes backslashes
$postpiccity = mysqli_real_escape_string($conn, $postpiccity); //escapes special characters in a string


$city_check2 = $conn->query("SELECT id, city FROM cities WHERE city='$postpiccity'");
if($city_check2->num_rows == 0){

    $conn->query("INSERT INTO cities (id, city) VALUES (DEFAULT, '$postpiccity')");

} else {
    while($rowcity2 = $city_check2->fetch_assoc()) {

        $cityid2 = $rowcity2['id'];
    }

}

    echo $cityid2."<br />";
}


if(isset($_FILES['postpic']['name'])) {


    $picname = $_FILES['postpic']['name'];
    $pictype = $_FILES['postpic']['type'];
    $explode = explode('.', $picname);
    $picext = end($explode);
    $picsize = $_FILES['postpic']['size'];
    $pic_randname = rand();
    $pictemp = $_FILES['postpic']['tmp_name'];
    $picerror = $_FILES['postpic']['error'];
    $pic_path = "users/timeline/";


    if (!$pictemp) { // if file not chosen
        $picmessage = "ERROR: Please browse for a file before clicking the upload button.";
        exit(); ?>
        <script language="javascript" type="text/javascript">
            alert('<?php echo $picmessage ?>');
            window.location = '../user_timeline.php?u=<?php echo $userid ?>';
        </script>
        <?php
    } else if ($picsize > 5242880) { // if file size is larger than 300 Megabytes
        $picmessage = "ERROR: Your file was larger than 5 Megabytes in size.";
        unlink($pictemp); // Remove the uploaded file from the PHP temp folder
        exit(); ?>
        <script language="javascript" type="text/javascript">
            alert('<?php echo $picmessage ?>');
            window.location = '../user_timeline.php?u=<?php echo $userid ?>';
        </script>

    <?php } else if (!preg_match("/.(gif|jpg|png)$/i", $picname)) {
        // This condition is only if you wish to allow uploading of specific file types
        $picmessage = "ERROR: Your image was not .gif, .jpg, or .png.";
        unlink($pictemp); // Remove the uploaded file from the PHP temp folder
        exit(); ?>
        <script language="javascript" type="text/javascript">
            alert('<?php echo $picmessage ?>');
            window.location = '../user_timeline.php?u=<?php echo $userid ?>';
        </script>

    <?php } else if ($picerror == 1) { // if file upload error key is equal to 1
        $picmessage = "ERROR: An error occurred while processing the file. Try again.";
        exit(); ?>
        <script language="javascript" type="text/javascript">
            alert('<?php echo $picmessage ?>');
            window.location = '../user_timeline.php?u=<?php echo $userid ?>';
        </script>
    <?php }


    $picmoveResult = move_uploaded_file($pictemp, '../users/timeline/' . $pic_randname . '.' . $pictype);
    if ($picmoveResult != true) {
        $picmessage = "ERROR: File not uploaded. Try again.";
        //unlink($temp2); // Remove the uploaded file from the PHP temp folder
        exit(); ?>

        <script language="javascript" type="text/javascript">
            alert('<?php echo $picmessage ?>');
            window.location = '../user_timeline.php?u=<?php echo $userid ?>';
        </script>

    <?php }

    include_once("ak_php_img_lib_1.0.php");

    $target_file = "../users/timeline/$pic_randname";
    $thumbnail = "../users/timeline/thumb_$pic_randname";
    $wthumb = 500;
    $hthumb = 500;
    ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $picext);
    //unlink($target_file);

    $pic_src = "users/timeline/$pic_randname";
    $pic_thumb = "users/timeline/thumb_$pic_randname";

    echo $pic_src."<br />";
    echo $pic_tumb."<br />";
    echo $pic_path."<br />";
}


?>