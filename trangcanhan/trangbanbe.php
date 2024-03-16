<?php
$link = new mysqli('localhost', 'root', '', 'MXH');
$m_id = $_GET['m_id'];
$sql_bb="SELECT * FROM user 
LEFT JOIN friendrequest ON (friendrequest.receiver_id =$m_id AND friendrequest.sender_id = $user_id) OR (friendrequest.sender_id = $m_id and friendrequest.receiver_id = $user_id)
WHERE user_id= $m_id";
$result_bb=$link -> query($sql_bb);
$row_bb = $result_bb->fetch_assoc();

$sql_ss = "SELECT * FROM user
INNER JOIN friendrequest ON (friendrequest.sender_id = $m_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $m_id)
WHERE status = 'bạn bè'";
$result_ss = $link->query($sql_ss);
$friends_ss=array();
while ($row_ss = $result_ss->fetch_assoc()) {
  $friends_ss[] = $row_ss['user_id'];
}
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
  .bia {
    margin: 11vh 10% 0 10%;
    height: 34vw;
    width: 80%
  }

  .bia>.bia1 {
    float: right;
    width: 72%;
    background-size: cover;
    background-position: center;
    border-radius: 0 10px 10px 0;
    height: 32vw
  }

  .bia>.khungcanhan {
    box-shadow: -10px 0px 10px 1px #EEE;
    float: left;
    height: 32vw;
    width: 28%;
    border-radius: 10px 0 0 10px;
    position: relative;
  }

  .bia>.khungcanhan>.canhan1 {
    height: 15vh;
    position: relative;
    padding: 9vh 0 2vh 0
  }

  .bia>.khungcanhan>.canhan1>.anhdaidien {
    background-size: cover;
    background-position: center;
    width: 17vh;
    height: 17vh;
    border-radius: 50%;
    margin: auto;
    border: 3px solid white;
  }

  .bia>.khungcanhan>.name {
    font-family: Helvetica, Arial, sans-serif;
    font-size: 1.8vw;
    text-align: center;
    margin-top: 12vh;
  }

  .bia>.khungcanhan>.name>.banbe, .banchung {
    font-size: 1vw;
    color: dimgray;
    text-decoration: none
  }

