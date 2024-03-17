<?php 
session_start();
$link= new mysqli('localhost','root','','mxh');
$user_id = $_SESSION['user'];
$m_id = $_POST['m_id'];
$sql = "SELECT * FROM user
INNER JOIN friendrequest ON (friendrequest.sender_id = $m_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $m_id)
WHERE status = 'bạn bè'";
include '../hienthibanbe.php';