<?php 
$link = new mysqli('localhost', 'root', '', 'mxh');
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];

$sql_check = "SELECT * FROM post_function WHERE post_id = " . $row["post_id"] . " AND like_by = $user_id";
$result = $link->query($sql_check);

if (mysqli_num_rows($result) > 0) {
    echo 'liked';
}else echo 'not like';