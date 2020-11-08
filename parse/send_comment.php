<?php
/**
 * Created by PhpStorm.
 * User: dimbe
 * Date: 20-Apr-17
 * Time: 12:25 AM
 */

require('../includes/db_connect.php');

$comment = stripslashes($_POST['comment']); // removes backslashes
$comment = mysqli_real_escape_string($conn,$comment);
$post = stripslashes($_POST['posts']); // removes backslashes
$post= mysqli_real_escape_string($conn,$post);
$user = stripslashes($_POST['users']); // removes backslashes
$user= mysqli_real_escape_string($conn,$user);


echo "succes!";


/*
if($post != "") {


    $data = $conn->query("SELECT id, added_by FROM post WHERE body='$post'");

    if ($data->num_rows > 0) {

        while($row = $data->fetch_assoc()) {

            $sql = "INSERT INTO comments VALUES (NULL, '$comment', now(), $row[added_by], $row[id])";


            $query = mysqli_query($conn, $sql);


            echo "Δημοσιεύτηκε " .date('d-m-Y H:i');
        }
    } else { echo "παρουσιάστηκε σφάλμα";

    }
    //header("location: ../user_timeline.php#statuspost?mssg=".urlencode("Δημοσιεύτηκε"));
} else {

    echo "H δημοσίευση ήταν κενή";
    //header("location: ../user_timeline.php#statuspost?mssg=".urlencode("Η δημοσίευσή σου ήταν κενή"));
}
*/
?>