<?php 
$link = new mysqli('localhost', 'root', '', 'mxh');
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];

$sql_check = "SELECT * FROM post_function WHERE post_id = $post_id AND like_by = $user_id";
$result = $link->query($sql_check);

if ($result -> num_rows > 0) {
    echo 'liked';
}else echo 'unlike';