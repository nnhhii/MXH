<?php
$ketnoi = new mysqli('localhost', 'root', '', 'MXH');
date_default_timezone_set('Asia/Ho_Chi_Minh');

$share_by = $_POST['share_by'];
$share_to = $_POST['share_to']; // mảng
$post_id = $_POST['post_id'];
$post_by = $_POST['post_by'];
$url_post = "http://localhost:8080/Social_Media/index.php?pid=10&&post_id=$post_id";
$time = date("Y-m-d H:i:s");
$noti_content = "đã chia sẻ bài viết của bạn.";

foreach ($share_to as $user_id) {
    $sql_message = "INSERT INTO message (message_by, message_to, content, timestamp) VALUES ($share_by, $user_id, '$url_post', '$time')";
    $ketnoi->query($sql_message);

    $sql_share = "INSERT INTO post_function (post_id, share_by) VALUES ($post_id, $share_by)";
    $ketnoi->query($sql_share);
}
$sql_noti = "INSERT INTO notification (noti_by, noti_content, post_id, noti_to, noti_time) VALUES ($share_by, '$noti_content', $post_id, $post_by, '$time')";
$ketnoi->query($sql_noti);

if($sql_message && $sql_share && $sql_noti){
    echo 'Đã gửi!';
}


