<?php
$link = new mysqli('localhost', 'root', '', 'MXH');
$story_id = $_GET["story_id"];
$sql_xoastory = "DELETE FROM story WHERE story_id = $story_id";
$result_xoa = $link->query($sql_xoastory);
echo '<script>';
echo 'setTimeout(function(){ alert("Da xoa story thanh cong!");';
echo 'window.location.href = "../index.php"; }, 500);'; // 1000 milliseconds = 1 giây
echo '</script>';
?>