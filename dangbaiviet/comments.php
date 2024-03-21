<?php
require 'posts_connect.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$post_id = $_POST['post_id']; 
$post_by = $_POST['post_by']; 
$user_id = $_POST['comment_by'];
$cmt_content = $_POST['cmt_content'];
$time = date("Y-m-d H:i:s");
$noti_content = "đã bình luận vào bài viết của bạn.";

$sql_comment = "INSERT INTO post_function (post_id,comment_by, cmt_content, comment_time) VALUES ($post_id, $user_id, '$cmt_content','$time')";
$result_cmt = mysqli_query($conn, $sql_comment);

$sql_thong_bao = "INSERT INTO notification (noti_by,noti_content,post_id, noti_to, noti_time) VALUES ($user_id, '$noti_content',$post_id, $post_by,'$time')";
$result_tb = mysqli_query($conn, $sql_thong_bao);


if ($result_cmt&&$result_tb) {
    $sql="select * from post_function inner join user on comment_by=user_id where post_id=$post_id order by comment_time desc";
    $result=mysqli_query($conn, $sql);
    $row_cmt = mysqli_fetch_assoc($result);
?>
    <div class="layout_cmt">
        <div class="ava_user_cmt"style="background-image:url('img/<?php echo $row_cmt["avartar"]?>')"></div>
        <div class="name_user_cmt"><?php echo $row_cmt["username"]?></div>
        <div class="cmt_content"><?php echo $row_cmt["cmt_content"]?></div><br>
        <div class="cmt_time"><?php echo $row_cmt["comment_time"]?></div>
    </div>
<?php
}
?>

