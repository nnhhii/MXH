<?php 
$link= new mysqli('localhost','root','','MXH');     
$dexuat_banbe="SELECT * FROM user 
LEFT JOIN friendrequest ON user.user_id = friendrequest.receiver_id AND friendrequest.sender_id = $user_id
LEFT JOIN friend ON (friend.user_id1 = $user_id AND friend.user_id2 = user.user_id) OR (friend.user_id1 = user.user_id AND friend.user_id2 = $user_id)
WHERE (friend.user_id1 IS NULL OR friend.user_id2 IS NULL) and user.user_id != $user_id LIMIT 3";
$result_dexuat=$link -> query($dexuat_banbe);

?>

<div class="menu_phai">
  <div class="de_xuat">Đề xuất kết bạn</div>
  <?php while($row_dx = $result_dexuat->fetch_assoc()){ ?>
  <div class="layout_logo1">
    <a class="logo1" style="background-image:url('img/<?php echo $row_dx["avartar"]?>')" href="index.php?pid=2&m_id=<?php echo $row_dx['user_id']?>"></a>
    <div class="ten_logo1"><?php echo $row_dx["username"]?></div>
    <button onclick="toggleFriendship(this, <?php echo $row_dx['user_id']; ?>)">
      <?php 
      if ($row_dx['status'] === 'đã gửi') {
        echo 'Hủy kết bạn';
      } else {
        echo 'Kết bạn';
      }
      ?>
    </button>
  </div>
  
  <?php } ?>
</div>


<script>
  function toggleFriendship(button, userId) {
    if (button.textContent === 'Kết bạn') {
      button.textContent = 'Hủy kết bạn';
      sendFriendRequest(userId);
    } else {
      button.textContent = 'Kết bạn';
      cancelFriendRequest(userId);
    }
  }

  function sendFriendRequest(userId) {
    $.ajax({
      url: 'menu/banbe/ctrl_yeucau.php',
      type: 'POST',
      data: { user_id: userId },
      success: function(response) {
      }
    });
  }


  function cancelFriendRequest(userId) {
    $.ajax({
      url: 'menu/banbe/ctrl_huy.php',
      type: 'POST',
      data: { user_id: userId },
      success: function(response) {
      }
    });
  }
</script>
