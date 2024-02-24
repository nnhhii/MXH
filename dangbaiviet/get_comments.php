<?php
require 'posts_connect.php';

$post_id = $_POST['post_id']; // Lấy giá trị post_id từ URL
$user_id = $_POST['comment_by'];
$cmt_content = $_POST['cmt_content'];
$time = date("Y-m-d H:i:s");
$noti_content = "đã bình luận vào bài viết của bạn.";

$sql_comment = "INSERT INTO comment (comment_by,post_id, cmt_content, comment_time) VALUES ($user_id, $post_id, '$cmt_content', '$time')";
$result_cmt = mysqli_query($conn, $sql_comment);
$sql_thong_bao = "INSERT INTO notification (noti_by,noti_content,post_id, noti_time) VALUES ($user_id, '$noti_content',$post_id, '$time')";
$result_tb = mysqli_query($conn, $sql_thong_bao);


if ($result_cmt&&$result_tb) {
    echo '<script language="javascript">alert("Đăng bình luận thành công!");
            window.location.href = "../index.php";
            exit();
        </script>';
} else {
    echo "Error: " . $conn->error;
}


?>
