<?php
$ketnoi = new mysqli('localhost', 'root', '', 'MXH');
$user_id = $_POST['message_by1'];
$m_id = $_POST['message_to1'];

$delete_chat = "delete from message where message_by=$user_id and message_to=$m_id or message_by=$m_id and message_to=$user_id";
$result = $ketnoi->query($delete_chat);

header("location:index.php?pid=0&&m_id=$m_id");
