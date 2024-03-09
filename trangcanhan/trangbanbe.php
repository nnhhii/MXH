<?php
$link = new mysqli('localhost', 'root', '', 'MXH');
$m_id = $_GET['m_id'];
$sql_bb="SELECT * FROM user 
LEFT JOIN friendrequest ON (friendrequest.receiver_id =$m_id AND friendrequest.sender_id = $user_id) OR (friendrequest.sender_id = $m_id and friendrequest.receiver_id = $user_id)
WHERE user_id= $m_id";

$result_bb=$link -> query($sql_bb);
$row_bb = $result_bb->fetch_assoc();
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
  .bia {
    margin: 11vh 5% 0 5%;
    height: 34vw;
    width: 90%;
    border-radius: 5px;
  }

  .bia>.bia1 {
    float: right;
    width: 78%;
    background-size: cover;
    border-radius: 0 5px 5px 0;
    height: 34vw
  }

  .bia>.khungcanhan {
    background: linear-gradient(to bottom, gray, white);
    float: left;
    height: 34vw;
    width: 22%;
    border-radius: 5px 0 0 5px;
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
    width: 15vh;
    height: 15vh;
    border-radius: 50%;
    margin: auto;
    border: 3px solid white;
  }

  .bia>.khungcanhan>.name {
    font-family: Helvetica, Arial, sans-serif;
    font-size: 1.8vw;
    text-align: center;
    margin-top: 10vh;
  }

  .bia>.khungcanhan>.name>.banbe {
    font-size: 1vw;
    color: dimgray;
  }

  .bia>.khungcanhan>.name>.tieusu {
    font-size: 1.2vw
  }

  .bia>.khungcanhan>.congcu {
    right: 0;
    left: 0;
    padding: 2vw 0.9vw 0 0.9vw;
    position: absolute;
    white-space: nowrap;
  }

  .bia>.khungcanhan>.congcu>.congcu1 {
    margin: 0.5vw;
    font-size: 1vw;
    padding: 1vw 1.8vw;
    border: none;
    border-radius: 5px;
    background-color: #cecdca;
  }

  .bia>.khungcanhan>.congcu1:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }

  .story_banbe {
    width: 100%;
    height: 15vh;
    margin-top: 1%;
    background-color: #cecdca;
    float: left;
  }

  .story_banbe>.circle {
    height: 12vh;
    width: 12vh;
    background-color: none;
    border-radius: 50%;
    float: left;
    margin-top: 0.8%;
    margin-left: 6%;
    border: 2px solid white;
    box-shadow: 0 0 0 0.7px dimgray;
  }
  .like-button_banbe {
    display: flex;
    transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    filter: grayscale(100%);
    padding:4px 0 3px 0;
}
.like-button_banbe.liked {
    color: red;
    filter: grayscale(0);
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
    <div class="canhan1">
      <div class="anhdaidien" style="background-image: url('img/<?php echo $row_bb["avartar"] ?>')"></div>
    </div>
    <div class="name">
      <div><strong>
          <?php echo $row_bb["username"] ?>
        </strong></div>
      <div class="banbe"><br>2939 bạn bè </div>
      <div class="tieusu"><br>
        <?php echo $row_bb["bio"] ?>
      </div>
    </div>
    <div class="congcu">
      <button class="congcu1" id="messageButton" onclick="window.location.href='index.php?pid=0&&m_id=<?php echo $row_bb['user_id'] ?>'">Nhắn tin</button>

      <button class="congcu1" data-user-id="<?php echo $row_bb['user_id']; ?>"
        onclick="toggleFriendship1(this,<?php echo $row_bb['user_id']; ?>)">
        <?php
        if ($row_bb['status'] === 'đã gửi' && $row_bb['sender_id'] == $user_id) {
          echo 'Hủy kết bạn';
        }elseif ($row_bb['status'] === 'đã gửi' && $row_bb['sender_id'] == $m_id) {
          echo 'Chấp nhận';
        }elseif($row_bb['status'] === 'bạn bè') {
          echo 'Bạn bè';
        }else echo 'Kết bạn';
        ?>
      </button>

    </div>
    <script>
      function toggleFriendship1(button,userId) {
        if (button.textContent === 'Kết bạn') {
          sendFriendRequest1(button, userId);
        } else if (button.textContent === 'Hủy kết bạn') {
          cancelFriendRequest1(button, userId);
        }else if (button.textContent === 'Chấp nhận') {
          acceptFriendRequest1(button, userId);
        
        }
      }

      function sendFriendRequest1(button, userId) {
        $.ajax({
          url: 'menu/banbe/ctrl_yeucau.php',
          type: 'POST',
          data: { user_id: userId },
          success: function (response) {
            button.textContent = 'Hủy kết bạn';
          }
        });
      }

      function cancelFriendRequest1(button, userId) {
        $.ajax({
          url: 'menu/banbe/ctrl_huy.php',
          type: 'POST',
          data: { user_id: userId },
          success: function (response) {
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
            button.textContent = 'Bạn bè';
          }
        });
      }
    </script>

  </div>
</div>

<?php
$sql_buttonOpenModal = "SELECT * FROM posts inner join user on posts.post_by=user.user_id where user_id=$m_id ORDER BY post_id DESC";
$result_buttonOpenModal = $link->query($sql_buttonOpenModal);
include 'dangbaiviet/posts_buttonOpenModal.php'
?>

