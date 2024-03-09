<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="css/luot_anh.css">
<link rel="stylesheet" href="css/cmt.css">
<link rel="stylesheet" href="css/like.css">


<div class="gop_2_menu" style="top:100px; left:250px">
<?php 
$link= new mysqli('localhost','root','','MXH');     
$sql_buttonOpenModal="SELECT * FROM user inner JOIN posts ON posts.post_by = user.user_id and user_id != $user_id ORDER BY post_id DESC";
$result_buttonOpenModal=$link -> query($sql_buttonOpenModal);

include 'dangbaiviet/posts_buttonOpenModal.php'
?>

</div>
