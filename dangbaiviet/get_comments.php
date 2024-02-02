<?php

require 'posts_connect.php';

// Kiểm tra thông tin đăng nhập (đã được bỏ qua)

// Thêm bình luận vào cơ sở dữ liệu
$sql_insert = "INSERT INTO comment (post_id, cmt_content, comment_time) VALUES (?, ?, ?)";
if ($stmt = $conn->prepare($sql_insert)) {
    $stmt->bind_param("iss", $post_id, $comment, $comment_time);
  
$post_id = $_POST['post_id']; // Lấy giá trị post_id từ URL

   
    $comment = $_POST['comment'];
    $comment_time = date("Y-m-d H:i:s");
    if ($stmt->execute()) {
        echo '<script language="javascript">
        alert("Đăng bài viết thành công !");
        window.location.href = "../home.php";
    </script>';
    } else {
        echo'<script language="javascript">
        alert("Đăng bài viết thất bại !");
        window.location.href = "home.php";
    </script>' . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
