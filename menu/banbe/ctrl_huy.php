<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'MXH');
$user_id = $_SESSION['user'];

$m_id=$_POST["user_id"];
$sql="DELETE FROM friendrequest WHERE (sender_id = $user_id AND receiver_id = $m_id) OR (sender_id = $m_id AND receiver_id = $user_id)";
$result=$link ->query($sql);

