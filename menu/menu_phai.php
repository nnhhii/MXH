<?php 
$link= new mysqli('localhost','root','','MXH');     
$dexuat_banbe="SELECT * FROM user 
LEFT JOIN friendrequest ON (friendrequest.receiver_id = user.user_id AND friendrequest.sender_id = $user_id) 
OR (friendrequest.receiver_id = $user_id AND friendrequest.sender_id = user.user_id)
WHERE (receiver_id IS NULL OR sender_id IS NULL) and user.user_id != $user_id  LIMIT 3 ";
$result_dexuat=$link -> query($dexuat_banbe);
?>

<div class="menu_phai">
  <div class="de_xuat">Đề xuất kết bạn</div>
  <?php while($row_dx = $result_dexuat->fetch_assoc()){ ?>
  <div class="layout_logo1">
    <a class="logo1" style="background-image:url('img/<?php echo $row_dx["avartar"]?>')" href="index.php?pid=2&m_id=<?php echo $row_dx['user_id']?>"></a>
    <div class="ten_logo1"><?php echo $row_dx["username"]?></div>
    <button onclick="toggleFriendship(this, <?php echo $row_dx['user_id']?>)">
      <?php 
      if ($row_dx['status'] === 'đã gửi' && $row_dx['sender_id'] == $user_id) {
        echo 'Hủy kết bạn';
      }else echo 'Kết bạn';
      ?>
    </button>
  </div>
  
  <?php } ?>
</div>


<script>
  function toggleFriendship(button,userId) {
    if (button.textContent === 'Kết bạn') {
      sendFriendRequest(button, userId);
    } else {
      cancelFriendRequest(button, userId);
    }
  }

  function sendFriendRequest(button, userId) {
    $.ajax({
      url: 'menu/banbe/ctrl_yeucau.php',
      type: 'POST',
      data: { user_id: userId },
      success: function (response) {
        button.textContent = 'Hủy kết bạn';
      }
    });
  }

  function cancelFriendRequest(button, userId) {
    $.ajax({
      url: 'menu/banbe/ctrl_huy.php',
      type: 'POST',
      data: { user_id: userId },
      success: function (response) {
        button.textContent = 'Kết bạn';
      }
    });
  }
</script>


