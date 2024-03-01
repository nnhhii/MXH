<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'MXH');
$user_id = $_SESSION['user'];
$m_id=$_POST["user_id"];
$time = date("Y-m-d H:i:s");

$sql="INSERT INTO friendrequest (sender_id, receiver_id, status) VALUES ($user_id, $m_id, 'đã gửi')";
$result=$link ->query($sql);

$sql_tb="INSERT INTO notification(noti_by, noti_content,noti_to,noti_time) VALUES ($user_id, 'đã gửi lời mời kết bạn.',$m_id,'$time')";
$result_tb=$link ->query($sql_tb);