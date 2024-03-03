<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    $conn = new mysqli('localhost', 'root', '', 'mxh');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Kiểm tra xem bài viết đã được lưu trước đó hay chưa
    $check_sql = "SELECT * FROM saved_posts WHERE user_id = ? AND post_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param('ii', $user_id, $post_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Nếu bài viết đã được lưu, xóa nó
        $delete_sql = "DELETE FROM saved_posts WHERE user_id = ? AND post_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param('ii', $user_id, $post_id);
        $delete_stmt->execute();
        echo "deleted";
        $delete_stmt->close();
    } else {
        // Nếu bài viết chưa được lưu, lưu nó
        $insert_sql = "INSERT INTO saved_posts (user_id, post_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param('ii', $user_id, $post_id);
        if ($insert_stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $insert_stmt->error;
        }
        $insert_stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}

?>
