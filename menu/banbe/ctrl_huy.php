<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'MXH');
$user_id = $_SESSION['user'];

if($_POST["user_id"]){
    $m_id=$_POST["user_id"];
    $sql="DELETE FROM friendrequest WHERE sender_id = $user_id AND receiver_id = $m_id";
    $result=$link ->query($sql);
}else{
    $m_id=$_POST["user_id1"];
    $sql="DELETE FROM friendrequest WHERE sender_id = $m_id AND receiver_id = $user_id"; //ng nhận là mik
    $result=$link ->query($sql);
}