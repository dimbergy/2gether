<?php

require('../includes/db_connect.php');
session_start();

$msg_to = $_POST['msg_to'];
$msg_from = $_POST['msg_from'];

$to = (int)$msg_to;
$from = (int)$msg_from;

$conn->query("UPDATE messages SET opened=1, opened_at=now() WHERE msg_to=$to AND msg_from=$from");


        ?>
