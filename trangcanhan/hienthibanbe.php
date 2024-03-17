<?php 
$result = $link->query($sql);
$friends=array();
while ($row = $result->fetch_assoc()) {
    $friends[] = $row['user_id'];
}
foreach ($friends as $friend_id) {
    $sql="SELECT * FROM user LEFT JOIN friendrequest ON (friendrequest.receiver_id =$friend_id AND friendrequest.sender_id = $user_id) OR (friendrequest.sender_id = $friend_id and friendrequest.receiver_id = $user_id)
    WHERE user_id= $friend_id";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $trangthai_ketban = '';
            if ($row['status'] === 'đã gửi' && $row['sender_id'] == $user_id) {
            $trangthai_ketban = 'Hủy kết bạn';
            }elseif ($row['status'] === 'đã gửi' && $row['sender_id'] == $friend_id) {
            $trangthai_ketban = 'Chấp nhận';
            }elseif($row['status'] === 'bạn bè') {
            $trangthai_ketban = 'Bạn bè';
            }else $trangthai_ketban= 'Kết bạn';
?>
        <div class="mess1" style="position:relative">
            <a href="<?php echo $row['user_id'] == $user_id ? "index.php?pid=1&&user_id=".$row['user_id'] : "index.php?pid=2&&m_id=".$row['user_id']?>">
                <div class="ava" style="background-image: url('img/<?php echo $row["avartar"]?>')"></div>
                <div class="username" style="color:black"><?php echo $row["username"]?></div><br><br>
            </a>
            <div class="mini_content"><?php echo $row["email"]?></div>
            <?php 
            if($row['user_id']==$user_id){
                echo '';
            }else{
            ?>
            <button data-user-id="<?php echo $row['user_id']?>" data-trangthai-ketban="<?php echo $trangthai_ketban?>"
                style="<?php echo $trangthai_ketban =='Bạn bè' ? 'color:black;background:#EEE' : 'color:white;background:#0095f6'?>;border:none;position:absolute;right:30px;top:20px;border-radius:10px;padding:10px 15px; font-size:13px"
                onclick="toggleFriendship2(this,<?php echo $row['user_id']?>)">
                <?php echo $trangthai_ketban?>
            </button>
            <?php }?>
        </div>
        <?php
        }
    } else echo 'Không có bạn bè!';
}
?>
<script>
function toggleFriendship2(button,userId) {
  var trangthai_ketban = button.getAttribute('data-trangthai-ketban');
  if (trangthai_ketban === 'Kết bạn') {
    sendFriendRequest1(button, userId);
  } else if (trangthai_ketban === 'Hủy kết bạn') {
    cancelFriendRequest1(button, userId);
  } else if (trangthai_ketban === 'Chấp nhận') {
    acceptFriendRequest1(button, userId);
  }else if (trangthai_ketban === 'Bạn bè') {
    if (confirm('HỦY KẾT BẠN????')) {
      cancelFriendRequest1(button, userId);
    } else {}
  }
}


  function sendFriendRequest1(button, userId) {
    $.ajax({
      url: 'menu/banbe/ctrl_yeucau.php',
      type: 'POST',
      data: { user_id: userId },
      success: function (response) {
        button.textContent = 'Hủy kết bạn';
        button.setAttribute('data-trangthai-ketban', 'Hủy kết bạn');
      }
    });
  }

  function cancelFriendRequest1(button, userId) {
    $.ajax({
      url: 'menu/banbe/ctrl_huy.php',
      type: 'POST',
      data: { user_id: userId },
      success: function (response) {
        button.setAttribute('data-trangthai-ketban', 'Kết bạn');
        button.textContent = 'Kết bạn';
      }
    });
  }

  function acceptFriendRequest1(button, userId) {
    $.ajax({
      url: 'menu/banbe/ctrl_chapnhan.php',
      type: 'POST',
      data: { user_id: userId },
      success: function (response) {
        button.setAttribute('data-trangthai-ketban', 'Bạn bè');
        button.textContent = 'Bạn bè';
      }
    });
  }
</script>
