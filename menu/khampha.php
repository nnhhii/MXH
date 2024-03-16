<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="css/luot_anh.css">
<link rel="stylesheet" href="css/cmt.css">
<link rel="stylesheet" href="css/like.css">


<div class="gop_2_menu" style="top:100px; left:200px">
<?php 
$link= new mysqli('localhost','root','','MXH');     
$sql_buttonOpenModal="SELECT * FROM posts 
INNER JOIN user ON posts.post_by = user.user_id
WHERE posts.post_by != $user_id and (statuss = 'public' AND NOT EXISTS (
       SELECT 1 FROM friendrequest 
       WHERE ((sender_id = posts.post_by AND receiver_id = $user_id) OR (sender_id = $user_id AND receiver_id = posts.post_by)) 
       AND status = 'bạn bè'))    
ORDER BY post_id DESC";


$result_buttonOpenModal=$link -> query($sql_buttonOpenModal);

include 'dangbaiviet/posts_buttonOpenModal.php'
?>

</div>
