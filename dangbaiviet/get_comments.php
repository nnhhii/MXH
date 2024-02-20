<?php
require 'posts_connect.php';

$sql_insert = "INSERT INTO comment (comment_by,post_id, cmt_content, comment_time) VALUES (?, ?, ?, ?)";
if ($stmt = $conn->prepare($sql_insert)) {
    $stmt->bind_param("iiss", $comment_by, $post_id, $cmt_content, $comment_time);

    $post_id = $_POST['post_id']; // Lấy giá trị post_id từ URL
    $comment_by = $_POST['comment_by'];
    $cmt_content = $_POST['cmt_content'];
    $comment_time = date("Y-m-d H:i:s");
    if ($stmt->execute()) {
        echo '<script language="javascript">alert("Đăng bài viết thành công!");
                exit();
            </script>';
    }
} 

?>
