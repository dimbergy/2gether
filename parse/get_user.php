<?php
$finduser = $conn->query("SELECT id FROM users WHERE email='$email'");

if ($finduser->num_rows > 0) {

    while($getuser = $finduser->fetch_assoc()) {

        $userid=$getuser['id'];

    }
}

?>