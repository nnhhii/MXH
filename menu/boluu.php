<?php 
    session_start();
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user']; 

    $link = new mysqli('localhost', 'root', '', 'mxh');

    $sql = "DELETE FROM post_function WHERE post_id = $post_id AND save_by = $user_id";
    $result = $link -> query($sql);

    if ($result) {
        echo "success";
    } 

