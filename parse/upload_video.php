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

$videotitle = $_POST['videotit'];
$videotitle = stripslashes($_POST['videotit']); // removes backslashes
$videotitle = mysqli_real_escape_string($conn, $videotitle); //escapes special characters in a string


$videodesc = $_POST['videodesc'];
$videodesc = stripslashes($_POST['videodesc']); // removes backslashes
$videodesc = mysqli_real_escape_string($conn, $videodesc); //escapes special characters in a string


$videoprivacy = $_POST['videoprivacy'];

$videocity = $_POST['videocity'];
$videocity = stripslashes($_POST['videocity']); // removes backslashes
$videocity = mysqli_real_escape_string($conn, $videocity); //escapes special characters in a string

$videocountry = $_POST['videocountry'];

$city_check = $conn->query("SELECT id, city FROM cities WHERE city='$videocity'");
if($city_check->num_rows == 0){

    $conn->query("INSERT INTO cities (id, city) VALUES (DEFAULT, '$videocity')");

} else {
    while($rowcity = $city_check->fetch_assoc()) {

        $cityid = $rowcity['id'];
    }

}



$name = $_FILES['myvideo']['name'];
$type = explode ('.', $name);
$type = end($type);
$size = $_FILES['myvideo']['size'];
$random_name = rand();
$temp = $_FILES['myvideo']['tmp_name'];
$error = $_FILES['myvideo']['error'];



if (!$temp) { // if file not chosen
    $message= "ERROR: Please browse for a file before clicking the upload button.";
    exit(); ?>
    <script language="javascript" type="text/javascript">
        alert('<?php echo $message ?>');
        window.location = '../user_photos.php?u=<?php echo $userid ?>';
    </script>
<?php
} else if($size > 314572800) { // if file size is larger than 300 Megabytes
    $message = "ERROR: Your file was larger than 300 Megabytes in size.";
    unlink($temp); // Remove the uploaded file from the PHP temp folder
    exit(); ?>
    <script language="javascript" type="text/javascript">
        alert('<?php echo $message ?>');
        window.location = '../user_photos.php?u=<?php echo $userid ?>';
    </script>

<?php } else if ($type != 'mp4' && $type != 'MP4') {
    // This condition is only if you wish to allow uploading of specific file types
    $message = "ERROR: Your video was not .mp4.";
    unlink($temp); // Remove the uploaded file from the PHP temp folder
    exit(); ?>
    <script language="javascript" type="text/javascript">
        alert('<?php echo $message ?>');
        window.location = '../user_photos.php?u=<?php echo $userid ?>';
    </script>

<?php } else if ($error == 1) { // if file upload error key is equal to 1
    $message = "ERROR: An error occurred while processing the file. Try again.";
    exit(); ?>
    <script language="javascript" type="text/javascript">
        alert('<?php echo $message ?>');
        window.location = '../user_photos.php?u=<?php echo $userid ?>';
    </script>
<?php }


$moveResult = move_uploaded_file($temp, '../users/videos/'.$random_name.'.'.$type);
if ($moveResult != true) {
    $message = "ERROR: File not uploaded. Try again.";
    //unlink($temp2); // Remove the uploaded file from the PHP temp folder
    exit(); ?>

    <script language="javascript" type="text/javascript">
        alert('<?php echo $message ?>');
        window.location = '../user_photos.php?u=<?php echo $userid ?>';
    </script>

<?php }

//unlink($temp); // Remove the uploaded file from the PHP temp folder

$src = "users/videos/$random_name.$type";
$path="users/videos/";

/*echo $src;
echo "<br />";
echo $path;
echo "<br />";
echo $videotitle;
echo "<br />";
echo $videodesc;
echo "<br />";
echo $cityid;
echo "<br />";
echo $videocountry;
echo "<br />";
echo $videoprivacy;
echo "<br />";
echo $userid;
echo "<br />"; */


$conn->query("INSERT INTO videos (id, video_src, video_path, video_title, video_desc, video_city, video_country, uploaded_by, uploaded_at, video_privacy, album_id) VALUES (DEFAULT, '$src', '$path', '$videotitle', '$videodesc', $cityid, $videocountry, $userid, now(), $videoprivacy, 6)");


header("location: ../user_photos.php?u=" . $userid);
?>