.banbe,.banchung:hover{
  text-decoration:underline;
}
  .bia>.khungcanhan>.name>.tieusu {
    font-size: 1.2vw
  }

  .bia>.khungcanhan>.congcu {
    margin:0 auto;
    width:fit-content;
    white-space: nowrap;
  }

  .bia>.khungcanhan>.congcu>.congcu1 {
    margin: 0.5vw;
    font-size: 1vw;
    padding: 1vw 1.8vw;
    border: none;
    border-radius: 5px;
    background-color: #90C9D5;
  }

  .congcu1:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }
  .thongtin{
    padding:10px;
    height:70px
  }
  .thongtin_icon{
    float:left;scale:1.7;margin:15px
  }
  @media(max-width:980px) {
    .bia>.khungcanhan {
      width: 40%;
      top: -10vh;
      left: 28vw;
      height: 50vh;
      background: transparent;
      float: left;
    }

    .bia>.khungcanhan>.canhan1 {
      padding: 2vw;
    }

    .bia>.khungcanhan>.canhan1>.anhdaidien {
      width: 15vh;
      height: 15vh;
    }

    .bia>.khungcanhan>.name {
      font-size: 3.5vh;
      margin-top: 3vh;
    }

    .bia>.khungcanhan>.name>.banbe {
      font-size: 2vh;
    }

    .bia>.khungcanhan>.name>.tieusu {
      font-size: 2vh
    }

    .bia {
      width: 100%;
      margin: 6.5vh 0 0 0;
    }

    .bia>.bia1 {
      width: 100%;
      height: 40vh;
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .bia>.khungcanhan>.congcu>.congcu1 {
      margin-left: 1.4vw;
      font-size: 2.5vh;
      padding: 1.8vw 4vw;
    }

    .story_banbe {
      margin-top: -10vh;
    }
  }

  @media(max-width:630px) {
    .bia>.khungcanhan {
      width: 70%;
      top: -9vh;
      left: 15vw
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .bia>.khungcanhan>.congcu>.congcu1 {
      margin-left: 5vw;
      font-size: 2.5vh;
      padding: 2.5vw 6vw;
    }
  }
</style>

<div class="bia">
  <div class="bia1" style="background-image: url('img/<?php echo $row_bb["cover_picture"] ?>')"></div>
  <div class="khungcanhan">
  
    
    <a data-toggle="modal" href='#modal-id-thongtin' style="scale:1.5;right:10px;top:10px;position:absolute;z-index:2;color:black"><i class="fa-solid fa-circle-info"></i></a>
    <div class="modal fade" id="modal-id-thongtin">
      <div class="modal-dialog">
        <div class="modal-content" style="width:380px;height:480px; border-radius:15px;margin:16vh auto">
          <div class="modal-header" style="border-bottom: 1px solid #DBDBDB;height:50px">
            <h5 class="modal-title" style="position:absolute;left:41%;text-align:center;color:black">Thông tin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="border:none;padding:30px;background:none;position:absolute;right:0">&times;</button>
          </div>
          <div class="modal-body" style="padding:0;overflow:auto">
            <div class="thongtin">
              <div class="thongtin_icon"><i class="fa-solid fa-at"></i></div>Email
              <div style="color:gray"><?php echo $row_bb["email"]?></div>
            </div>
            <div class="thongtin">
              <div class="thongtin_icon"><i class="fa-solid fa-calendar-days"></i></div>Ngày sinh
              <div style="color:gray"><?php echo $row_bb["date_of_birth"]?></div>
            </div>
            <div class="thongtin">
              <div class="thongtin_icon">
              <?php 
              if($row_bb["gender"] =='nam'){
                echo '<i class="fa-solid fa-mars"></i>';
              }else if($row_bb["gender"] =='nữ'){
                echo '<i class="fa-solid fa-venus"></i>';
              }else echo '<i class="fa-solid fa-genderless"></i>';
              ?>
              </div>Giới tính
              <div style="color:gray"><?php echo $row_bb["gender"]?></div>
            </div>
            <div class="thongtin">
              <div class="thongtin_icon"><i class="fa-solid fa-school"></i></div>Học tại
              <div style="color:gray"><?php echo $row_bb["study_at"]?></div>
            </div>
            <div class="thongtin">
              <div class="thongtin_icon"><i class="fa-solid fa-building"></i></div>Làm việc tại
              <div style="color:gray"><?php echo $row_bb["working_at"]?></div>
            </div>
            <div class="thongtin">
              <div class="thongtin_icon"><i class="fa-solid fa-heart"></i></div>Mối quan hệ
              <div style="color:gray"><?php echo $row_bb["relationship"]?></div>
            </div>
          </div>
        </div>
      </div>
    </div>


  
    <div class="canhan1">
      <div class="anhdaidien" style="background-image: url('img/<?php echo $row_bb["avartar"] ?>')"></div>
    </div>
    <div class="name">
      <div><strong><?php echo $row_bb["username"] ?></strong></div>
      <div class="banbe">
        <!-- bạn bè -->
        <?php $count_friends = count($friends_ss)?>
        <a class="banchung"data-toggle="modal" href='#modal-id-banbe'><?php echo $count_friends?> bạn bè</a>
        <div class="modal fade" id="modal-id-banbe">
          <div class="modal-dialog">
            <div class="modal-content" style="width:430px;height:420px; border-radius:15px;margin-top:20vh">
              <div class="modal-header" style="border-bottom: 1px solid #DBDBDB;height:50px">
                <h5 class="modal-title" style="position:absolute;left:38%;text-align:center;color:black">Tất cả bạn bè</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="border:none;padding:30px;background:none;position:absolute;right:0">&times;</button>
              </div>
              <div class="modal-body" style="padding:0;overflow:auto">
                <!-- Search -->
                <form enctype="multipart/form-data" method="post">
                  <i style="top:12px;position: absolute;left:13px" class="fa-solid fa-magnifying-glass"></i>
                  <input class="timkiem2" data-m_id="<?php echo $m_id ?>"style="width:100%;height: 40px;outline: none;padding-left: 45px;border: none;border-bottom: 1px solid #DBDBDB;">
                </form>
                <div class="hienthibanbe_cuabanbe"></div>
              </div>
            </div>
          </div>
        </div><br>
        <script>
          $('.timkiem2').on('input', function () {
          var timkiem = $(this).val();
          var m_id = $(this).data('m_id');

          if (timkiem === '') {
              loadAllFriends(m_id);
              return;
          }
          $.ajax({
              url: 'trangcanhan/timkiem.php',
              method: 'POST',
              data: {
                timkiem: timkiem,
                m_id: m_id
              },
              success: function (response) {
                $('.hienthibanbe_cuabanbe').html(response); 
              }
          });
      });

      // Hàm tải tất cả bạn bè
      function loadAllFriends(m_id) {
          $.ajax({
              url: 'trangcanhan/tatcabanbe.php',
              method: 'POST',
              data: {
                m_id:m_id
              },
              success: function (response) {
                  $('.hienthibanbe_cuabanbe').html(response); 
              }
          });
      }
        </script>




        <!-- bạn chung -->
        <?php 
        $sql="SELECT * FROM user 
        INNER JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_id)
        WHERE status = 'bạn bè'";
        $result=$link -> query($sql);
        $friends=array();
        while ($row = $result->fetch_assoc()) {
          $friends[] = $row['user_id'];
        }
        $mutual_friends = array_intersect($friends, $friends_ss);
        $num_mutual_friends = count($mutual_friends);
        
        ?>
        <!-- modal -->
        <a class="banchung"data-toggle="modal" href='#modal-id-banchung'><?php echo $num_mutual_friends?> bạn chung</a>
        <div class="modal fade" id="modal-id-banchung">
          <div class="modal-dialog">
            <div class="modal-content" style="width:480px;height:420px; border-radius:15px;margin-top:20vh">
              <div class="modal-header" style="border-bottom: 1px solid #DBDBDB;height:50px">
                <h5 class="modal-title" style="position:absolute;left:42%;text-align:center;">Bạn chung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="border:none;padding:30px;background:none;position:absolute;right:0">&times;</button>
              </div>
              <div class="modal-body" style="padding:0;overflow:auto">
                <?php 
                foreach ($mutual_friends as $mutual_friends_id) {
                  $sql="SELECT * FROM user where user_id=$mutual_friends_id";
                  $result = mysqli_query($link, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <a href="index.php?pid=2&&m_id=<?php echo $row["user_id"]?>">
                  <div class="mess1">
                    <div class="ava" style="background-image: url('img/<?php echo $row["avartar"]?>')"></div>
                    <div class="username"><?php echo $row["username"]?></div><br><br>
                    <div class="mini_content"><?php echo $row["email"]?></div>
                  </div>
                </a>
                <?php 
                    }
                  } else echo 'Không có bạn chung!';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    
    




      <div class="tieusu"><br>
        <?php echo $row_bb["bio"] ?>
      </div>
    </div>
    <div class="congcu">
      <button class="congcu1" id="messageButton" onclick="window.location.href='index.php?pid=0&&m_id=<?php echo $row_bb['user_id'] ?>'">Nhắn tin</button>
      <?php 
      $trangthai_ketban = '';
      if ($row_bb['status'] === 'đã gửi' && $row_bb['sender_id'] == $user_id) {
        $trangthai_ketban = 'Hủy kết bạn';
      }elseif ($row_bb['status'] === 'đã gửi' && $row_bb['sender_id'] == $m_id) {
        $trangthai_ketban = 'Chấp nhận';
      }elseif($row_bb['status'] === 'bạn bè') {
        $trangthai_ketban = 'Bạn bè';
      }else $trangthai_ketban= 'Kết bạn';
      ?>
      <button class="congcu1" data-user-id="<?php echo $row_bb['user_id']?>" data-trangthai-ketban="<?php echo $trangthai_ketban?>"
        onclick="toggleFriendship1(this,<?php echo $row_bb['user_id']?>)">
        <?php echo $trangthai_ketban?>
      </button>
    </div>
  </div>
</div>
<div style="border-bottom:1px solid lightgray; margin:5% 10vw 0 10vw; width:80%;float:center"></div>

<?php
require 'dangbaiviet/posts_connect.php';
$sql_buttonOpenModal = "SELECT * FROM posts 
        INNER JOIN user ON posts.post_by = user.user_id and post_by = $m_id
        WHERE  statuss = 'public' 
        OR statuss = 'friend' AND EXISTS (SELECT 1 FROM friendrequest WHERE ((sender_id = $m_id AND receiver_id = $user_id) OR (sender_id = $user_id AND receiver_id = $m_id)) AND status = 'bạn bè')
        ORDER BY post_id DESC";


$result_buttonOpenModal = $link->query($sql_buttonOpenModal);
include 'dangbaiviet/posts_buttonOpenModal.php'
?>

<script>
function toggleFriendship1(button,userId) {
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


