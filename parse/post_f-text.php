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
$id=$_POST['posted_to'];

if(isset($_POST['postbody'])) {
    if (!empty($_POST['postbody'])) {
        $postbody = $_POST['postbody'];
        $postbody = stripslashes($_POST['postbody']); // removes backslashes
        $postbody = mysqli_real_escape_string($conn, $postbody); //escapes special characters in a string

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

                    $conn->query("INSERT INTO posts (id, body, added_at, added_by, posted_to, post_city, post_country, post_cat, post_privacy, post_hide, post_status) VALUES (DEFAULT, '$postbody', now(), $userid, $id, $cityid, $postcountry, 1, 1, 0, 0)");

                    header("location: ../friend_profile.php?u=" . $id);




            } else {



                    $conn->query("INSERT INTO posts (id, body, added_at, added_by, posted_to, post_city, post_country, post_cat, post_privacy, post_hide, post_status) VALUES (DEFAULT, '$postbody', now(), $userid, $id, $usercity, $postcountry, 1, 1, 0, 0)");

                    header("location: ../friend_profile.php?u=" . $id);



            }

        } else {



                $conn->query("INSERT INTO posts (id, body, added_at, added_by, posted_to, post_city, post_country, post_cat, post_privacy, post_hide, post_status) VALUES (DEFAULT, '$postbody', now(), $userid, $id, $usercity, $postcountry, 1, 1, 0, 0)");

                header("location: ../friend_profile.php?u=" . $id);


        }

    } else {




            header("location: ../friend_profile.php?u=" . $id);




    }
} else {



        header("location: ../friend_profile.php?u=" . $id);


}


?>