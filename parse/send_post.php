<?php
/**
 * Created by PhpStorm.
 * User: dimbe
 * Date: 19-Apr-17
 * Time: 1:53 PM
 */


require('../includes/db_connect.php');

$post = stripslashes($_POST['post']); // removes backslashes
$post = mysqli_real_escape_string($conn,$post);
$email = stripslashes($_POST['user']); // removes backslashes
$email = mysqli_real_escape_string($conn,$email);

if($post != "") {


    $data = $conn->query("SELECT id FROM users WHERE email='$email'");

		if ($data->num_rows > 0) {

            while($row = $data->fetch_assoc()) {

		    $sql = "INSERT INTO posts VALUES (NULL, '$post', now(), $row[id], $row[id])";


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

?>