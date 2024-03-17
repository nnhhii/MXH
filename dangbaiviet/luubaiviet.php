<?php
$link = new mysqli('localhost', 'root', '', 'mxh');
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];

    // Kiểm tra xem bài viết đã được lưu trước đó hay chưa
    $check_sql = "SELECT * FROM post_function WHERE save_by = $user_id AND post_id = $post_id";
    $check_result = $link ->query($check_sql);


    if ($check_result->num_rows > 0) {
        // Nếu bài viết đã được lưu, xóa nó
        $delete_sql = "DELETE FROM post_function WHERE save_by = $user_id AND post_id = $post_id";
        $delete_result = $link ->query($delete_sql);
        echo "deleted";
        
    } else {
        // Nếu bài viết chưa được lưu, lưu nó
        $insert_sql = "INSERT INTO post_function (save_by, post_id) VALUES ($user_id, $post_id)";
        $insert_result = $link ->query($insert_sql);
        echo "success";
    }


