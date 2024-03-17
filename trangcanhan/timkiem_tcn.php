<?php 
session_start();
$link= new mysqli('localhost','root','','mxh');
$user_id = $_SESSION['user'];
$timkiem = $_POST["timkiem"];
$sql = "SELECT * FROM user
    INNER JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_id)
    WHERE status = 'bạn bè' AND username LIKE '%$timkiem%'";
include 'hienthibanbe.php';