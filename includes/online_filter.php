<?php
require('../includes/db_connect.php');
session_start();


$login = $conn->query("SELECT id, user_id, online FROM sessions WHERE user_id=".$rowlist1['userid']."");
if($login->num_rows == 0) {

    echo "offline"; } else { while($rowlog=$login->fetch_assoc()) { if($rowlog['online']==0) { echo "online away"; } else { echo "online"; } } }

?>