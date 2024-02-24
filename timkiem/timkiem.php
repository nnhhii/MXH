<?php                  
$ketnoi= new mysqli('localhost','root','','mxh');
$timkiem = $_POST["timkiem"];
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$sql = "SELECT * FROM user 
LEFT JOIN friend ON (friend.user_id1 = $user_id AND friend.user_id2 = user.user_id) OR (friend.user_id1 = user.user_id AND friend.user_id2 = $user_id)
WHERE (friend.user_id1 IS NOT NULL OR friend.user_id2 IS NOT NULL) AND username LIKE '%$timkiem%'";
$result = $ketnoi->query($sql);

if ($result->num_rows > 0) {
  while($row_ten = $result->fetch_assoc()) {
?>
    <label for="mess<?php echo $post_id?>_<?php echo $row_ten["user_id"] ?>" class="mess1">
      <div class="ava" style="background-image: url('img/<?php echo $row_ten["avartar"]?>')"></div>
      <div class="username"><?php echo $row_ten["username"]?></div><br><br>
      <div class="mini_content"><?php echo $row_ten["email"]?></div>
      <input type="hidden" name="share_by" value="<?php echo $user_id?>">
      <input type="hidden" name="post_id" value="<?php echo $row["post_id"]?>">
      <input type="checkbox"name="share_to" value="<?php echo $row_ten["user_id"]?>" id="mess<?php echo $post_id?>_<?php echo $row_ten["user_id"] ?>" style="float:right;margin:-20px 20px">
    </label>
<?php
  }
}else echo 'ko tìm thấy!';