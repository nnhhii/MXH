<?php 
$link= new mysqli('localhost','root','','MXH');     
$friend_details = "SELECT user.*, friendrequest.status AS friend_status FROM user LEFT JOIN friendrequest ON user.user_id = friendrequest.receiver_id AND friendrequest.sender_id = ? LIMIT 3";
$stmt = $link->prepare($friend_details);
$stmt->bind_param("i", $_SESSION['user']); 
$stmt->execute();
$result_id = $stmt->get_result();
?>

<div class="menu_phai">
  <div class="de_xuat">Đề xuất kết bạn</div>
  <?php while($row_id = $result_id->fetch_assoc()): ?>
    <div class="layout_logo1">
  <div class="logo1" style="background-image:url('img/<?php echo $row_id["avartar"]?>')" onclick="redirectToProfile(<?php echo $row_id['user_id']; ?>)"></div>
  <div class="ten_logo1"><?php echo $row_id["username"]?></div>
  <button onclick="toggleFriendship(this, <?php echo $row_id['user_id']; ?>)">
    <?php 
    if ($row_id['friend_status'] === 'đã gửi') {
      echo 'Hủy kết bạn';
    } else {
      echo 'Kết bạn';
    }
    ?>
  </button>
</div>

  <?php endwhile; ?>
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

  function redirectToProfile(userId) {
    window.location.href = 'index.php?pid=2&user_id=' + userId;
  }

  function sendFriendRequest(userId) {
    $.ajax({
      url: 'menu/yeucau_kb.php',
      type: 'POST',
      data: { user_id: userId },
      success: function(response) {
        console.log("Yêu cầu kết bạn đã được gửi, phản hồi từ máy chủ: " + response);
      }
    });
  }


  function cancelFriendRequest(userId) {
    $.ajax({
      url: 'menu/huy_yeucau_kb.php',
      type: 'POST',
      data: { user_id: userId },
      success: function(response) {
      }
    });
  }
</script>
