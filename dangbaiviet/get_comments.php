<?php
require 'posts_connect.php';

$post_id = $_POST['post_id']; 
$user_id = $_POST['comment_by'];
$cmt_content = $_POST['cmt_content'];
$time = date("Y-m-d H:i:s");
$noti_content = "đã bình luận vào bài viết của bạn.";

$sql_comment = "INSERT INTO comment (comment_by,post_id, cmt_content, comment_time) VALUES ($user_id, $post_id, '$cmt_content', '$time')";
$result_cmt = mysqli_query($conn, $sql_comment);
$sql_thong_bao = "INSERT INTO notification (noti_by,noti_content,post_id, noti_time) VALUES ($user_id, '$noti_content',$post_id, '$time')";
$result_tb = mysqli_query($conn, $sql_thong_bao);


if ($result_cmt&&$result_tb) {
    $sql="select * from comment inner join user on comment.comment_by=user.user_id where post_id=$post_id order by comment_id desc";
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

