<?php
require 'posts_connect.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

    $post_id = $_POST["post_id"];
    $post_by = $_POST["post_by"];
    $like_by = $_POST["like_by"]; 
    $time = date("Y-m-d H:i:s");

    // Kiểm tra xem người dùng đã thích bài viết hay chưa
    $sql_check = "SELECT * FROM post_function WHERE post_id = $post_id AND like_by = $like_by";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // Người dùng đã thích bài viết => bỏ thích
        $deleteQuery = "DELETE FROM post_function WHERE post_id = $post_id AND like_by = $like_by";
        mysqli_query($conn, $deleteQuery);

        $deleteThongBao = "DELETE FROM notification WHERE noti_by=$like_by AND post_id=$post_id";
        mysqli_query($conn, $deleteThongBao);

        $is_liked = false;
    } else {
        // Người dùng chưa thích bài viết => thích nó
        $insertQuery = "INSERT INTO post_function (like_by, post_id) VALUES ($like_by, $post_id)";
        mysqli_query($conn, $insertQuery);

        $insertThongBao = "INSERT INTO notification (noti_by, noti_content,post_id,noti_to,noti_time) VALUES ($like_by, 'đã thích bài viết của bạn.', $post_id,$post_by,'$time')";
        mysqli_query($conn, $insertThongBao);

        $is_liked = true;
    }
    $sql = "SELECT count(like_by) AS like_count FROM post_function WHERE post_id = $post_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo $row["like_count"];

