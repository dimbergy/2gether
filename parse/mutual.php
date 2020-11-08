<?php

include ('../includes/db_connect.php');


$mutual = "SELECT a.friendID FROM (SELECT CASE WHEN user1_id = 1 THEN user2_id ELSE user1_id END AS friendID FROM relationship WHERE (user1_id = 1 OR user2_id=1) AND status=1) a JOIN (SELECT CASE WHEN user1_id = 2 THEN user2_id ELSE user1_id END AS friendID FROM relationship WHERE (user1_id = 2 OR user2_id=2) AND status=1) b ON b.friendID = a.friendID";

$mutualfriendcount = mysqli_query($conn, $mutual);

$mutual_friends = mysqli_num_rows($mutualfriendcount);


while ($mutual_friends = mysqli_fetch_assoc($mutualfriendcount)) {


    echo "<p>".$mutual_friends."</p>";





} ?>