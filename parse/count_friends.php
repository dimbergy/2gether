<?php


    $count = "SELECT users.id AS userid, last_name, first_name, avatar FROM users INNER JOIN relationship ON users.id=user1_id or users.id=user2_id WHERE (user1_id=".$c['userid']." OR user2_id=".$c['userid'].") AND users.id!=".$c['userid']." AND status=1";


$countres = mysqli_query($conn, $count);

$countrow = mysqli_num_rows($countres);

echo $countrow;

?>