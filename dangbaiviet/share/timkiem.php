<?php                  
$ketnoi= new mysqli('localhost','root','','mxh');
$timkiem = $_POST["timkiem"];
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$sql = "SELECT * FROM user 
LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_id)
WHERE status='bạn bè' AND username LIKE '%$timkiem%'";
$result = $ketnoi->query($sql);

if ($result->num_rows > 0) {
  while($row_ten = $result->fetch_assoc()) {
?>
    <label for="mess_timkiem<?php echo $post_id?>_<?php echo $row_ten["user_id"] ?>" class="mess1">
      <div class="ava" style="background-image: url('img/<?php echo $row_ten["avartar"]?>')"></div>
      <div class="username"><?php echo $row_ten["username"]?></div><br><br>
      <div class="mini_content"><?php echo $row_ten["email"]?></div>
      <input type="hidden" name="share_by" value="<?php echo $user_id?>">
      <input type="hidden" name="post_id" value="<?php echo $row["post_id"]?>">
      <input type="checkbox"name="share_to" value="<?php echo $row_ten["user_id"]?>" id="mess_timkiem<?php echo $post_id?>_<?php echo $row_ten["user_id"] ?>" style="float:right;margin:-20px 20px">
    </label>
<?php
  }
}else echo 'ko tìm thấy!';