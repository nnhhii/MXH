<?php
require 'posts_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_id"])) {
    $post_id = $_POST["post_id"];
    $like_by = $_POST["like_by"]; 
    $time = date("Y-m-d H:i:s");

    // Kiểm tra xem người dùng đã thích bài viết hay chưa
    $sql_check = "SELECT * FROM likes WHERE post_id = $post_id AND like_by = $like_by";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // Người dùng đã thích bài viết => bỏ thích
        $deleteQuery = "DELETE FROM likes WHERE post_id = $post_id AND like_by = $like_by";
        mysqli_query($conn, $deleteQuery);

        $updateQuery = "UPDATE posts SET like_count = like_count - 1 WHERE post_id = $post_id";
        mysqli_query($conn, $updateQuery);

        $is_liked = false;
    } else {
        // Người dùng chưa thích bài viết => thích nó
        $insertQuery = "INSERT INTO likes (like_by, post_id) VALUES ($like_by, $post_id)";
        mysqli_query($conn, $insertQuery);

        $insertThongBao = "INSERT INTO notification (noti_by, noti_content,post_id,noti_time) VALUES ($like_by, 'đã thích bài viết của bạn.', $post_id,'$time')";
        mysqli_query($conn, $insertThongBao);

        $updateQuery = "UPDATE posts SET like_count = like_count + 1 WHERE post_id = $post_id";
        mysqli_query($conn, $updateQuery);

        $is_liked = true;
    }
    $sql = "SELECT like_count FROM posts WHERE post_id = $post_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    echo $row["like_count"];
} 
?>
